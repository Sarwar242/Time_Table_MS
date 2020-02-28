<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class ProjectController extends Controller
{
    public function index(){
        return view('index');
    }

    public function pass(){
        return view('passhash');
    }
    public function test(Request $request){
    $pass=Hash::make($request->pass);
    return view('passhash')->with('pass',$pass);
    }

}
