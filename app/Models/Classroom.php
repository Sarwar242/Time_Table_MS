<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{ 
     protected $fillable = ['name', 'status',];

     public function semester()
    {
        return $this->hasOne(Semester::class);
    }
}
