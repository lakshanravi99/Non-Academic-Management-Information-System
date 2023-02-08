@extends('admin.admin_master_custom')
@section('admin')



<div class="content">

<!-- More Model -->
<div id="view-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">
    <div class="relative p-4 w-full max-w-4xl h-full md:h-auto">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex justify-between items-center p-5 rounded-t border-b dark:border-gray-600">
                <h3 class="text-xl font-medium text-gray-900 dark:text-white">
                    Large modal
                </h3>
                <button type="button" class="decline text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="view-modal">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-6 space-y-6">
                
            </div>
            <!-- Modal footer -->
            <div class="flex items-center p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
            </div>
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
                            <div class="col-span-12 mt-8">
                                <div class="intro-y flex items-center h-10">
                                    <h2 class="text-lg font-medium truncate mr-5">
                                        General Report
                                    </h2>
                                    <a href="" class="ml-auto flex items-center text-primary"> <i data-lucide="refresh-ccw" class="w-4 h-4 mr-3"></i> Reload Data </a>
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
                                                <div class="text-3xl font-medium leading-8 mt-6">4.710</div>
                                                <div class="text-base text-slate-500 mt-1">Appliciants</div>
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
                                                <div class="text-3xl font-medium leading-8 mt-6"></div>
                                                <div class="text-base text-slate-500 mt-1">Exams</div>
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
                                                <div class="text-3xl font-medium leading-8 mt-6" id="all_appliciant_box"></div>
                                                <div class="text-base text-slate-500 mt-1">All Applications</div>
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
                                </div>
                            </div>

                            
                            <!-- END: General Report -->
                            <!-- BEGIN: Sales Report -->
                            <div class="col-span-12 lg:col-span-6 mt-8">
                                <div class="intro-y block sm:flex items-center h-10">
                                    <h2 class="text-lg font-medium truncate mr-5">
                                        Sales Report
                                    </h2>
                                    <div class="sm:ml-auto mt-3 sm:mt-0 relative text-slate-500">
                                        <i data-lucide="calendar" class="w-4 h-4 z-10 absolute my-auto inset-y-0 ml-3 left-0"></i> 
                                        <input type="text" class="datepicker form-control sm:w-56 box pl-10">
                                    </div>
                                </div>
                                <div class="intro-y box p-5 mt-12 sm:mt-5">
                                    <div class="flex flex-col md:flex-row md:items-center">
                                        <div class="flex">
                                            <div>
                                                <div class="text-primary dark:text-slate-300 text-lg xl:text-xl font-medium">$15,000</div>
                                                <div class="mt-0.5 text-slate-500">This Month</div>
                                            </div>
                                            <div class="w-px h-12 border border-r border-dashed border-slate-200 dark:border-darkmode-300 mx-4 xl:mx-5"></div>
                                            <div>
                                                <div class="text-slate-500 text-lg xl:text-xl font-medium">$10,000</div>
                                                <div class="mt-0.5 text-slate-500">Last Month</div>
                                            </div>
                                        </div>
                                        <div class="dropdown md:ml-auto mt-5 md:mt-0">
                                            
                                            <div class="dropdown-menu w-40">
                                                <ul class="dropdown-content overflow-y-auto h-32">
                                                    <li><a href="" class="dropdown-item">PC & Laptop</a></li>
                                                    <li><a href="" class="dropdown-item">Smartphone</a></li>
                                                    <li><a href="" class="dropdown-item">Electronic</a></li>
                                                    <li><a href="" class="dropdown-item">Photography</a></li>
                                                    <li><a href="" class="dropdown-item">Sport</a></li>
                                                </ul>
                                            </div>
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
                                            <canvas id="report-pie-chart1"></canvas>
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
                                        Appliciants Presentage
                                    </h2>
                                    <a href="" class="ml-auto text-primary truncate">Show More</a> 
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


                            <div class="col-span-12 lg:col-span-6 mt-8">
                                <div class="intro-y block sm:flex items-center h-10">
                                    <h2 class="text-lg font-medium truncate mr-5">
                                        Select list of Appliciants with High Marks
                                    </h2>
                                </div>
                                <div class="intro-y p-5 mt-12 sm:mt-5">
                                    <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
                                        <div class="flex justify-between items-center pb-4">
                                            <div>
                                                <button id="select_exam" data-dropdown-toggle="dropdown_exam" class="inline-flex items-center text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-3 py-1.5 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700" type="button">
                                                    <svg class="mr-2 w-4 h-4 text-gray-400" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"></path></svg>
                                                    Select the Exam
                                                    <svg class="ml-2 w-3 h-3" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                                                </button>
                                                <!-- Dropdown menu -->
                                                <div id="dropdown_exam" class="hidden z-10 w-48 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600" data-popper-reference-hidden="" data-popper-escaped="" data-popper-placement="top" style="position: absolute; inset: auto auto 0px 0px; margin: 0px; transform: translate3d(522.5px, 3847.5px, 0px);">
                                                    <ul id="select_list" class="select_list p-3 space-y-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="select_exam">
                                                        
                                                    </ul>
                                                </div>
                                            </div>
                                            <label for="table-search" class="sr-only">Enter the required count</label>
                                            <div class="relative">
                                                <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                                    <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
                                                </div>
                                                <input type="text" id="appliciant_count" class="block p-2 pl-10 w-80 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter required count of Appliciants">
                                                <button type="submit" id="appliciant_count_submit" class="py-2 px-3 text-xs font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                                            </div>
                                        </div>
                                        <div class="scrollable" style="height: 350px; overflow: scroll;">
                                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400" id="select_table">
                                                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                                    <tr>
                                                        <th scope="col" class="py-3 px-6">
                                                            Count
                                                        </th>
                                                        <th scope="col" class="py-3 px-6">
                                                            Appliciant ID
                                                        </th>
                                                        <th scope="col" class="py-3 px-6">
                                                            Marks
                                                        </th>
                                                        <th scope="col" class="py-3 px-6">
                                                            Status
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody id="tbody">
                                                
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            <!-- END: Sales Report -->
                            <!-- BEGIN: Weekly Top Seller -->
                            <div class="col-span-12 sm:col-span-6 lg:col-span-3 mt-8">
                                <div class="intro-y flex items-center h-10">
                                    <h2 class="text-lg font-medium truncate">
                                        Define cutoff Marks
                                    </h2>
                                </div>
                                <div class="intro-y box p-5 mt-5">
                                    <div class="mt-3">
                                        <div class="mb-6">
                                        <label for="small" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Select the Exam</label>
                                            <select id="cutoff_exam_list" class="cutoff_exam_list block p-2 mb-6 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                
                                            </select>
                                        </div>
                                        <div class="mb-6">
                                            <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Count of Required Appliciants</label>
                                                <div class="flex">
                                                    <input type="text" id="cutoff_appliciant_count" class="block p-2 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            
                                                    <button type="submit" id="cutoff_appliciant_count_submit" class="p-2.5 ml-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                                                        <span class="sr-only">Search</span>
                                                    </button>
                                                </div>
                                        </div>

                                        <div class="mb-6">
                                            <div id="define_cutoff" class="bg-blue-600 h-1.5 rounded-full dark:bg-blue-500" style="width: 0%"></div>
                                        </div>
                                        <div class="bg-blue-100 text-blue-800 text-lg font-semibold inline-flex items-center p-1.5 rounded-full dark:bg-blue-200 dark:text-blue-800" style="height:200px; width: 200px;">
                                            <p id="cutoff_result" style="font-size:5vw;"></p>
                                        </div>
                                        
                                    </div>
                                    
                                </div>
                            </div>
                            <!-- END: Weekly Top Seller -->
                            <!-- BEGIN: Sales Report -->
                            <div class="col-span-12 sm:col-span-6 lg:col-span-3 mt-8">
                                <div class="intro-y flex items-center h-10">
                                    <h2 class="text-lg font-medium truncate mr-5">
                                        Define Appliciants Count
                                    </h2>
                                </div>
                                <div class="intro-y box p-5 mt-5">
                                    <div class="mt-3">
                                        <div class="mb-6">
                                        <label for="small" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Select the Exam</label>
                                            <select id="cutoff_exam_list2" class="cutoff_exam_list block p-2 mb-6 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                
                                            </select>
                                        </div>
                                        <div class="mb-6">
                                            <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Cutoff Mark</label>
                                                <div class="flex">
                                                    <input type="number" id="cutoff_mark" class="block p-2 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            
                                                    <button type="submit" id="cutoff_appliciant_cutoff_submit" class="p-2.5 ml-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                                                        <span class="sr-only">Search</span>
                                                    </button>
                                                </div>
                                        </div>

                                        <div class="mb-6">
                                            <div id="define_cutoff" class="bg-blue-600 h-1.5 rounded-full dark:bg-blue-500" style="width: 0%"></div>
                                        </div>
                                        <div class="bg-blue-100 text-blue-800 text-lg font-semibold inline-flex items-center p-1.5 rounded-full dark:bg-blue-200 dark:text-blue-800" style="height:200px; width: 200px;">
                                            <p id="selected_count" style="font-size:5vw;"></p>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            <!-- END: Sales Report -->
                            
                            <div class="col-span-12 mt-8">
                            <!-- BEGIN: Weekly Top Products -->
                            
                            <!-- END: Weekly Top Products -->
                            </div>
                            <!-- BEGIN: Official Store -->
                            
                            <!-- END: Official Store -->
                            <!-- BEGIN: Weekly Best Sellers -->
                            
                            <!-- END: Weekly Best Sellers -->
                            <!-- BEGIN: General Report -->
                            <div class="col-span-12 grid grid-cols-12 gap-6 mt-8">
                                <div class="col-span-12 sm:col-span-6 2xl:col-span-3 intro-y">
                                    <div class="box p-5 zoom-in">
                                        <div class="flex items-center">
                                            <div class="w-2/4 flex-none">
                                                <div class="text-lg font-medium truncate">Target Sales</div>
                                                <div class="text-slate-500 mt-1">300 Sales</div>
                                            </div>
                                            <div class="flex-none ml-auto relative">
                                                <div class="w-[90px] h-[90px]">
                                                    <canvas id="report-donut-chart-1"></canvas>
                                                </div>
                                                <div class="font-medium absolute w-full h-full flex items-center justify-center top-0 left-0">20%</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-span-12 sm:col-span-6 2xl:col-span-3 intro-y">
                                    <div class="box p-5 zoom-in">
                                        <div class="flex">
                                            <div class="text-lg font-medium truncate mr-3">Social Media</div>
                                            <div class="py-1 px-2 flex items-center rounded-full text-xs bg-slate-100 dark:bg-darkmode-400 text-slate-500 cursor-pointer ml-auto truncate">320 Followers</div>
                                        </div>
                                        <div class="mt-1">
                                            <div class="h-[58px]">
                                                <canvas class="simple-line-chart-1 -ml-1"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-span-12 sm:col-span-6 2xl:col-span-3 intro-y">
                                    <div class="box p-5 zoom-in">
                                        <div class="flex items-center">
                                            <div class="w-2/4 flex-none">
                                                <div class="text-lg font-medium truncate">New Products</div>
                                                <div class="text-slate-500 mt-1">1450 Products</div>
                                            </div>
                                            <div class="flex-none ml-auto relative">
                                                <div class="w-[90px] h-[90px]">
                                                    <canvas id="report-donut-chart-2"></canvas>
                                                </div>
                                                <div class="font-medium absolute w-full h-full flex items-center justify-center top-0 left-0">45%</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-span-12 sm:col-span-6 2xl:col-span-3 intro-y">
                                    <div class="box p-5 zoom-in">
                                        <div class="flex">
                                            <div class="text-lg font-medium truncate mr-3">Posted Ads</div>
                                            <div class="py-1 px-2 flex items-center rounded-full text-xs bg-slate-100 dark:bg-darkmode-400 text-slate-500 cursor-pointer ml-auto truncate">180 Campaign</div>
                                        </div>
                                        <div class="mt-1">
                                            <div class="h-[58px]">
                                                <canvas class="simple-line-chart-1 -ml-1"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END: General Report -->
                            <!-- BEGIN: Weekly Top Products -->
                            <div class="col-span-12 mt-6">
                                
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
                url: "fetch-exam-mark-filter",
                datatype: "json",
                success: function(response){
                    console.log(response);

                    $('#select_list').html("");
                    $('.cutoff_exam_list').html("");
                    $('.cutoff_exam_list').append('<option selected disabled hidden>Choose from Here</option>');
                    $.each(response.exams, function (ket, item) { 
                        $('#select_list').append('<li>\
                            <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">\
                                <input id="'+item.exam_id+'" type="radio" value="'+item.exam_id+'" name="entered_exam" class="entered_exam w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">\
                                <label for="" class="ml-2 w-full text-sm font-medium text-gray-900 rounded dark:text-gray-300">'+item.exam_id+' - '+item.test_name+' (part '+item.test_part+')</label>\
                            </div>\
                        </li>'
                        );
                        
                        $('.cutoff_exam_list').append('<option value="'+item.exam_id+'">'+item.exam_id+' - '+item.test_name+' (part '+item.test_part+')</option>');                             
                    });
                    
                    // $('#all_appliciant_box').html("");
                    // $('#rejected_appliciant_box').html("");
                    // $('#all_appliciant_box').append(response.count_all);
                    // $('#rejected_appliciant_box').append(response.rejected_all);
                    //response.dc_array.rejected_application
                    $('#tbody').html("");
                    var count=1;
                    $.each(response.data, function (ket, item) { 
                        $('#tbody').append('<tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">\
                            <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">'+count+'</th>\
                            <td class="py-4 px-6">'+item.appliciant_id+'</td>\
                            <td class="py-4 px-6">'+item.marks+'</td>\
                            <td class="py-4 px-6">ND</td>\
                            </tr>'
                        );
                        count++;                             
                    });

                    

                    $('#count_box').html("");
                    $('#presentage_box').html("");
                    $.each(response.dc_array, function (ket, item) { 
                        $('#count_box').append('<div class="flex items-center">\
                            <div class="w-2 h-2 bg-primary rounded-full mr-3"></div>\
                                <span class="truncate">'+item.designation_name+' - </span> <span class="font-medium ml-auto">'+item.designation_count+'</span>\
                            </div>'
                        );
                        
                        $all = response.count_all;
                        $presentage = ((item.designation_count/$all)*100).toFixed(2);
                        $('#presentage_box').append('<div class="flex items-center">\
                            <div class="w-2 h-2 bg-primary rounded-full mr-3"></div>\
                                <span class="truncate">'+item.designation_name+' - </span> <span class="font-medium ml-auto">'+$presentage+'%</span>\
                            </div>'
                        );
                    });
                }
            });
 
        }


        //Start Submit High mark
        $(document).on('click','#appliciant_count_submit', function (e) {
            e.preventDefault();

            //Get inpu field values
            var radio_value = $("input[name='entered_exam']:checked").val();
            var required_count = $('#appliciant_count').val();
            //console.log("count is - " + required_count);

            if(typeof(radio_value) == "undefined"){
                var radio=0;
            }
            if(typeof(required_count) == "undefined" || required_count == null){
                var count = 0;    
            }
            if(count==0 && radio==0){
                alert("Please select a Exam & enter required count of Appliciants");
                return false;
            }
            if(count==0){
                alert("Please enter required count of Appliciants");
                return false;
            }
            if(radio==0){
                alert("Please select a Exam");
                return false;
            }
            console.log("Your are a - " + radio_value);
            console.log("count is - " + required_count);

            var data = {
                'exam_id' : radio_value,
                'required_count' : required_count
            }
             console.log(data);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "GET",
                url: "fetch-exam-mark-filter",
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
                        // $('#updateform_errList').html("");
                        // $('#updateform_errList').html("");
                        // $('#success_message').addClass('alert alert-success')
                        // $('#success_message').text(response.message)
                        //fetchdata();
                        $('#tbody').html("");
                        var count=1;
                        $.each(response.data, function (ket, item) { 
                        $('#tbody').append('<tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">\
                            <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">'+count+'</th>\
                            <td class="py-4 px-6">'+item.appliciant_id+'</td>\
                            <td class="py-4 px-6">'+item.marks+'</td>\
                            <td class="py-4 px-6">PASS</td>\
                            </tr>'
                        );
                        count++;                              
                    }); 
                    }
                }
            });
        });
        
        //End Submit hign mark


        //Start find cutoff
        $(document).on('click','#cutoff_appliciant_count_submit', function (e) {
            e.preventDefault();

            //Get inpu field values
            var select_value = $("#cutoff_exam_list").val();
            var required_count = $('#cutoff_appliciant_count').val();
            //console.log("count is - " + required_count);

            if(typeof(select_value) == "undefined" || select_value == null ){
                var select=0;
            }
            if($('#cutoff_appliciant_count').val() == "undefined" || $('#cutoff_appliciant_count').val() == null){
                var count = 0;    
            }
            if(count==0 && select==0){
                alert("Please select a Exam & enter required count of Appliciants");
                return false;
            }
            if(count==0){
                alert("Please enter required count of Appliciants");
                return false;
            }
            if(select==0){
                alert("Please select a Exam");
                return false;
            }

            var data = {
                'exam_id' : select_value,
                'required_count' : required_count
            }
             console.log(data);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "POST",
                url: "define-cutoff",
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
                        // $('#updateform_errList').html("");
                        // $('#updateform_errList').html("");
                        // $('#success_message').addClass('alert alert-success')
                        // $('#success_message').text(response.message)
                        //fetchdata();
                        $('#cutoff_result').html("");
                        $('#cutoff_result').append(response.result);
                                                     
                    
                    }
                }
            });
        });
        
        //End find cutoff


        //Start find count
        $(document).on('click','#cutoff_appliciant_cutoff_submit', function (e) {
            e.preventDefault();

            //Get inpu field values
            var select_value = $("#cutoff_exam_list2").val();
            var cutoff = $('#cutoff_mark').val();
            //console.log("count is - " + required_count);

            if(typeof(select_value) == "undefined" || select_value == null ){
                var select=0;
            }
            if($('#cutoff_mark').val() == "undefined" || $('#cutoff_mark').val() == null){
                var mark = 0;    
            }
            if(mark==0 && select==0){
                alert("Please select a Exam & enter required count of Appliciants");
                return false;
            }
            if(mark==0){
                alert("Please enter required count of Appliciants");
                return false;
            }
            if(select==0){
                alert("Please select a Exam");
                return false;
            }

            var data = {
                'exam_id' : select_value,
                'cutoff' : cutoff
            }
             console.log(data);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "POST",
                url: "define-count",
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
                        // $('#updateform_errList').html("");
                        // $('#updateform_errList').html("");
                        // $('#success_message').addClass('alert alert-success')
                        // $('#success_message').text(response.message)
                        //fetchdata();
                        $('#selected_count').html("");
                        $('#selected_count').append(response.count);
                                                     
                    
                    }
                }
            });
        });
        
        //End find count

        

        //view details
        $(document).on('click', '.view_details', function (e) {
            e.preventDefault();
            
            var id = this.getAttribute('value');
            console.log(id);
            

            //call form modal
            $('#view-modal').removeClass('hidden');
            $('#view-modal').addClass('flex');

            $('#view-modal').attr('role','dialog');
            $('#view-modal').attr('aria-modal','true');
            $('#view-modal').removeAttr('aredit-modal');
            //$('body').append('<div modal-backdrop="" class="bg-gray-900 bg-opacity-50 dark:bg-opacity-80 fixed inset-0 z-40"></div><div modal-backdrop="" class="bg-gray-900 bg-opacity-50 dark:bg-opacity-80 fixed inset-0 z-40"></div>');

            
            $.ajax({
                method: "GET",
                url: "view-appliciant/"+id,
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
                        
                        
                    }
                }
            });
        });
        //End view details
        //clear fields if press cancel button
        $(document).on('click', '.decline', function (e) {
            //$('#edit_form')[0].reset();
            $('#ptex').html("");
            fetchdata();
        });

        // $(document).on('click', '#but', function (e) {
        //     console.log("frogress");
        //     var i = 0;
        //         function move() {
        //         if (i == 0) {
        //             i = 1;
        //             var elem = document.getElementById("define_cutoff");
        //             var width = 1;
        //             var id = setInterval(frame, 10);
        //             function frame() {
        //             if (width >= 100) {
        //                 clearInterval(id);
        //                 i = 0;
        //             } else {
        //                 width++;
        //                 elem.style.width = width + "%";
        //             }
        //             }
        //         }
        //         }
        // });


  });

  
  var i = 0;
function move() {
  if (i == 0) {
    i = 1;
    var elem = document.getElementById("define_cutoff");
    var width = 1;
    var id = setInterval(frame, 10);
    function frame() {
      if (width >= 100) {
        clearInterval(id);
        i = 0;
      } else {
        width++;
        elem.style.width = width + "%";
      }
    }
  }
}
</script>
</script>

            @endsection