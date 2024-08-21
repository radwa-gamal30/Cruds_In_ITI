<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\Track;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Controllers\Log;
use Illuminate\Container\Attributes\Log as AttributesLog;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
           
    $students=Student::all();
    
    return view('students.students',compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tracks=Track::all();
        return view('students.create_student',compact('tracks'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $request->validate([
            'name' => 'required|min:2',
            'email' => 'required|email|max:255|unique:students',
            'grade' => 'required|numeric|min:1|max:100',
            'gender' => 'required',
            'image' => 'nullable|required|mimes:jpeg,jpg,png,gif|max:2048',
            'track_id' => 'required|exists:tracks,id',
            'address' => 'required|min:5',
        ]);
    
        $imagePath=null;
        if ($request->hasFile('image')) {
            $imagePath=$request->file('image')->store('students');

        }
        
    
        Student::create([
            'name'=>request()->input('name'),
            'email'=>request()->input('email'),
            'gender'=>request()->input('gender'),
            'grade'=>request()->input('grade'),
            'image'=>$imagePath,
            'track_id'=>request()->input('track_id'),
            'address'=>request()->input('address'),
        ]);

        dd(Student::all());

        return redirect()->route('students.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $student=Student::findOrFail($id);
        if(!$student){
            abort('Student is not Found\n please try again');
        }
        // dd($student->name);
        return view('students.student',compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $student=Student::findOrFail($id);
    return view('students.update_student',compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validate= $request->validate([
            'name' => 'required|min:2',
            'email' => 'required|email|max:255|unique:students,email',
            'grade' => 'required|numeric|min:1|max:100',
            'gender' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png,gif|max:2048',
            'address' => 'required|min:5'
        ],[
            'email.unique' => 'This email already exists',
            'image.required' => 'An image is required',
            'grade.numeric' => 'The grade must be a number'
        ]);
    
    
    $student=Student::findOrFail($id);
    
    if ($request->hasFile('image')) {
       
        $imagename = time() . '.' . $request->image->extension();
        $imagePath = $request->file('image')->storeAs('resources/images', $imagename, 'public');
    
        $validate['image']=$imagePath;
    
    }
    $student->update($validate);
    
    return redirect(route('students.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $student=Student::findOrFail($id)->delete();
        return redirect()->route('students.index');
    }
}
