<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class login_res extends Controller
{
    public function login_index(){
        return view('login');
    }


    public function res_index(){
        return view('res');
    }

    public function login_submit(){
        return(dd(request()));
    }
}
