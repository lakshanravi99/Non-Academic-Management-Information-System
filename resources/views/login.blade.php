<!DOCTYPE html>
<!--
Template Name: Midone - HTML Admin Dashboard Template
Author: Left4code
Website: http://www.left4code.com/
Contact: muhammadrizki@left4code.com
Purchase: https://themeforest.net/user/left4code/portfolio
Renew Support: https://themeforest.net/user/left4code/portfolio
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<html lang="en" class="light">
<!-- BEGIN: Head -->
<head>
    <meta charset="utf-8">
    <link href="dist/images/logo.svg" rel="shortcut icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Midone admin is super flexible, powerful, clean & modern responsive tailwind admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Midone Admin Template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="LEFT4CODE">
    <title>Login-NIMS</title>
    <!-- BEGIN: CSS Assets-->
    <link rel="stylesheet" href="dist/css/app.css" />
    <style>
        /* .login {
            overflow:visible !important;

        } */
    </style>
    <
    <!-- END: CSS Assets-->
</head>
<!-- END: Head -->
<body class="login">
<div class="container sm:px-10">
    <div class="block xl:grid grid-cols-2 gap-4">
        <!-- BEGIN: Login Info -->
        <div class="hidden xl:flex flex-col min-h-screen">
            <a href="" class="-intro-x flex items-center pt-5">
                <img alt="Midone - HTML Admin Template" class="w-6" src="dist/images/logo.svg">
                <span class="text-white text-lg ml-3"> NIMS </span>
            </a>
            <div class="my-auto">
                <img alt="" class="-intro-x w-1/2 -mt-16" src="logo.png" style="width:150px; height: 200px; margin-left: 100px;">
                <div class="-intro-x text-white font-medium text-4xl leading-tight mt-10">
                    Non-Academic Management System
                    <br>
                    University of Ruhuna
                    @if($errors->any())
                        @foreach($errors->all() as $error)
                            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
                            <script>
                                $(document).ready(function(){
                                    // Create alert instance
                                    $("#myAlert").alert();

                                    var myAlert = bootstrap.Alert.getInstance($("#myAlert")[0]);
                                    console.log(myAlert);
                                    // {_element: div#myAlert.alert.alert-info.alert-dismissible.fade.show}

                                    $("#myBtn").click(function(){
                                        $("#myAlert").alert("dispose");
                                        console.log(myAlert);
                                    });
                                });
                            </script>
                            </head>
                            <body>
                            @if (str_contains($errors->first(), 'Failure'))
                                <div class="m-4 items-center">
                                    <div id="myAlert" class="alert alert-danger alert-dismissible fade show">
                                        <strong>Error!</strong>{{$errors->first()}}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert">
                                            <script src="https://code.iconify.design/iconify-icon/1.0.0-beta.3/iconify-icon.min.js"></script>
                                            <iconify-icon icon="ep:close-bold" style="color: white;" ></iconify-icon>
                                        </button>
                                    </div>
                                </div>
                            @endif
                            @if (str_contains($errors->first(), 'Successfully'))
                                <div class="m-4 items-center">
                                    <div id="myAlert" class="alert alert-success-soft alert-dismissible fade show">
                                        <strong>Sucess!</strong>{{$errors->first()}}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert">
                                            <script src="https://code.iconify.design/iconify-icon/1.0.0-beta.3/iconify-icon.min.js"></script>
                                            <iconify-icon icon="ep:close-bold" style="color: black;" ></iconify-icon>
                                        </button>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    @endif

                </div>
                <div class="-intro-x mt-5 text-lg text-white text-opacity-70 dark:text-slate-400">www.ruh.nmis.lk</div>
            </div>
        </div>
        <!-- END: Login Info -->
        <!-- BEGIN: Login Form -->



        <div class="h-screen xl:h-auto flex py-5 xl:py-0 my-10 xl:my-0">
            <div class="my-auto mx-auto xl:ml-20 bg-white dark:bg-darkmode-600 xl:bg-transparent px-5 sm:px-8 py-8 xl:p-0 rounded-md shadow-md xl:shadow-none w-full sm:w-3/4 lg:w-2/4 xl:w-auto">

                <div id="login_div">
                    <form method="POST" action="{{route('loginclick') }}" >
                        @csrf
                        <h2 class="intro-x font-bold text-2xl xl:text-3xl text-center xl:text-left">

                            Sign In
                        </h2>
                        @if($errors->any())
                            @foreach($errors->all() as $error)
                                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
                                <script>
                                    $(document).ready(function(){
                                        // Create alert instance
                                        $("#myAlert").alert();

                                        var myAlert = bootstrap.Alert.getInstance($("#myAlert")[0]);
                                        console.log(myAlert);
                                        // {_element: div#myAlert.alert.alert-info.alert-dismissible.fade.show}

                                        $("#myBtn").click(function(){
                                            $("#myAlert").alert("dispose");
                                            console.log(myAlert);
                                        });
                                    });
                                </script>
                                </head>
                                <body>
                                @if (str_contains($errors->first(), 'Failure'))
                                    <div class="m-4">
                                        <div id="myAlert" class="alert alert-danger alert-dismissible fade show">
                                            <strong>Error!</strong>{{$errors->first()}}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert">
                                                <script src="https://code.iconify.design/iconify-icon/1.0.0-beta.3/iconify-icon.min.js"></script>
                                                <iconify-icon icon="ep:close-bold" style="color: white;" ></iconify-icon>
                                            </button>
                                        </div>
                                    </div>
                                @endif
                                @if (str_contains($errors->first(), 'Successfully'))
                                    <div class="m-4">
                                        <div id="myAlert" class="alert alert-success-soft alert-dismissible fade show">
                                            <strong>Sucess!</strong>{{$errors->first()}}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert">
                                                <script src="https://code.iconify.design/iconify-icon/1.0.0-beta.3/iconify-icon.min.js"></script>
                                                <iconify-icon icon="ep:close-bold" style="color: black;" ></iconify-icon>
                                            </button>
                                        </div>
                                    </div>
                                @endif
                                @endforeach
                                @endif


                                <div class="intro-x mt-2 text-slate-400 xl:hidden text-center">A few more clicks to sign in to your account. Manage all your e-commerce accounts in one place</div>
                                <div class="intro-x mt-8">
                                    <input required type="text" name="emp_id" class="intro-x login__input form-control py-3 px-4 block" placeholder="NA001">
                                    <input required type="password" name = "password" class="intro-x login__input form-control py-3 px-4 block mt-4" placeholder="Password">
                                </div>

                                <div class="intro-x flex text-slate-600 dark:text-slate-500 text-xs sm:text-sm mt-4">
                                    <div class="flex items-center mr-auto">
                                        {{--                                <input id="remember-me" type="checkbox" class="form-check-input border mr-2">--}}
                                        {{--                                <label class="cursor-pointer select-none" for="remember-me">Remember me</label>--}}
                                    </div>
                                    {{--                            <a href="">Forgot Password?</a>--}}

                                </div>
                                <div class="intro-x mt-5 xl:mt-8 text-center xl:text-left">
                                    <button class="btn btn-primary py-3 px-4 w-full xl:w-32 xl:mr-3 align-top">Login</button>

                                    <!-- <div class="btn btn-outline-secondary py-3 px-4 w-full xl:w-32 mt-3 xl:mt-0 align-top" >Register</div> -->

                                </div>
                    </form>
                    <div class="intro-x mt-10 xl:mt-24 text-slate-600 dark:text-slate-500 text-center xl:text-left">Are you a New Appliciant? SignUp  <b id="signup_button" style="color:#black;"> HERE</b></div>


                </div>


                <diV id="signup_div" class="hidden">
                    <form action="{{route('signup') }}" method="POST">
                        @csrf
                        <h2 class="intro-x font-bold text-2xl xl:text-3xl text-center xl:text-left">
                            Sign Up
                            @if($errors->any())
                                @foreach($errors->all() as $error)
                                    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
                                    <script>
                                        $(document).ready(function(){
                                            // Create alert instance
                                            $("#myAlert").alert();

                                            var myAlert = bootstrap.Alert.getInstance($("#myAlert")[0]);
                                            console.log(myAlert);
                                            // {_element: div#myAlert.alert.alert-info.alert-dismissible.fade.show}

                                            $("#myBtn").click(function(){
                                                $("#myAlert").alert("dispose");
                                                console.log(myAlert);
                                            });
                                        });
                                    </script>
                                    </head>
                                    <body>
                                    @if (str_contains($errors->first(), 'Failure'))
                                        <div class="m-4 items-center">
                                            <div id="myAlert" class="alert alert-danger alert-dismissible fade show">
                                                <strong>Error!</strong>{{$errors->first()}}
                                                <button type="button" class="btn-close" data-bs-dismiss="alert">
                                                    <script src="https://code.iconify.design/iconify-icon/1.0.0-beta.3/iconify-icon.min.js"></script>
                                                    <iconify-icon icon="ep:close-bold" style="color: white;" ></iconify-icon>
                                                </button>
                                            </div>
                                        </div>
                                    @endif
                                    @if (str_contains($errors->first(), 'Successfully'))
                                        <div class="m-4 items-center">
                                            <div id="myAlert" class="alert alert-success-soft alert-dismissible fade show">
                                                <strong>Sucess!</strong>{{$errors->first()}}
                                                <button type="button" class="btn-close" data-bs-dismiss="alert">
                                                    <script src="https://code.iconify.design/iconify-icon/1.0.0-beta.3/iconify-icon.min.js"></script>
                                                    <iconify-icon icon="ep:close-bold" style="color: black;" ></iconify-icon>
                                                </button>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            @endif

                        </h2>


                        <div class="intro-x mt-2 text-slate-400 dark:text-slate-400 xl:hidden text-center">A few more clicks to sign in to your account. Manage all your e-commerce accounts in one place</div>
                        <div class="intro-x mt-8">
                            <input type="text" class="intro-x login__input form-control py-3 px-4 block" id="username" name="username" placeholder="Name" required>
                            <input type="email" class="intro-x login__input form-control py-3 px-4 block mt-4" id="email" name="email" placeholder="Email" required pattern="[^@]+@[^@]+\.[a-zA-Z]{2,6}" onClick="onChange()">
                            <input type="password" class="intro-x login__input form-control py-3 px-4 block mt-4" id="signup_password" name="password" placeholder="Password" required onChange="onChange()">

                            <input type="password" class="intro-x login__input form-control py-3 px-4 block mt-4" id="confirm" placeholder="Password Confirmation" required onChange="onChange()">
                        </div>

                        <div class="intro-x mt-5 xl:mt-8 text-center xl:text-left">
                            <button class="btn btn-primary py-3 px-4 w-full xl:w-32 xl:mr-3 align-top" id="register_button">Register</button>
                            <div class="btn btn-outline-secondary py-3 px-4 w-full xl:w-32 mt-3 xl:mt-0 align-top" id="signin_in_reg">Sign in</div>
                        </div>
                </div>
            </div>


        </div>
    </div>
    <!-- END: Login Form -->

    <!-- BEGIN: Register Form -->
    <div class="h-screen xl:h-auto flex py-5 xl:py-0 my-10 xl:my-0" id="signup_div">
        <div class="my-auto mx-auto xl:ml-20 bg-white dark:bg-darkmode-600 xl:bg-transparent px-5 sm:px-8 py-8 xl:p-0 rounded-md shadow-md xl:shadow-none w-full sm:w-3/4 lg:w-2/4 xl:w-auto">

        </div>
    </div>
    <!-- END: Register Form -->

</div>
</div>
<!-- BEGIN: Dark Mode Switcher-->

<!-- END: Dark Mode Switcher-->

<!-- BEGIN: JS Assets-->
<script src="dist/js/app.js"></script>
<!-- END: JS Assets-->
</body>
</html>

<meta name="csrf-token" content="{{ csrf_token() }}">
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>

<!-- ------------------------------------------------------------------------------------------------ -->


<script>
    var exit_status;
    $(document).ready(function(){

        // Start Available Test
        //store
        $(document).on('click', '#signup_button', function(e){
            e.preventDefault();

            $('#signup_div').removeClass('hidden');
            $('#login_div').addClass('hidden');



        });

        $(document).on('click', '#signin_in_reg', function(e){
            e.preventDefault();

            $('#signup_div').addClass('hidden');
            $('#login_div').removeClass('hidden');



        });

        $(document).on('change', '#email', function (e) {
            e.preventDefault();

            //Show deleting..
            //$(this).text("Deleting...");

            var email = $('#email').val();
            console.log(email);

            var data = {
                'email' : email
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                method: "post",
                url: "/appliciant/signup",
                data: data,
                success: function (response) {
                    if(response.status==400){
                        exit_status=1;
                        console.log(exit_status);
                    }
                    else{
                        exit_status=0;
                        console.log(exit_status);
                    }

                }
            });
        });

        // function IsEmail(email) {
        // var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        //     if(!regex.test(email)) {
        //         return false;
        //     }else{
        //         return true;
        //     }
        // }

    });

    function onChange() {
        const password = document.querySelector('input[id=signup_password]');
        const confirm = document.querySelector('input[id=confirm]');
        const email = document.querySelector('input[id=email]');

        if (exit_status === 1) {
            email.setCustomValidity('The email is already exist!');
        }
        if (exit_status === 0){
            email.setCustomValidity('');
        }

        if (confirm.value !== password.value) {
            confirm.setCustomValidity('Passwords do not match');
        }
        else {
            confirm.setCustomValidity('');
            email.setCustomValidity('');
        }

    }



</script>
