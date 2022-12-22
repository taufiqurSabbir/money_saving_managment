@extends('dashboard.layouts.usermaster')

@section('user_name',$user_data->name)
@section('phone',$user_data->phone)
@section('profile_image',$user_data->profile_picture)

@section('collapsed1','collapsed');
@section('sidebar_name1','Dashboard')
@section('link1',route('admin.dashboard'))
@section('icon1','bi bi-grid')

@section('page_title','Loan Request')

@section('collapsed2','collapsed');
@section('sidebar_name2','All Users')
@section('link2',route('all.user'))
@section('icon2','bi bi-person-check')


@section('collapsed3','collapsed');
@section('sidebar_name3','Transaction')
@section('link3','Dashboard')
@section('icon3','bi bi-cash-coin')

@section('collapsed4','');
@section('sidebar_name4','Loan')
@section('link4','Dashboard')
@section('icon4','bi bi-coin')



@section('collapsed5','collapsed');
@section('sidebar_name5','Notice')
@section('link5','Dashboard')
@section('icon5','bi bi-bell')

@section('collapsed6','collapsed');
@section('sidebar_name6','Asset')
@section('link6','Dashboard')
@section('icon6','bi bi-plus-circle')

@section('collapsed7','collapsed');
@section('sidebar_name7','Expense')
@section('link7','Dashboard')
@section('icon7','bi bi-dash-circle')

@section('collapsed8','collapsed');
@section('sidebar_name8','Member Cancel Request')
@section('link8','Dashboard')
@section('icon8','bi bi-person-dash')

@section('collapsed9','collapsed');
@section('sidebar_name9','Logout')
@section('link9','Dashboard')
@section('icon9','bi bi-box-arrow-left')



@section('content')
    <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
            <div class="row">

                <div class="col-12">
                    <div class="card">

                        <form class="card-body">
                            <h5 class="card-title">All Loan</h5>


                            @php
                                $paid_amount = \App\Models\transation::where('user_id',$user_data->id)->where('status','paid')->sum('amount');
                                $due_amount = \App\Models\transation::where('user_id',$user_data->id)->where('status','Due')->sum('amount');

                                $current_balance =  $paid_amount - $due_amount;

                            @endphp
                            <div class="bd-callout bd-callout-primary">
                                <style>
                                    .bd-callout {
                                        padding: 1.25rem;
                                        margin-top: 1.25rem;
                                        margin-bottom: 1.25rem;
                                        border: 1px solid #eee;
                                        border-left-width: .25rem;
                                        border-radius: .25rem
                                    }

                                    .bd-callout h4 {
                                        margin-top: 0;
                                        margin-bottom: .25rem
                                    }

                                    .bd-callout p:last-child {
                                        margin-bottom: 0
                                    }

                                    .bd-callout code {
                                        border-radius: .25rem
                                    }

                                    .bd-callout+.bd-callout {
                                        margin-top: -.25rem
                                    }


                                    .bd-callout-primary{
                                        border-left-color: #22b209
                                    }



                                </style>
                            <span>Your Current Balance: <b style="color:#04c63a">{{ $current_balance}}</b> </span> <br>
                            <span>Your Paid Balance: <b style="color:#04c63a">{{ $paid_amount}}</b> </span> <br>
                            <span>Your Due Balance: <b style="color:#bf0606">{{  $due_amount}}</b> </span> <br>
                            <span>So you can apply loan less than <b style="color:#04c63a">{{ $current_balance}}</b></span>
                            </div>
                            <br>
                            @include('error')
                            @if(session('success'))
                                <span class="alert alert-success">{{session('success')}}</span>
                            @endif
                            @if(session('failed'))
                                <span class="alert alert-danger">{{session('failed')}}</span>
                        @endif

                            <form action="{{route('submit.loan')}}" method="post" class="input-group">
                                {{csrf_field()}}
                                <div class="row">
                                    <div class="col-sm">
                                        <span>Enter amount</span>
                                        <input type="number" name="amount" class="form-control" placeholder="Enter amount here">
                                    </div>
                                    <div class="col-sm">
                                        <span>Enter Reason</span>
                                        <input type="text" name="reason" class="form-control" placeholder="Enter Reason">
                                    </div>
                                    <div class="col-sm">
                                        <span>Need Date</span>
                                        <input type="date" name="need_date" class="form-control">
                                    </div>
                                    <div class="col-sm">
                                        <span>Will pay date</span>
                                        <input type="date" name="pay_date" class="form-control">
                                    </div>

                                    <div class="col-sm">
                                        <br>
                                        <input class="btn btn-success form-control"  type="submit" value="Submit Request">
                                    </div>

                                </div>

                            </form>




                        </div>

                    </div>
                </div><!-- End Reports -->




            </div><!-- End Left side columns -->



        </div>

@endsection
