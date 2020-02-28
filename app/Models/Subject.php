<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $fillable = [
        'subject_code', 'subject_name', 'course_type', 'department_id', 'isAlloted', 'semester_id',
    ];

    public function semester()
    {
        return $this->belongsTo(Semester::class);
    }
    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function teachers()
    {
        return $this->belongsToMany(Teacher::class);
    }
}
