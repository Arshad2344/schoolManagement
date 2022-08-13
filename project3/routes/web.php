<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\StudentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/view-teacher',[TeacherController::class,'viewteacher']);
Route::post('/save-teacher',[TeacherController::class,'saveTeacher'])->name('saveTeacher');
Route::post('/update-teacher',[TeacherController::class,'updateTeacher'])->name('updateTeacher');
Route::get('/delete-teacher/{id}',[TeacherController::class,'deleteteacher'])->name('deleteteacher');

// student route

Route::get('/view-student',[StudentController::class,'viewstudent']);
Route::post('/save-student',[StudentController::class,'savestudent'])->name('savestudent');
Route::post('/update-student',[StudentController::class,'updatestudent'])->name('updatestudent');
Route::get('/delete-student/{id}',[StudentController::class,'deletestudent'])->name('deletestudent');