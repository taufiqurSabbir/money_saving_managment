<?php

namespace App\Http\Controllers;

use App\Models\Notics;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NoticsController extends Controller
{
   public function index()
   {
       $user_data = User::find(Auth::id());
       $notice = Notics::orderBy('id', 'DESC')->get();



       return view('dashboard.notic', compact('user_data','notice'));
   }


    public function submit(Request $request){

        $request->validate([
            'title' => 'required',
            'notice'=> 'required',
            'from_date'=> 'required',
            'to_date'=> 'required',
        ]);

        Notics::create([
           'user_id' => Auth::id(),
            'title' => $request->title,
            'details'=>$request->notice,
            'from_date' => $request->from_date,
            'to_date'=>$request->to_date,
        ]);


        return back()->with('success',' Request added successfully');
    }

    public function single_notice($id){
        $user_data = User::find(Auth::id());
        $notice = Notics::where('id', $id)->first();
        return view('dashboard.notice_single', compact('user_data','notice'));
    }
}
