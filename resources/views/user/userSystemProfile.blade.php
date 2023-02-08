
@extends('user.user_master')
@section('user')



    <div class="content">
        <!-- BEGIN: Top Bar -->
        <div class="top-bar">
            <!-- BEGIN: Breadcrumb -->
            <nav aria-label="breadcrumb" class="-intro-x mr-auto hidden sm:flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="">Application</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Profile</li>
                </ol>
            </nav>
            <!-- END: Breadcrumb -->
            <!-- BEGIN: Search -->
            <!-- END: Search -->
            <!-- BEGIN: Notifications -->
            <div class="intro-x dropdown mr-auto sm:mr-6">
                <div class="dropdown-toggle notification notification--bullet cursor-pointer" role="button" aria-expanded="false" data-tw-toggle="dropdown"> <i data-lucide="bell" class="notification__icon dark:text-slate-500"></i> </div>
                <div class="notification-content pt-2 dropdown-menu">
                </div>
            </div>
            <!-- END: Notifications -->
            <!-- BEGIN: Account Menu -->
            <div class="intro-x dropdown w-8 h-8">
                <div class="dropdown-toggle w-8 h-8 rounded-full overflow-hidden shadow-lg image-fit zoom-in" role="button" aria-expanded="false" data-tw-toggle="dropdown">
                    <img alt="" src="{{session('propic')}}">
                </div>
                <div class="dropdown-menu w-56">
                    <ul class="dropdown-content bg-primary text-white">
                        <li class="p-2">
                            <div class="font-medium">{{session('usernamee')}}</div>
                            <div class="text-xs text-white/70 mt-0.5 dark:text-slate-500">{{session('usertype')}}</div>
                        </li>
                        <li>
                            <hr class="dropdown-divider border-white/[0.08]">
                        </li>
                        <li>
                            <a href="{{route('systemprofile')}}" class="dropdown-item hover:bg-white/5"> <i data-lucide="user" class="w-4 h-4 mr-2"></i> Profile </a>
                        </li>

                        <li>
                            <a href="" class="dropdown-item hover:bg-white/5"> <i data-lucide="help-circle" class="w-4 h-4 mr-2"></i> Help </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider border-white/[0.08]">
                        </li>
                        <li>
                            <a href="{{ route('logout')}}" class="dropdown-item hover:bg-white/5"> <i data-lucide="toggle-right" class="w-4 h-4 mr-2"></i> Logout </a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- END: Account Menu -->
        </div>
        <!-- END: Top Bar -->
        <div class="intro-y flex items-center mt-8">
            <h2 class="text-lg font-medium mr-auto">
                Profile
            </h2>
        </div>
        <!-- BEGIN: Profile Info -->
        <div class="intro-y box px-5 pt-5 mt-5" style="width: 60% !important;margin:auto">
            <div class="flex flex-col lg:flex-row border-b border-slate-200/60 dark:border-darkmode-400 pb-5 -mx-5" >
                <div class="flex flex-1 px-5 items-center justify-center lg:justify-start" >
                    <div class="w-20 h-20 sm:w-24 sm:h-24 flex-none lg:w-32 lg:h-32 image-fit relative" >
                        <img  class="rounded-full" src="/{{session('propic')}}">
                    </div>
                    <div class="ml-5">
                        <div class="w-24 sm:w-40 truncate sm:whitespace-normal font-medium text-lg">{{session('usernamee')}}</div>
                        <div class="text-slate-500">{{session('bio')}}</div>
                    </div>
                </div>
                <div class="mt-6 lg:mt-0 flex-1 px-5 border-l border-r border-slate-200/60 dark:border-darkmode-400 border-t lg:border-t-0 pt-5 lg:pt-0">
                    <div class="font-medium text-center lg:text-left lg:mt-3">Contact Details</div>
                    <div class="flex flex-col justify-center items-center lg:items-start mt-4">
                        @foreach($employees as $e)
                        <div class="truncate sm:whitespace-normal flex items-center"> <i data-lucide="mail" class="w-4 h-4 mr-2"></i>
                            {{$e->email}}
                        </div>
                        <div class="truncate sm:whitespace-normal flex items-center mt-3"> <i data-lucide="phone" class="w-4 h-4 mr-2"></i>
                            {{$e->current_mobile}}
                        </div>
                        <div class="truncate sm:whitespace-normal flex items-center mt-3"> <i data-lucide="pin" class="w-4 h-4 mr-2"></i>
                            {{$e->current_postal_address}}
                        </div>

                    </div>
                </div>

            </div>
            <ul class="nav nav-link-tabs flex-col sm:flex-row justify-center lg:justify-start text-center" role="tablist" >
                <li id="profile-tab" class="nav-item" role="presentation">
                    <a type="button" id="showgallery" href="javascript:;" class="nav-link py-4 flex items-center active" data-tw-target="#profile" aria-controls="profile" aria-selected="true" role="tab" > <i class="w-4 h-4 mr-2" data-lucide="user"></i> Gallery </a>
                </li>
                <li id="profile-tab" class="nav-item" role="presentation">
                    <a type="button" id="showupdateform" href="javascript:;" class="nav-link py-4 flex items-center " data-tw-target="#profile" aria-controls="profile" aria-selected="true" role="tab" > <i class="w-4 h-4 mr-2" data-lucide="user"></i> Edit </a>
                </li>

            </ul>
        </div>
        <script>
            document.getElementById("showupdateform").addEventListener("click",
                function(){

                    document.querySelector("#gallery").style.display = "none";
                    document.querySelector("#settings").style.display = "block";

                });
            document.getElementById("showgallery").addEventListener("click",
                function(){

                    document.querySelector("#gallery").style.display = "block";
                    document.querySelector("#settings").style.display = "none";

                });
        </script>
        <div class="intro-y box px-5 pt-5 mt-5 " style="width: 60%;margin:auto;" id="gallery">

            <div class="intro-y col-span-12 md:col-span-6 box">
                <div class="p-5">
                    {{--                    @foreach($profile as $px)--}}
                    <table class="table">
                        <tr>
                            <td>
                        <div>
                            <label for="change-password-form-1" class="form-label" data-lucide="user"></label>
                            Name
                        </div>
                            </td><td>
                                {{$e->fname}} {{$e->mname}} {{$e->lname}}
                            </td>
                        </tr>

                        <tr>

                            <td>
                        <div class="mt-3">
                            <label for="change-password-form-2" class="form-label" data-lucide="map-pin"></label>
                            Current Address
                        </div>
                            </td><td>
                                {{$e->current_postal_address}}
                            </td>
                        </tr>

                        <tr>
                            <td>
                        <div class="mt-3">
                            <label for="change-password-form-3" class="form-label" data-lucide="pin"></label>
                            Permanent Address
                        </div>
                            </td><td>
                                {{$e->permanent_postal_address}}
                            </td>
                        </tr>
                        <tr>
                            <td>
                        <div>
                            <label for="change-password-form-2" class="form-label" data-lucide="phone"></label>
                            Current Mobile

                        </div>
                            </td><td>
                                {{$e->current_mobile}}
                            </td>
                        </tr>
                        <tr>
                            <td>
                        <div class="mt-3">
                            <label for="change-password-form-2" class="form-label" data-lucide="phone"></label>
                            Permanent Mobile
                        </div>
                            </td><td>
                                {{$e->permanent_mobile}}
                            </td>
                        </tr>
                        <tr>
                            <td>
                        <div class="mt-3">
                            <label for="change-password-form-2" class="form-label" data-lucide="mail"></label>
                            Email
                        </div>
                            </td><td>
                                {{$e->email}}
                            </td>
                        </tr>
                        <tr>
                            <td>
                        <div class="mt-3">
                            <label for="change-password-form-3" class="form-label" data-lucide="menu"></label>
                            Salary
                        </div>
                            </td><td>
                                {{$e->salary}}/=
                            </td>
                        </tr>
                        <tr>
                    </table>
                                                    @endforeach

                </div>

            </div>
        </div>

        <div class="intro-y box px-5 pt-5 mt-5 " style="width: 60%;margin:auto;display:none;" id="settings">

            <div class="intro-y col-span-12 md:col-span-6 box">
                <div class="p-5">
{{--                    @foreach($profile as $px)--}}
                        <form method="post" action="{{route('systemupdateprofile')}}" enctype="multipart/form-data">
                            @csrf

                            <div class="mt-3">
                                <label for="change-password-form-2" class="form-label" data-lucide="map-pin"></label>
                                Current Address
                                <input  required name="caddress" type="text" class="form-control" value=" {{$e->current_postal_address}}" placeholder="">

                            </div>
                            <div class="mt-3">
                                <label for="change-password-form-3" class="form-label" data-lucide="pin"></label>
                                Permanent Address
                                <input name="paddress" required type="text" value="{{$e->permanent_postal_address}}" class="form-control" placeholder="">
                            </div>

                            <div class="mt-3">
                                <label for="change-password-form-2" class="form-label" data-lucide="phone"></label>
                                Current Mobile
                                <input name="cmobile" required type="text" class="form-control" value="{{$e->current_mobile}}" placeholder="">
                            </div>
                            <div class="mt-3">
                                <label for="change-password-form-2" class="form-label" data-lucide="phone"></label>
                                Permanent Mobile
                                <input name="pmobile" required type="text" class="form-control" value="{{$e->permanent_mobile}}" placeholder="">
                            </div>
                            <div class="mt-3">
                                <label for="change-password-form-2" class="form-label" data-lucide="phone"></label>
                                Password
                                <input name="password" required id="password" type="password" class="form-control" value="{{$xx}}" placeholder="">
                            </div>
                            <div class="mt-3">
                                <label for="change-password-form-2" class="form-label" data-lucide="phone"></label>
                                Confirm Password
                                <input name="cpassword" required onfocusout="checkpasswords()" id="cpassword" type="password" class="form-control" value="{{$xx}}" placeholder="">
                            </div>
                            <p id="ph" style="color:red;"></p>
                            <div class="mt-3">
                                <label for="change-password-form-3" class="form-label" data-lucide="camera"></label>
                               Profile Picture
                                <input name="picture"   type="file" class="form-control" >
                            </div>
                            <button type="reset" class="btn btn-primary mt-4">Reset</button>
                            <button type="submit" class="btn btn-primary mt-4" id="submitbtn">Update</button>
                            <script>

                                    function checkpasswords(){
                                        var pw = document.getElementById("password");
                                        var cpw = document.getElementById("cpassword");
                                        //check empty password field
                                        if(pw.value.length == 0 || cpw.value.length == 0) {
                                            document.getElementById("ph").innerHTML = "**Fill the password fields!";
                                            return false;
                                        }
                                        if(pw != cpw){
                                            document.getElementById("ph").innerHTML = "Password and Confirm Password not match";
                                            return false;
                                        }

                                        //minimum password length validation
                                        // if(pw.length < 8) {
                                        //     document.getElementById("message").innerHTML = "**Password length must be atleast 8 characters";
                                        //     return false;
                                        // }
                                        //
                                        // //maximum length of password validation
                                        // if(pw.length > 15) {
                                        //     document.getElementById("message").innerHTML = "**Password length must not exceed 15 characters";
                                        //     return false;
                                        // }
                                        else {
                                            // alert("Password is correct");
                                        }

                                    };

                            </script>
                </div>
                </form>

            </div>
        </div>


    </div>

    </div>

    </div>



    </div>



@endsection
