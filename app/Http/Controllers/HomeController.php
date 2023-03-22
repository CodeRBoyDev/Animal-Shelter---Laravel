<?php

namespace App\Http\Controllers;
use View;
use DB;
use App\Models\Animal;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    
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
        return View::make('home',compact('animal'));
    }

    public function search(Request $request)
    {
        $input = $request->all(); 
        $inputs = $input->contains('query');
        dd($inputs);
        if(isset($_GET['query'])){
            
            $search_text = $_GET['query'];
            $animals = DB::table('treated')->leftJoin('animal','treated.animal_id','=','animal.id')
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
            ->where('animal_name','LIKE','%'.$search_text.'%')->get();
            return view('search',['animals'=>$animals]);

        } else{

            $animals= DB::table('treated')->leftJoin('animal','treated.animal_id','=','animal.id')
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
          return View::make('search',compact('animals'));
        }



       
    }
    
        


    
}
