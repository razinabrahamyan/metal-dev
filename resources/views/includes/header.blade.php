<header class="main-header alternate">

    <!-- Main box -->
    <div class="main-box">
        <div class="logo-box">
            <div class="logo"><a href="{{route('guest.home')}}"><img src="{{asset('images/logo-2.png')}}" alt="" title=""></a></div>

            <!-- Search Box -->
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
                        <span>Услуги</span>
                        <ul>
                            <li><a href="{{route('services.index')}}">Все Услуги</a></li>

                        </ul>
                    </li>
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

            <div class="outer-box main-menu right_aligned">
                <!-- Add Listing -->
                <a href="{{route('posts.create')}}" class="add-listing"> <span class="flaticon-plus-symbol"></span> Добавить Обьявление</a>

                @auth()
                    <div class="cart-btn">
                        <a role="button"> <svg xmlns="http://www.w3.org/2000/svg" width="24.2" height="26.609" viewBox="0 0 19.76 21.729">
                                <g id="Icon_feather-bell" data-name="Icon feather-bell" transform="translate(1 1)">
                                    <path id="Path_6714" data-name="Path 6714" d="M19.3,8.63A5.781,5.781,0,0,0,13.38,3,5.781,5.781,0,0,0,7.46,8.63c0,6.569-2.96,8.446-2.96,8.446H22.26S19.3,15.2,19.3,8.63" transform="translate(-4.5 -3)" fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                                    <path id="Path_6715" data-name="Path 6715" d="M19.32,31.5a2.263,2.263,0,0,1-3.915,0" transform="translate(-8.483 -12.898)" fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                                </g>
                            </svg> <span class="count">{{auth()->user()->unreadNotifications->count()}}</span></a>

                        <div class="notification_board">
                            <ul class="notification_items">
                                @forelse(auth()->user()->unreadNotifications as $notification)
                                    <li class="cart-item">
                                        <img src="{{asset($notification->data['data']['avatar'])}}" alt="" class="thumb" />
                                        <span class="item-name">Новая Заявка</span>
                                        <span class="item-quantity">{{$notification->data['data']['title']}}</span>
                                        <a href="{{route('profile.leads')}}" class="product-detail"></a>
                                    </li>
                                @empty
                                    no
                                @endforelse
                            </ul>

                        </div> <!--end shopping-cart -->
                    </div>

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
{{--                <!-- Search Btn -->--}}
{{--                <div class="search-box">--}}
{{--                    <button class="search-btn mobile-search-btn"><i class="flaticon-magnifying-glass"></i></button>--}}
{{--                </div>--}}

                <!-- Cart btn -->

                <!-- Login/Register -->
                <div class="login-box">
                    @auth()
                        <a  href="{{route('profile.dashboard')}}"><span class="flaticon-user"></span></a>
                    @endauth
                    @guest()
                        <a role="button" data-target="#login_modal" data-toggle="custom_modal"><span class="flaticon-user"></span></a>
                    @endguest

                </div>
                <a href="#nav-mobile" class="mobile-nav-toggler navbar-trigger"><span class="fa fa-bars"></span></a>
                <button id="toggle-user-sidebar">
                    <img src="{{asset(\App\Classes\Helpers\UserHelper::getAuthAvatar())}}" alt="avatar" class="thumb">
                </button>
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
