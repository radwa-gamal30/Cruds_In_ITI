<?php

use App\Http\Controllers\api\CoursesController;
use App\Http\Controllers\api\StudentsController;
use App\Http\Controllers\api\TracksController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


/// students
Route::get('/students',[StudentsController::class,'index'])->name('students.index');
// //
Route::get('/students/create',[StudentsController::class,'create'])->name('students.create');
// //
Route::post('/students/store',[StudentsController::class,'store'])->name('students.store');
// //
Route::get('/students/{id}/edit',([StudentsController::class,'edit']))->name('students.edit');
// //
Route::Put('/students/{id}/update',([StudentsController::class,'update']))->name('students.update');
// //
Route::get('/students/{id}',[StudentsController::class,'show'])->name('students.show');




//// tracks
Route::get('/tracks',[TracksController::class,'index'])->name('tracks.index');
// 
// //
Route::get('/tracks/create',[TracksController::class,'create'])->name('tracks.create_track');
// //
Route::post('/tracks/store',[TracksController::class,'store'])->name('tracks.store');
// //
Route::get('/tracks/{id}/edit',([TracksController::class,'edit']))->name('tracks.edit_track');
// //
Route::put('/tracks/{id}/update',([TracksController::class,'update']))->name('tracks.update_track');
// //
Route::get('/tracks/{id}',[TracksController::class,'show'])->name('tracks.show');




// courses
Route::get('/courses',[CoursesController::class,'index'])->name('courses.index');
// 
// //
Route::get('/courses/create',[CoursesController::class,'create'])->name('courses.create_course');
// //
Route::post('/courses/store',[CoursesController::class,'store'])->name('courses.store');
// //
Route::get('/courses/{id}/edit',([CoursesController::class,'edit']))->name('courses.edit_course');
// //
Route::put('/courses/{id}/update',([CoursesController::class,'update']))->name('courses.update_course');
// //
Route::get('/courses/{id}',[CoursesController::class,'show'])->name('courses.show');



//////
Route::delete('students/{id}',[StudentsController::class,'destroy'])->name('students.destroy_student');

// //
Route::delete('tracks/{id}',[TracksController::class,'destroy'])->name('tracks.destroy_track');

///////////

Route::delete('courses/{id}',[CoursesController::class,'destroy'])->name('courses.destroy_course');