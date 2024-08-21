<?php

namespace App\Http\Controllers\api;

use App\Models\Track;
use App\Models\Course;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::with('tracks')->get(); 
        return view('courses.courses', compact('courses'));    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $tracks = Track::all();
         return view('courses.create_course', compact('tracks'));    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validate=  $request->validate([
            'name' => 'required|min:2|max:255|unique:courses,name',
            'duration' => 'string|nullable',
            'tracks_id' => 'required|exists:tracks,id',
        ], [
            'name.unique' => 'This course already exists',
            'name.required' => 'You must include the course name',
        
        ]);


        $course = Course::create($validate);
        $course->tracks()->sync($request->input('tracks'));
        dd($request->input('tracks'));
        return redirect()->route('courses.index');   
 }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $course=Course::with('tracks')->find($id);
        return view('courses.course',compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $courseId)
    {
            
        // $trackNames = Course::allNames();
        $course = Course::findOrFail($courseId);
        $tracks = Track::all();
    
        return view('courses.update_course', compact('course','tracks'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validate= $request->validate([
            'name' => 'required|min:2|max:255|course:unique',
            'track_id'=>'numeric|required',
            'duration'=>'string|nullable'
        ],[
            'name.unique' => 'This course already exists',
            'name.required' => 'should include course name',
            'track_id.numeric' => 'The id must be a number'
        ]);
        
       $course=Course::findOrFail($id);

       $course->update($request->all());
       $course->tracks()->sync($request->tracks);
       return to_route('courses.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $course=Course::findOrFail($id)->delete();
        return redirect()->route('courses.index');
    }
}
