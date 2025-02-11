<?php

namespace App\Http\Controllers;

use App\Models\courses;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //The Main page is at UserController@index
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = User::select('name')->from('users')->where('id','=',Auth::id())->get();
        return view ('course.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        courses::create(
            [
                'name' => $request->input('course_name'),
                'description' => $request->input('course_description'),
                'field' => $request->input('course_field'),
                'duration' => $request->input('course_duration'),
                'user_id' => Auth::id(),
            ]
            );

            return redirect('/');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
