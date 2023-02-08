
@extends('user.user_master')
@section('user')



    <div class="content">
        <!-- BEGIN: Top Bar -->
        <div class="top-bar">
            <!-- BEGIN: Breadcrumb -->
            <nav aria-label="breadcrumb" class="-intro-x mr-auto hidden sm:flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="social">Social Media</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Profile</li>
                </ol>
            </nav>
            <!-- END: Breadcrumb -->
            <!-- BEGIN: Search -->
            <!-- END: Search -->
            <a href="{{route('darmodeon')}}">
                <span class="iconify-inline mr-4" data-icon="emojione-monotone:{{session('lightmodeicon')}}" style="color: {{session('lightmodeiconcolor')}};" data-width="24" data-height="24"></span>
            </a>
            <!-- BEGIN: Notifications -->
            <div class="intro-x dropdown mr-auto sm:mr-6">
                <div class="dropdown-toggle notification notification--bullet cursor-pointer" role="button" aria-expanded="false" data-tw-toggle="dropdown"> <i data-lucide="bell" class="notification__icon dark:text-slate-500"></i> </div>
                <div class="notification-content pt-2 dropdown-menu">
                    <div class="notification-content__box dropdown-content">
                        <div class="notification-content__title">Notifications</div>
                        <div class="overflow-auto p-3 mb-3 mb-md-0 mr-md-3 bg-light" style="max-width: 660px; max-height: 200px;">
                            @foreach($notifi as $n)
                                @if($n->did_people != session('usernamee'))
                                <strong>
                                    <div class="cursor-pointer relative flex items-center ">
                                        <div class="w-12 h-12 flex-none image-fit mr-1">
                                            <img alt="" class="rounded-full" src="{{$n->pic_people}}">
                                            <div class="w-3 h-3 bg-success absolute right-0 bottom-0 rounded-full border-2 border-white dark:border-darkmode-600"></div>
                                        </div>
                                        <div class="ml-2 overflow-hidden ">
                                            <div class="flex items-center">
                                                <a href="javascript:;" class="font-medium truncate mr-5">{{$n->did_people}}</a>
                                                <div class="text-xs text-slate-400 ml-auto whitespace-nowrap">{{ \Carbon\Carbon::parse($n->created_at)->diffForHumans() }}</div>
                                            </div>
                                            <div class="w-full truncate text-slate-500 mt-0.5">{{$n->text}}</div>
                                        </div>
                                    </div>
                                </strong>
                                @endif
                            @endforeach
                            <hr>
                        </div>
                    </div>
                </div>
            </div>

            <!-- END: Notifications -->
            <!-- BEGIN: Account Menu -->
            <div class="intro-x dropdown w-8 h-8">
                <div class="dropdown-toggle w-8 h-8 rounded-full overflow-hidden shadow-lg image-fit zoom-in" role="button" aria-expanded="false" data-tw-toggle="dropdown">
                    <img alt="" src="{{session('socpropic')}} ">
                </div>
                <div class="dropdown-menu w-56">
                    <ul class="dropdown-content bg-primary text-white">
                        <li class="p-2">
                            <div class="font-medium">{{session('socname')}}</div>
                            <div class="text-xs text-white/70 mt-0.5 dark:text-slate-500">{{session('usertype')}}</div>
                        </li>
                        <li>
                            <hr class="dropdown-divider border-white/[0.08]">
                        </li>
                        <li>
                            <a href="" class="dropdown-item hover:bg-white/5"> <i data-lucide="user" class="w-4 h-4 mr-2"></i> Profile </a>
                        </li>
                        <li>
                            <a href="" class="dropdown-item hover:bg-white/5"> <i data-lucide="edit" class="w-4 h-4 mr-2"></i> Add Account </a>
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

        </div>
        <!-- BEGIN: Profile Info -->
        <div class="intro-y box px-5 pt-5 mt-5">
            <div class="flex flex-col lg:flex-row border-b border-slate-200/60 dark:border-darkmode-400 pb-5 -mx-5">
                <div class="flex flex-1 px-5 items-center justify-center lg:justify-start">
                    <div class="w-20 h-20 sm:w-24 sm:h-24 flex-none lg:w-32 lg:h-32 image-fit relative">
                        <img  data-action="zoom" class="rounded-full" src="{{session('socpropic')}}">
                    </div>
                    <div class="ml-5">
                        <div class="w-24 sm:w-40 truncate sm:whitespace-normal font-medium text-lg">{{session('socname')}}</div>
                        <div class="text-slate-500">{{session('socbio')}}</div>
                        <a href="{{route('removepropic')}}"><div class="text-slate-500"><button type="button" class="btn btn-primary hidden" id="removepropic" >Remove Profile Picture</button></a>
                        </div>
                    </div>
                </div>
                <div class="mt-6 lg:mt-0 flex-1 px-5 border-l border-r border-slate-200/60 dark:border-darkmode-400 border-t lg:border-t-0 pt-5 lg:pt-0">
                    <div class="font-medium text-center lg:text-left lg:mt-3">Contact Details</div>
                    <div class="flex flex-col justify-center items-center lg:items-start mt-4">
                        <div class="truncate sm:whitespace-normal flex items-center"> <i data-lucide="mail" class="w-4 h-4 mr-2"></i>
                            {{session('socemail')}}
                        </div>
                        <div class="truncate sm:whitespace-normal flex items-center mt-3"> <i data-lucide="instagram" class="w-4 h-4 mr-2"></i>
                            {{session('socinsta')}}
                        </div>
                        <div class="truncate sm:whitespace-normal flex items-center mt-3"> <i data-lucide="twitter" class="w-4 h-4 mr-2"></i>
                            {{session('soctwitter')}}
                        </div>
                    </div>
                </div>
                <div class="mt-6 lg:mt-0 flex-1 flex items-center justify-center px-5 border-t lg:border-0 border-slate-200/60 dark:border-darkmode-400 pt-5 lg:pt-0">
                    <div class="text-center rounded-md w-20 py-3">
                        <div class="font-medium text-primary text-xl">{{$postsforprocount}}</div>
                        <div class="text-slate-500">Posts</div>
                    </div>

                </div>
            </div>
            <ul class="nav nav-link-tabs flex-col sm:flex-row justify-center lg:justify-start text-center" role="tablist" >
                <li id="profile-tab" class="nav-item" role="presentation">
                    <a type="button" id="showgallery" href="javascript:;" class="nav-link py-4 flex items-center active" data-tw-target="#profile" aria-controls="profile" aria-selected="true" role="tab" > <i class="w-4 h-4 mr-2" data-lucide="user"></i> Gallery </a>
                </li>
                <li id="profile-tab" class="nav-item" role="presentation">
                    <a type="button" id="showupdateform" href="javascript:;" class="nav-link py-4 flex items-center " data-tw-target="#profile" aria-controls="profile" aria-selected="true" role="tab" > <i class="w-4 h-4 mr-2" data-lucide="user"></i> Settings </a>
                </li>

            </ul>
        </div>
        <script>
            document.getElementById("showupdateform").addEventListener("click",
                function(){

                    document.querySelector("#gallery").style.display = "none";
                    document.querySelector("#settings").style.display = "block";
                    document.querySelector("#removepropic").style.display = "block";


                });
            document.getElementById("showgallery").addEventListener("click",
                function(){

                    document.querySelector("#gallery").style.display = "block";
                    document.querySelector("#settings").style.display = "none";

                });
        </script>
        <div class="intro-y box px-5 pt-5 mt-5 " id="gallery">
            <div class="" style="width: 93% !important;" >
                    <div class="intro-y grid grid-cols-12 gap-6 mt-5 ">
                        @foreach($postsforpro as $p)
                        <div class="intro-y col-span-12 md:col-span-3 box">
                            <img data-action="zoom" src="{{$p->picture}} " >
                        </div>
                        @endforeach
                    </div>
            </div>

        </div>
            <div class="intro-y box px-5 pt-5 mt-5 " style="width: 70%;margin-left:50px;display:none;" id="settings">

                        <div class="intro-y col-span-12 md:col-span-6 box">
                            <div class="p-5">
                                @foreach($profile as $px)
                                    <form method="post" action="updateprofile" enctype="multipart/form-data">
                                        @csrf
                                <div>
                                    <label for="change-password-form-1" class="form-label" data-lucide="user"></label>
                                    Username
                                    <input required name="username" id="change-password-form-1" type="text" class="form-control" placeholder="{{$px->username}}">
                                </div>
                                <div class="mt-3">
                                    <label for="change-password-form-2" class="form-label">Name</label>
                                    <input required name="name" id="change-password-form-2" type="text" class="form-control" placeholder="{{$px->name}}">
                                </div>
                                <div class="mt-3">
                                    <label for="change-password-form-3" class="form-label">Bio</label>
                                    <input required name="bio" id="change-password-form-3" type="text" class="form-control" placeholder="{{$px->bio}}">
                                </div>
                                <div>
                                    <label for="change-password-form-2" class="form-label" data-lucide="mail"></label>
                                    E-mail
                                    <input required name="email" id="change-password-form-1" type="text" class="form-control" placeholder="{{$px->email}}">
                                </div>
                                <div class="mt-3">
                                    <label for="change-password-form-2" class="form-label" data-lucide="instagram"></label>
                                    Instagram
                                    <input required name="insta" id="change-password-form-2" type="text" class="form-control" placeholder="{{$px->insta}}">
                                </div>
                                <div class="mt-3">
                                    <label for="change-password-form-3" class="form-label" data-lucide="twitter"></label>Twitter
                                    <input required name="twitter" id="change-password-form-3" type="text" class="form-control" placeholder="{{$px->twitter}}">
                                </div>
                                <div class="mt-3">
                                    <label for="change-password-form-3" class="form-label" data-lucide="camera"></label>
                                    Profile Picture
                                    <input onchange="readURL(this);" name="picture" id="change-password-form-3" type="file" class="form-control" >
                                </div>
                                        <img id="blah" src="#" class=" rounded hidden" style="width: 250px;"/>
                                        <script>
                                            function readURL(input) {
                                                document.querySelector("#blah").style.display = "block";
                                                if (input.files && input.files[0]) {
                                                    var reader = new FileReader();

                                                    reader.onload = function (e) {
                                                        $('#blah')
                                                            .attr('src', e.target.result)
                                                            .width(150)
                                                            .height(200);
                                                    };

                                                    reader.readAsDataURL(input.files[0]);
                                                }
                                            }
                                        </script>
                                        @endforeach
                                        <button type="reset" class="btn btn-primary mt-4">Reset</button>
                                <button type="submit" class="btn btn-primary mt-4">Save</button>
                            </div>
                            </form>

                </div>
            </div>
            <style>

            </style>

        </div>

            </div>

        </div>



    </div>



@endsection
<script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script>
