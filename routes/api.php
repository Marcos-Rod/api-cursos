<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\LoginController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post('login', [LoginController::class, 'login']);
Route::get('cursos', CourseController::class);
Route::get('cursos/{category}/{level?}', [CourseController::class, 'store']);
Route::post('cursos/{course}/enrolled', [CourseController::class, 'enrolled'])
    ->middleware('auth:sanctum');

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
