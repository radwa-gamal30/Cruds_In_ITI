<?php

namespace App\Http\Controllers;

use App\Models\Students;


use Illuminate\Http\Request;
// use Illuminate\Support\Facades\View;

class student_controller extends Controller
{


    public function index(){
     
    $students=Students::all();
    return view('students.studentsData',compact('students'));
    
    
    }
    
    
        public function create()
        {
            return view('students.create');
        }

        public function store(Request $request){
           $validate= $request->validate([
                'name' => 'required|min:2',
                'email' => 'required|email|max:255|unique:students',
                'grade' => 'required|numeric|min:1|max:100',
                'gender' => 'required',
                'image' => 'required|mimes:jpeg,jpg,png,gif|max:2048',
                'address' => 'required|min:5'
            ],[
                'email.unique' => 'This email already exists',
                'image.required' => 'An image is required',
                'grade.numeric' => 'The grade must be a number'
            ]);
      
            $student=new Students;
            $student->name = $request->input('name');
            $student->email = $request->input('email');
            $student->grade = $request->input('grade');
            $student->gender = $request->input('gender');
            $student->address = $request->input('address');
            $student->image = $request->input('image');
           
    
        if($request->hasFile('image')){
            $image = $request->file('image');
    
            $imagename = time() . '.' . $image->extension();
    
            $imagePath = $request->file('image')->storeAS('resources/images', $imagename, 'public');
    
            $student->image =$imagePath;
        } else {
            $student->image = '/resources/images/default.png';
        }
     
        $student->save();
            // @dd($request->all(),$request->file('image'));
        Students::create($validate);
        return redirect(route('students.index'));
     
    
    }

    public function viewSingleStudent($id){
    
        $student=Students::findOrFail($id);
        if(!$student){
            abort('Student is not Found\n please try again');
        }
        // dd($student->name);

        return view('students.studentData',compact('student'));
    }

    
 



   







public function edit($id){
    $student=Students::findOrFail($id);
    return view('students.update',compact('student'));
}    

public function update(Request $request,$id){
    $validate= $request->validate([
        'name' => 'required|min:2',
        'email' => 'required|email|max:255|unique:students',
        'grade' => 'required|numeric|min:1|max:100',
        'gender' => 'required',
        'image' => 'required|mimes:jpeg,jpg,png,gif|max:2048',
        'address' => 'required|min:5'
    ],[
        'email.unique' => 'This email already exists',
        'image.required' => 'An image is required',
        'grade.numeric' => 'The grade must be a number'
    ]);


$student=Students::findOrFail($id);
$studentUpdateData=$request->except('image');
if ($request->hasFile('image')) {
    // Validate the image
    $request->validate([
        'image' => 'mimes:jpeg,jpg,png,gif|max:2048' 
    ]);
    $imagename = time() . '.' . $request->image->extension();
    $imagePath = $request->file('image')->storeAS('resources/images', $imagename, 'public');

    $studentUpdateData['image']=$imagePath;

}
$student->update($studentUpdateData);
// dd($studentUpdateData['image']);
// $student->save();
return redirect(route('students.index'));


}




public function destroy(Request $request,$id){
    $student=Students::find($id);
    $student->delete();
    
    return redirect()->route('students.index')->with('status','Student deleted successfully');
}


}
