<?php

namespace App\Http\Controllers\api;

use App\Models\Track;
use App\Models\Course;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class course_controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::with('tracks')->get(); 
        // return response()->json($courses);
        return $courses;
       }

   
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $course=new Course();
        $course->name=$request->name;
        $course->duration=$request->duration;
        $course->save();
        return response()->json(['message'=>'Course created successfully']);
        


    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        // $course=Course::with('tracks')->find($id);
        return $course;
    }

   

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,Course $course)
    {
        $course->name=$request->name;
        $course->duration=$request->duration;
        $course->save();
        return response()->json(['message'=>'Course updated successfully']);
       
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        $course->delete();
        return response()->json(['message'=>'course has been deleted !']);
    }
}
