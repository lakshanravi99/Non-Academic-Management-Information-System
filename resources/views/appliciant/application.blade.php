
@extends('appliciant.appliciant_master_custom')

@section('admin')


    <style>

        button:hover {
            opacity: 0.8;
        }

        /* Make circles that indicate the steps of the form: */
        .step {
            height: 15px;
            width: 15px;
            margin: 0 2px;
            background-color: blue;
            border: none;
            border-radius: 50%;
            display: inline-block;
            opacity: 0.5;
        }

        .step.active {
            opacity: 1;
        }

        /* Mark the steps that are finished and valid: */
        .step.finish {
            background-color: #04AA6D;
        }

        /* picture */
        .profile-pic-div{
            height: 200px;
            width: 200px;
            transform: translate(0%,0%);
            border-radius: 50%;
            overflow: hidden;
            border: 1px solid grey;
        }

        #photo{
            height: 100%;
            width: 100%;
        }

        #file{
            display: none;
        }

        #uploadBtn{
            height: 25%;
            width: 100%;
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            text-align: center;
            background: rgba(0, 0, 0, 0.7);
            color: wheat;
            line-height: 30px;
            font-family: sans-serif;
            font-size: 15px;
            cursor: pointer;
            display: none;
        }
    </style>


    <div class="content">
        @include('appliciant.body.topbar',[ 'title' => "Application 2"])

        <div id="popup-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 md:inset-0 h-modal md:h-full">
            <div class="relative p-4 w-full max-w-md h-full md:h-auto">
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-body p-0">
                                <div class="p-5 text-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="check-circle" data-lucide="check-circle" class="lucide lucide-check-circle w-16 h-16 text-success mx-auto mt-3"><path d="M22 11.08V12a10 10 0 11-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
                                    <div class="text-3xl mt-5">Success!</div>
                                    <div class="text-slate-500 mt-2">Your Basic details submited!</div>
                                </div>
                                <a href="{{url('appliciant/application2')}}" class="px-5 pb-8 text-center"> <button type="button" id="ok" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Ok</button> </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- BEGIN: Top Bar -->

        <!-- END: Top Bar -->
        <div class="grid grid-cols-12 ">
            <div class="col-span-12 ">

                <!-- Start Application -->
                <div>
                    <div class="intro-y box">
                        @csrf


                        <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                            <h2 class="font-medium text-base mr-auto">රුහුණ විශ්ව විද්‍යාලය - ශී ලංකාව {{$desig_name}}({{$desig_id}}) තනතුර සදහා අයදුම් පත්‍රය</h2>
                            <input type="hidden"  id="desig_id" value="{{$desig_id}}">
                            <input type="hidden"  name="user_id" value="{}">
                        </div>
                        <form id="form1">
                            <div class="hidden flex p-4 mb-4 bg-red-100 rounded-lg dark:bg-red-200" id="alert_danger_application" role="alert">
                                <svg aria-hidden="true" class="flex-shrink-0 w-5 h-5 text-red-700 dark:text-red-800" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                                <span class="sr-only">Info</span>
                                <div class="ml-3 text-sm font-medium text-red-700 dark:text-red-800" id="alert_danger_application_des">

                                </div>
                                <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-red-100 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex h-8 w-8 dark:bg-red-200 dark:text-red-600 dark:hover:bg-red-300" data-dismiss-target="#alert_danger_application" aria-label="Close">
                                    <span class="sr-only">Close</span>
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                </button>
                            </div>

                            <div class="p-5" id="input">
                                <!-- Tab 1 -->
                                <div class="tab" id="tab1">
                                    <div class="mb-6">
                                        <div class="grid grid-cols-12 gap-4">
                                            <div class="col-span-6">
                                                <div class="profile-pic-div">
                                                    <img src="image.jpg" id="photo">
                                                    <input type="file" id="file">
                                                    <label for="file" id="uploadBtn">Choose Photo</label>
                                                </div>
                                                <label class="caption block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400"  style="width:118px;" for="regular-form-2">චායාරූපය<br>Your Photo</label>
                                            </div>
                                            <div class="col-span-6">
                                                <div>
                                                    <label class="caption block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400"  style="width:118px;" for="regular-form-2">මයා/මිය/මෙනවිය<br>Mr/Mis/Misis</label>
                                                    <select class="field bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 col-span-6" name="gender" id="gender">
                                                        <option value="" selected disabled hidden>Choose here</option>
                                                        <option value="mr">
                                                            මයා/Mr
                                                        </option>
                                                        <option value="mrs">
                                                            මිය/Mrs
                                                        </option>
                                                        <option value="miss">
                                                            මෙනවිය/Misis
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="initial_div mb-6">
                                        <label class="caption initial block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400" for="regular-form-2">මුලකුරු<br>Initial</label>
                                        <input class="field bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="initial" name="initial" placeholder="Initial" type="text">
                                    </div>
                                    <div class="mb-6">
                                        <label class="caption block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400" for="regular-form-2">නම<br>Name</label>
                                        <div class="grid grid-cols-12 gap-4">
                                            <input aria-label="default input inline 1" class="field bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 col-span-4" id="fname" name="fname" placeholder="First Name" type="text">
                                            <input aria-label="default input inline 2" class="field bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 col-span-4" id="mname" name="mname" placeholder="Middle Name" type="text">
                                            <input aria-label="default input inline 3" class="field bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 col-span-4" id="lname" name="lname" placeholder="Last Name" type="text">
                                        </div>
                                        <div class="grid grid-cols-12 gap-4">
                                        </div>
                                    </div>
                                    <div class="mb-6">
                                        <label class="caption block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400" for="regular-form-2">මුලකුරු වලින් හැදින්වෙන නම<br> Name given by Initials</label>
                                        <textarea id="initial_name" name="initial_name" rows="3" class="field block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Name given by initials"></textarea>
                                    </div>
                                    <div class="mb-6">
                                        <label class="caption block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400" for="regular-form-2">දැනට පදිංචි ලිපිනය<br>
                                            Current Address</label>
                                        <div class="grid grid-cols-12 gap-4">
                                            <input aria-label="default input inline 1" class="field3 field3_1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 col-span-4" value1="cal1" name="current_address_line1" id="current_address_line1" placeholder="Address Line 1" type="text">
                                            <input aria-label="default input inline 2" class="field3 field3_2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 col-span-4" value1="cal2" name="current_address_line2" id="current_address_line2" placeholder="Address Line 2" type="text">
                                            <input aria-label="default input inline 3" class="field3 field3_3 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 col-span-4" value1="cal3" name="current_address_line3" id="current_address_line3" placeholder="Address Line 3" type="text">
                                        </div>
                                        <div class="grid grid-cols-12 gap-4">
                                            <div class="col-span-4 gap-4" id="cal1"></div>
                                            <div class="col-span-4 gap-4" id="cal2"></div>
                                            <div class="col-span-4 gap-4" id="cal3"></div>
                                        </div>
                                    </div>
                                    <div class="mb-6">
                                        <label class="field caption block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400" for="regular-form-2">ස්ථිර ලිපිනය<br>Permenrnt Address</label>
                                        <div class="grid grid-cols-12 gap-4">
                                            <input aria-label="default input inline 1" class="field3 field3_1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 col-span-4" value1="pal1" name="permenent_address_line1" id="permenent_address_line1" placeholder="Address Line 1" type="text">
                                            <input aria-label="default input inline 2" class="field3 field3_2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 col-span-4" value1="pal2" name="permenent_address_line2" id="permenent_address_line2" placeholder="Address Line 2" type="text">
                                            <input aria-label="default input inline 3" class="field3 field3_3 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 col-span-4" value1="pal3" name="permenent_address_line3" id="permenent_address_line3" placeholder="Address Line 3" type="text">
                                        </div>
                                        <div class="grid grid-cols-12 gap-4">
                                            <div class="col-span-4 gap-4" id="pal1"></div>
                                            <div class="col-span-4 gap-4" id="pal2"></div>
                                            <div class="col-span-4 gap-4" id="pal3"></div>
                                        </div>
                                    </div>
                                    <div class="mb-6">
                                        <div class="grid grid-cols-12 gap-4">
                                            <div class="col-span-4">
                                                <label id="htn2" class="caption block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400" for="regular-form-2">ජංගම දුරකථන අංකය<br>Mobile phone Number</label>
                                                <input aria-label="default input inline 1" class="field3s bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 col-span-4" value1="htn" value2="htn2" name="current_mobile" id="current_mobile" placeholder="Home phone Number" type="text">
                                                <div class="col-span-4 gap-4" id="htn"></div>
                                            </div>
                                            <div class="col-span-4">
                                                <label id="mpn2" class="caption block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400" for="">ගෘහස්ථ දුරකථන අංකය<br>Home phone Number</label>
                                                <input aria-label="default input inline 2" class="field3s bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 col-span-4" value1="mpn" value2="mpn2" name="permenant_mobile" id="permenant_mobile" placeholder="Mobile phone Number" type="text">
                                                <div class="col-span-4 gap-4" id="mpn"></div>
                                            </div>
                                            <div class="col-span-4">
                                                <label class="caption block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400" for="regular-form-2">විද්‍යුත් තැපැල් ලිපිනය<br>Email Address</label>
                                                <select class="field bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 col-span-4" id="email" name="email" required="">
                                                    <option value="{{session('temp_user_email')}}">
                                                        {{session('temp_user_email')}}
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-6">
                                        <div class="grid grid-cols-12 gap-4">
                                            <div class="col-span-6">
                                                <label id="nic2" class="caption block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300" for="">ජාතික හැදුනුම්පත් අංකය<br>National Identity Card Number</label>
                                                <input class="field3s bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 col-span-6" id="nic" value1="nic1" value2="nic2" name="nic" placeholder="National Identity Card Number" type="text">
                                                <div class="col-span-4 gap-4" id="nic1"></div>
                                            </div>
                                            <div class="col-span-6">
                                                <label id="ctz2" class="caption block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300" for="">පුරවැසි භාවය<br>Citizenship</label>
                                                <select class="field3s bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 col-span-6" id="citizenship" value1="ctz1" value2="ctz2" name="citizenship" required="">
                                                    <option value="" hidden>Choose here</option>
                                                    <option value="by Decent">
                                                        පෙළපතිනි/By Decent
                                                    </option>
                                                    <option value="by registration">
                                                        ලියාපදිංචි වීමෙනි/By Registration
                                                    </option>
                                                </select>
                                                <div class="col-span-4 gap-4" id="ctz1"></div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="mb-6">
                                        <label class="caption block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300" for="regular-form-2">පොලිස් කොට්ඨාශය<br>Police Devision</label>
                                        <input class="field bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="police_division" name="police_division" placeholder="Police Devision" type="text">
                                        <div class="col-span-4 gap-4" id="pd1"></div>
                                    </div>
                                </div>

                                <!-- End tab1 -->


                                <!-- Start tab2 -->
                                <div class="hidden tab" id="tab2">
                                    <div class="mb-6">
                                        <div class="grid grid-cols-12 gap-4">
                                            <div class="col-span-6">
                                                <label id="dob2" class="caption block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300" for="regular-form-2">උපන් දිනය<br>Date of Birth</label>
                                                <input aria-label="default input inline 1" name="dob" id="dob" class="field3s bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 col-span-6" value1="dob1" value2="dob2" placeholder="Date of Birth" type="date">
                                                <div class="col-span-4 gap-4" id="dob1"></div>
                                            </div>
                                            <div class="col-span-6">
                                                <label id="civil2" class="caption block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300" for="regular-form-2">විවාහක/අවිවාහක බව<br>Marital Status</label>
                                                <select class="field3s bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 col-span-6" value1="civil1" value2="civil2" id="civil_status" name="civil_status" required="">
                                                    <option value="" hidden>Choose here</option>
                                                    <option value="unmarried">
                                                        අවිවාහක/Unmarried
                                                    </option>
                                                    <option value="married">
                                                        විවාහක/Married
                                                    </option>
                                                </select>
                                                <div class="col-span-4 gap-4" id="civil1"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-6">
                                        <div>
                                            <label class="caption_aacd block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300" for="regular-form-2">අයදුම්පත් භාරගන්නා අවසාන දිනට වයස<br>Age as at Closing date</label>
                                        </div>
                                        <div class="grid grid-cols-12 gap-4">
                                            <div class="col-span-4">
                                                <label id="age_years2" class="caption block mb-2 text-sm font-medium text-gray-600 dark:text-gray-300" for="regular-form-2">අවුරුදු<br>Years</label>
                                                <input aria-label="default input inline 1" class="field3s bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 col-span-3" value1="age_years1" value2="age_years2" name="age_years" id="age_years" placeholder="Years" type="number">
                                                <div class="col-span-4 gap-4" id="age_years1"></div>
                                            </div>
                                            <div class="col-span-4">
                                                <label id="age_months2" class="caption block mb-2 text-sm font-medium text-gray-600 dark:text-gray-300" for="regular-form-2">මාස<br>Months</label>
                                                <input aria-label="default input inline 2" class="field3s bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 col-span-3" value1="age_months1" value2="age_months2" name="age_months" id="age_months" placeholder="Months" type="number">
                                                <div class="col-span-4 gap-4" id="age_months1"></div>
                                            </div>
                                            <div class="col-span-4">
                                                <label id="age_days2" class="caption block mb-2 text-sm font-medium text-gray-600 dark:text-gray-300" for="regular-form-2">දින<br>Days</label>
                                                <input aria-label="default input inline 2" class="field3s bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 col-span-3" value1="age_days1" value2="age_days2" name="age_days" id="age_days" placeholder="Days" type="number">
                                                <div class="col-span-4 gap-4" id="age_days1"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-6">
                                        <label for="message" class="caption block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">ක්‍රීඩා කුසලතා වෙනත් සුදුසුකම්<br>Sport Activity & Other Qualifications</label>
                                        <textarea id="sport_activity" name="sport_activity" rows="4" class="field block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Sport Activity & Other Qualifications..."></textarea>
                                    </div>

                                    <div class="mb-6">
                                        <label class="caption block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300" for="regular-form-2">කවර හෝ චෝදනාවක් සඳහා ඔබ කවර කලකදී හෝ උසාවියකදී වැරදිකරු වී තිබේද?<br>How you ever been found guilty in a court of low at any time for any charges?</label>
                                        <select class="field bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 col-span-6" id="guilty_status" name="guilty_status" required="">
                                            <option value=""hidden>Choose here</option>
                                            <option value="yes">
                                                ඔව්/Yes
                                            </option>
                                            <option value="no">
                                                නැත/No
                                            </option>
                                        </select>
                                    </div>
                                    <div class="mb-6">
                                        <label for="message" class="caption block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">ඔව් නම් ඒ පිළීඹඳ විස්තර සපයන්න<br>If yes, state particulars</label>
                                        <textarea id="guilty_description" name="guilty_description" rows="4" class="field block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="If yes, state particulars..."></textarea>
                                    </div>

                                    <div class="rounded-lg border border-gray-300" style="padding:15px;">
                                        <div class="mb-6">
                                            <div class="form-help">
                                                විනයාරක්ෂක, ආරක්ෂක සේවා සහ රියදුරු තනතුරු සඳහා ඉල්ලුම් කරන අය සඳහා පමණි.<br>
                                                Only for those applying for Disciplinary, Security Services and Driver posts.
                                            </div>
                                            <div class="grid grid-cols-12 gap-4">
                                                <div class="col-span-6">
                                                    <label class="caption block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300" for="regular-form-2">රියදුරු බලපත්‍ර අංකය<br>Driving Licence Number</label>
                                                    <input aria-label="default input inline 1" class="field bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 col-span-6" name="driving_licence_no" id="driving_licence_no" placeholder="Driving Licence Number" type="text">
                                                </div>
                                                <div class="col-span-6">
                                                    <label class="caption block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300" for="regular-form-2">රියදුරු බලපත්‍රය නිකුත් කළ දිනය<br>Driving Licence Issuied Date</label>
                                                    <input aria-label="default input inline 1" class="field bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 col-span-6" name="driving_licence_issuied_date" id="driving_licence_issuied_date" type="date">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-6">
                                            <div>
                                                <label class="caption block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300" for="regular-form-2">ශාරීරික යෝග්‍යතාව<br>Physical Fitness</label>
                                            </div>
                                            <div class="grid grid-cols-12 gap-4">
                                                <div class="col-span-6 gap-4">
                                                    <label class="caption block mb-2 text-sm font-medium text-gray-600 dark:text-gray-300" for="regular-form-2">උස<br>Height</label>
                                                    <div class="col-span-6 flex gap-4">
                                                        <div class="col-span-3 flex">
                                                            <input aria-label="default input inline 1" class="field bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 col-span-3" id="height_feets" name="height_feets" placeholder="Feets" type="number">
                                                        </div>
                                                        <div class="col-span-3 flex">
                                                            <input aria-label="default input inline 1" class="field bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 col-span-3" id="height_inches" name="height_inches" placeholder="Inches" type="number">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-span-6 gap-4">
                                                    <label class="caption block mb-2 text-sm font-medium text-gray-600 dark:text-gray-300" for="regular-form-2">පපුව<br>Chest</label>
                                                    <div class="col-span-12">
                                                        <div class="flex">
                                                            <input aria-label="default input inline 2" class="field bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 col-span-3" name="chest" id="chest" placeholder="Inches" type="number">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End tab2 -->

                                <!-- buttons -->
                                <div style="overflow:auto;">
                                    <div style="float:right;">

                                        <button type="button" class="btn btn-secondary hidden" id="prevbtn">Previous</button>

                                        <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" id="nextbtn">
                                            Next
                                            <svg aria-hidden="true" class="ml-2 -mr-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                        </button>

                                    </div>
                                </div>
                        </form>
                        <!-- Circles which indicates the steps of the form: -->
                        <div style="text-align:center;margin-top:40px;">
                            <span class="step"></span>
                            <span class="step"></span>
                        </div>
                    </div>

                    <!-- END: Input -->

                </div>

            </div>
            <!-- End Application -->


        </div>




    </div>
    </div>

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
    <!-- <script src="https://maps.googleapis.com/maps/api/js?key=["your-google-map-api"]&libraries=places"></script> -->
    <!-- <script src=" {{asset('dist/js/app.js')}} "></script> -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="https://js.pusher.com/7.1/pusher.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.7/jquery.inputmask.min.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
    <script src="https://unpkg.com/flowbite@1.4.7/dist/flowbite.js"></script>

    <script>
        $(document).ready(function(){
            $('#current_mobile').inputmask("0999999999");
            $('#permenant_mobile').inputmask("0999999999");

            $('#myform').validate({
                rules: {
                    current_mobile: {
                        phoneUS: true,
                        required: true
                    }
                },
                submitHandler: function(form) {
                    alert('valid form');
                    return false;
                }
            });

            //Start Auto verify
            $(document).on('change','.field', function (e) {

                if($(this).val()){
                    $(this).closest(".mb-6").find(".warning").html("");
                    $(this).removeClass('bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 dark:bg-red-100 dark:border-red-400');
                    $(this).addClass('bg-green-50 border border-green-500 text-green-900 placeholder-green-700 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-green-100 dark:border-green-400');
                    $(this).closest(".mb-6").find(".caption").removeClass('text-red-600 dark:text-red-500');
                    $(this).closest(".mb-6").find(".caption").addClass('block mb-2 text-sm font-medium text-green-700 dark:text-green-500');
                }
                // if(!$(this).val()){
                //     $(this).closest(".mb-6").find(".warning").html("");
                //     $(this).removeClass('bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 dark:bg-red-100 dark:border-red-400');
                //     $(this).addClass('bg-green-50 border border-green-500 text-green-900 placeholder-green-700 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-green-100 dark:border-green-400');
                //     $(this).closest(".mb-6").find(".caption").removeClass('text-red-600 dark:text-red-500');
                //     $(this).closest(".mb-6").find(".caption").addClass('block mb-2 text-sm font-medium text-green-700 dark:text-green-500');
                // }

            });
            $(document).on('change','.field3', function (e) {

                var id = this.getAttribute('value1');
                if($(this).val()){
                    $(this).closest(".mb-6").find('#'+id+'').html("");
                    $(this).removeClass('bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 dark:bg-red-100 dark:border-red-400');
                    $(this).addClass('bg-green-50 border border-green-500 text-green-900 placeholder-green-700 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-green-100 dark:border-green-400');

                    if($(this).closest(".mb-6").find('.field3_1').val() && $(this).closest(".mb-6").find('.field3_2').val()){
                        $(this).closest(".mb-6").find('.caption').removeClass('text-red-600 dark:text-red-500');
                        $(this).closest(".mb-6").find('.caption').addClass('block mb-2 text-sm font-medium text-green-700 dark:text-green-500');
                    }
                }

            });

            $(document).on('change','.field3s', function (e) {

                var id = this.getAttribute('value1');
                var id2 = this.getAttribute('value2');
                if($(this).val()){
                    $(this).closest(".mb-6").find('#'+id+'').html("");
                    $(this).removeClass('bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 dark:bg-red-100 dark:border-red-400');
                    $(this).addClass('bg-green-50 border border-green-500 text-green-900 placeholder-green-700 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-green-100 dark:border-green-400');
                    $('#'+id2+'').removeClass('text-red-600 dark:text-red-500');
                    $('#'+id2+'').addClass('block mb-2 text-sm font-medium text-green-700 dark:text-green-500');

                    // if($(this).closest(".mb-6").find('.field3_1').val() && $(this).closest(".mb-6").find('.field3_2').val()){
                    //     $(this).closest(".mb-6").find('.caption').removeClass('text-red-600 dark:text-red-500');
                    //     $(this).closest(".mb-6").find('.caption').addClass('block mb-2 text-sm font-medium text-green-700 dark:text-green-500');
                    // }
                }

            });
            //End Auto verify

            //start click next
            $(document).on('click','#nextbtn', function (e) {
                e.preventDefault();
                $('.warning').html("");
                console.log("start-----------");
                var x=0;

                if(!$('#gender').val()){
                    $('#gender').removeClass('bg-gray-50 border border-gray-300 text-gray-900 placeholder-gray-400 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600');
                    $('#gender').removeClass('bg-green-50 border border-green-500');
                    $('#gender').addClass('bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 dark:bg-red-100 dark:border-red-400');
                    $('#gender').closest(".mb-6").find(".caption").addClass('text-red-600 dark:text-red-500');
                    $('#gender').closest(".mb-6").append('<p class="warning mt-2 text-sm text-red-600 dark:text-red-500">This field is Required!</p>');
                    x=1;
                    console.log("gender");
                }
                if(!$('#initial').val()){
                    $('#initial').removeClass('bg-gray-50 border border-gray-300 text-gray-900 placeholder-gray-400 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600');
                    $('#initial').removeClass('bg-green-50 border border-green-500');
                    $('#initial').addClass('bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 dark:bg-red-100 dark:border-red-400');
                    $('#initial').closest(".mb-6").find(".caption").addClass('text-red-600 dark:text-red-500');
                    $('#initial').closest(".mb-6").append('<p class="warning mt-2 text-sm text-red-600 dark:text-red-500">This field is Required!</p>');
                    x=1;
                    console.log("initial");
                }
                if(!$('#fname').val()){
                    $('#fname').removeClass('bg-gray-50 border border-gray-300 text-gray-900 placeholder-gray-400 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600');
                    $('#fname').removeClass('bg-green-50 border border-green-500');
                    $('#fname').addClass('bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 dark:bg-red-100 dark:border-red-400');
                    $('#fname').closest(".mb-6").find(".caption").addClass('text-red-600 dark:text-red-500');
                    $('#fname').closest(".mb-6").append('<p class="warning mt-2 text-sm text-red-600 dark:text-red-500">This field is Required!</p>');
                    x=1;
                    console.log("fname");
                }
                if(!$('#initial_name').val()){
                    $('#initial_name').removeClass('bg-gray-50 border border-gray-300 text-gray-900 placeholder-gray-400 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600');
                    $('#initial_name').removeClass('bg-green-50 border border-green-500');
                    $('#initial_name').addClass('bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 dark:bg-red-100 dark:border-red-400');
                    $('#initial_name').closest(".mb-6").find(".caption").addClass('text-red-600 dark:text-red-500');
                    $('#initial_name').closest(".mb-6").append('<p class="warning mt-2 text-sm text-red-600 dark:text-red-500">This field is Required!</p>');
                    x=1;
                    console.log("initial_name");
                }
                if(!$('#current_address_line1').val()){
                    $('#current_address_line1').removeClass('bg-gray-50 border border-gray-300 text-gray-900 placeholder-gray-400 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600');
                    $('#current_address_line1').removeClass('bg-green-50 border border-green-500');
                    $('#current_address_line1').addClass('bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 dark:bg-red-100 dark:border-red-400');
                    $('#current_address_line1').closest(".mb-6").find(".caption").addClass('text-red-600 dark:text-red-500');
                    $('#current_address_line1').closest(".mb-6").find('#cal1').append('<p class="warning mt-2 text-sm text-red-600 dark:text-red-500">This field is Required!</p>');
                    x=1;
                    console.log("ca1");
                }
                if(!$('#current_address_line2').val()){
                    $('#current_address_line2').removeClass('bg-gray-50 border border-gray-300 text-gray-900 placeholder-gray-400 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600');
                    $('#current_address_line2').removeClass('bg-green-50 border border-green-500');
                    $('#current_address_line2').addClass('bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 dark:bg-red-100 dark:border-red-400');
                    $('#current_address_line2').closest(".mb-6").find(".caption").addClass('text-red-600 dark:text-red-500');
                    $('#current_address_line2').closest(".mb-6").find('#cal2').append('<p class="warning mt-2 text-sm text-red-600 dark:text-red-500">This field is Required!</p>');
                    x=1;
                    console.log("ca2");
                }
                if(!$('#permenent_address_line1').val()){
                    $('#permenent_address_line1').removeClass('bg-gray-50 border border-gray-300 text-gray-900 placeholder-gray-400 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600');
                    $('#permenent_address_line1').removeClass('bg-green-50 border border-green-500');
                    $('#permenent_address_line1').addClass('bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 dark:bg-red-100 dark:border-red-400');
                    $('#permenent_address_line1').closest(".mb-6").find(".caption").addClass('text-red-600 dark:text-red-500');
                    $('#permenent_address_line1').closest(".mb-6").find('#pal1').append('<p class="warning mt-2 text-sm text-red-600 dark:text-red-500">This field is Required!</p>');
                    x=1;
                    console.log("pa1");
                }
                if(!$('#permenent_address_line2').val()){
                    $('#permenent_address_line2').removeClass('bg-gray-50 border border-gray-300 text-gray-900 placeholder-gray-400 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600');
                    $('#permenent_address_line2').removeClass('bg-green-50 border border-green-500');
                    $('#permenent_address_line2').addClass('bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 dark:bg-red-100 dark:border-red-400');
                    $('#permenent_address_line2').closest(".mb-6").find(".caption").addClass('text-red-600 dark:text-red-500');
                    $('#permenent_address_line2').closest(".mb-6").find('#pal2').append('<p class="warning mt-2 text-sm text-red-600 dark:text-red-500">This field is Required!</p>');
                    x=1;
                    console.log("pa2");
                }
                if(!$('#current_mobile').val()){
                    $('#current_mobile').removeClass('bg-gray-50 border border-gray-300 text-gray-900 placeholder-gray-400 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600');
                    $('#current_mobile').removeClass('bg-green-50 border border-green-500');
                    $('#current_mobile').addClass('bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 dark:bg-red-100 dark:border-red-400');
                    $('#htn2').addClass('text-red-600 dark:text-red-500');
                    $('#current_mobile').closest(".mb-6").find('#htn').append('<p class="warning mt-2 text-sm text-red-600 dark:text-red-500">This field is Required!</p>');
                    x=1;
                    console.log("C-mobile");
                }
                if(!$('#permenant_mobile').val()){
                    $('#permenant_mobile').removeClass('bg-gray-50 border border-gray-300 text-gray-900 placeholder-gray-400 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600');
                    $('#permenant_mobile').removeClass('bg-green-50 border border-green-500');
                    $('#permenant_mobile').addClass('bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 dark:bg-red-100 dark:border-red-400');
                    $('#mpn2') .addClass('text-red-600 dark:text-red-500');
                    $('#permenant_mobile').closest(".mb-6").find('#mpn').append('<p class="warning mt-2 text-sm text-red-600 dark:text-red-500">This field is Required!</p>');
                    x=1;
                    console.log("p_mobile");
                }
                if(!$('#nic').val()){
                    $('#nic').removeClass('bg-gray-50 border border-gray-300 text-gray-900 placeholder-gray-400 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600');
                    $('#nic').removeClass('bg-green-50 border border-green-500');
                    $('#nic').addClass('bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 dark:bg-red-100 dark:border-red-400');
                    $('#nic2').addClass('text-red-600 dark:text-red-500');
                    $('#nic').closest(".mb-6").find('#nic1').append('<p class="warning mt-2 text-sm text-red-600 dark:text-red-500">This field is Required!</p>');
                    x=1;
                    console.log("nic");
                }
                if(!$('#citizenship').val()){
                    $('#citizenship').removeClass('bg-gray-50 border border-gray-300 text-gray-900 placeholder-gray-400 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600');
                    $('#citizenship').removeClass('bg-green-50 border border-green-500');
                    $('#citizenship').addClass('bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 dark:bg-red-100 dark:border-red-400');
                    $('#ctz2').addClass('text-red-600 dark:text-red-500');
                    $('#citizenship').closest(".mb-6").find('#ctz1').append('<p class="warning mt-2 text-sm text-red-600 dark:text-red-500">This field is Required!</p>');
                    x=1;
                    console.log("ctz");
                }
                if(!$('#police_division').val()){
                    $('#police_division').removeClass('bg-gray-50 border border-gray-300 text-gray-900 placeholder-gray-400 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600');
                    $('#police_division').removeClass('bg-green-50 border border-green-500');
                    $('#police_division').addClass('bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 dark:bg-red-100 dark:border-red-400');
                    $('#police_division').closest(".mb-6").find(".caption").addClass('text-red-600 dark:text-red-500');
                    $('#police_division').closest(".mb-6").find('#pd1').append('<p class="warning mt-2 text-sm text-red-600 dark:text-red-500">This field is Required!</p>');
                    x=1;
                    console.log("police");
                }
                // if(!$('#dob').val()){
                //     $('#dob').removeClass('bg-gray-50 border border-gray-300 text-gray-900 placeholder-gray-400 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600');
                //     $('#dob').removeClass('bg-green-50 border border-green-500');
                //     $('#dob').addClass('bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 dark:bg-red-100 dark:border-red-400');
                //     $('#dob2').addClass('text-red-600 dark:text-red-500');
                //     $('#dob').closest(".mb-6").find('#dob1').append('<p class="warning mt-2 text-sm text-red-600 dark:text-red-500">This field is Required!</p>');
                //     x=1;
                //     console.log("dob");
                // }

                if(x==0){
                    console.log("in else");

                    $('#tab1').addClass('hidden');
                    $('#tab2').removeClass('hidden');
                    $('#prevbtn').removeClass('hidden');
                    //$('#nextbtn').text('Add');
                    $('#nextbtn').addClass('submit_basic');
                }

            });
            //End click next

            //start submit basic
            $(document).on('click','.submit_basic', function (e) {
                e.preventDefault();
                $('.warning').html("");
                console.log("start-----------");
                var y=0;

                if(!$('#dob').val()){
                    $('#dob').removeClass('bg-gray-50 border border-gray-300 text-gray-900 placeholder-gray-400 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600');
                    $('#dob').removeClass('bg-green-50 border border-green-500');
                    $('#dob').addClass('bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 dark:bg-red-100 dark:border-red-400');
                    $('#dob2').addClass('text-red-600 dark:text-red-500');
                    $('#dob').closest(".mb-6").find('#dob1').append('<p class="warning mt-2 text-sm text-red-600 dark:text-red-500">This field is Required!</p>');
                    y=1;
                    console.log("dob");
                }
                if(!$('#civil_status').val()){
                    $('#civil_status').removeClass('bg-gray-50 border border-gray-300 text-gray-900 placeholder-gray-400 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600');
                    $('#civil_status').removeClass('bg-green-50 border border-green-500');
                    $('#civil_status').addClass('bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 dark:bg-red-100 dark:border-red-400');
                    $('#civil2').addClass('text-red-600 dark:text-red-500');
                    $('#civil_status').closest(".mb-6").find('#civil1').append('<p class="warning mt-2 text-sm text-red-600 dark:text-red-500">This field is Required!</p>');
                    y=1;
                    console.log("cvil");
                }
                if(!$('#age_years').val()){
                    $('#age_years').removeClass('bg-gray-50 border border-gray-300 text-gray-900 placeholder-gray-400 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600');
                    $('#age_years').removeClass('bg-green-50 border border-green-500');
                    $('#age_years').addClass('bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 dark:bg-red-100 dark:border-red-400');
                    $('#age_years2').addClass('text-red-600 dark:text-red-500');
                    $('.caption_aacd').addClass('text-red-600 dark:text-red-500');
                    $('#age_years').closest(".mb-6").find('#age_years1').append('<p class="warning mt-2 text-sm text-red-600 dark:text-red-500">This field is Required!</p>');
                    y=1;
                    console.log("age_years");
                }
                if(!$('#age_months').val()){
                    $('#age_months').removeClass('bg-gray-50 border border-gray-300 text-gray-900 placeholder-gray-400 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600');
                    $('#age_months').removeClass('bg-green-50 border border-green-500');
                    $('#age_months').addClass('bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 dark:bg-red-100 dark:border-red-400');
                    $('#age_months2').addClass('text-red-600 dark:text-red-500');
                    $('.caption_aacd').addClass('text-red-600 dark:text-red-500');
                    $('#age_months').closest(".mb-6").find('#age_months1').append('<p class="warning mt-2 text-sm text-red-600 dark:text-red-500">This field is Required!</p>');
                    y=1;
                    console.log("age_month");
                }
                if(!$('#age_days').val()){
                    $('#age_days').removeClass('bg-gray-50 border border-gray-300 text-gray-900 placeholder-gray-400 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600');
                    $('#age_days').removeClass('bg-green-50 border border-green-500');
                    $('#age_days').addClass('bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 dark:bg-red-100 dark:border-red-400');
                    $('#age_days2').addClass('text-red-600 dark:text-red-500');
                    $('.caption_aacd').addClass('text-red-600 dark:text-red-500');
                    $('#age_days').closest(".mb-6").find('#age_days1').append('<p class="warning mt-2 text-sm text-red-600 dark:text-red-500">This field is Required!</p>');
                    y=1;
                    console.log("age_days");
                }
                if(!$('#guilty_status').val()){
                    $('#guilty_status').removeClass('bg-gray-50 border border-gray-300 text-gray-900 placeholder-gray-400 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600');
                    $('#guilty_status').removeClass('bg-green-50 border border-green-500');
                    $('#guilty_status').addClass('bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 dark:bg-red-100 dark:border-red-400');
                    $('#guilty_status').closest(".mb-6").find(".caption").addClass('text-red-600 dark:text-red-500');
                    $('#guilty_status').closest(".mb-6").append('<p class="warning mt-2 text-sm text-red-600 dark:text-red-500">This field is Required!</p>');
                    y=1;
                    console.log("guilty_status");
                }


                if(y==0){
                    console.log("in else");

                    $('#tab1').addClass('hidden');
                    $('#tab2').removeClass('hidden');
                    $('#prevbtn').removeClass('hidden');
                    //$('#nextbtn').text('Add');
                    $('#nextbtn').addClass('submit_basic');
                }
            });
            //End submit basic

            //Start click prev
            $(document).on('click','#prevbtn', function (e) {
                e.preventDefault();
                $('#tab2').addClass('hidden');
                $('#tab1').removeClass('hidden');
                $('#prevbtn').addClass('hidden');
                //$('#nextbtn').text('Add');
                $('#nextbtn').removeClass('submit_basic');
            });
            //End click prev


            //Update
            $(document).on('click','.submit_basic', function (e) {
                e.preventDefault();

                var data = {
                    'desig_id': $('#desig_id').val(),
                    'gender' : $('#gender').val(),
                    'initial' : $('#initial').val(),
                    'fname' : $('#fname').val(),
                    'mname' : $('#mname').val(),
                    'lname' : $('#lname').val(),
                    'mname' : $('#mname').val(),
                    'email' : $('#email').val(),
                    'initial_name' : $('#initial_name').val(),
                    'current_address_line1' : $('#current_address_line1').val(),
                    'current_address_line2' : $('#current_address_line2').val(),
                    'current_address_line3' : $('#current_address_line3').val(),
                    'permenent_address_line1' : $('#permenent_address_line1').val(),
                    'permenent_address_line2' : $('#permenent_address_line2').val(),
                    'permenent_address_line3' : $('#permenent_address_line3').val(),
                    'current_mobile' : $('#current_mobile').val(),
                    'permenant_mobile' : $('#permenant_mobile').val(),
                    'nic' : $('#nic').val(),
                    'citizenship' : $('#citizenship').val(),
                    'police_division' : $('#police_division').val(),
                    'dob' : $('#dob').val(),
                    'civil_status' : $('#civil_status').val(),
                    'age_years' : $('#age_years').val(),
                    'age_months' : $('#age_months').val(),
                    'age_days' : $('#age_days').val(),
                    'sport_activity' : $('#sport_activity').val(),
                    'guilty_status' : $('#guilty_status').val(),
                    'guilty_description' : $('#guilty_description').val(),
                    'driving_licence_no' : $('#driving_licence_no').val(),
                    'driving_licence_issuied_date' : $('#driving_licence_issuied_date').val(),
                    'height_feets' : $('#height_feets').val(),
                    'height_inches' : $('#height_inches').val(),
                    'chest' : $('#chest').val(),
                }
                console.log(data);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "POST",
                    url: "submit-application",
                    data: data,
                    dataType: "json",
                    success: function (response) {
                        console.log(response);

                        if(response.status==400){
                            //errors

                            $('#alert_danger_application_des').html("");
                            $('#alert_danger_application_des').append(response.message);
                            $('#alert_danger_application').removeClass('hidden');

                        }

                        else{
                            //call form modal
                            $('#popup-modal').removeClass('hidden');
                            $('#popup-modal').addClass('flex');
                            $('#popup-modal').attr('role','dialog');
                            $('#popup-modal').attr('aria-modal','true');
                            $('#popup-modal').removeAttr('aria-hidden');
                            $('body').append('<div id="bg_bluer1" class="bg-gray-900 bg-opacity-50 dark:bg-opacity-80 fixed inset-0 z-40"></div><div id="bg_bluer2" class="bg-gray-900 bg-opacity-50 dark:bg-opacity-80 fixed inset-0 z-40"></div>');
                        }
                    }
                });
            });
            // End update

            $(document).on('click', '#ok', function (e) {
                $('#popup-modal').addClass('hidden');
                $('#bg_bluer1,#bg_bluer2').remove();
            });
        });

        //declearing html elements

        const imgDiv = document.querySelector('.profile-pic-div');
        const img = document.querySelector('#photo');
        const file = document.querySelector('#file');
        const uploadBtn = document.querySelector('#uploadBtn');

        //if user hover on img div

        imgDiv.addEventListener('mouseenter', function(){
            uploadBtn.style.display = "block";
        });

        //if we hover out from img div

        imgDiv.addEventListener('mouseleave', function(){
            uploadBtn.style.display = "none";
        });

        //lets work for image showing functionality when we choose an image to upload

        //when we choose a foto to upload

        file.addEventListener('change', function(){
            //this refers to file
            const choosedFile = this.files[0];

            if (choosedFile) {

                const reader = new FileReader(); //FileReader is a predefined function of JS

                reader.addEventListener('load', function(){
                    img.setAttribute('src', reader.result);
                });

                reader.readAsDataURL(choosedFile);

                //Allright is done

                //please like the video
                //comment if have any issue related to vide & also rate my work in comment section

                //And aslo please subscribe for more tutorial like this

                //thanks for watching
            }
        });
    </script>

@endsection
