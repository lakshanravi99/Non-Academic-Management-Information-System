@extends('user.user_master')
@section('user')
    <div class="content">
        <!-- BEGIN: Top Bar -->
        <div class="top-bar">
            <!-- BEGIN: Breadcrumb -->
            <nav aria-label="breadcrumb" class="-intro-x mr-auto hidden sm:flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('UserRequestmodule')}}">Application</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Promotion Request </li>
                </ol>
            </nav>
            <!-- END: Breadcrumb -->
            <!-- BEGIN: Search -->
            <!-- END: Search -->
            <!-- BEGIN: Notifications -->
            <div class="intro-x dropdown mr-auto sm:mr-6">
                <div class="dropdown-toggle notification notification--bullet cursor-pointer" role="button" aria-expanded="false" data-tw-toggle="dropdown"> <i data-lucide="bell" class="notification__icon dark:text-slate-500"></i> </div>
            </div>
            <!-- END: Notifications -->
            <!-- BEGIN: Account Menu -->
            <div class="intro-x dropdown w-8 h-8">
                <div class="dropdown-toggle w-8 h-8 rounded-full overflow-hidden shadow-lg image-fit zoom-in" role="button" aria-expanded="false" data-tw-toggle="dropdown">
                    <img alt="Midone - HTML Admin Template" src="/{{session('propic')}}">
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
                            <a href="" class="dropdown-item hover:bg-white/5"> <i data-lucide="lock" class="w-4 h-4 mr-2"></i> Reset Password </a>
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
                    <li id="profile-tab" class="nav-item" role="presentation">
                        <a type="button" id="showgallery" href="javascript:;" class="nav-link py-4 flex items-center active" data-tw-target="#profile" aria-controls="profile" aria-selected="true" role="tab" > <i class="w-4 h-4 mr-2" data-lucide="user"></i> Request Form </a>
                    </li>
                    <li id="profile-tab" class="nav-item" role="presentation">
                        <a type="button" id="showupdateform" href="javascript:;" class="nav-link py-4 flex items-center " data-tw-target="#profile" aria-controls="profile" aria-selected="true" role="tab" > <i class="w-4 h-4 mr-2" data-lucide="user"></i> Recent Request </a>
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


        </div>
        <div id="gallery" class="intro-y col-span-8 md:col-span-3 box ">


            <div class="intro-y box mt-3 " >

                <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400 ">
                    <h2 class="font-medium text-base mr-auto">
                        Add Current Position Grade Form
                    </h2>
                    <a href="{{route('nextpromotion')}}">
                    <input type="button" class="btn btn-primary shadow-md mr-2"  value="NEXT" style="margin-left: 900px"></a>
                </div>
                <div id="horizontal-form" class="p-3">
                    <div class="preview">



                        <form method="POST" action={{route('EditPromoRequestCurrentPositionGrade')}}>
                            @csrf

                            <div class="form-inline mt-5">

                                <input type="hidden" name="emp_id" value="{{session('emp_id')}}">
                            </div>

                            <table>
                                <tr>
                                    <td>
                                        <label for="fname" class="form-label sm:w-200">Position
                                        </label>
                                    </td>
                                    <td>
                                        <input required type="text"  name="position" value="" class="form-control" > </label><br><br>
                                    </td>
                                    <td>
                                        <label  class="form-label sm:w-200">Grade
                                        </label>
                                    </td>
                                    <td>
                                        <input required type="text"  name="grade" value="" class="form-control" > </label><br><br>
                                    </td>

                                    <td>
                                        <label style="margin-left: 10px;" class="form-label sm:w-20">From</label>
                                    </td>
                                    <td>
                                        <input required type="date" id="pp" name="from" value="" class="form-control"><br><br>
                                    </td>


                                    <div id="wrapper">
                                        <td>
                                            <label  style="margin-left: 10px;" class="form-label sm:w-200">To</label>
                                        </td>
                                        <td>
                                            <input required  type="date" id="pp" name="to" value="" class="form-control"><br><br>
                                        </td>
                                        <td>

                                                <input type="submit" class="btn btn-primary shadow-md mr-2"  value="Add"  style="margin-left: 100px">
                                                <input type="reset" class="btn btn-primary shadow-md mr-2"  value="Reset">



                                        </td>


                                    </div><br>
                                </tr>

                </table>
                        </form>
                        <table class="table table-report sm:mt-2 ">
                            <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                                <h2 class="font-medium text-base mr-auto">
                                    Grades
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
                            @foreach ($data as $req )
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
                                        <a class="flex items-center text-danger" href="{{ url('/deletecurrentgrade/' . $req->id) }}"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="trash-2" data-lucide="trash-2" class="lucide lucide-trash-2 w-4 h-4 mr-1"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 01-2 2H7a2 2 0 01-2-2V6m3 0V4a2 2 0 012-2h4a2 2 0 012 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg> Delete </a>
                                    </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>


                    </div>
        </div>

    </div>

@endsection
