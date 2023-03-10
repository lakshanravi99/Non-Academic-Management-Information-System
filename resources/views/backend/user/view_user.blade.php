
@extends('admin.admin_master')
@section('admin')



<div class="content">
                <!-- BEGIN: Top Bar -->
                <div class="top-bar">
                    <!-- BEGIN: Breadcrumb -->
                    <nav aria-label="breadcrumb" class="-intro-x mr-auto hidden sm:flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('user.view')}}">Manage User</a></li>
                            <li class="breadcrumb-item active" aria-current="page">View User</li>
                        </ol>
                    </nav>
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
                                <div class="m-4 items-center">
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
                                <div class="m-4 items-center">
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

                            <!-- END: Breadcrumb -->
                    <!-- BEGIN: Search -->
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
                            <img alt="Midone - HTML Admin Template" src="/{{session('propic')}} ">
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

                <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
                    <h2 class="text-lg font-medium mr-auto">
                       All User List
                    </h2>

                </div>

                 <div id="header-footer-modal-preview" class="modal" tabindex="-1" aria-hidden="true">
     <div class="modal-dialog">
         <div class="modal-content">

         </div>
     </div>
 </div> <!-- END: Modal Content -->
                <!-- BEGIN: HTML Table Data -->

                      <div class="intro-y box p-5 mt-5">
                    <div class="flex flex-col sm:flex-row sm:items-end xl:items-start">
                        <form id="tabulator-html-filter-form" class="xl:flex sm:mr-auto">

                            <div class="search hidden sm:block">
                            <input id="search" type="text" class="search__input form-control border-primary" placeholder="Search Users">
                            <i data-lucide="search" class="search__icon dark:text-slate-500"></i>
                             </div>

                        </form>


                    </div>

                                <div class="intro-y overflow-auto lg:overflow-visible mt-8 sm:mt-0">
                                    <table class="table table-report sm:mt-2">
                                        <thead>
                                            <tr class="text-primary">
                                                <th class="whitespace-nowrap">IMAGE</th>
                                                <th class="whitespace-nowrap">Employee ID</th>
                                                <th class="text-center whitespace-nowrap">User Name</th>
                                                <th class="text-center whitespace-nowrap">User Type</th>
                                                <th class="text-center whitespace-nowrap">Status</th>
                                                <th class="text-center whitespace-nowrap">Place</th>
                                                <th class="text-center whitespace-nowrap">ACTIONS</th>
                                            </tr>
                                        </thead>
                                        <tbody class="alldata">
                                        @foreach ( $allData as $key=> $user)


                                            <tr class="intro-x">
                                                <td class="w-40">
                                                    <div class="flex">
                                                        <div class="w-10 h-10 image-fit zoom-in">
                                                            @foreach($employees as $e)
                                                                @if($e->emp_id == $user->emp_id)
                                                            <img alt="" class="tooltip rounded-full" src="/{{$e->emp_pic}}">
                                                                @endif
                                                            @endforeach
                                                        </div>

                                                    </div>
                                                </td>
                                                <td >
                                                    {{ $user->emp_id}}
                                                    {{-- <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5">PC &amp; Laptop</div> --}}
                                                </td>

                                                <td class="text-center">{{ $user->fname}}</td>

                                                <td class="w-40">
                                                    <div class="flex items-center justify-center text-success"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="check-square" data-lucide="user" class="lucide lucide-check-square w-4 h-4 mr-2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"></path></svg> {{$user->usertype}} </div>
                                                </td>
                                                @if($user->status == "active" || $user->status == "Active")
                                                     <td class="w-40">
                                                    <div class="flex items-center justify-center text-success"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="check-square" data-lucide="check-square" class="lucide lucide-check-square w-4 h-4 mr-2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"></path></svg> {{$user->status}} </div>
                                                </td>

                                                @elseif($user->status=="inactive" || $user->status == "Inactive")
                                                     <td class="w-40">
                                                    <div class="flex items-center justify-center text-danger"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="check-square" data-lucide="check-square" class="lucide lucide-check-square w-4 h-4 mr-2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"></path></svg> {{$user->status}} </div>
                                                </td>

                                                @endif

                                               <td class="text-center">{{ $user->place}}</td>

                                                <td class="table-report__action w-56">
                                                    <div class="flex justify-center items-center">
                                                        <a class="flex items-center mr-3 text-dark" href="{{ url('usereditt/' . $user->emp_id) }}"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="check-square" data-lucide="check-square" class="lucide lucide-check-square w-4 h-4 mr-1"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"></path></svg> Edit </a>
                                                        <a class="flex items-center text-danger" href="javascript:;" data-tw-toggle="modal" data-tw-target="#delete-modal-preview{{$user->emp_id}}"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="trash-2" data-lucide="trash-2" class="lucide lucide-trash-2 w-4 h-4 mr-1"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 01-2 2H7a2 2 0 01-2-2V6m3 0V4a2 2 0 012-2h4a2 2 0 012 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg> Delete </a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <!-- BEGIN: Modal Content -->
                                            <div id="delete-modal-preview{{$user->emp_id}}" class="modal" tabindex="-1" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-body p-0">
                                                            <div class="p-5 text-center"> <i data-lucide="x-circle" class="w-16 h-16 text-danger mx-auto mt-3"></i>
                                                                <div class="text-3xl mt-5">Are you sure?</div>
                                                                <div class="text-slate-500 mt-2">Do you really want to delete these records? <br>This process cannot be undone.</div>
                                                            </div>
                                                            <div class="px-5 pb-8 text-center"> <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-24 mr-1">Cancel</button>
                                                                <a href="{{ url('deletesysuser/'.$user->emp_id)}}"> <button type="button" class="btn btn-danger w-24">Delete</button> </a></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- END: Modal Content -->
                                            @endforeach
                                        </tbody>
                                         <tbody id="Content" class="searchdata">

                                        </tbody>

                                    </table>
                                </div>
                                <div class="intro-y flex flex-wrap sm:flex-row sm:flex-nowrap items-center mt-3">
                                    <nav class="w-full sm:w-auto sm:mr-auto">
                                        <ul class="pagination">
                                            <li class="page-item">
                                                <a class="page-link" href="#"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="chevrons-left" class="lucide lucide-chevrons-left w-4 h-4" data-lucide="chevrons-left"><polyline points="11 17 6 12 11 7"></polyline><polyline points="18 17 13 12 18 7"></polyline></svg> </a>
                                            </li>
                                            <li class="page-item">
                                                <a class="page-link" href="#"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="chevron-left" class="lucide lucide-chevron-left w-4 h-4" data-lucide="chevron-left"><polyline points="15 18 9 12 15 6"></polyline></svg> </a>
                                            </li>
                                            <li class="page-item"> <a class="page-link" href="#">...</a> </li>
                                            <li class="page-item active"> <a class="page-link" href="#">1</a> </li>
                                            <li class="page-item "> <a class="page-link" href="#">2</a> </li>
                                            <li class="page-item"> <a class="page-link" href="#">3</a> </li>
                                            <li class="page-item"> <a class="page-link" href="#">...</a> </li>
                                            <li class="page-item">
                                                <a class="page-link" href="#"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="chevron-right" class="lucide lucide-chevron-right w-4 h-4" data-lucide="chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg> </a>
                                            </li>
                                            <li class="page-item">
                                                <a class="page-link" href="#"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="chevrons-right" class="lucide lucide-chevrons-right w-4 h-4" data-lucide="chevrons-right"><polyline points="13 17 18 12 13 7"></polyline><polyline points="6 17 11 12 6 7"></polyline></svg> </a>
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


                <!-- END: HTML Table Data -->
            </div>


            <script type="text/javascript">
             $('#search').on('keyup',function(){

                $value = $(this).val();

                if($value){
                    $('.alldata').hide();
                    $('.searchdata').show();
                }
                else{
                    $('.alldata').show();
                    $('.searchdata').hide();
                }

                $.ajax({

                    type: 'get',
                    url: '{{ route('searchuser') }}' ,
                    data: {'search':$value},

                    success: function(data){

                    console.log(data);
                    $('#Content').html(data);
                    }


                });

             })



            </script>

            @endsection
