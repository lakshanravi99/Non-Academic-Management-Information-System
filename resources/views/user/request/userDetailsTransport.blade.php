@extends('user.user_master')
@section('user')
    <div class="content">
        <!-- BEGIN: Top Bar -->
        <div class="top-bar">
            <!-- BEGIN: Breadcrumb -->
            <nav aria-label="breadcrumb" class="-intro-x mr-auto hidden sm:flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('Requestmodule')}}">Application</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Transport Request </li>
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
                            <a href="{{route('logout')}}" class="dropdown-item hover:bg-white/5"> <i data-lucide="toggle-right" class="w-4 h-4 mr-2"></i> Logout </a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- END: Account Menu -->
        </div>
        <!-- END: Top Bar -->
        <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
            <h2 class="text-lg font-medium mr-auto">
                Transport Requests
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
                        @foreach ($data as $req )

                            Details:{{$req->emp_id}}
                            <br><br>
                            Head of Department
                            <br>
                            @if($req->HOD_status == 'Approved')
                                <td class="w-40">
                                    <div class="flex items-center justify-center text-success"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="check-square" data-lucide="check-square" class="lucide lucide-check-square w-4 h-4 mr-2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"></path></svg> Approved </div>
                                </td>
                            @endif
                            @if($req->HOD_status == 'Pending')
                                <td class="w-40">
                                    <div class="flex items-center justify-center text-primary"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="check-square" data-lucide="check-square" class="lucide lucide-check-square w-4 h-4 mr-2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"></path></svg> Pending </div>
                                </td>
                            @endif
                            @if($req->HOD_status == 'Rejected')
                                <td class="w-40">
                                    <div class="flex items-center justify-center text-danger"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="check-square" data-lucide="check-square" class="lucide lucide-check-square w-4 h-4 mr-2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"></path></svg> Rejected </div>
                                </td>
                            @endif
                            Dean

                            @if($req->Dean_status == 'Approved')
                                <td class="w-40">
                                    <div class="flex items-center justify-center text-success"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="check-square" data-lucide="check-square" class="lucide lucide-check-square w-4 h-4 mr-2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"></path></svg> {{$req->Dean_status}} </div>
                                </td>
                            @endif
                            @if($req->Dean_status == 'Pending')
                                <td class="w-40">
                                    <div class="flex items-center justify-center text-primary"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="check-square" data-lucide="check-square" class="lucide lucide-check-square w-4 h-4 mr-2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"></path></svg> {{$req->Dean_status}} </div>
                                </td>
                            @endif
                            @if($req->Dean_status == 'Rejected')
                                <td class="w-40">
                                    <div class="flex items-center justify-center text-danger"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="check-square" data-lucide="check-square" class="lucide lucide-check-square w-4 h-4 mr-2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"></path></svg> {{$req->Dean_status}} </div>
                                </td>
                            @endif
                            {{--                            VC Status--}}

                            {{--                            @if($req->VC_status == 'Approved')--}}
                            {{--                                <td class="w-40">--}}
                            {{--                                    <div class="flex items-center justify-center text-success"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="check-square" data-lucide="check-square" class="lucide lucide-check-square w-4 h-4 mr-2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"></path></svg> {{$req->status}} </div>--}}
                            {{--                                </td>--}}
                            {{--                            @endif--}}
                            {{--                            @if($req->VC_status == 'Pending')--}}
                            {{--                                <td class="w-40">--}}
                            {{--                                    <div class="flex items-center justify-center text-primary"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="check-square" data-lucide="check-square" class="lucide lucide-check-square w-4 h-4 mr-2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"></path></svg> {{$req->status}} </div>--}}
                            {{--                                </td>--}}
                            {{--                            @endif--}}
                            {{--                            @if($req->VC_status == 'Rejected')--}}
                            {{--                                <td class="w-40">--}}
                            {{--                                    <div class="flex items-center justify-center text-danger"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="check-square" data-lucide="check-square" class="lucide lucide-check-square w-4 h-4 mr-2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"></path></svg> {{$req->status}} </div>--}}
                            {{--                                </td>--}}
                            {{--                            @endif--}}
                    </h2>
                </div>
                <div id="horizontal-form" class="p-3">
                    <div class="preview">






                        <div class="form-inline mt-5">

                            <input type="hidden" name="reqtype" value="Transport">
                        </div>
                        <table>
                            <tr>
                                <td>
                                    <div class="form-inline mt-5" style="width: 90px">
                                        <label for="horizontal-form-2" class="form-label sm:w-20">Available Vehicle</label>
                                    </div>
                                </td>
                                <td>
                                    <input type="text" disabled class="form-control" value="{{$req->name}}">
                                </td>
                            </tr>
                            <tr>
                                <td >
                                    <div class="form-inline mt-5" style="width: 90px">
                                        <label for="horizontal-form-2" class="form-label sm:w-20">Priority</label>
                                    </div>
                                </td>

                                <td>
                                    <input type="text" disabled value="{{$req->priority}}" class="form-control">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-inline mt-5" style="width: 90px">
                                        <label for="horizontal-form-1" class="form-label sm:w-20">From</label>
                                    </div>
                                </td>
                                <td>
                                    <div class="intro-x mt-8">
                                        <input required type="text" name="from" class="intro-x login__input form-control py-3 px-4 block" disabled value="{{$req->fromv}}">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-inline mt-5" style="width: 90px">
                                        <label for="horizontal-form-1" class="form-label sm:w-20">To</label>
                                    </div>
                                </td>
                                <td>
                                    <div class="intro-x mt-8">
                                        <input required disabled type="text" name="to" class="intro-x login__input form-control py-3 px-4 block" value="{{$req->tov}}">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-inline mt-5" style="width: 90px">
                                        <label for="horizontal-form-1" class="form-label sm:w-20">Number of Heads</label>
                                    </div>
                                </td>
                                <td>
                                    <div class="intro-x mt-8">
                                        <input required disabled type="text" name="seats" class="intro-x login__input form-control py-3 px-4 block" value="{{$req->seats}}">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-inline mt-5" style="width: 90px">
                                        <label for="horizontal-form-1" class="form-label sm:w-20">Time</label>
                                    </div>
                                </td>
                                <td>
                                    <div class="intro-x mt-8">
                                        <input required disabled type="datetime-local" name="time" class="intro-x login__input form-control py-3 px-4 block" value="{{$req->time}}">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-inline mt-5" style="width: 90px">
                                        <label for="horizontal-form-1" class="form-label sm:w-20">Description</label>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-inline mt-5" style="width: 400%">
                                        <input disabled type="text" name="description" class="form-control"  rows="4" required value ="{{$req->description}}">

                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-inline mt-5" style="width: 90px">
                                        <label for="horizontal-form-1" class="form-label sm:w-20">HOD Reason</label>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-inline mt-5" style="width: 400%">
                                        <input disabled type="text" name="description" class="form-control"  rows="4" required value ="{{$req->hodreason}}">

                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-inline mt-5" style="width: 90px">
                                        <label for="horizontal-form-1" class="form-label sm:w-20">Dean Reason</label>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-inline mt-5" style="width: 400%">
                                        <input disabled type="text" name="description" class="form-control"  rows="4" required value ="{{$req->deanreason}}">

                                    </div>
                                </td>
                            </tr>
                        </table>

                    </div>


                    @endforeach
                </div>



            </div>
        </div>

    </div>

    </div>

@endsection
