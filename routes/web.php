<?php

use App\Http\Controllers\login_res;
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

Route::get('/',[login_res::class,'login_index'] )->name('login.index');
Route::post('/',[login_res::class,'login_submit'] )->name('login.submit');
Route::get('/registation',[login_res::class,'res_index'] )->name('registation.index');
