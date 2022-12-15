<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class admin extends Controller
{
   public function index()
   {
       $user_data = User::find(Auth::id());

       return view('dashboard.admin.dashboard',compact('user_data'));
   }


}
