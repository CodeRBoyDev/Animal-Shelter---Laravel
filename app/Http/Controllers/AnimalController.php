<?php

namespace App\Http\Controllers;
use App\Models\Animal;
use App\Models\Rescuer;
use App\Models\Disease;
use App\Models\Injury;
use Illuminate\Http\Request;
use Redirect;
use View;
use DB;
use Validator;
use File;
use Storage;
class AnimalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $animal = DB::table('animal')->leftJoin('rescuer','rescuer.id','=','animal.rescuer_id')
        ->leftJoin('injury_animal','animal.id','=','injury_animal.animal_id')
        ->leftJoin('injury','injury.id','=','injury_animal.injury_id')
        ->leftJoin('disease_animal','animal.id','=','disease_animal.animal_id')
        ->leftJoin('disease','disease.id','=','disease_animal.disease_id')
        ->leftJoin('health_status_animal','animal.id','=','health_status_animal.animal_id')
        ->leftJoin('health_status','health_status.id','=','health_status_animal.status_id')
        ->leftJoin('adoption_status_animal','animal.id','=','adoption_status_animal.animal_id')
        ->leftJoin('adoption_status','adoption_status.id','=','adoption_status_animal.status_id')
        ->select('animal.id','animal.animal_name','animal.animal_image','animal.animal_type','animal.animal_sex','animal.animal_breed','animal.animal_age','rescuer.rescuer_name','injury.injury_name','disease.disease_name','health_status.status_name','adoption_status.status_names')
        ->groupBy('animal.id')
        ->orderBy('animal.id','DESC')
        ->paginate(5);
        return View::make('animal.index',compact('animal'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $rescuer = Rescuer::pluck('rescuer_name','id');
        $disease = Disease::pluck('disease_name','id');
        $injury = Injury::pluck('injury_name','id');
        return View::make('animal.create',compact('rescuer','disease','injury'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'animal_name'=>'required|alpha|',
            'animal_type'=>'required|alpha|min:3',
            'animal_sex'=>'required|alpha',
            'animal_breed'=>'required|min:4',
            'animal_age'=>'required|numeric',
            'animal_image' => 'mimes:jpeg,jpg,png,gif|required|max:10000',
            'rescuer_id' => 'required'
            ];
        $messages = [
            'required' => 'Ang :attribute field na ito ay kailangan',
            'min' => 'Masyadong maigsi ang :attribute',
            'numeric' => 'Mga numero lang ang kailangan',
            'alpha' => 'Mga letra lamang ang kailangan',
        ];
            $validator = Validator::make($request->all(),$rules, $messages);

        $input = $request->all();
        if($validator->passes()){
        if($request->hasFile('animal_image')) {
            $animalimage = $request->file('animal_image')->getClientOriginalName(); 
            // dd( $request->file('img_path')); 
            $request->file('animal_image')->storeAs('public/images', $animalimage); 
            $input['animal_image'] = 'storage/images/' .$animalimage;
            // dd($input);
        }
            $animal = Animal::create($input);
            
            foreach ((array) $request->injury_id as $injury_id)
            {
                DB::table('injury_animal')->insert(
                    ['injury_id' => $injury_id, 
                     'animal_id' => $animal->id]
                    );
            }

            foreach ((array) $request->disease_id as $disease_id)
            {
                DB::table('disease_animal')->insert(
                    ['disease_id' => $disease_id, 
                     'animal_id' => $animal->id]
                    );
            }
            $dis = DB::table('animal')->latest('animal.id')->first();
            $disid = $dis->id;

            if (DB::table('animal')
            ->leftJoin('disease_animal','animal.id','=','disease_animal.animal_id')
            ->leftJoin('disease','disease.id','=','disease_animal.disease_id')
            ->where('animal.id','=', $disid)->groupBy('animal_id')->exists()) {
                $disease = DB::table('animal')
                ->leftJoin('disease_animal','animal.id','=','disease_animal.animal_id')
                ->leftJoin('disease','disease.id','=','disease_animal.disease_id')
                ->where('animal.id','=', $disid)
                ->groupBy('animal_id')->count('animal_id');
            }
            else {
                $disease = 0;
            }

            if (DB::table('animal')
            ->leftJoin('injury_animal','animal.id','=','injury_animal.animal_id')
            ->leftJoin('injury','injury.id','=','injury_animal.injury_id')
            ->where('animal.id','=', $disid)->groupBy('animal_id')->exists()) {
                $injury = DB::table('animal')
                ->leftJoin('injury_animal','animal.id','=','injury_animal.animal_id')
                ->leftJoin('injury','injury.id','=','injury_animal.injury_id')
                ->where('animal.id','=', $disid)
                ->groupBy('animal_id')->count('animal_id');
            }
            else {
                $injury = 0;
            }

            //dd($disid, $disease, $injury);
            $health = $injury + $disease; 

            if ($health == 1){
                $status = 2;
            }
                
            elseif ($health > 1 ){
                $status = 3;
            }
                
            else{
                $status = 1;
            }

            DB::table('health_status_animal')->insert(
                ['animal_id' => $disid, 
                 'status_id' => $status]
                );

                if ($health >= 1){
                    $adoption_status = 2;
                }

                else{
                    $adoption_status = 1;
                }
            
            DB::table('adoption_status_animal')->insert(
                ['animal_id' => $disid, 
                 'status_id' => $adoption_status]
                );    
            
                if($status == 1){
                    DB::table('treated')->insert(
                        ['animal_id' => $id]
                        );
                }

            return Redirect::to('animal')->with('success','New Animal Added!');
        }
        return redirect()->back()->withInput()->withErrors($validator);
        // return Redirect::route('animal.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $animals = DB::table('animal')->leftJoin('rescuer','rescuer.id','=','animal.rescuer_id')
        ->leftJoin('injury_animal','animal.id','=','injury_animal.animal_id')
        ->leftJoin('injury','injury.id','=','injury_animal.injury_id')
        ->leftJoin('disease_animal','animal.id','=','disease_animal.animal_id')
        ->leftJoin('disease','disease.id','=','disease_animal.disease_id')
        ->leftJoin('health_status_animal','animal.id','=','health_status_animal.animal_id')
        ->leftJoin('health_status','health_status.id','=','health_status_animal.status_id')
        ->select('animal.id','animal.animal_name','animal.animal_image','animal.animal_type','animal.animal_sex','animal.animal_breed','animal.animal_age','rescuer.rescuer_name','injury.injury_name','disease.disease_name')
        ->where('animal.id',$id)
        ->get();
        
        $animal = Animal::find($id);
        $disease_animal = DB::table('disease_animal')
        ->leftJoin('disease','disease.id','=','disease_animal.disease_id')
        ->where('animal_id',$id)
        ->pluck('disease_name','disease_id')->toArray();
        $injury_animal = DB::table('injury_animal')
        ->leftJoin('injury','injury.id','=','injury_animal.injury_id')
        ->where('animal_id',$id)
        ->pluck('injury_name','injury_id')->toArray();
        $health_status_animal = DB::table('health_status_animal')
        ->leftJoin('health_status','health_status.id','=','health_status_animal.status_id')
        ->where('animal_id',$id)
        ->pluck('status_name','status_id')->toArray();
        $adoption_status_animal = DB::table('adoption_status_animal')
        ->leftJoin('adoption_status','adoption_status.id','=','adoption_status_animal.status_id')
        ->where('animal_id',$id)
        ->pluck('status_names','status_id')->toArray();
        $rescuer = DB::table('rescuer')->leftJoin('animal','animal.rescuer_id','=','rescuer.id')
        ->select('rescuer.id','rescuer.rescuer_name','rescuer.rescuer_age','rescuer.rescuer_phone','rescuer.rescuer_address','animal.animal_name','animal.animal_image')
        // ->where('animal.rescuer_id','=',$id)
        ->pluck('rescuer_name','id')->toArray();

        return View::make('animal.show',compact('animal','rescuer','animals','injury_animal','disease_animal','health_status_animal','adoption_status_animal'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $animals = DB::table('animal')->leftJoin('rescuer','rescuer.id','=','animal.rescuer_id')
        ->leftJoin('injury_animal','animal.id','=','injury_animal.animal_id')
        ->leftJoin('injury','injury.id','=','injury_animal.injury_id')
        ->leftJoin('disease_animal','animal.id','=','disease_animal.animal_id')
        ->leftJoin('disease','disease.id','=','disease_animal.disease_id')
        ->select('animal.id','animal.animal_name','animal.animal_image','animal.animal_type','animal.animal_sex','animal.animal_breed','animal.animal_age','rescuer.rescuer_name','injury.injury_name','disease.disease_name')
        ->where('animal.id',$id)
        ->get();
        
        $animal = Animal::find($id);
        $disease_animal = DB::table('disease_animal')->where('animal_id',$id)->pluck('disease_id')->toArray();
        $disease = Disease::pluck('disease_name','id');
        $injury_animal = DB::table('injury_animal')->where('animal_id',$id)->pluck('injury_id')->toArray();
        $injury = Injury::pluck('injury_name','id');
        $rescuer = Rescuer::pluck('rescuer_name','id');
        return View::make('animal.edit',compact('animal','injury','rescuer','disease','animals','injury_animal','disease_animal'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $input = $request->all();
        $animal = Animal::find($id);

        if($request->hasFile('animal_image')) {
            Storage::delete($animal->animal_image);

             $animal_image = $request->file('animal_image')->getClientOriginalName(); 
            // dd( $request->file('img_path')); 
            $request->file('animal_image')->storeAs('public/images', $animal_image); 
            $animal['animal_image'] = 'storage/images/' .$animal_image;
           
        }
        $disease_ids = $request->input('disease_id');
        if(empty($disease_ids)){
        DB::table('disease_animal')->where('animal_id',$id)->delete();
        } else {    
            foreach($disease_ids as $disease_id) {
                 DB::table('disease_animal')->where('animal_id',$id)->delete();
        }
            foreach($disease_ids as $disease_id) {
                DB::table('disease_animal')->insert(['disease_id' => $disease_id, 'animal_id' => $id]); 
        }
        }

        $injury_ids = $request->input('injury_id');
        if(empty($injury_ids)){
        DB::table('injury_animal')->where('animal_id',$id)->delete();
        } else {    
            foreach($injury_ids as $injury_id) {
                 DB::table('injury_animal')->where('animal_id',$id)->delete();
        }
            foreach($injury_ids as $injury_id) {
                DB::table('injury_animal')->insert(['injury_id' => $injury_id, 'animal_id' => $id]); 
        }
     }

     DB::table('health_status_animal')->where('animal_id',$id)->delete();
     DB::table('adoption_status_animal')->where('animal_id',$id)->delete();

     if (DB::table('animal')
     ->leftJoin('disease_animal','animal.id','=','disease_animal.animal_id')
     ->leftJoin('disease','disease.id','=','disease_animal.disease_id')
     ->where('animal.id','=', $id)->groupBy('animal_id')->exists()) {
         $disease = DB::table('animal')
         ->leftJoin('disease_animal','animal.id','=','disease_animal.animal_id')
         ->leftJoin('disease','disease.id','=','disease_animal.disease_id')
         ->where('animal.id','=', $id)
         ->groupBy('animal_id')->count('animal_id');
     }
     else {
         $disease = 0;
     }

     if (DB::table('animal')
     ->leftJoin('injury_animal','animal.id','=','injury_animal.animal_id')
     ->leftJoin('injury','injury.id','=','injury_animal.injury_id')
     ->where('animal.id','=', $id)->groupBy('animal_id')->exists()) {
         $injury = DB::table('animal')
         ->leftJoin('injury_animal','animal.id','=','injury_animal.animal_id')
         ->leftJoin('injury','injury.id','=','injury_animal.injury_id')
         ->where('animal.id','=', $id)
         ->groupBy('animal_id')->count('animal_id');
     }
     else {
         $injury = 0;
     }

     //dd($disid, $disease, $injury);
     $health = $injury + $disease; 

     if ($health == 1){
         $status = 2;
     }
         
     elseif ($health > 1 ){
         $status = 3;
     }
         
     else{
         $status = 1;
     }

     DB::table('health_status_animal')->insert(
         ['animal_id' => $id, 
          'status_id' => $status]
         );
    DB::table('treated')->where('animal_id',$id)->delete();

    if ($health >= 1){
        $adoption_status = 2;
    }

    else{
        $adoption_status = 1;
    }

DB::table('adoption_status_animal')->insert(
    ['animal_id' => $id, 
     'status_id' => $adoption_status]
    );  

    if($status == 1){
        DB::table('treated')->insert(
            ['animal_id' => $id]
            );
    }


        $animal->animal_name = $request->animal_name;
        $animal->animal_type = $request->animal_type;
        $animal->animal_sex = $request->animal_sex;
        $animal->animal_breed = $request->animal_breed;
        $animal->animal_age  = $request->animal_age;
        $animal->save();
        return redirect()->route('animal.index');
        
    }

    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $animal = Animal::find($id);
        DB::table('injury_animal')->where('injury_id',$id)->delete();
        DB::table('disease_animal')->where('disease_id',$id)->delete();
        DB::table('health_status_animal')->where('animal_id',$id)->delete();
        DB::table('treated')->where('animal_id',$id)->delete();
        $animal->delete();
        return Redirect::to('animal')->with('success','Animal Deleted!');
    }


}
