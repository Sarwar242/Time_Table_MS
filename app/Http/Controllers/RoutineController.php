<?php

namespace App\Http\Controllers;

use App\Models\Routine;
use App\Models\Semester;
use App\Models\Subject;
use Illuminate\Http\Request;

class RoutineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $semester=Semester::find($id);
        $subjects=Subject::get()->where('semester_id',$id);
        return view('admin.routines')->with('semester',$semester)->with('subjects',$subjects);
    }

    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'day_id' => 'required|Numeric',
            'period_id' => 'required|Numeric',
            'subject_id' => 'required|Numeric',
            'teacher_id' => 'required|Numeric',
            'semester_id' => 'required|Numeric',
        ]);

        if (Routine::where('day_id', $request->day_id)
        ->where('period_id',$request->period_id)
        ->where('subject_id',$request->subject_id)
        ->where('teacher_id',$request->teacher_id)
        ->where('semester_id',$request->semester_id)->exists()) {
            session()->flash('success', 'A routine already exists!');
            return redirect()->route('admin.semester.routine',$request->semester_id);
         }
        $routine= new Routine;
        $routine-> day_id= $request->day_id;
        $routine-> period_id= $request->period_id;
        $routine-> subject_id= $request->subject_id;
        $routine-> teacher_id= $request->teacher_id;
        $routine-> semester_id= $request->semester_id;
        $routine->save();
        session()->flash('success', 'A routine added!');
        return redirect()->route('admin.semester.routine',$request->semester_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Routine  $routine
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $routine= Routine::find($id);
        $semester_id=$routine->semester_id;
        $routine->delete();
        session()->flash('success', 'A routine deleted!');
        return redirect()->route('admin.semester.routine',$semester_id);
    }
}
