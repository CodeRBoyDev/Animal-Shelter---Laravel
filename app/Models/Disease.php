<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disease extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'disease';
    protected $fillable = ['disease_name','disease_description'];
}
