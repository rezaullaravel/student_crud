<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;


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

// Route::get('/', function () {
//     return view('');
// });

/*all class route start */
 Route::get('/',[StudentController::class,'index']);
 Route::post('/class/store',[StudentController::class,'StoreClass'])->name('classs.store');
 Route::get('/class/edit/{id}',[StudentController::class,'EditClass'])->name('edit.class');
 Route::post('/class/update',[StudentController::class,'UpdateClass'])->name('classs.update');
 Route::get('/class/delete{id}',[StudentController::class,'DeleteClass'])->name('delete.class');
 /*all class route end*/


 /*all section route start */
 Route::get('/section/view',[StudentController::class,'SectionView']);
 Route::post('/section/store',[StudentController::class,'StoreSection'])->name('section.store');
 Route::get('/section/edit/{id}',[StudentController::class,'EditSection'])->name('edit.section');
 Route::post('/section/update',[StudentController::class,'UpdateSection'])->name('section.update');
 Route::get('/section/delete{id}',[StudentController::class,'DeleteSection'])->name('delete.section');
 /*all section route end*/


 /*all student route start */
 Route::get('/student/view',[StudentController::class,'StudentView']);
 Route::post('/student/store',[StudentController::class,'StoreStudent'])->name('student.store');
 Route::get('/section/edit/{id}',[StudentController::class,'EditSection'])->name('edit.section');
 Route::post('/section/update',[StudentController::class,'UpdateSection'])->name('section.update');
 Route::get('/section/delete{id}',[StudentController::class,'DeleteSection'])->name('delete.section');

 Route::get('/class/section/ajax/{class_id}',[StudentController::class,'GetSection']);
 /*all student route end*/

