<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Models\Semester;
use Illuminate\Http\Request;
use DB;
use Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;


class TeacherController extends Controller
{

    //Auth
    use AuthenticatesUsers;

    protected $redirectTo = '/teacher';

    public function login(Request $request)
    {
        $this->validate($request, [
            'faculty_number' => 'required|string',
        ]);

        if (Auth::guard('teacher')->attempt(['faculty_number' => $request->faculty_number, 'password' => $request->password])) {
            $teacher= Teacher::where('faculty_number', '=', $request->faculty_number)->first();
            $teacherName = $teacher->name;
            $teacherId = $teacher->id;
            session(['teacherName' => $teacherName, 'teacherId' => $teacherId]);
            return redirect()->route('teacher');

        } else {
            session()->flash('failed', 'invalid Email or Password!');
            return redirect()->route('index');
        }
    }
    public function logout(Request $request)
    {
        $this->guard('teacher')->logout();
        session()->forget(['teacherName', 'teacherId']);
        $request->session()->invalidate();
        session()->flash('success', 'You Just Logged Out!');
        return redirect()->route('index');
    }




    //Fuctionalities

    public function index()
    {
        $method="teacher";
        $teacher=Teacher::find(session('teacherId'));
        return view('teacher.index')->with('teacher',$teacher)->with(compact('method'));
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
            return view('teacher.index')->with('semester',$semester)->with(compact('method'));
        }
        elseif($request->checker == "teacher"){
            $this->validate($request, [
                'teacher_id' => 'required|Numeric',
            ]);
            $method="teacher";
            $teacher=Teacher::find($request->teacher_id);
            return view('teacher.index')->with('teacher',$teacher)->with(compact('method'));
        }
    }





    //Admins Part
    public function store(Request $request)
    {
        $this->validate($request, [
            "name" => 'required',
            "faculty_number" => 'required',
            "alias" => 'sometimes',
            "designation" => 'required',
            "phone" => 'required',
            "email" => 'required|email',
        ]);
        $teacher= new Teacher;
        $teacher->name = $request->name;
        $teacher->faculty_number = $request->faculty_number;
        $teacher->alias = $request->alias;
        $teacher->designation = $request->designation;
        $teacher->phone = $request->phone;
        $teacher->email = $request->email;
        $teacher->save();
        session()->flash('success', 'New Teacher Added!');
        return redirect()->route('admin');
    }
    public function destroy($id)
    {
        $teacher =Teacher::find($id);
        $teacher->delete();

        session()->flash('success', 'A Teacher Deleted!');
        return redirect()->route('admin');
    }
}
