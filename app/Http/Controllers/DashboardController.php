<?php

namespace App\Http\Controllers;

use App\Mail\PostLiked;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class DashboardController extends Controller
{
    

    public function __construct()
    {
        $this->middleware(['auth']);  //direct ke Authenticate middelware route. Prevent from buka page lain selain login
    }

    public function index()
    {
        // $user = auth()->user();

        // Mail::to($user)->send(new PostLiked());

        return view('dashboard');
    }
}
