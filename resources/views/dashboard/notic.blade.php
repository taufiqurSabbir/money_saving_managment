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



@section('collapsed5','');
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


                        <h5 class="card-title">All Notice</h5>
                        <br>
                        @include('error')
                        @if(session('success'))
                            <span class="alert alert-success">{{session('success')}}</span>
                        @endif
                        @if(session('failed'))
                            <span class="alert alert-danger">{{session('failed')}}</span>
                        @endif


                        @if($user_data->role =='admin' or $user_data->role == 'cashier')

                            <form action="{{route('submit.notice')}}" method="post" class="px-3">
                                {{csrf_field()}}
                                <span>Notice Title</span>
                                <input type="text"  class="form-control" name="title" placeholder="Enter Title here">
                                <br>
                                <div class="row">
                                    <div class="col">
                                        <span>Notice Apply able from</span>
                                        <input type="date" name="from_date" class="form-control">
                                    </div>
                                    <div class="col">
                                        <span>Notice Apply able Till</span>
                                        <input type="date" name="to_date" class="form-control">
                                    </div>
                                </div>
                                <br>
                                    <span>Notice Details</span>
                                <textarea id="summernote" name="notice"></textarea>
                                <br>
                                <input type="submit" class="btn btn-primary form-control" value="Save">
                            </form>

                        @endif


                        <div class="table-responsive">
                            @foreach($notice as $notices)
                                @php
                                $notice_user = \App\Models\User::where('id',$notices->user_id)->first();
                                @endphp
                                <a href="{{route('single.notice',$notices->id)}}">
                                    <div class="row">
                                        <div class="col-sm">
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
                                                <br>
                                                <a href="{{route('single.notice',$notices->id)}}"><h3>{{$notices->title}}</h3>  </a>
                                                <span>Notice By: <b>{{$notice_user->name}}</b> </span>
                                                <br>
                                            </div>
                                        </div>
                                    </div>

                                </a>
                                @endforeach
                        </div>




                    </div>

                </div>
            </div><!-- End Reports -->




        </div><!-- End Left side columns -->



    </div>


    <script>
        $(document).ready(function() {
            $('#summernote').summernote();
        });
    </script>
@endsection
