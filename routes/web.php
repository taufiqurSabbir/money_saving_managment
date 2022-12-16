<?php

use App\Http\Controllers\admin;
use App\Http\Controllers\cashier;
use App\Http\Controllers\login_res;
use App\Http\Controllers\money_saver;
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
Route::post('/registation',[login_res::class,'res_submit'] )->name('registation.submit');




Route::get('admin/dashboard', [admin::class,'index'])->name('admin.dashboard');
Route::get('admin/all/user',[admin::class,'all_user'])->name('all.user');
Route::get('user/approve/{id}', [admin::class,'approve_user'])->name('approve.user');
Route::get('user/pending/{id}', [admin::class,'pending_user'])->name('pending.user');
Route::get('user/reject/{id}', [admin::class,'reject_user'])->name('reject.user');
Route::get('change/role', [admin::class,'change_role'])->name('change.role.index');
Route::post('change/role', [admin::class,'change_role_submit'])->name('change.role');


Route::get('money-saver/dashboard', [money_saver::class, 'index'])->name('money_saver.dashboard');

Route::get('cashier/dashboard', [cashier::class,'index'])->name('cashier.dashboard');
