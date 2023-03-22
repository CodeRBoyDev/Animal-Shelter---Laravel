<?php

namespace App\Http\Controllers;
use App\Models\Adopter;
use Illuminate\Http\Request;
use Redirect;
use View;
use Validator;
use DB;

class AdopterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $adopter = DB::table('adopter')->leftJoin('adopter_animal','adopter.id','=','adopter_animal.adopter_id')
        ->leftJoin('treated','treated.id','=','adopter_animal.treated_id')
        ->leftJoin('animal','treated.animal_id','=','animal.id')
        ->select('adopter.id','adopter_name','adopter_age','adopter_phone','adopter_address','animal_name','animal_image')
        ->get();
        return View::make('adopter.index',compact('adopter'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adopter.create');
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
            'adopter_name'=>'required|min:4|',
            'adopter_age'=>'required|numeric',
            'adopter_phone'=>'required|numeric|min:3',
            'adopter_address'=>'required|min:4',
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
            Adopter::create($input); 
           return Redirect::to('adopter')->with('success','New adopter Added!');
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
        $adopter = Adopter::find($id);
        return View::make('adopter.edit',compact('adopter'));
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
        $adopter = Adopter::find($id);
        $adopter->update($request->all());
        return Redirect::route('adopter.index')->with('success','adopter updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $adopter = Adopter::find($id);
        $adopter->delete();
        return Redirect::to('adopter')->with('success','adopter Deleted!');
    }
}
