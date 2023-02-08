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
<html lang="en" class="{{session('lightmode')}}">
<!-- BEGIN: Head -->

    <meta charset="utf-8">
    <link href="dist/images/logo.svg" rel="shortcut icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Midone admin is super flexible, powerful, clean & modern responsive tailwind admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Midone Admin Template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="LEFT4CODE">
    <title>Boo</title>
    <!-- BEGIN: CSS Assets-->
    <link rel="stylesheet" href="dist/css/app.css" />
    <!-- END: CSS Assets-->

</head>
<!-- END: Head -->
<body class="py-5">
<!-- BEGIN: Mobile Menu -->
<!-- END: Mobile Menu -->
<div class="flex">
    <!-- BEGIN: Side Menu -->
    <nav class="side-nav">
        <a href="" class="intro-x flex items-center pl-5 pt-4">
            <img alt="" class="w-6" src=" {{asset('dist/images/logo.svg')}} ">
            <span class="hidden xl:block text-white text-lg ml-3"> UOR - NMIS </span>
        </a>
        <div class="side-nav__devider my-6"></div>
        <ul>
            <li>
                <a href="javascript:;.html" class="side-menu {{session('index')}}">
                    <div class="side-menu__icon"> <i data-lucide="home"></i> </div>
                    <div class="side-menu__title">
                        Dashboard
                        <div class="side-menu__sub-icon transform rotate-180"> <i data-lucide="chevron-down"></i> </div>
                    </div>
                </a>

            </li>
            <li>



            <li>
            <li class="side-nav__devider my-6"></li>
            </li>
            <li>
                <a href="UserRequestmodule" class="side-menu {{session('request')}}">
                    <div class="side-menu__icon"> <i data-lucide="phone-outgoing"></i> </div>
                    <div class="side-menu__title"> Request  </div>
                </a>

            </li>

            <li>
            <li class="side-nav__devider my-6"></li>
            </li>
            <li>
                <a href="UserComplaintmodule" class="side-menu {{session('complain')}}">
                    <div class="side-menu__icon"> <i data-lucide="frown"></i> </div>
                    <div class="side-menu__title"> Raise & Issue  </div>
                </a>

            </li>

            <li>
            <li class="side-nav__devider my-6"></li>
            </li>
            <li>
                <a href="Userravemodule" class="side-menu {{session('rave')}}">
                    <div class="side-menu__icon"> <i data-lucide="star"></i> </div>
                    <div class="side-menu__title"> Rave  </div>
                </a>

            </li>

            <li>
            <li class="side-nav__devider my-6"></li>
            </li>
            <li>
                <a href="social" class="side-menu {{session('social')}}">
                    <div class="side-menu__icon"> <i data-lucide="instagram"></i> </div>
                    <div class="side-menu__title"> Social Group </div>
                </a>

            </li>

            <li>
            <li class="side-nav__devider my-6"></li>
            </li>
            <li>
                <a href="UserLeavemodule" class="side-menu {{session('leave')}}">
                    <div class="side-menu__icon"> <i data-lucide="instagram"></i> </div>
                    <div class="side-menu__title"> Leave  </div>
                </a>

            </li>

            <li>
            <li class="side-nav__devider my-6"></li>
            </li>
            <li>
                <a href="mobileApp" class="side-menu {{session('mobile')}}">
                    <div class="side-menu__icon"> <i data-lucide="smartphone"></i> </div>
                    <div class="side-menu__title"> Mobile App </div>
                </a>

            </li>


        </ul>
    </nav>
    <!-- END: Side Menu -->
    <!-- BEGIN: Content -->
    <div class="content">
        <!-- BEGIN: Top Bar -->
        <div class="top-bar">
            <!-- BEGIN: Breadcrumb -->
            <nav aria-label="breadcrumb" class="-intro-x mr-auto hidden sm:flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Application</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Social Media</li>
                </ol>
            </nav>
            <div class="alertclass" style="margin-right: 360px;">
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

                    <!-- END: Breadcrumb -->
            <!-- BEGIN: Search -->
            <a href="{{route('darmodeon')}}">
                <span class="iconify-inline mr-4" data-icon="emojione-monotone:{{session('lightmodeicon')}}" style="color: {{session('lightmodeiconcolor')}};" data-width="24" data-height="24"></span>
            </a>
            <!-- END: Search -->

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
                    <img alt="" src="{{session('socpropic')}}">
                </div>
                <div class="dropdown-menu w-56">
                    <ul class="dropdown-content bg-primary text-white">
                        <li class="p-2">
                            <div class="font-medium">{{session('socusername')}}</div>
{{--                            <div class="text-xs text-white/70 mt-0.5 dark:text-slate-500">bio</div>--}}
                        </li>
                        <li>
                            <hr class="dropdown-divider border-white/[0.08]">
                        </li>
                        <li>
                            <a href="socialmediaprofile" class="dropdown-item hover:bg-white/5"> <i data-lucide="user" class="w-4 h-4 mr-2"></i> Profile </a>
                        </li>

                        <li>
                            <a href="" class="dropdown-item hover:bg-white/5"> <i data-lucide="help-circle" class="w-4 h-4 mr-2"></i> Help </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider border-white/[0.08]">
                        </li>
                        <li>
                            <a href="logout" class="dropdown-item hover:bg-white/5"> <i data-lucide="toggle-right" class="w-4 h-4 mr-2"></i> Logout </a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- END: Account Menu -->
        </div>
        <!-- END: Top Bar -->
        <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
            <h2 class="text-lg font-medium mr-auto">
                Boo Social Media
            </h2>

                    <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
                <a href="addpost">
                <button  class="btn btn-primary shadow-md mr-2">Create Post</button></a>
            </div>
        </div>



        <div class="" style="width: 60% !important;margin:auto" >
            <!-- BEGIN: Blog Layout -->

            @foreach($data as $post)

            <div class="intro-y col-span-12 md:col-span-6 box "  >
                <div  class="h-[320px] before:block before:absolute before:w-full before:h-full before:top-0 before:left-0 before:z-10 before:bg-gradient-to-t before:from-black/90 before:to-black/10 image-fit">
                    <img alt=""  class="rounded-t-md" src="{{$post->picture}}">
                    <div class="absolute w-full flex items-center px-5 pt-6 z-10">
                        <div class="w-10 h-10 flex-none image-fit">
                            @foreach($employeeall as $emp)
                                @if($emp->emp_id == $post->emp_id)

                                    <img alt="" class="rounded-full" src="{{$emp->emp_pic}}">

                                @endif
                            @endforeach
                        </div>
                        <div class="ml-3 text-white mr-auto">
                            <a href="" class="font-medium">{{$post->fname}}</a>
                            <div class="text-xs mt-0.5">{{ \Carbon\Carbon::parse($post->created_at)->diffForHumans() }}</div>
                        </div>

                        <div class="dropdown ml-3">
                            <a href="javascript:;" class="bg-white/20 dropdown-toggle w-8 h-8 flex items-center justify-center rounded-full" aria-expanded="false" data-tw-toggle="dropdown"> <i data-lucide="more-vertical" class="w-4 h-4 text-white"></i> </a>
                            <div class="dropdown-menu w-40">
                                @if($post->emp_id == session('emp_id'))
                                    {{--   give permisoon to edit & delete check employee id of post and already logged user employee id--}}
                                    <ul class="dropdown-content">
                                    <li>
                                        <a href="{{ url('usereditpost/' . $post->id) }}" class="dropdown-item"> <i data-lucide="edit-2" class="w-4 h-4 mr-2"></i> Edit Post </a>
                                    </li>
                                    <li>
                                        <a href="{{ url('deletepost/' . $post->id) }}" class="dropdown-item"> <i data-lucide="trash" class="w-4 h-4 mr-2"></i> Delete Post </a>
                                    </li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="absolute bottom-0 text-white px-5 pb-6 z-10"> <span class="bg-white/20 px-2 py-1 rounded">{{$post->location}}</span> <a href="" class="block font-medium text-xl mt-3"></a> </div>
                </div>

                <div class="p-5 text-slate-600 dark:text-slate-500">{{$post->description}}</div>
                <div class="flex items-center px-5 py-3 border-t border-slate-200/60 dark:border-darkmode-400">
{{--                    react count--}}
{{--                    @foreach($reactCount as $count)--}}

{{--                        @if($count->post_id == $post->id)--}}
{{--                            {{$count->total}}--}}
{{--                        @endif--}}
{{--                    @endforeach--}}

                @foreach($reactors as $r)
                        @if($r->post_id == $post->id)
                            <div id="r{{ $post->id }}count" class="count_div">{{$post->react_count}}</div>
                            <svg onclick="hidecount{{ $post->id }}()" style="color: red;" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart-fill react-icon" react-id="{{ $post->id }}" id="r{{ $post->id }}" value="{{ $post->id }}" viewBox="0 0 16 16" >
                                <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
                            </svg>
                            @break
                        @else

                            @if($loop->last)
                                <div  id="likecounthide{{ $post->id }}" class="count_div">{{$post->react_count}}</div>
                                <script>
                                    function hidecount{{ $post->id }}(){
                                        document.querySelector("#likecounthide{{ $post->id }}").style.display = "none";
                                    }
                                </script>
                                <div id="r{{ $post->id }}count" class="count_div"></div>
                                <svg  onclick="hidecount{{ $post->id }}()" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart-fill react-icon" react-id="{{ $post->id }}" id="r{{ $post->id }}" value="{{ $post->id }}" viewBox="0 0 16 16" >
                                    <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
                                </svg>
                            @endif
                        @endif
                    @endforeach
                    <div class="intro-x flex mr-2">

{{--                        <div class="intro-x w-8 h-8 image-fit">--}}
{{--                            <img alt="xx" class="rounded-full border border-white zoom-in tooltip" src="/a.jpeg" title="">--}}
{{--                        </div>--}}
{{--                        <div class="intro-x w-8 h-8 image-fit">--}}
{{--                            <img alt="xx" class="rounded-full border border-white zoom-in tooltip" src="/a.jpeg" title="">--}}
{{--                        </div>--}}
{{--                        <div class="intro-x w-8 h-8 image-fit">--}}
{{--                            <img alt="xx" class="rounded-full border border-white zoom-in tooltip" src="/a.jpeg" title="">--}}
{{--                        </div>--}}


                    </div>
                     </div>
                <div class="px-5 pt-3 pb-5 border-t border-slate-200/60 dark:border-darkmode-400">
                    <div class="w-full flex text-slate-500 text-xs sm:text-sm">

                        <div class="mr-2" > Comments: <span class="font-medium">

                                @foreach($commentCount as $count)

                                    @if($count->post_id == $post->id)
                                        {{$count->total}}
                                    @endif
                                @endforeach

                            </span> </div>


                    </div>
                    <div class="w-full flex items-center mt-3">
                        <div class="w-8 h-8 flex-none image-fit mr-3">
                            <img alt="" class="rounded-full" src="{{session('socpropic')}}">
                        </div>
                        <div class="flex-1 relative text-slate-600 dark:text-slate-200">
                            <form method="POST" action="postcomment">
                                @csrf

                            <input type="text" class="form-control form-control-rounded border-transparent bg-slate-100 pr-10" name="text" placeholder="Post a comment...">
                            <i data-lucide="smile" class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0"></i>
                                <input type="hidden" name="post_id" value="{{$post->id}}">
                                <input type="hidden" name="post_title" value="{{$post->title}}">
                                <input type="hidden" name="to_people" value="{{$post->emp_id}}">

                                <input type="submit" style="display:none"/>
                            </form>
                        </div>

                    </div>
                    <div class="overflow-auto p-3 mb-3 mb-md-0 mr-md-3 bg-light" style="max-width: 660px; max-height: 100px;">
                        <strong>
                            <div class="comment" style="">
                                                @foreach($comments as $c)
                                                    @if($c->post_id == $post->id)
                                                    @foreach($employeeall as $en)
                                                        @if($c->emp_id == $en->emp_id)
                                                            <img alt="" class="rounded-full" width="30px" src="{{$en->emp_pic}}">
                                                            @endif
                                                        @endforeach
                                                        <p style="font-weight: bolder">{{$c->text}}</p>
                                                    <i style="font-weight: bolder">
                                                        {{ \Carbon\Carbon::parse($c->created_at)->diffForHumans() }}</i>
                                                        <hr>
                                                    @endif</strong>
                                                @endforeach

                                            </div>
                    </div>
                </div>
            </div>
{{--                <div class="intro-y col-span-12 md:col-span-3 box" style="background-color: rgb(241,245,249)">--}}

{{--                </div>--}}



<br>

            @endforeach
            </div>

            <!-- END: Blog Layout -->
            <!-- BEGIN: Pagiantion -->
            <div class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-nowrap items-center">
                <nav class="w-full sm:w-auto sm:mr-auto">
                    <ul class="pagination">
                        <li class="page-item">
                            <a class="page-link" href="#"> <i class="w-4 h-4" data-lucide="chevrons-left"></i> </a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#"> <i class="w-4 h-4" data-lucide="chevron-left"></i> </a>
                        </li>
                        <li class="page-item"> <a class="page-link" href="#">...</a> </li>
                        <li class="page-item"> <a class="page-link" href="#">1</a> </li>
                        <li class="page-item active"> <a class="page-link" href="#">2</a> </li>
                        <li class="page-item"> <a class="page-link" href="#">3</a> </li>
                        <li class="page-item"> <a class="page-link" href="#">...</a> </li>
                        <li class="page-item">
                            <a class="page-link" href="#"> <i class="w-4 h-4" data-lucide="chevron-right"></i> </a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#"> <i class="w-4 h-4" data-lucide="chevrons-right"></i> </a>
                        </li>
                    </ul>
                </nav>
                <select class="w-20 form-select box mt-3 sm:mt-0">
                    <option>10</option>
                    <option>25</option>
                    <option>35</option>
                    <option>50</option>
                </select>
            </div>
            <!-- END: Pagiantion -->
        </div>

    </div>
@if(session('usertype') == 'admin')
    <div data-url="{{route('Requestmodule')}}" class="dark-mode-switcher cursor-pointer shadow-md fixed bottom-0 right-0 box border rounded-full w-40 h-12 flex items-center justify-center z-50 mb-10 mr-10">
        <div class="mr-4 text-slate-600 dark:text-slate-200">Admin</div>
        <div class="dark-mode-switcher__toggle dark-mode-switcher__toggle--active border"></div>
        <div class="mr-4 text-slate-600 dark:text-slate-200">User</div>
    </div>
@endif
    <!-- END: Content -->
</div>

<!-- BEGIN: JS Assets-->
<script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=["your-google-map-api"]&libraries=places"></script>
<script src="dist/js/app.js"></script>
<!-- END: JS Assets-->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<meta name="csrf-token" content="{{ csrf_token() }}">
<script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
<!-- <script src="https://maps.googleapis.com/maps/api/js?key=["your-google-map-api"]&libraries=places"></script> -->
<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
<script>
$(document).ready(function(){

    $(document).on('click', '.react-icon', function(e) {
        e.preventDefault();

        var react_id = this.getAttribute('value');
        var id= $(this).attr('id');
        var count_id =$(this).attr('id');
        var count_div_id= count_id+"count";

        console.log(id);
        console.log(count_div_id);

        var data = {
            'react_id': react_id
        }

        console.log("data");
        console.log(data);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: "POST",
            url: "storereact",
            data: data,
            dataType: "json",
            success: function (response) {
                //$('#count').html("");



                if (response.status == 400) {
                    console.log("400");
                }
                else {
                    if(response.like=="true") {

                        $('#' + id + '').attr("fill", "red");
                        $('#'+count_div_id).text(response.post_react_count);
                    }
                    else{
                        $('#' + id + '').attr("fill", "black");
                        $('#'+count_div_id).text(response.post_react_count);
                    }
                }

            }

        });
    });


});



// --------------------------------------adam------------------------------------------
{{--    $(document).ready(function(){--}}
{{--        $(".react-icon").click(function (){--}}
{{--            console.log("clicked");--}}
{{--            let post_id =  $(this).attr('react-id');--}}
{{--            --}}{{--let logged_user = {{ session('emp_id') }};--}}

{{--            $.ajax({--}}
{{--                type: "GET",--}}
{{--                url:  `storereact/${post_id}`,--}}
{{--                dataType: "json",--}}

{{--                success: function(resultData){--}}

{{--                    });--}}



{{--                }--}}
{{--            });--}}
            // react_status.error(function() { alert("Something went wrong"); });

    //     })
    // });



</script>
</body>

</html>
<script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script>
