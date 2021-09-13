<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware(['guest']);
    }

    public function index()
    {
        return view('auth.register');
    }

    public function store(Request $request) //request object named $request
    {
        
        //validate
        $this->validate($request, [
            'name' => 'required|max:225',
            'username' => 'required|max:225',
            'email' => 'required|email|max:225',
            'password' => 'required|confirmed', //checking with confirm password
        ]);
        
        //store data
        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        //sign in user
        Auth::attempt($request->only('email','password'));

        //redirect
        return redirect()->route('DASH');
    }
}
