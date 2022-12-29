<?php

use App\Http\Controllers\admin;
use App\Http\Controllers\AssetsController;
use App\Http\Controllers\cashier;
use App\Http\Controllers\ExpensesController;
use App\Http\Controllers\LoanRequestController;
use App\Http\Controllers\login_res;
use App\Http\Controllers\MemberCancleController;
use App\Http\Controllers\money_saver;
use App\Http\Controllers\NoticsController;
use App\Http\Controllers\TransationController;
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
Route::get('/logout',[login_res::class,'logout'] )->name('logout');
Route::post('/registation',[login_res::class,'res_submit'] )->name('registation.submit');




Route::get('admin/dashboard', [admin::class,'index'])->name('admin.dashboard');
Route::get('user/approve/{id}', [admin::class,'approve_user'])->name('approve.user');
Route::get('user/pending/{id}', [admin::class,'pending_user'])->name('pending.user');

Route::get('delete/amount/{id}', [TransationController::class,'delete_tran'])->name('delete_tran');

Route::get('money/paid/{id}', [TransationController::class,'paid'])->name('paid');
Route::get('money/due/{id}', [TransationController::class,'due'])->name('due');

Route::get('user/reject/{id}', [admin::class,'reject_user'])->name('reject.user');
Route::get('change/role', [admin::class,'change_role'])->name('change.role.index');
Route::post('change/role', [admin::class,'change_role_submit'])->name('change.role');
Route::get('all/user',[admin::class,'all_user'])->name('all.user');
Route::post('add/amount', [TransationController::class,'add_amount'])->name('admin.add.amount');
Route::post('add/year', [TransationController::class,'addyear'])->name('admin.add.year');
Route::get('/transaction',[TransationController::class,'transaction'])->name('transaction');
Route::post('/transaction',[TransationController::class,'transaction'])->name('s.transaction');


Route::get('money-saver/dashboard', [money_saver::class, 'index'])->name('money_saver.dashboard');

Route::get('cashier/dashboard', [cashier::class,'index'])->name('cashier.dashboard');

Route::get('loan', [LoanRequestController::class,'index'])->name('loan');

Route::post('loan', [LoanRequestController::class,'submit_loan'])->name('submit.loan');

Route::get('loan/approve/{id}', [LoanRequestController::class,'approve'])->name('loan.approve');
Route::get('loan/reject/{id}', [LoanRequestController::class,'reject'])->name('loan.reject');
Route::get('loan/delete/{id}', [LoanRequestController::class,'delete'])->name('loan.delete');


Route::get('notice',[NoticsController::class,'index'])->name('notice');
Route::post('notice',[NoticsController::class,'submit'])->name('submit.notice');
Route::get('notice/{id}',[NoticsController::class,'single_notice'])->name('single.notice');



Route::get('asset', [AssetsController::class,'index'])->name('asset');
Route::get('asset/delete/{id}', [AssetsController::class,'delete'])->name('asset.delete');
Route::post('asset',[AssetsController::class,'submit'])->name('asset.add');


Route::get('expense',[ExpensesController::class,'index'])->name('expense');
Route::post('expense',[ExpensesController::class,'submit'])->name('submit.expense');
Route::get('expense/delete/{id}', [ExpensesController::class,'delete'])->name('expense.delete');

Route::get('cancel/request/approve/{id}', [MemberCancleController::class,'approve_member'])->name('approve.member_cancel');
Route::get('cancel/request/pending/{id}', [MemberCancleController::class,'pending_member'])->name('pending.member_cancel');
Route::get('cancel/request/reject/{id}', [MemberCancleController::class,'reject_member'])->name('reject.member_cancel');
Route::get('cancel/request/delete/{id}', [MemberCancleController::class,'delete_member'])->name('delete.member_cancel');
Route::get('cancel/request', [MemberCancleController::class,'index'])->name('member_cancel');
Route::post('cancel/request', [MemberCancleController::class,'submit'])->name('submit.member_cancel');

Route::get('user/profile',[admin::class,'user_profile'])->name('user.profile');
