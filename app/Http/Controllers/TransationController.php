<?php

namespace App\Http\Controllers;

use App\Models\transation;
use App\Models\Years;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransationController extends Controller
{
    public function add_amount(Request $request){
        $request->validate([
            'user' =>'required',
            'month' =>'required',
            'year' =>'required',
            'payment_type'=>'required',
            'amount'=>'required'
        ]);


        transation::create([
            'amount' =>$request->amount,
            'type'=>$request->payment_type,
            'month_id'=>$request->month,
            'year_id'=>$request->year,
            'Collect_by '=>Auth::id(),
            'paid_date '=>date('d/m/Y' ),

        ]);

        dd($request->all());
    }

    public function addyear(Request $request){

        $request->validate([
            'year' =>'required',
        ]);

        Years::create([
            'year'=> $request->year,
        ]);
        return back()->with('success','Year Added Successfully');
    }
}
