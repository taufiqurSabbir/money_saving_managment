<?php

namespace App\Http\Controllers;

use App\Models\Assets;
use App\Models\Expenses;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExpensesController extends Controller
{
   public function index(){
       $user_data = User::find(Auth::id());
       $all_user = User::all();
       $expense  = Expenses::all();

       $total_expense= Expenses::sum('amount');
       $count_expense= Expenses::count();


       return view('expense',compact('user_data','all_user','expense','total_expense','count_expense'));
   }

   public function submit(Request $request){
       $request->validate([
           'reason' => 'required',
           'details'=> 'required',
           'date'=> 'required',
           'amount'=> 'required|numeric',
           'expense_by'=> 'required',
       ]);

       Expenses::create([
           'expense_reason'=>$request->reason,
           'amount'=>$request->amount,
           'details'=>$request->details,
           'expense_by'=>$request->expense_by,
           'expense_date'=>$request->date,

       ]);
       return back()->with('success',' Expense added successfully');
   }

    public function delete($id){
        Expenses::destroy($id);

        return back()->with('success',' Delete successfully');
    }
}
