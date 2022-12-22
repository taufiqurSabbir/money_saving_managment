<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoanRequestController extends Controller
{
    public function index()
    {
        $user_data = User::find(Auth::id());

        return view('dashboard.loan', compact('user_data'));
    }

    public function submit_loan(Request $request){
        dd($request->all());

        $paid_amount = \App\Models\transation::where('user_id',Auth::id())->where('status','paid')->sum('amount');
        $due_amount = \App\Models\transation::where('user_id',Auth::id())->where('status','Due')->sum('amount');

        $current_balance =  $paid_amount - $due_amount;

        $request->validate([
            'amount' =>"required|numeric|max:$current_balance",
            'reason' =>'required',
            'need_date' =>'required',
            'pay_date'=>'required',
        ]);

    }
}
