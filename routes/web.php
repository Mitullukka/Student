<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DemoController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CompanieController;
use App\Http\Controllers\EmployeeController;
use Illuminate\Http\Request;
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
    Route::get('students',[StudentController::class,'index'])->name('student.index');
    Route::post('students',[StudentController::class,'store'])->name('student.store');
    Route::delete('students/{id}',[StudentController::class,'destroy'])->name('student.destroy');
    Route::get('students/{id}',[StudentController::class,'edit'])->name('student.edit');
    Route::PUT('student/{id}',[StudentController::class,'update'])->name('student.update');
});

Route::group(['prefix'=>'companies'],function(){
    Route::get('companie-create',[CompanieController::class,'create'])->name('companies.create');
    Route::get('companie',[CompanieController::class,'index'])->name('companies.index');
    Route::post('companie',[CompanieController::class,'store'])->name('companies.store');
    Route::delete('companie/{id}',[CompanieController::class,'destroy'])->name('companies.destroy');
    Route::get('companie/{id}',[CompanieController::class,'edit'])->name('companies.edit');
    Route::PUT('companie/{id}',[CompanieController::class,'update'])->name('companies.update');
});
    
Route::group(['prefix'=>'employee'],function(){
    Route::get('employee-create',[EmployeeController::class,'create'])->name('employee.create');
    Route::get('employee',[EmployeeController::class,'index'])->name('employee.index');
    Route::post('employee',[EmployeeController::class,'store'])->name('employee.store');
    Route::delete('employee/{id}',[EmployeeController::class,'destroy'])->name('employee.destroy');
    Route::get('employee/{id}',[EmployeeController::class,'edit'])->name('employee.edit');
    Route::PUT('employee/{id}',[EmployeeController::class,'update'])->name('employee.update');
});

// ->middleware('throttle:5,1')
// Route::fallback(function(){
//     return "no Route";
// });

// Route::get('get-all-session',function(){
//     $session = session()->all();
//     print_r($session);
// });

// Route::get('set-session',function(Request $request){
//     $request->session()->put('user_name','hii');
//     $request->session()->put('user_id','1');
//     return redirect('get-all-session');
// });

// Route::get('session-destroy',function(){
//     session()->forget('user_name');
//     return redirect('get-all-session');
// });