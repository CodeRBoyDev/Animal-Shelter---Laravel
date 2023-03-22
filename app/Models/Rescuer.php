<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rescuer extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'rescuer';
    protected $fillable = ['rescuer_name','rescuer_age','rescuer_phone','rescuer_address'];
}
