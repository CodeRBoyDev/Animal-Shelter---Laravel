<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adopter extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'adopter';
    protected $fillable = ['adopter_name','adopter_age','adopter_phone','adopter_address'];
}
