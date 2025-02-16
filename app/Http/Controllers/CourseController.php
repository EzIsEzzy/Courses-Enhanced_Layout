<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses= Course::where('user_id',Auth::id())->get();
        $user = Auth::user();
        return view('course.index', compact('user', 'courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorization();
        $user = Auth::user();
        return view ('course.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorization();
        //validate info and set rules for it
        $request->validate([
            'name' => ['required', 'string'],
            'description' => ['nullable', 'string'],
            'price' => ['required', 'numeric'],
            'field' => ['required', 'string'],
            'duration' => ['required', 'numeric'],
            'image' => ['image', 'max:10000', 'mimes:png,jpg,jpeg'],
        ]);
        //form the array containing the data
        $data = [
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'duration' => $request->duration,
            'field' => $request->field,
            'user_id' => Auth::id(),
        ];
        //check if the file image has been uploaded or not
        $data['image'] = $this->uploadImage($request);

        //create the course
        Course::create($data);

            return redirect()->route('courses.index')->with('success', 'Course Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $this->authorization();
        $course = Course::findOrFail($id);
        $user = Auth::user();
        return view ('course.show', compact('course', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $this->authorization();
        $course = Course::findOrFail($id);
        $user = Auth::user();
        return view ('course.edit', compact('course', 'user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //verify the action
        $this->authorization();

        //validate info
        $request->validate([
            'name' => ['required', 'string'],
            'description' => ['nullable', 'string'],
            'price' => ['required', 'numeric'],
            'field' => ['required', 'string'],
            'duration' => ['required', 'numeric'],
            'image' => ['image', 'max:10000', 'mimes:png,jpg,jpeg'],
        ]);
        //form the array containing the data
        $data = [
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'duration' => $request->duration,
            'field' => $request->field,
        ];
        //get the original course information
        $course = Course::findOrFail($id);

        $data['image'] = $this->uploadImage($request,$course->image);

        //update the course
        $course->update($data);

        //redirect to the main page
        return redirect()->route('courses.index')->with('success', 'Course Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //find the course to be deleted
        $course = Course::findOrFail($id);

        //authorize the user
        $this->authorization();

        //delete the image if exists
        if ($course->image) {
        Storage::disk('public')->delete($course->image);
        }
        //delete the course
        $course->delete();

        //redirect with successful deletion
        return redirect()->route('courses.index')->with('success', 'Course Deleted Successfully');
    }
    private function uploadImage(Request $request, ?string $originalImage = null)
    {
        if($request->hasFile('image'))
        {
            $image = $request->file('image');
            $url = Storage::disk('public')->putFileAs('courses', $image, Str::random(10).'.'.$image->extension());
            if($originalImage)
            {
                Storage::disk('public')->delete($originalImage);
            }
            return $url;
        }
        return $originalImage ?? 'courses/default.jpg';
    }
    private function authorization()
    {
        if(!User::findOrFail(Auth::id()))
            return redirect()->route('courses.index')->with('error', 'Unauthorized action!');
    }
}
