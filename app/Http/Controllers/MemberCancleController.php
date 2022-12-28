<?php

namespace App\Http\Controllers;

use App\Models\MemberCancle;
use App\Models\transation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MemberCancleController extends Controller
{
        public function index(){
            $user_data = User::find(Auth::id());

            if($user_data->role =='admin' or $user_data->role == 'cashier'){
                $self_request = MemberCancle::all();

            }else{
                $self_request = MemberCancle::where('user_id',Auth::id())->get();
            }



            $user_paid_amount = transation::where('user_id',Auth::id())
                ->where('status','paid')
                ->sum('amount');




            return view('member_cancle',compact('user_data','self_request','user_paid_amount'));
        }


        public function submit(Request $request){
            $request->validate([
                'reason' => 'required',
                'title'=> 'required',
            ]);


           MemberCancle::create([
               'user_id'=>Auth::id(),
               'title' =>$request->title,
               'reason' =>$request->reason,
               'status'=>'pending',
           ]);
            return back()->with('success',' Cancel Request added successfully');
        }



    public function approve_member($id){
        $user=  MemberCancle::find($id);

       (User::find($user->user_id))->update([
           'user_status'=>'Rejected'
       ]);

        DB::table('transations')->where('user_id',$user->user_id)->update( [ 'status' => 'rejected'] );


        $user->update([
            'status' =>'approve'
        ]);
        return back()->with('success',' Approve successfully');
    }

    public function pending_member($id){
        $user=  MemberCancle::find($id);
        $user->update([
            'status' =>'pending'
        ]);
        return back()->with('success',' pending successfully');
    }

    public function reject_member($id){
        $user=  MemberCancle::find($id);
        $user->update([
            'status' =>'rejected'
        ]);
        return back()->with('success',' Reject successfully');
    }

    public function delete_member($id){
       MemberCancle::destroy($id);
        return back()->with('success',' Delete successfully');
    }
}
