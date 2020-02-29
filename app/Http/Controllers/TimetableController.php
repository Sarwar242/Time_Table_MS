<?php

namespace App\Http\Controllers;

use App\Models\Routine;
use App\Models\Semester;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\Classroom;
use Illuminate\Http\Request;

class TimetableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $method=null;
        return view('admin.generatetimetable')->with(compact('method'));
    }


    public function show(Request $request)
    {
        $this->validate($request, [
            'checker' => 'required',
        ]);

        if($request->checker == "semester")
        {
            $this->validate($request, [   
                'semester_id' => 'required|Numeric',
            ]);
            $method="semester";
            $semester=Semester::find($request->semester_id);
            return view('admin.generatetimetable')->with('semester',$semester)->with(compact('method'));
        }
        elseif($request->checker == "teacher"){
            $this->validate($request, [
                'teacher_id' => 'required|Numeric',
            ]);
            $method="teacher";
            $teacher=Teacher::find($request->teacher_id);
            return view('admin.generatetimetable')->with('teacher',$teacher)->with(compact('method'));
        }
    }

    
    
}
