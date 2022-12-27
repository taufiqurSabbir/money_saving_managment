@extends('dashboard.layouts.usermaster')

@section('user_name',$user_data->name)
@section('phone',$user_data->phone)
@section('profile_image',$user_data->profile_picture)

@section('collapsed1','collapsed');
@section('sidebar_name1','Dashboard')
@section('link1',route('admin.dashboard'))
@section('icon1','bi bi-grid')

@section('page_title','All Notice')

@section('collapsed2','collapsed');
@section('sidebar_name2','All Users')
@section('link2',route('all.user'))
@section('icon2','bi bi-person-check')


@section('collapsed3','collapsed');
@section('sidebar_name3','Transaction')
@section('link3','Dashboard')
@section('icon3','bi bi-cash-coin')

@section('collapsed4','collapsed');
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

@section('collapsed8','');
@section('sidebar_name8','Member Cancel Request')
@section('link8','Dashboard')
@section('icon8','bi bi-person-dash')

@section('collapsed9','collapsed');
@section('sidebar_name9','Logout')
@section('link9','Dashboard')
@section('icon9','bi bi-box-arrow-left')



@section('content')

    <div class="row">
                <div class="col-12">
                    <div class="card">


                        <h5 class="card-title">Member cancel Request </h5>
                        <br>
                        @include('error')
                        @if(session('success'))
                            <span class="alert alert-success">{{session('success')}}</span>
                        @endif
                        @if(session('failed'))
                            <span class="alert alert-danger">{{session('failed')}}</span>
                        @endif








                            <form action="{{route('submit.expense')}}" class="input-group" method="post">
                                {{csrf_field()}}
                                <div class="row">
                                    <div class="col-sm">
                                        <span>Expense Reason</span>
                                        <input type="text" class="form-control" name="reason">
                                    </div>

                                    <div class="col-sm">
                                        <span>Expense Amount</span>
                                        <input type="text" class="form-control" name="amount">
                                    </div>

                                    <div class="col-sm">
                                        <span>Details</span>
                                        <input type="text" class="form-control" name="details">
                                    </div>

                                    <div class="col-sm">
                                        <span>Expense Date</span>
                                        <input type="date" class="form-control" name="date">
                                    </div>

                                    <div class="col-sm">
                                        <br>
                                        <input type="submit" value="Submit" class="btn btn-primary form-control">
                                    </div>
                                </div>
                            </form>


                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th scope="col">Expense Reason</th>
                                    <th scope="col">Amount</th>
                                    <th scope="col">Details</th>
                                    <th scope="col">Expense By</th>
                                    <th scope="col">Expense Date</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody>



                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>

                                        <td></td>
                                        <td></td>
                                            <td>
                                          <span>

                                                <a class="btn btn-danger" href="">Delete</a>

                                          </span>
                                            </td>

                                    </tr>



                                </tbody>
                            </table>

                        </div>




                    </div>

                </div>
            </div><!-- End Reports -->




        </div><!-- End Left side columns -->



    </div>
@endsection
