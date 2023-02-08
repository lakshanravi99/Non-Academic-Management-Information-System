@extends('user.user_master')
@section('user')
    <div class="content">
        <!-- BEGIN: Top Bar -->
        <div class="top-bar">
            <!-- BEGIN: Breadcrumb -->
            <nav aria-label="breadcrumb" class="-intro-x mr-auto hidden sm:flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('UserRequestmodule')}}">Application</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Transfer Request </li>
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
                Transfer Requests
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



                        <form method="POST" action="storeTransferRequest">
                            @csrf

                            <div class="form-inline mt-5">
                                <input type="hidden" name="emp_id" value="{{session('emp_id')}}">
                            </div>

                            <table>
                                <tr>
                                    <td>
                                        <label for="fname">
                                            Full Name</label>

                                    </td>
                                    <td>
                                        <input type="text" required class="form-control" id="fname" name="name" value=""> </label><br><br>

                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label for="address">Date of birth:</label>

                                    </td>
                                    <td>
                                        <input type="date" required class="form-control" id="address" name="dob" value=""></label><br><br>

                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label for="address">Permanent address:</label>
                                    </td>
                                    <td>
                                        <input type="text" required class="form-control" id="address" name="permenant_address" value=""></label><br><br>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label for="address">Temporary address:</label>

                                    </td>
                                    <td>
                                        <input type="text" required class="form-control" id="address" name="tempory_address" value=""></label><br><br>

                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label for="pp">Telephone number:

                                    </td>
                                    <td>
                                        <input type="text"   required class="form-control" id="pp" name="mobile" value=""></label><br><br>

                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-inline mt-5">
                                            <label for="horizontal-form-2" class="form-label sm:w-200"> Marital status</label>
                                    </td><td>
                                        <div class="form-inline mt-5" style="width: 150px">
                                            <select name="martial_status" id="status" class="form-select mt-2 sm:mr-2" aria-label="Default select example">
                                                <option class="text-">Unmarried</option>
                                                <option class="text-">Married</option>
                                            </select>
                                        </div>
                                    <td>
                                </tr>
                                <tr>
                                    <td>
                                        <label for="pp">Present position:

                                    </td>
                                    <td>
                                        <input type="text" required class="form-control" id="pp" name="present_position" value=""></label><br><br>

                                    </td>
                                </tr>
                                <tr>
                                    <td>Present position date of appointment</td>
                                    <td>
                                        <input type="date" required class="form-control" id="pp" name="Present_position_date_of_appointment" value=""></label>
                                    </td>
                                </tr>


                                <tr>
                                    <td>
                                        <label for="pp">Date confirmed in present post:

                                    </td>
                                    <td>
                                        <input type="date" required class="form-control" id="pp" name="Date_confirmed_in_present_post" value=""></label><br><br>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p>Information about current workplace</P>

                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <label for="pp">Name of the institution:
                                    </td>
                                    <td>
                                        <input type="text" required class="form-control" id="pp" name="name_of_current_working_institute" value=""></label><br><br>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <label for="pp">Faculty Or Branch of the Working:
                                    </td>
                                    <td>
                                        <input type="text" required class="form-control" id="pp" name="current_faculty" value=""></label><br><br>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p> Length of service at the above workplace(By the date of application)</p>

                                    </td>
                                    <td>Years
                                        <input style="width: 100px;" type="number" required class="form-control" id="pp" name="Length_of_service_years" value=""></label>
                                    </td>
                                    <td>Months
                                        <input style="width: 100px;" type="number" required class="form-control" id="pp" name="Length_of_service_months" value=""></label>
                                    </td>
                                    <td>Days
                                        <input style="width: 100px;" type="number" required class="form-control" id="pp" name="Length_of_service_days" value=""></label>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="4">
                                        <p style="color:white;">
                                            -------------------------------------------------------------------------------------------------------------------------
                                        </p>
                                    </td>

                                </tr>

                                <tr>
                                    <td>

                                        <label for="pp">Were you transferred to the above post on promotion or at your request or for any other reason:
                                    </td>
                                    <td>
                                        <input type="text" required class="form-control" id="pp" name="transfered_reason" value=""></label><br><br>
                                    </td>
                                </tr>

                                <tr>
                                    <td colspan="3">
                                        If you are married and your spouse/husband is engaged in service, please provide the following details
                                    </td>
                                </tr>


                                <tr>
                                    <td>
                                        <label for="pp">His/her current positions:

                                    </td>
                                    <td>
                                        <input type="text" class="form-control" id="pp" name="partner_position" value=""></label><br><br>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label for="pp">His/her present place of work:
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" id="pp" name="partners_place" value=""></label><br><br>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <label for="pp">Reason for Transfer:
                                    </td>
                                    <td>
                                        <input type="text" required class="form-control" id="pp" name="reason_for_transfer" value=""></label>
                                    </td>
                                </tr>

                                <tr>

                    </div>
                    </tr>

                </div>
                </table>



                <div class="sm:ml-20 sm:pl-5 mt-5">
                                <input type="reset" class="btn btn-primary shadow-md mr-2"  value="Reset">
                                <input type="submit" class="btn btn-primary shadow-md mr-2" value="NEXT" style="margin-left: 800px;" >

                            </div>
                    </div>
                    </form>


                </div>



            </div>
        </div>
        <div id="settings" class="intro-y col-span-12 md:col-span-6 box hidden">

            <table class="table table-report sm:mt-2 ">
                <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                    <h2 class="font-medium text-base mr-auto">
                        Edit Recent Requests
                    </h2>

                </div>
                <div id="horizontal-form" class="p-3">
                    <div class="preview">

            @foreach($data as $req)
                        <form method="POST" action="EditTransferRequest">
                            @csrf

                            <div class="form-inline mt-5">
                                <input type="hidden" name="emp_id" value="{{session('emp_id')}}">
                            </div>

                            <table>
                                <tr>
                                    <td>
                                        <label for="fname">
                                            Full Name</label>

                                    </td>
                                    <td>
                                        <input type="text" required class="form-control" id="fname" name="fname" value="{{$req->fname}}"> </label><br><br>

                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label for="address">Date of birth:</label>

                                    </td>
                                    <td>
                                        <input type="date" required class="form-control" id="address" name="dob" value="{{$req->dob}}"></label><br><br>

                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label for="address">Permanent address:</label>
                                    </td>
                                    <td>
                                        <input type="text" required class="form-control" id="address" name="permenant_address" value="{{$req->permenant_address}}"></label><br><br>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label for="address">Temporary address:</label>

                                    </td>
                                    <td>
                                        <input type="text" required class="form-control" id="address" name="tempory_address" value="{{$req->tempory_address}}"></label><br><br>

                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label for="pp">Telephone number:

                                    </td>
                                    <td>
                                        <input type="text" required class="form-control" id="pp" name="mobile" value="{{$req->mobile}}"></label><br><br>

                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-inline mt-5">
                                            <label for="horizontal-form-2" class="form-label sm:w-200"> Marital status</label>
                                    </td><td>
                                        <div class="form-inline mt-5" style="width: 150px">
                                            <select name="martial_status" id="status" class="form-select mt-2 sm:mr-2" aria-label="Default select example">
                                                <option class="text-">Unmarried</option>
                                                <option class="text-">Married</option>
                                            </select>
                                        </div>
                                    <td>
                                </tr>
                                <tr>
                                    <td>
                                        <label for="pp">Present position:

                                    </td>
                                    <td>
                                        <input type="text" required class="form-control" id="pp" name="present_position" value="{{$req->present_position}}"></label><br><br>

                                    </td>
                                </tr>
                                <tr>
                                    <td>Present position date of appointment</td>
                                    <td>
                                        <input type="date" required class="form-control" id="pp" name="Present_position_date_of_appointment" value="{{$req->Present_position_date_of_appointment}}"></label>
                                    </td>
                                </tr>


                                <tr>
                                    <td>
                                        <label for="pp">Date confirmed in present post:

                                    </td>
                                    <td>
                                        <input type="date" required class="form-control" id="pp" name="Date_confirmed_in_present_post" value="{{$req->Date_confirmed_in_present_post}}"></label><br><br>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p>Information about current workplace</P>

                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <label for="pp">Name of the institution:
                                    </td>
                                    <td>
                                        <input type="text" required class="form-control" id="pp" name="name_of_current_working_institute" value="{{$req->name_of_current_working_institute}}"></label><br><br>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <label for="pp">Faculty/Name of the Department of Study:
                                    </td>
                                    <td>
                                        <input type="text" required class="form-control" id="pp" name="current_faculty" value="{{$req->current_faculty}}"></label><br><br>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p> Length of service at the above workplace(By the date of application)</p>

                                    </td>
                                    <td>Years
                                        <input style="width: 100px;" type="number" required class="form-control" id="pp" name="Length_of_service_years" value="{{$req->Length_of_service_years}}"></label>
                                    </td>
                                    <td>Months
                                        <input style="width: 100px;" type="number" required class="form-control" id="pp" name="Length_of_service_months" value="{{$req->Length_of_service_months}}"></label>
                                    </td>
                                    <td>Days
                                        <input style="width: 100px;" type="number" required class="form-control" id="pp" name="Length_of_service_days" value="{{$req->Length_of_service_days}}"></label>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="4">
                                        <p style="color:white;">
                                            -------------------------------------------------------------------------------------------------------------------------
                                        </p>
                                    </td>

                                </tr>

                                <tr>
                                    <td>

                                        <label for="pp">Were you transferred to the above post on promotion or at your request or for any other reason:
                                    </td>
                                    <td>
                                        <input type="text" required class="form-control" id="pp" name="transfered_reason" value="{{$req->transfered_reason}}"></label><br><br>
                                    </td>
                                </tr>

                                <tr>
                                    <td colspan="3">
                                        If you are married and your spouse/husband is engaged in service, please provide the following details
                                    </td>
                                </tr>


                                <tr>
                                    <td>
                                        <label for="pp">His/her current positions:

                                    </td>
                                    <td>
                                        <input type="text" class="form-control" id="pp" name="partner_position" value="{{$req->partner_position}}"></label><br><br>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label for="pp">His/her present place of work:
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" id="pp" name="partners_place" value="{{$req->partners_place}}"></label><br><br>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <label for="pp">Reason for Transfer:
                                    </td>
                                    <td>
                                        <input type="text" required class="form-control" id="pp" name="reason_for_transfer" value="{{$req->reason_for_transfer}}"></label>
                                    </td>
                                </tr>

                                <tr>

                    </div>
                    </tr>

                </div>
            </table>



            <div class="sm:ml-20 sm:pl-5 mt-5">
{{--                <input type="reset" class="btn btn-primary shadow-md mr-2"  value="Reset">--}}
                <input type="submit" class="btn btn-primary shadow-md mr-2" value="NEXT" style="margin-left: 800px;" >

            </div>
        </div>
    </form>

    </div>
    </form>


    </tbody>
            </table>
    @endforeach
        </div>

    </div>

@endsection
