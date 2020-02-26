<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class ProjectController extends Controller
{
    public function index(){
        return view('index');
    }
    
    public function test(Request $request){
    dd(Hash::make($request->password));
    }
}
