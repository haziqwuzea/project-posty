<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    

    public function __construct()
    {
        $this->middleware(['auth']);  //direct ke Authenticate middelware route. Prevent from buka page lain selain login
    }

    public function index()
    {
        //dd(auth()->user()->posts);
        return view('dashboard');
    }
}
