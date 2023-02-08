
@extends('user.user_master')
@section('user')



    <div class="content">
        <!-- BEGIN: Top Bar -->
        <div class="top-bar">
            <!-- BEGIN: Breadcrumb -->
            <nav aria-label="breadcrumb" class="-intro-x mr-auto hidden sm:flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('user.view')}}">Attendance</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Add Attendance</li>
                </ol>
            </nav>
            <!-- END: Breadcrumb -->
            <!-- BEGIN: Search -->
            <!-- END: Search -->
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
                            <div class="font-medium">{{session('usernamee')}} </div>
                            <div class="text-xs text-white/70 mt-0.5 dark:text-slate-500"></div>
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
                Review Employee
            </h2>

        </div>


        <!-- BEGIN: Content -->

        <div class="intro-y chat grid grid-cols-6  mt-5">
            <!-- BEGIN: Chat Side Menu -->

            <div class="tab-content" style="width:70% marg">


                <form method="post" action="{{route('attendance.store')}}">
                    @csrf

                    <label class="text-secondary mr-2 ml-3 font-medium">Select Date</label>
                    <input type="date" name="date" class="form-control w-60" >





                    <a class="notification sm:hidden" href=""> </a>
                    <div class="chat__chat-list overflow-y-auto scrollbar-hidden pr-1 pt-1 mt-4">
                        <div class="intro-x cursor-pointer box relative flex items-center p-5 " style="width:800px;margin-left:12%;">



                            <div class="ml-2 overflow-hidden">
                                <div class="flex items-center">


                                    <a href="javascript:;" class="font-medium text-secondary">Employee ID:
                                        <input type="text"   class="rounded-full border-primary" value="{{session('emp_id')}}" disabled>
                                        <input type="hidden"  name="emp_id" class="rounded-full border-primary" value="{{session('emp_id')}}" >

                                    </a>

                                    <a href="javascript:;" class="font-medium text-secondary ml-3">Name:
                                        <input type="text"   class="rounded-full border-primary" value="{{session('usernamee')}}" disabled>
                                        <input type="hidden"  name="name" class="rounded-full border-primary" value="{{session('usernamee')}}" >

                                    </a>


                                </div>


                                <div class="flex flex-col sm:flex-row mt-2 ml-6">
                                    <div class="form-check mr-2">
                                        <input name="status"  class="form-check-input " type="radio" value="Present" checked="checked" required>
                                        <label class="form-check-label text-success" >Present</label>
                                    </div>

                                    <div class="form-check mr-2 mt-2 sm:mt-0">
                                        <input name="status"  class="form-check-input" type="radio" value="Leave"  required>
                                        <label class="form-check-label text-pending" >Leave</label>
                                    </div>

                                    <div class="form-check mr-2 mt-2 sm:mt-0">
                                        <input name="status"  class="form-check-input" type="radio" value="Absent">
                                        <label class="form-check-label text-danger" >Absent</label>
                                    </div>



                                </div>
                                <button type="submit" class="btn btn-rounded btn-dark-soft w-24 mr-1 mb-2 mt-6">Submit</button>
                            </div>
                            <div class="flex items-center justify-center absolute top-0 right-0 text-xs rounded-full text-primary mt-4  mr-2">
                                Arrival Time:
                                <input type="time" name="arrival_time" class="form-control border-black" required>

                            </div>

                            <div class="flex items-center justify-center absolute top-6 right-0 text-xs rounded-full text-pending mt-4 mr-2">
                                Leave Time:
                                <input type="time" name="leave_time" class="form-control border-black" required>
                            </div>



                        </div>


                    </div>
            </div>




        </div>
    </div>

    <!-- END: Chat Side Menu -->

    </div>


    <!-- END: Content -->












    </div></div></div></div>





@endsection
