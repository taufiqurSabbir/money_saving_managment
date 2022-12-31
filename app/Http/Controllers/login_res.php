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
              return redirect(route('admin.dashboard'));

       }else{
           return back()->with('failed','Not matched');
       }
    }



    public function res_submit(Request $request){

        $request->validate([
            'name' =>'required',
            'phone' =>'required|numeric|alpha_dash|unique:users|min:11',
            'profile_image'=>'required|mimes:jpg,bmp,png',
            'password' =>'required'
        ]);


        $image_name = rand().'.'.$request->profile_image->extension();
        request('profile_image') ->move('image/profile_picture',$image_name);


            User::create([
                'name' => $request->name,
                'phone' => $request->phone,
                'profile_picture' => $image_name,
                'password' => bcrypt($request->password),
            ]);

            return redirect(route('login.index'))->with('success','Successful, Login here');
    }

    public function logout(){
        auth::logout();
        return redirect(route('login.index'));
    }
}
