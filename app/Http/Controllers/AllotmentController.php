<?php

namespace App\Http\Controllers;
use DB;
use App\Models\Subject;
use App\Models\Classroom;
use Illuminate\Http\Request;

class AllotmentController extends Controller
{
    //Theory
    public function subject_allotment_theory(){
        $sub=Subject::get()->where("course_type","THEORY");
        return view('admin.allottheory')->with('subs',$sub);
    }
    
    public function allotTry(Request $request){

        DB::table('subject_teacher')
        ->insert(
            ['teacher_id' =>$request->teacher_id, 'subject_id' =>$request->subject_id]
        );

     return redirect()->route('admin.subject_allotment_theory'); 
    }  
    public function delete_allotment_theory($id){

            DB::table('subject_teacher')->where('subject_id', '=', $id)->delete();
            return redirect()->route('admin.subject_allotment_theory'); 
    }

//Lab Course
    public function subject_allotment_lab(){
        $sub=Subject::get()->where("course_type","LAB");
        return view('admin.allotlab')->with('subs',$sub);
    }
    
    public function allotLab(Request $request){

        DB::table('subject_teacher')
        ->insert(
            ['teacher_id' =>$request->teacher_id, 'subject_id' =>$request->subject_id]
        );

     return redirect()->route('admin.subject_allotment_lab'); 
    }  
    public function delete_allotment_lab($id){

        
        DB::table('subject_teacher')->where('subject_id', '=', $id)->delete();
        return redirect()->route('admin.subject_allotment_lab'); 
    }

//Class Room
    public function classroom_allotment(){
        $classrooms=Classroom::get()->where("status",0);
        return view('admin.allottclass')->with('classrooms',$classrooms);
    }
    
    public function allotClassroom(Request $request){

        $classroom=Classroom::find($request->classroom_id);
        $classroom->status=1;
        $classroom->semester_id=$request->semester_id;
        $classroom->save();
        return redirect()->route('admin.classroom_allotment'); 
    }  
    public function delete_classroom_allotment($id){   
        $classroom=Classroom::find($id);
        $classroom->status=0;
        $classroom->semester_id=null;
        $classroom->save();
        return redirect()->route('admin.classroom_allotment'); 
    }

}
