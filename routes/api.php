<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::resource('students', Api\StudentController::class);
// Route::post('students/{student}/update', [Api\StudentController::class, 'update']);
// Route::post('students/{student}/destroy', [Api\StudentController::class, 'destroy']);
