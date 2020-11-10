<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FirebaseController;
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

Route::get('/',[FirebaseController::class, 'index'])->name('index');

Route::get('/add', [FirebaseController::class, 'add'])->name('add');
Route::get('/delete/{id}', [FirebaseController::class, 'delete'])->name('delete');
Route::get('/loadUpdate/{id}', [FirebaseController::class, 'loadupdate'])->name('loadUpdate');
Route::get('/update', [FirebaseController::class, 'update'])->name('update');
