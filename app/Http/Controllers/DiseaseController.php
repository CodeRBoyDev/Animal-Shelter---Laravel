<?php

namespace App\Http\Controllers;
use App\Models\Disease;
use Illuminate\Http\Request;
use Redirect;
use View;
use Validator;
use DB;

class DiseaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $disease = Disease::all();
        return View::make('disease.index',compact('disease'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('disease.create');
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
            'disease_name'=>'required|max:50',
            'disease_description'=>'required|max:300',
            ];
        $messages = [
            'required' => 'Ang :attribute field na ito ay kailangan',
            'max' => 'Masyadong mahaba ang :attribute',
        ];
            $validator = Validator::make($request->all(),$rules, $messages);

        if($validator->passes()){
            $input = $request->all();
            Disease::create($input); 
            return Redirect::to('disease')->with('success','New Disease Added!');
        }
        return redirect()->back()->withInput()->withErrors($validator);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $diseases = DB::table('disease')->leftJoin('disease_animal','disease_id','=','disease_animal.animal_id')
        // ->leftJoin('animal','animal.id','=','disease_animal.animal_id')
        // ->select('disease.id','disease.disease_name')
        // ->where('disease.id',$id)
        // ->get();

        $animals = DB::table('disease')
        ->leftJoin('disease_animal','disease_id','=','disease_animal.animal_id')
        ->leftJoin('animal','animal.id','=','disease_animal.animal_id')
        // ->leftJoin('rescuer','rescuer.id','=','animal.rescuer_id')
        // ->leftJoin('injury_animal','animal.id','=','injury_animal.animal_id')
        // ->leftJoin('injury','injury.id','=','injury_animal.injury_id')
        // ->leftJoin('health_status_animal','animal.id','=','health_status_animal.animal_id')
        // ->leftJoin('health_status','health_status.id','=','health_status_animal.status_id')
        // ->select('animal.id','animal.animal_name','animal.animal_image','animal.animal_type','animal.animal_sex','animal.animal_breed','animal.animal_age','rescuer.rescuer_name','injury.injury_name','disease.disease_name')
        ->where('disease.id',$id)
        ->get();
        
        

        $disease = Disease::find($id);
        $disease_animal = DB::table('disease_animal')
        ->leftJoin('animal','animal.id','=','disease_animal.animal_id')
        ->where('disease_id',$id)
        ->pluck('animal_name','disease_id')->toArray();
        // dd($disease_animal);
        return View::make('disease.show',compact('disease','disease_animal'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $disease = Disease::find($id);
        return View::make('disease.edit',compact('disease'));
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
        $disease = Disease::find($id);
        $disease->update($request->all());
        return Redirect::route('disease.index')->with('success','disease updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $disease = Disease::find($id);
        $disease->delete();
        return Redirect::to('disease')->with('success','disease Deleted!');
    }
}
