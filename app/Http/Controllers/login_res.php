<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class login_res extends Controller
{
    public function login_index(){
        return view('login');
    }


    public function res_index(){
        return view('res');
    }

    public function login_submit(Request $request){
        $request->validate([
            'phone' =>'required|numeric|alpha_dash|min:11',
            'password' =>'required'
        ]);

       if(Auth::attempt([
           'phone' => $request->phone,
           'password' => $request->password,
       ])){
           $user = User::find(Auth::id());
           $role = $user['role'];

           if($role =='admin'){
              return redirect(route('admin.dashboard'));
           }else if($role == 'money_saver'){
                return redirect(route('money_saver.dashboard'));
           }else if($role == 'cashier'){
               return redirect(route('cashier.dashboard'));
           }

       }
    }



    public function res_submit(Request $request){

        $request->validate([
            'name' =>'required',
            'phone' =>'required|numeric|alpha_dash|unique:users|min:11',
            'password' =>'required'
        ]);

        User::create([
            'name'=>$request->name,
            'phone'=>$request->phone,
            'password'=>bcrypt($request->password),
        ]);


            return redirect(route('login.index'))->with('success','Successful, Login here');
    }
}
