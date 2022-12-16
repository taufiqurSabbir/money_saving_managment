@extends('dashboard.layouts.usermaster')

@section('page_title','All Users')

@section('user_name',$user_data->name)
@section('phone',$user_data->phone)
@section('profile_image',$user_data->profile_picture)

@section('collapsed1','collapsed');
@section('sidebar_name1','Dashboard')
@section('link1',route('admin.dashboard'))
@section('icon1','bi bi-grid')

@section('collapsed2','');
@section('sidebar_name2','All Users')
@section('link2',route('all.user'))
@section('icon2','bi bi-person-check')

@section('collapsed3','collapsed');
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

                            <!-- Line Chart -->
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th scope="col">Name</th>
                                        <th scope="col">phone</th>
                                        <th scope="col">Role</th>
                                        <th scope="col">status</th>
                                        <th scope="col">Action</th>
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
