<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AuthMiddleware;
use App\Http\Middleware\RequestCounterMiddleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function (Request $request) {
    $user = Auth::user();

    $name = $user != null ? $user->name : "guest";
    // $name = null;
    // if ($user) {
    //     $name = $user->name;
    // } else {
    //     $name = '';
    // }

    // compact('name', 'age') => [ 'name' => $name,  'age' => $age ]
    return view('welcome', compact('name'));
});

Route::get('/about-us', function () {
    return view('about-us');
});


Route::get('/posts', [PostController::class, 'index'])->name('home');
Route::get('/posts/create', [PostController::class, 'create'])->middleware('auth');
Route::post('/posts/create', [PostController::class, 'store']);
Route::get('/posts/{post}', [PostController::class, 'show'])->name('single_post');

Route::post('/posts/{post}/comments', [CommentController::class, 'store'])->middleware('auth');

Route::get('/register', [AuthController::class, 'getRegisterForm'])->middleware('guest');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'getLoginForm'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth');


Route::get('/users/{user}', [UserController::class, 'show'])->name('user_posts');
