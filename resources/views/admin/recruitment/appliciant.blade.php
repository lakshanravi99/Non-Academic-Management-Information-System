@extends('admin.admin_master_custom')
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
        .table td{
            padding: 8px !important;
        }
        table{
            margin: 20px 0px;
        }
    </style>



    <div class="content">
        <!-- Start Delete Model -->
        <div id="confirm_reject_modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 md:inset-0 h-modal md:h-full" style="z-index:999 !important">
            <div class="relative p-4 w-full max-w-md h-full md:h-auto">
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <button type="button" class="decline absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                    <div class="p-6 text-center">
                        <svg aria-hidden="true" class="mx-auto mb-4 w-14 h-14 text-gray-400 dark:text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to Reject <span id="deletespan"></span></h3>
                        <input type="hidden" id="reject_id">
                        <button type="button" class="confirm_reject_button available_test_delete_confirm text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                            Yes, I'm sure
                        </button>
                        <button type="button" class="decline text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No, cancel</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- End delete Model -->

        <!-- Start approve application Model -->
        <div id="confirm_approve_modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 md:inset-0 h-modal md:h-full" style="z-index:999 !important">
            <div class="relative p-4 w-full max-w-md h-full md:h-auto">
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <button type="button" class="decline absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                    <div class="p-6 text-center">
                        <svg aria-hidden="true" class="mx-auto mb-4 w-14 h-14 text-gray-400 dark:text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to Approve <span id="deletespan1"></span></h3>
                        <input type="hidden" id="approved_id">
                        <button type="button" class="confirm_approve_button focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:focus:ring-yellow-900">
                            Yes, I'm sure
                        </button>
                        <button type="button" class="decline text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No, cancel</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- End approve application Model -->

        <!-- Start approve application Model -->
        <div id="confirm_select_modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 md:inset-0 h-modal md:h-full" style="z-index:999 !important">
            <div class="relative p-4 w-full max-w-md h-full md:h-auto">
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <button type="button" class="decline absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                    <div class="p-6 text-center">
                        <svg aria-hidden="true" class="mx-auto mb-4 w-14 h-14 text-gray-400 dark:text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to Select <span id="deletespan2"></span></h3>
                        <input type="hidden" id="select_id">
                        <button type="button" class="confirm_select_button focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                            Yes, I'm sure
                        </button>
                        <button type="button" class="decline text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No, cancel</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- End approve application Model -->

        <!-- More Model -->
        <div id="view-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full" style="z-index:998 !important;padding-left: 10%;">
            <div class="relative p-4 w-full max-w-4xl h-full md:h-auto">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700" style="width:1200px">
                    <!-- <div class="scrollable"  style="overflow: scroll;"> -->
                    <!-- Modal header -->
                    <div class="flex justify-between items-center p-5 rounded-t border-b dark:border-gray-600">
                        <h3 class="text-xl font-medium text-gray-900 dark:text-white">
                            Employee Details
                        </h3>

                        <!-- Start alert danger -->
                        <div id="alert-danger_reject" class="hidden flex p-4 mb-4 bg-red-100 rounded-lg dark:bg-red-200 mt-2" role="alert">
                            <svg aria-hidden="true" class="flex-shrink-0 w-5 h-5 text-red-700 dark:text-red-800" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                            <span class="sr-only">Info</span>
                            <div id="alert-danger_reject_message" class="ml-3 text-sm font-medium text-red-700 dark:text-red-800">

                            </div>
                            <button type="button" class="decline_alert ml-auto -mx-1.5 -my-1.5 bg-red-100 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex h-8 w-8 dark:bg-red-200 dark:text-red-600 dark:hover:bg-red-300" data-dismiss-target="#alert-danger_test" aria-label="Close">
                                <span class="sr-only">Close</span>
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                            </button>
                        </div>
                        <!-- End alert danger -->

                        <!-- Start alert sucess -->
                        <div id="alert-success_test" class="hidden flex p-4 mb-4 bg-green-100 rounded-lg dark:bg-green-200" role="alert">
                            <svg aria-hidden="true" class="flex-shrink-0 w-5 h-5 text-green-700 dark:text-green-800" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                            <span class="sr-only">Info</span>
                            <div id="alert-success_test_message" class="ml-3 text-sm font-medium text-green-700 dark:text-green-800">

                            </div>
                            <button type="button" class="decline_alert ml-auto -mx-1.5 -my-1.5 bg-green-100 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex h-8 w-8 dark:bg-green-200 dark:text-green-600 dark:hover:bg-green-300" aria-label="Close">
                                <span class="sr-only">Close</span>
                                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                            </button>
                        </div>
                        <!-- End alert sucess -->

                        <button type="button" class="decline_more text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white">
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="p-6 space-y-6" id="modal_body">
                        <div id="more_details" style="display: flex; justify-content: space-around; align-items: flex-start; text-align:justify">
                            <div class="div1 p-6" style="width: 20%" id="div_10">
                                <div class="col-span-6 pic">
                                    <div class="profile-pic-div">
                                        <img src="{{asset('docs/image.jpg')}}" id="photo">
{{--                                        <input type="file" id="file">--}}
{{--                                        <label for="file" id="uploadBtn">Choose Photo</label>--}}
                                    </div>
                                    <label class="caption block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400"  style="width:118px;" for="regular-form-2">චායාරූපය<br>Your Photo</label>
                                </div>
                                <div id="button_div"></div>

                            </div>
                            <br>

                            <div class="div2 p-6" style="width: 50%">
                                <!-- Tab 1 -->
                                <div class="tab" id="tab1">
                                    <div class="mb-6">
                                        <div class="grid grid-cols-12 gap-4">

                                            <div class="col-span-6">
                                                <div>
                                                    <label class="caption block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400"  style="width:118px;" for="regular-form-2">මයා/මිය/මෙනවිය<br>Mr/Mis/Misis</label>
                                                    <select disabled class="inp field bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 col-span-6" name="gender" id="gender">
                                                        <option id="gender_value" value="" selected disabled hidden>Choose here</option>
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
                                        <input class="inp field bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="initial" name="initial" placeholder="Initial" type="text">
                                    </div>
                                    <div class="mb-6">
                                        <label class="caption block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400" for="regular-form-2">නම<br>Name</label>
                                        <div class="grid grid-cols-12 gap-4">
                                            <input aria-label="default input inline 1" class="inp field bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 col-span-4" id="fname" name="fname" placeholder="First Name" type="text">
                                            <input aria-label="default input inline 2" class="inp field bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 col-span-4" id="mname" name="mname" placeholder="Middle Name" type="text" value=" ">
                                            <input aria-label="default input inline 3" class="inp field bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 col-span-4" id="lname" name="lname" placeholder="Last Name" type="text" value=" ">
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
                                            <input aria-label="default input inline 1" class="inp field3 field3_1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 col-span-4" value1="cal1" name="current_address_line1" id="current_address_line1" placeholder="Address Line 1" type="text">
                                            <input aria-label="default input inline 2" class="inp field3 field3_2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 col-span-4" value1="cal2" name="current_address_line2" id="current_address_line2" placeholder="Address Line 2" type="text">
                                            <input aria-label="default input inline 3" class="inp field3 field3_3 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 col-span-4" value1="cal3" name="current_address_line3" id="current_address_line3" placeholder="Address Line 3" type="text" value=" ">
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
                                            <input aria-label="default input inline 1" class="inp field3 field3_1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 col-span-4" value1="pal1" name="permenent_address_line1" id="permenent_address_line1" placeholder="Address Line 1" type="text">
                                            <input aria-label="default input inline 2" class="inp field3 field3_2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 col-span-4" value1="pal2" name="permenent_address_line2" id="permenent_address_line2" placeholder="Address Line 2" type="text">
                                            <input aria-label="default input inline 3" class="inp field3 field3_3 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 col-span-4" value1="pal3" name="permenent_address_line3" id="permenent_address_line3" placeholder="Address Line 3" type="text" value=" ">
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
                                                <label class="caption block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400" for="regular-form-2">ජංගම දුරකථන අංකය<br>Mobile phone Number</label>
                                                <input aria-label="default input inline 1" class="inp field bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 col-span-4" value1="htn" name="current_mobile" id="current_mobile" placeholder="Home phone Number" type="text">
                                                <div class="col-span-4 gap-4" id="htn"></div>
                                            </div>
                                            <div class="col-span-4">
                                                <label class="caption block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400" for="regular-form-2">ගෘහස්ථ දුරකථන අංකය<br>Home phone Number</label>
                                                <input aria-label="default input inline 2" class="inp field bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 col-span-4" value1="mpn" name="permenant_mobile" id="permenant_mobile" placeholder="Mobile phone Number" type="text" value=" ">
                                                <div class="col-span-4 gap-4" id="mpn"></div>
                                            </div>
                                            <div class="col-span-4">
                                                <label class="caption block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400" for="regular-form-2">විද්‍යුත් තැපැල් ලිපිනය<br>Email Address</label>
                                                <select class="inp field bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 col-span-4" id="email" name="email" required="">
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
                                                <label class="caption block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300" for="">ජාතික හැදුනුම්පත් අංකය<br>National Identity Card Number</label>
                                                <input class="inp field bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 col-span-6" id="nic" name="nic" placeholder="National Identity Card Number" type="text">
                                            </div>
                                            <div class="col-span-6">
                                                <label class="caption block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300" for="">පුරවැසි භාවය<br>Citizenship</label>
                                                <select class="inp field bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 col-span-6" id="citizenship" name="citizenship" required="">
                                                    <option id="citizenship_value" value="" hidden>Choose here</option>
                                                    <option value="by Decent">
                                                        පෙළපතිනි/By Decent
                                                    </option>
                                                    <option value="by registration">
                                                        ලියාපදිංචි වීමෙනි/By Registration
                                                    </option>
                                                </select>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="mb-6">
                                        <label class="caption block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300" for="regular-form-2">පොලිස් කොට්ඨාශය<br>Police Devision</label>
                                        <input class="inp field bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="police_division" name="police_division" placeholder="Police Devision" type="text">
                                    </div>

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

                                            </tr>
                                            </thead>
                                            <tbody id="reference">

                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- End references table -->
                                </div>

                                <!-- End tab1 -->



                            </div>


                            <div class="div3 p-6" style="width: 30%">
                                <!-- Start tab2 -->
                                <div class="tab" id="tab2">
                                    <div class="mb-6">
                                        <div class="grid grid-cols-12 gap-4">
                                            <div class="col-span-6">
                                                <label class="caption block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300" for="regular-form-2">උපන් දිනය<br>Date of Birth</label>
                                                <input aria-label="default input inline 1" name="dob" id="dob" class="inp field bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 col-span-6" placeholder="Date of Birth" type="date">
                                            </div>
                                            <div class="col-span-6">
                                                <label class="caption block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300" for="regular-form-2">විවාහක/අවිවාහක බව<br>Marital Status</label>
                                                <select class="inp field bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 col-span-6" id="civil_status" name="civil_status" required="">
                                                    <option id="civil_status_value" value="" hidden>Choose here</option>
                                                    <option value="unmarried">
                                                        අවිවාහක/Unmarried
                                                    </option>
                                                    <option value="married">
                                                        විවාහක/Married
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-6">
                                        <div>
                                            <label class="caption block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300" for="regular-form-2">අයදුම්පත් භාරගන්නා අවසාන දිනට වයස<br>Age as at Closing date</label>
                                        </div>
                                        <div class="grid grid-cols-12 gap-4">
                                            <div class="col-span-4">
                                                <label class="caption block mb-2 text-sm font-medium text-gray-600 dark:text-gray-300" for="regular-form-2">අවුරුදු<br>Years</label>
                                                <input aria-label="default input inline 1" class="inp field bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 col-span-3" name="age_years" id="age_years" placeholder="Years" type="number">
                                            </div>
                                            <div class="col-span-4">
                                                <label class="caption block mb-2 text-sm font-medium text-gray-600 dark:text-gray-300" for="regular-form-2">මාස<br>Months</label>
                                                <input aria-label="default input inline 2" class="inp field bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 col-span-3" name="age_months" id="age_months" placeholder="Months" type="number">
                                            </div>
                                            <div class="col-span-4">
                                                <label class="caption block mb-2 text-sm font-medium text-gray-600 dark:text-gray-300" for="regular-form-2">දින<br>Days</label>
                                                <input aria-label="default input inline 2" class="inp field bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 col-span-3" name="age_days" id="age_days" placeholder="Days" type="number">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-6">
                                        <label for="message" class="caption block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">ක්‍රීඩා කුසලතා වෙනත් සුදුසුකම්<br>Sport Activity & Other Qualifications</label>
                                        <textarea id="sport_activity" name="sport_activity" rows="4" class="inp field block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Sport Activity & Other Qualifications..." value=" "></textarea>
                                    </div>

                                    <div class="mb-6">
                                        <label class="caption block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300" for="regular-form-2">කවර හෝ චෝදනාවක් සඳහා ඔබ කවර කලකදී හෝ උසාවියකදී වැරදිකරු වී තිබේද?<br>How you ever been found guilty in a court of low at any time for any charges?</label>
                                        <select class="inp field bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 col-span-6" id="guilty_status" name="guilty_status">
                                            <option id="guilty_status_value" value=" "hidden>Choose here</option>
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
                                        <textarea id="guilty_description" name="guilty_description" rows="4" class="inp field block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="If yes, state particulars..."></textarea>
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
                                                    <input aria-label="default input inline 1" class="inp field bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 col-span-6" name="driving_licence_no" id="driving_licence_no" placeholder="Driving Licence Number" type="text" value=" ">
                                                </div>
                                                <div class="col-span-6">
                                                    <label class="caption block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300" for="regular-form-2">රියදුරු බලපත්‍රය නිකුත් කළ දිනය<br>Driving Licence Issuied Date</label>
                                                    <input aria-label="default input inline 1" class="inp field bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 col-span-6" name="driving_licence_issuied_date" id="driving_licence_issuied_date" type="date" value=" ">
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
                                                            <input aria-label="default input inline 1" class="inp field bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 col-span-3" id="height_feets" name="height_feets" placeholder="Feets" type="number" value=" ">
                                                        </div>
                                                        <div class="col-span-3 flex">
                                                            <input aria-label="default input inline 1" class="inp field bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 col-span-3" id="height_inches" name="height_inches" placeholder="Inches" type="number" value=" ">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-span-6 gap-4">
                                                    <label class="caption block mb-2 text-sm font-medium text-gray-600 dark:text-gray-300" for="regular-form-2">පපුව<br>Chest</label>
                                                    <div class="col-span-12">
                                                        <div class="flex">
                                                            <input aria-label="default input inline 2" class="inp field bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 col-span-3" name="chest" id="chest" placeholder="Inches" type="number" value=" ">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End tab2 -->
                            </div>


                        </div>

                    </div>
                    <!-- Modal footer -->
                    <div class="flex items-center p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
                    </div>
                    <!-- </div> -->
                </div>
            </div>
        </div>
        <!-- End More model -->





        <!-- BEGIN: Top Bar -->
        <div class="top-bar">

            <!-- BEGIN: Breadcrumb -->
            <nav aria-label="breadcrumb" class="-intro-x mr-auto hidden sm:flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Application</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                </ol>
            </nav>
            <!-- END: Breadcrumb -->
            <!-- BEGIN: Search -->
            <div class="intro-x relative mr-3 sm:mr-6">
                <div class="search hidden sm:block">
                    <input type="text" class="search__input form-control border-transparent" placeholder="Search...">
                    <i data-lucide="search" class="search__icon dark:text-slate-500"></i>
                </div>
                <a class="notification sm:hidden" href=""> <i data-lucide="search" class="notification__icon dark:text-slate-500"></i> </a>
                <div class="search-result">
                    <div class="search-result__content">
                        <div class="search-result__content__title">Pages</div>
                        <div class="mb-5">
                            <a href="" class="flex items-center">
                                <div class="w-8 h-8 bg-success/20 dark:bg-success/10 text-success flex items-center justify-center rounded-full"> <i class="w-4 h-4" data-lucide="inbox"></i> </div>
                                <div class="ml-3">Mail Settings</div>
                            </a>
                            <a href="" class="flex items-center mt-2">
                                <div class="w-8 h-8 bg-pending/10 text-pending flex items-center justify-center rounded-full"> <i class="w-4 h-4" data-lucide="users"></i> </div>
                                <div class="ml-3">Users & Permissions</div>
                            </a>
                            <a href="" class="flex items-center mt-2">
                                <div class="w-8 h-8 bg-primary/10 dark:bg-primary/20 text-primary/80 flex items-center justify-center rounded-full"> <i class="w-4 h-4" data-lucide="credit-card"></i> </div>
                                <div class="ml-3">Transactions Report</div>
                            </a>
                        </div>
                        <div class="search-result__content__title">Users</div>
                        <div class="mb-5">
                            <a href="" class="flex items-center mt-2">
                                <div class="w-8 h-8 image-fit">
                                    <img alt="Midone - HTML Admin Template" class="rounded-full" src="dist/images/profile-6.jpg">
                                </div>
                                <div class="ml-3">Lakshan Ravi</div>
                                <div class="ml-auto w-48 truncate text-slate-500 text-xs text-right">ravindumohottala@gmail.com</div>
                            </a>
                            <a href="" class="flex items-center mt-2">
                                <div class="w-8 h-8 image-fit">
                                    <img alt="Midone - HTML Admin Template" class="rounded-full" src="dist/images/profile-2.jpg">
                                </div>
                                <div class="ml-3">Leonardo DiCaprio</div>
                                <div class="ml-auto w-48 truncate text-slate-500 text-xs text-right">leonardodicaprio@left4code.com</div>
                            </a>
                            <a href="" class="flex items-center mt-2">
                                <div class="w-8 h-8 image-fit">
                                    <img alt="Midone - HTML Admin Template" class="rounded-full" src="dist/images/profile-12.jpg">
                                </div>
                                <div class="ml-3">Robert De Niro</div>
                                <div class="ml-auto w-48 truncate text-slate-500 text-xs text-right">robertdeniro@left4code.com</div>
                            </a>
                            <a href="" class="flex items-center mt-2">
                                <div class="w-8 h-8 image-fit">
                                    <img alt="Midone - HTML Admin Template" class="rounded-full" src="dist/images/profile-15.jpg">
                                </div>
                                <div class="ml-3">Russell Crowe</div>
                                <div class="ml-auto w-48 truncate text-slate-500 text-xs text-right">russellcrowe@left4code.com</div>
                            </a>
                        </div>
                        <div class="search-result__content__title">Products</div>
                        <a href="" class="flex items-center mt-2">
                            <div class="w-8 h-8 image-fit">
                                <img alt="Midone - HTML Admin Template" class="rounded-full" src="dist/images/preview-11.jpg">
                            </div>
                            <div class="ml-3">Sony A7 III</div>
                            <div class="ml-auto w-48 truncate text-slate-500 text-xs text-right">Photography</div>
                        </a>
                        <a href="" class="flex items-center mt-2">
                            <div class="w-8 h-8 image-fit">
                                <img alt="Midone - HTML Admin Template" class="rounded-full" src="dist/images/preview-5.jpg">
                            </div>
                            <div class="ml-3">Dell XPS 13</div>
                            <div class="ml-auto w-48 truncate text-slate-500 text-xs text-right">PC &amp; Laptop</div>
                        </a>
                        <a href="" class="flex items-center mt-2">
                            <div class="w-8 h-8 image-fit">
                                <img alt="Midone - HTML Admin Template" class="rounded-full" src="dist/images/preview-4.jpg">
                            </div>
                            <div class="ml-3">Samsung Q90 QLED TV</div>
                            <div class="ml-auto w-48 truncate text-slate-500 text-xs text-right">Electronic</div>
                        </a>
                        <a href="" class="flex items-center mt-2">
                            <div class="w-8 h-8 image-fit">
                                <img alt="Midone - HTML Admin Template" class="rounded-full" src="dist/images/preview-13.jpg">
                            </div>
                            <div class="ml-3">Samsung Q90 QLED TV</div>
                            <div class="ml-auto w-48 truncate text-slate-500 text-xs text-right">Electronic</div>
                        </a>
                    </div>
                </div>
            </div>
            <!-- END: Search -->


            <!-- BEGIN: Notifications -->
            <div class="intro-x dropdown mr-auto sm:mr-6">
                <div class="dropdown-toggle notification notification--bullet cursor-pointer" role="button" aria-expanded="false" data-tw-toggle="dropdown"> <i data-lucide="bell" class="notification__icon dark:text-slate-500"></i> </div>
                <div class="notification-content pt-2 dropdown-menu">
                    <div class="notification-content__box dropdown-content">
                        <div class="notification-content__title">Notifications</div>
                        <div class="cursor-pointer relative flex items-center ">
                            <div class="w-12 h-12 flex-none image-fit mr-1">
                                <img alt="Midone - HTML Admin Template" class="rounded-full" src="dist/images/profile-6.jpg">
                                <div class="w-3 h-3 bg-success absolute right-0 bottom-0 rounded-full border-2 border-white dark:border-darkmode-600"></div>
                            </div>
                            <div class="ml-2 overflow-hidden">
                                <div class="flex items-center">
                                    <a href="javascript:;" class="font-medium truncate mr-5">Al Pacino</a>
                                    <div class="text-xs text-slate-400 ml-auto whitespace-nowrap">01:10 PM</div>
                                </div>
                                <div class="w-full truncate text-slate-500 mt-0.5">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem </div>
                            </div>
                        </div>
                        <div class="cursor-pointer relative flex items-center mt-5">
                            <div class="w-12 h-12 flex-none image-fit mr-1">
                                <img alt="Midone - HTML Admin Template" class="rounded-full" src="dist/images/profile-2.jpg">
                                <div class="w-3 h-3 bg-success absolute right-0 bottom-0 rounded-full border-2 border-white dark:border-darkmode-600"></div>
                            </div>
                            <div class="ml-2 overflow-hidden">
                                <div class="flex items-center">
                                    <a href="javascript:;" class="font-medium truncate mr-5">Leonardo DiCaprio</a>
                                    <div class="text-xs text-slate-400 ml-auto whitespace-nowrap">05:09 AM</div>
                                </div>
                                <div class="w-full truncate text-slate-500 mt-0.5">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem </div>
                            </div>
                        </div>
                        <div class="cursor-pointer relative flex items-center mt-5">
                            <div class="w-12 h-12 flex-none image-fit mr-1">
                                <img alt="Midone - HTML Admin Template" class="rounded-full" src="dist/images/profile-12.jpg">
                                <div class="w-3 h-3 bg-success absolute right-0 bottom-0 rounded-full border-2 border-white dark:border-darkmode-600"></div>
                            </div>
                            <div class="ml-2 overflow-hidden">
                                <div class="flex items-center">
                                    <a href="javascript:;" class="font-medium truncate mr-5">Robert De Niro</a>
                                    <div class="text-xs text-slate-400 ml-auto whitespace-nowrap">05:09 AM</div>
                                </div>
                                <div class="w-full truncate text-slate-500 mt-0.5">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 20</div>
                            </div>
                        </div>
                        <div class="cursor-pointer relative flex items-center mt-5">
                            <div class="w-12 h-12 flex-none image-fit mr-1">
                                <img alt="Midone - HTML Admin Template" class="rounded-full" src="dist/images/profile-15.jpg">
                                <div class="w-3 h-3 bg-success absolute right-0 bottom-0 rounded-full border-2 border-white dark:border-darkmode-600"></div>
                            </div>
                            <div class="ml-2 overflow-hidden">
                                <div class="flex items-center">
                                    <a href="javascript:;" class="font-medium truncate mr-5">Russell Crowe</a>
                                    <div class="text-xs text-slate-400 ml-auto whitespace-nowrap">01:10 PM</div>
                                </div>
                                <div class="w-full truncate text-slate-500 mt-0.5">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#039;s standard dummy text ever since the 1500</div>
                            </div>
                        </div>
                        <div class="cursor-pointer relative flex items-center mt-5">
                            <div class="w-12 h-12 flex-none image-fit mr-1">
                                <img alt="Midone - HTML Admin Template" class="rounded-full" src="dist/images/profile-15.jpg">
                                <div class="w-3 h-3 bg-success absolute right-0 bottom-0 rounded-full border-2 border-white dark:border-darkmode-600"></div>
                            </div>
                            <div class="ml-2 overflow-hidden">
                                <div class="flex items-center">
                                    <a href="javascript:;" class="font-medium truncate mr-5">Leonardo DiCaprio</a>
                                    <div class="text-xs text-slate-400 ml-auto whitespace-nowrap">06:05 AM</div>
                                </div>
                                <div class="w-full truncate text-slate-500 mt-0.5">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END: Notifications -->
            <!-- BEGIN: Account Menu -->
            <div class="intro-x dropdown w-8 h-8">
                <div class="dropdown-toggle w-8 h-8 rounded-full overflow-hidden shadow-lg image-fit zoom-in" role="button" aria-expanded="false" data-tw-toggle="dropdown">
                    <img alt="Midone - HTML Admin Template" src="{{asset('dist/images/rm.jpg')}} ">
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
        <div class="grid grid-cols-12 gap-6">
            <!-- BEGIN: General Report -->
            <div class="col-span-12 mt-8">
                <div class="intro-y flex items-center h-10">
                    <h2 class="text-lg font-medium truncate mr-5">
                        General Report
                    </h2>
                </div>
                <div class="grid grid-cols-12 gap-6 mt-5">

                    <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                        <div class="report-box">
                            <div class="box p-5">
                                <div class="flex">
                                    <i data-lucide="shopping-cart" class="report-box__icon text-primary"></i>
                                    <div class="ml-auto">
                                        <div class="report-box__indicator bg-success tooltip cursor-pointer" title="33% Higher than last month"> 33% <i data-lucide="chevron-up" class="w-4 h-4 ml-0.5"></i> </div>
                                    </div>
                                </div>
                                <div class="text-3xl font-medium leading-8 mt-6" id="all_appliciant_box"></div>
                                <div class="text-base text-slate-500 mt-1">All Appliciants</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                        <div class="report-box zoom-in">
                            <div class="box p-5">
                                <div class="flex">
                                    <i data-lucide="user" class="report-box__icon text-success"></i>
                                    <div class="ml-auto">
                                        <div class="report-box__indicator bg-danger tooltip cursor-pointer" title="22% Higher than last month"> 22% <i data-lucide="chevron-up" class="w-4 h-4 ml-0.5"></i> </div>
                                    </div>
                                </div>
                                <div class="text-3xl font-medium leading-8 mt-6" id="rejected_appliciant_box"></div>
                                <div class="text-base text-slate-500 mt-1">Rejected Applications</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                        <div class="report-box zoom-in">
                            <div class="box p-5">
                                <div class="flex">
                                    <i data-lucide="credit-card" class="report-box__icon text-pending"></i>
                                    <div class="ml-auto">
                                        <div class="report-box__indicator bg-success tooltip cursor-pointer" title="2% Lower than last month"> 2% <i data-lucide="chevron-down" class="w-4 h-4 ml-0.5"></i> </div>
                                    </div>
                                </div>
                                <div class="text-3xl font-medium leading-8 mt-6" id="approved_appliciant_box"></div>
                                <div class="text-base text-slate-500 mt-1">Approved Applications</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                        <div class="report-box zoom-in">
                            <div class="box p-5">
                                <div class="flex">
                                    <i data-lucide="monitor" class="report-box__icon text-warning"></i>
                                    <div class="ml-auto">
                                        <div class="report-box__indicator bg-success tooltip cursor-pointer" title="12% Higher than last month"> 12% <i data-lucide="chevron-up" class="w-4 h-4 ml-0.5"></i> </div>
                                    </div>
                                </div>
                                <div class="text-3xl font-medium leading-8 mt-6" id="selected_appliciant_box"></div>
                                <div class="text-base text-slate-500 mt-1">Selected Appliciants</div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>


            <!-- END: General Report -->
            <!-- BEGIN: Sales Report -->
            <div class="col-span-12 lg:col-span-6 mt-8">
                <div class="intro-y block sm:flex items-center h-10">
                    <h2 class="text-lg font-medium truncate mr-5">
                        Selected Appliciants
                    </h2>

                </div>
                <div class="intro-y box p-5 mt-12 sm:mt-5">
                    <div class="flex flex-col md:flex-row md:items-center">
                        <div class="flex">
                            <div>
                                <!-- <div class="text-primary dark:text-slate-300 text-lg xl:text-xl font-medium">$15,000</div>
                                <div class="mt-0.5 text-slate-500">This Month</div> -->
                            </div>
                            <div class="w-px h-12 border border-r border-dashed border-slate-200 dark:border-darkmode-300 mx-4 xl:mx-5"></div>
                            <div>
                                <!-- <div class="text-slate-500 text-lg xl:text-xl font-medium">$10,000</div>
                                <div class="mt-0.5 text-slate-500">Last Month</div> -->
                            </div>
                        </div>
                        <div class="dropdown md:ml-auto mt-5 md:mt-0">
                            <!-- <button class="dropdown-toggle btn btn-outline-secondary font-normal" aria-expanded="false" data-tw-toggle="dropdown"> Filter by Category <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="chevron-down" data-lucide="chevron-down" class="lucide lucide-chevron-down w-4 h-4 ml-2"><polyline points="6 9 12 15 18 9"></polyline></svg> </button> -->



                        </div>
                    </div>
                    <div class="report-chart">
                        <div class="h-[275px]">
                            <canvas id="report-line-chart" class="mt-6 -mb-6"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END: Sales Report -->
            <!-- BEGIN: Weekly Top Seller -->
            <div class="col-span-12 sm:col-span-6 lg:col-span-3 mt-8">
                <div class="intro-y flex items-center h-10">
                    <h2 class="text-lg font-medium truncate mr-5">
                        Appliciants Count - Seasion 1<!-- select from drop down and realtime view -->
                    </h2>
                </div>
                <div class="intro-y box p-5 mt-5">
                    <div class="mt-3">
                        <div class="h-[213px]">
                            <canvas id="appliciant_count_pie_chart"></canvas>
                        </div>
                    </div>
                    <div class="w-52 sm:w-auto mx-auto mt-8">
                        <div class="scrollable" id="count_box" style="height: 110px; overflow: scroll;">

                        </div>
                    </div>
                </div>
            </div>
            <!-- END: Weekly Top Seller -->
            <!-- BEGIN: Sales Report -->
            <div class="col-span-12 sm:col-span-6 lg:col-span-3 mt-8">
                <div class="intro-y flex items-center h-10">
                    <h2 class="text-lg font-medium truncate mr-5">
                        Appliciants Selection
                    </h2>

                </div>
                <div class="intro-y box p-5 mt-5">
                    <div class="mt-3">
                        <div class="h-[213px]">
                            <canvas id="report-donut-chart"></canvas>
                        </div>
                    </div>
                    <div class="w-52 sm:w-auto mx-auto mt-8">
                        <div class="scrollable" id="presentage_box" style="height: 110px; overflow: scroll;">

                        </div>
                    </div>
                </div>
            </div>
            <!-- END: Sales Report -->
            <div class="col-span-12 mt-8">
                <!-- BEGIN: Weekly Top Products -->
                <div class="col-span-12 mt-6">
                    <div class="intro-y block sm:flex items-center h-10">
                        <h2 class="text-lg font-medium truncate mr-5">
                            Valid Applications
                        </h2>
                        <div class="flex items-center sm:ml-auto mt-3 sm:mt-0">
                            <button class="btn box flex items-center text-slate-600 dark:text-slate-300"> <i data-lucide="file-text" class="hidden sm:block w-4 h-4 mr-2"></i> Export to Excel </button>
                            <button class="ml-3 btn box flex items-center text-slate-600 dark:text-slate-300"> <i data-lucide="file-text" class="hidden sm:block w-4 h-4 mr-2"></i> Export to PDF </button>
                        </div>
                    </div>
                    <div class="intro-y overflow-auto lg:overflow-visible mt-8 sm:mt-0">
                        <table class="table table-report sm:mt-2">
                            <thead>
                            <tr>
                                <th class="whitespace-nowrap">ID</th>
                                <th class="whitespace-nowrap">Designation Id</th>
                                <th class="text-center whitespace-nowrap">Gender</th>
                                <th class="text-center whitespace-nowrap">Initial</th>
                                <th class="text-center whitespace-nowrap">Name</th>
                                <th class="text-center whitespace-nowrap">Area</th>
                                <th class="text-center whitespace-nowrap">Mobile</th>
                                <th class="text-center whitespace-nowrap">Email</th>
                                <th class="text-center whitespace-nowrap">Date of Birth</th>
                                <th class="text-center whitespace-nowrap">App Status</th>
                                <th class="text-center whitespace-nowrap">Selected Status</th>
                                <th class="text-center whitespace-nowrap">More</th>
                            </tr>
                            </thead>
                            <tbody id="main_table">

                            </tbody>
                        </table>
                    </div>
                    <div class="intro-y flex flex-wrap sm:flex-row sm:flex-nowrap items-center mt-3">
                        <nav class="w-full sm:w-auto sm:mr-auto">
                            <ul class="pagination">
                                <li class="page-item">
                                    <a class="page-link" href="#"> <i class="w-4 h-4" data-lucide="chevrons-left"></i> </a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="#"> <i class="w-4 h-4" data-lucide="chevron-left"></i> </a>
                                </li>
                                <li class="page-item"> <a class="page-link" href="#">...</a> </li>
                                <li class="page-item"> <a class="page-link" href="#">1</a> </li>
                                <li class="page-item active"> <a class="page-link" href="#">2</a> </li>
                                <li class="page-item"> <a class="page-link" href="#">3</a> </li>
                                <li class="page-item"> <a class="page-link" href="#">...</a> </li>
                                <li class="page-item">
                                    <a class="page-link" href="#"> <i class="w-4 h-4" data-lucide="chevron-right"></i> </a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="#"> <i class="w-4 h-4" data-lucide="chevrons-right"></i> </a>
                                </li>
                            </ul>
                        </nav>
                        <select class="w-20 form-select box mt-3 sm:mt-0">
                            <option>10</option>
                            <option>25</option>
                            <option>35</option>
                            <option>50</option>
                        </select>
                    </div>
                </div>
                <!-- END: Weekly Top Products -->
            </div>
            <!-- BEGIN: Official Store -->

            <!-- END: Official Store -->
            <!-- BEGIN: Weekly Best Sellers -->

            <!-- END: Weekly Best Sellers -->
            <!-- BEGIN: General Report -->

            <!-- END: General Report -->
            <!-- BEGIN: Weekly Top Products -->



        </div>
        <!-- END: Weekly Top Products -->





        <div class="col-span-12 2xl:col-span-3">
            <div class="2xl:border-l -mb-10 pb-10">
                <div class="2xl:pl-6 grid grid-cols-12 gap-x-6 2xl:gap-x-0 gap-y-6">
                    <!-- BEGIN: Transactions -->

                    <!-- END: Transactions -->
                    <!-- BEGIN: Recent Activities -->

                    <!-- END: Recent Activities -->
                    <!-- BEGIN: Important Notes -->
                    <!-- END: Important Notes -->
                    <!-- BEGIN: Schedules -->

                    <!-- END: Schedules -->
                </div>
            </div>
        </div>
    </div>
    </div>

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
    <!-- <script src="https://maps.googleapis.com/maps/api/js?key=["your-google-map-api"]&libraries=places"></script> -->
    <script src=" {{asset('dist/js/app.js')}} "></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://js.pusher.com/7.1/pusher.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
    <script src="https://unpkg.com/flowbite@1.4.7/dist/flowbite.js"></script>



    <script>
        $(document).ready(function(){
            // if(session('employee_designation_name')!="Assistant Registrar"){
            //     $('.reject_button').prop('disabled', true);
            //     $('.reject_button').addClass('cursor-not-allowed');
            // }

            //console.log(session('employee_designation_name'));

            // Enable pusher logging - don't include this in production
            //Pusher.logToConsole = true;

            var pusher = new Pusher('83633e8c4e54442bb992', {
                cluster: 'ap2'
            });

            var channel = pusher.subscribe('my-channel');
            channel.bind('my-event', function(data) {
                //alert(JSON.stringify(data));
                if(data.from){
                    let pending = parseInt($('#' + data.from).find('.badge-light').html());
                    console.log (pending);
                }
            });

            //console.log("Hello");
            //call fetch data fetch data
            fetchdata();


            function fetchdata(){
                //console.log("Hello");
                $.ajax({
                    method: "GET",
                    url: "fetch-appliciant",
                    datatype: "json",
                    success: function(response){
                        console.log(response);

                        $('#all_appliciant_box').html("");
                        $('#rejected_appliciant_box').html("");
                        $('#approved_appliciant_box').html("");
                        $('#selected_appliciant_box').html("");

                        $('#all_appliciant_box').append(response.count_all);
                        $('#rejected_appliciant_box').append(response.rejected_all);
                        $('#approved_appliciant_box').append(response.approved_all);
                        $('#selected_appliciant_box').append(response.selected_all);
                        //response.dc_array.rejected_application
                        $('#main_table').html("");
                        $.each(response.data, function (ket, item) {
                            $('#main_table').append('<tr>\
                            <td class="text-center">'+item.appliciant_id+'</td>\
                            <td class="text-center">'+item.designation_id+'</td>\
                            <td class="text-center">'+item.gender+'</td>\
                            <td class="text-center">'+item.initial+'</td>\
                            <td class="text-center">'+item.lname+'</td>\
                            <td class="text-center">'+item.current_address_line3+'</td>\
                            <td class="text-center">'+item.current_mobile+'</td>\
                            <td class="text-center">'+item.email+'</td>\
                            <td class="text-center">'+item.dob+'</td>\
                            <td class="text-center">'+item.application_status+'</td>\
                            <td class="text-center">'+item.selected_for_job+'</td>\
                            <td class="text-center">\
                                <button class="view_details flex items-center mr-3 text-primary" id="" value="'+item.appliciant_id+'" type="button"> <i data-lucide="check-square" class="w-4 h-4 mr-1"></i>View</button>\
                            </td>\
                            </td>'
                            );
                        });

                        // $('#count_box').html("");
                        // $.each(response.dc_array, function (ket, item) {
                        //     $all = response.count_all;
                        //     $presentage1 = ((item.designation_count/$all)*100).toFixed(2);
                        //     $('#count_box').append('<div class="flex items-center">\
                        //         <div class="w-2 h-2 bg-primary rounded-full mr-3"></div>\
                        //             <span class="truncate">'+item.designation_name+'- </span> <span class="font-medium ml-auto">'+item.designation_count+' - '+$presentage1+'</span>\
                        //         </div>'
                        //     );
                        // });

                        // $('#presentage_box').html("");
                        // $all = response.count_all;
                        //     $pre_pending = ((response.pending_all/$all)*100).toFixed(2);
                        //     $pre_approved = ((response.approved_all/$all)*100).toFixed(2);
                        //     $pre_rejected = ((response.rejected_all/$all)*100).toFixed(2);
                        //     $('#presentage_box').append('<div class="flex items-center">\
                        //         <div class="w-2 h-2 bg-primary rounded-full mr-3"></div>\
                        //             <span class="truncate">Pending Application - </span> <span class="font-medium ml-auto">'+$pre_pending+'%</span>\
                        //         </div>\
                        //         <div class="w-2 h-2 bg-primary rounded-full mr-3"></div>\
                        //             <span class="truncate">Approved Application - </span> <span class="font-medium ml-auto">'+$pre_approved+'%</span>\
                        //         </div>\
                        //         <div class="w-2 h-2 bg-primary rounded-full mr-3"></div>\
                        //             <span class="truncate">Rejected Application - </span> <span class="font-medium ml-auto">'+$pre_rejected+'%</span>\
                        //         </div>\
                        //         '
                        //     );
                    }
                });

            }

            //Start Education qualification


            function fetchSchool(id){
                var data = {
                    'application_id' : id
                }

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    method: "post",
                    url: "/appliciant/fetch-school",
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
                        </tr>'
                            );
                        });
                    }
                });

            }

            // ol view
            function fetchOl(id){
                var data = {
                    'application_id' : id
                }

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    method: "post",
                    url: "/appliciant/fetch-ol",
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
                                </tr>'
                            );
                        });

                        $('#ol2').html("");
                        $.each(response.ol2, function (ket, item) {
                            $('#ol2').append('<tr>\
                                    <td class="py-4 px-6" id="'+item.id+'_school">'+item.subject+'</td>\
                                    <td class="py-4 px-6" id="'+item.id+'_from">'+item.grade+'</td>\
                                    <td class="py-4 px-6" id="'+item.id+'_to">'+item.year+'</td>\
                                    <td class="py-4 px-6" id="'+item.id+'_from">'+item.index_no+'</td>\
                                </tr>'
                            );
                        });
                    }
                });

            }
            // end o/l view

            //Start a/l view
            function fetchAl(id){
                var data = {
                    'application_id' : id
                }

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    method: "post",
                    url: "/appliciant/fetch-al",
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
                                </tr>'
                            );
                        });
                    }
                });
            }
            //End a/l view


            //Start University view
            function fetchUniversity(id){
                var data = {
                    'application_id' : id
                }

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    method: "post",
                    url: "/appliciant/fetch-university",
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
                                </tr>'
                            );
                        });
                    }
                });

            }
            //End University view


            //Start other view
            function fetchOther(id){
                var data = {
                    'application_id' : id
                }

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    method: "post",
                    url: "/appliciant/fetch-other",
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
                                </tr>'
                            );
                        });
                    }
                });

            }
            //End other view

            //Start professional view
            function fetchProfessional(id){
                var data = {
                    'application_id' : id
                }

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    method: "post",
                    url: "/appliciant/fetch-professional",
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
                                </tr>'
                            );
                        });
                    }
                });

            }
            //End professional view

            //Start employment view
            function fetchEmployment(id){
                var data = {
                    'application_id' : id
                }

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    method: "post",
                    url: "/appliciant/fetch-employment",
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
                                </tr>'
                            );
                        });
                    }
                });

            }
            //End employment view


            //Start occupation view
            function fetchOccupation(id){
                var data = {
                    'application_id' : id
                }

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    method: "post",
                    url: "/appliciant/fetch-occupation",
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
                                </tr>'
                            );
                        });

                    }
                });

            }
            //End occupation view

            //Start reference view
            function fetchReference(id){
                var data = {
                    'application_id' : id
                }

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    method: "post",
                    url: "/appliciant/fetch-reference",
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
                                </tr>'
                            );
                        });

                    }
                });

            }

            //End reference view


            //view details
            $(document).on('click', '.view_details', function (e) {
                e.preventDefault();
                var id = this.getAttribute('value');
                console.log(id);

                fetchdata1(id);
                fetchSchool(id);
                fetchOl(id);
                fetchAl(id);
                fetchUniversity(id);
                fetchOther(id);
                fetchProfessional(id);
                fetchEmployment(id);
                fetchOccupation(id);
                fetchReference(id);

                function fetchdata1(id){


                    $.ajax({
                        method: "GET",
                        url: "view-appliciant/"+id,
                        success: function (response) {
                            console.log("hi");
                            console.log(response);
                            if(response.status==404){
                                $('#success_message').html("");
                                $('#success_message').addClass('alert alert-danger');
                                $('#success_message').text(response.message);
                            }
                            else{
                                //Insert data into input fields
                                //console.log(response);
                                // $('#more_details').html("");

                                $.each(response.details, function (ket, item) {
                                    console.log(item.application_status);
                                    console.log(item.selected_for_job);
                                    $('#button_div').html("");
                                    $('#button_div').append('\
                                    <button type="button" id="reject_'+item.appliciant_id+'" value="'+item.appliciant_id+'" class="reject_button focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900" data-modal-toggle="confirm_reject_modal">Reject Application</button>\
                                    <button type="button" id="approve_'+item.appliciant_id+'" value="'+item.appliciant_id+'"class="approve_button focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:focus:ring-yellow-900">Approve Application</button>\
                                    <button type="button" id="select_'+item.appliciant_id+'" value="'+item.appliciant_id+'"class="select_button focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800" data-modal-toggle="confirm_approve_modal">Select Application</button>\
                                    '
                                    );

                                    if(item.application_status=="approved" && item.selected_for_job=="PENDING"){
                                        $('.app_status').html("");
                                        $('.app_status').text("Status: Approved");
                                        $('#modal_body').removeClass('bg-green-100');
                                        $('#modal_body').removeClass('bg-red-100');
                                        $('#modal_body').addClass('bg-yellow-100');
                                        $('.select_button').removeClass('hidden');
                                        $('.reject_button').removeClass('hidden');
                                        $('.approve_button').addClass('hidden');
                                    }
                                    if(item.application_status=="PENDING" && item.selected_for_job=="PENDING"){
                                        console.log("in pending");
                                        $('.app_status').html("");
                                        $('.select_button').addClass('hidden');

                                        $('#modal_body').removeClass('bg-green-100');
                                        $('#modal_body').removeClass('bg-red-100');
                                        $('#modal_body').removeClass('bg-yellow-100');
                                    }
                                    // if(item.application_status=="rejected"){
                                    //     $('.app_status').html("");
                                    //     $('.app_status').append("Status: Rejected");
                                    //     $('#modal_body').removeClass('bg-yellow-100');
                                    //     $('#modal_body').removeClass('bg-green-100');
                                    //     $('#modal_body').addClass('bg-red-100');
                                    //     $('#select_'+id).prop('disabled', true);
                                    //     $('#select_'+id).addClass('cursor-not-allowed');
                                    //     $('.reject_button').addClass('hidden');
                                    //     $('.select_button').addClass('hidden');

                                    // }

                                    if(item.selected_for_job=="selected"){
                                        $('.app_status').text("");
                                        $('.app_status').text("Status: Selected for Job");
                                        $('#modal_body').removeClass('bg-yellow-100');
                                        $('#modal_body').removeClass('bg-red-100');
                                        $('#modal_body').addClass('bg-green-100');
                                        $('.select_button').addClass('hidden');
                                        $('.approve_button').addClass('hidden');
                                    }
                                    if(item.application_status=="rejected" && item.selected_for_job=="rejected"){
                                        $('.app_status').text("");
                                        $('.app_status').text("Status: Rejected");
                                        $('#modal_body').removeClass('bg-yellow-100');
                                        $('#modal_body').removeClass('bg-green-100');
                                        $('#modal_body').addClass('bg-red-100');
                                        $('.select_button').addClass('hidden');
                                        $('.reject_button').addClass('hidden');
                                    }
                                    if(item.application_status=="approved" && item.selected_for_job=="rejected"){
                                        $('.app_status').text("");
                                        $('.app_status').text("Status: Rejected");
                                        $('#modal_body').removeClass('bg-yellow-100');
                                        $('#modal_body').removeClass('bg-green-100');
                                        $('#modal_body').addClass('bg-red-100');
                                        $('.select_button').addClass('hidden');
                                        $('.reject_button').addClass('hidden');
                                    }

                                    $('#gender').val(response.details[0].gender);
                                    $('#gender_value').text(response.details[0].gender);
                                    $('#gender_value').val(response.details[0].gender);

                                    $('#initial').attr("disabled", true);
                                    $('#initial').val(response.details[0].initial);
                                    $('#initial').text(response.details[0].initial);

                                    $('#fname').attr("disabled", true);
                                    $('#fname').val(response.details[0].fname);
                                    $('#fname').text(response.details[0].fname);

                                    $('#mname').attr("disabled", true);
                                    $('#mname').val(response.details[0].mname);
                                    $('#mname').text(response.details[0].mname);

                                    $('#lname').attr("disabled", true);
                                    $('#lname').val(response.details[0].lname);
                                    $('#lname').text(response.details[0].lname);

                                    $('#initial_name').attr("disabled", true);
                                    $('#initial_name').val(response.details[0].initial_name);
                                    $('#initial_name').text(response.details[0].initial_name);

                                    $('#current_address_line1').attr("disabled", true);
                                    $('#current_address_line1').val(response.details[0].current_address_line1);
                                    $('#current_address_line1').text(response.details[0].current_address_line1);

                                    $('#current_address_line2').attr("disabled", true);
                                    $('#current_address_line2').val(response.details[0].current_address_line2);
                                    $('#current_address_line2').text(response.details[0].current_address_line2);

                                    $('#current_address_line3').attr("disabled", true);
                                    $('#current_address_line3').val(response.details[0].current_address_line3);
                                    $('#current_address_line3').text(response.details[0].current_address_line3);

                                    $('#permenent_address_line1').attr("disabled", true);
                                    $('#permenent_address_line1').val(response.details[0].permenent_address_line1);
                                    $('#permenent_address_line1').text(response.details[0].permenent_address_line1);

                                    $('#permenent_address_line2').attr("disabled", true);
                                    $('#permenent_address_line2').val(response.details[0].permenent_address_line2);
                                    $('#permenent_address_line2').text(response.details[0].permenent_address_line2);

                                    $('#permenent_address_line3').attr("disabled", true);
                                    $('#permenent_address_line3').val(response.details[0].permenent_address_line3);
                                    $('#permenent_address_line3').text(response.details[0].permenent_address_line3);

                                    $('#current_mobile').attr("disabled", true);
                                    $('#current_mobile').val(response.details[0].current_mobile);
                                    $('#current_mobile').text(response.details[0].current_mobile);

                                    $('#permenant_mobile').attr("disabled", true);
                                    $('#permenant_mobile').val(response.details[0].permenant_mobile);
                                    $('#permenant_mobile').text(response.details[0].permenant_mobile);

                                    $('#email').attr("disabled", true);

                                    $('#nic').attr("disabled", true);
                                    $('#nic').val(response.details[0].nic);
                                    $('#nic').text(response.details[0].nic);

                                    $('#citizenship').attr("disabled", true);
                                    $('#citizenship_value').text(response.details[0].citizenship);
                                    $('#citizenship_value').val(response.details[0].citizenship);

                                    $('#police_division').attr("disabled", true);
                                    $('#police_division').val(response.details[0].police_division);
                                    $('#police_division').text(response.details[0].police_division);

                                    $('#dob').attr("disabled", true);
                                    $('#dob').val(response.details[0].dob);
                                    $('#dob').text(response.details[0].dob);

                                    $('#civil_status').attr("disabled", true);
                                    $('#civil_status_value').text(response.details[0].civil_status);
                                    $('#civil_status_value').val(response.details[0].civil_status);

                                    const age = response.details[0].age_as_at_closing_date.split(" ");

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
                                    $('#sport_activity').val(response.details[0].sport_qualification);
                                    $('#sport_activity').text(response.details[0].sport_qualification);

                                    $('#guilty_status').attr("disabled", true);
                                    $('#guilty_status_value').text(response.details[0].guilty_status);
                                    $('#guilty_status_value').val(response.details[0].guilty_status);

                                    $('#guilty_description').attr("disabled", true);
                                    $('#guilty_description').val(response.details[0].guilty_description);
                                    $('#guilty_description').text(response.details[0].guilty_description);

                                    $('#driving_licence_no').attr("disabled", true);
                                    $('#driving_licence_no').val(response.details[0].driving_licen_no);
                                    $('#driving_licence_no').text(response.details[0].driving_licen_no);

                                    $('#driving_licence_issuied_date').attr("disabled", true);
                                    $('#driving_licence_issuied_date').val(response.details[0].driving_licen_issuing_date);
                                    $('#driving_licence_issuied_date').text(response.details[0].driving_licen_issuing_date);

                                    const hight = response.details[0].hight.split(" ");

                                    $('#height_feets').attr("disabled", true);
                                    $('#height_feets').val(hight[0]);
                                    $('#height_feets').text(hight[0]);

                                    $('#height_inches').attr("disabled", true);
                                    $('#height_inches').val(hight[2]);
                                    $('#height_inches').text(hight[2]);

                                    $('#chest').attr("disabled", true);
                                    $('#chest').val(response.details[0].chest);
                                    $('#chest').text(response.details[0].chest);



                                    // $('#fname').val(),
                                    // $('#mname').val(),
                                    // $('#lname').val(),
                                    // $('#mname').val(),
                                    // $('#email').val(),
                                    // $('#initial_name').val(),
                                    // $('#current_address_line1').val(),
                                    // $('#current_address_line2').val(),
                                    // $('#current_address_line3').val(),
                                    // $('#permenent_address_line1').val(),
                                    // $('#permenent_address_line2').val(),
                                    // $('#permenent_address_line3').val(),
                                    // $('#current_mobile').val(),
                                    // $('#permenant_mobile').val(),
                                    // $('#nic').val(),
                                    // $('#citizenship').val(),
                                    // $('#police_division').val(),
                                    // $('#dob').val(),
                                    // $('#civil_status').val(),
                                    // $('#age_years').val(),
                                    // $('#age_months').val(),
                                    // $('#age_days').val(),
                                    // $('#sport_activity').val(),
                                    // $('#guilty_status').val(),
                                    // $('#guilty_description').val(),
                                    // $('#driving_licence_no').val(),
                                    // $('#driving_licence_issuied_date').val(),
                                    // $('#height_feets').val(),
                                    // $('#height_inches').val(),
                                    // $('#chest').val(),
                                });
                                //call form modal
                                $('#view-modal').removeClass('hidden');
                                $('#view-modal').addClass('flex');
                                $('#view-modal').attr('role','dialog');
                                $('#view-modal').attr('aria-modal','true');
                                $('#view-modal').removeAttr('aredit-modal');
                                $('body').append('<div modal-backdrop="" id="bg_bluer1" class="bg-gray-900 bg-opacity-50 dark:bg-opacity-80 fixed inset-0 z-40"></div><div modal-backdrop="" id="bg_bluer1" class="bg-gray-900 bg-opacity-50 dark:bg-opacity-80 fixed inset-0 z-40"></div>');


                            }
                            //fetchdata1(id);
                        }
                    });
                }
            });
            //End view details

            //Start Reject
            $(document).on('click', '.reject_button', function (e) {
                console.log("Hello delete");
                e.preventDefault();
                var id = this.getAttribute('value');
                console.log(id);

                //Send student id to box
                $('#reject_id').val(id);
                $('#deletespan').append('"Appliciant ID '+id+'"?');

                $('#confirm_reject_modal').removeClass('hidden');
                $('#confirm_reject_modal').addClass('flex');
                $('#confirm_reject_modal').attr('role','dialog');
                $('#confirm_reject_modal').attr('aria-modal','true');
                $('#confirm_reject_modal').removeAttr('aria-hidden');
                $('#view-modal').append('<div modal-backdrop="" id="delete_box_bluer1" class="bg-gray-900 bg-opacity-50 dark:bg-opacity-80 fixed inset-0 z-40"></div><div id="delete_box_bluer2" modal-backdrop="" class="bg-gray-900 bg-opacity-50 dark:bg-opacity-80 fixed inset-0 z-40"></div>');
                //console.log($('#edit-modall'));


            });


            $(document).on('click', '.confirm_reject_button', function (e) {
                e.preventDefault();

                //Show deleting..
                //$(this).text("Deleting...");

                var id = $('#reject_id').val();
                console.log("reject id");
                console.log(id);

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    method: "PUT",
                    url: "reject_appliciant/"+id,
                    success: function (response) {
                        console.log(response);
                        $('#confirm_reject_modal').addClass('hidden');
                        $('#delete_box_bluer1,#delete_box_bluer2').remove();
                        $('#deletespan').html("");
                        $('#alert-danger_reject_message').text(response.message);
                        $('#alert-danger_reject').removeClass('hidden');
                        $('#modal_body').removeClass('bg-yellow-100');
                        $('#modal_body').removeClass('bg-green-100');
                        $('#modal_body').addClass('bg-red-100');

                        $('.approve_button').removeClass('hidden');
                        $('.reject_button').addClass('hidden');
                        $('.select_button').addClass('hidden');
                        fetchdata();

                    }
                });
            });
            //End Reject

            //Start Approve
            $(document).on('click', '.approve_button', function (e) {
                console.log("Hello approvr");
                e.preventDefault();
                var id = this.getAttribute('value');

                console.log(id);

                //Send student id to box
                $('#approved_id').val(id);
                $('#deletespan1').append('"Appliciant ID '+id+'"?');


                $('#confirm_approve_modal').removeClass('hidden');
                $('#confirm_approve_modal').addClass('flex');
                $('#confirm_approve_modal').attr('role','dialog');
                $('#confirm_approve_modal').attr('aria-modal','true');
                $('#confirm_approve_modal').removeAttr('aria-hidden');
                $('#view-modal').append('<div modal-backdrop="" id="delete_box_bluer1" class="bg-gray-900 bg-opacity-50 dark:bg-opacity-80 fixed inset-0 z-40"></div><div id="delete_box_bluer2" modal-backdrop="" class="bg-gray-900 bg-opacity-50 dark:bg-opacity-80 fixed inset-0 z-40"></div>');
                //console.log($('#edit-modall'));


            });


            $(document).on('click', '.confirm_approve_button', function (e) {
                e.preventDefault();

                //Show deleting..
                //$(this).text("Deleting...");

                var id = $('#approved_id').val();
                console.log(id);

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    method: "PUT",
                    url: "approve_appliciant/"+id,
                    success: function (response) {
                        console.log(response);
                        $('#confirm_approve_modal').addClass('hidden');
                        $('#delete_box_bluer1,#delete_box_bluer2').remove();
                        $('#deletespan1').html("");
                        $('#alert-success_test_message').text(response.message);
                        $('#alert-success_test').removeClass('hidden');
                        $('#modal_body').removeClass('bg-red-100');
                        $('#modal_body').addClass('bg-yellow-100');

                        $('.reject_button').removeClass('hidden');
                        $('.select_button').removeClass('hidden');
                        $('.approve_button').addClass('hidden');
                        fetchdata();

                    }
                });
            });
            //End Approve

            //Start select
            $(document).on('click', '.select_button', function (e) {
                console.log("Hello select");
                e.preventDefault();
                var id = this.getAttribute('value');

                console.log(id);

                //Send student id to box
                $('#select_id').val(id);
                $('#deletespan2').append('"Appliciant ID '+id+'"?');


                $('#confirm_select_modal').removeClass('hidden');
                $('#confirm_select_modal').addClass('flex');
                $('#confirm_select_modal').attr('role','dialog');
                $('#confirm_select_modal').attr('aria-modal','true');
                $('#confirm_select_modal').removeAttr('aria-hidden');
                $('#view-modal').append('<div modal-backdrop="" id="delete_box_bluer1" class="bg-gray-900 bg-opacity-50 dark:bg-opacity-80 fixed inset-0 z-40"></div><div id="delete_box_bluer2" modal-backdrop="" class="bg-gray-900 bg-opacity-50 dark:bg-opacity-80 fixed inset-0 z-40"></div>');
                //console.log($('#edit-modall'));


            });


            $(document).on('click', '.confirm_select_button', function (e) {
                e.preventDefault();

                //Show deleting..
                //$(this).text("Deleting...");

                var id = $('#select_id').val();
                console.log(id);

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    method: "PUT",
                    url: "select_appliciant/"+id,
                    success: function (response) {
                        console.log(response);
                        $('#confirm_select_modal').addClass('hidden');
                        $('#delete_box_bluer1,#delete_box_bluer2').remove();
                        $('#deletespan1').html("");
                        $('#alert-success_test_message').text(response.message);
                        $('#alert-success_test').removeClass('hidden');
                        $('#modal_body').removeClass('bg-yellow-100');
                        $('#modal_body').addClass('bg-green-100');

                        $('.approve_button').addClass('hidden');
                        $('.select_button').addClass('hidden');
                        fetchdata();

                    }
                });
            });
            //End select

            //clear fields if press cancel button
            $(document).on('click', '.decline', function (e) {
                $('#confirm_reject_modal').addClass('hidden');
                $('#confirm_approve_modal').addClass('hidden');
                $('#confirm_select_modal').addClass('hidden');
                $('#delete_box_bluer1,#delete_box_bluer2').remove();
                $('#deletespan').html("");
                $('#deletespan1').html("");
                fetchdata();
            });

            $(document).on('click', '.decline_more', function (e) {
                $('#view-modal').addClass('hidden');
                $('#bg_bluer1,#bg_bluer2').remove();
                $('#ptex').html("");
                fetchdata();
            });

            $(document).on('click', '.decline_alert', function (e) {
                $('#alert-danger_reject').addClass('hidden');
                $('#alert-danger_reject_message').html("");
                $('#alert-success_test').addClass('hidden');
                $('#alert-success_test_message').html("");
                fetchdata();
            });


        });
    </script>

    <script>
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
