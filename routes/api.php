<?php

use App\Http\Controllers\api\course_controller;
use App\Http\Controllers\api\student_controller;
use App\Http\Controllers\api\track_controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Laravel\Sanctum\HasApiTokens;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('students',(student_controller::class));
Route::apiResource('tracks',(track_controller::class));
Route::apiResource('courses',(course_controller::class));