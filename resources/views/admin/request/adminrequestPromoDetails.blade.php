
@extends('admin.admin_master')
@section('admin')



    <div class="content">


        <!-- BEGIN: Top Bar -->
        <div class="top-bar">
            <!-- BEGIN: Breadcrumb -->
            <nav aria-label="breadcrumb" class="-intro-x mr-auto hidden sm:flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('Requestmodule')}}">Request</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Promotion</li>
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
                Promotion Requests
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

                    <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
                        <div class="dropdown ml-auto sm:ml-0">

                            <div class="dropdown-menu w-40">
                                <ul class="dropdown-content">
                                    <li>
                                        <a href="" class="dropdown-item"> <i data-lucide="share-2" class="w-4 h-4 mr-2"></i> </a>
                                    </li>
                                    <li>
                                        <a href="" class="dropdown-item"> <i data-lucide="download" class="w-4 h-4 mr-2"></i>  </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
        </div>
        <div class="mt-6 lg:mt-0 flex-1 px-5 border-l border-r border-slate-200/60 dark:border-darkmode-400 border-t lg:border-t-0 pt-5 lg:pt-0">

            <div class="intro-y grid grid-cols-12 gap-6 mt-5">

                <ul class="nav nav-link-tabs flex-col sm:flex-row justify-center lg:justify-start text-center" role="tablist" >



                </ul>
            </div>


        </div>
        <div id="gallery" class="intro-y col-span-8 md:col-span-3 box ">


            <div class="intro-y box mt-3 " >
                @foreach($data as $req)
                <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400 ">
                    <h2>
                        Employee ID: {{$req->emp_id}}
                    </h2>

                </div>
                <div id="horizontal-form" class="p-3">
                    <div class="preview">



                        <form method="POST" action="">
                            @csrf


                            <table>
                                <tr>
                                    <td>
                                        <label for="fname" class="form-label sm:w-200">Fullname with Surname
                                        </label>
                                    </td>
                                    <td>
                                        <input disabled value="{{$req->name}}" required type="text" id="fname" name="name" value="" class="form-control" style="width: 200%"> </label><br><br>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label for="pp" class="form-label sm:w-20">Mobile</label>
                                    </td>
                                    <td>
                                        <input required disabled value = "{{$req->mobile}}" type="text" id="pp" name="mobile" value="" class="form-control"><br><br>
                                    </td>
                                </tr>
                                <tr>
                                    <div id="wrapper">
                                        <td>
                                            <label for="yes_no_radio" class="form-label sm:w-200">Is the post confirmed?</label>
                                        </td>
                                        <td>
                                            <input type="text"  disabled value="{{$req->post_confirm}}" name="post_confirm" checked></input>

                                        </td>


                                    </div><br>
                                </tr>
                                <tr>
                                    <td>
                                        <label for="pp" class="form-label sm:w-200" class="form-control">Current position</label>
                                    </td>
                                    <td>
                                        <input disabled value="{{$req->current_position}}" required type="text" id="pp" name="current_position" value="" class="form-control"><br><br>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label for="pp" class="form-label sm:w-200">Current position Grade:</label>
                                    </td>
                                    <td>
                                        <input disabled value="{{$req->current_position_grade}}" type="text" id="pp" name="current_position_grade" value="" class="form-control"><br><br>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label for="pp" class="form-label sm:w-200">Date of joining present post:
                                    <td>
                                        <input disabled value="{{$req->post_confirm}}" required type="date" id="pp" name="date_of_join_present_post" value="" class="form-control"><br><br>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label for="pp" class="form-label sm:w-200">Position  of Promotion Expected</label>
                                    </td>
                                    <td>
                                        <input disabled value = "{{$req->expect_post}}"required type="text" id="pp" name="expect_post" value="" class="form-control">

                                    </td>
                                </tr>
                                <tr>
                                    <div id="wrapper">
                                        <td>
                                            <label for="yes_no_radio" class="form-label sm:w-200">Already have Leaves to Studies or Abroad?</label>
                                        </td>
                                        <td>
                                            <input disabled value="{{$req->done_study_or_abroad}}" type="text" name="done_study_or_abroad" checked >Yes</input>

                                        </td>
                                    </div>
                                </tr>
                                <tr>
                                    <td>
                                        <label for="pp" class="form-label sm:w-200">Leave Start Date</label>
                                    </td>
                                    <td>
                                        <input disabled type="date" id="pp" name="leave_start_date" value="{{$req->leave_start_date}}" class="form-control">

                                    </td>
                                    <td >
                                        <label style="margin-left: 100px;" for="pp" class="form-label sm:w-200">Leave End Date</label>
                                    </td>
                                    <td>
                                        <input  disabled type="date" id="pp" name="leave_end_date" value="{{$req->leave_end_date}}" class="form-control">

                                    </td>
                                </tr>
                                <tr><td>
                                        <div class="form-inline mt-5">
                                            <label for="horizontal-form-2" class="form-label sm:w-200"> Grade of Promotion Expected</label>
                                    </td><td>
                                        <div class="form-inline mt-5" style="width: 90px">
                                            <input  disabled type="text" id="pp" name="leave_end_date" value="{{$req->grade_of_expect_post}}" class="form-control">
                                        </div>
                                    <td>
                    </div>
                    </tr>
                    <tr><td>
                            <div class="form-inline mt-5">

                                <label for="horizontal-form-1" class="form-label sm:w-200">Other Details</label>
                        </td>
                        <td>
                            <div class="form-inline mt-5" style="width: 300%">
                                <textarea  disabled placeholder = "{{$req->other}}" name="other" class="form-control" id="exampleFormControlTextarea1" rows="4" required></textarea>
                            </div>
                        </td></tr>
                </div>
                </table>
                @endforeach
                    <table class="table table-report sm:mt-2 ">
                        <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                            <h2 class="font-medium text-base mr-auto">
                                Current Position Grades
                            </h2>

                        </div>
                        <thead>
                        <tr>
                            <th class="whitespace-nowrap">Position</th>
                            <th class="whitespace-nowrap">Grade</th>
                            <th class="whitespace-nowrap">From</th>
                            <th class="text-center whitespace-nowrap">To</th>
                            <th class="text-center whitespace-nowrap"></th>
                            <th class="text-center whitespace-nowrap"></th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($grade as $req )
                            <tr class="intro-x">
                                <td class="w-40">
                                    <div class="flex">
                                        <div class="w-10 h-10 image-fit zoom-in">
                                            {{$req->position}}
                                        </div>

                                    </div>
                                </td>
                                <td>
                                    <div class="w-10 h-10 image-fit zoom-in">
                                        {{$req->grade}}
                                    </div>
                                </td>
                                <td>
                                    <form method="post" action="">
                                        @csrf
                                        <a id="desc{{$req->from}}" href="" class="font-medium whitespace-nowrap">{{$req->from}}</a>
                                        <input type="text" name="description" class="form-control-rounded hidden" placeholder="{{$req->from}}" id="txtpass{{$req->request_id}}" required>
                                        <input type="hidden" value="{{$req->request_id}}" name="id">
                                        <input type="submit" class="hidden">
                                    </form>
                                </td>
                                <td class="text-center">{{$req->to}}</td>
                                <td>
                                    <div class="flex justify-center items-center">
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <table class="table table-report sm:mt-2 ">
                        <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                            <h2 class="font-medium text-base mr-auto">
                                University Service Details
                            </h2>

                        </div>
                        <thead>
                        <tr>
                            <th class="whitespace-nowrap">University</th>
                            <th class="whitespace-nowrap">Position</th>
                            <th class="whitespace-nowrap">From</th>
                            <th class="text-center whitespace-nowrap">To</th>
                            <th class="text-center whitespace-nowrap"></th>
                            <th class="text-center whitespace-nowrap"></th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($uni as $req )
                            <tr class="intro-x">
                                <td class="w-40">
                                    <div class="flex">
                                        <div class="w-10 h-10 image-fit zoom-in">
                                            {{$req->university}}
                                        </div>

                                    </div>
                                </td>
                                <td>
                                    <div class="w-10 h-10 image-fit zoom-in">
                                        {{$req->position}}
                                    </div>
                                </td>
                                <td>
                                    <form method="post" action="">
                                        @csrf
                                        <a id="desc{{$req->from}}" href="" class="font-medium whitespace-nowrap">{{$req->from}}</a>
                                        <input type="text" name="description" class="form-control-rounded hidden" placeholder="{{$req->from}}" id="txtpass{{$req->request_id}}" required>
                                        <input type="hidden" value="{{$req->request_id}}" name="id">
                                        <input type="submit" class="hidden">
                                    </form>
                                </td>
                                <td class="text-center">{{$req->to}}</td>
                                <td>
                                    <div class="flex justify-center items-center">
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>


                    <div class="sm:ml-20 sm:pl-5 mt-5">
                    </form>
                </div>
            </div>
        </div>

        <!-- END: HTML Table Data -->
    </div>


@endsection
