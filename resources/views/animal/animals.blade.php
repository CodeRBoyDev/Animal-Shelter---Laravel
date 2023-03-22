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