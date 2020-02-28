<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Routine extends Model
{
    protected $fillables=[
        'day_id','period_id','semester_id','subject_id','teacher_id',
    ];


    public function day(){
        return $this->belongsTo(Day::class);
    }

    public function period(){
        return $this->belongsTo(Period::class);
    }

    public function semester(){
        return $this->belongsTo(Semester::class);
    }

    public function subject(){
        return $this->belongsTo(Subject::class);
    }

    public function teacher(){
        return $this->belongsTo(Teacher::class);
    }
}
