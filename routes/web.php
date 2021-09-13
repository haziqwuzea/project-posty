<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostLikeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/abc', function () {
    return view('welcome');
});

Route::get('/posts', function () {
    return view('posts.index');
});

Route::get('/register', [RegisterController::class, 'index'])->name('REG');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/dashboard', [DashboardController::class, 'index'])->name('DASH');

Route::get('/login', [LoginController::class, 'index'])->name('MASUK');
Route::post('/login', [LoginController::class, 'inlogin']);

Route::post('/logout', [LogoutController::class, 'index'])->name('KELUAR');

Route::get('/', function() 
{
    return view('home');
})->name('home');

Route::get('/posts', [PostController::class, 'index'])->name('HANTAR');
Route::post('/posts', [PostController::class, 'store']);

Route::post('/posts/{post}/likes', [PostLikeController::class, 'store'])->name('posts.likes');
Route::delete('/posts/{post}/likes', [PostLikeController::class, 'deleteLike'])->name('posts.likes');

