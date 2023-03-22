<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnimalController;
use App\Http\Controllers\RescuerController;
use App\Http\Controllers\InjuryController;
use App\Http\Controllers\DiseaseController;
use App\Http\Controllers\AdopterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AdoptionController;
use App\Http\Controllers\SigninController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\EmployeeController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::group(['middleware' => 'isLogged'], function(){
    Route::resource('/adoption',AdoptionController::class);
    Route::resource('/animal',AnimalController::class);
    Route::resource('/rescuer',RescuerController::class);
    Route::resource('/injury',InjuryController::class);
    Route::resource('/disease',DiseaseController::class);
    Route::resource('/adopter',AdopterController::class);
    Route::resource('/employee',EmployeeController::class); 
    Route::get('/profile', 'App\Http\Controllers\SigninController@profile')->name('employee.profile');
    });

Route::group(['middleware' => 'AlreadyLoggedIn'], function(){
    Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home.index');
    Route::get('/search', 'App\Http\Controllers\HomeController@search')->name('search.animal');
    Route::get('/logout', 'App\Http\Controllers\SigninController@logout');
    Route::get('/signin', 'App\Http\Controllers\SigninController@login')->name('login.form');
    Route::post('/signin', 'App\Http\Controllers\SigninController@postlogin')->name('login.postlogin');
    Route::get('/signup', 'App\Http\Controllers\RegisterController@signup')->name('signup.form');
    Route::post('/signup', 'App\Http\Controllers\RegisterController@create')->name('signup.create');
    Route::resource('/contact',ContactController::class);
});

    

