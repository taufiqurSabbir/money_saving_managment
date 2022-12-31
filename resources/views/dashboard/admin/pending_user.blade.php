@extends('dashboard.layouts.usermaster')

@section('page_title','All Users')

@section('user_name',$user_data->name)
@section('phone',$user_data->phone)
@section('profile_image',$user_data->profile_picture)

@if($user_data->user_status =='Approved'):

@section('collapsed1','collapsed');
@section('sidebar_name1','Dashboard')
@section('link1',route('admin.dashboard'))
@section('icon1','bi bi-grid')

@section('page_title','Dashboard')

@section('collapsed2','');
@section('sidebar_name2','All Users')
@section('link2',route('all.user'))
@section('icon2','bi bi-person-check')


@section('collapsed3','collapsed');
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
                            <h5 class="card-title">All Users</h5>
                            @if($user_data->role =='admin')
                            <form action="{{route('change.role')}}" method="post">
                                {{csrf_field()}}
                            <div class="row">

                                <div class="col">
                                    <h5>Select User</h5>
                                    <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="user">>
                                        <option selected> select User</option>
                                        @foreach($all_user as $users)
                                        <option value="{{$users->id}}">
                                            {{$users->name}}
                                        </option>
                                            @endforeach
                                    </select>
                                </div>
                                <div class="col">
                                    <h5>Select Role</h5>
                                    <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="role">
                                        <option selected>Select Role</option>
                                        <option value="admin">Admin</option>
                                        <option value="cashier">Cashier</option>
                                        <option value="money_saver">Money Saver</option>
                                    </select>
                                </div>

                                <div class="col">
                                    <br>

                                    <input type="submit" class="btn btn-success" value="Submit">
                                </div>


                            </div>

                            </form>
                            @endif
                            <!-- Line Chart -->
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th scope="col">Name</th>
                                        <th scope="col">phone</th>
                                        <th scope="col">Role</th>
                                        <th scope="col">status</th>
                                        @if($user_data->role =='admin' or $user_data->role == 'cashier')
                                        <th scope="col">Action</th>
                                            @endif
                                    </tr>
                                    </thead>
                                    <tbody>




                                    @foreach($all_user as $users)
                                    <tr>
                                        <th><span>
                                                <img src="{{asset('image/profile_picture/'. $users->profile_picture)}}" style="width:50px; height:50px; border-radius:50%" alt="">
                                                 {{$users->name}}
                                            </span>

                                        </th>
                                        <td>

                                            {{$users->phone}}
                                        </td>
                                        <td>{{$users->role}}</td>
                                        <td>
                                            @php
                                            if ( $users->user_status =='pending')
                                                    echo(' <span class="badge bg-warning">Pending</span>');
                                            else if($users->user_status =='Approved')
                                                 echo(' <span class="badge bg-success">Approved</span>');
                                            else if($users->user_status =='Rejected')
                                                 echo(' <span class="badge bg-danger">Rejected</span>');

                                            @endphp
                                        </td>
                                        @if($user_data->role =='admin' or $user_data->role == 'cashier')

                                        <td>
                                          <span>

                                                  @if ( $users->user_status =='pending')
                                                      <a class="btn btn-success" href="{{route('approve.user',$users->id)}}">Approve</a>
                                                        <a class="btn btn-danger" href="{{route('reject.user',$users->id)}}">Reject</a>
                                                @elseif ($users->user_status =='Approved')
                                                             <a class="btn btn-warning" href="{{route('pending.user',$users->id)}}">Pending</a>
                                                                <a class="btn btn-danger" href="{{route('reject.user',$users->id)}}">Reject</a>
                                                @elseif ($users->user_status =='Rejected')
                                                     <a class="btn btn-success" href="{{route('approve.user',$users->id)}}">Approve</a>
                                                                 <a class="btn btn-warning" href="{{route('pending.user',$users->id)}}">Pending</a>

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

