
@extends('appliciant.appliciant_master_custom')
@section('admin')

    <style>
        .scrollable{
            height: 450px;
            overflow: scroll;
        }
    </style>

    <div class="content">
        @include('appliciant.body.topbar')

        <!-- Main modal -->
        @foreach($designations as $designation)
            <div id="defaultModal" tabindex="-1" class="main-modal-{{$designation->designation_id}} overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full justify-center items-center hidden" aria-modal="true" role="dialog">
                <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <!-- Modal header -->
                        <div class="flex justify-between items-start p-4 rounded-t border-b dark:border-gray-600">
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                Job Details
                            </h3>
                            <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="defaultModal">
                                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <div class="p-6 space-y-6">
                            <h2>Basic Details</h2>
                            {{$designation->details}}
                            <h2>Age</h2>
                            {{$designation->age}}
                            <h2>Salary Details</h2>
                            {{$designation->salary}}
                        </div>
                        <!-- Modal footer -->
                        <div class="flex items-center p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
                            <button data-modal-toggle="defaultModal" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">I accept</button>
                            <button data-modal-toggle="defaultModal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Decline</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main modal -->
            <div id="defaultModal" tabindex="-1" class="{{$designation->designation_id}} overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full justify-center items-center hidden" aria-modal="true" role="dialog">
                <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <!-- Modal header -->
                        <div class="flex justify-between items-start p-4 rounded-t border-b dark:border-gray-600">
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                Terms of Service
                            </h3>
                            <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="defaultModal">
                                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <div class="p-6 space-y-6">
                            <h1>Qualifications</h1>
                            {{$designation->qualification}}
                        </div>
                        <!-- Modal footer -->
                        <div class="flex items-center p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
                            <button data-modal-toggle="defaultModal" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">I accept</button>
                            <button data-modal-toggle="defaultModal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Decline</button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

        <!-- show applied modal -->
        <div id="show_applied-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">
            <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex justify-between items-start p-4 rounded-t border-b dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                            Directed applications
                        </h3>
                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="show_applied-modal">
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="p-6 space-y-6">
                        <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="py-3 px-6">
                                        Designation
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        Date
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        Action
                                    </th>
                                </tr>
                                </thead>
                                <tbody id="applied_application">
                                @foreach($applied_designations as $ad)
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                        <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{$ad->designation_name}}
                                        </th>
                                        <td class="py-4 px-6">
                                            Sliver
                                        </td>
                                        <form style="display: none" action="appliciant/load-view-own" method="POST">
                                            @csrf
                                            <td class="py-4 px-6">
                                                <input type="hidden" name="appliciant_id" value="{{$ad->appliciant_id}}">
                                                <button type="submit" id="{{$ad->appliciant_id}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</button>
                                                <!-- <label for="{{$ad->appliciant_id}}"><a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline" value="{{$ad->appliciant_id}}">Edit</a></label> -->
                                            </td>
                                        </form>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- Modal footer -->
                    <!-- <div class="flex items-center p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
                        <button data-modal-toggle="show_applied-modal" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">I accept</button>
                        <button data-modal-toggle="show_applied-modal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Decline</button>
                    </div> -->
                </div>
            </div>
        </div>

        <!-- BEGIN: Top Bar -->

        <!-- END: Top Bar -->
        <div class="grid grid-cols-12 gap-6">
            <div class="col-span-12 2xl:col-span-6">
                <div class="grid grid-cols-12 gap-6">
                    <!-- BEGIN: General Report -->
                    <div class="col-span-12 mt-8">
                        <div class="intro-y flex items-center h-10">
                            <h2 class="text-lg font-medium truncate mr-5">
                                Components
                            </h2>
                        </div>
                        <div class="grid grid-cols-12 gap-6 mt-5">

                            <div class="col-span-24 sm:col-span-6 xl:col-span-6 intro-y">
                                <div class="report-box zoom-in">
                                    <div class="box p-5">
                                        <div class="flex">
                                            <i data-lucide="credit-card" class="report-box__icon text-pending"></i>
                                            <div class="ml-auto">
                                                <div class="report-box__indicator bg-danger tooltip cursor-pointer" title="2% Lower than last month"> 2% <i data-lucide="chevron-down" class="w-4 h-4 ml-0.5"></i> </div>
                                            </div>
                                        </div>
                                        <div class="text-3xl font-medium leading-8 mt-6"></div>
                                        <div class="text-base text-slate-500 mt-1">Submit Id Documents</div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-span-12 sm:col-span-6 xl:col-span-6 intro-y" data-modal-toggle="show_applied-modal">
                                <!-- <a href="{{url('appliciant/load-view-own')}}"> -->
                                <div class="report-box zoom-in">
                                    <div class="box p-5">
                                        <div class="flex">
                                            <i data-lucide="credit-card" class="report-box__icon text-pending"></i>
                                            <div class="ml-auto">
                                                <div class="report-box__indicator bg-danger tooltip cursor-pointer" title="2% Lower than last month"> 2% <i data-lucide="chevron-down" class="w-4 h-4 ml-0.5"></i> </div>
                                            </div>
                                        </div>
                                        <div class="text-3xl font-medium leading-8 mt-6"></div>
                                        <div class="text-base text-slate-500 mt-1">View/Edit Your Application</div>
                                    </div>
                                </div>
                                </a>
                            </div>

                        </div>
                    </div>
                    <!-- END: General Report -->
                    <!-- BEGIN: Sales Report -->

                    <!-- END: Sales Report -->
                    <!-- BEGIN: Weekly Top Seller -->

                    <!-- END: Weekly Top Seller -->
                    <!-- BEGIN: Sales Report -->

                    <!-- END: Sales Report -->
                    <!-- BEGIN: Official Store -->

                    <!-- END: Official Store -->
                    <!-- BEGIN: Weekly Best Sellers -->

                    <!-- END: Weekly Best Sellers -->
                    <!-- BEGIN: General Report -->

                    <!-- END: General Report -->
                    <!-- BEGIN: Weekly Top Products -->
                    <div class="col-span-12 mt-6">
                        <div class="intro-y block sm:flex items-center h-10">
                            <h2 class="text-lg font-medium truncate mr-5">
                                Job Vacancis
                            </h2>
                        </div>
                        <p>අයදුම්පත් භාරගැනීම {{session('current_intake_end_date')}} දිනෙන් අවසන් වේ.</p>
                        <div class="intro-y overflow-auto lg:overflow-visible mt-8 sm:mt-0">
                            <div class="scrollable">
                                <table class="table table-report sm:mt-2">
                                    <thead>
                                    <tr>
                                        <th class="text-center whitespace-nowrap">Designation</th>
                                        <th class="text-center whitespace-nowrap">Vacancies</th>
                                        <th class="text-center whitespace-nowrap">Details</th>
                                        <th class="text-center whitespace-nowrap">Qualifications</th>
                                        <th class="text-center whitespace-nowrap">Application</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $index=0?>
                                    @foreach($designations as $designation)
                                        <tr class="intro-x">

                                            <td class="text-center">{{$designation->designation_name}}</td>


                                            <td class="text-center">{{$designation->cadre - $designation->current_count}}</td>

                                            <td class="table-report__action w-56">
                                                <div class="flex justify-center items-center">
                                                    <!-- <a class="flex items-center mr-3 text-primary" id="{{$designation->designation_id}}"> <i data-lucide="check-square" class="w-4 h-4 mr-1"></i> View </a> -->
                                                    <button onclick="openModal('main-modal-{{$designation->designation_id}}')" id="{{$designation->designation_id}}" class="flex items-center mr-3 text-primary" type="button" data-modal-toggle="defaultModal" style="float: right;"><i data-lucide="check-square" class="w-4 h-4 mr-1"></i>View</button>
                                                </div>
                                            </td>

                                            <td class="table-report__action w-56">
                                                <div class="flex justify-center items-center">
                                                    <!-- <a class="flex items-center mr-3 text-primary" id="{{$designation->designation_id}}" href=""> <i data-lucide="check-square" class="w-4 h-4 mr-1"></i> View </a> -->
                                                    <button onclick="openModal('main-modal-{{$designation->designation_id}}')" id="{{$designation->designation_id}}" class="flex items-center mr-3 text-primary" type="button" data-modal-toggle="defaultModal" style="float: right;"><i data-lucide="check-square" class="w-4 h-4 mr-1"></i>View</button>
                                                </div>
                                            </td>
                                            <form style="display: none" action="appliciant/application" method="POST">
                                                @csrf
                                                <input type="hidden" name="desig_id" value="{{$designation->designation_id}}">
                                                <input type="hidden" name="desig_name" value="{{$designation->designation_name}}">
                                                <button type="submit" id="{{$designation->designation_id}}"> </button>
                                            </form>

                                            <td class="table-report__action w-56">
                                                <div class="flex justify-center items-center">



                                                    @empty($applied_designations)
                                                        <label class="flex items-center mr-3 text-warning" for="{{$designation->designation_id}}"> <i data-lucide="check-square" class="w-4 h-4 mr-1"></i> Apply </label>
                                                    @else
                                                        @if($designation->designation_name == $applied_designations[$index]->designation_name)
                                                            <label class="flex items-center mr-3 text-danger"> <i data-lucide="check-square" class="w-4 h-4 mr-1"></i> Applied</label>
                                                        @else
                                                            <label class="flex items-center mr-3 text-warning" for="{{$designation->designation_id}}"> <i data-lucide="check-square" class="w-4 h-4 mr-1"></i> Apply </label>
                                                        @endif
                                                    @endempty

                                                    <?php
                                                    if((sizeof($applied_designations)-1)>$index){
                                                        $index++;
                                                    }
                                                    ?>


                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>


                    </div>
                    <!-- END: Weekly Top Products -->
                </div>
            </div>







            <div class="col-span-12 2xl:col-span-3">
                <div class="2xl:border-l -mb-10 pb-10">
                    <div class="2xl:pl-6 grid grid-cols-12 gap-x-6 2xl:gap-x-0 gap-y-6" style="width: 570px;">
                        <!-- BEGIN: Transactions -->

                        <!-- END: Transactions -->
                        <!-- BEGIN: Recent Activities -->

                        <!-- END: Recent Activities -->
                        <!-- BEGIN: Important Notes -->
                        <div class="col-span-12 md:col-span-6 xl:col-span-12 xl:col-start-1 xl:row-start-1 2xl:col-start-auto 2xl:row-start-auto mt-3">
                            <div class="intro-x flex items-center h-10">
                                <h2 class="text-lg font-medium truncate mr-auto">
                                    Important Note
                                </h2>

                                <!-- <button data-carousel="important-notes" data-target="prev" class="tiny-slider-navigator btn px-2 border-slate-300 text-slate-600 dark:text-slate-300 mr-2"> <i data-lucide="chevron-left" class="w-4 h-4"></i> </button>
                                <button data-carousel="important-notes" data-target="next" class="tiny-slider-navigator btn px-2 border-slate-300 text-slate-600 dark:text-slate-300 mr-2"> <i data-lucide="chevron-right" class="w-4 h-4"></i> </button> -->
                            </div>
                            <iframe src="{{ asset('docs/notice.pdf') }}" width="100%" height="600">
                                This browser does not support PDFs. Please download the PDF to view it: <a href="{{ asset('folder/file_name.pdf') }}">Download PDF</a>
                            </iframe>
                            <!-- <div class="mt-5 intro-x">
                                <div class="box zoom-in">
                                    <div class="tiny-slider" id="important-notes">
                                        <div class="p-5">
                                            <div class="text-base font-medium truncate">Lorem Ipsum is simply dummy text</div>
                                            <div class="text-slate-400 mt-1">20 Hours ago</div>
                                            <div class="text-slate-500 text-justify mt-1">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</div>
                                            <div class="font-medium flex mt-5">
                                                <button type="button" class="btn btn-secondary py-1 px-2">View Notes</button>
                                                <button type="button" class="btn btn-outline-secondary py-1 px-2 ml-auto ml-auto">Dismiss</button>
                                            </div>
                                        </div>
                                        <div class="p-5">
                                            <div class="text-base font-medium truncate">Lorem Ipsum is simply dummy text</div>
                                            <div class="text-slate-400 mt-1">20 Hours ago</div>
                                            <div class="text-slate-500 text-justify mt-1">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</div>
                                            <div class="font-medium flex mt-5">
                                                <button type="button" class="btn btn-secondary py-1 px-2">View Notes</button>
                                                <button type="button" class="btn btn-outline-secondary py-1 px-2 ml-auto ml-auto">Dismiss</button>
                                            </div>
                                        </div>
                                        <div class="p-5">
                                            <div class="text-base font-medium truncate">Lorem Ipsum is simply dummy text</div>
                                            <div class="text-slate-400 mt-1">20 Hours ago</div>
                                            <div class="text-slate-500 text-justify mt-1">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</div>
                                            <div class="font-medium flex mt-5">
                                                <button type="button" class="btn btn-secondary py-1 px-2">View Notes</button>
                                                <button type="button" class="btn btn-outline-secondary py-1 px-2 ml-auto ml-auto">Dismiss</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                        <!-- END: Important Notes -->
                        <!-- BEGIN: Schedules -->
                        <!-- <div class="col-span-12 md:col-span-6 xl:col-span-4 2xl:col-span-12 xl:col-start-1 xl:row-start-2 2xl:col-start-auto 2xl:row-start-auto mt-3">
                            <div class="intro-x flex items-center h-10">
                                <h2 class="text-lg font-medium truncate mr-5">
                                    Schedules
                                </h2>
                                <a href="" class="ml-auto text-primary truncate flex items-center"> <i data-lucide="plus" class="w-4 h-4 mr-1"></i> Add New Schedules </a>
                            </div>
                            <div class="mt-5">
                                <div class="intro-x box">
                                    <div class="p-5">
                                        <div class="flex">
                                            <i data-lucide="chevron-left" class="w-5 h-5 text-slate-500"></i>
                                            <div class="font-medium text-base mx-auto">April</div>
                                            <i data-lucide="chevron-right" class="w-5 h-5 text-slate-500"></i>
                                        </div>
                                        <div class="grid grid-cols-7 gap-4 mt-5 text-center">
                                            <div class="font-medium">Su</div>
                                            <div class="font-medium">Mo</div>
                                            <div class="font-medium">Tu</div>
                                            <div class="font-medium">We</div>
                                            <div class="font-medium">Th</div>
                                            <div class="font-medium">Fr</div>
                                            <div class="font-medium">Sa</div>
                                            <div class="py-0.5 rounded relative text-slate-500">29</div>
                                            <div class="py-0.5 rounded relative text-slate-500">30</div>
                                            <div class="py-0.5 rounded relative text-slate-500">31</div>
                                            <div class="py-0.5 rounded relative">1</div>
                                            <div class="py-0.5 rounded relative">2</div>
                                            <div class="py-0.5 rounded relative">3</div>
                                            <div class="py-0.5 rounded relative">4</div>
                                            <div class="py-0.5 rounded relative">5</div>
                                            <div class="py-0.5 bg-success/20 dark:bg-success/30 rounded relative">6</div>
                                            <div class="py-0.5 rounded relative">7</div>
                                            <div class="py-0.5 bg-primary text-white rounded relative">8</div>
                                            <div class="py-0.5 rounded relative">9</div>
                                            <div class="py-0.5 rounded relative">10</div>
                                            <div class="py-0.5 rounded relative">11</div>
                                            <div class="py-0.5 rounded relative">12</div>
                                            <div class="py-0.5 rounded relative">13</div>
                                            <div class="py-0.5 rounded relative">14</div>
                                            <div class="py-0.5 rounded relative">15</div>
                                            <div class="py-0.5 rounded relative">16</div>
                                            <div class="py-0.5 rounded relative">17</div>
                                            <div class="py-0.5 rounded relative">18</div>
                                            <div class="py-0.5 rounded relative">19</div>
                                            <div class="py-0.5 rounded relative">20</div>
                                            <div class="py-0.5 rounded relative">21</div>
                                            <div class="py-0.5 rounded relative">22</div>
                                            <div class="py-0.5 bg-pending/20 dark:bg-pending/30 rounded relative">23</div>
                                            <div class="py-0.5 rounded relative">24</div>
                                            <div class="py-0.5 rounded relative">25</div>
                                            <div class="py-0.5 rounded relative">26</div>
                                            <div class="py-0.5 bg-primary/10 dark:bg-primary/50 rounded relative">27</div>
                                            <div class="py-0.5 rounded relative">28</div>
                                            <div class="py-0.5 rounded relative">29</div>
                                            <div class="py-0.5 rounded relative">30</div>
                                            <div class="py-0.5 rounded relative text-slate-500">1</div>
                                            <div class="py-0.5 rounded relative text-slate-500">2</div>
                                            <div class="py-0.5 rounded relative text-slate-500">3</div>
                                            <div class="py-0.5 rounded relative text-slate-500">4</div>
                                            <div class="py-0.5 rounded relative text-slate-500">5</div>
                                            <div class="py-0.5 rounded relative text-slate-500">6</div>
                                            <div class="py-0.5 rounded relative text-slate-500">7</div>
                                            <div class="py-0.5 rounded relative text-slate-500">8</div>
                                            <div class="py-0.5 rounded relative text-slate-500">9</div>
                                        </div>
                                    </div>
                                    <div class="border-t border-slate-200/60 p-5">
                                        <div class="flex items-center">
                                            <div class="w-2 h-2 bg-pending rounded-full mr-3"></div>
                                            <span class="truncate">UI/UX Workshop</span> <span class="font-medium xl:ml-auto">23th</span>
                                        </div>
                                        <div class="flex items-center mt-4">
                                            <div class="w-2 h-2 bg-primary rounded-full mr-3"></div>
                                            <span class="truncate">VueJs Frontend Development</span> <span class="font-medium xl:ml-auto">10th</span>
                                        </div>
                                        <div class="flex items-center mt-4">
                                            <div class="w-2 h-2 bg-warning rounded-full mr-3"></div>
                                            <span class="truncate">Laravel Rest API</span> <span class="font-medium xl:ml-auto">31th</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
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

            // End Available Test
        });
    </script>


    <script>
        all_modals = ['main-modal-{{$designation->designation_id}}', 'another-modal']
        all_modals.forEach((modal)=>{
            const modalSelected = document.querySelector('.'+modal);
            modalSelected.classList.remove('fadeIn');
            modalSelected.classList.add('fadeOut');
            modalSelected.style.display = 'none';
        })
        const modalClose = (modal) => {
            const modalToClose = document.querySelector('.'+modal);
            modalToClose.classList.remove('fadeIn');
            modalToClose.classList.add('fadeOut');
            setTimeout(() => {
                modalToClose.style.display = 'none';
            }, 500);
        }

        const openModal = (modal) => {
            const modalToOpen = document.querySelector('.'+modal);
            modalToOpen.classList.remove('fadeOut');
            modalToOpen.classList.add('fadeIn');
            modalToOpen.style.display = 'flex';
        }

    </script>
@endsection
