
@extends('admin.admin_master_custom')
@section('admin')


<style>
    .scrollable{
        height: 450px;
        overflow: scroll;
    }
</style>


                    
                    
                    
                    <!-- BEGIN: Notifications -->
                    <div class="intro-x dropdown mr-auto sm:mr-6">
                        <div class="dropdown-toggle notification notification--bullet cursor-pointer" role="button" aria-expanded="false" data-tw-toggle="dropdown"> <i data-lucide="bell" class="notification__icon dark:text-slate-500"></i> </div>
                        <div class="notification-content pt-2 dropdown-menu">
                            <div class="notification-content__box dropdown-content">
                                <!-- Small Modal -->
<div id="small-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">
    <div class="relative p-4 w-full max-w-md h-full md:h-auto">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex justify-between items-center p-5 rounded-t border-b dark:border-gray-600">
                <h3 class="text-xl font-medium text-gray-900 dark:text-white" id="notification_name">
                    
                </h3>
                <button type="button" class="close text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-6 space-y-6">
                <p class="notification-description text-base leading-relaxed text-gray-500 dark:text-gray-400" id="notification-description">
                    
                </p>
            </div>
            
        </div>
    </div>
</div>
                                <div class="notification-content__title" id="e_notification">Notifications</div>
                                



                            </div>
                        </div>
                    </div>
                    <!-- END: Notifications -->
                   


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

    var pusher = new Pusher('5c8c95c6f4d56485d71a', {
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
            //Start Admin Active Notification
            $.ajax({
                method: "GET",
                url: "employee/user_fetch-admin-active-notification",
                datatype: "json",
                success: function(response){
                    console.log(response);
                    $('#e_notification').html("");
                    $.each(response.admin_active, function (key, item) {
                        $.each(item, function (key, item1) { 
                            $('#e_notification').append('<div class="common_div aan_div cursor-pointer relative flex items-center p-4 mb-4 text-sm text-yellow-700 bg-yellow-100 rounded-lg dark:bg-yellow-200 dark:text-yellow-800" value="'+item1.id+'" value2="'+item1.description+'" value1="'+item1.name+'">\
                                <div class="w-12 h-12 flex-none image-fit mr-1">\
                                    <img alt="Midone - HTML Admin Template" class="rounded-full" src="dist/images/profile-6.jpg">\
                                    <div class="w-3 h-3 bg-success absolute right-0 bottom-0 rounded-full border-2 border-white dark:border-darkmode-600"></div>\
                                    </div>\
                                    <div class="ml-2 overflow-hidden">\
                                        <div class="flex items-center">\
                                            <a href="javascript:;" class="font-medium truncate mr-5" id="self_notify_name">'+item1.name+'</a>\
                                            <div class="text-xs text-slate-400 ml-auto whitespace-nowrap" id="self_notify_time">'+item1.created_at+'</div>\
                                        </div>\
                                    <div class="w-full truncate text-slate-500 mt-0.5" id="self_notify_description">'+item1.description+'</div>\
                                </div>\
                            </div>'
                            );
                        });                             
                    });
                }
            });
            //End Admin Active Notification

            //Start Self Active notification
            $.ajax({
                method: "GET",
                url: "employee/user_fetch-self-active-notification",
                datatype: "json",
                success: function(response){
                    console.log(response);
                    $.each(response.user_self_active, function (ket, item) { 
                        $('#e_notification').append('<div class="common_div san_div cursor-pointer relative flex items-center p-4 mb-4 text-sm text-blue-700 bg-blue-100 rounded-lg dark:bg-blue-200 dark:text-blue-800" value="'+item.id+'" value2="'+item.description+'" value1="'+item.name+'">\
                            <div class="w-12 h-12 flex-none image-fit mr-1">\
                                <img alt="Midone - HTML Admin Template" class="rounded-full" src="dist/images/profile-6.jpg">\
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

            //End Self Deactive notification

            //Start Admin Deactive Notification
            $.ajax({
                method: "GET",
                url: "employee/user_fetch-admin-deactive-notification",
                datatype: "json",
                success: function(response){
                    console.log(response);
                    $.each(response.admin_deactive, function (key, item) {
                        $.each(item, function (key, item1) {  
                            $('#e_notification').append('<div class="common_div cursor-pointer relative flex items-center p-4 mb-4 text-sm text-yellow-700 rounded-lg dark:bg-yellow-200 dark:text-yellow-800" value="'+item1.id+'" value2="'+item1.description+'" value1="'+item1.name+'">\
                                <div class="w-12 h-12 flex-none image-fit mr-1">\
                                    <img alt="Midone - HTML Admin Template" class="rounded-full" src="dist/images/profile-6.jpg">\
                                    <div class="w-3 h-3 bg-success absolute right-0 bottom-0 rounded-full border-2 border-white dark:border-darkmode-600"></div>\
                                    </div>\
                                    <div class="ml-2 overflow-hidden">\
                                        <div class="flex items-center">\
                                            <a href="javascript:;" class="font-medium truncate mr-5" id="self_notify_name">'+item1.name+'</a>\
                                            <div class="text-xs text-slate-400 ml-auto whitespace-nowrap" id="self_notify_time">'+item1.created_at+'</div>\
                                        </div>\
                                    <div class="w-full truncate text-slate-500 mt-0.5" id="self_notify_description">'+item1.description+'</div>\
                                </div>\
                            </div>'
                            );
                        });                             
                    });
                }
            });
            //End Admin Deactive Notification

            //Star Self deactive Notification
            $.ajax({
                method: "GET",
                url: "employee/user_fetch-self-deactive-notification",
                datatype: "json",
                success: function(response){
                    console.log(response);
                    $.each(response.user_self_deactive, function (ket, item) { 
                        $('#e_notification').append('<div class="common_div cursor-pointer relative flex items-center p-4 mb-4 text-sm text-blue-700 rounded-lg dark:bg-blue-200 dark:text-blue-800" value="'+item.id+'" value2="'+item.description+'" value1="'+item.name+'">\
                            <div class="w-12 h-12 flex-none image-fit mr-1">\
                                <img alt="Midone - HTML Admin Template" class="rounded-full" src="dist/images/profile-6.jpg">\
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
            //End Self deactive Notification
                           
        }



        //Update administrative mark as reda
        $(document).on('click','.aan_div', function (e) {
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
                url: "employee/user_mark-read-admin-active-notification",
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
    // End administrative notification mark as read

    //start self notification mark as read
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
                url: "employee/user_mark-read-self-active-notification",
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
    // End self notifiction mark as read

    //start self notification mark as read
    $(document).on('click','.common_div', function (e) {
            e.preventDefault();
            //Get inpu field values
            var id = this.getAttribute('value');
            var name = this.getAttribute('value1');
            var description = this.getAttribute('value2');

            console.log(id);
            // var data = {
            //     'id' : id
            // }

            // console.log(data);
            // $.ajaxSetup({
            //     headers: {
            //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            //     }
            // });

            // $.ajax({
            //     type: "PUT",
            //     url: "employee/user_mark-read-self-active-notification",
            //     data: data,
            //     dataType: "json",
            //     success: function (response) {
            //         console.log(response);

            //         if(response.status==400){
            //             //errors
            //             console.log(response.message);
            //             fetchdata();
            //         }
            //         else if(response.status==404){
            //             console.log(response.message);
            //             fetchdata();
            //         }
            //         else{
            //             console.log(response.message);
            //             fetchdata();
            //         }
                    
            //     }
            // });
            
            $('#notification-description').html("");
            $('#notification-description').append(description);
            $('#notification_name').html("");
            $('#notification_name').append(name);
            $('#small-modal').removeClass('hidden');


        });
    // End self notifiction mark as read

    $(document).on('click','.close', function (e) {
            e.preventDefault();
            
            $('#small-modal').addClass('hidden');

        });
  });
</script>
@endsection