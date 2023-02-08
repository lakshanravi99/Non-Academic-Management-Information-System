<!DOCTYPE html>



<html lang="en" class="{{session('lightmode')}}">
<!-- BEGIN: Head -->
<head>
    <meta charset="utf-8">
    <link href="dist/images/logo.svg" rel="shortcut icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>NIMS - UOR</title>
    <!-- BEGIN: CSS Assets-->
    <link rel="stylesheet" href=" {{asset('dist/css/app.css')}} " />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <!-- END: CSS Assets-->
</head>
<!-- END: Head -->
<body class="py-5">
<!-- BEGIN: Mobile Menu -->
<!-- END: Mobile Menu -->
<div class="flex">

    <!-- BEGIN: Side Menu -->
    @include('user.sidebar')
    <!-- END: Side Menu -->


    <!-- BEGIN: Content -->
    @yield('user')
    <!-- END: Content -->
</div>
@if(session('usertype') == 'admin' || session('usertype') == 'superAdmin' )
<div data-url="{{route('Requestmodule')}}" class="dark-mode-switcher cursor-pointer shadow-md fixed bottom-0 right-0 box border rounded-full w-40 h-12 flex items-center justify-center z-50 mb-10 mr-10">
    <div class="mr-4 text-slate-600 dark:text-slate-200">Admin</div>
    <div class="dark-mode-switcher__toggle dark-mode-switcher__toggle--active border"></div>
    <div class="mr-4 text-slate-600 dark:text-slate-200">User</div>
</div>
@endif
<!-- BEGIN: Dark Mode Switcher-->
<!-- END: Dark Mode Switcher-->

<!-- BEGIN: JS Assets-->
<script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=["your-google-map-api"]&libraries=places"></script>
<script src=" {{asset('dist/js/app.js')}} "></script>
<!-- END: JS Assets-->
{{--modify--}}

<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
<script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=["your-google-map-api"]&libraries=places"></script>
{{--<script src=" {{asset('dist/js/app.js')}} "></script>--}}
<meta name="csrf-token" content="{{ csrf_token() }}">
<script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>

</body>
</html>
