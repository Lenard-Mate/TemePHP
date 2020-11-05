<?php

use Illuminate\Support\Facades\Route;
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
    return view('index');
});

//Route::get('/salut', function () {
   // return view('student/create');
//});

//Route::get('/hello', function () {
   // return view('student/create');
//});

Route::post('/', [StudentController::class,'store'])->name('store');

Route::get('/add', [StudentController::class,'create'])->name('main');

Route::get('/', [StudentController::class,'index'])->name('index');

Route::post('/update', [StudentController::class,'update'])->name('update');

Route::get('/edit', [StudentController::class,'edit'])->name('edit');

