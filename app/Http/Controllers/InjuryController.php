<?php

namespace App\Http\Controllers;
use App\Models\Injury;
use Illuminate\Http\Request;
use Redirect;
use View;
use Validator;
use DB;
class InjuryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $injury = Injury::all();
        return View::make('injury.index',compact('injury'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('injury.create');
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
            'injury_name'=>'required|max:50',
            'injury_description'=>'required|max:300',
            ];
        $messages = [
            'required' => 'Ang :attribute field na ito ay kailangan',
            'max' => 'Masyadong mahaba ang :attribute',
        ];
            $validator = Validator::make($request->all(),$rules, $messages);

        if($validator->passes()){
            $input = $request->all();
            Injury::create($input); 
            return Redirect::to('injury')->with('success','New injury Added!');
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
        $injurys = DB::table('injury')->leftJoin('injury_animal','injury_id','=','injury_animal.animal_id')
        ->leftJoin('animal','animal.id','=','injury_animal.animal_id')
        ->select('injury.id','injury.injury_name')
        ->where('injury.id',$id)
        ->get();
        

        $injury = Injury::find($id);
        $injury_animal = DB::table('injury_animal')
        ->leftJoin('animal','animal.id','=','injury_animal.animal_id')
        ->where('injury_id',$id)
        ->pluck('animal_name','injury_id')->toArray();
        return View::make('injury.show',compact('injury','injury_animal'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $injury = Injury::find($id);
        return View::make('injury.edit',compact('injury'));
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
        $injury = Injury::find($id);
        $injury->update($request->all());
        return Redirect::route('injury.index')->with('success','injury updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $injury = Injury::find($id);
        $injury->delete();
        return Redirect::to('injury')->with('success','injury Deleted!');
    }
}
