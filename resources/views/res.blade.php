<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login V2</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="login_res/images/icons/favicon.ico"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="login_res/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="login_res/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="login_res/fonts/iconic/css/material-design-iconic-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="login_res/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="login_res/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="login_res/vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="login_res/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="login_res/vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="login_res/css/util.css">
    <link rel="stylesheet" type="text/css" href="login_res/css/main.css">
    <!--===============================================================================================-->
</head>
<body>

<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <form class="login100-form validate-form" method="POST" action="{{route('registation.submit')}}" enctype="multipart/form-data">
                @include('error')
                @if(session('success'))
                    <span class="alert alert-success">{{session('success')}}</span>
                @endif
                @if(session('failed'))
                    <span class="alert alert-danger">{{session('failed')}}</span>
                @endif
                {{csrf_field()}}
					<span class="login100-form-title p-b-26">
						Registation Here
					</span>


                <div class="wrap-input100 validate-input">
                    <input class="input100" type="text" name="name" data-validate = "Valid email is: ab">
                    <span class="focus-input100" data-placeholder="Name"></span>
                </div>

                <div class="wrap-input100 validate-input">
                    <input class="input100" type="number" name="phone">
                    <span class="focus-input100" data-placeholder="Phone Number"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Enter password">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
                    <input class="input100" type="password" name="password">
                    <span class="focus-input100" data-placeholder="Password"></span>
                </div>



                    <span style="color:#9b9999">Upload Profile Picture</span>
                    <br>
                    <input type="file" name="profile_image">



                <div class="container-login100-form-btn">
                    <div class="wrap-login100-form-btn">
                        <div class="login100-form-bgbtn"></div>
                        <button class="login100-form-btn">
                            Registation
                        </button>
                    </div>
                </div>

                <div class="text-center p-t-115">
						<span class="txt1">
							Alredy Have Account?
						</span>

                  <b>  <a class="txt2" href="{{route('login.index')}}">
                        Login
                    </a>
                  </b>
                </div>
            </form>
        </div>
    </div>
</div>


<div id="dropDownSelect1"></div>

<!--===============================================================================================-->
<script src="login_res/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="login_res/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
<script src="login_res/vendor/bootstrap/js/popper.js"></script>
<script src="login_res/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="login_res/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
<script src="login_res/vendor/daterangepicker/moment.min.js"></script>
<script src="login_res/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
<script src="login_res/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
<script src="login_res/js/main.js"></script>

</body>
</html>
