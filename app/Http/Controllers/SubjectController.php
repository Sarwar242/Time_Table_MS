<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{

    public function index()
    {
        return view('admin.subjects');
    }

    public function store(Request $request)
    {
     
        $this->validate($request, [
            "subject_name" => 'required',
            "subject_code" => 'required',
            "course_type" => 'required',
            "semester_id" => 'required',
            "department_id" => 'required',
        ]);

        $subject= new Subject;
        $subject->subject_name = $request->subject_name;
        $subject->subject_code = $request->subject_code;
        $subject->course_type = $request->course_type;
        $subject->semester_id = $request->semester_id;
        $subject->department_id = $request->department_id;
        $subject->save();
       
        session()->flash('success', 'New Subject Added!');
        return redirect()->route('admin.subjects');
    }

    public function destroy($id)
    {
        $subject =Subject::find($id);
        $subject->delete();

        session()->flash('success', 'A Subject Deleted!');
        return redirect()->route('admin.subjects');
    }
}
