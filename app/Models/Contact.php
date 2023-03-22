<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'inquiry';
    protected $fillable = ['inquiry_name','inquiry_email','inquiry_subject','inquiry_message'];
}
