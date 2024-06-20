<?php

use App\Http\Controllers\Api\V1\CourseController;
use App\Http\Controllers\Api\V1\StudentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix'=>'v1','namespace'=>'App\Http\Controllers\Api\V1','middleware'=>'auth:sanctum'],function () {
    Route::apiResource('students', StudentController::class);
    Route::apiResource('courses', CourseController::class);
    Route::post('courses/bulk',['uses' => 'CourseController@bulkstore']);
    Route::get('students/{id}', 'App\Http\Controllers\Api\V1\StudentController@show'); 
    Route::put('students/{id}', 'App\Http\Controllers\Api\V1\StudentController@update'); 
    Route::delete('students/{id}', 'App\Http\Controllers\Api\V1\StudentController@destroy');
});