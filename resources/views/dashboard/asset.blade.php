@extends('dashboard.layouts.usermaster')

@section('user_name',$user_data->name)
@section('phone',$user_data->phone)
@section('profile_image',$user_data->profile_picture)

@if($user_data->user_status =='Approved'):

@section('collapsed1','collapsed');
@section('sidebar_name1','Dashboard')
@section('link1',route('admin.dashboard'))
@section('icon1','bi bi-grid')

@section('page_title','Asset')

@section('collapsed2','collapsed');
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

@section('collapsed6','');
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
                <div class="col-xxl-4 col-md-6">
                    <div class="card info-card sales-card">


                        <div class="card-body">
                            <h5 class="card-title">Added Profit <span></span></h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-cash-coin"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>{{$added_profit}}</h6>

                                </div>
                            </div>
                        </div>

                    </div>
                </div><!-- End Sales Card -->

                <div class="col-xxl-4 col-md-6">
                    <div class="card info-card sales-card">


                        <div class="card-body">
                            <h5 class="card-title">Estimate Profit<span></span></h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-coin"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>{{$asset_profit}}৳</h6>

                                </div>
                            </div>
                        </div>

                    </div>
                </div><!-- End Sales Card -->

                <div class="col-xxl-4 col-md-6">
                    <div class="card info-card sales-card">


                        <div class="card-body">
                            <h5 class="card-title">Total Asset<span></span></h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-building"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>{{$asset_count}}</h6>

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
                            <form action="{{route('asset.add')}}" class="input-group" method="post">
                                {{csrf_field()}}
                                <div class="row">
                                    <div class="col-sm">
                                        <span>Name</span>
                                        <input type="text" class="form-control" name="name">
                                    </div>
                                    <div class="col-sm">
                                        <span>Location</span>
                                        <input type="text" class="form-control" name="location">
                                    </div>

                                    <div class="col-sm">
                                        <span>Buy Amount</span>
                                        <input type="text" class="form-control" name="buy_amount">
                                    </div>

                                    <div class="col-sm">
                                        <span>Return amount</span>
                                        <input type="text" class="form-control" name="return_amount">
                                    </div>

                                    <div class="col-sm">
                                        <span>Return Type</span>
                                        <select class="form-select" aria-label="Default select example" name="return_type">
                                            <option disabled  selected>Select Type</option>
                                                <option value="onetime">Onetime</option>
                                                <option value="monthly">Monthly</option>
                                                <option value="yearly">Yearly</option>

                                        </select>
                                    </div>

                                    <div class="col-sm">
                                        <span>From Date</span>
                                        <input type="date" class="form-control" name="from_date">
                                    </div>

                                    <div class="col-sm">
                                        <span>To date</span>
                                        <input type="date" class="form-control" name="to_date">
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
                                    <th scope="col">Name</th>
                                    <th scope="col">Location</th>
                                    <th scope="col">Buy Amount</th>
                                    <th scope="col">Return amount</th>
                                    <th scope="col">Return Type</th>
                                    <th scope="col">Profit</th>
                                    <th scope="col">From Date</th>
                                    <th scope="col">To date</th>
                                    @if($user_data->role =='admin' or $user_data->role == 'cashier')
                                        <th scope="col">Action</th>
                                    @endif
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($asset as $assets)

                                    <tr>




                                            @php
                                                $profit = $assets->return_amount -  $assets->buy_amount;
                                              $from_date = Illuminate\Support\Carbon::parse($assets->from_date);
                                              $to_date = Illuminate\Support\Carbon::parse($assets->to_date);
                                            @endphp


                                        <td>{{$assets->name}}</td>
                                        <td>{{$assets->location}}</td>
                                        <td>{{$assets->buy_amount}}৳</td>
                                        <td>{{$assets->return_amount}}৳</td>
                                        <td>{{$assets->return_type}}</td>
                                        <td>{{$assets->profit }}৳</td>
                                        <td>{{$from_date->isoFormat('Do MMM YY')}}</td>
                                        <td>{{$to_date->isoFormat('Do MMM YY')}}</td>



                                        @if($user_data->role =='admin' or $user_data->role == 'cashier')


                                            <td>

                                          <span>
                                              @if($to_date->isPast())

                                                      @php
                                                          $p_check =  \App\Models\profits::where('asset_id',$assets->id)->get();

                                                                if ( $p_check->isEmpty()){
                                                                    \App\Models\profits::create([
                                                                        'amount' =>$assets->profit,
                                                                        'asset_id' =>$assets->id,
                                                                        'added_date' =>$assets->to_date,
                                                                         ]);
                                                                                                 }
                                                  @endphp

                                                  <script>

                                              </script>



                                              @else
                                                  <a class="btn btn-danger" href="{{route('asset.delete',$assets->id)}}">Delete</a>
                                              @endif

                                              @endif
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
