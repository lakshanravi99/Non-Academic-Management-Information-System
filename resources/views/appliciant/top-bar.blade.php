
@extends('admin.admin_master_custom')

@section('admin')

<style>
    .scrollable{
        height: 450px;
        overflow: scroll;
    }
</style>

<div class="content">


    <!-- BEGIN: Top Bar -->
    <div class="top-bar">  
                    <!-- BEGIN: Notifications -->
                    <div class="intro-x dropdown mr-auto sm:mr-6">
                        <div class="dropdown-toggle notification notification--bullet cursor-pointer" role="button" aria-expanded="false" data-tw-toggle="dropdown"> <i data-lucide="bell" class="notification__icon dark:text-slate-500"></i> </div>
                        <div class="notification-content pt-2 dropdown-menu">
                            <div class="notification-content__box dropdown-content">
                            <div class="notification-content__title">Notification</div>
                                <div class="notification-content__title" id="notification"></div>
                                
                            </div>
                        </div>
                    </div>
                    <!-- END: Notifications -->
                   
                </div>
                <!-- END: Top Bar -->


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

    //console.log("Hello");
    //call fetch data fetch data
    fetchdata();
        function fetchdata(){
            //console.log("Hello");
            $.ajax({
                method: "GET",
                url: "appliciant/app_fetch-self-active-notification",
                datatype: "json",
                success: function(response){
                    //console.log(response);
                    $('#notification').html("");
                    $.each(response.data1, function (ket, item) { 
                        $('#notification').append('<div class="san_div cursor-pointer relative flex items-center bg-blue-100" value="'+item.id+'">\
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

            $.ajax({
                method: "GET",
                url: "appliciant/app_fetch-self-deactive-notification",
                datatype: "json",
                success: function(response){
                    //console.log(response);
                    $.each(response.data2, function (ket, item) { 
                        $('#notification').append('<div class="cursor-pointer relative flex items-center">\
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
            
            
           
        }


    // // Start Available Test
    //     //store
    //     $(document).on('click', '#available_test_add_submit', function(e){ 
    //         //same #submit use in update function. go for solution letter
    //         e.preventDefault();
 
    //         console.log("Hello");
    //         var data = {
    //             'designation_id' : $('#available_test_designation').val(),
    //             'test_name' : $('#available_test_test_name').val(),
    //             'test_part' : $('#available_test_test_part').val(),
    //             'test_type' : $('#available_test_test_type').val()
    //         }
    //         console.log(data);

    //         $.ajaxSetup({
    //             headers: {
    //                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //             }
    //         });

    //         $.ajax({
    //             method: "POST",
    //             url: "add-appliciant_test",
    //             data: data,
    //             type: "json",
                
    //             success: function(response){
                    
    //                 if(response.status == 400){

    //                     $('#saveform_errList').html("");
    //                     $('#saveform_errList').addClass('alert alert-denger');
    //                     $.each(response.errors, function(key, err_values){
    //                         $('#saveform_errList').append('<li>'+err_values+'</li>');
    //                     });
    //                 }
    //                 if(response.status == 200){
    //                     $('#alert-success_test').addClass('hidden');
    //                     $('#alert-success_test_message').text(response.message);
    //                     $('#alert-success_test').removeClass('hidden');
    //                     $("#add_form")[0].reset();
    //                     $(function(){
    //                     setTimeout(function(){
    //                         $('#alert-success_test').addClass('hidden');
    //                         }, 5000);
    //                     });
    //                     fetchdata();
    //                 }
            
    //             }
    //         });

    //     });

    //     //Delete
    //     $(document).on('click', '#delete_available', function (e) {
    //         console.log("Hello delete");
    //         e.preventDefault();
    //         var id = this.getAttribute('value');
    //         console.log(id);

    //         //Send student id to box
    //         $('#available_test_delete_id').val(id);

    //         showDeleteModal(id,'#available_test_delete-modal');
            
    //     });


    //     $(document).on('click', '.available_test_delete_confirm', function (e) {
    //         e.preventDefault();

    //         //Show deleting..
    //         //$(this).text("Deleting...");

    //         var id = $('#available_test_delete_id').val();
    //         //console.log(id);

    //         $.ajaxSetup({
    //             headers: {
    //                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //             }
    //         });

    //         $.ajax({
    //             method: "DELETE",
    //             url: "delete-appliciant_test/"+id,
    //             success: function (response) {
    //                 endDeleteModal(response.message, '#available_test_delete-modal', '#alert-danger_test', '#alert-danger_test_message');
                    
    //             }

    //         });
    //     });
    //     //End Delete

    //     //Edit
    //     $(document).on('click', '.edit_available', function (e) {
    //         e.preventDefault();
    //         var id = this.getAttribute('value');
    //         //console.log(id);

    //         //call form modal
    //         $('#available_test_edit-modal').removeClass('hidden');
    //         $('#available_test_edit-modal').addClass('flex');
    //         $('#available_test_edit-modal').attr('role','dialog');
    //         $('#available_test_edit-modal').attr('aria-modal','true');
    //         $('#available_test_edit-modal').removeAttr('aria-hidden');
    //         $('body').append('<div id="bg_bluer1" class="bg-gray-900 bg-opacity-50 dark:bg-opacity-80 fixed inset-0 z-40"></div><div id="bg_bluer2" class="bg-gray-900 bg-opacity-50 dark:bg-opacity-80 fixed inset-0 z-40"></div>');

    //         $.ajax({
    //             method: "GET",
    //             url: "edit-appliciant_test/"+id,
    //             success: function (response) {
    //                 //console.log(response);
    //                 if(response.status==404){
    //                     $('#success_message').html("");
    //                     $('#success_message').addClass('alert alert-danger');
    //                     $('#success_message').text(response.message);
    //                 }
    //                 else{
    //                     //Insert data into input fields
    //                     //console.log(response.edit_details[0].test_id);
    //                     $('#available_test_selected_designation').val(response.designation[0].designation_name);
    //                     $('#available_test_selected_designation').text(response.designation[0].designation_name);
    //                     $('#available_test_edit_test_name').val(response.edit_details[0].test_name);
    //                     $('#available_test_edit_test_part').val(response.edit_details[0].test_part);
    //                     $('#available_test_edit_test_type').val(response.edit_details[0].test_type);
    //                     $('#edit_available_test_id').val(id);    
    //                 }
    //             }
    //         });
            
    //     });
        //End Edit

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
            
                @endsection