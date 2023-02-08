
@extends('admin.admin_master')
@section('admin')


    <script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script>
    <div class="content">
        <!-- BEGIN: Top Bar -->
        <div class="top-bar">
            <!-- BEGIN: Breadcrumb -->
            <nav aria-label="breadcrumb" class="-intro-x mr-auto hidden sm:flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Application</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Leave</li>
                </ol>
            </nav>
            <!-- END: Breadcrumb -->
            <!-- BEGIN: Search -->
            <div class="intro-x relative mr-3 sm:mr-6">
                <a class="notification sm:hidden" href=""> <i data-lucide="search" class="notification__icon dark:text-slate-500"></i> </a>
                <div class="search-result">
                </div>
            </div>
            <!-- END: Search -->
            <!-- BEGIN: Notifications -->
            <div class="intro-x dropdown mr-auto sm:mr-6">
                <div class="dropdown-toggle notification notification--bullet cursor-pointer" role="button" aria-expanded="false" data-tw-toggle="dropdown"> <i data-lucide="bell" class="notification__icon dark:text-slate-500"></i> </div>
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
        <div class="grid grid-cols-12 gap-6">
            <div class="col-span-12 2xl:col-span-9">
                <div class="grid grid-cols-12 gap-6">
                    <!-- BEGIN: General Report -->
                    <div class="col-span-12 mt-2">
                        <div class="intro-y flex items-center h-10">
                            <h2 class="text-lg font-medium truncate mr-5">
                                Leaves
                            </h2>
                            <a href="UserLeavemodule" class="ml-auto flex items-center text-primary"> <i data-lucide="refresh-ccw" class="w-4 h-4 mr-3"></i> Reload Data </a>
                        </div>

                        <div class="grid grid-cols-12 gap-6 mt-2">
                            <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y" >
                                <div class="report-box zoom-in" >
                                    <a href="{{route('adminusershortleave')}}">
                                        <div class="box p-5" >
                                            <div class="flex" >
                                                <span class="iconify" data-icon="ant-design:fall-outlined"></span>                                            <div class="ml-auto">
                                                    <div class="report-box__indicator bg-success tooltip cursor-pointer" title="33% Higher than last month"> 33% <i data-lucide="fall-outlined" class="w-4 h-4 ml-0.5"></i> </div>
                                                </div>
                                            </div>
                                            <div class="text-3xl font-medium leading-8 mt-6">10</div>
                                            <div class="text-base text-slate-500 mt-1" >Transport</div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                                <div class="report-box zoom-in">
                                    <a href="{{route('admincasualleave')}}">
                                        <div class="box p-5">
                                            <div class="flex">
                                                <span class="iconify" data-icon="bx:book-alt"></span>                                            <div class="ml-auto">
                                                    <div class="report-box__indicator bg-danger tooltip cursor-pointer" title="2% Lower than last month"> 2% <i data-lucide="chevron-down" class="w-4 h-4 ml-0.5"></i> </div>
                                                </div>
                                            </div>
                                            <div class="text-3xl font-medium leading-8 mt-6">25</div>
                                            <div class="text-base text-slate-500 mt-1">Furniture</div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                                <div class="report-box zoom-in">
                                    <a href="{{route('adminhalfdayleave')}}">
                                        <div class="box p-5">
                                            <div class="flex">
                                                <span class="iconify" data-icon="bi:circle-half"></span>                                            <div class="ml-auto">
                                                    <div class="report-box__indicator bg-success tooltip cursor-pointer" title="12% Higher than last month"> 12% <i data-lucide="chevron-up" class="w-4 h-4 ml-0.5"></i> </div>
                                                </div>
                                            </div>
                                            <div class="text-3xl font-medium leading-8 mt-6">10</div>
                                            <div class="text-base text-slate-500 mt-1">Meeting</div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                                <div class="report-box zoom-in">
                                    <a href="{{route('adminmedicalleave')}}">
                                        <div class="box p-5">
                                            <div class="flex">
                                                <span class="iconify" data-icon="fa-solid:briefcase-medical"></span>                                            <div class="ml-auto">
                                                    <div class="report-box__indicator bg-success tooltip cursor-pointer" title="22% Higher than last month"> 22% <i data-lucide="chevron-up" class="w-4 h-4 ml-0.5"></i> </div>
                                                </div>
                                            </div>
                                            <div class="text-3xl font-medium leading-8 mt-6">12</div>
                                            <div class="text-base text-slate-500 mt-1">Medicine </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                                <div class="report-box zoom-in">

                                    <div class="box p-5">
                                        <div class="flex">
                                            <span class="iconify" data-icon="carbon:flight-international"></span>                                            <div class="ml-auto">
                                                <div class="report-box__indicator bg-success tooltip cursor-pointer" title="22% Higher than last month"> 22% <i data-lucide="chevron-up" class="w-4 h-4 ml-0.5"></i> </div>
                                            </div>
                                        </div>
                                        <div class="text-3xl font-medium leading-8 mt-6">0</div>
                                        <div class="text-base text-slate-500 mt-1">Promotion</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                                <div class="report-box zoom-in">

                                    <div class="box p-5">
                                        <div class="flex">
                                            <span class="iconify" data-icon="carbon:flight-international"></span>                                            <div class="ml-auto">
                                                <div class="report-box__indicator bg-success tooltip cursor-pointer" title="22% Higher than last month"> 22% <i data-lucide="chevron-up" class="w-4 h-4 ml-0.5"></i> </div>
                                            </div>
                                        </div>
                                        <div class="text-3xl font-medium leading-8 mt-6">0</div>
                                        <div class="text-base text-slate-500 mt-1">Increments</div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- END: General Report -->
                    <!-- BEGIN: Sales Report -->
                    <!-- END: Sales Report -->

                    <!-- BEGIN: Sales Report 2 -->
                    <!-- END: Sales Report -->




                    <!-- BEGIN: General Report -->
                    <!-- END: General Report -->

                </div>
            </div>
            <div class="col-span-12 2xl:col-span-3">
                <div class="2xl:border-l -mb-10 pb-10">
                    <div class="2xl:pl-6 grid grid-cols-12 gap-x-6 2xl:gap-x-0 gap-y-6">
                        <!-- BEGIN: Important Notes -->
                        <div class="col-span-12 md:col-span-6 xl:col-span-12 xl:col-start-1 xl:row-start-1 2xl:col-start-auto 2xl:row-start-auto mt-3">
                            <div class="intro-x flex items-center h-10">
                                <h2 class="text-lg font-medium truncate mr-auto">
                                    Important Notices
                                </h2>
                                <button data-carousel="important-notes" data-target="prev" class="tiny-slider-navigator btn px-2 border-slate-300 text-slate-600 dark:text-slate-300 mr-2"> <i data-lucide="chevron-left" class="w-4 h-4"></i> </button>
                                <button data-carousel="important-notes" data-target="next" class="tiny-slider-navigator btn px-2 border-slate-300 text-slate-600 dark:text-slate-300 mr-2"> <i data-lucide="chevron-right" class="w-4 h-4"></i> </button>
                            </div>
                            <div class="mt-5 intro-x">
                                <div class="box zoom-in">
                                    <div class="tiny-slider" id="important-notes">
                                        @foreach($notice as $n)
                                            <div class="p-5">
                                                <div class="text-base font-medium truncate">{{$n->usertype}}</div>
                                                <div class="text-slate-400 mt-1">
                                                    {{ \Carbon\Carbon::parse($n->created_at)->diffForHumans() }}</i>
                                                </div>
                                                <div class="text-slate-500 text-justify mt-1">
                                                    {{$n->text}}
                                                </div>
                                                <div class="font-medium flex mt-5">

                                                    <a href="{{ url('readNOTICEs/'.$n->file)}}" target="blank">
                                                        <button  type="button" class="btn btn-secondary py-1 px-2">View</button></a>
                                                    <button type="button" class="btn btn-outline-secondary py-1 px-2 ml-auto ml-auto">Dismiss</button>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END: Important Notes -->

                        <!-- BEGIN: Schedules -->
                        <!-- END: Schedules -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
