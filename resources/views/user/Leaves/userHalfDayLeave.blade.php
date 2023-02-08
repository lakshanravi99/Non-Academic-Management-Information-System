@extends('user.user_master')
@section('user')
    <!-- END: Side Menu -->
    <!-- BEGIN: Content -->
    <!-- BEGIN: Content -->
    <div class="content">
        <!-- BEGIN: Top Bar -->
        <div class="top-bar">
            <!-- BEGIN: Breadcrumb -->
            <nav aria-label="breadcrumb" class="-intro-x mr-auto hidden sm:flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="UserLeavemodule">Leave</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Half Day Leave  </li>
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
                    <img alt="Midone - HTML Admin Template" src="{{session('propic')}}">
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
                Leave
            </h2>
            <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
                <a href="{{route('usershortleave')}}">
                    <input type="button" class="form-control-rounded" href="">Back</input>
                </a>
            </div>
        </div>
        <ul class="nav nav-link-tabs flex-col sm:flex-row justify-center lg:justify-start text-center" role="tablist" >
            <li id="profile-tab" class="nav-item" role="presentation">
                <a type="button" id="createshortleaveBTN" href="javascript:;" class="nav-link py-4 flex items-center active" data-tw-target="#profile" aria-controls="profile" aria-selected="true" role="tab" > <i class="w-4 h-4 mr-2" data-lucide="user"></i> Half Day  Leave </a>
            </li>
            <li id="profile-tab" class="nav-item" role="presentation">
                <a type="button" id="recentsleaveBTN" href="javascript:;" class="nav-link py-4 flex items-center " data-tw-target="#profile" aria-controls="profile" aria-selected="true" role="tab" > <i class="w-4 h-4 mr-2" data-lucide="user"></i> Recent Half Day Leaves </a>
            </li>

        </ul>
        <div class="mt-6 lg:mt-0 flex-1 px-5 border-l border-r border-slate-200/60 dark:border-darkmode-400 border-t lg:border-t-0 pt-5 lg:pt-0 hidden">

            <div class="intro-y grid grid-cols-12 gap-6 mt-5">

                <ul class="nav nav-link-tabs flex-col sm:flex-row justify-center lg:justify-start text-center" role="tablist" >
                    <li id="profile-tab" class="nav-item" role="presentation">
                        <a type="button" id="showgallery" href="javascript:;" class="nav-link py-4 flex items-center active" data-tw-target="#profile" aria-controls="profile" aria-selected="true" role="tab" > <i class="w-4 h-4 mr-2" data-lucide="user"></i> Create Leave </a>
                    </li>
                    <li id="profile-tab" class="nav-item" role="presentation">
                        <a type="button" id="showupdateform" href="javascript:;" class="nav-link py-4 flex items-center " data-tw-target="#profile" aria-controls="profile" aria-selected="true" role="tab" > <i class="w-4 h-4 mr-2" data-lucide="user"></i> Recent Leave </a>
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
                <div  id ="sleaveform" class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400 ">

                    <div  class="p-3" style="width: 70% !important;">

                        <div class="preview">
                            <form method="POST" action="{{route('storehalfdayLeave')}}">
                                @csrf
                                <input type="hidden" value="{{session('emp_id')}}" name="emp_id">
                                <input type="hidden" value="{{session('usertype')}}" name="usertype">
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

                                <div>
                                    <label for="vertical-form-1" class="form-label"><p id="redcounthours" style="color: red"></p><p id="counthours"></p> </label>
                                    <input  type="hidden" class="form-control " name="count" value="0.5"  >
                                </div>
{{--                                <div>--}}
{{--                                    <label for="vertical-form-1" class="form-label">Initiate Date</label>--}}
{{--                                    <input  type="date" class="form-control " name="initiatedate" placeholder="" >--}}
{{--                                </div>--}}
                                <div>
                                    <label for="vertical-form-1" class="form-label">Date & Time of Commencing Leave</label>
                                    <input  id="commencetime" type="datetime-local" class="form-control " name="leavestartdate" placeholder="" required>
                                </div>
                                <div>
                                    <label for="vertical-form-1" class="form-label">Date & Time of Resuming Duties</label>
                                    <input  onfocusout="diff_minutes()" id="restime" type="datetime-local" class="form-control " name="againpresentdate" placeholder="" required >
                                </div>
                                <div>
                                    <label class="w-12 flex-none xl:w-auto xl:flex-initial mr-2">Reason</label>
                                    <select id="tabulator-html-filter-field" class="form-select w-full sm:w-32 2xl:w-full mt-2 sm:mt-0 sm:w-auto" name="reason">
                                        @foreach($reason as $ut)
                                            <option value="{{$ut->reason}}">{{$ut->reason}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <button type="reset" onclick="clearcounth()" class="btn btn-primary mt-4">Reset</button>
                                <button type="submit" class="btn btn-primary mt-4" id="submitbtn">Submit</button>
                        </div>
                        </form>
                        <script>
                            function diff_minutes()
                            {
                                var commence = document.getElementById('commencetime').value;
                                var resume = document.getElementById('restime').value;

                                dt1 = new Date(commence);
                                dt2 = new Date(resume);

                                var diff =(dt2.getTime() - dt1.getTime()) / 1000;
                                diff /= 60;
                                var minutes = Math.abs(Math.round(diff));

                               var hourscount = minutes/60;
                               var hoursfinalend = Math.abs(Math.round(hourscount));
                               var  multi = hoursfinalend * 60;
                               var minutesfinal = (minutes - multi);

                               if(minutesfinal == 30){
                                   var hourfinal = hoursfinalend - 1;
                                   alert('hours:'+hourfinal+'minutes:'+minutesfinal+'fullmin:'+minutes);
                               }


                                document.getElementById('counthours').innerHTML="";
                                if( minutes < 210){
                                    document.getElementById('redcounthours').innerHTML="";
                                    document.getElementById('redcounthours').innerHTML="You enter less than 3 hours and 30 minues. You have to select 3 Hours and 3o Minutes";
                                }else if(minutes > 210){
                                    document.getElementById('redcounthours').innerHTML="";
                                    document.getElementById('redcounthours').innerHTML="You enter more than 3 hours and 30 minues.You have to select 3 Hours and 3o Minutes";
                                }else if( minutes == 210){
                                    document.getElementById('counthours').innerHTML="";
                                    document.getElementById('redcounthours').innerHTML="";
                                    document.getElementById('counthours').innerHTML="3:Hours and 30:minutes";
                                }




                            }
                            function clearcounth(){
                                document.getElementById('counthours').innerHTML="";
                                document.getElementById('redcounthours').innerHTML="";
                            }
                        </script>

                    </div>
                </div>
            </div>
        </div>
        @foreach($half as $ss)
            <script>
                document.getElementById("recentsleaveBTN").addEventListener("click",
                    function (){
                        document.querySelector("#recentsleave").style.display = "block";
                        document.querySelector("#dialogbox{{$ss->id}}").style.display = "none";
                        document.querySelector("#sleaveform").style.display = "none";

                    });

                document.getElementById("createshortleaveBTN").addEventListener("click",
                    function (){

                        document.querySelector("#recentsleave").style.display = "none";
                        document.querySelector("#dialogbox{{$ss->id}}").style.display = "none";
                        document.querySelector("#sleaveform").style.display = "block";

                    });
            </script>
        @endforeach
        <div id="recentsleave" class="intro-y col-span-12 md:col-span-6 box hidden">

            <table class="table table-report sm:mt-2 ">
                <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                    <h2 class="font-medium text-base mr-auto">
                        Recent Leaves
                    </h2>

                </div>
                <thead>
                <tr>
                    <th class="whitespace-nowrap">Leave Count</th>
{{--                    <th class="whitespace-nowrap">Initiate Date</th>--}}
                    <th class="text-center whitespace-nowrap">Date & Time of Commencing Leave</th>
                    <th class="text-center whitespace-nowrap">Date & Time of Resuming Duties</th>
                    <th class="text-center whitespace-nowrap">Status</th>
                    <th class="text-center whitespace-nowrap">Reason</th>
                    <th class="text-center whitespace-nowrap"></th>
                    <th class="text-center whitespace-nowrap"></th>


                </tr>
                </thead>
                <tbody>
                @foreach ($half as $req )
                    <tr class="intro-x">
                        <td class="w-40">
                            <div class="flex">
                                <div class="w-10 h-10 image-fit zoom-in">
                                    {{$req->count}}
                                </div>

                            </div>
                        </td>
{{--                        <td>--}}
{{--                            <a id="desc{{$req->id}}" href="" class="font-medium whitespace-nowrap">{{$req->initiate_date}}</a>--}}
{{--                        </td>--}}
                        <td class="text-center">{{$req->leave_start_day}}</td>
                        <td class="text-center">{{$req->leave_end_day}}</td>
                        <td class="w-40">
                            <div class="flex items-center justify-center text-primary"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="check-square" data-lucide="check-square" class="lucide lucide-check-square w-4 h-4 mr-2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"></path></svg> {{$req->Status}} </div>
                        </td>
                        <td class="text-center">{{$req->Reason}}</td>

                        @if($req->Status == 'Pending')
                            <td class="table-report__action w-56">
                                <div class="flex justify-center items-center">
                                    <a title="click to edit" type="button" id="click{{$req->id}}" class="flex items-center mr-3" > <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="check-square" data-lucide="check-square" class="lucide lucide-check-square w-4 h-4 mr-1"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"></path></svg> Edit </a>
                                </div>
                                <script>
                                    document.getElementById("click{{$req->id}}").addEventListener("click",
                                        function (){

                                            document.querySelector("#recentsleave").style.display = "none";
                                            document.querySelector("#dialogbox{{$req->id}}").style.display = "block";




                                        });
                                </script>
                            </td>
                        @endif
                        @if($req->Status == 'Pending')
                            <td class="table-report__action w-56">
                                <div class="flex justify-center items-center">
                                    <a class="flex items-center text-danger" href="{{ url('cancelhalfdayleave/' . $req->id) }}"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="trash-2" data-lucide="trash-2" class="lucide lucide-trash-2 w-4 h-4 mr-1"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 01-2 2H7a2 2 0 01-2-2V6m3 0V4a2 2 0 012-2h4a2 2 0 012 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg> Cancel </a>
                                </div>

                            </td>
                        @endif
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
        @foreach($half as $dbox)
            <div class="dialogbox hidden" id="dialogbox{{$dbox->id}}">
                <div class="intro-y box px-5 pt-5 mt-5" style="width: 60% !important;margin:auto">
                    <div class="flex flex-col lg:flex-row border-b border-slate-200/60 dark:border-darkmode-400 pb-5 -mx-5" >
                        <div class="flex flex-1 px-5 items-center justify-center lg:justify-start" >

                            <div class="ml-5">
                                <div class="w-24 sm:w-40 truncate sm:whitespace-normal font-medium text-lg">Edit Half Day Leave</div>
                            </div>
                        </div>
                        <div class="mt-6 lg:mt-0 flex-1 px-5 border-l border-r border-slate-200/60 dark:border-darkmode-400 border-t lg:border-t-0 pt-5 lg:pt-0">
                            <div class="font-medium text-center lg:text-left lg:mt-3"> </div>
                            <div class="flex flex-col justify-center items-center lg:items-start mt-4">
                                <span class="iconify" data-icon="emojione-monotone:id-button"> </span>Leave ID:{{$dbox->id}}
                            </div>
                        </div>
                    </div>
                    <div class="intro-y box px-5 pt-5 mt-5 " style="width: 60%;margin:auto;" id="gallery">

                        <div class="intro-y col-span-12 md:col-span-6 box">
                            <div class="p-5">
                                <form method="post" action="{{route('edithalfdayleave')}}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" value="{{$dbox->id}}" name="id">
                                    <input type="hidden" value="{{session('emp_id')}}" name="emp_id">
                                    <input type="hidden" value="{{session('usertype')}}" name="usertype">
                                    <div>
                                        <label for="vertical-form-1" class="form-label">Place</label>
                                        <input  type="text" class="form-control " name="place" placeholder="IT" disabled>
                                    </div>
                                    <div>
                                        <label for="vertical-form-1" class="form-label">Status</label>
                                        <input  type="text" class="form-control " name="status" placeholder="{{$req->Status}}" disabled>
                                    </div>
                                    <div>
                                        <label for="vertical-form-1" class="form-label">Leave Count</label>
                                        <input  type="hidden" class="form-control " name="count" value="0.5"  disabled>
                                    </div>
{{--                                    <div>--}}
{{--                                        <label for="vertical-form-1" class="form-label">Initiate Date</label>--}}
{{--                                        <input  type="date" class="form-control " name="initiate_date" placeholder="{{$req->initiate_date}}" >--}}
{{--                                    </div>--}}
                                    <div>
                                        <label for="vertical-form-1" class="form-label">Date & Time of Commencing Leave</label>
                                        <input  type="datetime-local" class="form-control " name="leave_start_day" placeholder="{{$req->leave_start_day}}" required>
                                    </div>
                                    <div>
                                        <label for="vertical-form-1" class="form-label">Date & Time of Resuming Duties</label>
                                        <input  type="datetime-local" class="form-control " name="leave_end_day" placeholder="{{$req->leave_end_day}}" required>
                                    </div>
                                    <div>
                                        <label class="w-12 flex-none xl:w-auto xl:flex-initial mr-2">Reason</label>
                                        <select id="tabulator-html-filter-field" class="form-select w-full sm:w-32 2xl:w-full mt-2 sm:mt-0 sm:w-auto" name="reason">
                                            @foreach($reason as $ut)
                                                <option value="{{$ut->reason}}">{{$ut->reason}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <button type="reset" class="btn btn-primary mt-4">Reset</button>
                                    <button type="submit" class="btn btn-primary mt-4" >Edit</button>
                                </form>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        @endforeach


    </div>
</div>
</div>

</div>
</div>
<!-- END: Content -->
@endsection
