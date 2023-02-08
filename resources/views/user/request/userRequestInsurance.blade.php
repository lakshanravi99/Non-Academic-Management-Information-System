@extends('user.user_master')
@section('user')
    <div class="content">
        <!-- BEGIN: Top Bar -->
        <div class="top-bar">
            <!-- BEGIN: Breadcrumb -->
            <nav aria-label="breadcrumb" class="-intro-x mr-auto hidden sm:flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('UserRequestmodule')}}">Application</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Insurance Request </li>
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
                Insurance Requests
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
                        Add Request Form
                    </h2>

                </div>
                <div id="horizontal-form" class="p-3">
                    <div class="preview">

                        <form method="POST" action="storeRequestInsurance">
                            @csrf

                            <div class="form-inline mt-5">

                                <input type="hidden" name="emp_id" value="{{session('emp_id')}}">
                            </div>

                            <table>
                                <tr>
                                    <td>
                                        <label for="fname" class="form-label sm:w-200">Fullname
                                        </label>
                                    </td>
                                    <td>
                                        <input required type="text" id="fullname" name="fullname" value="" class="form-control" style="width: 200%"> </label><br><br>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label for="pp" class="form-label sm:w-20">Personal Address</label>
                                    </td>
                                    <td>
                                        <input required type="text" id="pp" name="personal_address" value="" class="form-control"><br><br>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label for="pp" class="form-label sm:w-200" class="form-control">Current position</label>
                                    </td>
                                    <td>
                                        <input required type="text" id="pp" name="position" value="" class="form-control"><br><br>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label for="pp" class="form-label sm:w-200">National Identity Card:</label>
                                    </td>
                                    <td>
                                        <input type="text" id="pp" name="nic" value="" class="form-control"><br><br>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label for="pp" class="form-label sm:w-200">Private Mobile
                                    <td>
                                        <input required type="text" pattern="[070][0-9]{9}" id="pp" name="mobile" value="" class="form-control"><br><br>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label for="pp" class="form-label sm:w-200">Office Telephone No:</label>
                                    </td>
                                    <td>
                                        <input required type="text" pattern="[041][0-9]{9}" id="pp" name="office_mobile" value="" class="form-control">

                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <label for="pp" class="form-label sm:w-200">Institute Name</label>
                                    </td>
                                    <td>
                                        <input type="text" id="pp" name="institute" value="" class="form-control">

                                    </td>
                                </tr>
                                <tr>
                                    <td >
                                        <label  for="pp" class="form-label sm:w-200">Official Address</label>
                                    </td>
                                    <td>
                                        <input  type="text" id="pp" name="official_address" value="" class="form-control">

                                    </td>
                                </tr>
                                <tr><td>
                                        <div class="form-inline mt-5">
                                            <label for="horizontal-form-2" class="form-label sm:w-200"> Insurance Scheme</label>
                                    </td><td>
                                        <div class="form-inline mt-5" style="width: 90px">
                                            <select name="insurance_scheme" id="status" class="form-select mt-2 sm:mr-2" aria-label="Default select example">
                                                <option class="text-danger">Silver</option>
                                                <option class="text-success">Gold</option>
                                            </select>
                                        </div>
                                    <td>
                    </div>
                    </tr>

                </div>
                </table>

                <div class="sm:ml-20 sm:pl-5 mt-5">
                    <input type="reset" class="btn btn-primary shadow-md mr-2"  value="Reset">
                    <input type="submit" class="btn btn-primary shadow-md mr-2"  >

                    </form>






                </div>



            </div>
        </div>
    </div>
    </div>

        <div id="settings" class="intro-y col-span-12 md:col-span-6 box hidden">

            <div class="intro-y box mt-3 " >

                <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400 ">
                    <h2 class="font-medium text-base mr-auto">
                        Edit Request Form
                    </h2>

                </div>
                <div id="horizontal-form" class="p-3">
                    <div class="preview">
                        @foreach($data as $req)


                            <form method="POST" action="{{route('editinsurance')}}">
                                @csrf


                                <table>
                                    <tr>
                                        <td>
                                            <label for="fname" class="form-label sm:w-200">Fullname
                                            </label>
                                        </td>
                                        <td>
                                            <input required type="text" id="fname" name="fullname" value="{{$req->fullname}}" class="form-control" style="width: 200%"> </label><br><br>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="pp" class="form-label sm:w-20">Personal Address</label>
                                        </td>
                                        <td>
                                            <input required type="text" id="pp" name="personal_address" value="{{$req->personal_address}}" class="form-control"><br><br>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="pp" class="form-label sm:w-200" class="form-control">Current position</label>
                                        </td>
                                        <td>
                                            <input required type="text" id="pp" name="position" value="{{$req->position}}" class="form-control"><br><br>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="pp" class="form-label sm:w-200">National Identity Card:</label>
                                        </td>
                                        <td>
                                            <input type="text" id="pp"  name="nic" value="{{$req->nic}}" class="form-control"><br><br>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="pp" class="form-label sm:w-200">Private Mobile
                                        <td>
                                            <input required type="tel" id="pp" pattern="[0][0-9]{9}" name="mobile" value="{{$req->mobile}}" class="form-control"><br><br>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="pp" class="form-label sm:w-200">Office Telephone No:</label>
                                        </td>
                                        <td>
                                            <input required type="text" pattern="[0][0-9]{9}" id="pp" name="office_mobile" value="{{$req->office_mobile}}" class="form-control">

                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <label for="pp" class="form-label sm:w-200">Institute Name</label>
                                        </td>
                                        <td>
                                            <input type="text" id="pp" name="institute" value="{{$req->institute}}" class="form-control">

                                        </td>
                                    </tr>
                                    <tr>
                                        <td >
                                            <label  for="pp" class="form-label sm:w-200">Official Address</label>
                                        </td>
                                        <td>
                                            <input  type="text" id="pp" name="official_address" value="{{$req->official_address}}" class="form-control">

                                        </td>
                                    </tr>
                                    <tr><td>
                                            <div class="form-inline mt-5">
                                                <label for="horizontal-form-2" class="form-label sm:w-200"> Insurance Scheme</label>
                                        </td><td>
                                            <div class="form-inline mt-5" style="width: 90px">
                                                <select name="insurance_scheme" id="status" class="form-select mt-2 sm:mr-2" aria-label="Default select example" value="{{$req->insurance_scheme}}">
                                                    <option class="text-danger">Silver</option>
                                                    <option class="text-success">Gold</option>
                                                </select>
                                            </div>
                                        <td>
                    </div>
                    </tr>

                </div>
                </table>

                <div class="sm:ml-20 sm:pl-5 mt-5">
                    <input type="reset" class="btn btn-primary shadow-md mr-2"  value="Reset">
                    <input type="submit" class="btn btn-primary shadow-md mr-2"   >
                    <a href="{{ url('deleterequestinsurance/' . $req->id) }}">
                    <input type="Remove" value="Remove" class="btn btn-danger shadow-md "   style="width: 10%;">
                    </a>

                    </form>
                </div>
            </div>
            @endforeach
        </div>
        </div>

    </div>

@endsection
