
@extends('admin.admin_master')
@section('admin')



    <div class="content">


        <!-- BEGIN: Top Bar -->
        <div class="top-bar">
            <!-- BEGIN: Breadcrumb -->
            <nav aria-label="breadcrumb" class="-intro-x mr-auto hidden sm:flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('Requestmodule')}}">Request</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Transport</li>
                </ol>
            </nav>
            <!-- END: Breadcrumb -->
            <!-- BEGIN: Search -->
            <div class="intro-x relative mr-3 sm:mr-6">
                <div class="search hidden sm:block">
                    <input type="text" class="search__input form-control border-transparent" placeholder="Search...">
                    <i data-lucide="search" class="search__icon dark:text-slate-500"></i>
                </div>
                <a class="notification sm:hidden" href=""> <i data-lucide="search" class="notification__icon dark:text-slate-500"></i> </a>
                <div class="search-result">
                </div>
            </div>
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
                    <img alt="" src="/{{session('propic')}} ">
                </div>
                <div class="dropdown-menu w-56">
                    <ul class="dropdown-content bg-primary text-white">
                        <li class="p-2">
                            <div class="font-medium">{{session('emp_id')}}</div>
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
                            <a href="{{ route('admin.logout')}}" class="dropdown-item hover:bg-white/5"> <i data-lucide="toggle-right" class="w-4 h-4 mr-2"></i> Logout </a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- END: Account Menu -->
        </div>
        <!-- END: Top Bar -->
        <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
            <h2 class="text-lg font-medium mr-auto">
                Chat
            </h2>
            <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
                <button class="btn btn-primary shadow-md mr-2">Start New Chat</button>
                <div class="dropdown ml-auto sm:ml-0">
                    <button class="dropdown-toggle btn px-2 box text-slate-500" aria-expanded="false" data-tw-toggle="dropdown">
                        <span class="w-5 h-5 flex items-center justify-center"> <i class="w-4 h-4" data-lucide="plus"></i> </span>
                    </button>
                    <div class="dropdown-menu w-40">
                        <ul class="dropdown-content">
                            <li>
                                <a href="" class="dropdown-item"> <i data-lucide="users" class="w-4 h-4 mr-2"></i> Create Group </a>
                            </li>
                            <li>
                                <a href="" class="dropdown-item"> <i data-lucide="settings" class="w-4 h-4 mr-2"></i> Settings </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="intro-y chat grid grid-cols-12 gap-5 mt-5">
            <!-- BEGIN: Chat Side Menu -->
            <div class="col-span-12 lg:col-span-4 2xl:col-span-3">
                <div class="intro-y pr-1">
                    <div class="box p-2">
                        <ul class="nav nav-pills" role="tablist">
                            <li id="chats-tab" class="nav-item flex-1" role="presentation">
                                <button class="nav-link w-full py-2 active" data-tw-toggle="pill" data-tw-target="#chats" type="button" role="tab" aria-controls="chats" aria-selected="true" > Chats </button>
                            </li>
                            <li id="profile-tab" class="nav-item flex-1" role="presentation">
                                <button class="nav-link w-full py-2" data-tw-toggle="pill" data-tw-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false" > Info </button>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="tab-content">
                    <div id="chats" class="tab-pane active" role="tabpanel" aria-labelledby="chats-tab">
                        <div class="pr-1">
                        </div>
                        <div class="chat__chat-list overflow-y-auto scrollbar-hidden pr-1 pt-1 mt-4">
                            <div class="intro-x cursor-pointer box relative flex items-center p-5 ">
                                <div class="w-12 h-12 flex-none image-fit mr-1">
                                    <img alt="" class="rounded-full" src="/{{$pic}}">
                                    <div class="w-3 h-3 bg-success absolute right-0 bottom-0 rounded-full border-2 border-white dark:border-darkmode-600"></div>
                                </div>
                                <div class="ml-2 overflow-hidden">
                                    <div class="flex items-center">
                                        <a href="javascript:;" class="font-medium">{{$emp_id}} </a>
                                        <div class="text-xs text-slate-400 ml-auto">01:10 PM</div>
                                    </div>
                                    <div class="w-full truncate text-slate-500 mt-0.5"> {{$desc}}</div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div id="profile" class="tab-pane" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="pr-1">
                            <div class="box px-5 py-10 mt-5">
                                <div class="w-20 h-20 flex-none image-fit rounded-full overflow-hidden mx-auto">
                                    <img alt="Midone - HTML Admin Template" src="/{{$pic}}">
                                </div>
                                <div class="text-center mt-3">
                                    <div class="font-medium text-lg">{{$emp_id}} </div>
                                    <div class="text-slate-500 mt-1"></div>
                                </div>
                            </div>
                            <div class="box p-5 mt-5">
                                <div class="flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5">
                                    <div>
                                        <div class="text-slate-500">Request ID</div>
                                        <div class="mt-1">{{$id}}</div>
                                    </div>
                                    <i data-lucide="globe" class="w-4 h-4 text-slate-500 ml-auto"></i>
                                </div>
                                <div class="flex items-center border-b border-slate-200/60 dark:border-darkmode-400 py-5">
                                    <div>
                                        <div class="text-slate-500">Request Van</div>
                                        <div class="mt-1">{{$name}}</div>
                                    </div>
                                    <i data-lucide="mic" class="w-4 h-4 text-slate-500 ml-auto"></i>
                                </div>
                                <div class="flex items-center border-b border-slate-200/60 dark:border-darkmode-400 py-5">
                                    <div>
                                        <div class="text-slate-500">Description</div>
                                        <div class="mt-1">{{$desc}}</div>
                                    </div>
                                    <i data-lucide="mail" class="w-4 h-4 text-slate-500 ml-auto"></i>
                                </div>
                                <div class="flex items-center pt-5">
                                    <div>
                                        <div class="text-slate-500">Priority</div>
                                        <div class="mt-1">{{$priority}}</div>
                                    </div>
                                    <i data-lucide="clock" class="w-4 h-4 text-slate-500 ml-auto"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END: Chat Side Menu -->
            <!-- BEGIN: Chat Content -->
            <div class="intro-y col-span-12 lg:col-span-8 2xl:col-span-9">
                <div class="chat__box box">
                    <!-- BEGIN: Chat Active -->
                    <div class="hidden h-full flex flex-col">
                        <div class="flex flex-col sm:flex-row border-b border-slate-200/60 dark:border-darkmode-400 px-5 py-4">
                            <div class="flex items-center">
                                <div class="w-10 h-10 sm:w-12 sm:h-12 flex-none image-fit relative">
                                    <img alt="" class="rounded-full" src="/{{$pic}} ">
                                </div>
                                <div class="ml-3 mr-auto">
                                    <div class="font-medium text-base">{{$emp_id}}</div>
                                    <div class="text-slate-500 text-xs sm:text-sm"><span class="mx-1">•</span> Online</div>
                                </div>
                            </div>
                            <div class="flex items-center sm:ml-auto mt-5 sm:mt-0 border-t sm:border-0 border-slate-200/60 pt-3 sm:pt-0 -mx-5 sm:mx-0 px-5 sm:px-0">
                                <a href="javascript:;" class="w-5 h-5 text-slate-500"> <i data-lucide="search" class="w-5 h-5"></i> </a>
                                <a href="javascript:;" class="w-5 h-5 text-slate-500 ml-5"> <i data-lucide="user-plus" class="w-5 h-5"></i> </a>
                                <div class="dropdown ml-auto sm:ml-3">
                                    <a href="javascript:;" class="dropdown-toggle w-5 h-5 text-slate-500" aria-expanded="false" data-tw-toggle="dropdown"> <i data-lucide="more-vertical" class="w-5 h-5"></i> </a>
                                    <div class="dropdown-menu w-40">
                                        <ul class="dropdown-content">
                                            <li>
                                                <a href="" class="dropdown-item"> <i data-lucide="share-2" class="w-4 h-4 mr-2"></i> Share Contact </a>
                                            </li>
                                            <li>
                                                <a href="" class="dropdown-item"> <i data-lucide="settings" class="w-4 h-4 mr-2"></i> Settings </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="overflow-y-scroll scrollbar-hidden px-5 pt-5 flex-1">
                            <div class="chat__box__text-box flex items-end float-left mb-4">
                                <div class="w-10 h-10 hidden sm:block flex-none image-fit relative mr-5">
                                    <img alt="" class="rounded-full" src="/{{$pic}}">
                                </div>
                                @foreach($chatadmin as $c)
                                <div class="bg-slate-100 dark:bg-darkmode-400 px-4 py-3 text-slate-500 rounded-r-md rounded-t-md">
                                   {{$c->msg}}
                                    <div class="mt-1 text-xs text-slate-500">2 mins ago</div>
                                </div>
                                @endforeach
                            </div>

                            <div class="clear-both"></div>
                            <div class="chat__box__text-box flex items-end float-right mb-4">
                                <div class="bg-primary px-4 py-3 text-white rounded-l-md rounded-t-md">
                                    No I cant
                                    <div class="mt-1 text-xs text-white text-opacity-80">1 mins ago</div>
                                </div>
                                <div class="w-10 h-10 hidden sm:block flex-none image-fit relative ml-5">
                                    <img alt="" class="rounded-full" src="/{{session('propic')}}">
                                </div>
                            </div>


                        </div>
                        <div class="pt-4 pb-10 sm:py-4 flex items-center border-t border-slate-200/60 dark:border-darkmode-400">
                            <form method="post" action="{{route('requestChat')}}">
                                @csrf
                            <textarea name="msg" class="chat__box__input form-control dark:bg-darkmode-600 h-16 resize-none border-transparent px-5 py-3 shadow-none focus:border-transparent focus:ring-0" rows="1" placeholder="Type your message..."></textarea>
{{--                            <a href="javascript:;" class="w-8 h-8 sm:w-10 sm:h-10 block bg-primary text-white rounded-full flex-none flex items-center justify-center mr-5"> <i data-lucide="send" class="w-4 h-4"></i> </a>--}}
                                <input type="hidden" name="emp_id" value="{{session('emp_id')}}">
                                <input type="hidden" name="selector" value="admin">
                                <input type="hidden" name="request_id" value="{{$id}}">
                                <input type="submit" class="" value="send" >

                        </div>
                        </form>
                    </div>
                    <!-- END: Chat Active -->
                    <!-- BEGIN: Chat Default -->
                    <div class="h-full flex items-center">
                        <div class="mx-auto text-center">
                            <div class="w-16 h-16 flex-none image-fit rounded-full overflow-hidden mx-auto">
                                <img alt="" src="/{{$pic}}">
                            </div>
                            <div class="mt-3">
                                <div class="font-medium">Hey, {{$emp_id}}!</div>
                                <div class="text-slate-500 mt-1">Please select a chat to start messaging.</div>
                            </div>
                        </div>
                    </div>
                    <!-- END: Chat Default -->
                </div>
            </div>
            <!-- END: Chat Content -->
        </div>
    </div>
        <!-- BEGIN: HTML Table Data -->


        <!-- END: HTML Table Data -->
    </div>


@endsection
