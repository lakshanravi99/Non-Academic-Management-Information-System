@extends('user.user_master')
@section('user')
    <!-- END: Side Menu -->
    <!-- BEGIN: Content -->
    <!-- BEGIN: Content -->
    <div class="content">
    @include('appliciant.body.topbar')
        <!-- BEGIN: Top Bar -->
            <!-- BEGIN: Breadcrumb -->

            <!-- END: Breadcrumb -->
            <!-- BEGIN: Search -->
            <!-- END: Search -->

            <!-- BEGIN: Notifications -->

            <!-- END: Notifications -->
            <!-- BEGIN: Account Menu -->
            <!-- END: Account Menu -->

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
                <a type="button" id="createshortleaveBTN" href="javascript:;" class="nav-link py-4 flex items-center active" data-tw-target="#profile" aria-controls="profile" aria-selected="true" role="tab" > <i class="w-4 h-4 mr-2" data-lucide="user"></i> Create Casual Leave </a>
            </li>
            <li id="profile-tab" class="nav-item" role="presentation">
                <a type="button" id="recentsleaveBTN" href="javascript:;" class="nav-link py-4 flex items-center " data-tw-target="#profile" aria-controls="profile" aria-selected="true" role="tab" > <i class="w-4 h-4 mr-2" data-lucide="user"></i> Recent Casual Leaves </a>
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
                            <form method="POST" action="{{route('storeCasualLeave')}}">
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
                                    <label for="vertical-form-1" class="form-label">Leave Count:<p id="count" style="color: #1D68CD"></p><p id="zero" style="color: darkred"></p></label>
{{--                                    <input  type="text" class="form-control " name="count" placeholder="" >--}}
                                </div>
{{--                                <div>--}}
{{--                                    <label for="vertical-form-1" class="form-label">Initiate Date</label>--}}
{{--                                    <input  type="date" class="form-control " name="initiatedate" placeholder="" >--}}
{{--                                </div>--}}
                                <hr>
                                <br>
                                <div>
                                    <label for="vertical-form-1" class="form-label">Date of Commencing Leave</label>
                                    <input  type="date" class="form-control " id="sdate" name="leavestartdate"  required>
                                </div>
                                <div>
                                    <label for="vertical-form-1" class="form-label">Date of Resuming Duties</label>
                                    <input  type="date" onfocusout="validateDate()" class="form-control " id="fdate" name="againpresentdate" required >
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
                                <button type="submit"  class="btn btn-primary mt-4" id="submitbtn">Submit</button>
                        </div>
                        </form>
                        <script>
                            function validateDate(){
                                var sdate = document.getElementById('sdate').value;
                                var fdate = document.getElementById('fdate').value;
                                const date1 = new Date(sdate);
                                const date2 = new Date(fdate);
                                const diffTime = Math.abs(date2 - date1);
                                const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
                                if(diffDays == 0){
                                    document.getElementById("zero").innerHTML="";
                                    document.getElementById("count").innerHTML="";
                                    document.getElementById("zero").innerHTML="please select date correctly! you enter days:0";
                                }else{
                                    document.getElementById("zero").innerHTML="";
                                    document.getElementById("count").innerHTML="";
                                    document.getElementById("count").innerHTML=diffDays;
                                }

                            }
                            // clear hours
                            function clearcounth(){
                                document.getElementById('count').innerHTML="";
                                document.getElementById('zero').innerHTML="";
                            }
                        </script>
                    </div>
                </div>
            </div>
        </div>
        @foreach($casual as $ss)
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
                    <th class="text-center whitespace-nowrap">Date of Commencing Leave</th>
                    <th class="text-center whitespace-nowrap">Date of Resuming Duties</th>
                    <th class="text-center whitespace-nowrap">Status</th>
                    <th class="text-center whitespace-nowrap">Reason</th>
                    <th class="text-center whitespace-nowrap"></th>
                    <th class="text-center whitespace-nowrap"></th>


                </tr>
                </thead>
                <tbody>
                @foreach ($casual as $req )
                    <tr class="intro-x">
                        <td class="w-40">
                            <div class="flex">
                                <div class="w-10 h-10 image-fit zoom-in">
                                    {{$req->count}}
                                </div>

                            </div>
                        </td>
{{--                        <td class="text-center">{{$req->initiate_date}}</td>--}}
                        <td class="text-center">{{$req->leave_start_day}}</td>
                        <td class="text-center">{{$req->leave_end_day}}</td>
                        <td class="w-40">
                            @if($req->Status == "Pending")
                                <div class="flex items-center justify-center text-primary"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="check-square" data-lucide="check-square" class="lucide lucide-check-square w-4 h-4 mr-2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"></path></svg> {{$req->Status}} </div>
                            @endif
                                @if($req->Status == "Approved")
                                    <div class="flex items-center justify-center text-success"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="check-square" data-lucide="check-square" class="lucide lucide-check-square w-4 h-4 mr-2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"></path></svg> {{$req->Status}} </div>
                                @endif
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
                                    <a class="flex items-center text-danger" href="{{ url('cancelcasualleave/' . $req->id) }}"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="trash-2" data-lucide="trash-2" class="lucide lucide-trash-2 w-4 h-4 mr-1"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 01-2 2H7a2 2 0 01-2-2V6m3 0V4a2 2 0 012-2h4a2 2 0 012 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg> Cancel </a>
                                </div>

                            </td>
                        @endif
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
        @foreach($casual as $dbox)
            <div class="dialogbox hidden" id="dialogbox{{$dbox->id}}">
                <div class="intro-y box px-5 pt-5 mt-5" style="width: 60% !important;margin:auto">
                    <div class="flex flex-col lg:flex-row border-b border-slate-200/60 dark:border-darkmode-400 pb-5 -mx-5" >
                        <div class="flex flex-1 px-5 items-center justify-center lg:justify-start" >

                            <div class="ml-5">
                                <div class="w-24 sm:w-40 truncate sm:whitespace-normal font-medium text-lg">Edit Casual Leave</div>
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
                                <form method="post" action="{{route('editcasualleave')}}" enctype="multipart/form-data">
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
                                        <label for="vertical-form-1" class="form-label">Leave Count:</label>
                                        <p  id="counte{{$dbox->id}}" style="color: #1D68CD"></p><p  id="zeroe{{$dbox->id}}" style="color: darkred"></p>

                                        <input  type="hidden" class="form-control " name="count" id="countesend{{$dbox->id}}" value="{{$req->count}}" >
                                    </div>
{{--                                    <div>--}}
{{--                                        <label for="vertical-form-1" class="form-label">Initiate Date</label>--}}
{{--                                        <input  type="date" class="form-control " name="initiate_date" placeholder="{{$req->initiate_date}}" >--}}
{{--                                    </div>--}}
                                    <div>
                                        <label for="vertical-form-1" class="form-label">Date of Commencing Leave</label>
                                        <input  type="date" id="sedate{{$dbox->id}}" class="form-control " name="leave_start_day" placeholder="{{$req->leave_start_day}}" required>
                                    </div>
                                    <div>
                                        <label for="vertical-form-1" class="form-label">Date of Resuming Duties</label>
                                        <input onfocusout="validateDateEdit{{$dbox->id}}()" id="fedate{{$dbox->id}}" type="date" class="form-control " name="leave_end_day" placeholder="{{$req->leave_end_day}}" required>
                                    </div>
                                    <div>
                                        <label class="w-12 flex-none xl:w-auto xl:flex-initial mr-2">Reason</label>
                                        <select name="Reason" id="tabulator-html-filter-field" class="form-select w-full sm:w-32 2xl:w-full mt-2 sm:mt-0 sm:w-auto" name="reason">
                                            @foreach($reason as $ut)
                                                <option value="{{$ut->reason}}">{{$ut->reason}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <button type="reset" onclick="clearcounthedit{{$dbox->id}}()" class="btn btn-primary mt-4">Reset</button>
                                    <button type="submit" class="btn btn-primary mt-4" >Edit</button>
                                </form>
                                <script>
                                    function validateDateEdit{{$dbox->id}}(){

                                        var sddate = document.getElementById('sedate{{$dbox->id}}').value;
                                        var fddate = document.getElementById('fedate{{$dbox->id}}').value;
                                        const ddate1 = new Date(sddate);
                                        const ddate2 = new Date(fddate);
                                        const diffTimee = Math.abs(ddate2 - ddate1);
                                        const diffDayss = Math.ceil(diffTimee / (1000 * 60 * 60 * 24));
                                        if(diffDayss == 0){
                                            document.getElementById("zeroe{{$dbox->id}}").innerHTML="";
                                            document.getElementById("counte{{$dbox->id}}").innerHTML="";
                                            document.getElementById("zeroe{{$dbox->id}}").innerHTML="please select date correctly! you enter days:0";
                                        }else{
                                            document.getElementById("zeroe{{$dbox->id}}").innerHTML="";
                                            document.getElementById("counte{{$dbox->id}}").innerHTML="";
                                            document.getElementById("counte{{$dbox->id}}").innerHTML=diffDayss;
                                            document.getElementById("countesend{{$dbox->id}}").value=diffDayss;

                                        }


                                    }
                                    function clearcounthedit{{$dbox->id}}(){
                                        document.getElementById("zeroe{{$dbox->id}}").innerHTML="";
                                        document.getElementById("counte{{$dbox->id}}").innerHTML="";

                                    }

                                </script>
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
</div>
@endsection
