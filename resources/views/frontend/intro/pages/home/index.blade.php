{{--@extends('frontend.intro.master.master')--}}
{{--@section('content')--}}

        <!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title', $title)</title>

    <!-- Bootstrap core CSS -->
    <link href="{{url('startingNav/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{url('startingNav/css/scrolling-nav.css')}}" rel="stylesheet">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="{{url('Login_v1/images/icons/favicon.ico')}}"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{url('Login_v1/vendor/bootstrap/css/bootstrap.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{url('Login_v1/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{url('Login_v1/vendor/animate/animate.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{url('Login_v1/vendor/css-hamburgers/hamburgers.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{url('Login_v1/vendor/select2/select2.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{url('Login_v1/css/util.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('Login_v1/css/main.css')}}">
    <!--===============================================================================================-->



</head>

<body id="page-top">

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">School Management</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="#login">Login</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<header class="bg-primary text-white">
    <div class="container text-center">
        <img class="logo" src="{{url('svg/school.png')}}" class="g-header__profile-photo rounded-circle" style="height: 200px; width: 200px;  border-radius: 50%;">
        <br>
        <br>
        <br>
        <h1>SHREE JALAPA SECONDARY SCHOOL</h1>
        <br>
       chichila gaunpalika-3, sankhuwa-shava
        <hr>
        <br>
        <p class="lead" style="color: white"><em> All students in partnership with family and community to become informed, compassionate, global citizens.</em> </p>
    </div>
</header>

<section id="login" class="container-login100">

                <div class="container-fluid">
                    <div class="limiter">
                        <div class="container-login100">
                            <div class="wrap-login100">
                                <div class="login100-pic js-tilt" data-tilt>
                                    <img src="{{url('Login_v1/images/img-01.png')}}" alt="IMG">
                                </div>

                                <form class="login100-form validate-form" action="{{route('login-user')}}" method="post">
                                    @csrf
                                    <span class="login100-form-title">User Login</span>

                                    <div class="wrap-input100 validate-input" data-validate = "Valid username is required">
                                        <input class="input100" type="text" name="name" placeholder="Username">
                                        <span class="focus-input100"></span>
                                        <span class="symbol-input100">
							                <i class="fa fa-envelope" aria-hidden="true"></i>
                                        </span>
                                    </div>

                                    <div class="wrap-input100 validate-input" data-validate = "Password is required">
                                        <input class="input100" type="password" name="pass" placeholder="Password">
                                        <span class="focus-input100"></span>
                                        <span class="symbol-input100">
							                <i class="fa fa-lock" aria-hidden="true"></i>
						                </span>
                                    </div>

                                    <div class="container-login100-form-btn">
                                        <button class="login100-form-btn">
                                            Login
                                        </button>
                                    </div>

                                    <div class="text-center p-t-12">
						                <span class="txt1">Forgot</span>
                                        <a class="txt2" href="#">
                                            Username / Password?
                                        </a>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>

</section>


<!-- Footer -->
<footer class="py-5 bg-dark">
    <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; My Website 2019</p>
    </div>
    <!-- /.container -->
</footer>

<!-- Bootstrap core JavaScript -->
<script src="{{url('startingNav/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{url('startingNav/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<!-- Plugin JavaScript -->
<script src="{{url('startingNav/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

<!-- Custom JavaScript for this theme -->
<script src="{{url('startingNav/js/scrolling-nav.js')}}"></script>

<!--===============================================================================================-->
<script src="{{url('Login_v1/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
<!--===============================================================================================-->
<script src="{{url('Login_v1/vendor/bootstrap/js/popper.js')}}"></script>
<script src="{{url('Login_v1/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<!--===============================================================================================-->
<script src="{{url('Login_v1/vendor/select2/select2.min.js')}}"></script>
<!--===============================================================================================-->
<script src="{{url('Login_v1/vendor/tilt/tilt.jquery.min.js')}}"></script>
<script >
    $('.js-tilt').tilt({
        scale: 1.1
    })
</script>
<!--===============================================================================================-->
<script src="{{url('Login_v1/js/main.js')}}"></script>



</body>

</html>
