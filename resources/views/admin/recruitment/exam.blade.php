@extends('admin.admin_master_custom')
@section('admin')


    <div class="content">
        <!-- Available test -->
        <!-- Add modal -->
        <div id="available_test_add-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center p-4 w-full md:inset-0 h-modal md:h-full">
            <div class="relative w-full max-w-2xl h-full md:h-auto">
                <!-- Modal content -->
                <form action="#" id="add_form" class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex justify-between items-start p-4 rounded-t border-b dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                            Edit Designation
                        </h3>
                        <button type="button" class="decline text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="available_test_add-modal">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="p-6 space-y-6">
                        <div class="grid grid-cols-6 gap-6">
                            <div class="col-span-6 sm:col-span-3">
                                <label for="available_test_designation" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Designation</label>
                                <select id="available_test_designation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option selected disabled hidden>Select the Designation</option>
                                    @foreach($designations as $designation)
                                        <option value="{{$designation->designation_id}}">{{$designation->designation_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="available_test_test_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Test Name</label>
                                <input type="text" name="available_test_test_name" id="available_test_test_name" class="available_test_test_name shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Test Name" required="">
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="available_test_test_part" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Test Part</label>
                                <input type="text" name="available_test_test_part" id="available_test_test_part" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Test Part" required="">
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="available_test_test_type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Test Type</label>
                                <input type="text" name="available_test_test_type" id="available_test_test_type" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Test Type" required="">
                            </div>
                        </div>
                    </div>
                    <!-- Modal footer -->
                    <div class="flex items-center p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
                        <button data-modal-toggle="available_test_add-modal" type="submit" name="available_test_add_submit" id="available_test_add_submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Save all</button>
                        <button data-modal-toggle="available_test_add-modal" type="button" class="decline text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Decline</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Edit modal -->
        <div id="available_test_edit-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center p-4 w-full md:inset-0 h-modal md:h-full">
            <div class="relative w-full max-w-2xl h-full md:h-auto">
                <!-- Modal content -->
                <form action="#" id="edit_form" class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex justify-between items-start p-4 rounded-t border-b dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                            Edit Available Tests
                        </h3>
                        <button type="button" class="decline text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="p-6 space-y-6">
                        <div class="grid grid-cols-6 gap-6">
                            <input type="hidden" id="edit_available_test_id">
                            <div class="col-span-6 sm:col-span-3">
                                <label for="available_test_edit_designation" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Designation</label>
                                <select id="available_test_edit_designation" name="available_test_edit_designation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option id="available_test_selected_designation" value="" selected disabled hidden> </option>
                                    @foreach($designations as $designation)
                                        <option value="{{$designation->designation_id}}">{{$designation->designation_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="available_test_edit_test_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Test Name</label>
                                <input type="text" name="available_test_test_name" id="available_test_edit_test_name" class="available_test_edit_test_name shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Test Name" required="">
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="available_test_edit_test_part" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Test Part</label>
                                <input type="text" name="available_test_edit_test_part" id="available_test_edit_test_part" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Test Part" required="">
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="available_test_edit_test_type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Test Type</label>
                                <input type="text" name="available_test_edit_test_type" id="available_test_edit_test_type" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Test Type" required="">
                            </div>
                        </div>
                    </div>
                    <!-- Modal footer -->
                    <div class="flex items-center p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
                        <button type="submit" name="available_test_update_submit" id="available_test_update_submit" class="submit text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Save all</button>
                        <button type="button" class="decline text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Decline</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- End Edit modal -->

        <!-- Start Delete Model -->
        <div id="available_test_delete-modal" tabindex="-1" class="delete_box hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 md:inset-0 h-modal md:h-full" style="justify-content: center;
    align-items: center;">
            <div class="relative p-4 w-full max-w-md h-full md:h-auto">
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <button type="button" class="decline absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                    <div class="p-6 text-center">
                        <svg aria-hidden="true" class="mx-auto mb-4 w-14 h-14 text-gray-400 dark:text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to delete <span class="deletespan"></span></h3>
                        <input type="hidden" id="available_test_delete_id">
                        <button type="button" class="available_test_delete_confirm text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                            Yes, I'm sure
                        </button>
                        <button type="button" class="decline text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No, cancel</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- End delete Model -->
        <!-- End Available test -->

        <!-- Schedule Exam -->
        <!-- Edit modal -->
        <div id="schedule_edit-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center p-4 w-full md:inset-0 h-modal md:h-full">
            <div class="relative w-full max-w-2xl h-full md:h-auto">
                <!-- Modal content -->
                <form action="#" id="edit_form" class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex justify-between items-start p-4 rounded-t border-b dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                            Edit Available Tests
                        </h3>
                        <button type="button" class="decline text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="p-6 space-y-6">
                        <div class="grid grid-cols-6 gap-6">

                            <input type="hidden" id="edit_schedule_exam_id">

                            <div class="col-span-6 sm:col-span-3">
                                <label for="schedule_exam_edit_test_id" class="autofill_exam_id block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Test ID</label>
                                <select id="schedule_exam_edit_test_id" name="schedule_exam_edit_test_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option id="schedule_exam_current_test_id" value="" selected hidden> </option>
                                    @foreach($appliciant_tests as $appliciant_test)
                                        <option value="{{$appliciant_test->test_id}}">{{$appliciant_test->test_id}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="schedule_exam_edit_designation" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Designation</label>
                                <select id="schedule_exam_edit_designation" name="schedule_exam_edit_designation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option id="schedule_exam_current_designation" value="" selected disabled hidden> </option>
                                </select>
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="schedule_exam_edit_test_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Test Name</label>
                                <select id="schedule_exam_edit_test_name" name="schedule_exam_edit_test_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option id="schedule_exam_current_test_name" value="" selected disabled hidden> </option>
                                </select>
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="schedule_exam_edit_test_part" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Test Part</label>
                                <select id="schedule_exam_edit_test_part" name="schedule_exam_edit_test_part" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option id="schedule_exam_current_test_part" value="" selected disabled hidden> </option>
                                </select>
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="schedule_exam_edit_test_type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Test Type</label>
                                <select id="schedule_exam_edit_test_type" name="schedule_exam_edit_test_type" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option id="schedule_exam_current_test_type" value="" selected disabled hidden> </option>
                                </select>
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <label for="schedule_exam_edit_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date</label>
                                <input type="date" name="schedule_exam_edit_date" id="schedule_exam_edit_date" class="available_test_edit_test_name shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Test Name" required="">
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="schedule_exam_edit_time" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Time</label>
                                <input type="time" name="schedule_exam_edit_time" id="schedule_exam_edit_time" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Test Part" required="">
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="schedule_exam_edit_mark_limit" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mark Limit</label>
                                <input type="number" name="schedule_exam_edit_mark_limit" id="schedule_exam_edit_mark_limit" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Mark Limit">
                            </div>
                        </div>
                    </div>
                    <!-- Modal footer -->
                    <div class="flex items-center p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
                        <button type="submit" name="schedule_exam_update_submit" id="schedule_exam_update_submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Save all</button>
                        <button type="button" class="decline text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Decline</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- End Edit modal -->

        <!-- Add modal -->
        <div id="schedule_add-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center p-4 w-full md:inset-0 h-modal md:h-full">
            <div class="relative w-full max-w-2xl h-full md:h-auto">
                <!-- Modal content -->
                <form action="#" id="add_form" class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex justify-between items-start p-4 rounded-t border-b dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                            Edit Available Tests
                        </h3>
                        <button type="button" class="decline text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="schedule_add-modal">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="p-6 space-y-6">
                        <div class="grid grid-cols-6 gap-6">

                            <input type="hidden" id="add_schedule_exam_id">

                            <span>
                            <label for="schedule_exam_add_test_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Test ID</label>
                            <select id="schedule_exam_add_test_id" name="schedule_exam_add_test_id" class="autofill_exam_id bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value="" selected disabled hidden>Choose here</option>
                                @foreach($appliciant_tests as $appliciant_test)
                                    <option value="{{$appliciant_test->test_id}}">{{$appliciant_test->test_id}} - {{$appliciant_test->test_name}}</option>
                                @endforeach
                            </select>
                        </span>
                            <span>
                            <label for="schedule_exam_add_designation" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Designation</label>
                            <select id="schedule_exam_add_designation" name="schedule_exam_add_designation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option id="schedule_exam_current_designation" value="" selected disabled hidden> </option>
                            </select>
                        </span>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="schedule_exam_add_test_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Test Name</label>
                                <select id="schedule_exam_add_test_name" name="schedule_exam_add_test_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option id="schedule_exam_current_test_name" value="" selected disabled hidden> </option>
                                </select>
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="schedule_exam_add_test_part" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Test Part</label>
                                <select id="schedule_exam_add_test_part" name="schedule_exam_add_test_part" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option id="schedule_exam_current_test_part" value="" selected disabled hidden> </option>
                                </select>
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="schedule_exam_add_test_type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Test Type</label>
                                <select id="schedule_exam_add_test_type" name="schedule_exam_add_test_type" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option id="schedule_exam_current_test_type" value="" selected disabled hidden> </option>
                                </select>
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <label for="schedule_exam_add_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date</label>
                                <input type="date" name="schedule_exam_add_date" id="schedule_exam_add_date" class="available_test_add_test_name shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Test Name" required="">
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="schedule_exam_add_time" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Time</label>
                                <input type="time" name="schedule_exam_add_time" id="schedule_exam_add_time" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Test Part" required="">
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="schedule_exam_add_mark_limit" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Time</label>
                                <input type="number" name="schedule_exam_add_mark_limit" id="schedule_exam_add_mark_limit" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Mark Limit">
                            </div>
                        </div>
                    </div>
                    <!-- Modal footer -->
                    <div class="flex items-center p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
                        <button data-modal-toggle="schedule_add-modal" type="submit" name="schedule_exam_add_submit" id="schedule_exam_add_submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Save all</button>
                        <button data-modal-toggle="schedule_add-modal" type="button" class="decline text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Decline</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- Add Edit modal -->

        <!-- Start Delete Model -->
        <div id="schedule_exam_delete-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 md:inset-0 h-modal md:h-full" style="justify-content: center;
    align-items: center;">
            <div class="relative p-4 w-full max-w-md h-full md:h-auto">
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <button type="button" class="decline absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                    <div class="p-6 text-center">
                        <svg aria-hidden="true" class="mx-auto mb-4 w-14 h-14 text-gray-400 dark:text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to delete <span class="deletespan"></span></h3>
                        <input type="hidden" id="schedule_exam_delete_id">
                        <button type="button" id="schedule_exam_delete_confirm" class="schedule_exam_delete_confirm text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                            Yes, I'm sure
                        </button>
                        <button type="button" class="decline text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No, cancel</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- End delete Model -->
        <!-- End Schedule Exam -->

        <!-- Start Mark Modal -->
        <!-- Start Delete Model -->
        <div id="mark_delete-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 md:inset-0 h-modal md:h-full" style="justify-content: center;
    align-items: center;">
            <div class="relative p-4 w-full max-w-md h-full md:h-auto">
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <button type="button" class="decline absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                    <div class="p-6 text-center">
                        <svg aria-hidden="true" class="mx-auto mb-4 w-14 h-14 text-gray-400 dark:text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to delete <span class="deletespan"></span></h3>
                        <input type="hidden" id="mark_delete_id">
                        <button type="button" class="mark_delete_confirm text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                            Yes, I'm sure
                        </button>
                        <button type="button" class="decline text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No, cancel</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- End delete Model -->
        <!-- End Mark Modal -->


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
                            <div class="font-medium">Lakshan Ravi</div>
                            <div class="text-xs text-white/70 mt-0.5 dark:text-slate-500">Admin</div>
                        </li>
                        <li>
                            <hr class="dropdown-divider border-white/[0.08]">
                        </li>
                        <li>
                            <a href="" class="dropdown-item hover:bg-white/5"> <i data-lucide="user" class="w-4 h-4 mr-2"></i> Profile </a>
                        </li>
                        <li>
                            <a href="" class="dropdown-item hover:bg-white/5"> <i data-lucide="edit" class="w-4 h-4 mr-2"></i> Add Account </a>
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


            <!-- BEGIN: Sales Report -->
            <div class="col-span-12 lg:col-span-6 mt-8">
                <div class="intro-y block sm:flex items-center h-10">
                    <h2 class="text-lg font-medium truncate mr-5">
                        Pass Appliciant Summary
                    </h2>

                </div>
                <div class="intro-y box p-5 mt-12 sm:mt-5">
                    <div class="flex flex-col md:flex-row md:items-center">
                        <div class="flex">
                            <div>
                                <div class="text-primary dark:text-slate-300 text-lg xl:text-xl font-medium"></div>
                                <div class="mt-0.5 text-slate-500"></div>
                            </div>
                            <div class="w-px h-12 border border-r border-dashed border-slate-200 dark:border-darkmode-300 mx-4 xl:mx-5"></div>
                            <div>
                                <div class="text-slate-500 text-lg xl:text-xl font-medium"></div>
                                <div class="mt-0.5 text-slate-500"></div>
                            </div>
                        </div>
                        <div class="dropdown md:ml-auto mt-5 md:mt-0">

                        </div>
                    </div>
                    <div class="report-chart">
                        <div class="h-[275px]">
                            <canvas id="report-exam-line-chart" class="mt-6 -mb-6"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END: Sales Report -->
            <!-- BEGIN: Weekly Top Seller -->
            <div class="col-span-12 sm:col-span-6 lg:col-span-3 mt-8">
                <div class="flex intro-y flex items-center h-10">
                    <h2 class="text-lg font-medium truncate mr-5">
                        Pass Fail Percentage
                    </h2>
                    <select id="presentage_exam" class="form-select form-select-sm w-20" aria-label=".form-select-sm example">
                        <option id="selected_exam" value="all" selected>All Exams</option>

                    </select>

                </div>
                <div class="intro-y box p-5 mt-5">
                    <div class="mt-3">
                        <div class="h-[213px]" id="report-pie-chart2_div">
                            <canvas id="report-pie-chart2"></canvas>
                        </div>
                    </div>
                    <div id="report-pie-chart2_description" class="w-52 sm:w-auto mx-auto mt-8">

                    </div>
                </div>
            </div>
            <!-- END: Weekly Top Seller -->
            <!-- BEGIN: Sales Report -->
            <div class="col-span-12 sm:col-span-6 lg:col-span-3 mt-8">
                <div class="intro-y flex items-center h-10">
                    <!-- <h2 class="text-lg font-medium truncate mr-5">
                        Pass Fail rate
                    </h2>
                    <select id="pf_rate" class="form-select form-select-sm w-20" aria-label=".form-select-sm example" style="float: right;">
                        <option selected>Exams</option>
                    </select>  -->
                </div>
                <div class="intro-y box p-5 mt-5" style="    height: 87%;display: flex;flex-direction: column;justify-content: space-around;">
                    <div class="report-box zoom-in">
                        <div class="box p-5">
                            <div class="flex">
                                <i data-lucide="user" class="report-box__icon text-success"></i>
                                <div class="ml-auto">
                                    <div class="report-box__indicator bg-success tooltip cursor-pointer" title="22% Higher than last month"> 22% <i data-lucide="chevron-up" class="w-4 h-4 ml-0.5"></i> </div>
                                </div>
                            </div>
                            <div class="text-3xl font-medium leading-8 mt-6" id="all_appliciants"></div>
                            <div class="text-base text-slate-500 mt-1">Appliciants</div>
                        </div>
                    </div>
                    <div class="report-box zoom-in">
                        <div class="box p-5">
                            <div class="flex">
                                <i data-lucide="credit-card" class="report-box__icon text-pending"></i>
                                <div class="ml-auto">
                                    <div class="report-box__indicator bg-danger tooltip cursor-pointer" title="2% Lower than last month"> 2% <i data-lucide="chevron-down" class="w-4 h-4 ml-0.5"></i> </div>
                                </div>
                            </div>
                            <div class="text-3xl font-medium leading-8 mt-6" id="all_exams"></div>
                            <div class="text-base text-slate-500 mt-1">Exams</div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END: Sales Report -->

            <div class="col-span-12 mt-6">
                <!-- Table Start -->
                <div class="intro-y block sm:flex items-center h-10">
                    <h2 class="text-lg font-medium truncate mr-5">
                        Available Tests
                    </h2>
                    <div class="flex items-center sm:ml-auto mt-3 sm:mt-0">
                        <button class="btn box flex items-center text-slate-600 dark:text-slate-300"> <i data-lucide="file-text" class="hidden sm:block w-4 h-4 mr-2"></i> Export to Excel </button>
                        <button class="ml-3 btn box flex items-center text-slate-600 dark:text-slate-300"> <i data-lucide="file-text" class="hidden sm:block w-4 h-4 mr-2"></i> Export to PDF </button>
                    </div>
                </div>
                <div class="intro-y block sm:flex items-center h-10 mt-3">
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

                    <!-- Start alert danger -->
                    <div id="alert-danger_test" class="hidden flex p-4 mb-4 bg-red-100 rounded-lg dark:bg-red-200 mt-2" role="alert">
                        <svg aria-hidden="true" class="flex-shrink-0 w-5 h-5 text-red-700 dark:text-red-800" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                        <span class="sr-only">Info</span>
                        <div id="alert-danger_test_message" class="ml-3 text-sm font-medium text-red-700 dark:text-red-800">

                        </div>
                        <button type="button" class="decline_alert ml-auto -mx-1.5 -my-1.5 bg-red-100 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex h-8 w-8 dark:bg-red-200 dark:text-red-600 dark:hover:bg-red-300" data-dismiss-target="#alert-danger_test" aria-label="Close">
                            <span class="sr-only">Close</span>
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        </button>
                    </div>
                    <!-- End alert danger -->

                    <div class="flex items-center sm:ml-auto mt-3 sm:mt-0">
                        <!-- Modal toggle -->
                        <button class="add_available_test block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button" data-modal-toggle="available_test_add-modal" style="float: right;">+ Add New</button>
                    </div>
                </div>
                <div class="intro-y overflow-auto lg:overflow-visible mt-8 sm:mt-0">

                    <div class="scrollable">
                        <table class="table table-report sm:mt-2">

                            <thead>
                            <tr>
                                <th class="whitespace-nowrap">ID</th>
                                <th class="whitespace-nowrap">Designation</th>
                                <th class="text-center whitespace-nowrap">Test Name</th>
                                <th class="text-center whitespace-nowrap">Test Part</th>
                                <th class="text-center whitespace-nowrap">Test Type</th>
                                <th class="text-center whitespace-nowrap">Action</th>
                            </tr>
                            </thead>
                            <tbody id="available_test_body">

                            </tbody>
                        </table>
                    </div>
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
                <!-- Table End -->
            </div>


            <!-- BEGIN: Weekly Top Products -->
            <div class="col-span-12 mt-6">
                <div class="intro-y overflow-auto lg:overflow-visible mt-8 sm:mt-0">
                    <!-- Table Start -->
                    <div class="intro-y block sm:flex items-center h-10">
                        <h2 class="text-lg font-medium truncate mr-5">
                            Exam Schedules
                        </h2>
                    </div>
                    <div class="intro-y overflow-auto lg:overflow-visible mt-8 sm:mt-0">
                        <div class="scrollable">
                            <table class="table table-report sm:mt-2">
                                <thead>
                                <button type="button" data-modal-toggle="schedule_add-modal" style="float: right;" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">+ Add New</button>
                                <tr>
                                    <th class="text-center whitespace-nowrap">ID</th>
                                    <th class="text-center whitespace-nowrap">Test Id</th>
                                    <th class="text-center whitespace-nowrap">Designation</th>
                                    <th class="text-center whitespace-nowrap">Test Name</th>
                                    <th class="text-center whitespace-nowrap">Test Part</th>
                                    <th class="text-center whitespace-nowrap">Test Type</th>
                                    <th class="text-center whitespace-nowrap">Date</th>
                                    <th class="text-center whitespace-nowrap">Time</th>
                                    <th class="text-center whitespace-nowrap">Mark Limit</th>
                                    <th class="text-center whitespace-nowrap">Action</th>
                                </tr>
                                </thead>
                                <tbody id="exam_schedule_body">

                                </tbody>
                            </table>
                        </div>
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
                    <!-- Table End -->
                </div>

                <div class="col-span-12 mt-6">
                    <!-- Table Start -->
                    <div class="intro-y block sm:flex items-center h-10">
                        <h2 class="text-lg font-medium truncate mr-5">
                            Exam Marks
                        </h2>
                    </div>
                    <div class="intro-y overflow-auto lg:overflow-visible mt-8 sm:mt-0">
                        <div class="scrollable">
                            <table class="table table-report sm:mt-2">


                                <thead>
                                <tr>
                                    <th class="text-center">Exam ID</th>
                                    <th class="text-center">Appliciant ID</th>
                                    <th class="text-center">Test Name</th>
                                    <th class="text-center">Marks</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody id="exam_marks">

                                <div id="add_marks">

                                </div>
                                </tbody>
                            </table>
                        </div>
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
                    <!-- Table End -->
                </div>
            </div>
            <!-- END: General Report -->

            <!-- BEGIN: Official Store -->

            <!-- END: Official Store -->
            <!-- BEGIN: Weekly Best Sellers -->

            <!-- END: Weekly Best Sellers -->
            <!-- BEGIN: General Report -->

            <!-- END: General Report -->
            <!-- BEGIN: Weekly Top Products -->

            <!-- END: Weekly Top Products -->





            <div class="col-span-12 2xl:col-span-3">

            </div>
        </div>


        <!-- <script>
                all_modals = ['main-modal']
                all_modals.forEach((modal)=>{
                    const modalSelected = document.querySelector('.'+modal);
                    //modalSelected.classList.remove('fadeIn');
                    //modalSelected.classList.add('fadeOut');
                    //modalSelected.style.display = 'none';
                })
        </script>             -->

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
                        url: "fetch-appliciant_test",
                        datatype: "json",
                        success: function(response){
                            //console.log(response);
                            $('#available_test_body').html("");
                            $.each(response.data, function (ket, item) {
                                $('#available_test_body').append('<tr>\
                            <td class="text-center">'+item.test_id+'</td>\
                            <td class="text-center">'+item.designation_name+'</td>\
                            <td class="text-center">'+item.test_name+'</td>\
                            <td class="text-center">'+item.test_part+'</td>\
                            <td class="text-center">'+item.test_type+'</td>\
                            <td class="table-report__action w-56">\
                                <div class="flex justify-center items-center">\
                                    <button class="edit_available flex items-center mr-3 text-warning" id="edit_available" type="button" value="'+item.test_id+'"> <i data-lucide="check-square" class="w-4 h-4 mr-1"></i> Edit</button>\
                                    <button class="delete_available flex items-center text-danger" id="delete_available" value="'+item.test_id+'" type="button"><i data-lucide="trash-2" class="w-4 h-4 mr-1"></i> Delete</button>\
                                </div>\
                            </td>\
                            </td>'
                                );
                            });
                        }
                    });

                    $.ajax({
                        method: "GET",
                        url: "fetch-exam-schedule",
                        datatype: "json",
                        success: function(response){
                            console.log(response);
                            $('#exam_schedule_body').html("");
                            $('#presentage_exam').html("");
                            $('#all_exams').html("");
                            $('#all_exams').html(response.exam_count);

                            $('#all_appliciants').html("");
                            $('#all_appliciants').html(response.all_appliciant);
                            $.each(response.data, function (ket, item) {
                                $('#exam_schedule_body').append('<tr>\
                            <td class="text-center">'+item.exam_id+'</td>\
                            <td class="text-center">'+item.test_id+'</td>\
                            <td class="text-center">'+item.designation_name+'</td>\
                            <td class="text-center">'+item.test_name+'</td>\
                            <td class="text-center">'+item.test_part+'</td>\
                            <td class="text-center">'+item.test_type+'</td>\
                            <td class="text-center">'+item.date+'</td>\
                            <td class="text-center">'+item.time+'</td>\
                            <td class="text-center">'+item.mark_limit+'</td>\
                            <td class="table-report__action w-56">\
                                <div class="flex justify-center items-center">\
                                    <button class="edit_schedule flex items-center mr-3 text-warning" id="edit_schedule" type="button" value="'+item.exam_id+'" data-modal-toggle="edit-modal"> <i data-lucide="check-square" class="w-4 h-4 mr-1"></i> Edit</button>\
                                    <button class="delete_schedule flex items-center text-danger" id="delete_schedule" value="'+item.exam_id+'" type="button" data-modal-toggle="available_test_delete-modal"><i data-lucide="trash-2" class="w-4 h-4 mr-1"></i> Delete</button>\
                                </div>\
                            </td>\
                            </td>'
                                );

                                $('#presentage_exam').append(' <option value="'+item.exam_id+'">'+item.exam_id+' - '+item.test_name+' (Part -'+item.test_part+')</option>');
                            });
                        }
                    });

                    $.ajax({
                        method: "GET",
                        url: "fetch-exam-marks",
                        datatype: "json",
                        success: function(response){
                            console.log(response);
                            $('#exam_marks').html("");
                            $.each(response.data, function (ket, item) {
                                $('#exam_marks').append('<tr>\
                            <td class="text-center" id="'+item.mark_id+'_test_id">'+item.exam_id+'</td>\
                            <td class="text-center" id="'+item.mark_id+'_appliciant_id">'+item.appliciant_id+'</td>\
                            <td class="text-center" id="'+item.mark_id+'_exam_id">'+item.test_name+'</td>\
                            <td class="text-center" id="'+item.mark_id+'_mark">'+item.marks+'</td>\
                            <td class="text-center">'+item.status+'</td>\
                            <td class="table-report__action w-56">\
                                <div class="flex justify-center items-center">\
                                    <input type="hidden" id="edit_mark_id" value="'+item.mark_id+'">\
                                    <button class="edit_mark flex items-center mr-3 text-warning" id="'+item.mark_id+'_edit_mark" type="button" value="'+item.mark_id+'" value1="'+item.appliciant_id+'" data-modal-toggle="edit-modal"> <i data-lucide="check-square" class="w-4 h-4 mr-1"></i> Edit</button>\
                                    <button class="delete_mark flex items-center text-danger" id="delete_mark" value="'+item.mark_id+'" type="button" data-modal-toggle="available_test_delete-modal"><i data-lucide="trash-2" class="w-4 h-4 mr-1"></i> Delete</button>\
                                </div>\
                            </td>\
                        </tr>'
                                );
                            });
                            $('#exam_marks').append('<tr>\
                        <form>\
                            <td class="text-center">\
                                <div role="status">\
                                <svg class="inline mr-2 w-4 h-4 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">\
                                    <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>\
                                    <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>\
                                </svg>\
                                </div>\
                            </td>\
                            <td class="text-center"><input type="text" id="mark_appliciant_id" class="block p-2 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Appliciant Id" required></td>\
                            <td class="text-center"><select id="mark_exam-id" class="block p-2 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">\
                            </select></td>\
                            <td class="text-center"><input type="number" id="mark_marks" class="block p-2 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Mark" required></td>\
                            <td class="text-center">\
                                <div role="status">\
                                <svg class="inline mr-2 w-4 h-4 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">\
                                    <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>\
                                    <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>\
                                </svg>\
                                </div>\
                            </td>\
                            <td class="text-center">\
                                <button type="button" id="submit_marks" class="py-2 px-3 text-xs font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">+ Add New</button>\
                            </td>\
                        </form>\
                    </tr>'
                            );
                        }
                    });
                }


                // Start Available Test
                //store
                $(document).on('click', '#available_test_add_submit', function(e){
                    //same #submit use in update function. go for solution letter
                    e.preventDefault();

                    console.log("Hello");
                    var data = {
                        'designation_id' : $('#available_test_designation').val(),
                        'test_name' : $('#available_test_test_name').val(),
                        'test_part' : $('#available_test_test_part').val(),
                        'test_type' : $('#available_test_test_type').val()
                    }
                    console.log(data);

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        method: "POST",
                        url: "add-appliciant_test",
                        data: data,
                        type: "json",

                        success: function(response){

                            if(response.status == 400){

                                $('#saveform_errList').html("");
                                $('#saveform_errList').addClass('alert alert-denger');
                                $.each(response.errors, function(key, err_values){
                                    $('#saveform_errList').append('<li>'+err_values+'</li>');
                                });
                            }
                            if(response.status == 200){
                                $('#alert-success_test').addClass('hidden');
                                $('#alert-success_test_message').text(response.message);
                                $('#alert-success_test').removeClass('hidden');
                                $("#add_form")[0].reset();
                                $(function(){
                                    setTimeout(function(){
                                        $('#alert-success_test').addClass('hidden');
                                    }, 5000);
                                });
                                fetchdata();
                            }

                        }
                    });

                });

                //Delete
                $(document).on('click', '#delete_available', function (e) {
                    console.log("Hello delete");
                    e.preventDefault();
                    var id = this.getAttribute('value');
                    console.log(id);

                    //Send student id to box
                    $('#available_test_delete_id').val(id);

                    showDeleteModal(id,'#available_test_delete-modal');

                });


                $(document).on('click', '.available_test_delete_confirm', function (e) {
                    e.preventDefault();

                    //Show deleting..
                    //$(this).text("Deleting...");

                    var id = $('#available_test_delete_id').val();
                    //console.log(id);

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        method: "DELETE",
                        url: "delete-appliciant_test/"+id,
                        success: function (response) {
                            endDeleteModal(response.message, '#available_test_delete-modal', '#alert-danger_test', '#alert-danger_test_message');

                        }

                    });
                });
                //End Delete

                //Edit
                $(document).on('click', '.edit_available', function (e) {
                    e.preventDefault();
                    var id = this.getAttribute('value');
                    //console.log(id);

                    //call form modal
                    $('#available_test_edit-modal').removeClass('hidden');
                    $('#available_test_edit-modal').addClass('flex');
                    $('#available_test_edit-modal').attr('role','dialog');
                    $('#available_test_edit-modal').attr('aria-modal','true');
                    $('#available_test_edit-modal').removeAttr('aria-hidden');
                    $('body').append('<div id="bg_bluer1" class="bg-gray-900 bg-opacity-50 dark:bg-opacity-80 fixed inset-0 z-40"></div><div id="bg_bluer2" class="bg-gray-900 bg-opacity-50 dark:bg-opacity-80 fixed inset-0 z-40"></div>');

                    $.ajax({
                        method: "GET",
                        url: "edit-appliciant_test/"+id,
                        success: function (response) {
                            //console.log(response);
                            if(response.status==404){
                                $('#success_message').html("");
                                $('#success_message').addClass('alert alert-danger');
                                $('#success_message').text(response.message);
                            }
                            else{
                                //Insert data into input fields
                                //console.log(response.edit_details[0].test_id);
                                $('#available_test_selected_designation').val(response.designation[0].designation_name);
                                $('#available_test_selected_designation').text(response.designation[0].designation_name);
                                $('#available_test_edit_test_name').val(response.edit_details[0].test_name);
                                $('#available_test_edit_test_part').val(response.edit_details[0].test_part);
                                $('#available_test_edit_test_type').val(response.edit_details[0].test_type);
                                $('#edit_available_test_id').val(id);
                            }
                        }
                    });

                });
                //End Edit

                //Update
                $(document).on('click','#available_test_update_submit', function (e) {
                    e.preventDefault();
                    //Get inpu field values
                    var id = $('#edit_available_test_id').val();

                    console.log(id);
                    var data = {
                        'designation_id' : $('#available_test_edit_designation').val(),
                        'test_name' : $('#available_test_edit_test_name').val(),
                        'test_part' : $('#available_test_edit_test_part').val(),
                        'test_type' : $('#available_test_edit_test_type').val()
                    }
                    console.log(data);
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        type: "PUT",
                        url: "update-appliciant_test/"+id,
                        data: data,
                        dataType: "json",
                        success: function (response) {
                            console.log(response);

                            if(response.status==400){
                                //errors
                                $('#updateform_errList').html("");
                                $('#updateform_errList').addClass('alert alert-denger');
                                $.each(response.errors, function(key, err_values){
                                    $('#updateform_errList').append('<li>'+err_values+'</li>');
                                });
                            }
                            else if(response.status==404){
                                $('#updateform_errList').html("");
                                $('#success_message').addClass('alert alert-success')
                                $('#success_message').text(response.message)
                            }
                            else{
                                $('#success_message').text(response.message)
                                $('#edit_form')[0].reset();
                                fetchdata();
                            }
                        }
                    });
                });
                // End Available Test



                //Start Exam Schedule
                //store
                $(document).on('click', '#schedule_exam_add_submit', function(e){
                    //same #submit use in update function. go for solution letter
                    e.preventDefault();

                    console.log("Hello");
                    var data = {
                        'test_id' : $('#schedule_exam_add_test_id').val(),
                        'test_date' : $('#schedule_exam_add_date').val(),
                        'test_time' : $('#schedule_exam_add_time').val(),
                        'mark_limit' : $('#schedule_exam_add_mark_limit').val()

                    }
                    console.log(data);

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        method: "POST",
                        url: "add-exam-schedule",
                        data: data,
                        type: "json",

                        success: function(response){
                            console.log(response);
                            if(response.status == 400){

                                $('#saveform_errList').html("");
                                $('#saveform_errList').addClass('alert alert-denger');
                                $.each(response.errors, function(key, err_values){
                                    $('#saveform_errList').append('<li>'+err_values+'</li>');
                                });
                            }
                            if(response.status == 200){
                                $('#saveform_errList').html("");
                                $('#success_message').addClass('alert alert-success')
                                $('#success_message').text(response.message)
                                $('#success_message').find('input').val("");
                                $("#add_form")[0].reset();
                                fetchdata();
                            }
                        }
                    });

                });
                //End store

                //Start auto fill add
                $(document).on('change', '#schedule_exam_add_test_id', function(e){
                    e.preventDefault();

                    var test_id = $('#schedule_exam_add_test_id').val();

                    //console.log(id);
                    var data = {
                        'test_id' : test_id
                    }
                    //console.log(data);

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        method: "POST",
                        url: "autofill-exam-schedule",
                        data: data,
                        type: "json",

                        success: function(response){

                            if(response.status == 400){
                                console.log(response);
                                $('#saveform_errList').html("");
                                $('#saveform_errList').addClass('alert alert-denger');
                                $.each(response.errors, function(key, err_values){
                                    $('#saveform_errList').append('<li>'+err_values+'</li>');
                                });
                            }
                            if(response.status == 200){
                                //console.log(response);

                                $('#schedule_exam_add_designation').html("");
                                $('#schedule_exam_add_test_name').html("");
                                $('#schedule_exam_add_test_part').html("");
                                $('#schedule_exam_add_test_type').html("");
                                $.each(response.data, function (ket, item) {
                                    $('#schedule_exam_add_designation').append('<option id="'+item.designation_name+'" value="'+item.designation_name+'">'+item.designation_name+'</option>');
                                    $('#schedule_exam_add_test_name').append('<option id="'+item.test_name+'" value="'+item.test_name+'">'+item.test_name+'</option>');
                                    $('#schedule_exam_add_test_part').append('<option id="'+item.test_part+'" value="'+item.test_part+'">'+item.test_part+'</option>');
                                    $('#schedule_exam_add_test_type').append('<option id="'+item.test_type+'" value="'+item.test_type+'">'+item.test_type+'</option>');
                                });

                                $('#mark_marks').html("");
                                $('#success_message').addClass('alert alert-success')
                                $('#success_message').text(response.message)
                                $('#success_message').find('input').val("");

                            }
                        }
                    });

                });
                //End auto fill add

                //Start auto fill edit
                $(document).on('change', '#schedule_exam_edit_test_id', function(e){
                    e.preventDefault();

                    var test_id = $('#schedule_exam_edit_test_id').val();

                    //console.log(id);
                    var data = {
                        'test_id' : test_id
                    }
                    //console.log(data);

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        method: "POST",
                        url: "autofill-exam-schedule",
                        data: data,
                        type: "json",

                        success: function(response){

                            if(response.status == 400){
                                console.log(response);
                                $('#saveform_errList').html("");
                                $('#saveform_errList').addClass('alert alert-denger');
                                $.each(response.errors, function(key, err_values){
                                    $('#saveform_errList').append('<li>'+err_values+'</li>');
                                });
                            }
                            if(response.status == 200){
                                //console.log(response);

                                $('#schedule_exam_edit_designation').html("");
                                $('#schedule_exam_edit_test_name').html("");
                                $('#schedule_exam_edit_test_part').html("");
                                $('#schedule_exam_edit_test_type').html("");
                                $.each(response.data, function (ket, item) {
                                    $('#schedule_exam_edit_designation').append('<option id="'+item.designation_name+'" value="'+item.designation_name +'">'+item.designation_name+'</option>');
                                    $('#schedule_exam_edit_test_name').append('<option id="'+item.test_name+'" value="'+item.test_name+'">'+item.test_name+'</option>');
                                    $('#schedule_exam_edit_test_part').append('<option id="'+item.test_part+'" value="'+item.test_part+'">'+item.test_part+'</option>');
                                    $('#schedule_exam_edit_test_type').append('<option id="'+item.test_type+'" value="'+item.test_type+'">'+item.test_type+'</option>');
                                });

                                $('#mark_marks').html("");
                                $('#success_message').addClass('alert alert-success')
                                $('#success_message').text(response.message)
                                $('#success_message').find('input').val("");

                            }
                        }
                    });

                });
                //End auto fill edit

                //Edit
                $(document).on('click', '.edit_schedule', function (e) {
                    e.preventDefault();
                    var id = this.getAttribute('value');
                    console.log(id);

                    //call form modal
                    $('#schedule_edit-modal').removeClass('hidden');
                    $('#schedule_edit-modal').addClass('flex');

                    $('#schedule_edit-modal').attr('role','dialog');
                    $('#schedule_edit-modal').attr('aria-modal','true');
                    $('#schedule_edit-modal').removeAttr('aredit-modal');
                    $('body').append('<div id="bg_bluer1" class="bg-gray-900 bg-opacity-50 dark:bg-opacity-80 fixed inset-0 z-40"></div><div id="bg_bluer2" class="bg-gray-900 bg-opacity-50 dark:bg-opacity-80 fixed inset-0 z-40"></div>');


                    $.ajax({
                        method: "GET",
                        url: "edit-exam-schedule/"+id,
                        success: function (response) {
                            //console.log(response);
                            if(response.status==404){
                                $('#success_message').html("");
                                $('#success_message').addClass('alert alert-danger');
                                $('#success_message').text(response.message);
                            }
                            else{
                                //Insert data into input fields
                                //console.log(response.edit_details[0].test_id);
                                $('#schedule_exam_current_test_id').val(response.edit_details[0].test_id);
                                $('#schedule_exam_current_test_id').text(response.edit_details[0].test_id);

                                $('#schedule_exam_current_designation').val(response.edit_details[0].designation_name);
                                $('#schedule_exam_current_designation').text(response.edit_details[0].designation_name);

                                $('#schedule_exam_current_test_name').val(response.edit_details[0].test_name);
                                $('#schedule_exam_current_test_name').text(response.edit_details[0].test_name);

                                $('#schedule_exam_current_test_part').val(response.edit_details[0].test_part);
                                $('#schedule_exam_current_test_part').text(response.edit_details[0].test_part);

                                $('#schedule_exam_current_test_type').val(response.edit_details[0].test_type);
                                $('#schedule_exam_current_test_type').text(response.edit_details[0].test_type);

                                $('#schedule_exam_edit_date').val(response.edit_details[0].date);
                                $('#schedule_exam_edit_time').val(response.edit_details[0].time);
                                $('#schedule_exam_edit_mark_limit').val(response.edit_details[0].mark_limit);

                                $('#edit_schedule_exam_id').val(id);

                            }
                        }
                    });

                });

                //Update
                $(document).on('click','#schedule_exam_update_submit', function (e) {
                    e.preventDefault();
                    //Get inpu field values
                    var id = $('#edit_schedule_exam_id').val();
                    console.log("id");
                    console.log(id);
                    var data = {
                        'test_id' : $('#schedule_exam_edit_test_id').val(),
                        'mark_date' : $('#schedule_exam_edit_date').val(),
                        'mark_time' : $('#schedule_exam_edit_time').val(),
                        'mark_limit' : $('#schedule_exam_edit_mark_limit').val()
                    }
                    console.log("data");
                    console.log(data);
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        type: "PUT",
                        url: "update-exam-schedule/"+id,
                        data: data,
                        dataType: "json",
                        success: function (response) {
                            console.log(response);

                            if(response.status==400){
                                //errors
                                $('#updateform_errList').html("");
                                $('#updateform_errList').addClass('alert alert-denger');
                                $.each(response.errors, function(key, err_values){
                                    $('#updateform_errList').append('<li>'+err_values+'</li>');
                                });
                            }
                            else if(response.status==404){
                                $('#updateform_errList').html("");
                                $('#success_message').addClass('alert alert-success')
                                $('#success_message').text(response.message)
                            }
                            else{
                                $('#updateform_errList').html("");
                                $('#updateform_errList').html("");
                                $('#success_message').addClass('alert alert-success')
                                $('#success_message').text(response.message)

                                $('#EditStudentModal').modal('hide');
                                $('#edit_form')[0].reset();
                                $('#schedule_edit-modal').addClass('hidden');
                                $('#bg_bluer1,#bg_bluer2').remove();

                                fetchdata();
                            }
                        }
                    });
                });
                //End Update

                //Delete
                $(document).on('click', '#delete_schedule', function (e) {
                    console.log("Hello delete");
                    e.preventDefault();
                    var id = this.getAttribute('value');
                    console.log(id);

                    //Send student id to box
                    $('#schedule_exam_delete_id').val(id);
                    // $('#deletespan').append();

                    $('.deletespan').append('"Exam ID '+id+'"?');
                    $('#schedule_exam_delete-modal').removeClass('hidden');
                    $('#schedule_exam_delete-modal').addClass('flex');
                    $('#schedule_exam_delete-modal').attr('role','dialog');
                    $('#schedule_exam_delete-modal').attr('aria-modal','true');
                    $('#schedule_exam_delete-modal').removeAttr('aria-hidden');
                    $('body').append('<div id="bg_bluer1" class="bg-gray-900 bg-opacity-50 dark:bg-opacity-80 fixed inset-0 z-40"></div><div id="bg_bluer2" class="bg-gray-900 bg-opacity-50 dark:bg-opacity-80 fixed inset-0 z-40"></div>');


                });



                $(document).on('click', '#schedule_exam_delete_confirm', function (e) {
                    e.preventDefault();

                    //Show deleting..
                    //$(this).text("Deleting...");

                    var id = $('#schedule_exam_delete_id').val();
                    console.log(id);

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        method: "DELETE",
                        url: "delete-exam-schedule/"+id,
                        success: function (response) {
                            console.log(response);
                            //$('#success_message').addClass('alert alert-success');
                            $('#success_message').text(response.message);
                            //$('#available_test_delete-modal').hide();
                            // $('.delete_student_btn').text("Yes Delete!");
                            $('.deletespan').html("");
                            $('#schedule_exam_delete-modal').addClass('hidden');
                            $('#bg_bluer1,#bg_bluer2').remove();
                            // $(alert).addClass('hidden');
                            // $(alert).removeClass('hidden');
                            // $(text).text(message);
                            // $(function(){
                            //     setTimeout(function(){
                            //         $(alert).addClass('hidden');
                            //     }, 2000);
                            // });
                            fetchdata();

                        }
                    });
                });
                //End Delete
                //End Exam Schedule



                //Start Exam Marks
                //Start add auto fill
                $(document).on('change', '#mark_appliciant_id', function(e){
                    e.preventDefault();

                    var appliciant_id = $('#mark_appliciant_id').val();

                    //console.log(id);
                    var data = {
                        'appliciant_id' : appliciant_id
                    }
                    console.log(data);

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        method: "POST",
                        url: "autofill-exam-marks",
                        data: data,
                        type: "json",

                        success: function(response){

                            if(response.status == 400){

                                $('#saveform_errList').html("");
                                $('#saveform_errList').addClass('alert alert-denger');
                                $.each(response.errors, function(key, err_values){
                                    $('#saveform_errList').append('<li>'+err_values+'</li>');
                                });
                            }
                            if(response.status == 200){
                                console.log(response);
                                $('#mark_exam-id').html("");
                                $.each(response.data, function (ket, item) {
                                    $('#mark_exam-id').append('<option id="'+item.exam_id+'" value="'+item.exam_id+'">'+item.exam_id+' - '+item.test_name+'('+item.test_part+')</option>');
                                });

                                $('#mark_marks').html("");
                                $('#success_message').addClass('alert alert-success')
                                $('#success_message').text(response.message)
                                $('#success_message').find('input').val("");

                            }
                        }
                    });

                });
                //End add autofill

                //Start edit auto fill
                $(document).on('mouseleave', '#new_appliciant_id', function(e){
                    e.preventDefault();

                    var appliciant_id = $('#new_appliciant_id').val();

                    //console.log(id);
                    var data = {
                        'appliciant_id' : appliciant_id
                    }
                    console.log(data);

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        method: "POST",
                        url: "autofill-exam-marks",
                        data: data,
                        type: "json",

                        success: function(response){

                            if(response.status == 400){

                                $('#saveform_errList').html("");
                                $('#saveform_errList').addClass('alert alert-denger');
                                $.each(response.errors, function(key, err_values){
                                    $('#saveform_errList').append('<li>'+err_values+'</li>');
                                });
                            }
                            if(response.status == 200){
                                console.log(response);

                                $('#new_exam_id').html("");
                                $.each(response.data, function (ket, item) {
                                    $('#new_exam_id').append('<option value="'+item.exam_id+'">'+item.exam_id+' - '+item.test_name+'('+item.test_part+')</option>');
                                });

                                $('#success_message').addClass('alert alert-success')
                                $('#success_message').text(response.message)
                                $('#success_message').find('input').val("");

                            }
                        }
                    });

                });
                //End edit autofill

                //Start submit
                $(document).on('click', '#submit_marks', function(e){
                    e.preventDefault();

                    console.log("Hello");
                    var data = {
                        'exam_id' : $('#mark_exam-id').val(),
                        'appliciant_id' : $('#mark_appliciant_id').val(),
                        'marks' : $('#mark_marks').val()
                    }
                    //console.log(data);

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        method: "POST",
                        url: "add-exam-marks",
                        data: data,
                        type: "json",

                        success: function(response){

                            if(response.status == 400){

                                $('#saveform_errList').html("");
                                $('#saveform_errList').addClass('alert alert-denger');
                                $.each(response.errors, function(key, err_values){
                                    $('#saveform_errList').append('<li>'+err_values+'</li>');
                                });
                            }
                            if(response.status == 200){
                                $('#saveform_errList').html("");
                                $('#success_message').addClass('alert alert-success')
                                $('#success_message').text(response.message)
                                $('#success_message').find('input').val("");
                                $("#add_form")[0].reset();
                                fetchdata();
                            }
                        }
                    });

                });
                //End Submit

                //Delete
                $(document).on('click', '#delete_mark', function (e) {
                    console.log("Hello delete");
                    e.preventDefault();
                    var id = this.getAttribute('value');
                    console.log(id);

                    //Send student id to box
                    $('#mark_delete_id').val(id);
                    $('#deletespan').append('"Test ID '+id+'"?');

                    $('#deletespan').append('"Test ID '+id+'"?');
                    $('#mark_delete-modal').removeClass('hidden');
                    $('#mark_delete-modal').addClass('flex');
                    $('#mark_delete-modal').attr('role','dialog');
                    $('#mark_delete-modal').attr('aria-modal','true');
                    $('#mark_delete-modal').removeAttr('aria-hidden');
                    $('body').append('<div id="bg_bluer1" class="bg-gray-900 bg-opacity-50 dark:bg-opacity-80 fixed inset-0 z-40"></div><div id="bg_bluer2" class="bg-gray-900 bg-opacity-50 dark:bg-opacity-80 fixed inset-0 z-40"></div>');


                });

                // $(document).on('click', '#decline', function (e) {
                //     $('#edit-modall').removeClass('flex');
                //     $('#edit-modall').addClass('hidden');
                //      //console.log($('#edit-modall'));
                // });

                $(document).on('click', '.mark_delete_confirm', function (e) {
                    e.preventDefault();

                    //Show deleting..
                    //$(this).text("Deleting...");

                    var id = $('#mark_delete_id').val();
                    //console.log(id);

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        method: "DELETE",
                        url: "delete-exam-marks/"+id,
                        success: function (response) {
                            console.log(response);
                            //$('#success_message').addClass('alert alert-success');
                            $('#success_message').text(response.message);
                            //$('#available_test_delete-modal').hide();
                            // $('.delete_student_btn').text("Yes Delete!");
                            $('#deletespan').html("");
                            $('#mark_delete-modal').addClass('hidden');
                            $('#bg_bluer1,#bg_bluer2').remove();
                            // $(alert).addClass('hidden');
                            // $(alert).removeClass('hidden');
                            // $(text).text(message);
                            // $(function(){
                            //     setTimeout(function(){
                            //         $(alert).addClass('hidden');
                            //     }, 2000);
                            // });
                            fetchdata();

                        }
                    });
                });
                //End Delete

                //Edit
                $(document).on('click', '.edit_mark', function (e) {
                    e.preventDefault();
                    var id = this.getAttribute('value');
                    console.log(id);

                    //call form modal
                    $('.edit_mark').addClass('hidden');
                    $('#'+id+'_exam_id').html('<select id="new_exam_id" class="block p-2 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></select>');
                    $('#'+id+'_test_id').html('<div role="status"><svg class="inline mr-2 w-4 h-4 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">\
                                        <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>\
                                        <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>\
                                        </svg>\
                                    </div>');
                    $('#'+id+'_appliciant_id').html('<input type="text" id="new_appliciant_id" class="block p-2 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"/>');
                    $('#'+id+'_mark').html('<input type="number" id="new_mark" class="block p-2 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"/>');
                    $('#'+id+'_edit_mark').removeClass('hidden');
                    $('#'+id+'_edit_mark').html('<button class="save_mark bg-green-100 hover:bg-green -200 text-green-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-green-200 dark:text-green-900" type="button"> <i data-lucide="check-square" class="w-4 h-4 mr-1"></i> Save</button>');

                    $.ajax({
                        method: "GET",
                        url: "edit-exam-marks/"+id,
                        success: function (response) {
                            //console.log(response);
                            if(response.status==404){
                                $('#success_message').html("");
                                $('#success_message').addClass('alert alert-danger');
                                $('#success_message').text(response.message);
                            }
                            else{
                                //Insert data into input fields
                                console.log(response.details);
                                $('#new_exam_id').append('<option value="'+response.details[0].exam_id+'" selected>'+response.details[0].exam_id+'</option>');
                                // $('#new_exam_id').val(response.details[0].exam_id);
                                // $('#new_exam_id').attr('selected');
                                // $('#new_exam_id').text('text');
                                //$('#'+id+'_exam_id').attr('value', response.details[0].exam_id);
                                $('#new_appliciant_id').val(response.details[0].appliciant_id);
                                $('#new_mark').val(response.details[0].marks);
                                $('#edit_mark_id').val(id);
                            }
                        }
                    });

                });
                //End Edit

                //Update
                $(document).on('click','.save_mark', function (e) {
                    e.preventDefault();
                    //Get inpu field values
                    var id = $('#edit_mark_id').val();

                    console.log(id);
                    var data = {
                        'exam_id' : $('#new_exam_id').val(),
                        'appliciant_id' : $('#new_appliciant_id').val(),
                        'mark' : $('#new_mark').val()
                    }
                    console.log("update data");
                    console.log(data);
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        type: "PUT",
                        url: "update-exam-marks/"+id,
                        data: data,
                        dataType: "json",
                        success: function (response) {
                            console.log(response);

                            if(response.status==400){
                                //errors
                                $('#updateform_errList').html("");
                                $('#updateform_errList').addClass('alert alert-denger');
                                $.each(response.errors, function(key, err_values){
                                    $('#updateform_errList').append('<li>'+err_values+'</li>');
                                });
                            }
                            else if(response.status==404){
                                $('#updateform_errList').html("");
                                $('#success_message').addClass('alert alert-success')
                                $('#success_message').text(response.message)
                            }
                            else{
                                $('#updateform_errList').html("");
                                $('#updateform_errList').html("");
                                $('#success_message').addClass('alert alert-success')
                                $('#success_message').text(response.message)

                                $('#EditStudentModal').modal('hide');
                                $('#edit_form')[0].reset();
                                fetchdata();
                            }
                        }
                    });
                });
                // End update



                //End Exam Marks


                //Start Pie chart
                //Start Get pass/fail count
                $(document).on('change', '#pf_rate', function(e){
                    e.preventDefault();

                    var exam_id = $('#pf_rate').val();

                    //console.log(id);
                    var data = {
                        'test_id' : test_id
                    }
                    //console.log(data);

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        method: "POST",
                        url: "autofill-exam-schedule",
                        data: data,
                        type: "json",

                        success: function(response){

                            if(response.status == 400){
                                console.log(response);
                                $('#saveform_errList').html("");
                                $('#saveform_errList').addClass('alert alert-denger');
                                $.each(response.errors, function(key, err_values){
                                    $('#saveform_errList').append('<li>'+err_values+'</li>');
                                });
                            }
                            if(response.status == 200){
                                //console.log(response);

                                $('#schedule_exam_add_designation').html("");
                                $('#schedule_exam_add_test_name').html("");
                                $('#schedule_exam_add_test_part').html("");
                                $('#schedule_exam_add_test_type').html("");
                                $.each(response.data, function (ket, item) {
                                    $('#schedule_exam_add_designation').append('<option id="'+item.designation_name+'" value="'+item.designation_name+'">'+item.designation_name+'</option>');
                                    $('#schedule_exam_add_test_name').append('<option id="'+item.test_name+'" value="'+item.test_name+'">'+item.test_name+'</option>');
                                    $('#schedule_exam_add_test_part').append('<option id="'+item.test_part+'" value="'+item.test_part+'">'+item.test_part+'</option>');
                                    $('#schedule_exam_add_test_type').append('<option id="'+item.test_type+'" value="'+item.test_type+'">'+item.test_type+'</option>');
                                });

                                $('#mark_marks').html("");
                                $('#success_message').addClass('alert alert-success')
                                $('#success_message').text(response.message)
                                $('#success_message').find('input').val("");

                            }
                        }
                    });

                });
                //End Get pass/fail count
                //End Pie chart


                //clear fields if press cancel button
                $(document).on('click', '.decline, #available_test_update_submit', function (e) {
                    $('#available_test_edit-modal').addClass('hidden');
                    $('.delete_box').addClass('hidden');
                    $('.modal').addClass('hidden');
                    $('#bg_bluer1,#bg_bluer2').remove();
                    $('#edit_form')[0].reset();
                    $('#ptex').html("");
                    $('.deletespan').html("");
                    $('#deletespan').html("");
                    $('#schedule_exam_delete-modal').addClass('hidden');
                    $('#mark_delete-modal').addClass('hidden');
                    $('#schedule_edit-modal').addClass('hidden');
                    fetchdata();
                });

                $(document).on('click', '.decline_alert', function (e) {
                    $('#alert-success_test').addClass('hidden');
                    $('#alert-success_test')[0].reset();
                    fetchdata();
                });

                function showDeleteModal(id,modal){
                    $('.deletespan').append('"Test ID '+id+'"?');
                    $(modal).removeClass('hidden');
                    $(modal).addClass('flex');
                    $(modal).attr('role','dialog');
                    $(modal).attr('aria-modal','true');
                    $(modal).removeAttr('aria-hidden');
                    $('body').append('<div id="bg_bluer1" class="bg-gray-900 bg-opacity-50 dark:bg-opacity-80 fixed inset-0 z-40"></div><div id="bg_bluer2" class="bg-gray-900 bg-opacity-50 dark:bg-opacity-80 fixed inset-0 z-40"></div>');
                }

                function endDeleteModal(message, modal, alert, text){
                    $(modal).addClass('hidden');
                    $('.deletespan').html("");
                    $('#bg_bluer1,#bg_bluer2').remove();
                    $(alert).addClass('hidden');
                    $(alert).removeClass('hidden');
                    $(text).text(message);
                    $(function(){
                        setTimeout(function(){
                            $(alert).addClass('hidden');
                        }, 2000);
                    });
                    fetchdata();
                }

                function modal1(modal_class){
                    console.log(modal_class);
                    $(modal_class).removeClass('hidden');
                    $(modal_class).addClass('flex');
                    $(modal_class).attr('role','dialog');
                    $(modal_class).attr('aria-modal','true');
                    $(modal_class).removeAttr('aria-hidden');
                    $('body').append('<div id="bg_bluer1" class="bg-gray-900 bg-opacity-50 dark:bg-opacity-80 fixed inset-0 z-40"></div><div id="bg_bluer2" class="bg-gray-900 bg-opacity-50 dark:bg-opacity-80 fixed inset-0 z-40"></div>');
                }



            });


        </script>



@endsection
