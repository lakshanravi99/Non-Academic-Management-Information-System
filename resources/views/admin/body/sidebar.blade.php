 <nav class="side-nav">
                <a href="" class="intro-x flex items-center pl-5 pt-4">
                    <img alt="Midone - HTML Admin Template" class="w-6" src=" {{asset('dist/images/logo.svg')}} ">
                    <span class="hidden xl:block text-white text-lg ml-3"> UOR - NMIS </span>
                </a>
                <div class="side-nav__devider my-6"></div>
                <ul>

                    <li>
                        <a href="{{ route('dashboard')}}" class="side-menu {{session('index')}}">
                            <div class="side-menu__icon"> <i data-lucide="home"></i> </div>
                            <div class="side-menu__title">
                                Dashboard
                                <div class="side-menu__sub-icon transform rotate-180"> <i data-lucide="chevron-down"></i> </div>
                            </div>
                        </a>

                    </li>
                    <li>
                    <li class="side-nav__devider my-6"></li>
                    </li>
                    <li>
                        <a href="{{ route('EmployeeModule')}}" class="side-menu {{session('manageemployee')}}">
                            <div class="side-menu__icon"> <i data-lucide="users"></i> </div>
                            <div class="side-menu__title">
                                Manage Employees
                            </div>
                        </a>

                    </li>
                    <li>
                    <li class="side-nav__devider my-6"></li>
                    </li>
                    <li>
                        <a href="{{ route('manageuser.view')}}" class="side-menu {{session('manage')}}">
                            <div class="side-menu__icon"> <i data-lucide="users"></i> </div>
                            <div class="side-menu__title">
                                Manage User

                            </div>
                        </a>

                    </li>
                    <li>
                    <li class="side-nav__devider my-6"></li>
                    </li>
                    <li>
                        <a href="{{ route('attendancemonth')}}" class="side-menu {{session('attedance')}}">
                            <div class="side-menu__icon"> <i data-lucide="users"></i> </div>
                            <div class="side-menu__title">
                                Attendance
                            </div>
                        </a>

                    </li>
                    <li>
{{--                    <li class="side-nav__devider my-6"></li>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <a href="{{ route('admin_dashbord')}}" class="side-menu {{session('recruitment')}}">--}}
{{--                            <div class="side-menu__icon"> <i data-lucide="users"></i> </div>--}}
{{--                            <div class="side-menu__title">--}}
{{--                                Recruitment--}}

{{--                            </div>--}}
{{--                        </a>--}}

{{--                    </li>--}}
                    <li>
                    <li class="side-nav__devider my-6"></li>
                    </li>
                    <li>
                        <a href="{{ route('noticee') }}" class="side-menu {{session('notice')}}">
                            <div class="side-menu__icon"> <i data-lucide="command"></i> </div>
                            <div class="side-menu__title">
                                Notice

                            </div>
                        </a>

                    </li>

                    <li>
                    <li class="side-nav__devider my-6"></li>
                    </li>
                    <li>
                        <a href="{{ route('adminleavemode') }}" class="side-menu {{session('leave')}}">
                            <div class="side-menu__icon"> <i data-lucide="command"></i> </div>
                            <div class="side-menu__title">
                                Leave

                            </div>
                        </a>

                    </li>
                     <li>
                        <li class="side-nav__devider my-6"></li>
                    </li>

                    <li>
                        <a href="{{ route('Requestmodule') }}" class="side-menu {{session('request')}}">
                            <div class="side-menu__icon"> <i data-lucide="phone-outgoing"></i> </div>
                            <div class="side-menu__title"> Request  </div>
                        </a>

                    </li>

                           <li>
                        <li class="side-nav__devider my-6"></li>
                    </li>
                    <li>
                        <a href="{{ route('Complaintmodule') }}" class="side-menu {{session('complain')}}">
                            <div class="side-menu__icon"> <i data-lucide="frown"></i> </div>
                            <div class="side-menu__title"> Complain </div>
                        </a>

                    </li>

{{--                        <li>--}}
{{--                        <li class="side-nav__devider my-6"></li>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <a href="{{route('rave.view')}}" class="side-menu {{session('rave')}}">--}}
{{--                            <div class="side-menu__icon"> <i data-lucide="star"></i> </div>--}}
{{--                            <div class="side-menu__title"> Review  </div>--}}
{{--                        </a>--}}

{{--                    </li>--}}
                    @if(session('usertype') != "HOD")
                    <li>
                    <li class="side-nav__devider my-6"></li>
                    </li>
                    <li>
                        <a href="{{ route('personalfilee') }}" class="side-menu {{session('personal')}}">
                            <div class="side-menu__icon"> <i data-lucide="star"></i> </div>
                            <div class="side-menu__title"> Personal File  </div>
                        </a>
                    </li>
                    @endif

{{--                      <li>--}}
{{--                        <li class="side-nav__devider my-6"></li>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <a href="{{ route('adminsocial') }}" class="side-menu {{session('social')}}">--}}
{{--                            <div class="side-menu__icon"> <i data-lucide="instagram"></i> </div>--}}
{{--                            <div class="side-menu__title"> Social Group </div>--}}
{{--                        </a>--}}


{{--                            </li>--}}

{{--                      <li>--}}
{{--                        <li class="side-nav__devider my-6"></li>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <a href="" class="side-menu {{session('mobile')}}">--}}
{{--                            <div class="side-menu__icon"> <i data-lucide="smartphone"></i> </div>--}}
{{--                            <div class="side-menu__title"> Mobile App </div>--}}
{{--                        </a>--}}

{{--                    </li>--}}


                </ul>
            </nav>
