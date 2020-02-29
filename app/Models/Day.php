<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Day extends Model
{
    protected $fillable = [
        'name','type',
    ];
    public function routines(){
        return $this->hasMany(Routine::class);
    }
}
