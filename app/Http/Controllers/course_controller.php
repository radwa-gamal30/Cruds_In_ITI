<?php

namespace App\Http\Controllers;

use App\Models\Track;
use App\Models\Course;
use Illuminate\Http\Request;

class course_controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $course=Course::all();
        return view('courses.course',compact('courses'));    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('courses.create_course');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
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
  
        $course=new Course();
        $course->name = $request->input('name');
        $course->track_id = $request->input('track_id');
        $course->duration = $request->input('duration');

        $course = Course::create($request->all());
        $course->tracks()->sync($request->tracks);
 
    $course->save();
        // @dd($request->all(),$request->file('image'));
    Course::create($validate);
    return redirect(route('courses.index'));
 

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

       $course->update($$request->all());
       $course->tracks()->sync($request->tracks);
       return to_route('courses.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id){
        $course=Course::findOrFail($id)->delete();
        return redirect()->route('courses.index');
    }
}
