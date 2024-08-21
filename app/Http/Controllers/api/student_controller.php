<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;

class student_controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students=Student::all();
        // return response()->json($students);
        return $students;

      }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $student=new Student();
        $student->name=$request->input('name');
        $student->email=$request->input('email');
        $student->grade=$request->input('grade');
        $student->gender=$request->input('gender');
        $student->image=$request->input('image');
        $student->track_id=$request->input('track_id');
        $student->address=$request->input('address');
       $student->save();
       return response()->json(['success'=>'new student has been added']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        return $student;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        $student->name=$request->input('name');
        $student->email=$request->input('email');
        $student->grade=$request->input('grade');
        $student->gender=$request->input('gender');
        $student->image=$request->input('image');
        $student->track_id=$request->input('track_id');
        $student->address=$request->input('address');
        $student->save();
        return response()->json(['success'=>'student has been updated']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        $student->delete();
        return  response()->json(['message'=>'Student deleted successfully']);
    }
}
