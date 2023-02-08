
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

                            <!-- BEGIN: Search -->
                    <!-- END: Search -->
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
                      Add User Form
                      </h2>
                  </div>

            <!-- BEGIN : Form Data -->


                 <form method="POST" action="{{ route('users.store')}}" >
                 @csrf

                <div class="grid grid-cols-12 gap-6 mt-5 ">
                    <div class="intro-y col-span-12 lg:col-span-6 zoom-in border border-primary text-black" style="margin-left: 100px; ">
                        <!-- BEGIN: Form Layout -->
                        <div class="intro-y box p-5 zoom-in ">
                            <div>
                                <div class="input-form">
                                <label for="validation-form-1" class="form-label w-full flex flex-col sm:flex-row"> Employee ID
                                <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">Required, Employee ID</span>
                                </label>
                                <input name="emp_id" id="emp_id"  type="text" name="name" class="form-control" placeholder="NA001" minlength="2" required> </div>




                                    {{-- @if(count($allEmp))
                                         @foreach ( $allEmp as $key=> $user)

                                         @if( $user->emp_id == $allUser->emp_id)
                                            <option value="{{$allUser->emp_id}}" disabled="">{{$allUser->emp_id}}</option>
                                        @else
                                         <option value="{{$user->emp_id}}">{{$user->emp_id}}</option>

                                        @endif

                                        @endforeach

                                   @endif --}}
                                 </select>
                            </div>
                            <div class="mt-3">

                            <label for="crud-form-2-tomselected" class="form-label" id="crud-form-2-ts-label">User Name</label>
                                <input id="username" name="username" fill="" type="text" class="form-control w-full" placeholder="Eg:- Kasun">
                            </div>

                            <div class="mt-3">
                                <label for="crud-form-3" class="form-label">Password</label>
                                 <input id="password" name="password" type="text" class="form-control w-full  " placeholder="8 characters">
                            </div>
                            <div class="mt-3">
                                <label for="crud-form-3" class="form-label">Confirm Password</label>
                                <input id="password" name="cpassword" type="text" class="form-control w-full  " placeholder="8 characters">
                            </div>
                            <div class="mt-3">
                                <label for="crud-form-4" class="form-label">User Type</label>
                                <select id="tabulator-html-filter-field" name="access" class="form-select " style="width: 100px;">
                                    @foreach($usertypesfresh as $ut)
                                        <option value="{{$ut->usertype}}">{{$ut->usertype}}</option>
                                    @endforeach
                                </select>

                            <div class="mt-3">
                                <label>Active/Inactive Status</label>
                                <div class="form-switch mt-2 ">
                                    <input id="status" name="status" type="checkbox" class="form-check-input  " value="Active" checked>
                                </div>
                            </div>

                            <div class="mt-3">
                               <label for="crud-form-4" class="form-label">Place</label>
                                <select id="tabulator-html-filter-field" name="place" class="form-select " style="width: 100px;">
                                    <option value="Disable" disabled>Select</option>
                                    @foreach($department as $ut)
                                        <option value="{{$ut->department_name}}">{{$ut->department_name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="text-right mt-5">
                                 <button class="btn btn-primary-soft mr-1 mb-2"> Cancel  </button>
                                <button class="btn btn-primary mr-1 mb-2"> Add User  </button>
                            </div>
                        </div>
                        <!-- END: Form Layout -->
                    </div>
                </div>
            </form>


             <!-- END: Form Data -->




            @endsection
