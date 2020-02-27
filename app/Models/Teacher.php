<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Teacher extends Authenticatable
{
    protected $fillable = [
        'name', 'faculty_number','alias','designation','phone','email','password',
    ];

}
