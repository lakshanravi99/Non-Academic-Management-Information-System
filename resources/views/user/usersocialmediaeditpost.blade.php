
@extends('user.user_master')
@section('user')



    <div class="content">
        <!-- BEGIN: Top Bar -->
        <div class="top-bar">
            <!-- BEGIN: Breadcrumb -->
            <nav aria-label="breadcrumb" class="-intro-x mr-auto hidden sm:flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('social')}}">Timeline</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Posts</li>
                </ol>
            </nav>
            <!-- END: Breadcrumb -->
            <!-- BEGIN: Search -->
            <!-- END: Search -->
            <script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script>
            <a href="{{route('darmodeon')}}">
                <span class="iconify-inline mr-4" data-icon="emojione-monotone:{{session('lightmodeicon')}}" style="color: {{session('lightmodeiconcolor')}};" data-width="24" data-height="24"></span>
            </a>
            <!-- BEGIN: Notifications -->
            <div class="intro-x dropdown mr-auto sm:mr-6">
                <div class="dropdown-toggle notification notification--bullet cursor-pointer" role="button" aria-expanded="false" data-tw-toggle="dropdown"> <i data-lucide="bell" class="notification__icon dark:text-slate-500"></i> </div>
                <div class="notification-content pt-2 dropdown-menu">
                    <div class="notification-content__box dropdown-content">
                        <div class="notification-content__title">Notifications</div>
                        <div class="overflow-auto p-3 mb-3 mb-md-0 mr-md-3 bg-light" style="max-width: 660px; max-height: 200px;">
                            @foreach($notifi as $n)
                                <strong>
                                    <div class="cursor-pointer relative flex items-center ">
                                        <div class="w-12 h-12 flex-none image-fit mr-1">
                                            <img alt="" class="rounded-full" src="/{{$n->pic_people}}">
                                            <div class="w-3 h-3 bg-success absolute right-0 bottom-0 rounded-full border-2 border-white dark:border-darkmode-600"></div>
                                        </div>
                                        <div class="ml-2 overflow-hidden ">
                                            <div class="flex items-center">
                                                <a href="javascript:;" class="font-medium truncate mr-5">{{$n->did_people}}</a>
                                                <div class="text-xs text-slate-400 ml-auto whitespace-nowrap">{{ \Carbon\Carbon::parse($n->created_at)->diffForHumans() }}</div>
                                            </div>
                                            <div class="w-full truncate text-slate-500 mt-0.5">{{$n->text}}</div>
                                        </div>
                                    </div>
                                </strong>
                            @endforeach
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END: Notifications -->
            <!-- BEGIN: Account Menu -->
            <div class="intro-x dropdown w-8 h-8">
                <div class="dropdown-toggle w-8 h-8 rounded-full overflow-hidden shadow-lg image-fit zoom-in" role="button" aria-expanded="false" data-tw-toggle="dropdown">
                    <img alt="" src="/{{session('socpropic')}}">
                </div>
                <div class="dropdown-menu w-56">
                    <ul class="dropdown-content bg-primary text-white">
                        <li class="p-2">
                            <div class="font-medium">{{session('socusername')}}</div>
                            {{--                            <div class="text-xs text-white/70 mt-0.5 dark:text-slate-500">bio</div>--}}
                        </li>
                        <li>
                            <hr class="dropdown-divider border-white/[0.08]">
                        </li>
                        <li>
                            <a href="{{route('socialmediaprofile')}}" class="dropdown-item hover:bg-white/5"> <i data-lucide="user" class="w-4 h-4 mr-2"></i> Profile </a>
                        </li>

                        <li>
                            <a href="" class="dropdown-item hover:bg-white/5"> <i data-lucide="help-circle" class="w-4 h-4 mr-2"></i> Help </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider border-white/[0.08]">
                        </li>
                        <li>
                            <a href="{{route('logout')}}" class="dropdown-item hover:bg-white/5"> <i data-lucide="toggle-right" class="w-4 h-4 mr-2"></i> Logout </a>
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
            <form method="post" action="{{route('editpostsavebyuser')}}" enctype="multipart/form-data">
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
                            <input id="vertical-form-1" type="text" class="form-control" name="title" placeholder="{{$p->title}}" required>
                        </div>
                        <div> <label for="vertical-form-1" class="form-label">Location</label>
                            <input id="vertical-form-1" type="text" class="form-control" name="location" placeholder="{{$p->location}}" required>
                        </div>
                        <div> <label for="vertical-form-1" class="form-label">Description</label>
                            <input id="vertical-form-1" type="text" class="form-control" name="description" placeholder="{{$p->description}}" required>
                        </div>
                        <div class="mt-3">
                            <label class="form-label">Upload Image</label>
                            <div class="border-2 border-dashed dark:border-darkmode-400 rounded-md pt-4">
                                <div class="fallback">
                                    <input name="picture" type="file"  onchange="readURL(this);">
                                </div>
                                <div class="dz-message" data-dz-message>
                                    <div class="text-lg font-medium">Drop files here or click to upload.</div>
                                </div>
                            </div>
                            <script>
                                function readURL(input) {
                                    document.querySelector("#blah").style.display = "block";
                                    if (input.files && input.files[0]) {
                                        var reader = new FileReader();

                                        reader.onload = function (e) {
                                            $('#blah')
                                                .attr('src', e.target.result)
                                                .width(150)
                                                .height(200);
                                        };

                                        reader.readAsDataURL(input.files[0]);
                                    }
                                }
                            </script>
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
