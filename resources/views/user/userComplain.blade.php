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
                    <li class="breadcrumb-item"><a href="#">Application</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Complain Module</li>
                </ol>
            </nav>
            <!-- END: Breadcrumb -->
            <!-- BEGIN: Search -->
            <!-- END: Search -->
            <a href="{{route('darmodeon')}}">
                <span class="iconify-inline mr-4" data-icon="emojione-monotone:{{session('lightmodeicon')}}" style="color: {{session('lightmodeiconcolor')}};" data-width="24" data-height="24"></span>
            </a>
            <script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script>

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
                Complain
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
                    </button>
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
        <div class="intro-y grid grid-cols-12 gap-6 mt-5">
            <!-- BEGIN: Blog Layout -->
            <div class="intro-y col-span-12 md:col-span-7 box">


                <div class="intro-y box mt-3" >

                    <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">

                        <ul class="nav nav-link-tabs flex-col sm:flex-row justify-center lg:justify-start text-center" role="tablist" >
                            <li id="profile-tab" class="nav-item" role="presentation">
                                <a type="button" id="form" href="javascript:;" class="nav-link py-4 flex items-center active" data-tw-target="#profile" aria-controls="profile"
                                   aria-selected="true" role="tab"  >
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-diff" viewBox="0 0 16 16">
                                        <path d="M8 5a.5.5 0 0 1 .5.5V7H10a.5.5 0 0 1 0 1H8.5v1.5a.5.5 0 0 1-1 0V8H6a.5.5 0 0 1 0-1h1.5V5.5A.5.5 0 0 1 8 5zm-2.5 6.5A.5.5 0 0 1 6 11h4a.5.5 0 0 1 0 1H6a.5.5 0 0 1-.5-.5z"/>
                                        <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z"/>
                                    </svg>
                                    Complain Form </a>
                            </li>
                            <li id="profile-tab" class="nav-item" role="presentation">
                                <a type="button" id="recentcomplain" href="javascript:;" class="nav-link py-4 flex items-center " data-tw-target="#profile"
                                   aria-controls="profile" aria-selected="true" role="tab" > <i class="w-4 h-4 mr-2" data-lucide="user"></i> Recent Complains </a>
                            </li>

                        </ul>


                    </div>
                    <div  class="p-3 " id="formm">
                        <div class="preview">
                            <form method="post" action="storeComplain" enctype="multipart/form-data">
                                @csrf
                                <div class="form-inline mt-5">
                                    <label for="horizontal-form-1" class="form-label sm:w-20">Description</label>
                                    <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="4" required></textarea>
                                    <br>
                                </div>
                                <div class="mt-3">

                                    <label class="form-label">Upload Image</label>
                                    <div class="border-2 border-dashed dark:border-darkmode-400 rounded-md pt-4">
                                        <div class="fallback">
                                            <input name="picture" type="file" onchange="readURL(this);">
                                        </div>
                                        <script>
                                            function readURL(input) {
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
                                        <div class="dz-message" data-dz-message>
                                            <div class="text-lg font-medium">Drop files here or click to upload.</div>
                                        </div>
                                        <img id="blah" src="#" class=" rounded hidden" style="width: 250px;"/>

                                    </div>
                                    <div class="px-4 pb-4 flex items-center cursor-pointer relative">
                                    </div>
                                </div>
                                <input type="submit" class="btn btn-primary shadow-md mr-2"  >
                        </div>
                        </form>
                    </div>
                    <div  class="p-3 hidden" id="recentcomplainform">
                        <table class="table table-report sm:mt-2">
                            <thead>
                            <tr>
                                <th class="text-center whitespace-nowrap">Complain ID</th>
                                <th class="text-center whitespace-nowrap">Description</th>
                                <th class=" whitespace-nowrap">Picture</th>
                                <th class="text-center whitespace-nowrap"></th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($data as $req )
                                <tr class="text-center whitespace-nowrap">
                                    <td >{{$req->complain_id}}</td>
                                    <td>
                                        <a href="" class="">{{$req->description}}</a>
                                    </td>
                                    <td>
                                        <div class="intro-x w-8 h-8 image-fit ">
                                            <img alt="" data-action="zoom" class="rounded-full border border-white zoom-in tooltip" src="{{$req->picture}}" title="">
                                        </div>
                                    </td>
                                    <td class="table-report__action w-56">
{{--                                        <div class="flex justify-center items-center">--}}
{{--                                            <a class="flex items-center mr-3" href=""> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="check-square" data-lucide="check-square" class="lucide lucide-check-square w-4 h-4 mr-1"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"></path></svg> Edit </a>--}}
{{--                                            <a class="flex items-center text-danger" href=""> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="trash-2" data-lucide="trash-2" class="lucide lucide-trash-2 w-4 h-4 mr-1"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 01-2 2H7a2 2 0 01-2-2V6m3 0V4a2 2 0 012-2h4a2 2 0 012 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg> Delete </a>--}}
{{--                                        </div>--}}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>

                    <script>
                        document.getElementById("form").addEventListener("click",
                            function (){
                            document.querySelector("#recentcomplainform").style.display="none";
                            document.querySelector("#formm").style.display = "block";
                            });
                        document.getElementById("recentcomplain").addEventListener("click",
                            function (){
                            document.querySelector("#formm").style.display="none";
                            document.querySelector("#recentcomplainform").style.display="block";
                            });



                    </script>
                </div>
            </div>
        </div>


        <!-- END: Blog Layout -->
        <!-- BEGIN: Pagiantion -->
        <!-- END: Pagiantion -->
    </div>
</div>
<!-- END: Content -->


</div>
<!-- END: Post Content -->
<!-- BEGIN: Post Info -->

<!-- END: Post Info -->
</div>
</div>
<!-- END: Content -->
</div>
<!-- BEGIN: Dark Mode Switcher-->
@if(session('usertype') == 'admin')
    <div data-url="{{route('Requestmodule')}}" class="dark-mode-switcher cursor-pointer shadow-md fixed bottom-0 right-0 box border rounded-full w-40 h-12 flex items-center justify-center z-50 mb-10 mr-10">
        <div class="mr-4 text-slate-600 dark:text-slate-200">Admin</div>
        <div class="dark-mode-switcher__toggle dark-mode-switcher__toggle--active border"></div>
        <div class="mr-4 text-slate-600 dark:text-slate-200">User</div>
    </div>
@endif
<!-- END: Dark Mode Switcher-->
@endsection
