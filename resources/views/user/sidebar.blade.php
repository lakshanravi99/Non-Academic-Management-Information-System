<nav class="side-nav">
    <a href="" class="intro-x flex items-center pl-5 pt-4">
        <img alt="Midone - HTML Admin Template" class="w-6" src=" {{asset('dist/images/logo.svg')}} ">
        <span class="hidden xl:block text-white text-lg ml-3"> UOR - NMIS </span>
    </a>
    <div class="side-nav__devider my-6"></div>
    <ul>
        <li>
            <a href="javascript:;.html" class="side-menu {{session('index')}}">
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
            <a href="{{route('UserLeavemodule')}}" class="side-menu {{session('leave')}}">
                <div class="side-menu__icon"> <i data-lucide="home"></i> </div>
                <div class="side-menu__title">
                    Leave
                    <div class="side-menu__sub-icon transform rotate-180"> <i data-lucide="chevron-down"></i> </div>
                </div>
            </a>

        </li>
        <li class="side-nav__devider my-6"></li>
        </li>
        <li>
            <a href="{{route('attendanceUser.view')}}" class="side-menu {{session('attedance')}}">
                <div class="side-menu__icon"> <i data-lucide="home"></i> </div>
                <div class="side-menu__title">
                    Attendence
                    <div class="side-menu__sub-icon transform rotate-180"> <i data-lucide="chevron-down"></i> </div>
                </div>
            </a>

        </li>
        <li>



        <li>

        <li>
        <li class="side-nav__devider my-6"></li>
        </li>
        <li>
            <a href="{{route('UserRequestmodule')}}" class="side-menu {{session('request')}}">
                <div class="side-menu__icon"> <i data-lucide="phone-outgoing"></i> </div>
                <div class="side-menu__title"> Request  </div>
            </a>

        </li>

        <li>
        <li class="side-nav__devider my-6"></li>
        </li>
        <li>
            <a href="{{route('UserComplaintmodule')}}" class="side-menu {{session('complain')}}">
                <div class="side-menu__icon"> <i data-lucide="frown"></i> </div>
                <div class="side-menu__title"> Raise & Issue </div>
            </a>

        </li>

        <li>
{{--        <li class="side-nav__devider my-6"></li>--}}
{{--        </li>--}}
{{--        <li>--}}
{{--            <a href="{{route('rave.view')}}" class="side-menu {{session('rave')}}">--}}
{{--                <div class="side-menu__icon"> <i data-lucide="star"></i> </div>--}}
{{--                <div class="side-menu__title"> Review  </div>--}}
{{--            </a>--}}

{{--        </li>--}}

{{--        <li>--}}
{{--        <li class="side-nav__devider my-6"></li>--}}
{{--        </li>--}}
{{--        <li>--}}
{{--            <a href="{{route('social')}}" class="side-menu {{session('social')}}">--}}
{{--                <div class="side-menu__icon"> <i data-lucide="instagram"></i> </div>--}}
{{--                <div class="side-menu__title"> Social Group </div>--}}
{{--            </a>--}}


{{--        </li>--}}

{{--        <li>--}}
{{--        <li class="side-nav__devider my-6"></li>--}}
{{--        </li>--}}
{{--        <li>--}}
{{--            <a href="" class="side-menu {{session('mobile')}}">--}}
{{--                <div class="side-menu__icon"> <i data-lucide="smartphone"></i> </div>--}}
{{--                <div class="side-menu__title"> Mobile App </div>--}}
{{--            </a>--}}

{{--        </li>--}}


    </ul>
</nav>
