<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\UserController;
use App\Models\Course;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $user = Auth::user();
    $courses = Course::where('user_id','=',Auth::id());
    return view('course.index', compact('courses', 'user'));
});

Route::resource('courses',CourseController::class);
// Route::resource('/',UserController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
