
@extends('admin.admin_master')
@section('admin')



<div class="content">
                <!-- BEGIN: Top Bar -->
                <div class="top-bar">
                    <!-- BEGIN: Breadcrumb -->
                    <nav aria-label="breadcrumb" class="-intro-x mr-auto hidden sm:flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('user.view')}}">Manage User</a></li>
                            <li class="breadcrumb-item active" aria-current="page">View User</li>
                        </ol>
                    </nav>
                    <!-- END: Breadcrumb -->
                    <!-- BEGIN: Search -->
                    <!-- END: Search -->
                    <script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script>
                    <a href="{{route('darmodeon')}}">
                        <span class="iconify-inline mr-4" data-icon="emojione-monotone:{{session('lightmodeicon')}}" style="color: {{session('lightmodeiconcolor')}};" data-width="24" data-height="24"></span>
                    </a>
                    <!-- BEGIN: Notifications -->
                    <div class="intro-x dropdown mr-auto sm:mr-6">
                        <div class="dropdown-toggle notification notification--bullet cursor-pointer" role="button" aria-expanded="false" data-tw-toggle="dropdown"> <i data-lucide="bell" class="notification__icon dark:text-slate-500"></i> </div>
                        <div class="notification-content pt-2 dropdown-menu">
                            <div class="notification-content__box dropdown-content">
                                <div class="notification-content__title">Notifications</div>
                                <div class="cursor-pointer relative flex items-center ">
                                    <div class="w-12 h-12 flex-none image-fit mr-1">
                                        <img alt="Midone - HTML Admin Template" class="rounded-full" src="dist/images/profile-6.jpg">
                                        <div class="w-3 h-3 bg-success absolute right-0 bottom-0 rounded-full border-2 border-white dark:border-darkmode-600"></div>
                                    </div>
                                    <div class="ml-2 overflow-hidden">
                                        <div class="flex items-center">
                                            <a href="javascript:;" class="font-medium truncate mr-5">Al Pacino</a>
                                            <div class="text-xs text-slate-400 ml-auto whitespace-nowrap">01:10 PM</div>
                                        </div>
                                        <div class="w-full truncate text-slate-500 mt-0.5">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem </div>
                                    </div>
                                </div>
                                <div class="cursor-pointer relative flex items-center mt-5">
                                    <div class="w-12 h-12 flex-none image-fit mr-1">
                                        <img alt="Midone - HTML Admin Template" class="rounded-full" src="dist/images/profile-2.jpg">
                                        <div class="w-3 h-3 bg-success absolute right-0 bottom-0 rounded-full border-2 border-white dark:border-darkmode-600"></div>
                                    </div>
                                    <div class="ml-2 overflow-hidden">
                                        <div class="flex items-center">
                                            <a href="javascript:;" class="font-medium truncate mr-5">Leonardo DiCaprio</a>
                                            <div class="text-xs text-slate-400 ml-auto whitespace-nowrap">05:09 AM</div>
                                        </div>
                                        <div class="w-full truncate text-slate-500 mt-0.5">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem </div>
                                    </div>
                                </div>
                                <div class="cursor-pointer relative flex items-center mt-5">
                                    <div class="w-12 h-12 flex-none image-fit mr-1">
                                        <img alt="Midone - HTML Admin Template" class="rounded-full" src="dist/images/profile-12.jpg">
                                        <div class="w-3 h-3 bg-success absolute right-0 bottom-0 rounded-full border-2 border-white dark:border-darkmode-600"></div>
                                    </div>
                                    <div class="ml-2 overflow-hidden">
                                        <div class="flex items-center">
                                            <a href="javascript:;" class="font-medium truncate mr-5">Robert De Niro</a>
                                            <div class="text-xs text-slate-400 ml-auto whitespace-nowrap">05:09 AM</div>
                                        </div>
                                        <div class="w-full truncate text-slate-500 mt-0.5">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 20</div>
                                    </div>
                                </div>
                                <div class="cursor-pointer relative flex items-center mt-5">
                                    <div class="w-12 h-12 flex-none image-fit mr-1">
                                        <img alt="Midone - HTML Admin Template" class="rounded-full" src="dist/images/profile-15.jpg">
                                        <div class="w-3 h-3 bg-success absolute right-0 bottom-0 rounded-full border-2 border-white dark:border-darkmode-600"></div>
                                    </div>
                                    <div class="ml-2 overflow-hidden">
                                        <div class="flex items-center">
                                            <a href="javascript:;" class="font-medium truncate mr-5">Russell Crowe</a>
                                            <div class="text-xs text-slate-400 ml-auto whitespace-nowrap">01:10 PM</div>
                                        </div>
                                        <div class="w-full truncate text-slate-500 mt-0.5">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#039;s standard dummy text ever since the 1500</div>
                                    </div>
                                </div>
                                <div class="cursor-pointer relative flex items-center mt-5">
                                    <div class="w-12 h-12 flex-none image-fit mr-1">
                                        <img alt="Midone - HTML Admin Template" class="rounded-full" src="dist/images/profile-15.jpg">
                                        <div class="w-3 h-3 bg-success absolute right-0 bottom-0 rounded-full border-2 border-white dark:border-darkmode-600"></div>
                                    </div>
                                    <div class="ml-2 overflow-hidden">
                                        <div class="flex items-center">
                                            <a href="javascript:;" class="font-medium truncate mr-5">Leonardo DiCaprio</a>
                                            <div class="text-xs text-slate-400 ml-auto whitespace-nowrap">06:05 AM</div>
                                        </div>
                                        <div class="w-full truncate text-slate-500 mt-0.5">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END: Notifications -->
                    <!-- BEGIN: Account Menu -->
                    <div class="intro-x dropdown w-8 h-8">
                        <div class="dropdown-toggle w-8 h-8 rounded-full overflow-hidden shadow-lg image-fit zoom-in" role="button" aria-expanded="false" data-tw-toggle="dropdown">
                            <img alt="Midone - HTML Admin Template" src="/{{session('propic')}} ">
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
                                    <a href="{{route('adminsystemprofile')}}" class="dropdown-item hover:bg-white/5"> <i data-lucide="user" class="w-4 h-4 mr-2"></i> Profile </a>
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

                <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
                    <h2 class="text-lg font-medium mr-auto">
                      Review Employee
                    </h2>

                </div>


             <!-- BEGIN: Content -->

            <div class="intro-y chat grid grid-cols-6  mt-5">
                    <!-- BEGIN: Chat Side Menu -->
                    <div class="col-span-6 lg:col-span-4 2xl:col-span-3">
                        <div class="intro-y pr-1">
                            <div class="box p-2">
                                <ul class="nav nav-pills" role="tablist">

                                    <li id="profile-tab" class="nav-item flex-1" role="presentation">
                                        <button class="nav-link w-full py-2 active" data-tw-toggle="pill" data-tw-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="true"> Profile </button>


                                    <li id="chats-tab" class="nav-item flex-1" role="presentation">
                                        <button class="nav-link w-full py-2 " data-tw-toggle="pill" data-tw-target="#chats" type="button" role="tab" aria-controls="chats" aria-selected="false"> Employee List </button>
                                    </li>


                                </ul>
                            </div>
                        </div>
                        <div class="tab-content" style="width:70% marg">

                            <div id="profile" class="tab-pane active" role="tabpanel" aria-labelledby="profile-tab"  >
                                <div class="pr-1" style="background-color:#8be98c; border-radius: 35px;">
                                    <div class="box px-5 py-10 mt-5" style="width:600px;margin-left:250px;  border-radius: 40px;">
                                        <div class="w-10 h-20 flex-none image-fit rounded-full overflow-hidden mx-auto">
                                            <img  src="/{{session('propic')}}">
                                        </div>
                                        <div class="text-center mt-3 ">
                                            <div class="text-slate-500 mt-1 text-pending">{{session('usertype')}}</div>
                                            <div class="text-slate-500 mt-1">{{session('emp_id')}}</div>
{{--                                            {{session('$usertype')}}--}}
                                            <div class="font-medium text-lg uppercase">{{session('usernamee')}}</div>
                                            <div class="text-slate-500 mt-1 flex " style="margin-left: 220px">
                                                <span id="star-1" class="iconify" data-icon="cil:star" data-width="26" data-height="26" data-flip="horizontal"></span>
                                                <span id="star-2" class="iconify" data-icon="cil:star" data-width="26" data-height="26" data-flip="horizontal"></span>
                                                <span id="star-3" class="iconify" data-icon="cil:star" data-width="26" data-height="26" data-flip="horizontal"></span>
                                                <span id="star-4" class="iconify" data-icon="cil:star" data-width="26" data-height="26" data-flip="horizontal"></span>
                                                <span id="star-5" class="iconify" data-icon="cil:star" data-width="26" data-height="26" data-flip="horizontal"></span>
                                            </div>
                                            <script>

                                                if({{$final_rate}}=='1'){
                                                    document.getElementById("star-1").style.color = "yellow";
                                                }
                                                if({{$final_rate}}=='2'){
                                                    document.getElementById("star-1").style.color = "yellow";
                                                    document.getElementById("star-2").style.color = "yellow";
                                                }
                                                if({{$final_rate}}=='3'){
                                                    document.getElementById("star-1").style.color = "yellow";
                                                    document.getElementById("star-2").style.color = "yellow";
                                                    document.getElementById("star-3").style.color = "yellow";
                                                }
                                                if({{$final_rate}}=='4'){
                                                    document.getElementById("star-1").style.color = "yellow";
                                                    document.getElementById("star-2").style.color = "yellow";
                                                    document.getElementById("star-3").style.color = "yellow";
                                                    document.getElementById("star-4").style.color = "yellow";
                                                }
                                                if({{$final_rate}}=='5'){
                                                    document.getElementById("star-1").style.color = "yellow";
                                                    document.getElementById("star-2").style.color = "yellow";
                                                    document.getElementById("star-3").style.color = "yellow";
                                                    document.getElementById("star-4").style.color = "yellow";
                                                    document.getElementById("star-5").style.color = "yellow";
                                                }

                                            </script>

                                           <b>Rating :{{$final_rate}}</b>
                                        </div>
                                    </div>
                                    @foreach($data1 as $value)
{{--                                  <div class="chat__chat-list overflow-y-auto  pr-1 pt-1 mt-4">--}}
                                    <div class="intro-x cursor-pointer box relative flex items-center p-5 " style="width:800px;margin-left:12%;">
                                        <div class="w-12 h-12 flex-none image-fit mr-1">
                                            @foreach($pic as $p)
                                            @if($value->from_id == $p->emp_id)
                                            <img  class="rounded-full" src="/{{$p->emp_pic}}">
                                                @break
                                            @endif
                                                @endforeach
                                        </div>
                                        @if (session('emp_id') == $value->to_id)
                                        <div class="ml-2 overflow-hidden">
                                            <div class="flex items-center">

                                                @php

                                                    $value2[] = ($value->to_id);
                                                @endphp
                                                <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#superlarge-modal-size-preview-{{$value->to_id}}" class="font-medium">{{$value->to_id}}</a>

                                            </div>


                                            <div class="text-slate-500 mt-1 flex " style="margin-left: 0px">
                                                <span class="iconify" data-icon="cil:star" data-width="20" data-height="20" data-flip="horizontal"></span>
                                                <span class="iconify" data-icon="cil:star" data-width="20" data-height="20" data-flip="horizontal"></span>
                                                <span class="iconify" data-icon="cil:star" data-width="20" data-height="20" data-flip="horizontal"></span>
                                                 <span class="iconify" data-icon="cil:star" data-width="20" data-height="20" data-flip="horizontal"></span>
                                                <span class="iconify" data-icon="cil:star" data-width="20" data-height="20" data-flip="horizontal"></span>
                                            </div>

                                            <div class="w-full truncate  mt-0.5 font-medium text-success ">{{$value->content}}</div>

                                        </div>
                                        @endif
{{--                                    </div>--}}

                                </div>

                                    @endforeach
                                </div>
                            </div>




                            @foreach($data2 as $item)

                            @if(in_array($item->emp_id,$value2))

                            <!-- BEGIN: Super Large Modal Content -->
                            <div id="superlarge-modal-size-preview-{{$item->emp_id}}" class="modal" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-xl">
                                    <div class="modal-content " >

                                        <div class="w-10 h-20 flex-none image-fit rounded-full overflow-hidden mx-auto">
                                            <img  src="dist/images/profile-12.jpg">
                                        </div>
                                        <div class="text-center mt-3 ">
                                            <div class="text-slate-500 mt-1 text-pending">{{session('usertype')}}</div>
                                            <div class="text-slate-500 mt-1">{{$item->emp_id}}</div>

                                            <div class="font-medium text-lg uppercase">{{$item->fname}}</div>
                                            <div class="text-slate-500 mt-1 flex " style="margin-left: 385px">
                                                <span class="iconify"  data-icon="cil:star" data-width="26" data-height="26" data-flip="horizontal"></span>
                                                <span class="iconify" data-icon="cil:star" data-width="26" data-height="26" data-flip="horizontal"></span>
                                                <span class="iconify" data-icon="cil:star" data-width="26" data-height="26" data-flip="horizontal"></span>
                                                <span class="iconify" data-icon="cil:star" data-width="26" data-height="26" data-flip="horizontal"></span>
                                                <span class="iconify" data-icon="cil:star" data-width="26" data-height="26" data-flip="horizontal"></span>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div> <!-- END: Super Large Modal Content -->
                            @endif
                            @endforeach


                            <div id="chats" class="tab-pane " role="tabpanel" aria-labelledby="chats-tab" style="width: 600px; margin-left:250px;">

                                    <div class="intro-x relative mr-6 mt-4 sm:mr-6">
                                     <div class="search hidden sm:block">
                                    <input id="search" type="text" class="search__input form-control text-dark" placeholder="Search..." style="width: 800px; height: 80px; margin-top: 100px; margin-left: 130px">
                                    <i data-lucide="search" class="search__icon dark:text-slate-500 text-white"></i>
                                      </div>
                                     <a class="notification sm:hidden" href=""> <i data-lucide="search" class="notification__icon dark:text-slate-500 text-white"></i> </a>

                                      </div>

                        <a class="notification sm:hidden" > <i data-lucide="search" class="notification__icon dark:text-slate-500"></i> </a>

{{--                                <div class="alldata">--}}
                                <div class="chat__chat-list overflow-y-auto  pr-1 pt-1 mt-4 alldata"  class="alldata">

                                    @foreach($data as $key=> $user )

                                    <div class="intro-x cursor-pointer box relative flex items-center p-5 zoom-in bg-primary-soft" a href="{{route('user.view')}}" style="width:800px;margin-left:12%;  border-radius: 35px; border-color:#990073; background-color:#8be98c; border-radius: 35px;   ">

                                        <div class="w-12 h-12 flex-none image-fit mr-1">
                                            <img  class="rounded-full" src="/{{$user->emp_pic}}">
                                            <div class="w-3 h-3 bg-success absolute right-0 bottom-0 rounded-full border-2 border-white dark:border-darkmode-600"></div>
                                        </div>
                                        <div class="ml-2 overflow-hidden">
                                            <div class="flex items-center">
                                               <a href="javascript:;" class="font-medium uppercase">{{$user->fname}}</a>

                                            </div>
                                            <form method="post" action="{{route('SendRaveComment')}}">
                                                @csrf
                                            <input type="hidden" value="{{$user->emp_id}}" name="too">
                                            <div name="toId" class="text-slate-500 mt-1 text-pending" >{{$user->emp_id}}</div>

                                            <div class="text-slate-500 mt-1 flex " style="margin-left: 0px">
                                                <span class="iconify" onclick="{{$user->emp_id}}onestar()" id="{{$user->emp_id}}onestar" data-icon="bxs:star" style="color: white;" data-width="25" data-height="25"></span>
                                                <span class="iconify" onclick="{{$user->emp_id}}twostar()" id="{{$user->emp_id}}2star" data-icon="bxs:star" style="color: white;" data-width="25" data-height="25"></span>
                                                <span class="iconify" onclick="{{$user->emp_id}}threestar()" id="{{$user->emp_id}}3star" data-icon="bxs:star" style="color: white;" data-width="25" data-height="25"></span>
                                                <span class="iconify" onclick="{{$user->emp_id}}fourstar()" id="{{$user->emp_id}}4star" data-icon="bxs:star" style="color: white;" data-width="25" data-height="25"></span>
                                                <span class="iconify" onclick="{{$user->emp_id}}fivestar()" id="{{$user->emp_id}}5star" data-icon="bxs:star" style="color: white;" data-width="25" data-height="25"></span>

                                                <script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script>
                                            </div>
                                                <script>

                                                    function {{$user->emp_id}}onestar(){
                                                        document.getElementById("{{$user->emp_id}}onestar").style.color = "yellow";
                                                        document.getElementById("{{$user->emp_id}}2star").style.color = "white";
                                                        document.getElementById("{{$user->emp_id}}3star").style.color = "white";
                                                        document.getElementById("{{$user->emp_id}}4star").style.color = "white";
                                                        document.getElementById("{{$user->emp_id}}5star").style.color = "white";

                                                        var data = {
                                                            'rate_to': '{{$user->emp_id}}',
                                                            'value': 1,
                                                            'emp_id':'{{session('emp_id')}}'
                                                        }

                                                        $.ajaxSetup({
                                                            headers: {
                                                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                                            }
                                                        });

                                                        $.ajax({
                                                            method: "POST",
                                                            url: "/storeRating/",
                                                            data: data,
                                                            type: "json",
                                                            success: function (response) {
                                                                    console.log(response);
                                                            }
                                                        });
                                                    }
                                                    function {{$user->emp_id}}twostar(){
                                                        document.getElementById("{{$user->emp_id}}onestar").style.color = "yellow";
                                                        document.getElementById("{{$user->emp_id}}2star").style.color = "yellow";
                                                        document.getElementById("{{$user->emp_id}}3star").style.color = "white";
                                                        document.getElementById("{{$user->emp_id}}4star").style.color = "white";
                                                        document.getElementById("{{$user->emp_id}}5star").style.color = "white";

                                                        var data = {
                                                            'rate_to': '{{$user->emp_id}}',
                                                            'value': 2,
                                                            'emp_id':'{{session('emp_id')}}'
                                                        }

                                                        $.ajaxSetup({
                                                            headers: {
                                                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                                            }
                                                        });

                                                        $.ajax({
                                                            method: "POST",
                                                            url: "/storeRating/",
                                                            data: data,
                                                            type: "json",
                                                            success: function (response) {
                                                                console.log(response);
                                                            }
                                                        });



                                                    }
                                                    function {{$user->emp_id}}threestar(){
                                                        document.getElementById("{{$user->emp_id}}onestar").style.color = "yellow";
                                                        document.getElementById("{{$user->emp_id}}2star").style.color = "yellow";
                                                        document.getElementById("{{$user->emp_id}}3star").style.color = "yellow";
                                                        document.getElementById("{{$user->emp_id}}4star").style.color = "white";
                                                        document.getElementById("{{$user->emp_id}}5star").style.color = "white";



                                                        var data = {
                                                            'rate_to': '{{$user->emp_id}}',
                                                            'value': 3,
                                                            'emp_id':'{{session('emp_id')}}'
                                                        }

                                                        $.ajaxSetup({
                                                            headers: {
                                                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                                            }
                                                        });

                                                        $.ajax({
                                                            method: "POST",
                                                            url: "/storeRating/",
                                                            data: data,
                                                            type: "json",
                                                            success: function (response) {
                                                                console.log(response);
                                                            }
                                                        });




                                                    }
                                                    function {{$user->emp_id}}fourstar(){
                                                        document.getElementById("{{$user->emp_id}}onestar").style.color = "yellow";
                                                        document.getElementById("{{$user->emp_id}}2star").style.color = "yellow";
                                                        document.getElementById("{{$user->emp_id}}3star").style.color = "yellow";
                                                        document.getElementById("{{$user->emp_id}}4star").style.color = "yellow";
                                                        document.getElementById("{{$user->emp_id}}5star").style.color = "white";

                                                        var data = {
                                                            'rate_to': '{{$user->emp_id}}',
                                                            'value': 4,
                                                            'emp_id':'{{session('emp_id')}}'
                                                        }

                                                        $.ajaxSetup({
                                                            headers: {
                                                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                                            }
                                                        });

                                                        $.ajax({
                                                            method: "POST",
                                                            url: "/storeRating/",
                                                            data: data,
                                                            type: "json",
                                                            success: function (response) {
                                                                console.log(response);
                                                            }
                                                        });
                                                    }
                                                    function {{$user->emp_id}}fivestar(){
                                                        document.getElementById("{{$user->emp_id}}onestar").style.color = "yellow";
                                                        document.getElementById("{{$user->emp_id}}2star").style.color = "yellow";
                                                        document.getElementById("{{$user->emp_id}}3star").style.color = "yellow";
                                                        document.getElementById("{{$user->emp_id}}4star").style.color = "yellow";
                                                        document.getElementById("{{$user->emp_id}}5star").style.color = "yellow";


                                                        var data = {
                                                            'rate_to': '{{$user->emp_id}}',
                                                            'value': 5,
                                                            'emp_id':'{{session('emp_id')}}'
                                                        }

                                                        $.ajaxSetup({
                                                            headers: {
                                                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                                            }
                                                        });

                                                        $.ajax({
                                                            method: "POST",
                                                            url: "/storeRating/",
                                                            data: data,
                                                            type: "json",
                                                            success: function (response) {
                                                                console.log(response);
                                                            }
                                                        });


                                                    }
                                                </script>
                                            <div class="intro-x relative mr-6 mt-4 sm:mr-6">
                                                <div class="search hidden sm:block">

                                                        <input name="emp_id" type="hidden" value="{{session('emp_id')}}">
                                                    <input name="comment" type="text" class="search__input form-control border-white text-black" placeholder="Send Comments">
                                                    <button type="submit" class="btn btn-primary mr-1  mt-2 text-white">Send <i data-lucide="send" class="w-5 h-5 ml-1"></i> </button>
                                                    </form>



                                                </div>
                                                <a class="notification sm:hidden" href=""> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="search" data-lucide="search" class="lucide lucide-search notification__icon dark:text-slate-500"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg> </a>

                                            </div>



                                        </div>


                                    </div>

                                        <br>
                                    @endforeach
                                </div>
                            </div>


                        </div>
                    </div>
{{--                </div>--}}

            <div class="chat__chat-list overflow-y-auto  pr-1 pt-1 mt-4 searchdata" id="Content" >

            </div>
                    <!-- END: Chat Side Menu -->

                </div>


              <!-- END: Content -->

<script type="text/javascript">
    $('#search').on('keyup',function(){

        $value = $(this).val();

        if($value){
            $('.alldata').hide();
            $('.searchdata').show();
        }
        else{
            $('.alldata').show();
            $('.searchdata').hide();
        }

        $.ajax({

            type: 'get',
            url: '{{ route('Ravesearch') }}' ,
            data: {'search':$value},

            success: function(data){

                console.log(data);
                $('#Content').html(data);
            }


        });

    })



</script>





        <!-- BEGIN: JS Assets-->
        <script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script>
        <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
        <!-- <script src="https://maps.googleapis.com/maps/api/js?key=["your-google-map-api"]&libraries=places"></script> -->
        <script src=" http://127.0.0.1:8000/dist/js/app.js "></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/datepick/5.1.1/js/jquery.plugin.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>



        <!-- END: JS Assets-->

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>

</script>



</div></div></div></div>



             <!-- END: Content -->



            @endsection
