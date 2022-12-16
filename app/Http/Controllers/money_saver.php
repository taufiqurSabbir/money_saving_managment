<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class money_saver extends Controller
{
   public function index(){
       $user_data = User::find(Auth::id());

       return view('dashboard.money_saver.dashboard',compact('user_data'));
   }
}
