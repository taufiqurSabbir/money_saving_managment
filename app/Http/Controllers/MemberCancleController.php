<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MemberCancleController extends Controller
{
        public function index(){
            $user_data = User::find(Auth::id());

            return view('member_cancle',compact('user_data'));
        }
}
