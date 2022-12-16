@extends('dashboard.layouts.usermaster')

@section('page_title','All Users')

@section('user_name',$user_data->name)
@section('phone',$user_data->phone)
@section('profile_image',$user_data->profile_picture)

@section('collapsed1','collapsed');
@section('sidebar_name1','Dashboard')
@section('link1',route('admin.dashboard'))
@section('icon1','bi bi-grid')

@section('collapsed2','collapsed');
@section('sidebar_name2','All Users')
@section('link2',route('all.user'))
@section('icon2','bi bi-person-check')

@section('collapsed3','');
@section('sidebar_name3','Change user Role')
@section('link3','Dashboard')
@section('icon3','bi bi-person')

@section('collapsed4','collapsed');
@section('sidebar_name4','Add Years')
@section('link4','Dashboard')
@section('icon4','bi bi-calendar-check')

@section('collapsed5','collapsed');
@section('sidebar_name5','Transaction')
@section('link5','Dashboard')
@section('icon5','bi bi-cash-coin')

@section('collapsed6','collapsed');
@section('sidebar_name6','Notice')
@section('link6','Dashboard')
@section('icon6','bi bi-bell')

@section('collapsed7','collapsed');
@section('sidebar_name7','Asset')
@section('link7','Dashboard')
@section('icon7','bi bi-plus-circle')

@section('collapsed8','collapsed');
@section('sidebar_name8','Expense')
@section('link8','Dashboard')
@section('icon8','bi bi-dash-circle')

@section('collapsed9','collapsed');
@section('sidebar_name9','Member Cancel Request')
@section('link9','Dashboard')
@section('icon9','bi bi-person-dash')

@section('collapsed10','collapsed');
@section('sidebar_name10','Advance Paid')
@section('link10','Dashboard')
@section('icon10','bi bi-coin')

@section('collapsed11','collapsed');
@section('sidebar_name11','Logout')
@section('link11','Dashboard')
@section('icon11','bi bi-box-arrow-left')



@section('content')
    <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
            <div class="row">
                @include('error')
                @if(session('success'))
                    <span class="alert alert-success">{{session('success')}}</span>
                @endif
                @if(session('failed'))
                    <span class="alert alert-danger">{{session('failed')}}</span>
                @endif

                <div class="col-12">
                    <div class="card">

                        <div class="card-body">
                            <h5 class="card-title">All Users</h5>

                            <!-- Line Chart -->
                            <form action="" >

                                <div class="container" >

                                    <center style="border:1px solid #EEEEEE; border-radius: border-radius: 10px 10px 10px 10px;
-webkit-border-radius: 10px 10px 10px 10px;
-moz-border-radius: 10px 10px 10px 10px;">
                                        <h5>Select User</h5>
                                        <select class="form-select form-select-sm" aria-label=".form-select-sm example" style="width:50%">
                                            <option selected>Open this select menu</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>

                                        <h5>Select User</h5>
                                        <select class="form-select form-select-sm" aria-label=".form-select-sm example" style="width:50%">
                                            <option selected>Open this select menu</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>

                                        <input type="submit" value="Submit">
                                    </center>

                                </div>



                            </form>



                        </div>

                    </div>
                </div><!-- End Reports -->




            </div><!-- End Left side columns -->



        </div>

@endsection
