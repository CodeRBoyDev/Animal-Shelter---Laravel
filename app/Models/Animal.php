<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'animal';
    protected $fillable = ['animal_name','animal_type','animal_sex','animal_breed','animal_age','animal_image','rescuer_id'];
}
