<?php

namespace App\Http\Controllers;
use DB;
use View;
use Redirect;
use App\Models\Adopter;
use Illuminate\Http\Request;

class AdoptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $animal= DB::table('treated')->leftJoin('animal','treated.animal_id','=','animal.id')
        ->leftJoin('health_status_animal','animal.id','=','health_status_animal.animal_id')
        ->leftJoin('health_status','health_status.id','=','health_status_animal.status_id')
        ->leftJoin('adoption_status_animal','animal.id','=','adoption_status_animal.animal_id')
        ->leftJoin('adoption_status','adoption_status.id','=','adoption_status_animal.status_id')
        ->whereNotExists(function($query)
        {
            $query->select(DB::raw(1))
                  ->from('adopter_animal')
                  ->whereRaw('treated.id = adopter_animal.treated_id');
        })
        ->select('animal.id','animal.animal_name','animal.animal_image','animal.animal_type','animal.animal_sex','animal.animal_breed','animal.animal_age','status_name','status_names')
        // ->groupBy('animal.animal_name')
        ->get();
          return View::make('adoption.index',compact('animal'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $animal= DB::table('treated')->leftJoin('animal','treated.animal_id','=','animal.id')
        ->leftJoin('health_status_animal','animal.id','=','health_status_animal.animal_id')
        ->leftJoin('health_status','health_status.id','=','health_status_animal.status_id')
        ->leftJoin('adoption_status_animal','animal.id','=','adoption_status_animal.animal_id')
        ->leftJoin('adoption_status','adoption_status.id','=','adoption_status_animal.status_id')
        ->whereNotExists(function($query)
        {
            $query->select(DB::raw(1))
                  ->from('adopter_animal')
                  ->whereRaw('treated.id = adopter_animal.treated_id');
        })
        ->select('treated.id','animal.animal_name','animal.animal_image','animal.animal_type','animal.animal_sex','animal.animal_breed','animal.animal_age','status_name','status_names')
        ->pluck('animal_name','treated.id')->toArray();

        $adopter = Adopter::pluck('adopter_name','id');
        return View::make('adoption.create',compact('animal','adopter'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $adopter = $request->adopter_id;
        foreach ((array) $request->animal_id as $treated_id)
        {
            DB::table('adopter_animal')->insert(
                ['treated_id' => $treated_id, 
                 'adopter_id' => $adopter]
                );
        }
        return Redirect::to('adoption')->with('success','New Adoption Added!');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
