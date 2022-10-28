<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    //
    public function index()
    {
        
        return view('login');
    }
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',

        ]);

        if (Auth::attempt([ 'email' => $request->email, 'password' => $request->password ], $request->remember)) {
            // if successful -> redirect forward
            return redirect()->intended('dashboard');
        }

        // if unsuccessful -> redirect back
        return redirect()->back()->withErrors([
            'message', 'Login details are not valid',
        ]);
    }

    public function dashboard()
    {
        // if(Auth::check()){
        //     $id =  Auth::id();
        // print_r($id);
        $user = Auth::user();
        // print_r($user->name);
            return view('dashboard', ['username' => $user->name]);
        // }
  
        // return redirect("login")->with('message', 'You are not allowed to access');
    }

    public function logout() {
        Session::flush();
        Auth::logout();
  
        return Redirect('login');
    }
}
