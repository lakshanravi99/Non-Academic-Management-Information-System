
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
        @include('appliciant.body.topbar')

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

        <!-- Start Delete Model -->
        <div id="available_test_delete-modal" tabindex="-1" class="delete_box hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 md:inset-0 h-modal md:h-full">
            <div class="relative p-4 w-full max-w-md h-full md:h-auto">
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <button type="button" class="decline absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                    <div class="p-6 text-center">
                        <svg aria-hidden="true" class="mx-auto mb-4 w-14 h-14 text-gray-400 dark:text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to delete this Item?</span></h3>
                        <input type="hidden" id="delete_id">
                        <input type="hidden" id="delete_table">
                        <input type="hidden" id="delete_fun">
                        <button type="button" class="available_test_delete_confirm text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                            Yes, I'm sure
                        </button>
                        <button type="button" class="decline text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No, cancel</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- End delete Model -->


        <!-- BEGIN: Top Bar -->

        <!-- END: Top Bar -->
        <div class="grid grid-cols-12 ">
            <div class="col-span-12 2xl:col-span-1">

                <!-- Start Application -->
                <div>
                    <div class="intro-y box" style="margin-left: auto; margin-right: auto;">
                        @csrf


                        <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                            <h2 class="font-medium text-base mr-auto">රුහුණ විශ්ව විද්‍යාලය - ශී ලංකාව {{session('temp_user_designation_name')}}({{session('temp_user_designation_id')}}) තනතුර සදහා අයදුම් පත්‍රය</h2>
                            <input type="hidden"  id="desig_id" value="{{session('temp_user_designation_id')}}">
                            <input type="hidden"  name="user_id" value="{}">
                            <input type="hidden" id="application_id" value="{{$application_id}}">
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
                                                    <option id="gender_value" value="" hidden>Choose here</option>
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
                                                <option id="citizenship_value" value="" hidden>Choose here</option>
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
                                                <option id="civil_status_value" value="" hidden>Choose here</option>
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
                                        <option id="guilty_status_value" value="" hidden>Choose here</option>
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
                            <div class="hidden" style="hoverflow:auto;">
                                <div style="float:right;">

                                    <button type="button" class="btn btn-secondary hidden" id="prevbtn">Previous</button>

                                    <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" id="nextbtn">
                                        Next
                                        <svg aria-hidden="true" class="ml-2 -mr-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                    </button>

                                </div>
                            </div>
                            <!-- Circles which indicates the steps of the form: -->
                            <div class="hidden" style="text-align:center;margin-top:40px;">
                                <span class="step"></span>
                                <span class="step"></span>
                            </div>
                        </div>
                        <!-- END: Input -->
                        <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                            <h2 class="font-medium text-base mr-auto">අධɕාපන සුදුසුකම<br>
                                Education Qualification</h2>
                        </div>

                        <!-- start alert success-->
                        <div id="alert-success" class="hidden flex p-4 mb-4 bg-green-100 rounded-lg dark:bg-green-200" role="alert">
                            <svg aria-hidden="true" class="flex-shrink-0 w-5 h-5 text-green-700 dark:text-green-800" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                            <span class="sr-only">Info</span>
                            <div class="ml-3 text-sm font-medium text-green-700 dark:text-green-800" id="alert-success_message">

                            </div>
                            <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-green-100 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex h-8 w-8 dark:bg-green-200 dark:text-green-600 dark:hover:bg-green-300" data-dismiss-target="#alert-success" aria-label="Close">
                                <span class="sr-only">Close</span>
                                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                            </button>
                        </div>
                        <!-- End alert success -->

                        <!-- start alert danger -->
                        <div id="alert-danger" class="hidden flex p-4 mb-4 bg-red-100 rounded-lg dark:bg-red-200" role="alert">
                            <svg aria-hidden="true" class="flex-shrink-0 w-5 h-5 text-red-700 dark:text-red-800" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                            <span class="sr-only">Info</span>
                            <div class="ml-3 text-sm font-medium text-red-700 dark:text-red-800" id="alert-danger_message">

                            </div>
                            <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-red-100 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex h-8 w-8 dark:bg-red-200 dark:text-red-600 dark:hover:bg-red-300" data-dismiss-target="#alert-danger" aria-label="Close">
                                <span class="sr-only">Close</span>
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                            </button>
                        </div>
                        <!-- end alert danger -->

                        <!-- Start school table -->
                        <div id="school_content" class="overflow-x-auto relative shadow-md sm:rounded-lg">
                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                <caption class="p-5 text-lg font-semibold text-left text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                                    ඉගෙනුම ලැබූ පාසල<br>Schools Attended
                                    <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">fvvvvv</p>
                                </caption>
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="py-3 px-6">
                                        School name<br>පාසල
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        From<br>සිට
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        To<br>දක්වා
                                    </th>
                                    <th scope="col" class="py-3 px-6 action hidden">
                                        Action
                                    </th>
                                </tr>
                                </thead>
                                <tbody id="school">

                                </tbody>
                            </table>
                        </div>
                        <!-- End school table -->

                        <!-- Start ol1 table -->
                        <div id="ol1_content" class="overflow-x-auto relative shadow-md sm:rounded-lg">
                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                <caption class="p-5 text-lg font-semibold text-left text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                                    සා/පෙළ විභාග ප්‍රතිඵල (පළමුවර)<br>O/L Examination results (1st shy)
                                    <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400"></p>
                                </caption>
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="py-3 px-6">
                                        විශය<br>Subject
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        සාමාර්තය<br>Grade
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        වර්ෂය<br>Year
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        විභාග අංකය<br>Index no
                                    </th>
                                    <th scope="col" class="py-3 px-6 action hidden">
                                        Action
                                    </th>
                                </tr>
                                </thead>
                                <tbody id="ol1_tbody">

                                </tbody>
                            </table>
                        </div>
                        <!-- End ol1 table -->

                        <!-- Start ol2 table -->
                        <div id="ol2_content" class="overflow-x-auto relative shadow-md sm:rounded-lg">
                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                <caption class="p-5 text-lg font-semibold text-left text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                                    සා/පෙළ විභාග ප්‍රතිඵල (දෙවනවර) O/L Examination results (2nd shy)
                                    <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400"></p>
                                </caption>
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="py-3 px-6">
                                        විශය<br>Subject
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        සාමාර්තය<br>Grade
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        වර්ෂය<br>Year
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        විභාග අංකය<br>Index no
                                    </th>
                                    <th scope="col" class="py-3 px-6 action hidden">
                                        Action
                                    </th>
                                </tr>
                                </thead>
                                <tbody id="ol2">

                                </tbody>
                            </table>
                        </div>
                        <!-- End ol2 table -->

                        <!-- Start al table -->
                        <div id="al_content" class="overflow-x-auto relative shadow-md sm:rounded-lg">
                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                <caption class="p-5 text-lg font-semibold text-left text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                                    උ/පෙළ විභාග ප්‍රතිඵල A/L Examination results
                                    <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400"></p>
                                </caption>
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="py-3 px-6">
                                        විශය<br>Subject
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        සාමාර්තය<br>Grade
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        වර්ෂය<br>Year
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        විභාග අංකය<br>Index no
                                    </th>
                                    <th scope="col" class="py-3 px-6 action hidden">
                                        Action
                                    </th>
                                </tr>
                                </thead>
                                <tbody id="al">

                                </tbody>
                            </table>
                        </div>
                        <!-- End al table -->

                        <!-- Start university table -->
                        <div id="university_content" class="overflow-x-auto relative shadow-md sm:rounded-lg">
                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                <caption class="p-5 text-lg font-semibold text-left text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                                    විශ්ව විද්‍යාල අධ්‍යාපනය/University Education
                                    <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400"></p>
                                </caption>
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="py-3 px-6">
                                        ආයතනය<br>Institute
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        උපාධිය/ඩිප්ලෝමාව<br>Degree/Deploma
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        වර්ෂය<br>Year
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        පංතිය/Class
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        සුදුසුකම් වලංගු වන දිනය<br>Effective Date
                                    </th>
                                    <th scope="col" class="py-3 px-6 action hidden">
                                        Action
                                    </th>
                                </tr>
                                </thead>
                                <tbody id="university">

                                </tbody>
                            </table>
                        </div>
                        <!-- End university table -->

                        <!-- Start other qualification table -->
                        <div id="other_content" class="overflow-x-auto relative shadow-md sm:rounded-lg">
                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                <caption class="p-5 text-lg font-semibold text-left text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                                    වෙනත් අධ්‍යාපන සුදුසුකම්/Other Education Qualifications
                                    <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400"></p>
                                </caption>
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="py-3 px-6">
                                        ආයතනය<br>Institute
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        පාඨමාලාව<br>Course
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        සිට<br>From
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        දක්වා/To
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        සුදුසුකම් වලංගු වන දිනය<br>Effective Date
                                    </th>
                                    <th scope="col" class="py-3 px-6 action hidden">
                                        Action
                                    </th>
                                </tr>
                                </thead>
                                <tbody id="other">

                                </tbody>
                            </table>
                        </div>
                        <!-- End other qualification table -->

                        <!-- Start professional qualification table -->
                        <div id="professional_content" class="overflow-x-auto relative shadow-md sm:rounded-lg">
                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                <caption class="p-5 text-lg font-semibold text-left text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                                    හදාරන ලද වෘත්තීය පාඨමාලා පිළිඹඳ විස්තර/Professional Qualifications followed
                                    <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400"></p>
                                </caption>
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="py-3 px-6">
                                        ආයතනය<br>Institute
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        පාඨමාලාව<br>Course
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        සිට<br>From
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        දක්වා/To
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        සුදුසුකම් වලංගු වන දිනය<br>Effective Date
                                    </th>
                                    <th scope="col" class="py-3 px-6 action hidden">
                                        Action
                                    </th>
                                </tr>
                                </thead>
                                <tbody id="professional">

                                </tbody>
                            </table>
                        </div>
                        <!-- End professional qualification table -->

                        <!-- Start employee record table -->
                        <div id="employment_content" class="overflow-x-auto relative shadow-md sm:rounded-lg">
                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                <caption class="p-5 text-lg font-semibold text-left text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                                    සේවා වාර්තාව/Employment Record
                                    <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">add text...</p>
                                </caption>
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="py-3 px-6">
                                        දැරූ තනතුර<br>Post Held
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        ආයතනය<br>Institute
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        සිට<br>From
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        දක්වා<br>To
                                    </th>
                                    <th scope="col" class="py-3 px-6 action hidden">
                                        Action
                                    </th>
                                </tr>
                                </thead>
                                <tbody id="employment">

                                </tbody>
                            </table>
                        </div>
                        <!-- End employee record table -->

                        <!-- Start present occupation table -->
                        <div id="occupation_content" class="overflow-x-auto relative shadow-md sm:rounded-lg">
                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                <caption class="p-5 text-lg font-semibold text-left text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                                    දැනට කරන රැකියාව/Present Occupation
                                    <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">add text...</p>
                                </caption>
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="py-3 px-6">
                                        තනතුර<br>Post
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        ආයතනය<br>Institute
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        උපයන වැටුප<br>Salary drawn
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        කවදා සිටද/From when
                                    </th>
                                    <th scope="col" class="py-3 px-6 action hidden">
                                        Action
                                    </th>
                                </tr>
                                </thead>
                                <tbody id="occupation">

                                </tbody>
                            </table>
                        </div>
                        <!-- End present occupation table -->

                        <!-- Start references table -->
                        <div id="reference_content" class="overflow-x-auto relative shadow-md sm:rounded-lg">
                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                <caption class="p-5 text-lg font-semibold text-left text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                                    ඔබ ගැන තොරතුරු විමසිය හැකි අය/References
                                    <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">add text...</p>
                                </caption>
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="py-3 px-6">
                                        නම<br>Name
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        තනතුර<br>Designation
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        ලිපිනය<br>Address
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        දුරකඨ්හන අංක<br>T.P No
                                    </th>
                                    <th scope="col" class="py-3 px-6 action hidden">
                                        Action
                                    </th>
                                </tr>
                                </thead>
                                <tbody id="reference">

                                </tbody>
                            </table>
                        </div>
                        <!-- End references table -->

                        <!-- buttons -->
                        <div>
                            <button type="button" id="edit" class="float-right text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                Edit
                                <svg aria-hidden="true" class="ml-2 -mr-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                            </button>
                            <button type="button" id="save_changes" class="hidden float-right text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                Save changes
                                <svg aria-hidden="true" class="ml-2 -mr-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                            </button>
                        </div>

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
    <script src="https://js.pusher.com/7.1/pusher.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
    <script src="https://unpkg.com/flowbite@1.4.7/dist/flowbite.js"></script>

    <script>

        console.log("hello");
        var clickedit=0;
        console.log(clickedit);
        fetchData();
        //edit
        function fetchData(){

            var data = {
                'application_id' : $('#application_id').val()
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "post",
                url: "view-own",
                data: data,
                dataType: "json",
                success: function (response) {
                    console.log(response);

                    if(response.data1<response.today){
                        $('#edit').prop('disabled', true);
                        $('#edit').addClass('cursor-not-allowed');
                    }

                    if(response.status==400){
                        //errors
                        $('#updateform_errList').html("");
                        $('#updateform_errList').addClass('alert alert-denger');
                        $.each(response.errors, function(key, err_values){
                            $('#updateform_errList').append('<li>'+err_values+'</li>');
                        });
                    }
                    else if(response.status==404){
                        // $('#updateform_errList').html("");
                        // $('#success_message').addClass('alert alert-success')
                        // $('#success_message').text(response.message)
                    }
                    else{
                        // $('#desig_id').val().val(response.data[0].designation_name);
                        // $('#desig_id').val().text(response.data[0].designation_name);

                        $('#gender').val(response.data[0].gender);
                        $('#gender').attr("disabled", true);
                        $('#gender_value').text(response.data[0].gender);
                        $('#gender_value').val(response.data[0].gender);

                        $('#initial').attr("disabled", true);
                        $('#initial').val(response.data[0].initial);
                        $('#initial').text(response.data[0].initial);

                        $('#fname').attr("disabled", true);
                        $('#fname').val(response.data[0].fname);
                        $('#fname').text(response.data[0].fname);

                        $('#mname').attr("disabled", true);
                        $('#mname').val(response.data[0].mname);
                        $('#mname').text(response.data[0].mname);

                        $('#lname').attr("disabled", true);
                        $('#lname').val(response.data[0].lname);
                        $('#lname').text(response.data[0].lname);

                        $('#initial_name').attr("disabled", true);
                        $('#initial_name').val(response.data[0].initial_name);
                        $('#initial_name').text(response.data[0].initial_name);

                        $('#current_address_line1').attr("disabled", true);
                        $('#current_address_line1').val(response.data[0].current_address_line1);
                        $('#current_address_line1').text(response.data[0].current_address_line1);

                        $('#current_address_line2').attr("disabled", true);
                        $('#current_address_line2').val(response.data[0].current_address_line2);
                        $('#current_address_line2').text(response.data[0].current_address_line2);

                        $('#current_address_line3').attr("disabled", true);
                        $('#current_address_line3').val(response.data[0].current_address_line3);
                        $('#current_address_line3').text(response.data[0].current_address_line3);

                        $('#permenent_address_line1').attr("disabled", true);
                        $('#permenent_address_line1').val(response.data[0].permenent_address_line1);
                        $('#permenent_address_line1').text(response.data[0].permenent_address_line1);

                        $('#permenent_address_line2').attr("disabled", true);
                        $('#permenent_address_line2').val(response.data[0].permenent_address_line2);
                        $('#permenent_address_line2').text(response.data[0].permenent_address_line2);

                        $('#permenent_address_line3').attr("disabled", true);
                        $('#permenent_address_line3').val(response.data[0].permenent_address_line3);
                        $('#permenent_address_line3').text(response.data[0].permenent_address_line3);

                        $('#current_mobile').attr("disabled", true);
                        $('#current_mobile').val(response.data[0].current_mobile);
                        $('#current_mobile').text(response.data[0].current_mobile);

                        $('#permenant_mobile').attr("disabled", true);
                        $('#permenant_mobile').val(response.data[0].permenant_mobile);
                        $('#permenant_mobile').text(response.data[0].permenant_mobile);

                        $('#email').attr("disabled", true);

                        $('#nic').attr("disabled", true);
                        $('#nic').val(response.data[0].nic);
                        $('#nic').text(response.data[0].nic);

                        $('#citizenship').attr("disabled", true);
                        $('#citizenship_value').text(response.data[0].citizenship);
                        $('#citizenship_value').val(response.data[0].citizenship);

                        $('#police_division').attr("disabled", true);
                        $('#police_division').val(response.data[0].police_division);
                        $('#police_division').text(response.data[0].police_division);

                        $('#dob').attr("disabled", true);
                        $('#dob').val(response.data[0].dob);
                        $('#dob').text(response.data[0].dob);

                        $('#civil_status').attr("disabled", true);
                        $('#civil_status_value').text(response.data[0].civil_status);
                        $('#civil_status_value').val(response.data[0].civil_status);

                        const age = response.data[0].age_as_at_closing_date.split(" ");

                        $('#age_years').attr("disabled", true);
                        $('#age_years').val(age[0]);
                        $('#age_years').text(age[0]);

                        $('#age_months').attr("disabled", true);
                        $('#age_months').val(age[2]);
                        $('#age_months').text(age[2]);

                        $('#age_days').attr("disabled", true);
                        $('#age_days').val(age[4]);
                        $('#age_days').text(age[4]);

                        $('#sport_activity').attr("disabled", true);
                        $('#sport_activity').val(response.data[0].sport_qualification);
                        $('#sport_activity').text(response.data[0].sport_qualification);

                        $('#guilty_status').attr("disabled", true);
                        $('#guilty_status_value').text(response.data[0].guilty_status);
                        $('#guilty_status_value').val(response.data[0].guilty_status);

                        $('#guilty_description').attr("disabled", true);
                        $('#guilty_description').val(response.data[0].guilty_description);
                        $('#guilty_description').text(response.data[0].guilty_description);

                        $('#driving_licence_no').attr("disabled", true);
                        $('#driving_licence_no').val(response.data[0].driving_licen_no);
                        $('#driving_licence_no').text(response.data[0].driving_licen_no);

                        $('#driving_licence_issuied_date').attr("disabled", true);
                        $('#driving_licence_issuied_date').val(response.data[0].driving_licen_issuing_date);
                        $('#driving_licence_issuied_date').text(response.data[0].driving_licen_issuing_date);

                        const hight = response.data[0].hight.split(" ");

                        $('#height_feets').attr("disabled", true);
                        $('#height_feets').val(hight[0]);
                        $('#height_feets').text(hight[0]);

                        $('#height_inches').attr("disabled", true);
                        $('#height_inches').val(hight[2]);
                        $('#height_inches').text(hight[2]);

                        $('#chest').attr("disabled", true);
                        $('#chest').val(response.data[0].chest);
                        $('#chest').text(response.data[0].chest);

                    }
                }
            });
        };
        // End edit

        $(document).ready(function(){
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

            $(document).on('click', '#ok', function (e) {
                $('#popup-modal').addClass('hidden');
                $('#bg_bluer1,#bg_bluer2').remove();
            });
        });

        //Start Education qualification
        fetchSchool();
        fetchOl();
        fetchAl();
        fetchUniversity();
        fetchOther();
        fetchProfessional();
        fetchEmployment();
        fetchOccupation();
        fetchReference();

        function fetchSchool(){
            var data = {
                'application_id' : $('#application_id').val()
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                method: "post",
                url: "fetch-school",
                data: data,
                datatype: "json",
                success: function(response){
                    console.log("School start");
                    console.log(response);
                    console.log("School end");
                    $('#school').html("");
                    $.each(response.data, function (ket, item) {
                        $('#school').append('<tr>\
                            <td class="py-4 px-6" id="'+item.appliciant_id+'_school">'+item.school+'</td>\
                            <td class="py-4 px-6" id="'+item.appliciant_id+'_from">'+item.from+'</td>\
                            <td class="py-4 px-6" id="'+item.appliciant_id+'_to">'+item.to+'</td>\
                            <td class="py-4 px-6 action">\
                                <button type="button" value="'+item.id+'" data-value="appliciant_school_attendeds" data-value3="fetchSchool" class="delete py-2 px-3 text-xs font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Delete</button>\
                            </td>\
                        </tr>'
                        );
                    });
                    $('#school').append('<tr class="add_raw">\
                        <form>\
                            <td class="py-4 px-6"><input type="text" id="entered_school_name" class="block p-2 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="School" required></td>\
                            <td class="py-4 px-6"><input type="date" id="entered_school_from" class="block p-2 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="From" required></td>\
                            <td class="py-4 px-6"><input type="date" id="entered_school_to" class="block p-2 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="To" required></td>\
                            <td class="py-4 px-6">\
                                <button type="button" id="submit_school" class="py-2 px-3 text-xs font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">+ Add New</button>\
                            </td>\
                        </form>\
                    </tr>'
                    );
                    if(clickedit==0){
                        $('.add_raw').addClass('hidden');
                        $('.action').addClass('hidden');
                    }
                }
            });

            $('.skip').addClass('get_ol_view');
            $('.previous').addClass('hidden');
            $('.previous').removeClass('get_school_view');
        }

        // ol view
        function fetchOl(){
            var data = {
                'application_id' : $('#application_id').val()
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                method: "post",
                url: "fetch-ol",
                data: data,
                datatype: "json",
                success: function(response){
                    console.log(response);
                    $('#ol1_tbody').html("");
                    $.each(response.ol1, function (ket, item) {
                        $('#ol1_tbody').append('<tr>\
                            <td class="py-4 px-6" id="'+item.id+'_school">'+item.subject+'</td>\
                            <td class="py-4 px-6" id="'+item.id+'_from">'+item.grade+'</td>\
                            <td class="py-4 px-6" id="'+item.id+'_to">'+item.year+'</td>\
                            <td class="py-4 px-6" id="'+item.id+'_from">'+item.index_no+'</td>\
                            <td class="py-4 px-6 action">\
                                <button type="button" value="'+item.id+'" data-value="appliciant_ol_examinations" data-value3="fetchOl" class="delete py-2 px-3 text-xs font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Delete</button>\
                            </td>\
                        </tr>'
                        );
                    });
                    $('#ol1_tbody').append('<tr class="add_raw">\
                        <form>\
                            <td class="py-4 px-6"><input type="text" id="entered_ol1_subject" class="block p-2 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="School" required></td>\
                            <td class="py-4 px-6"><input type="text" id="entered_ol1_grade" class="block p-2 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="From" required></td>\
                            <td class="py-4 px-6"><input type="number" id="entered_ol1_year" class="block p-2 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="To" required></td>\
                            <td class="py-4 px-6"><input type="text" id="entered_ol1_index" class="block p-2 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="To" required></td>\
                            <td class="py-4 px-6">\
                                <button type="button" id="submit_ol1" class="py-2 px-3 text-xs font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">+ Add New</button>\
                            </td>\
                        </form>\
                    </tr>'
                    );
                    if(clickedit==0){
                        $('.add_raw').addClass('hidden');
                        $('.action').addClass('hidden');
                    }

                    $('#ol2').html("");
                    $.each(response.ol2, function (ket, item) {
                        $('#ol2').append('<tr>\
                            <td class="py-4 px-6" id="'+item.id+'_school">'+item.subject+'</td>\
                            <td class="py-4 px-6" id="'+item.id+'_from">'+item.grade+'</td>\
                            <td class="py-4 px-6" id="'+item.id+'_to">'+item.year+'</td>\
                            <td class="py-4 px-6" id="'+item.id+'_from">'+item.index_no+'</td>\
                            <td class="py-4 px-6 action">\
                                <button type="button" value="'+item.id+'" data-value="appliciant_ol_examinations" data-value3="fetchOl" class="delete py-2 px-3 text-xs font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Delete</button>\
                            </td>\
                        </tr>'
                        );
                    });
                    $('#ol2').append('<tr class="add_raw">\
                        <form>\
                            <td class="py-4 px-6"><input type="text" id="entered_ol2_subject" class="block p-2 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="School" required></td>\
                            <td class="py-4 px-6"><input type="text" id="entered_ol2_grade" class="block p-2 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="From" required></td>\
                            <td class="py-4 px-6"><input type="number" id="entered_ol2_year" class="block p-2 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="To" required></td>\
                            <td class="py-4 px-6"><input type="text" id="entered_ol2_index" class="block p-2 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="To" required></td>\
                            <td class="py-4 px-6">\
                                <button type="button" id="submit_ol2" class="py-2 px-3 text-xs font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">+ Add New</button>\
                            </td>\
                        </form>\
                    </tr>'
                    );
                    if(clickedit==0){
                        $('.add_raw').addClass('hidden');
                        $('.action').addClass('hidden');
                    }
                }
            });

            $('.previous').removeClass('hidden');
            $('.skip').removeClass('get_ol_view');
            $('.skip').addClass('get_al_view');
            $('.previous').addClass('get_school_view');
            $('.previous').removeClass('get_ol_view');
        }
        // end o/l view

        //Start a/l view
        function fetchAl(){
            var data = {
                'application_id' : $('#application_id').val()
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                method: "post",
                url: "fetch-al",
                data: data,
                datatype: "json",
                success: function(response){
                    console.log(response);
                    $('#al').html("");
                    $.each(response.al_data, function (ket, item) {
                        $('#al').append('<tr>\
                            <td class="py-4 px-6" id="'+item.appliciant_id+'_al_subject">'+item.subject+'</td>\
                            <td class="py-4 px-6" id="'+item.appliciant_id+'_al_grade">'+item.grade+'</td>\
                            <td class="py-4 px-6" id="'+item.appliciant_id+'_al_year">'+item.year+'</td>\
                            <td class="py-4 px-6" id="'+item.appliciant_id+'_al_index">'+item.index_no+'</td>\
                            <td class="py-4 px-6 action">\
                                <button type="button" value="'+item.id+'" data-value="appliciant_al_examinations" data-value3="fetchAl" class="delete py-2 px-3 text-xs font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Delete</button>\
                            </td>\
                        </tr>'
                        );
                    });
                    $('#al').append('<tr class="add_raw">\
                        <form>\
                            <td class="py-4 px-6"><input type="text" id="entered_al_subject" class="block p-2 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Subject" required></td>\
                            <td class="py-4 px-6"><input type="text" id="entered_al_grade" class="block p-2 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Grade" required></td>\
                            <td class="py-4 px-6"><input type="number" id="entered_al_year" class="block p-2 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Year" required></td>\
                            <td class="py-4 px-6"><input type="text" id="entered_al_index" class="block p-2 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Index No" required></td>\
                            <td class="py-4 px-6">\
                                <button type="button" id="submit_al" class="py-2 px-3 text-xs font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">+ Add New</button>\
                            </td>\
                        </form>\
                    </tr>'
                    );
                    if(clickedit==0){
                        $('.add_raw').addClass('hidden');
                        $('.action').addClass('hidden');
                    }
                }
            });

            $('.skip').removeClass('get_al_view');
            $('.skip').addClass('get_university_view');
            $('.previous').removeClass('get_school_view');
            $('.previous').addClass('get_ol_view');
            $('.previous').removeClass('get_al_view');
        }
        //End a/l view


        //Start University view
        function fetchUniversity(){
            var data = {
                'application_id' : $('#application_id').val()
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                method: "post",
                url: "fetch-university",
                data: data,
                datatype: "json",
                success: function(response){
                    console.log(response);
                    $('#university').html("");
                    $.each(response.university_data, function (ket, item) {
                        $('#university').append('<tr>\
                            <td class="py-4 px-6" id="'+item.appliciant_id+'_university_institute">'+item.institute+'</td>\
                            <td class="py-4 px-6" id="'+item.appliciant_id+'_university_degree">'+item.degree+'</td>\
                            <td class="py-4 px-6" id="'+item.appliciant_id+'_university_year">'+item.year+'</td>\
                            <td class="py-4 px-6" id="'+item.appliciant_id+'_university_class">'+item.class+'</td>\
                            <td class="py-4 px-6" id="'+item.appliciant_id+'_university_index">'+item.effective_date+'</td>\
                            <td class="py-4 px-6 action">\
                                <button type="button" value="'+item.id+'" data-value="appliciant_university_education" data-value3="fetchUniversity" class="delete py-2 px-3 text-xs font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Delete</button>\
                            </td>\
                        </tr>'
                        );
                    });
                    $('#university').append('<tr class="add_raw">\
                        <form>\
                            <td class="py-4 px-6"><input type="text" id="entered_university_institute" class="block p-2 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Institute" required></td>\
                            <td class="py-4 px-6"><input type="text" id="entered_university_degree" class="block p-2 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Degree" required></td>\
                            <td class="py-4 px-6"><input type="number" id="entered_university_year" class="block p-2 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Year" required></td>\
                            <td class="py-4 px-6"><input type="text" id="entered_university_class" class="block p-2 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Class" required></td>\
                            <td class="py-4 px-6"><input type="date" id="entered_university_date" class="block p-2 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Effective Date" required></td>\
                            <td class="py-4 px-6">\
                                <button type="button" id="submit_university" class="py-2 px-3 text-xs font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">+ Add New</button>\
                            </td>\
                        </form>\
                    </tr>'
                    );
                    if(clickedit==0){
                        $('.add_raw').addClass('hidden');
                        $('.action').addClass('hidden');
                    }
                }
            });

            $('.skip').removeClass('get_university_view');
            $('.skip').addClass('get_other_view');
            $('.previous').removeClass('get_ol_view');
            $('.previous').addClass('get_al_view');
            $('.previous').removeClass('get_university_view');

        }
        //End University view


        //Start other view
        function fetchOther(){
            var data = {
                'application_id' : $('#application_id').val()
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                method: "post",
                url: "fetch-other",
                data: data,
                datatype: "json",
                success: function(response){
                    console.log(response);
                    $('#other').html("");
                    $.each(response.other_data, function (ket, item) {
                        $('#other').append('<tr>\
                            <td class="py-4 px-6" id="'+item.appliciant_id+'_other_institute">'+item.institute+'</td>\
                            <td class="py-4 px-6" id="'+item.appliciant_id+'_other_course">'+item.course+'</td>\
                            <td class="py-4 px-6" id="'+item.appliciant_id+'_other_from">'+item.from+'</td>\
                            <td class="py-4 px-6" id="'+item.appliciant_id+'_other_to">'+item.to+'</td>\
                            <td class="py-4 px-6" id="'+item.appliciant_id+'_other_date">'+item.effective_date+'</td>\
                            <td class="py-4 px-6 action">\
                                <button type="button" value="'+item.id+'" data-value="appliciant_other_education" data-value3="fetchOther" class="delete py-2 px-3 text-xs font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Delete</button>\
                            </td>\
                        </tr>'
                        );
                    });
                    $('#other').append('<tr class="add_raw">\
                        <form>\
                            <td class="py-4 px-6"><input type="text" id="entered_other_institute" class="block p-2 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Institute" required></td>\
                            <td class="py-4 px-6"><input type="text" id="entered_other_course" class="block p-2 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Degree" required></td>\
                            <td class="py-4 px-6"><input type="date" id="entered_other_from" class="block p-2 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Year" required></td>\
                            <td class="py-4 px-6"><input type="date" id="entered_other_to" class="block p-2 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Class" required></td>\
                            <td class="py-4 px-6"><input type="date" id="entered_other_date" class="block p-2 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Effective Date" required></td>\
                            <td class="py-4 px-6">\
                                <button type="button" id="submit_other" class="py-2 px-3 text-xs font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">+ Add New</button>\
                            </td>\
                        </form>\
                    </tr>'
                    );
                    if(clickedit==0){
                        $('.add_raw').addClass('hidden');
                        $('.action').addClass('hidden');
                    }
                }
            });

            $('.skip').removeClass('get_other_view');
            $('.skip').addClass('get_professional_view');
            $('.previous').removeClass('get_al_view');
            $('.previous').addClass('get_university_view');
            $('.previous').removeClass('get_other_view');

        }
        //End other view

        //Start professional view
        function fetchProfessional(){
            var data = {
                'application_id' : $('#application_id').val()
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                method: "post",
                url: "fetch-professional",
                data: data,
                datatype: "json",
                success: function(response){
                    console.log("this is pro data");
                    console.log(response);
                    $('#professional').html("");
                    $.each(response.professional_data, function (ket, item) {
                        $('#professional').append('<tr>\
                            <td class="py-4 px-6" id="'+item.appliciant_id+'_pro_institute">'+item.institute+'</td>\
                            <td class="py-4 px-6" id="'+item.appliciant_id+'_pro_course">'+item.course+'</td>\
                            <td class="py-4 px-6" id="'+item.appliciant_id+'_pro_from">'+item.from+'</td>\
                            <td class="py-4 px-6" id="'+item.appliciant_id+'_pro_to">'+item.to+'</td>\
                            <td class="py-4 px-6" id="'+item.appliciant_id+'_pro_date">'+item.effective_date+'</td>\
                            <td class="py-4 px-6 action">\
                                <button type="button" value="'+item.id+'" data-value="appliciant_professional_qualifications" data-value3="fetchProfessional" class="delete py-2 px-3 text-xs font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Delete</button>\
                            </td>\
                        </tr>'
                        );
                    });
                    $('#professional').append('<tr class="add_raw">\
                        <form>\
                            <td class="py-4 px-6"><input type="text" id="entered_pro_institute" class="block p-2 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Institute" required></td>\
                            <td class="py-4 px-6"><input type="text" id="entered_pro_course" class="block p-2 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Degree" required></td>\
                            <td class="py-4 px-6"><input type="date" id="entered_pro_from" class="block p-2 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Year" required></td>\
                            <td class="py-4 px-6"><input type="date" id="entered_pro_to" class="block p-2 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Class" required></td>\
                            <td class="py-4 px-6"><input type="date" id="entered_pro_date" class="block p-2 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Effective Date" required></td>\
                            <td class="py-4 px-6">\
                                <button type="button" id="submit_professional" class="py-2 px-3 text-xs font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">+ Add New</button>\
                            </td>\
                        </form>\
                    </tr>'
                    );
                    if(clickedit==0){
                        $('.add_raw').addClass('hidden');
                        $('.action').addClass('hidden');
                    }
                }
            });

            $('.skip').removeClass('get_professional_view');
            $('.skip').addClass('get_employment_view');
            $('.previous').removeClass('get_university_view');
            $('.previous').addClass('get_other_view');
            $('.previous').removeClass('get_professional_view');

        }
        //End professional view

        //Start employment view
        function fetchEmployment(){
            var data = {
                'application_id' : $('#application_id').val()
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                method: "post",
                url: "fetch-employment",
                data: data,
                datatype: "json",
                success: function(response){
                    console.log(response);
                    $('#employment').html("");
                    $.each(response.employment_data, function (ket, item) {
                        $('#employment').append('<tr>\
                            <td class="py-4 px-6" id="'+item.appliciant_id+'_employment_post">'+item.post+'</td>\
                            <td class="py-4 px-6" id="'+item.appliciant_id+'_employment_institute">'+item.institute+'</td>\
                            <td class="py-4 px-6" id="'+item.appliciant_id+'_employment_from">'+item.from+'</td>\
                            <td class="py-4 px-6" id="'+item.appliciant_id+'_employment_to">'+item.to+'</td>\
                            <td class="py-4 px-6 action">\
                                <button type="button" value="'+item.id+'" data-value="appliciant_employment_records" data-value3="fetchEmployment" class="delete py-2 px-3 text-xs font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Delete</button>\
                            </td>\
                        </tr>'
                        );
                    });
                    $('#employment').append('<tr class="add_raw">\
                        <form>\
                            <td class="py-4 px-6"><input type="text" id="entered_employment_post" class="block p-2 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Institute" required></td>\
                            <td class="py-4 px-6"><input type="text" id="entered_employment_institute" class="block p-2 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Institute" required></td>\
                            <td class="py-4 px-6"><input type="date" id="entered_employment_from" class="block p-2 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Year" required></td>\
                            <td class="py-4 px-6"><input type="date" id="entered_employment_to" class="block p-2 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Class" required></td>\
                            <td class="py-4 px-6">\
                                <button type="button" id="submit_employment" class="py-2 px-3 text-xs font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">+ Add New</button>\
                            </td>\
                        </form>\
                    </tr>'
                    );
                    if(clickedit==0){
                        $('.add_raw').addClass('hidden');
                        $('.action').addClass('hidden');
                    }
                }
            });

            $('.skip').removeClass('get_employment_view');
            $('.skip').addClass('get_occupation_view');
            $('.previous').removeClass('get_other_view');
            $('.previous').addClass('get_professional_view');
            $('.previous').removeClass('get_employment_view');

        }
        //End employment view


        //Start occupation view
        function fetchOccupation(){
            var data = {
                'application_id' : $('#application_id').val()
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                method: "post",
                url: "fetch-occupation",
                data: data,
                datatype: "json",
                success: function(response){
                    console.log(response);
                    $('#occupation').html("");
                    $.each(response.occ_data, function (ket, item) {
                        $('#occupation').append('<tr>\
                            <td class="py-4 px-6" id="'+item.appliciant_id+'_employment_post">'+item.post+'</td>\
                            <td class="py-4 px-6" id="'+item.appliciant_id+'_employment_institute">'+item.institute+'</td>\
                            <td class="py-4 px-6" id="'+item.appliciant_id+'_employment_from">'+item.salary_drawn+'</td>\
                            <td class="py-4 px-6" id="'+item.appliciant_id+'_employment_to">'+item.from_where+'</td>\
                            <td class="py-4 px-6 action">\
                                <button type="button" value="'+item.id+'" data-value="appliciant_present_occaptions" data-value3="fetchOccupation" class="delete py-2 px-3 text-xs font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Delete</button>\
                            </td>\
                        </tr>'
                        );
                    });
                    $('#occupation').append('<tr class="add_raw">\
                        <form>\
                            <td class="py-4 px-6"><input type="text" id="entered_occupation_post" class="block p-2 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Institute" required></td>\
                            <td class="py-4 px-6"><input type="text" id="entered_occupation_institute" class="block p-2 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Institute" required></td>\
                            <td class="py-4 px-6"><input type="text" id="entered_occupation_salary" class="block p-2 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Year" required></td>\
                            <td class="py-4 px-6"><input type="text" id="entered_occupation_from" class="block p-2 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Class" required></td>\
                            <td class="py-4 px-6">\
                                <button type="button" id="submit_occupation" class="py-2 px-3 text-xs font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">+ Add New</button>\
                            </td>\
                        </form>\
                    </tr>'
                    );
                    if(clickedit==0){
                        $('.add_raw').addClass('hidden');
                        $('.action').addClass('hidden');
                    }
                }
            });

            $('.skip').removeClass('hidden');
            $('.skip').removeClass('get_occupation_view');
            $('.skip').addClass('get_reference_view');
            $('.previous').removeClass('get_professional_view');
            $('.previous').removeClass('get_occupation_view');
            $('.previous').addClass('get_employment_view');

        }
        //End occupation view

        //Start reference view
        function fetchReference(){
            var data = {
                'application_id' : $('#application_id').val()
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                method: "post",
                url: "fetch-reference",
                data: data,
                datatype: "json",
                success: function(response){
                    console.log(response);
                    $('#reference').html("");
                    $.each(response.reference_data, function (ket, item) {
                        $('#reference').append('<tr>\
                            <td class="py-4 px-6" id="'+item.appliciant_id+'_employment_post">'+item.name+'</td>\
                            <td class="py-4 px-6" id="'+item.appliciant_id+'_employment_institute">'+item.designation+'</td>\
                            <td class="py-4 px-6" id="'+item.appliciant_id+'_employment_from">'+item.address+'</td>\
                            <td class="py-4 px-6" id="'+item.appliciant_id+'_employment_to">'+item.telephone+'</td>\
                            <td class="py-4 px-6 action">\
                                <button type="button" value="'+item.id+'" data-value="appliciant_references" data-value3="fetchReference" class="delete py-2 px-3 text-xs font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Delete</button>\
                            </td>\
                        </tr>'
                        );
                    });
                    $('#reference').append('<tr class="add_raw">\
                        <form>\
                            <td class="py-4 px-6"><input type="text" id="entered_reference_name" class="block p-2 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Institute" required></td>\
                            <td class="py-4 px-6"><input type="text" id="entered_reference_designation" class="block p-2 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Institute" required></td>\
                            <td class="py-4 px-6"><input type="text" id="entered_reference_address" class="block p-2 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Year" required></td>\
                            <td class="py-4 px-6"><input type="text" id="entered_reference_telephone" class="block p-2 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Class" required></td>\
                            <td class="py-4 px-6">\
                                <button type="button" id="submit_reference" class="py-2 px-3 text-xs font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">+ Add New</button>\
                            </td>\
                        </form>\
                    </tr>'
                    );
                    if(clickedit==0){
                        $('.add_raw').addClass('hidden');
                        $('.action').addClass('hidden');
                    }
                }
            });

            $('.skip').removeClass('get_reference_view');
            $('.skip').addClass('hidden');
            $('.previous').removeClass('get_employment_view');
            $('.previous').addClass('get_occupation_view');

        }

        //End reference view

        //Start submit school-----------------------------------------------------------
        //get view
        $(document).on('click', '.get_school_view', function(e){
            e.preventDefault();
            fetchOl();

            console.log("Hello_fetch1");

            $('#ol1_content').addClass('hidden');
            $('#ol2_content').addClass('hidden');
            $('#ol1_content').addClass('hidden');
            $('#ol2_content').addClass('hidden');
            $('#school_content').removeClass('hidden');

        });
        //End get view

        $(document).on('click', '#submit_school', function(e){
            e.preventDefault();

            console.log("Hello");
            var data = {
                'school' : $('#entered_school_name').val(),
                'from' : $('#entered_school_from').val(),
                'to' : $('#entered_school_to').val(),
                'application_id' : $('#application_id').val()
            }
            console.log(data);

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                method: "POST",
                url: "add-school",
                data: data,
                type: "json",

                success: function(response){
                    console.log(response);
                    if(response.status == 400){
                        $('#alert-danger').addClass('hidden');
                        $('#alert-danger_message').text(response.message);
                        $('#alert-danger').removeClass('hidden');
                        $(function(){
                            setTimeout(function(){
                                $('#alert-danger').addClass('hidden');
                            }, 5000);
                        });
                        fetchdata();
                    }
                    if(response.status == 200){
                        $('#alert-success').addClass('hidden');
                        $('#alert-success_message').text(response.message);
                        $('#alert-success').removeClass('hidden');
                        $('.next').removeAttr("disabled");
                        $('.next').addClass('get_ol_view');
                        $(function(){
                            setTimeout(function(){
                                $('#alert-success').addClass('hidden');
                            }, 5000);
                        });
                        fetchSchool();
                    }
                }
            });

        });
        //End Submit school------------------------------------------------------------------------------------------------------------------------------------------

        //Start submit ol-------------------------------------------------------------------------------------------------------------------------------------------
        //get view
        $(document).on('click', '.get_ol_view', function(e){
            e.preventDefault();
            fetchOl();

            console.log("Hello_fetch1");

            $('#al_content').addClass('hidden');
            $('#school_content').addClass('hidden');
            $('#ol1_content').removeClass('hidden');
            $('#ol2_content').removeClass('hidden');

        });
        //End get view

        //Start Add o/l 1
        $(document).on('click', '#submit_ol1', function(e){
            e.preventDefault();
            fetchOl();

            var shy=1;
            console.log("Hello");
            var data = {
                'subject' : $('#entered_ol1_subject').val(),
                'grade' : $('#entered_ol1_grade').val(),
                'year' : $('#entered_ol1_year').val(),
                'index' : $('#entered_ol1_index').val(),
                'application_id' : $('#application_id').val()
            }
            console.log(data);

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                method: "POST",
                url: "add-ol/"+shy,
                data: data,
                type: "json",

                success: function(response){
                    console.log(response);
                    if(response.status == 400){
                        $('#alert-danger').addClass('hidden');
                        $('#alert-danger_message').text(response.message);
                        $('#alert-danger').removeClass('hidden');
                        $(function(){
                            setTimeout(function(){
                                $('#alert-danger').addClass('hidden');
                            }, 5000);
                        });
                        fetchOl();
                    }
                    if(response.status == 200){
                        $('#alert-success').addClass('hidden');
                        $('#alert-success_message').text(response.message);
                        $('#alert-success').removeClass('hidden');
                        $('.next').removeAttr("disabled");
                        $('.next').removeClass('get_ol_view');
                        $('.next').addClass('get_al_view');
                        $(function(){
                            setTimeout(function(){
                                $('#alert-success').addClass('hidden');
                            }, 5000);
                        });
                        fetchOl();
                    }
                }
            });

        });
        //End add o/l1

        //Start Add o/l 2
        $(document).on('click', '#submit_ol2', function(e){
            e.preventDefault();
            fetchOl();


            var shy=2;
            console.log("Hello");
            var data = {
                'subject' : $('#entered_ol2_subject').val(),
                'grade' : $('#entered_ol2_grade').val(),
                'year' : $('#entered_ol2_year').val(),
                'index' : $('#entered_ol2_index').val(),
                'application_id' : $('#application_id').val()
            }
            console.log(data);

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                method: "POST",
                url: "add-ol/"+shy,
                data: data,
                type: "json",

                success: function(response){
                    console.log(response);
                    if(response.status == 400){
                        $('#alert-danger').addClass('hidden');
                        $('#alert-danger_message').text(response.message);
                        $('#alert-danger').removeClass('hidden');
                        $(function(){
                            setTimeout(function(){
                                $('#alert-danger').addClass('hidden');
                            }, 5000);
                        });
                        fetchOl();
                    }
                    if(response.status == 200){
                        $('#alert-success').addClass('hidden');
                        $('#alert-success_message').text(response.message);
                        $('#alert-success').removeClass('hidden');
                        $('.next').removeAttr("disabled");
                        $('.next').removeClass('get_ol_view');
                        $('.next').addClass('get_al_view');
                        $('.next').attr("id", "get_al_view");
                        $(function(){
                            setTimeout(function(){
                                $('#alert-success').addClass('hidden');
                            }, 5000);
                        });
                        fetchOl();
                    }
                }
            });

        });
        //End add o/l2

        //End Submit ol--------------------------------------------------------------------------------------------------------------------------------------


        //Start submit al---------------------------------------------------------------------------------------------------------------------------
        //get view
        $(document).on('click', '.get_al_view', function(e){
            e.preventDefault();
            fetchAl();

            console.log("Hello_fetch1");

            $('#university_content').addClass('hidden');
            $('#ol1_content').addClass('hidden');
            $('#ol2_content').addClass('hidden');
            $('#university_content').addClass('hidden');
            $('#al_content').removeClass('hidden');

        });
        //End get view

        //Start Add a/l
        $(document).on('click', '#submit_al', function(e){
            e.preventDefault();
            fetchOl();

            console.log("Hello");
            var data = {
                'subject' : $('#entered_al_subject').val(),
                'grade' : $('#entered_al_grade').val(),
                'year' : $('#entered_al_year').val(),
                'index' : $('#entered_al_index').val(),
                'application_id' : $('#application_id').val()
            }
            console.log(data);

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                method: "POST",
                url: "add-al",
                data: data,
                type: "json",

                success: function(response){
                    console.log(response);
                    if(response.status == 400){
                        $('#alert-danger').addClass('hidden');
                        $('#alert-danger_message').text(response.message);
                        $('#alert-danger').removeClass('hidden');
                        $(function(){
                            setTimeout(function(){
                                $('#alert-danger').addClass('hidden');
                            }, 5000);
                        });
                        fetchAl();
                    }
                    if(response.status == 200){
                        $('#alert-success').addClass('hidden');
                        $('#alert-success_message').text(response.message);
                        $('#alert-success').removeClass('hidden');
                        $('.next').removeAttr("disabled");
                        $('.next').removeClass('get_al_view');
                        $('.next').addClass('get_university_view');
                        $(function(){
                            setTimeout(function(){
                                $('#alert-success').addClass('hidden');
                            }, 5000);
                        });
                        fetchAl();
                    }
                }
            });

        });
        //End add a/l

        //End Submit al---------------------------------------------------------------------------------------------------------------------

        //Start submit University---------------------------------------------------------------------------------------------------------------------------
        //get view
        $(document).on('click', '.get_university_view', function(e){
            e.preventDefault();
            fetchUniversity();

            console.log("Hello_fetch1");

            $('#other_content').addClass('hidden');
            $('#al_content').addClass('hidden');
            $('#other_content').addClass('hidden');
            $('#university_content').removeClass('hidden');

        });
        //End get view

        //Start Add university
        $(document).on('click', '#submit_university', function(e){
            e.preventDefault();
            fetchUniversity();

            console.log("data");
            var data = {
                'institute' : $('#entered_university_institute').val(),
                'degree' : $('#entered_university_degree').val(),
                'year' : $('#entered_university_year').val(),
                'class' : $('#entered_university_class').val(),
                'date' : $('#entered_university_date').val(),
                'application_id' : $('#application_id').val()

            }
            console.log(data);

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                method: "POST",
                url: "add-university",
                data: data,
                type: "json",

                success: function(response){
                    console.log(response);
                    if(response.status == 400){
                        $('#alert-danger').addClass('hidden');
                        $('#alert-danger_message').text(response.message);
                        $('#alert-danger').removeClass('hidden');
                        $(function(){
                            setTimeout(function(){
                                $('#alert-danger').addClass('hidden');
                            }, 5000);
                        });
                        fetchUniversity();
                    }
                    if(response.status == 200){
                        $('#alert-success').addClass('hidden');
                        $('#alert-success_message').text(response.message);
                        $('#alert-success').removeClass('hidden');
                        $('.next').removeAttr("disabled");
                        $('.next').removeClass('get_university_view');
                        $('.next').addClass('get_other_view');
                        $(function(){
                            setTimeout(function(){
                                $('#alert-success').addClass('hidden');
                            }, 5000);
                        });
                        fetchUniversity();
                    }
                }
            });

        });
        //End add a/l

        //End Submit university---------------------------------------------------------------------------------------------------------------------

        //Start submit other---------------------------------------------------------------------------------------------------------------------------
        //get view
        $(document).on('click', '.get_other_view', function(e){
            e.preventDefault();
            fetchOther();

            console.log("Hello_fetch1");

            $('#professional_content').addClass('hidden');
            $('#university_content').addClass('hidden');
            $('#professional_content').addClass('hidden');
            $('#other_content').removeClass('hidden');

        });
        //End get view

        //Start Add other
        $(document).on('click', '#submit_other', function(e){
            e.preventDefault();
            fetchUniversity();

            console.log("data");
            var data = {
                'institute' : $('#entered_other_institute').val(),
                'course' : $('#entered_other_course').val(),
                'from' : $('#entered_other_from').val(),
                'to' : $('#entered_other_to').val(),
                'date' : $('#entered_other_date').val(),
                'application_id' : $('#application_id').val()
            }
            console.log(data);

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                method: "POST",
                url: "add-other",
                data: data,
                type: "json",

                success: function(response){
                    console.log(response);
                    if(response.status == 400){
                        $('#alert-danger').addClass('hidden');
                        $('#alert-danger_message').text(response.message);
                        $('#alert-danger').removeClass('hidden');
                        $(function(){
                            setTimeout(function(){
                                $('#alert-danger').addClass('hidden');
                            }, 5000);
                        });
                        fetchOther();
                    }
                    if(response.status == 200){
                        $('#alert-success').addClass('hidden');
                        $('#alert-success_message').text(response.message);
                        $('#alert-success').removeClass('hidden');
                        $('.next').removeAttr("disabled");
                        $('.next').removeClass('get_other_view');
                        $('.next').addClass('get_professional_view');
                        $(function(){
                            setTimeout(function(){
                                $('#alert-success').addClass('hidden');
                            }, 5000);
                        });
                        fetchOther();
                    }
                }
            });

        });
        //End add a/l

        //End Submit other---------------------------------------------------------------------------------------------------------------------

        //Start submit professional---------------------------------------------------------------------------------------------------------------------------
        //get view
        $(document).on('click', '.get_professional_view', function(e){
            e.preventDefault();
            fetchProfessional();

            console.log("Hello_fetch1");

            $('#employment_content').addClass('hidden');
            $('#other_content').addClass('hidden');
            $('#employment_content').addClass('hidden');
            $('#professional_content').removeClass('hidden');

        });
        //End get view

        //Start Add professional
        $(document).on('click', '#submit_professional', function(e){
            e.preventDefault();
            fetchProfessional();

            console.log("data");
            var data = {
                'institute' : $('#entered_pro_institute').val(),
                'course' : $('#entered_pro_course').val(),
                'from' : $('#entered_pro_from').val(),
                'to' : $('#entered_pro_to').val(),
                'date' : $('#entered_pro_date').val(),
                'application_id' : $('#application_id').val()

            }
            console.log(data);

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                method: "POST",
                url: "add-professional",
                data: data,
                type: "json",

                success: function(response){
                    console.log(response);
                    if(response.status == 400){
                        $('#alert-danger').addClass('hidden');
                        $('#alert-danger_message').text(response.message);
                        $('#alert-danger').removeClass('hidden');
                        $(function(){
                            setTimeout(function(){
                                $('#alert-danger').addClass('hidden');
                            }, 5000);
                        });
                        fetchProfessional();
                    }
                    if(response.status == 200){
                        $('#alert-success').addClass('hidden');
                        $('#alert-success_message').text(response.message);
                        $('#alert-success').removeClass('hidden');
                        $('.next').removeAttr("disabled");
                        $('.next').removeClass('get_professional_view');
                        $('.next').addClass('get_employment_view');
                        $(function(){
                            setTimeout(function(){
                                $('#alert-success').addClass('hidden');
                            }, 5000);
                        });
                        fetchProfessional();
                    }
                }
            });

        });
        //End add professional

        //End Submit professional---------------------------------------------------------------------------------------------------------------------

        //Start submit employment---------------------------------------------------------------------------------------------------------------------------
        //get view
        $(document).on('click', '.get_employment_view', function(e){
            e.preventDefault();
            fetchEmployment();

            $('#occupation_content').addClass('hidden');
            $('#professional_content').addClass('hidden');
            $('#occupation_content').addClass('hidden');
            $('#employment_content').removeClass('hidden');

        });
        //End get view

        //Start Add professional
        $(document).on('click', '#submit_employment', function(e){
            e.preventDefault();
            fetchEmployment();

            console.log("data");
            var data = {
                'post' : $('#entered_employment_post').val(),
                'institute' : $('#entered_employment_institute').val(),
                'from' : $('#entered_employment_from').val(),
                'to' : $('#entered_employment_to').val(),
                'application_id' : $('#application_id').val()
            }
            console.log(data);

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                method: "POST",
                url: "add-employment",
                data: data,
                type: "json",

                success: function(response){
                    console.log(response);
                    if(response.status == 400){
                        $('#alert-danger').addClass('hidden');
                        $('#alert-danger_message').text(response.message);
                        $('#alert-danger').removeClass('hidden');
                        $(function(){
                            setTimeout(function(){
                                $('#alert-danger').addClass('hidden');
                            }, 5000);
                        });
                        fetchEmployment();
                    }
                    if(response.status == 200){
                        $('#alert-success').addClass('hidden');
                        $('#alert-success_message').text(response.message);
                        $('#alert-success').removeClass('hidden');
                        $('.next').removeAttr("disabled");
                        $('.next').removeClass('get_employment_view');
                        $('.next').addClass('get_occupation_view');
                        $(function(){
                            setTimeout(function(){
                                $('#alert-success').addClass('hidden');
                            }, 5000);
                        });
                        fetchEmployment();
                    }
                }
            });

        });
        //End add professional

        //End Submit employment---------------------------------------------------------------------------------------------------------------------

        //Start submit occupation---------------------------------------------------------------------------------------------------------------------------
        //get view
        $(document).on('click', '.get_occupation_view', function(e){
            e.preventDefault();
            fetchOccupation();

            $('#employment_content').addClass('hidden');
            $('#reference_content').addClass('hidden');
            $('#reference_content').addClass('hidden');
            $('#occupation_content').removeClass('hidden');

        });
        //End get view

        //Start Add occupation
        $(document).on('click', '#submit_occupation', function(e){
            e.preventDefault();
            fetchOccupation();

            console.log("data");
            var data = {
                'post' : $('#entered_occupation_post').val(),
                'institute' : $('#entered_occupation_institute').val(),
                'salary' : $('#entered_occupation_salary').val(),
                'from' : $('#entered_occupation_from').val(),
                'application_id' : $('#application_id').val()
            }
            console.log(data);

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                method: "POST",
                url: "add-occupation",
                data: data,
                type: "json",

                success: function(response){
                    console.log(response);
                    if(response.status == 400){
                        $('#alert-danger').addClass('hidden');
                        $('#alert-danger_message').text(response.message);
                        $('#alert-danger').removeClass('hidden');
                        $(function(){
                            setTimeout(function(){
                                $('#alert-danger').addClass('hidden');
                            }, 5000);
                        });
                        fetchOccupation();
                    }
                    if(response.status == 200){
                        $('#alert-success').addClass('hidden');
                        $('#alert-success_message').text(response.message);
                        $('#alert-success').removeClass('hidden');
                        $('.next').removeAttr("disabled");
                        $('.next').removeClass('get_occupation_view');
                        $('.next').addClass('get_reference_view');
                        $(function(){
                            setTimeout(function(){
                                $('#alert-success').addClass('hidden');
                            }, 5000);
                        });
                        fetchOccupation();
                    }
                }
            });

        });
        //End add occupation

        //End Submit occupation---------------------------------------------------------------------------------------------------------------------

        //Start submit reference---------------------------------------------------------------------------------------------------------------------------
        //get view
        $(document).on('click', '.get_reference_view', function(e){
            e.preventDefault();
            fetchReference();

            $('#occupation_content').addClass('hidden');
            $('#reference_content').removeClass('hidden');

        });
        //End get view

        //Start Add reference
        $(document).on('click', '#submit_reference', function(e){
            e.preventDefault();
            fetchReference();


            console.log("data");
            var data = {
                'name' : $('#entered_reference_name').val(),
                'designation' : $('#entered_reference_designation').val(),
                'address' : $('#entered_reference_address').val(),
                'telephone' : $('#entered_reference_telephone').val(),
                'application_id' : $('#application_id').val()
            }
            console.log(data);

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                method: "POST",
                url: "add-reference",
                data: data,
                type: "json",

                success: function(response){
                    console.log(response);
                    if(response.status == 400){
                        $('#alert-danger').addClass('hidden');
                        $('#alert-danger_message').text(response.message);
                        $('#alert-danger').removeClass('hidden');
                        $(function(){
                            setTimeout(function(){
                                $('#alert-danger').addClass('hidden');
                            }, 5000);
                        });
                        fetchReference();
                    }
                    if(response.status == 200){
                        $('#alert-success').addClass('hidden');
                        $('#alert-success_message').text(response.message);
                        $('#alert-success').removeClass('hidden');
                        $('.next').removeAttr("disabled");
                        $('.next').removeClass('get_occupation_view');
                        $(function(){
                            setTimeout(function(){
                                $('#alert-success').addClass('hidden');
                            }, 5000);
                        });
                        fetchReference();
                    }
                }
            });

        });
        //End add reference

        //End Submit reference-------------------------------------------------------------------------------------------------------------------





        //Delete
        $(document).on('click', '.delete', function (e) {
            console.log("Hello delete");
            e.preventDefault();
            var id = this.getAttribute('value');
            var table = this.getAttribute('data-value');
            var fun= this.getAttribute('data-value3');

            //Send to box
            $('#delete_id').val(id);
            $('#delete_table').val(table);
            $('#delete_fun').val(fun);

            $('.deletespan').append('"Test ID '+id+'"?');
            $('#available_test_delete-modal').removeClass('hidden');
            $('#available_test_delete-modal').addClass('flex');
            $('#available_test_delete-modal').attr('role','dialog');
            $('#available_test_delete-modal').attr('aria-modal','true');
            $('#available_test_delete-modal').removeAttr('aria-hidden');
            $('body').append('<div id="bg_bluer1" class="bg-gray-900 bg-opacity-50 dark:bg-opacity-80 fixed inset-0 z-40"></div><div id="bg_bluer2" class="bg-gray-900 bg-opacity-50 dark:bg-opacity-80 fixed inset-0 z-40"></div>');

        });


        $(document).on('click', '.available_test_delete_confirm', function (e) {
            e.preventDefault();

            //Show deleting..
            //$(this).text("Deleting...");

            var id = $('#delete_id').val();
            var table = $('#delete_table').val();
            var fun = $('#delete_fun').val();

            var data = {
                'id' : id,
                'table' : table
            }
            console.log(data);

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                method: "delete",
                url: "delete-appliciant-item",
                data: data,
                type: "json",
                success: function (response) {
                    $('#available_test_delete-modal').addClass('hidden');
                    $('#bg_bluer1,#bg_bluer2').remove();
                    $('#alert-success').addClass('hidden');
                    $('#alert-success').removeClass('hidden');
                    $('#alert-success_message').text(response.message);
                    $(function(){
                        setTimeout(function(){
                            $('#alert-success').addClass('hidden');
                        }, 5000);
                    });
                    eval(fun+"()");

                }

            });
        });
        //End Delete


        //close button
        $(document).on('click', '.decline', function (e) {
            e.preventDefault();
            $('#alert-success').addClass('hidden');
            $('#alert-danger').addClass('hidden');
            $('#alert-success_message').html("");
            $('#alert-danger_message').html("");
            $('#available_test_delete-modal').addClass('hidden');
            $('#bg_bluer1,#bg_bluer2').remove();
        });
        //End Education Qualification


        //Start edit Application---------------------------------------------------------------------------------------------------------------------------------------------------------------------
        $(document).on('click', '#edit', function (e) {
            e.preventDefault();
            clickedit=1;
            $('input').removeAttr("disabled");
            $('select').removeAttr("disabled");
            $('.action').removeClass('hidden');
            $('.add_raw').removeClass('hidden');
            $('#save_changes').removeClass('hidden');
            $('#edit').addClass('hidden');

        });
        //End edit Application-----------------------------------------------------------------------------------------------------------------------------------------------------------------------

        //Start update Application---------------------------------------------------------------------------------------------------------------------------------------------------------------------
        $(document).on('click', '#save_changes', function (e) {
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
            if(!$('#dob').val()){
                $('#dob').removeClass('bg-gray-50 border border-gray-300 text-gray-900 placeholder-gray-400 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600');
                $('#dob').removeClass('bg-green-50 border border-green-500');
                $('#dob').addClass('bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 dark:bg-red-100 dark:border-red-400');
                $('#dob2').addClass('text-red-600 dark:text-red-500');
                $('#dob').closest(".mb-6").find('#dob1').append('<p class="warning mt-2 text-sm text-red-600 dark:text-red-500">This field is Required!</p>');
                x=1;
                console.log("dob");
            }
            if(!$('#civil_status').val()){
                $('#civil_status').removeClass('bg-gray-50 border border-gray-300 text-gray-900 placeholder-gray-400 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600');
                $('#civil_status').removeClass('bg-green-50 border border-green-500');
                $('#civil_status').addClass('bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 dark:bg-red-100 dark:border-red-400');
                $('#civil2').addClass('text-red-600 dark:text-red-500');
                $('#civil_status').closest(".mb-6").find('#civil1').append('<p class="warning mt-2 text-sm text-red-600 dark:text-red-500">This field is Required!</p>');
                x=1;
                console.log("cvil");
            }
            if(!$('#age_years').val()){
                $('#age_years').removeClass('bg-gray-50 border border-gray-300 text-gray-900 placeholder-gray-400 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600');
                $('#age_years').removeClass('bg-green-50 border border-green-500');
                $('#age_years').addClass('bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 dark:bg-red-100 dark:border-red-400');
                $('#age_years2').addClass('text-red-600 dark:text-red-500');
                $('.caption_aacd').addClass('text-red-600 dark:text-red-500');
                $('#age_years').closest(".mb-6").find('#age_years1').append('<p class="warning mt-2 text-sm text-red-600 dark:text-red-500">This field is Required!</p>');
                x=1;
                console.log("age_years");
            }
            if(!$('#age_months').val()){
                $('#age_months').removeClass('bg-gray-50 border border-gray-300 text-gray-900 placeholder-gray-400 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600');
                $('#age_months').removeClass('bg-green-50 border border-green-500');
                $('#age_months').addClass('bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 dark:bg-red-100 dark:border-red-400');
                $('#age_months2').addClass('text-red-600 dark:text-red-500');
                $('.caption_aacd').addClass('text-red-600 dark:text-red-500');
                $('#age_months').closest(".mb-6").find('#age_months1').append('<p class="warning mt-2 text-sm text-red-600 dark:text-red-500">This field is Required!</p>');
                x=1;
                console.log("age_month");
            }
            if(!$('#age_days').val()){
                $('#age_days').removeClass('bg-gray-50 border border-gray-300 text-gray-900 placeholder-gray-400 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600');
                $('#age_days').removeClass('bg-green-50 border border-green-500');
                $('#age_days').addClass('bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 dark:bg-red-100 dark:border-red-400');
                $('#age_days2').addClass('text-red-600 dark:text-red-500');
                $('.caption_aacd').addClass('text-red-600 dark:text-red-500');
                $('#age_days').closest(".mb-6").find('#age_days1').append('<p class="warning mt-2 text-sm text-red-600 dark:text-red-500">This field is Required!</p>');
                x=1;
                console.log("age_days");
            }
            if(!$('#guilty_status').val()){
                $('#guilty_status').removeClass('bg-gray-50 border border-gray-300 text-gray-900 placeholder-gray-400 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600');
                $('#guilty_status').removeClass('bg-green-50 border border-green-500');
                $('#guilty_status').addClass('bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 dark:bg-red-100 dark:border-red-400');
                $('#guilty_status').closest(".mb-6").find(".caption").addClass('text-red-600 dark:text-red-500');
                $('#guilty_status').closest(".mb-6").append('<p class="warning mt-2 text-sm text-red-600 dark:text-red-500">This field is Required!</p>');
                x=1;
                console.log("guilty_status");
            }

            if(x==0){
                console.log("in else");

                var data = {
                    //'desig_id': $('#desig_id').val(),
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
                    method: "POST",
                    url: "update-application",
                    data: data,
                    type: "json",

                    success: function(response){
                        console.log(response);
                        if(response.status == 400){
                            $('#alert-danger').addClass('hidden');
                            $('#alert-danger_message').text(response.message);
                            $('#alert-danger').removeClass('hidden');
                            $(function(){
                                setTimeout(function(){
                                    $('#alert-danger').addClass('hidden');
                                }, 5000);
                            });

                        }
                        if(response.status == 200){
                            console.log("hello");
                            $('#alert-success').addClass('hidden');
                            $('#alert-success_message').text(response.message);
                            $('#alert-success').removeClass('hidden');
                            // $('.next').removeAttr("disabled");
                            // $('.next').removeClass('get_occupation_view');
                            $(function(){
                                setTimeout(function(){
                                    $('#alert-success').addClass('hidden');
                                }, 5000);
                            });
                            fetchData();
                            fetchSchool();
                            fetchOl();
                            fetchAl();
                            fetchUniversity();
                            fetchOther();
                            fetchProfessional();
                            fetchEmployment();
                            fetchOccupation();
                            fetchReference();

                            console.log("hiiii");
                            clickedit=0;
                            $('.inp').prop( "disabled", true );
                            $('.action').addClass('hidden');
                            $('.add_raw').addClass('hidden');
                            $('#save_changes').addClass('hidden');
                            $('#edit').removeClass('hidden');

                        }
                    }
                });

            }

        });
        //End update Application-----------------------------------------------------------------------------------------------------------------------------------------------------------------------


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
