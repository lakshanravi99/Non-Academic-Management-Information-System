
@extends('admin.admin_master_custom')
@section('admin')


    <div class="content">

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


        <!-- Add designation modal -->
        <div id="add-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center p-4 w-full md:inset-0 h-modal md:h-full">
            <div class="relative w-full max-w-2xl h-full md:h-auto">
                <!-- Modal content -->
                <form action="#" id="add_form" class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex justify-between items-start p-4 rounded-t border-b dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                            Edit Designation
                        </h3>
                        <button type="button" class="decline text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="add-modal">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="p-6 space-y-6">
                        <div class="grid grid-cols-6 gap-6">

                            <div class="col-span-6 sm:col-span-3">
                                <label for="designation_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Designation Name</label>
                                <input type="text" name="designation_name" id="designation_name" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Designation Name" required="">
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="age" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Age</label>
                                <input type="text" name="age" id="age" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Age" required="">
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="salary" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Salary</label>
                                <input type="text" name="salary" id="salary" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Salary" required="">
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="cadre" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Cadre</label>
                                <input type="number" name="cadre" id="cadre" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="cadre" required="">
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="qualification" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Qualification</label>
                                <textarea id="qualification" name="qualification" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Qualification"></textarea>
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="details" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Details</label>
                                <textarea id="details" name="details" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Details"></textarea>
                            </div>
                        </div>
                    </div>
                    <!-- Modal footer -->
                    <div class="flex items-center p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
                        <button data-modal-toggle="add-modal" type="submit" name="add_submit" id="add_submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Save all</button>
                        <button data-modal-toggle="add-modal" type="button" class="decline text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Decline</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Edit designation modal -->
        <div id="edit-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center p-4 w-full md:inset-0 h-modal md:h-full">
            <div class="relative w-full max-w-2xl h-full md:h-auto">
                <!-- Modal content -->
                <form action="#" id="edit_form" class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex justify-between items-start p-4 rounded-t border-b dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                            Edit Designation
                        </h3>
                        <button type="button" class="decline text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="p-6 space-y-6">
                        <div class="grid grid-cols-6 gap-6">
                            <input type="hidden" id="edit_id">
                            <div class="col-span-6 sm:col-span-3">
                                <label for="edit_designation_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Designation Name</label>
                                <input type="text" name="edit_designation_name" id="edit_designation_name" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Designation Name" required="">
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="edit_age" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Age</label>
                                <input type="text" name="age" id="edit_age" class="edit_age shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Age" required="">
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="edit_salary" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Salary</label>
                                <input type="text" name="edit_salary" id="edit_salary" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Salary" required="">
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="edit_cadre" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Cadre</label>
                                <input type="number" name="edit_cadre" id="edit_cadre" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="cadre" required="">
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="edit_qualification" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Qualification</label>
                                <textarea id="edit_qualification" name="edit_qualification" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Qualification"></textarea>
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="edit_details" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Details</label>
                                <textarea id="edit_details" name="edit_details" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Details"></textarea>
                            </div>
                        </div>
                    </div>
                    <!-- Modal footer -->
                    <div class="flex items-center p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
                        <button type="submit" name="update_submit" id="update_submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Save all</button>
                        <button type="button" class="decline text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Decline</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- start view Model -->
        <div id="view-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full" style="    justify-content: center;
    align-items: center;">
            <div class="relative p-4 w-full max-w-md h-full md:h-auto">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex justify-between items-center p-5 rounded-t border-b dark:border-gray-600">
                        <h3 class="text-xl font-medium text-gray-900 dark:text-white">
                            Description
                        </h3>
                        <button type="button" class="decline text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white">
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="p-6 space-y-6">
                        <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400" id="ptex">
                        </p>
                    </div>
                    <!-- Modal footer -->
                    <div class="flex items-center p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
                    </div>
                </div>
            </div>
        </div>
        <!-- End view Model -->

        <!-- Start Delete Model -->
        <div id="delete-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 md:inset-0 h-modal md:h-full" style="justify-content: center;
    align-items: center;">
            <div class="relative p-4 w-full max-w-md h-full md:h-auto">
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <button type="button" class="decline absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                    <div class="p-6 text-center">
                        <svg aria-hidden="true" class="mx-auto mb-4 w-14 h-14 text-gray-400 dark:text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to delete "<span id="deletespan"></span>"?</h3>
                        <input type="hidden" id="delete_id">
                        <button type="button" class="delete_confirm text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                            Yes, I'm sure
                        </button>
                        <button type="button" class="decline text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No, cancel</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- End delete Model -->

        <!-- Start Set season modal -->
        <div id="season-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full" style="padding-left: 17%;">
            <div class="relative p-4 w-full max-w-4xl h-full md:h-auto">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">

                    <!-- Modal header -->
                    <div class="flex justify-between items-center p-5 rounded-t border-b dark:border-gray-600">
                        <h3 class="text-xl font-medium text-gray-900 dark:text-white">
                            Intakes
                        </h3>
                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="season-modal">
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="p-6 space-y-6">
                        <!-- Start Delete Model -->
                        <div id="season_delete-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 md:inset-0 h-modal md:h-full">
                            <div class="relative p-4 w-full max-w-md h-full md:h-auto">
                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                    <button type="button" class="decline absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="season_delete-modal">
                                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                    <div class="p-6 text-center">
                                        <svg aria-hidden="true" class="mx-auto mb-4 w-14 h-14 text-gray-400 dark:text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                        <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to delete <span id="deletespan"></span></h3>
                                        <input type="hidden" id="season_delete_id">
                                        <button data-modal-toggle="season_delete-modal" type="button" id="season_delete_confirm" class="season_delete_confirm text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                            Yes, I'm sure
                                        </button>
                                        <button data-modal-toggle="season_delete-modal" type="button" class="decline text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No, cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End delete Model -->
                        <div class="mb-6">
                            <label for="seasons" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Please set The Intake</label>
                            <select id="seasons" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                            </select>
                        </div>
                        <div class="mb-6">
                            <button data-modal-toggle="season-modal" type="button" id="select_season_button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Select</button>
                        </div>


                        <div class="d-flex" style="text-align: center;">
                            <hr class="my-auto flex-grow-1">
                            <div class="px-4">OR</div>
                            <hr class="my-auto flex-grow-1">
                        </div>

                        <div class="mb-6">
                            <label for="season" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Add/Update Intake</label>
                            <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
                                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="py-3 px-6">
                                            Intake
                                        </th>
                                        <th scope="col" class="py-3 px-6">
                                            Start Date
                                        </th>
                                        <th scope="col" class="py-3 px-6">
                                            End Date
                                        </th>
                                        <th scope="col" class="py-3 px-6">
                                            Action
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody id="season_table">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- Modal footer -->
                    <div class="flex items-center p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">

                    </div>
                </div>
            </div>
        </div>


        <!-- End set season modal -->




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
                    <img alt="" src="/{{session('propic')}} ">
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
            <div class="col-span-12 2xl:col-span-9">
                <div class="grid grid-cols-12 gap-6">

                    <!-- BEGIN: General Report -->
                    <div class="col-span-12 mt-8">
                        <div class="intro-y flex items-center h-10">
                            <h2 class="text-lg font-medium truncate mr-5">
                                General Report
                            </h2>

                        </div>
                        <div class="grid grid-cols-12 gap-6 mt-5">
                            <a class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y" href="{{route('admin_appliciant')}}">
                                <div class="report-box zoom-in">
                                    <div class="box p-5">
                                        <div class="flex">
                                            <i data-lucide="shopping-cart" class="report-box__icon text-primary"></i>
                                            <div class="ml-auto">
                                                <div class="report-box__indicator bg-success tooltip cursor-pointer" title="33% Higher than last month"> 33% <i data-lucide="chevron-up" class="w-4 h-4 ml-0.5"></i> </div>
                                            </div>
                                        </div>
                                        <div class="all-appliciants text-3xl font-medium leading-8 mt-6"></div>
                                        <div class="text-base text-slate-500 mt-1">Appliciants</div>
                                    </div>
                                </div>
                            </a>
                            <a class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y" href="{{route('admin_appliciant_exam')}}">
                                <div class="report-box zoom-in">
                                    <div class="box p-5">
                                        <div class="flex">
                                            <i data-lucide="credit-card" class="report-box__icon text-pending"></i>
                                            <div class="ml-auto">
                                                <div class="report-box__indicator bg-danger tooltip cursor-pointer" title="2% Lower than last month"> 2% <i data-lucide="chevron-down" class="w-4 h-4 ml-0.5"></i> </div>
                                            </div>
                                        </div>
                                        <div class="text-3xl font-medium leading-8 mt-6"></div>
                                        <div class="text-base text-slate-500 mt-1">Exams</div>
                                    </div>
                                </div>
                            </a>
                            <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y" id="season_link" data-modal-toggle="season-modal">
                                <div class="report-box zoom-in">
                                    <div class="box p-5">
                                        <div class="flex">
                                            <i data-lucide="user" class="report-box__icon text-success"></i>
                                            <div class="ml-auto">
                                                <div class="tooltip cursor-pointer" title="22% Higher than last month" style="font-size: 175%;font-weight:700;"> {{session('current_season')}}</div>
                                            </div>
                                        </div>
                                        <div class="text-3xl font-medium leading-8 mt-6" id="season_value"></div>
                                        <div class="text-base text-slate-500 mt-1">Intake</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END: General Report -->



                    <!-- END: Sales Report -->
                    <!-- BEGIN: Weekly Top Products -->
                    <div class="col-span-12 mt-6">
                        <div class="intro-y block sm:flex items-center h-10">
                            <h2 class="text-lg font-medium truncate mr-5">
                                Current Application Summary
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
                                    <th class="whitespace-nowrap">Designation Name</th>
                                    <th class="text-center whitespace-nowrap">Received Applications</th>
                                    <th class="text-center whitespace-nowrap">Rejected Applications</th>
                                    <th class="text-center whitespace-nowrap">Currently Available</th>
                                </tr>
                                </thead>
                                <tbody id="current_appliciant_summary_table">

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
                    <!-- BEGIN: Weekly Top Products -->
                    <div class="col-span-12 mt-6">
                        <div class="intro-y block sm:flex items-center h-10">
                            <h2 class="text-lg font-medium truncate mr-5">
                                Designations
                            </h2>
                            <div class="flex items-center sm:ml-auto mt-3 sm:mt-0">
                                <button class="btn box flex items-center text-slate-600 dark:text-slate-300"> <i data-lucide="file-text" class="hidden sm:block w-4 h-4 mr-2"></i> Export to Excel </button>
                                <button class="ml-3 btn box flex items-center text-slate-600 dark:text-slate-300"> <i data-lucide="file-text" class="hidden sm:block w-4 h-4 mr-2"></i> Export to PDF </button>
                            </div>
                        </div>
                        <div class="intro-y block sm:flex items-center h-10 mt-3">
                            <!-- Start alert sucess -->
                            <div id="alert-success_designation" class="hidden flex p-4 mb-4 bg-green-100 rounded-lg dark:bg-green-200" role="alert">
                                <svg aria-hidden="true" class="flex-shrink-0 w-5 h-5 text-green-700 dark:text-green-800" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                                <span class="sr-only">Info</span>
                                <div id="alert-success_designation_message" class="ml-3 text-sm font-medium text-green-700 dark:text-green-800">

                                </div>
                                <button type="button" class="decline_alert ml-auto -mx-1.5 -my-1.5 bg-green-100 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex h-8 w-8 dark:bg-green-200 dark:text-green-600 dark:hover:bg-green-300" data-dismiss-target="#alert-success_designation" aria-label="Close">
                                    <span class="sr-only">Close</span>
                                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                </button>
                            </div>
                            <!-- End alert sucess -->

                            <!-- Start alert danger -->
                            <div id="alert-danger_designation" class="hidden flex p-4 mb-4 bg-red-100 rounded-lg dark:bg-red-200 mt-2" role="alert">
                                <svg aria-hidden="true" class="flex-shrink-0 w-5 h-5 text-red-700 dark:text-red-800" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                                <span class="sr-only">Info</span>
                                <div id="alert-danger_designation_message" class="ml-3 text-sm font-medium text-red-700 dark:text-red-800">

                                </div>
                                <button type="button" class="decline_alert ml-auto -mx-1.5 -my-1.5 bg-red-100 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex h-8 w-8 dark:bg-red-200 dark:text-red-600 dark:hover:bg-red-300" data-dismiss-target="#alert-danger_designation" aria-label="Close">
                                    <span class="sr-only">Close</span>
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                </button>
                            </div>
                            <!-- End alert danger -->

                            <div class="flex items-center sm:ml-auto mt-3 sm:mt-0">
                                <button data-modal-toggle="add-modal" type="button" id="add" class="add text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">+Add New</button>
                            </div>
                        </div>
                        <div class="intro-y overflow-auto lg:overflow-visible mt-8 sm:mt-0">

                            <table class="table table-report sm:mt-2">


                                <thead>

                                <tr>
                                    <th class="whitespace-nowrap">ID</th>
                                    <th class="whitespace-nowrap">Designation Name</th>
                                    <th class="text-center whitespace-nowrap">Qulifications</th>
                                    <th class="text-center whitespace-nowrap">Details</th>
                                    <th class="text-center whitespace-nowrap">Cadre</th>
                                    <th class="text-center whitespace-nowrap">Currently</th>
                                    <th class="text-center whitespace-nowrap">Vacancies</th>
                                    <th class="text-center whitespace-nowrap">Actions</th>
                                </tr>
                                </thead>
                                <tbody id="designation_table">

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



                    <!-- tailwind table -->
                    <!-- tailwind table end -->


                </div>
            </div>
            <div class="col-span-12 2xl:col-span-3">
                <div class="2xl:border-l -mb-10 pb-10">
                    <div class="2xl:pl-6 grid grid-cols-12 gap-x-6 2xl:gap-x-0 gap-y-6">


                        <!-- BEGIN: Important Notes -->
                        <div class="col-span-12 md:col-span-6 xl:col-span-12 xl:col-start-1 xl:row-start-1 2xl:col-start-auto 2xl:row-start-auto mt-3">
                            <!-- <div class="intro-x flex items-center h-10">
                                        <h2 class="text-lg font-medium truncate mr-auto">
                                            Important Notes
                                        </h2>

                                        <button data-carousel="important-notes" data-target="prev" class="tiny-slider-navigator btn px-2 border-slate-300 text-slate-600 dark:text-slate-300 mr-2"> <i data-lucide="chevron-left" class="w-4 h-4"></i> </button>
                                        <button data-carousel="important-notes" data-target="next" class="tiny-slider-navigator btn px-2 border-slate-300 text-slate-600 dark:text-slate-300 mr-2"> <i data-lucide="chevron-right" class="w-4 h-4"></i> </button>
                                    </div>
                                    <div class="mt-5 intro-x">
                                        <div class="box zoom-in">
                                            <div class="tiny-slider" id="important-notes">
                                                @foreach($notice as $n)
                                <div class="p-5">
                                    <div class="text-base font-medium truncate">{{$n->usertype}}</div>
                                                        <div class="text-slate-400 mt-1">
                                                            {{ \Carbon\Carbon::parse($n->created_at)->diffForHumans() }}</i>
                                                        </div>
                                                        <div class="text-slate-500 text-justify mt-1">
                                                            {{$n->text}}
                                </div>
                                <div class="font-medium flex mt-5">
                                    <a href="{{ url('readNOTICEs/'.$n->file)}}" target="blank">
                                                                <button  type="button" class="btn btn-secondary py-1 px-2">View</button>
                                                            </a>
                                                        </div>
                                                    </div>
                                                @endforeach
                            </div>
                        </div>
                    </div> -->
                            <!-- BEGIN: Weekly Top Seller -->
                            <!-- <div class="col-span-12 sm:col-span-6 lg:col-span-3 mt-8"> -->
                            <div class="intro-y flex items-center h-10">
                                <h2 class="text-lg font-medium truncate mr-5">
                                    Appliciants Count
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
                            <!-- </div> -->
                            <!-- END: Weekly Top Seller -->
                        </div>
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
            var selected;

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
            //appliciantCountPieChart();
            function fetchdata(){
                console.log("Hello fetch");
                $.ajax({
                    method: "GET",
                    url: "check-season",
                    datatype: "json",
                    success: function(response){
                        console.log(response.season);

                        if(response.season==null){
                            $('#season-modal').removeClass('hidden');
                        }

                    }
                });

                $.ajax({
                    method: "GET",
                    url: "fetch-designation",
                    datatype: "json",
                    success: function(response){
                        console.log("this is responsee");
                        console.log(response);
                        $('#designation_table').html("");
                        $.each(response.data, function (ket, item) {
                            $vacancies = (item.cadre-item.current_count);
                            $('#designation_table').append('<tr>\
                            <td class="text-center">'+item.designation_id+'</td>\
                            <td class="text-center">'+item.designation_name+'</td>\
                            <td class="text-center">\
                                <button class="view_qualification flex items-center mr-3 text-primary" id="view_qualification" value="'+item.designation_id+'" type="button"> <i data-lucide="check-square" class="w-4 h-4 mr-1"></i>View</button>\
                            </td>\
                            <td class="text-center">\
                                <button class="view_details flex items-center mr-3 text-primary" id="view_details" value="'+item.designation_id+'" type="button"> <i data-lucide="check-square" class="w-4 h-4 mr-1"></i>View</button>\
                            </td>\
                            <td class="text-center">'+item.cadre+'</td>\
                            <td class="text-center">'+item.current_count+'</td>\
                            <td class="text-center">'+$vacancies+'</td>\
                            <td class="table-report__action w-56">\
                                <div class="flex justify-center items-center">\
                                    <button class="edit flex items-center mr-3 text-warning" id="edit" type="button" value="'+item.designation_id+'"> <i data-lucide="check-square" class="w-4 h-4 mr-1"></i> Edit</button>\
                                    <button class="delete_designation flex items-center text-danger" id="delete_designation" value="'+item.designation_id+'" type="button"><i data-lucide="trash-2" class="w-4 h-4 mr-1"></i> Delete</button>\
                                </div>\
                            </td>\
                            </td>'
                            );
                        });

                        $('#current_appliciant_summary_table').html("");
                        $.each(response.dc_array, function (ket, item) {
                            $available = (item.designation_count - item.rejected_application);
                            $('#current_appliciant_summary_table').append('<tr>\
                            <td class="text-center">'+item.designation_name+'</td>\
                            <td class="text-center">'+item.designation_count+'</td>\
                            <td class="text-center "><span class="bg-red-100 text-red-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-red-200 dark:text-red-900">'+item.rejected_application+'</span></td>\
                            <td class="text-center"><span class="bg-green-100 text-green-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-green-200 dark:text-green-900">'+$available+'</span></td>\
                            </td>'
                            );
                        });


                    }
                });

                $.ajax({
                    method: "GET",
                    url: "fetch-season",
                    datatype: "json",
                    success: function(response){

                        console.log(response);
                        $('#seasons').html("");
                        $('#season_table').html("");
                        $.each(response.data, function (ket, item) {
                            $('#seasons').append('<option id="'+item.id+'" value="'+item.id+'">'+item.season+'</option>');

                            $('#season_table').append('<tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">\
                            <td class="py-4 px-6" id="'+item.id+'_edit_season">'+item.season+'</td>\
                            <td class="py-4 px-6" id="'+item.id+'_edit_start_date">'+item.start_date+'</td>\
                            <td class="py-4 px-6" id="'+item.id+'_edit_end_date">'+item.end_date+'</td>\
                            <td class="py-4 px-6"">\
                                <div class="flex justify-center items-center">\
                                    <button class="edit_season_button flex items-center mr-3 text-warning" id="'+item.id+'_edit_season_button" type="button" value="'+item.id+'"> <i data-lucide="check-square" class="w-4 h-4 mr-1"></i> Edit</button>\
                                    <button class="delete_season flex items-center text-danger" id="delete_season" value="'+item.id+'" type="button" data-modal-toggle="season_delete-modal"><i data-lucide="trash-2" class="w-4 h-4 mr-1"></i> Delete</button>\
                                </div>\
                            </td>\
                            </tr>'
                            );
                        });
                        $('#season_table').append('<tr>\
                        <form>\
                            <td class="py-4 px-6"><input type="text" id="season" class="block p-2 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Season" required></td>\
                            <td class="py-4 px-6"><input type="date" id="start_date" class="block p-2 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Start Date" required></td>\
                            <td class="py-4 px-6"><input type="date" id="end_date" class="block p-2 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="End Date" required></td>\
                             <td class="py-4 px-6">\
                                <button type="button" id="add_season" class="py-2 px-3 text-xs font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">+ Add New</button>\
                            </td>\
                        </form>\
                    </tr>'
                        );
                    }
                });

                // $.ajax({
                //     method: "GET",
                //     url: "fetch-appliciant",
                //     datatype: "json",
                //     success: function(response){
                //         console.log(response);

                //         $('#count_box').html("");
                //         $.each(response.dc_array, function (ket, item) {
                //             $all = response.count_all;
                //             $presentage1 = ((item.designation_count/$all)*100).toFixed(2);
                //             $('#count_box').append('<div class="flex items-center">\
                //                 <div class="w-2 h-2 bg-primary rounded-full mr-3"></div>\
                //                     <span class="truncate">'+item.designation_name+'- </span> <span class="font-medium ml-auto">'+item.designation_count+' - '+$presentage1+'</span>\
                //                 </div>'
                //             );
                //         });

                //         $('.all-appliciants').text(response.count_all);

                //     },
                //     error: function(response){
                //         console.log("fail");
                //     }
                // });


            }

            //store
            $(document).on('click', '#add_submit', function(e){
                //same #submit use in update function. go for solution letter
                e.preventDefault();

                console.log("Hello");
                var data = {
                    'designation_name' : $('#designation_name').val(),
                    'age' : $('#age').val(),
                    'salary' : $('#salary').val(),
                    'cadre' : $('#cadre').val(),
                    'qualification' : $('#qualification').val(),
                    'details' : $('#details').val()
                }
                console.log(data);

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    method: "POST",
                    url: "add-designation",
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
                            $('#alert-success_designation_message').text(response.message);
                            $('#alert-success_designation').removeClass('hidden');
                            $('#alert-success_designation').slideDown( 300 ).delay( 800 ).fadeIn( 400 );
                            $("#add_form")[0].reset();
                            fetchdata();
                        }
                    }
                });

            });

            //Delete
            $(document).on('click', '.delete_designation', function (e) {
                console.log("Hello delete");
                e.preventDefault();
                var designation_id = this.getAttribute('value');
                //console.log(designation_id);

                //Send student id to box
                $('#delete_id').val(designation_id);


                // $('#delete-modal').removeClass('hidden');
                // $('#delete-modal').addClass('flex');

                // $('#delete-modal').attr('role','dialog');
                // $('#delete-modal').attr('aria-modal','true');
                // $('#delete-modal').removeAttr('aria-hidden');
                // $('#deletespan').append('Designation '+designation_id+'');

                $('#deletespan').append('Designation '+designation_id+'');
                $('#delete-modal').removeClass('hidden');
                $('#delete-modal').addClass('flex');
                $('#delete-modal').attr('role','dialog');
                $('#delete-modal').attr('aria-modal','true');
                $('#delete-modal').removeAttr('aria-hidden');
                $('body').append('<div id="bg_bluer1" class="bg-gray-900 bg-opacity-50 dark:bg-opacity-80 fixed inset-0 z-40"></div><div id="bg_bluer2" class="bg-gray-900 bg-opacity-50 dark:bg-opacity-80 fixed inset-0 z-40"></div>');




                //$('body').append('<div modal-backdrop="" class="bg-gray-900 bg-opacity-50 dark:bg-opacity-80 fixed inset-0 z-40"></div><div modal-backdrop="" class="bg-gray-900 bg-opacity-50 dark:bg-opacity-80 fixed inset-0 z-40"></div>');
                //console.log($('#edit-modall'));


            });

            // $(document).on('click', '#decline', function (e) {



            //     $('#edit-modall').removeClass('flex');
            //     $('#edit-modall').addClass('hidden');



            //      //console.log($('#edit-modall'));


            // });

            $(document).on('click', '.delete_confirm', function (e) {
                e.preventDefault();

                //Show deleting..
                //$(this).text("Deleting...");

                var designation_id = $('#delete_id').val();
                console.log(designation_id);

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    method: "DELETE",
                    url: "delete-designation/"+designation_id,
                    success: function (response) {
                        console.log(response);
                        $('#alert-danger_designation_message').text(response.message);
                        $('#alert-danger_designation').removeClass('hidden');
                        $('#alert-danger_designation').slideDown( 300 ).delay( 800 ).fadeIn( 400 );
                        fetchdata();

                    }
                });
            });
            //End Delete

            //Edit
            $(document).on('click', '.edit', function (e) {
                e.preventDefault();
                var id = this.getAttribute('value');
                console.log(id);

                //call form modal
                // $('#edit-modal').removeClass('hidden');
                // $('#edit-modal').addClass('flex');

                // $('#edit-modal').attr('role','dialog');
                // $('#edit-modal').attr('aria-modal','true');
                // $('#edit-modal').removeAttr('aredit-modal');

                $('#edit-modal').removeClass('hidden');
                $('#edit-modal').addClass('flex');
                $('#edit-modal').attr('role','dialog');
                $('#edit-modal').attr('aria-modal','true');
                $('#edit-modal').removeAttr('aria-hidden');
                $('body').append('<div id="bg_bluer1" class="bg-gray-900 bg-opacity-50 dark:bg-opacity-80 fixed inset-0 z-40"></div><div id="bg_bluer2" class="bg-gray-900 bg-opacity-50 dark:bg-opacity-80 fixed inset-0 z-40"></div>');

                $.ajax({
                    method: "GET",
                    url: "edit-designation/"+id,
                    success: function (response) {
                        //console.log(response);
                        if(response.status==404){
                            $('#success_message').html("");
                            $('#success_message').addClass('alert alert-danger');
                            $('#success_message').text(response.message);
                        }
                        else{
                            //Insert data into input fields
                            console.log(response.edit_details[0].designation_name);
                            $('#edit_designation_name').val(response.edit_details[0].designation_name);
                            $('#edit_age').val(response.edit_details[0].age);
                            $('#edit_salary').val(response.edit_details[0].salary);
                            $('#edit_cadre').val(response.edit_details[0].cadre);
                            $('#edit_qualification').val(response.edit_details[0].qualification);
                            $('#edit_details').val(response.edit_details[0].details);
                            $('#edit_id').val(id);


                        }
                    }
                });
            });
            //End Edit

            //Update
            $(document).on('click','#update_submit', function (e) {
                e.preventDefault();
                //Get inpu field values
                var id = $('#edit_id').val();

                console.log(id);
                var data = {
                    'designation_name' : $('#edit_designation_name').val(),
                    'age' : $('#edit_age').val(),
                    'salary' : $('#edit_salary').val(),
                    'cadre' : $('#edit_cadre').val(),
                    'qualification' : $('#edit_qualification').val(),
                    'details' : $('#edit_details').val()
                }
                console.log(data);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "PUT",
                    url: "update-designation/"+id,
                    data: data,
                    dataType: "json",
                    success: function (response) {
                        console.log(response.message);

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
                            $('#alert-success_designation_message').text(response.message);
                            $('#alert-success_designation').removeClass('hidden');
                            $('#alert-success_designation').slideDown( 300 ).delay( 800 ).fadeIn( 400 );

                            $('#edit_form')[0].reset();
                            $('#edit-modal').addClass('hidden');
                            $('.delete_box').addClass('hidden');
                            $('.modal').addClass('hidden');
                            $('#bg_bluer1,#bg_bluer2').remove();
                            $('#ptex').html("");
                            fetchdata();
                        }
                    }
                });
            });

            //view qualification
            $(document).on('click', '.view_qualification', function (e) {
                e.preventDefault();

                var id = this.getAttribute('value');
                console.log(id);

                $.ajax({
                    method: "GET",
                    url: "view-qualification/"+id,
                    success: function (response) {
                        //console.log(response);
                        if(response.status==404){
                            $('#success_message').html("");
                            $('#success_message').addClass('alert alert-danger');
                            $('#success_message').text(response.message);
                        }
                        else{
                            //Insert data into input fields
                            //console.log(response.qualification[0].qualification);
                            $('#ptex').append(response.qualification[0].qualification);

                            //call form modal
                            $('#view-modal').removeClass('hidden');
                            $('#view-modal').addClass('flex');
                            $('#view-modal').attr('role','dialog');
                            $('#view-modal').attr('aria-modal','true');
                            $('#view-modal').removeAttr('aria-hidden');
                            $('body').append('<div id="bg_bluer1" class="bg-gray-900 bg-opacity-50 dark:bg-opacity-80 fixed inset-0 z-40"></div><div id="bg_bluer2" class="bg-gray-900 bg-opacity-50 dark:bg-opacity-80 fixed inset-0 z-40"></div>');


                        }
                    }
                });
            });
            //End view qualification

            //view details
            $(document).on('click', '.view_details', function (e) {
                e.preventDefault();

                var id = this.getAttribute('value');
                console.log(id);


                $.ajax({
                    method: "GET",
                    url: "view-details/"+id,
                    success: function (response) {
                        //console.log(response);
                        if(response.status==404){
                            $('#success_message').html("");
                            $('#success_message').addClass('alert alert-danger');
                            $('#success_message').text(response.message);
                        }
                        else{
                            //Insert data into input fields
                            //console.log(response);
                            $('#ptex').append(response.details[0].details +"<br><br>"+response.details[0].age+"<br><br>"+response.details[0].salary);

                            $('#view-modal').removeClass('hidden');
                            $('#view-modal').addClass('flex');
                            $('#view-modal').attr('role','dialog');
                            $('#view-modal').attr('aria-modal','true');
                            $('#view-modal').removeAttr('aria-hidden');
                            $('body').append('<div id="bg_bluer1" class="bg-gray-900 bg-opacity-50 dark:bg-opacity-80 fixed inset-0 z-40"></div><div id="bg_bluer2" class="bg-gray-900 bg-opacity-50 dark:bg-opacity-80 fixed inset-0 z-40"></div>');


                        }
                    }
                });
            });
            //End view details

            //Start season table
            //store
            $(document).on('click', '#add_season', function(e){
                e.preventDefault();

                console.log("Hello");
                var data = {
                    'season' : $('#season').val(),
                    'start_date' : $('#start_date').val(),
                    'end_date' : $('#end_date').val()
                }
                //console.log(data);

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    method: "POST",
                    url: "add-season",
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
            //End Store

            //Delete
            $(document).on('click', '#delete_season', function (e) {
                console.log("Hello delete");
                e.preventDefault();
                var id = this.getAttribute('value');
                console.log(id);

                //Send student id to box
                $('#season_delete_id').val(id);
                $('#deletespan').append('"Season ID '+id+'"?');


                $('#season_delete-modal').removeClass('hidden');
                $('#season_delete-modal').addClass('flex');

                $('#season_delete-modal').attr('role','dialog');
                $('#season_delete-modal').attr('aria-modal','true');
                $('#season_delete-modal').removeAttr('aria-hidden');


                //$('body').append('<div modal-backdrop="" class="bg-gray-900 bg-opacity-50 dark:bg-opacity-80 fixed inset-0 z-40"></div><div modal-backdrop="" class="bg-gray-900 bg-opacity-50 dark:bg-opacity-80 fixed inset-0 z-40"></div>');
                //console.log($('#edit-modall'));


            });

            // $(document).on('click', '#decline', function (e) {
            //     $('#edit-modall').removeClass('flex');
            //     $('#edit-modall').addClass('hidden');
            //      //console.log($('#edit-modall'));
            // });

            $(document).on('click', '.season_delete_confirm', function (e) {
                e.preventDefault();

                //Show deleting..
                //$(this).text("Deleting...");

                var id = $('#season_delete_id').val();
                //console.log(id);

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    method: "DELETE",
                    url: "delete-season/"+id,
                    success: function (response) {
                        console.log(response);
                        //$('#success_message').addClass('alert alert-success');
                        $('#success_message').text(response.message);
                        //$('#available_test_delete-modal').hide();
                        // $('.delete_student_btn').text("Yes Delete!");
                        fetchdata();

                    }
                });
            });
            //End Delete

            //Edit
            $(document).on('click', '.edit_season_button', function (e) {
                e.preventDefault();
                var id = this.getAttribute('value');
                console.log(id);

                //call form modal
                $('#'+id+'_edit_season').html('<input type="text" value="" id="'+id+'_new_season" class="block p-2 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"/>');
                $('#'+id+'_edit_start_date').html('<input type="date" id="'+id+'_new_start_date" class="block p-2 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"/>');
                $('#'+id+'_edit_end_date').html('<input type="date" id="'+id+'_new_end_date" class="block p-2 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"/>');
                $('#'+id+'_edit_season_button').html('<button id="'+id+'_save_season_button" value="'+id+'" class="save_season_button bg-green-100 hover:bg-green -200 text-green-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-green-200 dark:text-green-900" type="button"> <i data-lucide="check-square" class="w-4 h-4 mr-1"></i> Save</button>');

                $.ajax({
                    method: "GET",
                    url: "edit-season/"+id,
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
                            $('#'+id+'_new_season').val(response.details[0].season);
                            //$('#'+id+'_exam_id').attr('value', response.details[0].exam_id);

                            $('#'+id+'_new_start_date').val(response.details[0].start_date);
                            $('#'+id+'_new_end_date').val(response.details[0].end_date);
                            $('#edit_season').val(id);
                        }
                    }
                });

            });
            //End Edit

            //Update
            $(document).on('click','.save_season_button', function (e) {
                e.preventDefault();
                //Get inpu field values
                var id = this.getAttribute('value');

                console.log("in save season");
                var data = {
                    'new_season' : $('#'+id+'_new_season').val(),
                    'new_start_date' : $('#'+id+'_new_start_date').val(),
                    'new_end_date' : $('#'+id+'_new_end_date').val(),
                }
                console.log(id);
                console.log(data);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "PUT",
                    url: "update-season/"+id,
                    data: data,
                    dataType: "json",
                    success: function (response) {
                        console.log("sucess");
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
                            console.log("in else");
                            $('#'+id+'_new_season').html("");
                            $('#'+id+'_new_start_date').html("");
                            $('#'+id+'_new_end_date').html("");

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
            //End season table


            //Start select season
            $(document).on('click','#select_season_button', function (e) {
                e.preventDefault();

                var data = {
                    'selected_season' : $('#seasons').val(),
                }

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "POST",
                    url: "select-season",
                    data: data,
                    dataType: "json",
                    success: function (response) {
                        $('#designation_table').html("");
                        $('#current_appliciant_summary_table').html("");
                        //$('#season_value').html("");
                        //$('#season_value').append(response.season);

                        selected="true";
                        // $('#'+id+'_new_season').html("");
                        // $('#'+id+'_new_start_date').html("");
                        // $('#'+id+'_new_end_date').html("");
                        fetchdata();


                        // if(response.status==400){
                        //     //errors
                        //     $('#updateform_errList').html("");
                        //     $('#updateform_errList').addClass('alert alert-denger');
                        //     $.each(response.errors, function(key, err_values){
                        //         $('#updateform_errList').append('<li>'+err_values+'</li>');
                        //     });
                        // }
                        // else if(response.status==404){
                        //     $('#updateform_errList').html("");
                        //     $('#success_message').addClass('alert alert-success')
                        //     $('#success_message').text(response.message)
                        // }

                        // else{


                        // }
                        location.reload();
                    }


                });
            });

            //End select season



            //clear fields if press cancel button
            $(document).on('click', '.decline', function (e) {
                $('#edit_form')[0].reset();
                $('#ptex').html("");
                $('#deletespan').html("");
            });

            $(document).on('click', '.decline_alert', function (e) {
                $('#alert-success_designation').finish();
                $('#alert-danger_designation').finish();
            });

            //clear fields if press cancel button
            $(document).on('click', '.decline, #available_test_update_submit', function (e) {
                $('#edit-modal').addClass('hidden');
                $('#view-modal').addClass('hidden');
                $('.delete_box').addClass('hidden');
                $('.modal').addClass('hidden');
                $('#bg_bluer1,#bg_bluer2').remove();
                $('#edit_form')[0].reset();
                $('#ptex').html("");

                //delete
                $('#delete-modal').addClass('hidden');
                $('#bg_bluer1,#bg_bluer2').remove();
                $(function(){
                    setTimeout(function(){
                        $(alert).addClass('hidden');
                    }, 2000);
                });
                $('.deletespan').html("");
                fetchdata();
            });


        });
    </script>

@endsection
