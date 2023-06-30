@extends('admin.layouts.app')
@section('content')
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-left mb-0">Blog Edit</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Home</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">Pages</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">Blog</a>
                                    </li>
                                    <li class="breadcrumb-item active">Edit
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
            <div class="content-body" id="post_form"><!-- Blog Edit -->
                <div class="blog-edit-wrapper">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="media">
                                        <div class="avatar mr-75">
                                            <img src="../../../app-assets/images/portrait/small/avatar-s-9.jpg" width="38" height="38" alt="Avatar" />
                                        </div>
                                        <div class="media-body">
                                            <h6 class="mb-25">Chad Alexander</h6>
                                            <p class="card-text">May 24, 2020</p>
                                            @foreach($post->statuses as $status)
                                                <span class="p-1 badge badge-light-{{$status->color}}"> {{  $status->ru_name }}</span>
                                            @endforeach
                                        </div>
                                    </div>
                                    <!-- Form -->
                                    <form ref="form" action="{{route('posts-moderation.update', $post->id)}}" method="post" class="mt-2">
                                        @csrf
                                        @method('PUT')
                                    </form>
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mb-2">
                                                <label for="blog-edit-title">Title</label>
                                                <input
                                                    type="text"
                                                    id="blog-edit-title"
                                                    class="form-control"
                                                    value="{{$post->title}}"
                                                />
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mb-2">
                                                <label for="blog-edit-category">Category</label>
                                                <select id="blog-edit-category" class="select2 form-control" multiple>
                                                    <option value="Fashion" selected>Fashion</option>
                                                    <option value="Food">Food</option>
                                                    <option value="Gaming" selected>Gaming</option>
                                                    <option value="Quote">Quote</option>
                                                    <option value="Video">Video</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mb-2">
                                                <label for="blog-edit-slug">Slug</label>
                                                <input
                                                    type="text"
                                                    id="blog-edit-slug"
                                                    class="form-control"
                                                    value="the-best-features-coming-to-ios-and-web-design"
                                                />
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mb-2">
                                                <label for="blog-edit-status">Status</label>
                                                <select class="form-control" id="blog-edit-status">
                                                    <option value="Published">Published</option>
                                                    <option value="Pending">Pending</option>
                                                    <option value="Draft">Draft</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 mb-5">
                                            <div class="form-group mb-2">
                                                <label>Content</label>
                                            </div>
                                        </div>
                                        <div class="col-12 mt-5">
                                            <div class="content-body">
                                                <!-- Blog List -->
                                                <div class="blog-list-wrapper">
                                                    <!-- Blog List Items -->
                                                    <div class="row" id="lightgallery">
                                                        <transition name="fade">
                                                            <div  class="col-md-2 col-12" data-src="{{asset('admin/app-assets/images/slider/03.jpg')}}">
                                                                <div class="card">
                                                                    <a href="{{asset('admin/app-assets/images/slider/03.jpg')}}">
                                                                        <img class="card-img-top img-fluid" src="{{asset('admin/app-assets/images/slider/03.jpg')}}" alt=""/>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </transition>
                                                        <div class="col-md-2 col-12" data-src="{{asset('admin/app-assets/images/slider/03.jpg')}}">
                                                            <div class="card">
                                                                <a href="{{asset('admin/app-assets/images/slider/03.jpg')}}">
                                                                    <img class="card-img-top img-fluid" src="{{asset('admin/app-assets/images/slider/03.jpg')}}" alt=""/>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--/ Bl og List -->
                                            </div>
                                        </div>
                                        <div class="col-12 d-flex justify-content-sm-start justify-content-center mt-50">
                                            @if($post->statuses->contains('name', 'published'))
                                                <span class="p-1 badge badge-light-success">
                                                    Данное объявление опубликовано
                                                </span>
                                            @elseif($post->statuses->contains('name', 'denied'))
                                                <span class="p-1 badge badge-light-danger">
                                                    Данное объявление отклонено
                                                </span>
                                            @else
                                                <button type="button" @click="openConfirmation" class="btn btn-primary mr-1">Опубликовать</button>
                                                <button type="reset" @click="openDeniedModal" class="btn btn-danger">Отклонить</button>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-inline-block">
                    <div
                        class="modal fade text-left modal-primary"
                        id="primaryModal"
                        ref="myModal"
                        tabindex="-1"
                        role="dialog"
                        aria-labelledby="myModalLabel160"
                        aria-hidden="true"
                    >
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="myModalLabel160">Подтверждение публикации</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body text-center">
                                    Нажимая кнопку "Да" вы подтверждаете публикацию данного объявления.
                                    Статус изменится с "В ожидании" на "Опубликовано"
                                </div>
                                <div class="modal-footer">
                                    <button type="button" @click="submitForm" class="btn btn-outline-primary" data-dismiss="modal">Да</button>
                                    <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Нет</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-inline-block">
                    <div
                        class="modal fade text-left modal-primary"
                        id="deniedModal"
                        ref="myModal"
                        tabindex="-1"
                        role="dialog"
                        aria-labelledby="myModalLabel160"
                        aria-hidden="true"
                    >
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="myModalLabel160">Отмена публикации</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body text-center">
                                    <section class="horizontal-wizard">
                                        <div class="bs-stepper horizontal-wizard-example" style="box-shadow: none">
                                            <div class="bs-stepper-header">
                                                <div class="step" data-target="#account-details">
                                                    <button type="button" class="step-trigger">
                                                        <span class="bs-stepper-box">1</span>
                                                        <span class="bs-stepper-label">
                                                            <span class="bs-stepper-title">Причины отмены</span>
                                                            <span class="bs-stepper-subtitle">Setup Account Details</span>
                                                        </span>
                                                    </button>
                                                </div>
                                                <div class="line">
                                                    <i data-feather="chevron-right" class="font-medium-2"></i>
                                                </div>
                                                <div class="step" data-target="#social-links">
                                                    <button type="button" class="step-trigger">
                                                        <span class="bs-stepper-box">2</span>
                                                        <span class="bs-stepper-label">
                                                            <span class="bs-stepper-title">Подтвердить</span>
                                                            <span class="bs-stepper-subtitle">Add Social Links</span>
                                                        </span>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="bs-stepper-content">
                                                <div id="account-details" class="content">
                                                    <div class="content-header">
                                                        <h5 class="mb-0">Выбор причин</h5>
                                                        <small class="text-muted">Вы можете выбрать одну или больше причин</small>
                                                    </div>
                                                    <form ref="deniedForm" action="{{route('posts-moderation.deny', $post->id)}}" method="post" class="mb-5">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="row justify-content-center">
                                                            <div class="form-group col-md-10">
                                                                <select ref="selected_values" id="reason-category" class="select2 form-control" name="reasons[]" multiple>
                                                                    @foreach($reasons as $reason)
                                                                        <option value="{{$reason->id}}">{{$reason->title}}</option>
                                                                    @endforeach
                                                                </select>
                                                                <div v-if="reason_count === 0" class="text-danger">
                                                                    <small>Это поле обязательно к заполнению</small>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                    <hr>
                                                    <div class="d-flex justify-content-between mt-2">
                                                        <button class="btn btn-outline-secondary btn-prev" disabled>
                                                            <i data-feather="arrow-left" class="align-middle mr-sm-25 mr-0"></i>
                                                            <span class="align-middle d-sm-inline-block d-none">Предыдущий</span>
                                                        </button>
                                                        <button class="btn btn-primary btn-next-reason"  @click="checkSelectValue">
                                                            <span class="align-middle d-sm-inline-block d-none">Следующий</span>
                                                            <i data-feather="arrow-right" class="align-middle ml-sm-25 ml-0"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div id="social-links" class="content">
                                                    <div class="content-header mb-5">
                                                        <span>
                                                            Нажимая кнопку "Подтвердить"
                                                            вы подтверждаете ОТМЕНУ публикации. Статус изменится с
                                                            <span class="text-warning">"В ожидании"</span> на
                                                            <span class="text-danger">"Отклонено"</span>
                                                        </span>
                                                    </div>
                                                    <hr>
                                                    <div class="d-flex justify-content-between mt-2">
                                                        <button class="btn btn-primary btn-prev">
                                                            <i data-feather="arrow-left" class="align-middle mr-sm-25 mr-0"></i>
                                                            <span class="align-middle d-sm-inline-block d-none">Предыдущий</span>
                                                        </button>
                                                        <button class="btn btn-outline-success" @click="submitDeniedForm">Подтвердить</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/vendors/css/vendors.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/vendors/css/forms/select/select2.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/css/core/menu/menu-types/horizontal-menu.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/css/pages/page-blog.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/app-assets/lightgallery/css/lightgallery.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/css/plugins/forms/form-wizard.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/vendors/css/forms/wizard/bs-stepper.min.css')}}">
@endpush

@push('scripts')
    <script src="{{asset('admin/app-assets/vendors/js/ui/jquery.sticky.js')}}"></script>
    <script src="{{asset('admin/app-assets/vendors/js/forms/select/select2.full.min.js')}}"></script>
    <script src="{{asset('admin/app-assets/js/core/app-menu.min.js')}}"></script>
    <script src="{{asset('admin/app-assets/js/core/app.min.js')}}"></script>
    <script src="{{asset('admin/app-assets/js/scripts/customizer.min.js')}}"></script>
    <script src="{{asset('admin/app-assets/lightgallery/js/lightgallery.min.js')}}"></script>
    <script src="{{asset('admin/app-assets/vendors/js/forms/wizard/bs-stepper.min.js')}}"></script>
    <script src="{{asset('admin/app-assets/vendors/js/forms/validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('admin/app-assets/js/scripts/forms/form-wizard.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/picturefill/2.3.1/picturefill.min.js"></script>
    <script src="https://cdn.rawgit.com/sachinchoolur/lightgallery.js/master/dist/js/lightgallery.js"></script>
    <script src="https://cdn.rawgit.com/sachinchoolur/lg-pager.js/master/dist/lg-pager.js"></script>
    <script src="https://cdn.rawgit.com/sachinchoolur/lg-autoplay.js/master/dist/lg-autoplay.js"></script>
    <script src="https://cdn.rawgit.com/sachinchoolur/lg-fullscreen.js/master/dist/lg-fullscreen.js"></script>
    <script src="https://cdn.rawgit.com/sachinchoolur/lg-zoom.js/master/dist/lg-zoom.js"></script>
    <script src="https://cdn.rawgit.com/sachinchoolur/lg-hash.js/master/dist/lg-hash.js"></script>
    <script src="https://cdn.rawgit.com/sachinchoolur/lg-share.js/master/dist/lg-share.js"></script>

    <script>

        new Vue({
            el: '#post_form',
            data: {
                reason_count: 1
            },
            methods : {
                openConfirmation() {
                    $('#primaryModal').modal('show')
                },
                openDeniedModal() {
                    $('#deniedModal').modal('show')
                },
                submitForm() {
                    this.$refs.form.submit()
                },
                submitDeniedForm() {
                    this.$refs.deniedForm.submit()
                },
                checkSelectValue(e) {
                    this.reason_count = this.$refs.selected_values.value.length
                    let horizontalWizard = document.querySelector('.horizontal-wizard-example')
                    let numberedStepper = new Stepper(horizontalWizard)
                    if (this.reason_count === 0) {
                        e.preventDefault();
                    }
                    else {
                        numberedStepper.next();

                    }
                }
            },
            mounted() {
              //
            }
        })

        lightGallery(document.getElementById('lightgallery'));
    </script>
@endpush

