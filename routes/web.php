<?php

use App\Http\Controllers\course_controller;
use App\Http\Controllers\student_controller;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\track_controller;
use App\Models\Students;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
/// students
Route::get('/students',[student_controller::class,'index'])->name('students.index');
// //
Route::get('/students/create',[student_controller::class,'create'])->name('students.create');
// //
Route::post('/students/store',[student_controller::class,'store'])->name('students.store');
// //
Route::get('/students/{id}/edit',([student_controller::class,'edit']))->name('students.edit');
// //
Route::Put('/students/{id}/update',([student_controller::class,'update']))->name('students.update');
// //
Route::get('/students/{id}',[student_controller::class,'viewSingleStudent'])->name('students.viewSingleStudent');




//// tracks
Route::get('/tracks',[track_controller::class,'index'])->name('tracks.index');
// 
// //
Route::get('/tracks/create',[track_controller::class,'create'])->name('tracks.createtrack');
// //
Route::post('/tracks/store',[track_controller::class,'store'])->name('tracks.store');
// //
Route::get('/tracks/{id}/edit',([track_controller::class,'edit']))->name('tracks.edit_track');
// //
Route::put('/tracks/{id}/update',([track_controller::class,'update']))->name('tracks.update_track');
// //
Route::get('/tracks/{id}',[track_controller::class,'trackview'])->name('tracks.trackview');




// courses
Route::get('/course',[track_controller::class,'index'])->name('courses.index');
// 
// //
Route::get('/course/create',[track_controller::class,'create'])->name('courses.create_course');
// //
Route::post('/course/store',[track_controller::class,'store'])->name('courses.store');
// //
Route::get('/course/{id}/edit',([track_controller::class,'edit']))->name('courses.edit_course');
// //
Route::put('/course/{id}/update',([track_controller::class,'update']))->name('courses.update_course');
// //
Route::get('/course/{id}',[track_controller::class,'show'])->name('courses.show');



//////
Route::delete('delete/{id}',[student_controller::class,'destroy'])->name('students.destroy');
// //
Route::delete('delete/{id}',[track_controller::class,'destroy'])->name('tracks.destroy');
///////////
Route::delete('delete/{id}',[course_controller::class,'destroy'])->name('course.destroy');