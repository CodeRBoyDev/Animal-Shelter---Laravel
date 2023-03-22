<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'employee';
    protected $fillable = ['email','password','employee_name','employee_age','employee_gender','employee_phone','employee_address'];
}
