 <nav class="side-nav">
                <a href="" class="intro-x flex items-center pl-5 pt-4">
                    <img alt="Midone - HTML Admin Template" class="w-6" src=" {{asset('dist/images/logo.svg')}} ">
                    <span class="hidden xl:block text-white text-lg ml-3"> UOR - NMIS </span>
                </a>
                <div class="side-nav__devider my-6"></div>
                <ul>

                    <li>
                        <a href="{{ route('temp_user_dashboard')}}" class="side-menu {{session('index')}}">
                            <div class="side-menu__icon"> <i data-lucide="home"></i> </div>
                            <div class="side-menu__title">
                                Home
                                <div class="side-menu__sub-icon transform rotate-180"> <i data-lucide="chevron-down"></i> </div>
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
                                Application

                            </div>
                        </a>

                    </li>
                    <li>
                    <li class="side-nav__devider my-6"></li>
                    </li>
                    <li>
                        <a href="{{ route('noticee')}}" class="side-menu {{session('notice')}}">
                            <div class="side-menu__icon"> <i data-lucide="users"></i> </div>
                            <div class="side-menu__title">
                                Notice
                            </div>
                        </a>

                    </li>
                    <li>
                    <li class="side-nav__devider my-6"></li>
                    </li>

                    <li>
                        <a href="" class="side-menu {{session('mobile')}}">
                            <div class="side-menu__icon"> <i data-lucide="smartphone"></i> </div>
                            <div class="side-menu__title"> Mobile App </div>
                        </a>

                    </li>


                </ul>
            </nav>
