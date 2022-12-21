<?php

namespace App\Http\Controllers;

use App\Models\Assets;
use App\Models\LoanRequest;
use App\Models\Months;
use App\Models\transation;
use App\Models\User;
use App\Models\Years;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class admin extends Controller
{
   public function index()
   {
      $paid=  transation::where([
          ['status','paid']
      ])->sum('amount');

       $due=  transation::where([
           ['status','Due']
       ])->sum('amount');

       $total_user = User::where('user_status','Approved')->count();

       $user_data = User::find(Auth::id());
       $asset = Assets::all()->count();
       $loan_req = LoanRequest::all()->count();

       return view('dashboard.admin.dashboard',compact('user_data','paid','due','total_user','asset','loan_req'));
   }

   public function all_user(){
       $user_data = User::find(Auth::id());
       $all_user = User::all();

       return view('dashboard.admin.pending_user',compact('user_data','all_user'));
}



    public function approve_user($id){
        $user=  User::find($id);
        $user->update([
            'user_status' =>'Approved'
        ]);
        return back()->with('success',$user->name.' Approve successfully');
    }

    public function pending_user($id){
        $user=  User::find($id);
        $user->update([
            'user_status' =>'pending'
        ]);
        return back()->with('success',$user->name.' pending successfully');
    }

    public function reject_user($id){
        $user=  User::find($id);
        $user->update([
            'user_status' =>'Rejected'
        ]);
        return back()->with('success',$user->name.' rejected successfully');
    }



    public function change_role_submit(Request $request){

       User::find($request->user)->update([
           'role' => $request->role
       ]);


        return back()->with('success',' User Role Updated');
    }




}
