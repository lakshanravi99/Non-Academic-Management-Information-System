<style>
    .scrollable{
        height: 450px;
        overflow: scroll;
    }

    #notification--bullet1:before{
        --tw-bg-opacity:0;
        background-color:rgb(var(--color-danger)/var(--tw-bg-opacity));
        border-radius:9999px;
        content:"";
        height:8px;position:absolute;right:0;
        top:-2px;width:8px
    }
</style>

<!-- BEGIN: Top Bar -->
<div class="top-bar">

    <!-- BEGIN: Breadcrumb -->
    <nav aria-label="breadcrumb" class="-intro-x mr-auto hidden sm:flex">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Application</a></li>
            <li class="breadcrumb-item active" aria-current="page">

                @if(isset($title))
                    {{$title}}
                @else
                    {{'Dashboard'}}
                @endif

            </li>
        </ol>
    </nav>
    <!-- END: Breadcrumb -->


    <!-- BEGIN: Notifications -->
    <div class="intro-x dropdown mr-auto sm:mr-6">
        <div class="dropdown-toggle notification notification--bullet1 cursor-pointer" id="notification--bullet1" role="button" aria-expanded="false" data-tw-toggle="dropdown"> <i data-lucide="bell" class="notification__icon dark:text-slate-500"></i> </div>
        <div class="notification-content pt-2 dropdown-menu">
            <div class="notification-content__box dropdown-content">
                <div class="notification-content__title">Notification</div>
                <div class="notification-content__title" id="notification"></div>

            </div>
        </div>
    </div>
    <!-- END: Notifications -->

    <!-- BEGIN: Account Menu -->
    <div class="intro-x dropdown w-8 h-8">
        <div class="dropdown-toggle w-8 h-8 rounded-full overflow-hidden shadow-lg image-fit zoom-in" role="button" aria-expanded="false" data-tw-toggle="dropdown">
            <img alt="Midone - HTML Admin Template" src="{{asset('dist/images/rm.jpg')}} ">
        </div>

        <!-- <div class="dropdown-toggle w-8 h-8 rounded-full overflow-hidden shadow-lg image-fit zoom-in" role="button" aria-expanded="false" data-tw-toggle="dropdown">
        <img alt="Midone - HTML Admin Template" src="{{session('propic')}}">
    </div> -->

        <div class="dropdown-menu w-56">
            <ul class="dropdown-content bg-primary text-white">
                <li class="p-2">
                    <div class="font-medium"></div>
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











<meta name="csrf-token" content="{{ csrf_token() }}">
<script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
<!-- <script src="https://maps.googleapis.com/maps/api/js?key=["your-google-map-api"]&libraries=places"></script> -->
<!-- <script src=" {{asset('dist/js/app.js')}} "></script> -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://js.pusher.com/7.2/pusher.min.js"></script>
<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
<script src="https://unpkg.com/flowbite@1.4.7/dist/flowbite.js"></script>



<script>
    $(document).ready(function(){

        // Enable pusher logging - don't include this in production
        //Pusher.logToConsole = true;

        var pusher = new Pusher('5c8c95c6f4d56485d71a', {
            cluster: 'ap2'
        });

        var channel = pusher.subscribe('my-channel');
        channel.bind('my-event', function(data) {
            alert(JSON.stringify(data));

            fetchdata();

            //   if(data.from){
            //     let pending = parseInt($('#' + data.from).find('.badge-light').html());
            //     console.log (pending);
            //   }
        });

        //call fetch data fetch data
        fetchdata();
        function fetchdata(){
            $.ajax({
                method: "GET",
                url: "/appliciant/app_fetch-self-active-notification",
                datatype: "json",
                success: function(response){
                    console.log(response);

                    if(response.data1.length > 0){
                        $("#notification--bullet1").get(0).style.setProperty("--tw-bg-opacity", 1);
                    }

                    $('#notification').html("");
                    $.each(response.data1, function (ket, item) {
                        $('#notification').append('<div class="san_div cursor-pointer relative flex items-center bg-blue-100" value="'+item.id+'">\
                            <div class="w-12 h-12 flex-none image-fit mr-1">\
                                <img alt="Midone - HTML Admin Template" class="rounded-full" src="http://127.0.0.1:8000/dist/images/profile-6.jpg">\
                                <div class="w-3 h-3 bg-success absolute right-0 bottom-0 rounded-full border-2 border-white dark:border-darkmode-600"></div>\
                                </div>\
                                <div class="ml-2 overflow-hidden">\
                                    <div class="flex items-center">\
                                        <a href="javascript:;" class="font-medium truncate mr-5" id="self_notify_name">'+item.name+'</a>\
                                        <div class="text-xs text-slate-400 ml-auto whitespace-nowrap" id="self_notify_time">'+item.created_at+'</div>\
                                    </div>\
                                <div class="w-full truncate text-slate-500 mt-0.5" id="self_notify_description">'+item.description+'</div>\
                            </div>\
                        </div>'
                        );
                    });
                }
            });

            $.ajax({
                method: "GET",
                url: "/appliciant/app_fetch-self-deactive-notification",
                datatype: "json",
                success: function(response){
                    console.log(response);
                    $.each(response.data2, function (ket, item) {
                        $('#notification').append('<div class="cursor-pointer relative flex items-center">\
                            <div class="w-12 h-12 flex-none image-fit mr-1">\
                                <img alt="Midone - HTML Admin Template" class="rounded-full" src="http://127.0.0.1:8000/dist/images/profile-6.jpg">\
                                <div class="w-3 h-3 bg-success absolute right-0 bottom-0 rounded-full border-2 border-white dark:border-darkmode-600"></div>\
                                </div>\
                                <div class="ml-2 overflow-hidden">\
                                    <div class="flex items-center">\
                                        <a href="javascript:;" class="font-medium truncate mr-5" id="self_notify_name">'+item.name+'</a>\
                                        <div class="text-xs text-slate-400 ml-auto whitespace-nowrap" id="self_notify_time">'+item.created_at+'</div>\
                                    </div>\
                                <div class="w-full truncate text-slate-500 mt-0.5" id="self_notify_description">'+item.description+'</div>\
                            </div>\
                        </div>'
                        );
                    });
                }
            });



        }


        //start set as read
        $(document).on('click','.san_div', function (e) {
            e.preventDefault();
            //Get inpu field values
            var id = this.getAttribute('value');

            console.log(id);
            var data = {
                'id' : id
            }

            console.log(data);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "PUT",
                url: "app_mark-read-self-active-notification",
                data: data,
                dataType: "json",
                success: function (response) {
                    console.log(response);

                    if(response.status==400){
                        //errors
                        console.log(response.message);
                        fetchdata();
                    }
                    else if(response.status==404){
                        console.log(response.message);
                        fetchdata();
                    }
                    else{
                        console.log(response.message);
                        fetchdata();
                    }

                }
            });
        });
        // end set as read
    });
</script>

