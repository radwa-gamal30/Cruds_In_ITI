<?php

use App\Http\Controllers\api\course_controller;
use App\Http\Controllers\api\student_controller;
use App\Http\Controllers\api\track_controller;
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
Route::get('/students/{id}',[student_controller::class,'show'])->name('students.show');




//// tracks
Route::get('/tracks',[track_controller::class,'index'])->name('tracks.index');
// //
Route::get('/tracks/create',[track_controller::class,'create'])->name('tracks.create_track');
// //
Route::post('/tracks/store',[track_controller::class,'store'])->name('tracks.store');
// //
Route::get('/tracks/{id}/edit',([track_controller::class,'edit']))->name('tracks.edit_track');
// //
Route::put('/tracks/{id}/update',([track_controller::class,'update']))->name('tracks.update_track');
// //
Route::get('/tracks/{id}',[track_controller::class,'show'])->name('tracks.show');




// courses
Route::get('/courses',[course_controller::class,'index'])->name('courses.index');
// //
Route::get('/courses/create',[course_controller::class,'create'])->name('courses.create_course');
// //
Route::post('/courses/store',[course_controller::class,'store'])->name('courses.store');
// //
Route::get('/courses/{id}/edit',([course_controller::class,'edit']))->name('courses.edit_course');
// //
Route::put('/courses/{id}/update',([course_controller::class,'update']))->name('courses.update_course');
// //
Route::get('/courses/{id}',[course_controller::class,'show'])->name('courses.show');





//////
Route::delete('students/{id}',[student_controller::class,'destroy'])->name('students.destroy_student');
// //
Route::delete('tracks/{id}',[track_controller::class,'destroy'])->name('tracks.destroy_track');
///////////
Route::delete('courses/{id}',[course_controller::class,'destroy'])->name('courses.destroy_course');