
@extends('admin.admin_master')
@section('admin')



    <div class="content">
        <!-- BEGIN: Top Bar -->
        <div class="top-bar">
            <!-- BEGIN: Breadcrumb -->
            <nav aria-label="breadcrumb" class="-intro-x mr-auto hidden sm:flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('personalfilee')}}">Personal File</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{session('bar')}}</li>
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
        <div class="grid grid-cols-12 gap-6 mt-8">
            <div class="col-span-12 lg:col-span-3 2xl:col-span-2">
                <h2 class="intro-y text-lg font-medium mr-auto mt-2">
                    File Manager
                </h2>
                <!-- BEGIN: File Manager Menu -->
                <div class="intro-y box p-5 mt-6">
                    <div class="mt-1">
                        <div class="overflow-auto p-3 mb-3 mb-md-0 mr-md-3 bg-light" style="max-width: 660px; max-height: 510px;">
                            <strong>
                        @foreach($employee as $e)
                        <a  href="{{ url('selectemployeedetail/' . $e->emp_id) }}"" class="flex items-center px-3 py-2 rounded-md bg-primary text-white font-medium"> <i class="w-4 h-4 mr-2" data-lucide="image"></i> {{$e->emp_id}} </a>
                                @endforeach
                            </strong>
                        </div>
                    </div>
                </div>
                <!-- END: File Manager Menu -->
            </div>
            <div class="col-span-12 lg:col-span-9 2xl:col-span-10">
                <!-- BEGIN: File Manager Filter -->
                <div class="intro-y flex flex-col-reverse sm:flex-row items-center">
                    <div class="w-full sm:w-auto flex">
                        <button onclick="uploadform()" class="btn btn-primary shadow-md mr-2">Upload New Files</button>

                    </div>
                </div>
                <!-- END: File Manager Filter -->
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
                        @if (str_contains($errors->first(), 'Please Enter Correct Employee ID'))
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



                        <!-- BEGIN: Directory & Files -->
                <div class="intro-y grid grid-cols-12 gap-3 sm:gap-6 mt-5 "id="selected">
                    @foreach($fileselect as $f)
                        <div class="intro-y col-span-6 sm:col-span-4 md:col-span-3 2xl:col-span-2">
                            <div  class="file box rounded-md px-5 pt-8 pb-5 px-3 sm:px-5 relative zoom-in " >
                                <div class="absolute left-0 top-0 mt-3 ml-3">
                                    <input class="form-check-input border border-slate-500" type="checkbox" >
                                </div>
                                <a href="{{ url('readPDFs/'.$f->file)}}" target="blank" class="w-3/5 file__icon file__icon--file mx-auto">
                                    <div class="file__icon__file-name">{{$f->filetype}}</div>
                                </a>
                                <a href="" class="block font-medium mt-4 text-center truncate">{{$f->file}}</a>
                                <div  class="w-full truncate text-slate-500 mt-0.5">{{$f->description}}</div>
                                <div class="absolute top-0 right-0 mr-2 mt-3 dropdown ml-auto">
                                    <a class="dropdown-toggle w-5 h-5 block" href="javascript:;" aria-expanded="false" data-tw-toggle="dropdown"> <i data-lucide="more-vertical" class="w-5 h-5 text-slate-500"></i> </a>
                                    <div class="dropdown-menu w-40">
                                        <ul class="dropdown-content">

                                            <li>
                                                <a href="{{ url('deletePDF/'.$f->id)}}" class="dropdown-item"> <i data-lucide="trash" class="w-4 h-4 mr-2"></i> Delete </a>
                                            </li>
                                            <li>
                                                <a href="{{ url('downloadPDFs/'.$f->file)}}" class="dropdown-item"> <i data-lucide="trash" class="w-4 h-4 mr-2"></i> Download </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                    @endforeach

                </div>

                <div class="form hidden" id="addform">




                            <form method="post" action="{{route('uploadpersonalfile')}}" enctype="multipart/form-data">
                        @csrf
                        <a href="" class="ml-auto flex items-center text-primary" > <i data-lucide="refresh-ccw" class="w-4 h-4 mr-3"></i> Back </a>

                        EMPLOYEE ID
                        <input type="text" id="emp_id" name="emp_id" placeholder="ex-:NA001" class="form-control-rounded" required onfocusout="checkemployee()">
{{--                        <script>--}}
{{--                            function checkemployee(){--}}
{{--                                let emp_id = document.getElementById('emp_id').value;--}}
{{--                                @foreach($employee as $e)--}}
{{--                                    if({{$e->emp_id}} == emp_id){--}}
{{--                                    alert({{$e->emp_id}});--}}
{{--                                }--}}
{{--                                @endforeach--}}
{{--                            }--}}
{{--                        </script>--}}
                        <br>
                        File Type:{{session('filetype')}}
                        <input type="hidden" name="filtype" value="{{session('filetype')}}">
                                <br>
                                Description
                                <div class="form-inline mt-5" style="width: 100%">
                                    <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="4" required></textarea>

                                </div>
                                <div class="mt-3">
                            <label class="form-label">Upload File</label>
                            <div class="border-2 border-dashed dark:border-darkmode-400 rounded-md pt-4">
                                <div class="fallback">
                                    <input name="picture" type="file" >
                                </div>
                                <div class="dz-message" data-dz-message>
                                    <div class="text-lg font-medium">Drop files here or click to upload.</div>
                                </div>
                            </div>
                        <input type="submit" class="btn btn-primary shadow-md mr-2">
                    </form>
                </div>
                <script>
                    function uploadform(){
                        document.querySelector("#addform").style.display = "block";
                        document.querySelector("#selected").style.display = "none";

                    }
                </script>

            </div>



        </div>



    </div>

@endsection
