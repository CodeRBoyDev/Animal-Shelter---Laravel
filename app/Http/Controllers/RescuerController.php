<?php

namespace App\Http\Controllers;
use App\Models\Rescuer;
use App\Models\Animal;
use Illuminate\Http\Request;
use Redirect;
use View;
use DB;
use Validator;

class RescuerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rescuer = DB::table('rescuer')->leftJoin('animal','animal.rescuer_id','=','rescuer.id')
        ->select('rescuer.id','rescuer.rescuer_name','rescuer.rescuer_age','rescuer.rescuer_phone','rescuer.rescuer_address','animal.animal_name','animal.animal_image')
        // ->groupBy('animal.animal_name')
        ->get();
          return View::make('rescuer.index',compact('rescuer'));
          
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {       
        return view('rescuer.create');
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
            'rescuer_name'=>'required|min:4|',
            'rescuer_age'=>'required|numeric',
            'rescuer_phone'=>'required|numeric|min:3',
            'rescuer_address'=>'required|min:4',
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
            $input = $request->all();
            Rescuer::create($input); 
           return Redirect::to('rescuer')->with('success','New rescuer Added!');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rescuer = Rescuer::find($id);
        return View::make('rescuer.edit',compact('rescuer'));
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
        $rescuer = Rescuer::find($id);
        $rescuer->update($request->all());
        return Redirect::route('rescuer.index')->with('success','rescuer updated!');
    }
   
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rescuer = Rescuer::find($id);
        $rescuer->delete();
        return Redirect::to('rescuer')->with('success','rescuer Deleted!');
    }
}
