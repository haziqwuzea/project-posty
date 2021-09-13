<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware(['guest']);
    }

    public function index() 
    {
        return view('auth.login');
    }

    public function inlogin(Request $request) 
    {
        //validate
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required', //checking with confirm password
        ]);

        //sign in user
        if (!Auth::attempt($request->only('email','password'), $request->remember))
        {
            return back()->with('status','Invalid login details');  //back() is a shortcut to redirect to previous page
        }

        //redirect
        return redirect()->route('DASH');
    }
}
