<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Injury extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'injury';
    protected $fillable = ['injury_name','injury_description'];
}
