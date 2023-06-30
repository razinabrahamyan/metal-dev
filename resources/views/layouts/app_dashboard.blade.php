<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Listdo | Just another HTML Template | Dashboard </title>

    <!-- Stylesheets -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <link href="{{asset('css/responsive.css')}}" rel="stylesheet">

    <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">
    <link rel="icon" href="images/favicon.png" type="image/x-icon">

    <!-- Responsive -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script><![endif]-->
    <script src="{{asset('js/respond.js')}}"></script>
    <link href="{{asset('user_assets/css/style.css')}}" rel="stylesheet">
    <script src="{{asset('js/jquery.js')}}"></script>
</head>

<body>

<div class="page-wrapper dashboard">

    <!-- Preloader -->
    <div class="preloader"></div>

    <!-- Header Span -->
    <span class="header-span"></span>

    <!-- Main Header-->
    <header class="main-header alternate fixed">

        <!-- Main box -->
        <div class="main-box">
            <div class="logo-box">
                <div class="logo"><a href="{{route('guest.home')}}"><img src="{{asset('images/logo.png')}}" alt="" title=""></a></div>

                <!-- Search Btn -->
                <div class="search-box">
                    <!-- Search Backdrop -->
                    <div class="search-backdrop"></div>

                    <div class="header-search-form">
                        <input type="text" name="header-search" id="cusom-search" data-list=".search-list" placeholder="What are you looking for?">
                        <span class="search-btn"><i class="flaticon-magnifying-glass"></i></span>
                    </div>

                    <div class="search-list">
                        <div class="search-item region">
                            <i class="icon flaticon-placeholder"></i>
                            <div class="text">City Of London </div>
                            <span class="cat">Region</span>
                            <a href="listing-single.html" class="overlay-link"></a>
                        </div>
                        <div class="search-item region">
                            <i class="icon flaticon-placeholder"></i>
                            <div class="text">City of Westminster </div>
                            <span class="cat">Region</span>
                            <a href="listing-single.html" class="overlay-link"></a>
                        </div>
                        <div class="search-item region">
                            <i class="icon flaticon-placeholder"></i>
                            <div class="text">Chelsea District </div>
                            <span class="cat">Region</span>
                            <a href="listing-single.html" class="overlay-link"></a>
                        </div>
                        <div class="search-item listing">
                            <i class="icon flaticon-placeholder"></i>
                            <div class="text">Top Picks </div>
                            <span class="cat">Featured Listings</span>
                            <a href="listing-single.html" class="overlay-link"></a>
                        </div>
                        <div class="search-item shopping">
                            <i class="icon flaticon-placeholder"></i>
                            <div class="text">Shopping </div>
                            <span class="cat">Category</span>
                            <a href="listing-single.html" class="overlay-link"></a>
                        </div>
                        <div class="search-item food">
                            <i class="icon flaticon-placeholder"></i>
                            <div class="text">Local Food </div>
                            <span class="cat">Category</span>
                            <a href="listing-single.html" class="overlay-link"></a>
                        </div>
                        <div class="search-item prize">
                            <i class="icon flaticon-placeholder"></i>
                            <div class="text">Free Entrance </div>
                            <span class="cat">Tag</span>
                            <a href="listing-single.html" class="overlay-link"></a>
                        </div>
                    </div>
                </div>
            </div>

            <!--Nav Box-->
            <div class="nav-outer">
                <nav class="nav main-menu">
                    <ul class="navigation" id="navbar">
                        <li class="dropdown">
                            <span>Обьявления</span>
                            <ul>
                                <li><a href="{{route('posts.index')}}">Все Обьявления</a></li>
                                <li><a href="{{route('posts.create')}}">Добавить Новое</a></li>
                                <li><a href="{{route('map.posts')}}">Показать на карте</a></li>

                            </ul>
                        </li>

                        <li class="mm-add-listing"><a href="{{route('posts.create')}}" class="theme-btn btn-style-three"><span class="flaticon-plus-symbol"></span>Добавить Обьявление</a></li>
                    </ul>
                </nav>
                <!-- Main Menu End-->

                <div class="outer-box">
                    <!-- Add Listing -->
                    <a href="{{route('posts.create')}}" class="add-listing"> <span class="flaticon-plus-symbol"></span> Добавить Обьявление</a>

                    <!-- Cart btn -->

                    <!-- Dashboard Option -->
                    @auth()

                        @include('includes.auth_nav')

                    @endauth
                    @guest()
                        <div class="login-box">
                            <span class="flaticon-user"></span>
                            <a role="button" data-target="#login_modal" data-toggle="custom_modal">Login</a> or
                            <a role="button" data-target="#register_modal" data-toggle="custom_modal">Register </a>
                        </div>
                    @endguest
                </div>
            </div>
        </div>

        <!-- Mobile Header -->
        <div class="mobile-header">
            <div class="logo"><a href="{{route('guest.home')}}><img src="{{asset('images/logo.png')}}" alt="" title=""></a></div>

            <!--Nav Box-->
            <div class="nav-outer clearfix">

                <div class="outer-box">
                    <!-- Search Btn -->
                    <div class="search-box">
                        <button class="search-btn mobile-search-btn"><i class="flaticon-magnifying-glass"></i></button>
                    </div>

                    <!-- Cart btn -->

                    <button id="toggle-user-sidebar"><img src="images/resource/user-img.jpg" alt="avatar" class="thumb"></button>

                    <a href="#nav-mobile" class="mobile-nav-toggler navbar-trigger"><span class="fa fa-bars"></span></a>
                </div>
            </div>
        </div>

        <!-- Mobile Nav -->
        <div id="nav-mobile"></div>

        <!-- Header Search -->
        <div class="search-popup">
            <span class="search-back-drop"></span>

            <div class="search-inner">
                <button class="close-search"><span class="fa fa-times"></span></button>
                <form method="post" action="blog-showcase.html">
                    <div class="form-group">
                        <input type="search" name="search-field" value="" placeholder="Search..." required="">
                        <button type="submit"><i class="flaticon-magnifying-glass"></i></button>
                    </div>
                </form>
            </div>
        </div>
        <!-- End Header Search -->

    </header>
    <!--End Main Header -->

    <!-- Sidebar Backdrop -->
    <div class="sidebar-backdrop"></div>

    <!-- User Sidebar -->
     @include('includes/profile_sidebar')
    <!-- End User Sidebar -->

    <!-- Dashboard -->
    <section class="user-dashboard">
        <div class="dashboard-outer">
            @yield('content')
        </div>
    </section>
    <!-- End Dashboard -->

</div><!-- End Page Wrapper -->

{{--Vue js and Axios--}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.18/vue.min.js"></script>
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.js"></script>--}}
<script type="text/javascript" src="{{asset('js/library/vue/profile.js')}}"></script>
{{--End Vue js and Axios--}}

<script src="{{asset('js/popper.min.js')}}"></script>
<script src="{{asset('js/chosen.min.js')}}"></script>
<script src="{{asset('js/jquery-ui.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/jquery.fancybox.js')}}"></script>
<script src="{{asset('js/jquery.modal.min.js')}}"></script>
<script src="{{asset('js/jquery.hideseek.min.js')}}"></script>
<script src="{{asset('js/mmenu.polyfills.js')}}"></script>
<script src="{{asset('js/mmenu.js')}}"></script>
<script src="{{asset('js/owl.js')}}"></script>
<script src="{{asset('js/wow.js')}}"></script>
<script src="{{asset('js/appear.js')}}"></script>
<script src="{{asset('js/script.js')}}"></script>
<script src="{{asset('user_assets/js/app.js')}}"></script>

{{--Chart js--}}
<script src="{{asset('js/chart.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/library/js/chart.js')}}"></script>
{{--End Chart js--}}

</body>
</html>


