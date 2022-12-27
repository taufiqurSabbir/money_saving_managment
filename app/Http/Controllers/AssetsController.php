<?php

namespace App\Http\Controllers;

use App\Models\Assets;
use App\Models\LoanRequest;
use App\Models\Notics;
use App\Models\profits;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AssetsController extends Controller
{
    public function index()
    {
        $user_data = User::find(Auth::id());

        $asset = Assets::orderBy('id', 'DESC')->get();
        $asset_count = Assets::all()->count();
        $added_profit = profits::sum('amount');
        $asset_profit = Assets::sum('profit');


        return view('dashboard.asset', compact('user_data','asset','asset_count','asset_profit','added_profit'));
    }


    public function submit(Request $request){
        $request->validate([
            'name' => 'required',
            'location'=> 'required',
            'buy_amount'=> 'required',
            'return_amount'=> 'required',
            'return_type'=> 'required',
            'from_date'=> 'required',
            'to_date'=> 'required',
        ]);
            Assets::create([
                'name'=>$request->name,
                'location'=>$request->location,
                'buy_amount'=>$request->buy_amount,
                'profit' => $request->return_amount - $request->buy_amount,
                'return_type' =>$request->return_type,
                'return_amount'=>$request->return_amount,
                'from_date'=>$request->from_date,
                'to_date'=>$request->	to_date,
            ]);



        return back()->with('success',' Asset added successfully');
    }


    public function delete($id){
        Assets::destroy($id);

        return back()->with('success',' Delete successfully');
    }
}
