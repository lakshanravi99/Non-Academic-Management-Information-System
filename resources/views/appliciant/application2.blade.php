
@extends('appliciant.appliciant_master_custom')
@section('admin')

    <div class="content">
        @include('appliciant.body.topbar',[ 'title' => "Application 2"])


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
                                <a href="{{url('appliciant/load-view-own')}}" class="px-5 pb-8 text-center"> <button type="button" id="ok" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Ok</button> </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- BEGIN: Top Bar -->

        <!-- END: Top Bar -->
        <div class="grid grid-cols-12">
            <div class="col-span-12 ">

                <!-- Start Application -->
                <div class="intro-y box">
                    <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                        <h2 class="font-medium text-base mr-auto">රුහුණ විශ්වවිදɕාලය - ශී ලංකාව {}) තනතුර සදහා අයදුම් පතය</h2>
                        <input type="hidden"  name="desig_id" value="">
                        <input type="hidden"  name="user_id" value="">
                    </div>

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
                                <th scope="col" class="py-3 px-6">
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
                    <div id="ol1_content" class="hidden overflow-x-auto relative shadow-md sm:rounded-lg">
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
                                <th scope="col" class="py-3 px-6">
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
                    <div id="ol2_content" class="hidden overflow-x-auto relative shadow-md sm:rounded-lg">
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
                                <th scope="col" class="py-3 px-6">
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
                    <div id="al_content" class="hidden overflow-x-auto relative shadow-md sm:rounded-lg">
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
                                <th scope="col" class="py-3 px-6">
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
                    <div id="university_content" class="hidden overflow-x-auto relative shadow-md sm:rounded-lg">
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
                                <th scope="col" class="py-3 px-6">
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
                    <div id="other_content" class="hidden overflow-x-auto relative shadow-md sm:rounded-lg">
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
                                <th scope="col" class="py-3 px-6">
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
                    <div id="professional_content" class="hidden overflow-x-auto relative shadow-md sm:rounded-lg">
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
                                <th scope="col" class="py-3 px-6">
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
                    <div id="employment_content" class="hidden overflow-x-auto relative shadow-md sm:rounded-lg">
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
                                <th scope="col" class="py-3 px-6">
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
                    <div id="occupation_content" class="hidden overflow-x-auto relative shadow-md sm:rounded-lg">
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
                                <th scope="col" class="py-3 px-6">
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
                    <div id="reference_content" class="hidden overflow-x-auto relative shadow-md sm:rounded-lg">
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
                                <th scope="col" class="py-3 px-6">
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
                    <button type="button" class="previous text-blue-700 border border-blue-700 hover:bg-blue-700 hover:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm p-2.5 text-center inline-flex items-center mr-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:focus:ring-blue-800 mt-3">
                        <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" role="img" class="ml-2 -mr-1 w-5 h-5" preserveAspectRatio="xMidYMid meet" viewBox="0 0 20 20"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m11 5l-7 7l7 7m-7-7h16"/></svg>
                        Previous
                    </button>

                    <button type="button" class="skip float-right text-blue-700 border border-blue-700 hover:bg-blue-700 hover:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm p-2.5 text-center inline-flex items-center mr-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:focus:ring-blue-800 mt-3">
                        Skip
                        <svg aria-hidden="true" class="ml-2 -mr-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </button>

                    <button type="button" class="next float-right text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 mt-3" disabled>
                        Next
                        <svg aria-hidden="true" class="ml-2 -mr-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </button>

                    <a href="{{url('appliciant/application2')}}" class="hidden float-right text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 mt-3" id="submit_all">
                        Submit
                    </a>

                </div>
                <!-- End Application -->




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

            //Jquary
            $(document).ready(function(){
                fetchSchool();
                function fetchSchool(){
                    $.ajax({
                        method: "GET",
                        url: "fetch-school",
                        datatype: "json",
                        success: function(response){
                            console.log(response);
                            $('#school').html("");
                            $.each(response.data, function (ket, item) {
                                $('#school').append('<tr>\
                            <td class="py-4 px-6" id="'+item.appliciant_id+'_school">'+item.school+'</td>\
                            <td class="py-4 px-6" id="'+item.appliciant_id+'_from">'+item.from+'</td>\
                            <td class="py-4 px-6" id="'+item.appliciant_id+'_to">'+item.to+'</td>\
                            <td class="py-4 px-6">\
                                <button type="button" value="'+item.id+'" data-value="appliciant_school_attendeds" data-value3="fetchSchool" class="delete py-2 px-3 text-xs font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Delete</button>\
                            </td>\
                        </tr>'
                                );
                            });
                            $('#school').append('<tr>\
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
                        }
                    });

                    $('.skip').addClass('get_ol_view');
                    $('.previous').addClass('hidden');
                    $('.previous').removeClass('get_school_view');
                }

                // ol view
                function fetchOl(){
                    $.ajax({
                        method: "GET",
                        url: "fetch-ol",
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
                            <td class="py-4 px-6">\
                                <button type="button" value="'+item.id+'" data-value="appliciant_ol_examinations" data-value3="fetchOl" class="delete py-2 px-3 text-xs font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Delete</button>\
                            </td>\
                        </tr>'
                                );
                            });
                            $('#ol1_tbody').append('<tr>\
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

                            $('#ol2').html("");
                            $.each(response.ol2, function (ket, item) {
                                $('#ol2').append('<tr>\
                            <td class="py-4 px-6" id="'+item.id+'_school">'+item.subject+'</td>\
                            <td class="py-4 px-6" id="'+item.id+'_from">'+item.grade+'</td>\
                            <td class="py-4 px-6" id="'+item.id+'_to">'+item.year+'</td>\
                            <td class="py-4 px-6" id="'+item.id+'_from">'+item.index_no+'</td>\
                            <td class="py-4 px-6">\
                                <button type="button" value="'+item.id+'" data-value="appliciant_ol_examinations" data-value3="fetchOl" class="delete py-2 px-3 text-xs font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Delete</button>\
                            </td>\
                        </tr>'
                                );
                            });
                            $('#ol2').append('<tr>\
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
                    $.ajax({
                        method: "GET",
                        url: "fetch-al",
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
                            <td class="py-4 px-6">\
                                <button type="button" value="'+item.id+'" data-value="appliciant_al_examinations" data-value3="fetchAl" class="delete py-2 px-3 text-xs font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Delete</button>\
                            </td>\
                        </tr>'
                                );
                            });
                            $('#al').append('<tr>\
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
                    $.ajax({
                        method: "GET",
                        url: "fetch-university",
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
                            <td class="py-4 px-6">\
                                <button type="button" value="'+item.id+'" data-value="appliciant_university_education" data-value3="fetchUniversity" class="delete py-2 px-3 text-xs font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Delete</button>\
                            </td>\
                        </tr>'
                                );
                            });
                            $('#university').append('<tr>\
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
                    $.ajax({
                        method: "GET",
                        url: "fetch-other",
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
                            <td class="py-4 px-6">\
                                <button type="button" value="'+item.id+'" data-value="appliciant_other_education" data-value3="fetchOther" class="delete py-2 px-3 text-xs font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Delete</button>\
                            </td>\
                        </tr>'
                                );
                            });
                            $('#other').append('<tr>\
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
                    $.ajax({
                        method: "GET",
                        url: "fetch-professional",
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
                            <td class="py-4 px-6">\
                                <button type="button" value="'+item.id+'" data-value="appliciant_professional_qualifications" data-value3="fetchProfessional" class="delete py-2 px-3 text-xs font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Delete</button>\
                            </td>\
                        </tr>'
                                );
                            });
                            $('#professional').append('<tr>\
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
                    $.ajax({
                        method: "GET",
                        url: "fetch-employment",
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
                            <td class="py-4 px-6">\
                                <button type="button" value="'+item.id+'" data-value="appliciant_employment_records" data-value3="fetchEmployment" class="delete py-2 px-3 text-xs font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Delete</button>\
                            </td>\
                        </tr>'
                                );
                            });
                            $('#employment').append('<tr>\
                        <form>\
                            <td class="py-4 px-6"><input type="text" id="entered_employment_post" class="block p-2 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Institute" required></td>\
                            <td class="py-4 px-6"><input type="text" id="entered_employment_institute" class="block p-2 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Institute" required></td>\
                            <td class="py-4 px-6"><input type="date" id="entered_employment_from" class="block p-2 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Year" required></td>\
                            <td class="py-4 px-6"><input type="date" id="entered_employment_to" class="block p-2 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Class" required></td>\
                            <td class="py-4 px-6">\
                                <button type="button" id="submit_employment" class="py-2 px-3 text-xs font-medium text-center text-white bg-green-700 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">+ Add New</button>\
                            </td>\
                        </form>\
                    </tr>'
                            );
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
                    $.ajax({
                        method: "GET",
                        url: "fetch-occupation",
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
                            <td class="py-4 px-6">\
                                <button type="button" value="'+item.id+'" data-value="appliciant_present_occaptions" data-value3="fetchOccupation" class="delete py-2 px-3 text-xs font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Delete</button>\
                            </td>\
                        </tr>'
                                );
                            });
                            $('#occupation').append('<tr>\
                        <form>\
                            <td class="py-4 px-6"><input type="text" id="entered_occupation_post" class="block p-2 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Institute" required></td>\
                            <td class="py-4 px-6"><input type="text" id="entered_occupation_institute" class="block p-2 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Institute" required></td>\
                            <td class="py-4 px-6"><input type="text" id="entered_occupation_salary" class="block p-2 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Year" required></td>\
                            <td class="py-4 px-6"><input type="date" id="entered_occupation_from" class="block p-2 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Class" required></td>\
                            <td class="py-4 px-6">\
                                <button type="button" id="submit_occupation" class="py-2 px-3 text-xs font-medium text-center text-white bg-green-700 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">+ Add New</button>\
                            </td>\
                        </form>\
                    </tr>'
                            );
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
                    $.ajax({
                        method: "GET",
                        url: "fetch-reference",
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
                            <td class="py-4 px-6">\
                                <button type="button" value="'+item.id+'" data-value="appliciant_references" data-value3="fetchReference" class="delete py-2 px-3 text-xs font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Delete</button>\
                            </td>\
                        </tr>'
                                );
                            });
                            $('#reference').append('<tr>\
                        <form>\
                            <td class="py-4 px-6"><input type="text" id="entered_reference_name" class="block p-2 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Institute" required></td>\
                            <td class="py-4 px-6"><input type="text" id="entered_reference_designation" class="block p-2 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Institute" required></td>\
                            <td class="py-4 px-6"><input type="text" id="entered_reference_address" class="block p-2 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Year" required></td>\
                            <td class="py-4 px-6"><input type="text" id="entered_reference_telephone" class="block p-2 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Class" required></td>\
                            <td class="py-4 px-6">\
                                <button type="button" id="submit_reference" class="py-2 px-3 text-xs font-medium text-center text-white bg-green-700 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">+ Add New</button>\
                            </td>\
                        </form>\
                    </tr>'
                            );
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
                        'to' : $('#entered_school_to').val()
                    }
                    console.log(data);

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        method: "POST",
                        url: "add-school-add",
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
                        'index' : $('#entered_ol1_index').val()
                    }
                    console.log(data);

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        method: "POST",
                        url: "add-ol-add/"+shy,
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
                        'index' : $('#entered_ol2_index').val()
                    }
                    console.log(data);

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        method: "POST",
                        url: "add-ol-add/"+shy,
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
                        'index' : $('#entered_al_index').val()
                    }
                    console.log(data);

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        method: "POST",
                        url: "add-al-add",
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
                    }
                    console.log(data);

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        method: "POST",
                        url: "add-university-add",
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
                    }
                    console.log(data);

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        method: "POST",
                        url: "add-other-add",
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
                    }
                    console.log(data);

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        method: "POST",
                        url: "add-professional-add",
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
                    }
                    console.log(data);

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        method: "POST",
                        url: "add-employment-add",
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
                    }
                    console.log(data);

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        method: "POST",
                        url: "add-occupation-add",
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
                    }
                    console.log(data);

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        method: "POST",
                        url: "add-reference-add",
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

                                $('#alert-success_message').text(response.message);
                                $('#alert-success').removeClass('hidden');
                                $('.next').removeAttr("disabled");
                                $('.next').removeClass('get_occupation_view');
                                $('.next').removeClass('get_reference_view');
                                $('.next').addClass('hidden');
                                $('#submit_all').removeClass('hidden');
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

                //Start submit all---------------------------------------------------------------------------------------------------------------------------
                //submit all
                $(document).on('click', '#submit_all', function(e){
                    e.preventDefault();

                    $('#popup-modal').removeClass('hidden');


                });
                //End get view


                //End Submit all-------------------------------------------------------------------------------------------------------------------





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
                    $('#alert-success').addClass('hidden');
                    $('#alert-danger').addClass('hidden');
                    $('#alert-success_message').html("");
                    $('#alert-danger_message').html("");
                    $('#available_test_delete-modal').addClass('hidden');
                    $('#bg_bluer1,#bg_bluer2').remove();
                });


            });
        </script>
@endsection
