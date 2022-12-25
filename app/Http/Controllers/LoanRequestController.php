<?php

namespace App\Http\Controllers;

use App\Models\LoanRequest;
use App\Models\transation;
use App\Models\User;
use App\Models\Years;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class LoanRequestController extends Controller
{
    public function index()
    {
        $user_data = User::find(Auth::id());

       $admin = User::where('id',auth::id())->first();

      if ($admin->role=='admin' or $admin->role=='cashier'){
          $loan_request = LoanRequest::all();
      }else{
          $loan_request = LoanRequest::where('user_id',Auth::id())->get();
      }



        return view('dashboard.loan', compact('user_data','loan_request'));
    }

    public function submit_loan(Request $request){


        $paid_amount = \App\Models\transation::where('user_id',Auth::id())->where('status','paid')->sum('amount');
        $due_amount = \App\Models\transation::where('user_id',Auth::id())->where('status','Due')->sum('amount');

        $current_balance =  $paid_amount - $due_amount;

        $request->validate([
            'amount' =>"required|numeric|max:$current_balance",
            'reason' =>'required',
            'need_date' =>'required',
            'pay_date'=>'required',
        ]);

        LoanRequest::create([
           'user_id' =>Auth::id(),
            'reason' => $request->reason,
            'amount' =>$request->amount,
            'status'=> 'pending',
            'need_date' => $request->need_date,
            'paid_date' => $request->pay_date,
        ]);


        return back()->with('success',' Request added successfully');
    }


    public function reject($id){
        $user=  LoanRequest::find($id);
        $user->update([
            'status' =>'reject'
        ]);
        return back()->with('success',' Make rejected successfully');
    }

    public function approve($id){
        $user= LoanRequest::find($id);
        $date = Carbon::parse($user->need_date);

        $year = Years::where('year',$date->year)->first('id');



        transation::create([
            'amount'=>$user->amount,
            'type'=>'loan',
            'month_id'=>$date->month,
            'year_id'=>$year->id,
            'collect_by'=>Auth::id(),
            'paid_date'=>$user->paid_date,
            'user_id'=>$user->user_id,
            'status'=>'Due',
        ]);

        $user->update([
            'status' =>'approve'
        ]);

        return back()->with('success',' Approved successfully');
    }

    public function delete($id){
        LoanRequest::destroy($id);

        return back()->with('success',' Delete successfully');
    }

}
