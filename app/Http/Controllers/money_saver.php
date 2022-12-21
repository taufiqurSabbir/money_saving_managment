<?php

namespace App\Http\Controllers;

use App\Models\transation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class money_saver extends Controller
{
   public function index(){
       $user_data = User::find(Auth::id());
       $total_collect = transation::where('status','paid')->sum('amount');
       $total_due = transation::where('status','Due')->sum('amount');
       $total_user = User::where('user_status','Approved')->count();

       $user_due = transation::where('user_id',Auth::id())->where('status','Due')->sum('amount');
       $user_paid = transation::where('user_id',Auth::id())->where('status','paid')->sum('amount');

       $adjest_amount = $user_paid - $user_due;



       return view('dashboard.money_saver.dashboard',compact('user_data','total_collect','total_due','user_due','user_paid','adjest_amount','total_user'));
   }
}
