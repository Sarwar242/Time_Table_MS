<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Teacher;
use Illuminate\Http\Request;
use DB;
use Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;


class AdminController extends Controller
{
    use AuthenticatesUsers;


    public function login(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'password' => 'required|string',
        ]);

        if (Auth::attempt(['name' => $request->name, 'password' => $request->password])) {
            $admin = Admin::where('name', '=', $request->name)->first();
            return redirect()->intended(route('admin'));

        } else {
            session()->flash('failed', 'invalid Email or Password!');
            return back();
        }
    }
    public function logout(Request $request)
    {
        $this->guard('web')->logout();
        $request->session()->invalidate();
        return redirect()->route('index');
    }

    
    public function index()
    {
        $teachers =Teacher::orderBy('faculty_number','asc')->get();
        return view('admin.teachers')->with('teachers',$teachers);
    }

    
}
