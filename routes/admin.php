<?php

use App\Http\Controllers\login_res;
use Illuminate\Support\Facades\Route;



Route::get('/',[login_res::class,'login_index'] )->name('login.index');




