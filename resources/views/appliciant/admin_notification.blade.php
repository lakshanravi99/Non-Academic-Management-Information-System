
@extends('appliciant.appliciant_master_custom')
@section('admin')



    <div class="content">
        @include('appliciant.body.topbar')

        <!-- BEGIN: Top Bar -->
        <!-- END: Top Bar -->


        <div class="intro-y col-span-12 lg:col-span-6">
            <!-- BEGIN: Horizontal Form -->
            <form action="" id="anform">
                <div class="intro-y box mt-5">

                    <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                        <h2 class="font-medium text-base mr-auto">
                            Administro Notification Pannel
                        </h2>

                    </div>
                    <div id="horizontal-form" class="p-5">
                        <div>
                            <h3 class="font-medium text-base mr-auto">
                                To:
                            </h3>

                        </div>
                        <div class="form-inline mt-5">
                            <label for="horizontal-form-1" class="form-label sm:w-20">Single Employee ID</label>
                            <input id="horizontal-form-1" name="emp_id" type="text" class="form-control emp_id" placeholder="Enter Employee ID for Specific User">
                        </div>

                        <div class="form-inline">
                            <label for="horizontal-form-1" class="form-label sm:w-20">Faculty</label>
                            <select class="form-select mt-2 sm:mr-2 faculty" name="faculty" value="" aria-label="Default select example">
                                @foreach($faculty as $fac)
                                    <option>{{$fac->faculty_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-inline mt-5">
                            <label for="horizontal-form-2" class="form-label sm:w-20">Department</label>
                            <select class="form-select mt-2 sm:mr-2 department" name="department" value="" aria-label="Default select example">
                                @foreach($department as $dept)
                                    <option>{{$dept->department_name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-inline">
                            <label for="horizontal-form-1" class="form-label sm:w-20">Designation</label>
                            <select class="form-select mt-2 sm:mr-2 designation" name="designation" value="" aria-label="Default select example">
                                @foreach($designation as $desig)
                                    <option>{{$desig->designation_name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-inline mt-5">
                            <label for="horizontal-form-1" class="form-label sm:w-20">Message Name</label>
                            <input id="horizontal-form-1" type="text" name="message_name" class="form-control message_name" placeholder="Enter Notification Caption">
                        </div>

                        <div class="form-inline mt-5">
                            <label for="horizontal-form-1" class="form-label sm:w-20">Description</label>
                            <textarea class="form-control mt-2 description" name="description" placeholder="Enter the Description" aria-label="default input example" name="w3review" rows="4" cols="50"></textarea>
                        </div>

                        <div class="sm:ml-20 sm:pl-5 mt-5">
                            <button class="btn btn-primary send_notification">Send</button>
                        </div>
                    </div>
            </form>

            <div class="source-code hidden">
                <button data-target="#copy-horizontal-form" class="copy-code btn py-1 px-2 btn-outline-secondary"> <i data-lucide="file" class="w-4 h-4 mr-2"></i> Copy example code </button>
                <div class="overflow-y-auto mt-3 rounded-md">
                    <pre id="copy-horizontal-form" class="source-preview"> <code class="html"> HTMLOpenTagdiv class=&quot;form-inline&quot;HTMLCloseTag HTMLOpenTaglabel for=&quot;horizontal-form-1&quot; class=&quot;form-label sm:w-20&quot;HTMLCloseTagEmailHTMLOpenTag/labelHTMLCloseTag HTMLOpenTaginput id=&quot;horizontal-form-1&quot; type=&quot;text&quot; class=&quot;form-control&quot; placeholder=&quot;example@gmail.com&quot;HTMLCloseTag HTMLOpenTag/divHTMLCloseTag HTMLOpenTagdiv class=&quot;form-inline mt-5&quot;HTMLCloseTag HTMLOpenTaglabel for=&quot;horizontal-form-2&quot; class=&quot;form-label sm:w-20&quot;HTMLCloseTagPasswordHTMLOpenTag/labelHTMLCloseTag HTMLOpenTaginput id=&quot;horizontal-form-2&quot; type=&quot;password&quot; class=&quot;form-control&quot; placeholder=&quot;secret&quot;HTMLCloseTag HTMLOpenTag/divHTMLCloseTag HTMLOpenTagdiv class=&quot;form-check sm:ml-20 sm:pl-5 mt-5&quot;HTMLCloseTag HTMLOpenTaginput id=&quot;horizontal-form-3&quot; class=&quot;form-check-input&quot; type=&quot;checkbox&quot; value=&quot;&quot;HTMLCloseTag HTMLOpenTaglabel class=&quot;form-check-label&quot; for=&quot;horizontal-form-3&quot;HTMLCloseTagRemember meHTMLOpenTag/labelHTMLCloseTag HTMLOpenTag/divHTMLCloseTag HTMLOpenTagdiv class=&quot;sm:ml-20 sm:pl-5 mt-5&quot;HTMLCloseTag HTMLOpenTagbutton class=&quot;btn btn-primary&quot;HTMLCloseTagLoginHTMLOpenTag/buttonHTMLCloseTag HTMLOpenTag/divHTMLCloseTag </code> </pre>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Horizontal Form -->

    <!-- BEGIN: HTML Table Data -->

    <div class="intro-y box p-5 mt-5">
        <div class="flex flex-col sm:flex-row sm:items-end xl:items-start">
            <form id="tabulator-html-filter-form" class="xl:flex sm:mr-auto">
                <div class="sm:flex items-center sm:mr-4">
                    <label class="w-12 flex-none xl:w-auto xl:flex-initial mr-2">User Type</label>
                    <select id="tabulator-html-filter-field" class="form-select w-full sm:w-32 2xl:w-full mt-2 sm:mt-0 sm:w-auto">
                        <option value="name">Admin</option>
                        <option value="category">Admin 2</option>
                        <option value="remaining_stock">Admin 3</option>
                    </select>
                </div>

                <div class="sm:flex items-center sm:mr-4 mt-2 xl:mt-0">
                    <label class="w-12 flex-none xl:w-auto xl:flex-initial mr-2">Emp. ID/Name</label>
                    <input id="tabulator-html-filter-value" type="text" class="form-control sm:w-40 2xl:w-full mt-2 sm:mt-0" placeholder="Search...">
                </div>
                <div class="mt-2 xl:mt-0">
                    <button id="tabulator-html-filter-go" type="button" class="btn btn-primary w-full sm:w-16">Go</button>
                    <button id="tabulator-html-filter-reset" type="button" class="btn btn-secondary w-full sm:w-16 mt-2 sm:mt-0 sm:ml-1">Reset</button>
                </div>
            </form>
            <div class="flex mt-5 sm:mt-0">
                <button id="tabulator-print" class="btn btn-outline-secondary w-1/2 sm:w-auto mr-2"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="printer" data-lucide="printer" class="lucide lucide-printer w-4 h-4 mr-2"><polyline points="6 9 6 2 18 2 18 9"></polyline><path d="M6 18H4a2 2 0 01-2-2v-5a2 2 0 012-2h16a2 2 0 012 2v5a2 2 0 01-2 2h-2"></path><rect x="6" y="14" width="12" height="8"></rect></svg> Print </button>
                <div class="dropdown w-1/2 sm:w-auto">
                    <button class="dropdown-toggle btn btn-outline-secondary w-full sm:w-auto" aria-expanded="false" data-tw-toggle="dropdown"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="file-text" data-lucide="file-text" class="lucide lucide-file-text w-4 h-4 mr-2"><path d="M14.5 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V7.5L14.5 2z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><line x1="10" y1="9" x2="8" y2="9"></line></svg> Export <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="chevron-down" data-lucide="chevron-down" class="lucide lucide-chevron-down w-4 h-4 ml-auto sm:ml-2"><polyline points="6 9 12 15 18 9"></polyline></svg> </button>
                    <div class="dropdown-menu w-40">
                        <ul class="dropdown-content">
                            <li>
                                <a id="tabulator-export-csv" href="javascript:;" class="dropdown-item"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="file-text" data-lucide="file-text" class="lucide lucide-file-text w-4 h-4 mr-2"><path d="M14.5 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V7.5L14.5 2z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><line x1="10" y1="9" x2="8" y2="9"></line></svg> Export CSV </a>
                            </li>
                            <li>
                                <a id="tabulator-export-pdf" href="javascript:;" class="dropdown-item"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="file-text" data-lucide="file-text" class="lucide lucide-file-text w-4 h-4 mr-2"><path d="M14.5 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V7.5L14.5 2z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><line x1="10" y1="9" x2="8" y2="9"></line></svg> Export PDF </a>
                            </li>
                            <li>
                                <a id="tabulator-export-xlsx" href="javascript:;" class="dropdown-item"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="file-text" data-lucide="file-text" class="lucide lucide-file-text w-4 h-4 mr-2"><path d="M14.5 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V7.5L14.5 2z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><line x1="10" y1="9" x2="8" y2="9"></line></svg> Export XLSX </a>
                            </li>
                            <li>
                                <a id="tabulator-export-html" href="javascript:;" class="dropdown-item"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="file-text" data-lucide="file-text" class="lucide lucide-file-text w-4 h-4 mr-2"><path d="M14.5 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V7.5L14.5 2z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><line x1="10" y1="9" x2="8" y2="9"></line></svg> Export HTML </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="intro-y overflow-auto lg:overflow-visible mt-8 sm:mt-0">
            <table>
                <thead>
                <tr>
                    <th class="text-center whitespace-nowrap">Notification ID</th>
                    <th class="text-center whitespace-nowrap">Sender ID</th>
                    <th class="text-center whitespace-nowrap">Single User ID</th>
                    <th class="text-center whitespace-nowrap">Designation Name</th>
                    <th class="text-center whitespace-nowrap">Faculty Name</th>
                    <th class="text-center whitespace-nowrap">Department Name</th>
                    <th class="text-center whitespace-nowrap">Notification Name</th>
                    <th class="text-center whitespace-nowrap">Description</th>
                    <th class="text-center whitespace-nowrap">Time</th>
                    <th class="text-center whitespace-nowrap">Date</th>
                    <th class="text-center whitespace-nowrap">Update</th>
                </tr>
                </thead>
                <tbody>



                <tr class="intro-x">

                </tr>

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

    </div>

@endsection

<meta name="csrf-token" content="{{ csrf_token() }}">
<script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
<!-- <script src="https://maps.googleapis.com/maps/api/js?key=["your-google-map-api"]&libraries=places"></script> -->
<script src=" {{asset('dist/js/app.js')}} "></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>

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
                url: "appliciant/app_mark-read-self-active-notification",
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
        // End Available Test
    });
</script>



<script>
    $(document).ready(function(){
        console.log("Hello");
        //fetch data
        fetchdata();
        function fetchdata(){
            console.log("Hello");
            $.ajax({
                method: "GET",
                url: "fetch-admin-notification",
                datatype: "json",
                success: function(response){
                    //console.log(response.students);
                    $('tbody').html("");
                    $.each(response.data, function (ket, item) {
                        $('tbody').append('<tr>\
                            <td class="text-center">'+item.id+'</td>\
                            <td class="text-center">'+item.sender_id+'</td>\
                            <td class="text-center">'+item.single_user_id+'</td>\
                            <td class="text-center">'+item.designation_name+'</td>\
                            <td class="text-center">'+item.faculty_name+'</td>\
                            <td class="text-center">'+item.department_name+'</td>\
                            <td class="text-center">'+item.name+'</td>\
                            <td class="table-report__action w-56">\
                                <div class="flex justify-center items-center">\
                                    <a class="flex items-center mr-3" href=""> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="check-square" data-lucide="check-square" class="lucide lucide-check-square w-4 h-4 mr-1"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"></path></svg> View </a>\
                                </div>\
                            </td>\
                            <td class="text-center">'+item.created_at+'</td>\
                            <td class="text-center">'+item.dob+'</td>\
                            <td class="table-report__action w-56">\
                                <div class="flex justify-center items-center">\
                                    <div class="edit_notification" id="edit_notification" value="'+item.id+'"><a class="flex items-center mr-3" href="" > <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="check-square" data-lucide="check-square" class="lucide lucide-check-square w-4 h-4 mr-1"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"></path></svg> Edit </a></div>\
                                    <div class="delete_notification" id="delete_notification" value="'+item.id+'"><a class="flex items-center text-danger" href=""> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="trash-2" data-lucide="trash-2" class="lucide lucide-trash-2 w-4 h-4 mr-1"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 01-2 2H7a2 2 0 01-2-2V6m3 0V4a2 2 0 012-2h4a2 2 0 012 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg> Delete </a></div>\
                                </div>\
                            </td>'
                        );
                    });
                }
            });
        }

        //store
        $(document).on('click', '.send_notification', function(e){
            e.preventDefault();

            console.log("Hello");
            var data = {
                'emp_id': $('.emp_id').val(),
                'faculty': $('.faculty').val(),
                'department': $('.department').val(),
                'designation': $('.designation').val(),
                'message_name': $('.message_name').val(),
                'description': $('.description').val(),
            }
            console.log(data);

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                method: "POST",
                url: "/store-admin-notification",
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
                        $('#saveform_errList').html("");
                        $('#success_message').addClass('alert alert-success')
                        $('#success_message').text(response.message)
                        $('#success_message').find('input').val("");
                        $("#anform")[0].reset();
                        fetchdata();
                    }
                }
            });

        });

        //Delete
        $(document).on('click', '.delete_notification', function (e) {
            console.log("Hello delete");
            e.preventDefault();
            var notification_id = this.getAttribute('value');
            console.log(notification_id);

            //Send student id to box
            // $('#delete_stud_id').val(notification_id);
            // $('#DeleteStudentModal').modal('show');


        });

        $(document).on('click', '.delete_student_btn', function (e) {
            e.preventDefault();

            //Show deleting..
            $(this).text("Deleting...");

            var stud_id = $('#delete_stud_id').val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                method: "DELETE",
                url: "/delete-student/"+stud_id,
                success: function (response) {
                    $('#success_message').addClass('alert alert-success');
                    $('#success_message').text(response.message);
                    $('#DeleteStudentModal').modal('hide');
                    $('.delete_student_btn').text("Yes Delete!");
                    fetchstudent();

                }
            });
        });
        //End Delete
    });
</script>




<!-- END: JS Assets-->
</body>
</html>
