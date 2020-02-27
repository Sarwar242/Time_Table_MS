<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
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
        $teacher= Teacher::where('faculty_number', '=', $request->faculty_number)->first();
        if ($teacher!=NULL){
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
        session()->forget(['teacherName', 'teacherId']);
        $request->session()->invalidate();
        session()->flash('success', 'You Just Logged Out!');
        return redirect()->route('index');
    }




    //Fuctionalities

    public function index()
    {
        return view('teacher.index');
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
