<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class money_saver extends Controller
{
   public function index(){
       return view('dashboard.money_saver.dashboard');
   }
}
