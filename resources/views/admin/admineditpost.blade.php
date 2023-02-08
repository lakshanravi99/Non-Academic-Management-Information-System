
@extends('admin.admin_master')
@section('admin')



    <div class="content">
        <!-- BEGIN: Top Bar -->
        <div class="top-bar">
            <!-- BEGIN: Breadcrumb -->
            <nav aria-label="breadcrumb" class="-intro-x mr-auto hidden sm:flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('socialuserposts')}}">Posts</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Posts</li>
                </ol>
            </nav>
            <!-- END: Breadcrumb -->
            <!-- BEGIN: Search -->
            <div class="intro-x relative mr-3 sm:mr-6">
                <div class="search hidden sm:block">
                    <input type="text" class="search__input form-control border-transparent" placeholder="Search...">
                    <i data-lucide="search" class="search__icon dark:text-slate-500"></i>
                </div>
                <a class="notification sm:hidden" href=""> <i data-lucide="search" class="notification__icon dark:text-slate-500"></i> </a>
                <div class="search-result">
                </div>
            </div>
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
        <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
            <h2 class="text-lg font-medium mr-auto">
                Edit Posts
            </h2>
            <form method="post" action="{{route('editpostsave')}}" enctype="multipart/form-data">
            @csrf
            <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
                <div class="dropdown">
                    <button type="reset" class=" btn btn-primary shadow-md flex items-center">Reset</button>
                </div>
                <div class="dropdown">
                    <button type="submit" class=" btn btn-primary shadow-md flex items-center" aria-expanded="false" > Edit</i> </button>
                </div>

            </div>
        </div>

        <div class="pos intro-y grid grid-cols-12 gap-5 mt-5">
            <!-- BEGIN: Post Content -->
            <div class="intro-y col-span-12 lg:col-span-8">
                <div class="post intro-y overflow-hidden box mt-5">
                    <ul class="post__tabs nav nav-tabs flex-col sm:flex-row bg-slate-200 dark:bg-darkmode-800" role="tablist">
                        <li class="nav-item">
                            <button title="Fill in the article content" data-tw-toggle="tab" data-tw-target="" class="nav-link tooltip w-full sm:w-40 py-4 active"
                                    id="content-tab" role="tab" aria-controls="content" aria-selected="true">
                                <i data-lucide="file-text" class="w-4 h-4 mr-2"></i> Posts </button>
                        </li>

                    </ul>

    </div>
                @foreach($posts as $p)
                <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md p-5 mt-5">
                    <input type="hidden" name="postid" value="{{$p->id}}">
                <div>
                    <label for="vertical-form-1" class="form-label">Title</label>
                    <input id="vertical-form-1" type="text" class="form-control" name="title" placeholder="{{$p->title}}">
                </div>
                <div> <label for="vertical-form-1" class="form-label">Location</label>
                    <input id="vertical-form-1" type="text" class="form-control" name="location" placeholder="{{$p->location}}">
                </div>
                <div> <label for="vertical-form-1" class="form-label">Description</label>
                    <input id="vertical-form-1" type="text" class="form-control" name="description" placeholder="{{$p->description}}">
                </div>
                <div class="mt-3">
                    <label class="form-label">Upload Image</label>
                    <div class="border-2 border-dashed dark:border-darkmode-400 rounded-md pt-4">
                        <div class="fallback">
                            <input name="picture" type="text" >
                        </div>
                        <div class="dz-message" data-dz-message>
                            <div class="text-lg font-medium">Drop files here or click to upload.</div>
                        </div>
                    </div>
                    <label class="form-label">Current Image</label>
                    <img src="/{{$p->picture}}">

                </div>
                </div>
                @endforeach
            </div>

    </div>
    <!-- END: Top Bar -->
    </div>


@endsection
