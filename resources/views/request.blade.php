
@extends('admin.admin_master')
@section('admin')



<div class="content">


                <!-- BEGIN: Top Bar -->
                <div class="top-bar">
                    <!-- BEGIN: Breadcrumb -->
                    <nav aria-label="breadcrumb" class="-intro-x mr-auto hidden sm:flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('Requestmodule')}}">Request</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Transport</li>
                        </ol>
                    </nav>
                    <!-- END: Breadcrumb -->
                    <!-- BEGIN: Search -->
                    <!-- END: Search -->
                    <!-- BEGIN: Notifications -->
                    <div class="intro-x dropdown mr-auto sm:mr-6">
                        <div class="dropdown-toggle notification notification--bullet cursor-pointer" role="button" aria-expanded="false" data-tw-toggle="dropdown"> <i data-lucide="bell" class="notification__icon dark:text-slate-500"></i> </div>
                        <div class="notification-content pt-2 dropdown-menu">
                        </div>
                    </div>
                    <!-- END: Notifications -->
                    <!-- BEGIN: Account Menu -->
                    <div class="intro-x dropdown w-8 h-8">
                        <div class="dropdown-toggle w-8 h-8 rounded-full overflow-hidden shadow-lg image-fit zoom-in" role="button" aria-expanded="false" data-tw-toggle="dropdown">
                            <img alt="" src="{{session('propic')}} ">
                        </div>
                        <div class="dropdown-menu w-56">
                            <ul class="dropdown-content bg-primary text-white">
                                <li class="p-2">
                                    <div class="font-medium">{{session('emp_id')}}</div>
                                    <div class="text-xs text-white/70 mt-0.5 dark:text-slate-500">{{session('usertype')}}</div>
                                </li>
                                <li>
                                    <hr class="dropdown-divider border-white/[0.08]">
                                </li>
                                <li>
                                    <a href="{{route('systemprofile')}}" class="dropdown-item hover:bg-white/5"> <i data-lucide="user" class="w-4 h-4 mr-2"></i> Profile </a>
                                </li>

                                <li>
                                    <a href="" class="dropdown-item hover:bg-white/5"> <i data-lucide="help-circle" class="w-4 h-4 mr-2"></i> Help </a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider border-white/[0.08]">
                                </li>
                                <li>
                                    <a href="{{ route('admin.logout')}}" class="dropdown-item hover:bg-white/5"> <i data-lucide="toggle-right" class="w-4 h-4 mr-2"></i> Logout </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- END: Account Menu -->
                </div>
                <!-- END: Top Bar -->

                <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
                    <h2 class="text-lg font-medium mr-auto">
                        Transport Request List
                    </h2>
                    <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
                        <!-- <button class="btn btn-primary shadow-md mr-2">Add New User</button> -->
                    </div>
                </div>
                <!-- BEGIN: HTML Table Data -->

                      <div class="intro-y box p-5 mt-5">
                    <div class="flex flex-col sm:flex-row sm:items-end xl:items-start">
                        <form id="tabulator-html-filter-form" class="xl:flex sm:mr-auto">
                            <div class="sm:flex items-center sm:mr-4">
                                <label class="w-12 flex-none xl:w-auto xl:flex-initial mr-2">User Type</label>
                                <select id="tabulator-html-filter-field" class="form-select w-full sm:w-32 2xl:w-full mt-2 sm:mt-0 sm:w-auto">
                                    @foreach($usertypesfresh as $ut)
                                        <option value="{{$ut->usertype}}">{{$ut->usertype}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="sm:flex items-center sm:mr-4 mt-2 xl:mt-0">
                                <label class="w-12 flex-none xl:w-auto xl:flex-initial mr-2">Emp. ID/Name</label>
                                <input id="tabulator-html-filter-value" type="text" class="form-control sm:w-40 2xl:w-full mt-2 sm:mt-0" placeholder="Search...">
                            </div>
                            <div class="mt-2 xl:mt-0">
                                <button id="tabulator-html-filter-go" type="button" class="btn btn-primary w-full sm:w-16">Go</button>
                            </div>
                        </form>
                    </div>

                                <div class="intro-y overflow-auto lg:overflow-visible mt-8 sm:mt-0">
                                    <table class="table table-report sm:mt-2">
                                        <thead>
                                            <tr>
                                                <th class="whitespace-nowrap">Vehicle</th>
                                                <th class="whitespace-nowrap">Description</th>
                                                <th class="whitespace-nowrap">From</th>
                                                <th class="whitespace-nowrap">To</th>
                                                <th class="whitespace-nowrap">Time</th>
                                                <th class="whitespace-nowrap">Seats</th>
                                                <th class="text-center whitespace-nowrap">Priority</th>
                                                <th class="text-center whitespace-nowrap">Employee ID</th>
                                                <th class="text-center whitespace-nowrap">Details</th>
                                                <th class="text-center whitespace-nowrap"></th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data as $req )

                                            <tr class="intro-x" >
                                                <td class="w-40">
                                                    <div class="flex">
                                                        <div class="w-10 h-10 image-fit zoom-in">
                                                        {{$req->name}}
                                                        </div>

                                                    </div>
                                                </td>


                                                <td class="text">{{$req->description}}</td>
                                                <td class="text">{{$req->fromv}}</td>
                                                <td class="text">{{$req->tov}}</td>
                                                <td class="text">{{$req->time}}</td>
                                                <td class="text">{{$req->seats}}</td>



                                            @if ($req->priority == "High")
                                                    <td class="w-40">
                                                    <div class="flex items-center justify-center text-danger"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="check-square" data-lucide="user" class="lucide lucide-check-square w-4 h-4 mr-2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"></path></svg> {{$req->priority}} </div>
                                                </td>


                                                @elseif ($req->priority == "Low")
                                                    <td class="w-40">
                                                    <div class="flex items-center justify-center text-success"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="check-square" data-lucide="user" class="lucide lucide-check-square w-4 h-4 mr-2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"></path></svg> {{$req->priority}} </div>
                                                </td>

                                                @endif

                                                <td class="w-40">
                                                {{$req->emp_id}}
                                                    </td>
                                                <td>
                                                    <div class="mt-2 xl:mt-0">
                                                        <a href="{{url('detailstransport/'.$req->id)}}">
                                                        <button id="tabulator-html-filter-go" type="button" class="btn btn-primary w-full sm:w-16">Details</button>
                                                        </a>
                                                    </div>
                                                </td>

                                                <td class="table-report__action w-56">
                                                    <div class="flex justify-center items-center" >
{{--                                                        <a href="{{ url('adminRequestMoreBTN/' . $req->id.'/'.$req->emp_id) }}"> <input type="button" value="More" class="btn btn-primary w-full sm:w-16"></a>--}}
                                                        <a class="flex items-center mr-3" href="{{ url('approvetransportrequest/' . $req->id) }}"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="check-square" data-lucide="check-square" class="lucide lucide-check-square w-4 h-4 mr-1"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"></path></svg> Approve </a>
                                                        <a class="flex items-center text-danger" href="{{ url('rejectTransportrequest/' . $req->id) }}"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="trash-2" data-lucide="trash-2" class="lucide lucide-trash-2 w-4 h-4 mr-1"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 01-2 2H7a2 2 0 01-2-2V6m3 0V4a2 2 0 012-2h4a2 2 0 012 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg> Reject </a>
                                                    </div>
                                                </td>
                                            </tr>

                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
</div>

                <!-- END: HTML Table Data -->
            </div>


            @endsection
