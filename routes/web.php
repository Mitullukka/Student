<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DemoController;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/demo',[DemoController::class,'index']);

// Route::group(['prefix'=>'student'],function(){
Route::group(['prefix'=>'student','middleware'=>"web"],function(){
    Route::get('logout',[StudentController::class,'logout']);
    Route::get('dashboard', [StudentController::class, 'dashboard'])->name('dashboard');
    Route::get('student-create', [StudentController::class, 'create'])->name('student.create');
    Route::get('students',[StudentController::class,'index'])->name('student.index')->middleware('throttle:5,1');
    Route::post('students',[StudentController::class,'store'])->name('student.store');
    Route::delete('students/{id}',[StudentController::class,'destroy'])->name('student.destroy');
    Route::get('students/{id}',[StudentController::class,'edit'])->name('student.edit');
    Route::PUT('student/{id}',[StudentController::class,'update'])->name('student.update');
});

// Route::fallback(function(){
//     return "no Route";
// });