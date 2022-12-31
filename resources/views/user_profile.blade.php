@extends('dashboard.layouts.usermaster')

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

                <div class="col-12">
                    <section class="section profile">
                        <div class="row">
                            <div class="col-xl-4">

                                <div class="card">
                                    <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                                        <img src="{{asset('image/profile_picture/'.$user_data->profile_picture)}}" alt="Profile" class="rounded-circle">
                                        <h2>{{$user_data->name}}</h2>
                                        <h3>{{$user_data->phone}}</h3>
                                    </div>
                                </div>

                            </div>

                            <div class="col-xl-8">

                                <div class="card">
                                    <div class="card-body pt-3">
                                        @include('error')
                                        @if(session('success'))
                                            <span class="alert alert-success">{{session('success')}}</span>
                                        @endif
                                        @if(session('failed'))
                                            <span class="alert alert-danger">{{session('failed')}}</span>
                                    @endif
                                        <br>
                                        <br>
                                        <!-- Bordered Tabs -->
                                        <ul class="nav nav-tabs nav-tabs-bordered">

                                            <li class="nav-item">
                                                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                                            </li>

                                            <li class="nav-item">
                                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
                                            </li>

                                            <li class="nav-item">
                                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
                                            </li>

                                        </ul>
                                        <div class="tab-content pt-2">

                                            <div class="tab-pane fade show active profile-overview" id="profile-overview">

                                                <h5 class="card-title">Profile Details</h5>

                                                <div class="row">
                                                    <div class="col-lg-3 col-md-4 label ">Full Name</div>
                                                    <div class="col-lg-9 col-md-8">{{$user_data->name}}</div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-3 col-md-4 label">Phone</div>
                                                    <div class="col-lg-9 col-md-8">{{$user_data->phone}}</div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-3 col-md-4 label">Role</div>
                                                    <div class="col-lg-9 col-md-8">{{$user_data->role}}</div>
                                                </div>


                                            </div>



                                            <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                                                <!-- Profile Edit Form -->
                                                <form method="post" action="{{route('update.profile')}}" enctype="multipart/form-data" >
                                                        {{csrf_field()}}
                                                    <div class="row mb-3">
                                                        <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                                                        <div class="col-md-8 col-lg-9">
                                                            <div class="avatar-upload">
                                                                <div class="avatar-edit">
                                                                    <input type='file' id="imageUpload" accept=".png, .jpg, .jpeg" name="profile_image" />
                                                                    <label for="imageUpload"></label>
                                                                </div>
                                                                <div class="avatar-preview">
                                                                    <div id="imagePreview" style="background-image: url({{asset('image/profile_picture/'.$user_data->profile_picture)}});">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="row mb-3">
                                                        <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Full Name</label>
                                                        <div class="col-md-8 col-lg-9">
                                                            <input name="fullName" type="text" class="form-control" id="fullName" value="{{$user_data->name}}">
                                                        </div>
                                                    </div>


                                                    <div class="row mb-3">
                                                        <label for="company" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                                                        <div class="col-md-8 col-lg-9">
                                                            <input name="phone" type="text" disabled class="form-control" id="company" value="{{$user_data->phone}}">
                                                        </div>
                                                    </div>

                                            <div class="row mb-3">
                                                <div class="text-center">

                                                    <input type="submit" value="Update Information" class="btn btn-success">
                                                </div>
                                            </div>
                                                </form><!-- End Profile Edit Form -->

                                            </div>

                                            <div class="tab-pane fade pt-3" id="profile-settings">

                                                <!-- Settings Form -->

                                            </div>

                                            <div class="tab-pane fade pt-3" id="profile-change-password">
                                                <!-- Change Password Form -->
                                                <form method="post" action="{{route('update.password')}}">
                                                        {{csrf_field()}}
                                                    <div class="row mb-3">
                                                        <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                                                        <div class="col-md-8 col-lg-9">
                                                            <input name="oldpassword" type="password" class="form-control" id="currentPassword">
                                                        </div>
                                                    </div>

                                                    <div class="row mb-3">
                                                        <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                                                        <div class="col-md-8 col-lg-9">
                                                            <input name="password" type="password" class="form-control" id="newPassword">
                                                        </div>
                                                    </div>

                                                    <div class="row mb-3">
                                                        <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                                                        <div class="col-md-8 col-lg-9">
                                                            <input name="password_confirmation" type="password" class="form-control" id="renewPassword">
                                                        </div>
                                                    </div>

                                                    <div class="text-center">
                                                        <button type="submit" class="btn btn-primary">Change Password</button>
                                                    </div>
                                                </form><!-- End Change Password Form -->

                                            </div>

                                        </div><!-- End Bordered Tabs -->

                                    </div>
                                </div>

                            </div>
                        </div>
                    </section>
                </div>
            </div><!-- End Reports -->




        </div><!-- End Left side columns -->

    <style>
        .avatar-upload {
            position: relative;
            max-width: 205px;
            margin: 50px auto;
        }
        .avatar-upload .avatar-edit {
            position: absolute;
            right: 12px;
            z-index: 1;
            top: 10px;
        }
        .avatar-upload .avatar-edit input {
            display: none;
        }
        .avatar-upload .avatar-edit input + label {
            display: inline-block;
            width: 34px;
            height: 34px;
            margin-bottom: 0;
            border-radius: 100%;
            background: #FFFFFF;
            border: 1px solid transparent;
            box-shadow: 0px 2px 4px 0px rgba(0,0,0,0.12);
            cursor: pointer;
            font-weight: normal;
            transition: all .2s ease-in-out;
        }
        .avatar-upload .avatar-edit input + label:hover {
            background: #f1f1f1;
            border-color: #d6d6d6;
        }
        .avatar-upload .avatar-edit input + label:after {
            content: "\f040";
            font-family: 'FontAwesome';
            color: #757575;
            position: absolute;
            top: 10px;
            left: 0;
            right: 0;
            text-align: center;
            margin: auto;
        }
        .avatar-upload .avatar-preview {
            width: 192px;
            height: 192px;
            position: relative;
            border-radius: 100%;
            border: 6px solid #F8F8F8;
            box-shadow: 0px 2px 4px 0px rgba(0,0,0,0.1);
        }
        .avatar-upload .avatar-preview > div {
            width: 100%;
            height: 100%;
            border-radius: 100%;
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
        }

    </style>

    <script>function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#imagePreview').css('background-image', 'url('+e.target.result +')');
                    $('#imagePreview').hide();
                    $('#imagePreview').fadeIn(650);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#imageUpload").change(function() {
            readURL(this);
        });</script>


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

