
@extends('admin.admin_master')
@section('admin')



    <div class="content">
        <!-- BEGIN: Top Bar -->
        <div class="top-bar">
            <!-- BEGIN: Breadcrumb -->
            <nav aria-label="breadcrumb" class="-intro-x mr-auto hidden sm:flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="">Employee Update</a></li>
                    <li class="breadcrumb-item active" aria-current="page"></li>
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
                Employee Update
            </h2>
        </div>
        <!-- BEGIN: Content -->
        <form method="POST" action="{{route('updateemployee')}}" enctype="multipart/form-data">
            @csrf
            <div class="intro-y box px-5 pt-5 mt-5">
                <div class="flex flex-col lg:flex-row border-b border-slate-200/60 dark:border-darkmode-400 pb-5 -mx-5">
                    <div class="flex flex-1 px-5 items-center justify-center lg:justify-start">
                        <div class="w-20 h-20 sm:w-24 sm:h-24 flex-none lg:w-32 lg:h-32 image-fit relative">
                            <div class="border-2 border-dashed dark:border-darkmode-400 rounded-md pt-4">
                                <div class="fallback">
                                    <input required name="picture" type="file" id="xxfg" onchange="readURL(this);">
                                </div>
                                <script>
                                    function readURL(input) {
                                        document.querySelector("#xxfg").style.display = "none";
                                        document.querySelector("#blah").style.display = "block";
                                        if (input.files && input.files[0]) {
                                            var reader = new FileReader();

                                            reader.onload = function (e) {
                                                $('#blah')
                                                    .attr('src', e.target.result)
                                                    .width(150)
                                                    .height(200);
                                            };
                                            reader.readAsDataURL(input.files[0]);
                                        }
                                    }
                                </script>
                                <img id="blah" src="#" class=" rounded hidden" style="width: 150px;height: 150px;"/>

                            </div>

                            <div  class="absolute mb-1 mr-1 flex items-center justify-center bottom-0 right-0 bg-primary rounded-full p-2"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="camera" class="lucide lucide-camera w-4 h-4 text-white" data-lucide="camera"><path d="M14.5 4h-5L7 7H4a2 2 0 00-2 2v9a2 2 0 002 2h16a2 2 0 002-2V9a2 2 0 00-2-2h-3l-2.5-3z"></path><circle cx="12" cy="13" r="3"></circle></svg>
                            </div>
                        </div>
                        <div class="ml-5">
                            @foreach($employee as $e)
                            <form class="w-24 sm:w-40 truncate sm:whitespace-normal font-medium text-lg" style="width: 300px"><label for="regular-form-1" class="form-label">1.Employee Id</label>
                                <div class="input-group">
                                    <div id="input-group-email" class="input-group-text">NA</div>
                                    <input type="hidden" value="{{$e->emp_id}}" name="emp_id">
                                    <input disabled type="text" class="form-control"  value="{{$e->emp_id}}"    aria-describedby="input-group-email">
                                </div>
                                <div class="w-24 sm:w-40 truncate sm:whitespace-normal font-medium text-lg" style="width: 300px"><label for="regular-form-1" class="form-label">
                                        2.First Name</label>
                                    <input name="fname" id="regular-form-1" type="text" class="form-control" value="{{$e->fname}}"></div>
                                <div class="w-24 sm:w-40 truncate sm:whitespace-normal font-medium text-lg" style="width: 300px"><label for="regular-form-1" class="form-label">
                                        3.Middle Name</label>
                                    <input name="mname" id="regular-form-1" type="text" class="form-control" value="{{$e->mname}}"></div>
                                <div class="w-24 sm:w-40 truncate sm:whitespace-normal font-medium text-lg" style="width: 300px"><label for="regular-form-1" class="form-label">
                                        4.Last Name</label>
                                    <input name="lname" id="regular-form-1" type="text" class="form-control" value="{{$e->lname}}"></div>
                                <div class="w-24 sm:w-40 truncate sm:whitespace-normal font-medium text-lg" style="width: 300px"><label for="regular-form-1" class="form-label">
                                        5.Faculty Name</label>
                                    <input name="place" disabled value="Technology" id="regular-form-1" type="text" class="form-control" placeholder="Input text"></div>



                                <div class="w-24 sm:w-40 truncate sm:whitespace-normal font-medium text-lg" style="width: 300px">
                                    <label for="regular-form-1" class="form-label">6.Designation</label>
                                    <select name="place" class="form-select mt-2 sm:mr-2" aria-label="Default select example">
                                        @foreach($usertypesfresh as $ut)
                                            <option value="{{$ut->usertype}}">{{$ut->usertype}}</option>
                                        @endforeach
                                    </select>
                                </div>

                        </div>
                    </div>
                    <div class="mt-6 lg:mt-0 flex-1 px-5 border-l border-r border-slate-200/60 dark:border-darkmode-400 border-t lg:border-t-0 pt-5 lg:pt-0">

                        <div class="flex flex-col justify-center items-center lg:items-start mt-4" >
                            <div class="w-24 sm:w-40 truncate sm:whitespace-normal font-medium text-lg" style="width: 300px">
                                <label for="regular-form-1" class="form-label">7.Gender</label>
                                <select name="gender" class="form-select mt-2 sm:mr-2" aria-label="Default select example">
                                    <option>Male</option>
                                    <option>Female</option>
                                </select>
                            </div>

                            <div class="w-24 sm:w-40 truncate sm:whitespace-normal font-medium text-lg" style="width: 300px"><label for="regular-form-1" class="form-label">
                                    8.Department(Place)</label>
                                <select name="place" class="form-select mt-2 sm:mr-2" aria-label="Default select example">
                                    @foreach($department as $ut)
                                        <option value="{{$ut->department_name}}">{{$ut->department_name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="w-24 sm:w-40 truncate sm:whitespace-normal font-medium text-lg" style="width: 300px"><label for="regular-form-1" class="form-label">9.Civil Status</label>

                                <select value="{{$e->civil_status}}" name="civil_status" class="form-select mt-2 sm:mr-2" aria-label="Default select example">
                                    <option>Unmarried</option>
                                    <option>Married</option>
                                </select>
                            </div>

                            <div class="w-24 sm:w-40 truncate sm:whitespace-normal font-medium text-lg" style="width: 300px">
                                <label for="regular-form-1" class="form-label">10.Current Postal Address</label>
                                <input name="current_postal_address" id="regular-form-1" type="text" class="form-control" value="{{$e->current_postal_address}}"></div>
                            <div class="w-24 sm:w-40 truncate sm:whitespace-normal font-medium text-lg" style="width: 300px">
                                <label for="regular-form-1" class="form-label">11.Permanent Postal Address</label>
                                <input name="permanent_postal_address" id="regular-form-1" type="text" class="form-control" value="{{$e->permanent_postal_address}}"></div>
                            <div class="w-24 sm:w-40 truncate sm:whitespace-normal font-medium text-lg" style="width: 300px">
                                <label for="regular-form-1" class="form-label">12.Current Mobile</label>
                                <input name="current_mobile" id="regular-form-1" type="text" class="form-control" value="{{$e->current_mobile}}"></div>
                            <div class="w-24 sm:w-40 truncate sm:whitespace-normal font-medium text-lg" style="width: 300px">
                                <label for="regular-form-1" class="form-label">13.Permanent Mobile</label>
                                <input name="permanent_mobile" id="regular-form-1" type="text" class="form-control" value="{{$e->permanent_mobile}}"></div>
                            <div class="w-24 sm:w-40 truncate sm:whitespace-normal font-medium text-lg" style="width: 300px">
                                <label for="regular-form-1" class="form-label">14.Police Division</label>
                                <input name="police_division" id="regular-form-1" type="text" class="form-control" value="{{$e->police_division}}"></div>
                            <div class="w-24 sm:w-40 truncate sm:whitespace-normal font-medium text-lg" style="width: 300px">
                                <label for="regular-form-1" class="form-label">15.Email</label>
                                <input required name="email" id="regular-form-1" type="email" class="form-control" value="{{$e->email}}"></div>
                        </div>
                    </div>

                    <div class="mt-6 lg:mt-0 flex-1 px-5 border-l border-r border-slate-200/60 dark:border-darkmode-400 border-t lg:border-t-0 pt-5 lg:pt-0">

                        <div class="flex flex-col justify-center items-center lg:items-start mt-4">

                            <div class="w-24 sm:w-40 truncate sm:whitespace-normal font-medium text-lg" style="width: 300px">
                                <label for="regular-form-1" class="form-label">16.Date of Birth</label>
                                <input required name="dob" id="regular-form-1" type="date" class="form-control" value="{{$e->dob}}"></div>
                            <div class="w-24 sm:w-40 truncate sm:whitespace-normal font-medium text-lg" style="width: 300px">
                                <label for="regular-form-1" class="form-label">17.Age as Closing Date</label>
                                <br>
                                <input name="age_as_at_closing_date" id="regular-form-1" type="number" class="form-control" value="{{$e->age_as_at_closing_date}}">
                                {{--                            <label for="regular-form-1" class="form-label">Months</label>--}}
                                {{--                            <input id="regular-form-1" type="number" class="form-control" style="width: 100px;">--}}
                                {{--                            <label for="regular-form-1" class="form-label">Days</label>--}}
                                {{--                            <input id="regular-form-1" type="number" class="form-control" style="width: 100px;">--}}

                            </div>
                            <div class="w-24 sm:w-40 truncate sm:whitespace-normal font-medium text-lg" style="width: 300px">
                                <label for="regular-form-1" class="form-label">18.Citizenship</label>
                                <input name="citizenship" id="regular-form-1" type="text" class="form-control" value="{{$e->citizenship}}"></div>

                            <div class="w-24 sm:w-40 truncate sm:whitespace-normal font-medium text-lg" style="width: 300px">
                                <label for="regular-form-1" class="form-label">19.NIC No. </label>
                                <input name="nic" id="regular-form-1" type="text" class="form-control" value="{{$e->nic}}"></div>
                            <div class="w-24 sm:w-40 truncate sm:whitespace-normal font-medium text-lg" style="width: 300px">
                                <label for="regular-form-1" class="form-label">20.Driving Licen No.</label>
                                <input name="driving_licen_no" id="regular-form-1" type="text" class="form-control" value="{{$e->driving_licen_no}}"></div>
                            <div class="w-24 sm:w-40 truncate sm:whitespace-normal font-medium text-lg" style="width: 300px">
                                <label for="regular-form-1" class="form-label">21.Driving Licen Issuing Date</label>
                                <input name="driving_licen_issuing_date" id="regular-form-1" type="date" class="form-control" value="{{$e->driving_licen_issuing_date}}"></div>

                            <div class="w-24 sm:w-40 truncate sm:whitespace-normal font-medium text-lg" style="width: 300px">
                                <label for="regular-form-1" class="form-label">20.Salary</label>
                                <div class="input-group mt-2">
                                    <input name="salary" type="text" class="form-control" value="{{$e->salary}}" aria-label="Price" aria-describedby="input-group-price">
                                    <div id="input-group-price" class="input-group-text">.00</div>
                                </div>

                                <div class="w-24 sm:w-40 truncate sm:whitespace-normal font-medium text-lg" style="width: 300px"><label for="regular-form-1" class="form-label">21.Status</label>

                                    <select name="status" class="form-select mt-2 sm:mr-2" aria-label="Default select example">
                                        <option>Active</option>
                                        <option>Inactive</option>
                                    </select>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <input type="hidden" value="1" name="faculty_id">

                        <input type="Reset" class="btn-danger-soft" value="Reset">
                        <input type="submit" class="btn-danger-soft" value="Update">
                    </div>
        </form>

    </div>

    </div>




    <!-- END: Content -->



@endsection
