@extends('dashboard.layouts.usermaster')

@section('page_title','All Transaction')

@section('user_name',$user_data->name)
@section('phone',$user_data->phone)
@section('profile_image',$user_data->profile_picture)



@if($user_data->user_status =='Approved'):

@section('collapsed1','collapsed');
@section('sidebar_name1','Dashboard')
@section('link1',route('admin.dashboard'))
@section('icon1','bi bi-grid')

@section('page_title','Dashboard')

@section('collapsed2','collapsed');
@section('sidebar_name2','All Users')
@section('link2',route('all.user'))
@section('icon2','bi bi-person-check')


@section('collapsed3','');
@section('sidebar_name3','Transaction')
@section('link3',route('transaction'))
@section('icon3','bi bi-cash-coin')

@section('collapsed4','collapsed');
@section('sidebar_name4','Loan')
@section('link4',route('loan'))
@section('icon4','bi bi-coin')



@section('collapsed5','collapsed');
@section('sidebar_name5','Notice')
@section('link5',route('notice'))
@section('icon5','bi bi-bell')

@section('collapsed6','collapsed');
@section('sidebar_name6','Asset')
@section('link6',route('asset'))
@section('icon6','bi bi-plus-circle')

@section('collapsed7','collapsed');
@section('sidebar_name7','Expense')
@section('link7',route('expense'))
@section('icon7','bi bi-dash-circle')

@section('collapsed8','collapsed');
@section('sidebar_name8','Member Cancel Request')
@section('link8',route('member_cancel'))
@section('icon8','bi bi-person-dash')

@section('collapsed9','collapsed');
@section('sidebar_name9','Logout')
@section('link9',route('logout'))
@section('icon9','bi bi-box-arrow-left')





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
                            <h5 class="card-title">All Transaction</h5>

                            @if($user_data->role =='admin' or $user_data->role == 'cashier')
                                <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        Add Amount
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <form action="{{route('admin.add.amount')}}" method="POST">
                                                    {{csrf_field()}}
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add Amount</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                   <h5>Add User Amount</h5>
                                                    <hr>

                                                        <span>Select User</span>
                                                        <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="user">
                                                            @foreach($all_user as $users)
                                                            <option value="{{$users->id}}">
                                                                {{$users->name}}
                                                            </option>
                                                                @endforeach
                                                        </select>
                                                        <br>
                                                        <span>Select Year</span>
                                                        <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="year">
                                                            @foreach($year as $years)
                                                                <option value="{{$years->id}}">
                                                                    {{$years->year}}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        <br>
                                                        <span>Select Month</span>
                                                        <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="month">
                                                            @foreach($month as $months)
                                                                <option value="{{$months->id}}">
                                                                    {{$months->months}}
                                                                </option>
                                                            @endforeach
                                                        </select>

                                                        <br>
                                                        <span>Select Type</span>
                                                        <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="payment_type">

                                                                <option value="monthly_payment">Monthly Payment</option>
                                                                <option value="advance_payment">Advance Payment</option>
                                                                <option value="due_payment">Due Payment</option>

                                                        </select>
                                                        <br>
                                                        <span>Amount:</span>
                                                        <input type="number" name="amount" class="form-control" placeholder="Enter Amount">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <input type="submit"   class="btn btn-primary" value="Submit">
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>


                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addyear">
                                        Add Year
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="addyear" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <form action="{{route('admin.add.year')}}" method="POST">
                                                    {{csrf_field()}}
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Year</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <h5>Add Year</h5>
                                                        <hr>
                                                        <form action="">
                                                            <br>
                                                            <span>Year:</span>
                                                            <input type="number" name="year" class="form-control" placeholder="Enter Year">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <input type="submit"   class="btn btn-primary" value="Submit">
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                        @endif
                        <!-- Line Chart -->
                            <br>
                            <br>

                            <form action="{{route('s.transaction')}}" class="input-group">
                                {{csrf_field()}}
                                <div class="row">
                                    <div class="col-sm">
                                        <select class="form-select" aria-label="Default select example" name="s_month">
                                            <option disabled  selected>Select Month</option>
                                            @foreach($month as $months)
                                                <option value="{{$months->id}}">
                                                    {{$months->months}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm">
                                        <select class="form-select" aria-label="Default select example" name="s_year">
                                            <option disabled selected>Select Year</option>
                                            @foreach($year as $years)
                                                <option value="{{$years->id}}">
                                                    {{$years->year}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm">
                                        <select class="form-select" aria-label="Default select example" name="s_status">
                                            <option disabled selected>Select Status</option>
                                            <option value="paid">Paid</option>
                                            <option value="due">Due</option>
                                        </select>
                                    </div>
                                    <div class="col-sm">
                                        <select class="form-select" aria-label="Default select example" name="s_type">
                                            <option disabled selected>Select payment type</option>
                                            <option value="monthly_payment">Monthly Payment</option>
                                            <option value="advance_payment">Advance Payment</option>
                                            <option value="due_payment">Due Payment</option>

                                        </select>
                                    </div>

                                    <div class="col-sm">
                                        <select class="form-select" aria-label="Default select example" name="s_user">
                                            <option disabled selected>Select User</option>
                                            @foreach($all_user as $users)
                                                <option value="{{$users->id}}">
                                                    {{$users->name}}
                                                </option>
                                            @endforeach

                                        </select>
                                    </div>

                                </div>
                                <input class="btn btn-success" type="submit" value="Search">
                            </form>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th scope="col">Name</th>
                                        <th scope="col">phone</th>
                                        <th scope="col">Amount</th>
                                        <th scope="col">Payment For</th>
                                        <th scope="col">Month</th>
                                        <th scope="col">Year</th>
                                        <th scope="col">Status</th>
                                        @if($user_data->role =='admin' or $user_data->role == 'cashier')
                                            <th scope="col">Action</th>
                                        @endif
                                    </tr>
                                    </thead>
                                    <tbody>



                                    @foreach($current_month as $transaction)

                                        @php
                                       $users = \App\Models\User::where('id',$transaction->user_id)->first()

                                        @endphp

                                        <tr>
                                            <th><span>
                                                <img src="{{asset('image/profile_picture/'. $users->profile_picture)}}" style="width:50px; height:50px; border-radius:50%" alt="">
                                                 {{$users->name}}
                                            </span>

                                            </th>
                                            <td>

                                                {{$users->phone}}
                                            </td>
                                            @php
                                                $Month= \App\Models\Months::where('id',$transaction->month_id)->first();
                                                $year= \App\Models\Years::where('id',$transaction->year_id)->first();
                                            @endphp


                                            <td>{{$transaction->amount}}</td>
                                            <td>{{$transaction->type}}</td>
                                            <td>{{$Month->months}}</td>
                                            <td>{{$year->year}}</td>
                                            <td>

                                                    @if( $transaction->status =='Due')
                                                             <span class="badge bg-danger">Due</span>
                                                    @elseif($transaction->status =='paid')
                                                        <span class="badge bg-success">Paid</span>
                                                @endif


                                            </td>
                                            @if($user_data->role =='admin' or $user_data->role == 'cashier')

                                                <td>
                                          <span>

                                                <a class="btn btn-danger" href="{{route('delete_tran',$transaction->id)}}">Delete</a>
                                                  @if ( $transaction->status =='paid')
                                                  <a class="btn btn-danger" href="{{route('due',$transaction->id)}}">Due</a>
                                              @elseif ($transaction->status =='Due')
                                                  <a class="btn btn-success" href="{{route('paid',$transaction->id)}}">Paid</a>

                                              @endif
                                              {{--                                              <a class="btn btn-success" href="">Approve</a>--}}
                                              {{--                                              <a class="btn btn-warning" href="">Pending</a>--}}
                                              {{--                                              <a class="btn btn-danger" href="">Reject</a>--}}
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

        @elseif($user_data->user_status =='pending')
        @section('content')

            <div class="row">


                <!-- Left side columns -->
                <div class="col-lg-8">
                    <div class="row">

                        <h4 style="text-align:center">Your Account is <b style="color:darkred">pending</b> </h4>
                        <h5 style="text-align:center">We are checking your Information. <br> We'll inform you soon</h5>

                        <img src="{{asset('image/frontend/98723-search-users.gif')}}" alt="">



                    </div>
                </div>
            </div>
        @endsection

        @elseif($user_data->user_status =='Rejected')
        @section('content')

            <div class="row">


                <!-- Left side columns -->
                <div class="col-lg-8">
                    <div class="row">
                        <h4 style="text-align:center">Your Account is <b style="color:darkred">Rejected</b> </h4>
                        <h5 style="text-align:center">We are sorry to inform. <br> You unable to became our member</h5>

                        <img src="{{asset('image/frontend/80164-reject-document-files.gif')}}" style="height:50%; width:70%; margin: 0 auto" alt="">
                    </div>
                </div>
            </div>
@endsection



@endif
