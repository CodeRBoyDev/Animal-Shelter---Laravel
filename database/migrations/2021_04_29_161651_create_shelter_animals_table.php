<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShelterAnimalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rescuer', function ($table) {
	        $table->increments('id');
            $table->string('rescuer_name');
            $table->string('rescuer_age');
            $table->string('rescuer_phone');
            $table->string('rescuer_address');	
        });

        Schema::create('animal', function (Blueprint $table) {
            $table->increments('id');
            $table->string('animal_name');
            $table->string('animal_type');
            $table->string('animal_sex');
            $table->string('animal_breed');
            $table->string('animal_age');
            $table->string('animal_image');
            $table->integer('rescuer_id')->unsigned();
            $table->foreign('rescuer_id')->references('id')->on('rescuer')->onDelete('cascade')->onUpdate('cascade');
            });

        Schema::create('adopter', function (Blueprint $table) {
            $table->increments('id');
            $table->string('adopter_name');
            $table->string('adopter_age');
            $table->string('adopter_phone');
            $table->string('adopter_address');
            });
        Schema::create('treated', function ($table) {
            $table->increments('id');
            $table->integer('animal_id')->unsigned();
            $table->foreign('animal_id')->references('id')->on('animal')->onDelete('cascade')->onUpdate('cascade');;
            });   

        Schema::create('employee', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email');
            $table->string('password');
            $table->string('employee_name');
            $table->string('employee_age');
            $table->string('employee_gender');
            $table->string('employee_phone');
            $table->string('employee_address');
            });   
            
        Schema::create('inquiry', function (Blueprint $table) {
            $table->increments('id');
            $table->string('inquiry_name');
            $table->string('inquiry_email');
            $table->string('inquiry_type');
            $table->string('inquiry_subject');
            $table->string('inquiry_message');
            });    

        Schema::create('health_status', function (Blueprint $table) {
            $table->increments('id');
            $table->string('status_name');
            });
        
        Schema::create('adoption_status', function (Blueprint $table) {
            $table->increments('id');
            $table->string('status_names');
            });    

        Schema::create('injury', function (Blueprint $table) {
            $table->increments('id');
            $table->string('injury_name');
            $table->string('injury_description');
            });
	    Schema::create('disease', function ($table) {
            $table->increments('id');
            $table->string('disease_name');
            $table->string('disease_description');
            });

        //foreign
        
        Schema::create('adopter_animal', function ($table) {
                $table->integer('treated_id')->unsigned();
                $table->foreign('treated_id')->references('id')->on('treated')->onDelete('cascade')->onUpdate('cascade');;
                $table->integer('adopter_id')->unsigned();
                 $table->foreign('adopter_id')->references('id')->on('adopter')->onDelete('cascade')->onUpdate('cascade');;
                });         
        Schema::create('disease_animal', function ($table) {
                $table->integer('animal_id')->unsigned();
                $table->foreign('animal_id')->references('id')->on('animal')->onDelete('cascade')->onUpdate('cascade');;
                $table->integer('disease_id')->unsigned();
                $table->foreign('disease_id')->references('id')->on('disease')->onDelete('cascade')->onUpdate('cascade');;
                });
        Schema::create('injury_animal', function ($table) {
                $table->integer('animal_id')->unsigned();
                $table->foreign('animal_id')->references('id')->on('animal')->onDelete('cascade')->onUpdate('cascade');;
                $table->integer('injury_id')->unsigned();
                $table->foreign('injury_id')->references('id')->on('injury')->onDelete('cascade')->onUpdate('cascade');;
                });     
        Schema::create('health_status_animal', function ($table) {
            $table->integer('animal_id')->unsigned();
            $table->foreign('animal_id')->references('id')->on('animal')->onDelete('cascade')->onUpdate('cascade');;
            $table->integer('status_id')->unsigned();
             $table->foreign('status_id')->references('id')->on('health_status')->onDelete('cascade')->onUpdate('cascade');;
                });   

        Schema::create('adoption_status_animal', function ($table) {
            $table->integer('animal_id')->unsigned();
            $table->foreign('animal_id')->references('id')->on('animal')->onDelete('cascade')->onUpdate('cascade');;
            $table->integer('status_id')->unsigned();
             $table->foreign('status_id')->references('id')->on('adoption_status')->onDelete('cascade')->onUpdate('cascade');;
                });   
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('animal');
        Schema::drop('rescuer');
        Schema::dropIfExists('adopter');
        Schema::dropIfExists('health_status');
        Schema::dropIfExists('adoption_status');
        Schema::dropIfExists('treated');
        Schema::dropIfExists('employee');
        Schema::dropIfExists('injury');
        Schema::dropIfExists('disease');
        Schema::dropIfExists('injury_animal');
        Schema::dropIfExists('disease_animal');
        Schema::dropIfExists('adopter_animal');
        Schema::dropIfExists('adoption_status_animal');
        Schema::dropIfExists('health_status_animal');
    }
}
