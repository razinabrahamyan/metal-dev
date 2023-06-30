<style>
    #pagination_links ul {
        -ms-flex-pack:center!important;
        justify-content:center!important;
        margin-top: 1.5rem !important;
    }
</style>
@extends('admin.layouts.app')
@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-left mb-0">Blog List</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Home</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">Pages</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">Blog</a>
                                    </li>
                                    <li class="breadcrumb-item active">List
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
                    <div class="form-group breadcrumb-right">
                        <div class="dropdown">
                            <button class="btn-icon btn btn-primary btn-round btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i data-feather="grid"></i></button>
                            <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="app-todo.html"><i class="mr-1" data-feather="check-square"></i><span class="align-middle">Todo</span></a><a class="dropdown-item" href="app-chat.html"><i class="mr-1" data-feather="message-square"></i><span class="align-middle">Chat</span></a><a class="dropdown-item" href="app-email.html"><i class="mr-1" data-feather="mail"></i><span class="align-middle">Email</span></a><a class="dropdown-item" href="app-calendar.html"><i class="mr-1" data-feather="calendar"></i><span class="align-middle">Calendar</span></a></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-detached content-left">
                <div class="content-body">
                    <!-- Blog List -->
                    <div class="blog-list-wrapper">
                        <!-- Blog List Items -->
                        <div class="row">
                            @forelse($posts as $post)
                                <div class="col-md-4 col-12">
                                    <div class="card">
                                        <a href="{{route('posts-moderation.show', $post->id)}}">
                                            <img class="card-img-top img-fluid" src="{{asset('admin/app-assets/images/slider/0'.$loop->iteration.'.jpg')}}" alt="Blog Post pic" />
                                        </a>
                                         <div class="card-body">
                                            <h4 class="card-title">
                                                <a href="{{route('posts-moderation.show', $post->id)}}" class="blog-title-truncate text-body-heading">
                                                   {{$post->title}}
                                                </a>
                                            </h4>
                                            <div class="media">
                                                <div class="avatar mr-50">
                                                    <img src="{{asset('admin/app-assets/images/slider/02.jpg')}}" alt="Avatar" width="24" height="24" />
                                                </div>
                                                <div class="media-body">
                                                    <small class="text-muted mr-25">by</small>
                                                    <small>
                                                        <a href="javascript:void(0);" class="text-body">
                                                            {{$post->creator['full_name']['first_name']}} {{$post->creator['full_name']['last_name']}}
                                                        </a></small>
                                                    <span class="text-muted ml-50 mr-25">|</span>
                                                    <small class="text-muted">{{\Carbon\Carbon::parse($post->created_at)->format('M d, Y')}}</small>
                                                </div>
                                            </div>
                                            <div class="my-1 py-25">
                                                <a href="javascript:void(0);">
                                                    <div class="badge badge-pill badge-light-info mr-50">Quote</div>
                                                </a>
                                                <a href="javascript:void(0);">
                                                    <div class="badge badge-pill badge-light-primary">Fashion</div>
                                                </a>
                                            </div>
                                            <p class="card-text blog-content-truncate">
                                                {{\Str::limit($post->description, $limit = 130, $end = '...') }}
                                            </p>
                                            <hr />
                                             <div class="card-text blog-content-truncate">
                                                 @foreach($post->statuses as $status)
                                                     <span class="p-1 badge badge-light-{{$status->color}}">
                                                        {{  $status->ru_name }}
                                                     </span>
                                                 @endforeach
                                                 <hr>
                                             </div>
                                             <div class="card-text blog-content-truncate">
                                                 <a href="{{route('posts-moderation.edit', $post->id)}}">
                                                     <div class="d-flex align-items-center">
                                                         <div class="mr-75 avatar bg-light-primary rounded">
                                                             <div class="avatar-content">
                                                                 <i data-feather="edit-3" class="avatar-icon font-medium-1"></i>
                                                             </div>
                                                         </div>
                                                         <span class="blog-category-title text-body">
                                                                Редактировать
                                                         </span>
                                                     </div>
                                                 </a>
                                             </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="col-md-12 col-12 d-flex justify-content-center">
                                        <p class="font-weight-bold font-large-1">Нет результатов ...</p>
                                </div>
                            @endforelse
                        </div>
                        <!--/ Blog List Items -->

                        <!-- Pagination -->
                        <div class="row">
                            <div class="col-12">
                                <nav aria-label="Page navigation" id="pagination_links">
                                        {{$posts->links()}}
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <!--/ Pagination -->
                    </div>
                    <!--/ Blog List -->

                </div>
            </div>
            <div class="sidebar-detached sidebar-right">
                <div class="sidebar">
                    <div class="blog-sidebar my-2 my-lg-0">
                        <!-- Search bar -->
                        <div class="blog-search">
                            <div class="input-group input-group-merge">
                                <input type="text" class="form-control" placeholder="Search here" />
                                <div class="input-group-append">
                                    <span class="input-group-text cursor-pointer">
                                        <i data-feather="search"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <!--/ Search bar -->

                        <!-- Categories -->
                        <div class="blog-categories mt-3">
                            <h6 class="section-label">Categories</h6>
                            <div class="mt-1">
                                @foreach($statuses as $status)
                                    <div class="d-flex justify-content-start align-items-center mb-75">
                                        <a href="{{route('moderate.posts.index', $status->id)}}">
                                            <div class="mr-75 avatar bg-light-{{$status->color}} rounded">
                                                <div class="avatar-content">
                                                    <i data-feather="{{$status->feather}}" class="avatar-icon font-medium-1"></i>
                                                </div>
                                            </div>
                                            <span class="blog-category-title text-body">
                                                {{$status->ru_name}}
                                            </span>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <!--/ Categories -->
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- END: Content-->
@endsection

@push('styles')
    <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/css/pages/page-blog.css')}}">
@endpush
