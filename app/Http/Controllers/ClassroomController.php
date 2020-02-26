<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use Illuminate\Http\Request;

class ClassroomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classrooms =Classroom::orderBy('id','desc')->get();
        return view('admin.classrooms')->with('classrooms',$classrooms);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            "name" => 'required',
        ]);
        $classroom= new Classroom;
        $classroom->name = $request->name;
        $classroom->save();
        session()->flash('success', 'New Classroom Added!');
        return redirect()->route('admin.classrooms');
    }


    public function destroy($id)
    {
        $classroom=Classroom::find($id);
        $classroom->delete();
        session()->flash('success', 'A Classroom Deleted!');
        return redirect()->route('admin.classrooms');
    }
}
