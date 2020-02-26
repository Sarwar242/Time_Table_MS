<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

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
        return redirect()->route('admin');
    }
}
