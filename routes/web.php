<?php

use App\Http\Controllers\CourseController;
use App\Models\Course;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $user = Auth::user();
    $courses = Course::where('user_id','=',Auth::id());
    return view('course.index', compact('courses', 'user'));
});
//Laravel UI & Laravel Breeze
Route::resource('courses',CourseController::class);
//create, edit, destroy, update, store, index, show -> resource

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
