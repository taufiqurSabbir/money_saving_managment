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

@section('collapsed7','');
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


                <div class="col-xxl-4 col-md-6">
                    <div class="card info-card" style="color:#110263; background-color:#ea9b9b">


                        <div class="card-body">
                            <h5 class="card-title">Total Expense Cost<span></span></h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-coin"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>{{$total_expense}}৳</h6>

                                </div>
                            </div>
                        </div>

                    </div>
                </div><!-- End Sales Card -->

                <div class="col-xxl-4 col-md-6">
                    <div class="card info-card" style=" color:#091432 ; background: #dbdbf9;">


                        <div class="card-body">
                            <h5 class="card-title">Total Expense<span></span></h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-building"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>{{$count_expense}}</h6>

                                </div>
                            </div>
                        </div>

                    </div>
                </div><!-- End Sales Card -->

                <div class="col-12">
                    <div class="card">


                        <h5 class="card-title">Asset</h5>
                        <br>
                        @include('error')
                        @if(session('success'))
                            <span class="alert alert-success">{{session('success')}}</span>
                        @endif
                        @if(session('failed'))
                            <span class="alert alert-danger">{{session('failed')}}</span>
                        @endif







                        @if($user_data->role =='admin' or $user_data->role == 'cashier')
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
                                        <span>Expense By</span>
                                        <select class="form-select" aria-label="Default select example" name="expense_by">
                                            <option disabled selected>Select User</option>
                                            @foreach($all_user as $users)
                                                <option value="{{$users->id}}">
                                                    {{$users->name}}
                                                </option>
                                            @endforeach

                                        </select>
                                    </div>
                                    <div class="col-sm">
                                        <br>
                                        <input type="submit" value="Submit" class="btn btn-primary form-control">
                                    </div>
                                </div>
                            </form>

                        @endif


                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th scope="col">Expense Reason</th>
                                    <th scope="col">Amount</th>
                                    <th scope="col">Details</th>
                                    <th scope="col">Expense By</th>
                                    <th scope="col">Expense Date</th>
                                    @if($user_data->role =='admin' or $user_data->role == 'cashier')
                                        <th scope="col">Action</th>
                                    @endif
                                </tr>
                                </thead>
                                <tbody>

                                    @foreach($expense as $expences)

                                    <tr>
                                        <td>{{$expences->expense_reason}}</td>
                                        <td>{{$expences->amount}}৳</td>
                                        <td>{{$expences->details}}</td>
                                        @php
                                      $e_user =   App\Models\User::where('id',$expences->expense_by)->first('name')
                                        @endphp
                                        <td>{{$e_user->name}}</td>
                                        <td>{{$expences->expense_date}}</td>
                                        @if($user_data->role =='admin' or $user_data->role == 'cashier')
                                            <td>
                                          <span>

                                                <a class="btn btn-danger" href="{{route('expense.delete',$expences->id)}}">Delete</a>

                                          </span>
                                            </td>
                                        @endif

                                    </tr>
                                        @endforeach


                                </tbody>
                            </table>

                        </div>




                    </div>

                </div>
            </div><!-- End Reports -->




        </div><!-- End Left side columns -->



    </div>
@endsection
