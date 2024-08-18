<?php

namespace App\Http\Controllers;



use App\Models\Students;
use Illuminate\Support\Str;


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
      
        if($request->hasFile('image')){
            $image = $request->file('image');
    
            $imageOriginalname = pathinfo($image->getClientOriginalName(),PATHINFO_FILENAME);
            $imageExe=$image->getClientOriginalExtension();
            $randomString = Str::random(6);
            $imagesaveas=$imageOriginalname.'_'.$randomString.'.'.$imageExe;

            $imagePath = $request->file('image')->storeAs('/resources/images', $imagesaveas, 'public');
           $validate['image'] =$imagePath;
        } else {
            $validate['image'] = 'resources/images/default.png';
        }
    
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


$student=Students::findOrFail($id);

if ($request->hasFile('image')) {
   
    $imagename = time() . '.' . $request->image->extension();
    $imagePath = $request->file('image')->storeAs('resources/images', $imagename, 'public');

    $validate['image']=$imagePath;

}
$student->update($validate);

return redirect(route('students.index'));


}




public function destroy($id){
    $student=Students::findOrFail($id)->delete();
    return redirect()->route('students.index');
}


}
