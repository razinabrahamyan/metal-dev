<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Metal|Project</title>

    <!-- Stylesheets -->

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <link href="{{asset('css/responsive.css')}}" rel="stylesheet">
@stack('styles')


<!--    <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">
    <link rel="icon" href="images/favicon.png" type="image/x-icon">-->

    <!-- Responsive -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script>
    <script src="{{asset('js/respond.js')}}"></script>
    <link href="{{asset('user_assets/css/style.css')}}" rel="stylesheet">
    <script src="{{asset('js/jquery.js')}}"></script>
</head>

<body>

<div class="page-wrapper">

    <!-- Preloader -->
    <div class="preloader"></div>

    <!-- Main Header-->
    <span class="header-span"></span>
    @include('includes.header')
    <!--End Main Header -->

    @yield('content')


    @include('includes.footer')
    <!-- End Footer -->

</div><!-- End Page Wrapper -->
@include('includes.modals')

@if(session()->has('success'))
    <div class="success_box_handler">
        <div class="message-box success">
            <p>{{session()->get('success')}}</p>
            <button class="close-btn">
                <span class="close_icon"></span>
            </button>
        </div>
    </div>
@elseif(session()->has('error'))
    <div class="success_box_handler">
        <div class="message-box error">
            <p>{{session()->get('error')}}</p>
            <button class="close-btn">
                <span class="close_icon"></span>
            </button>
        </div>
    </div>
@else
    <input type="hidden" id="success" value="">
@endif

<script src="{{asset('js/app.js')}}"></script>
<script src="{{asset('js/popper.min.js')}}"></script>
<script src="{{asset('js/chosen.min.js')}}"></script>
<script src="{{asset('js/jquery-ui.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/jquery.fancybox.js')}}"></script>
<script src="{{asset('js/jquery.modal.min.js')}}"></script>
<script src="{{asset('js/jquery.hideseek.min.js')}}"></script>
<script src="{{asset('js/mmenu.polyfills.js')}}"></script>
<script src="{{asset('js/sticky_sidebar.min.js')}}"></script>
<script src="{{asset('js/mmenu.js')}}"></script>
<script src="{{asset('js/owl.js')}}"></script>
<script src="{{asset('js/wow.js')}}"></script>
<script src="{{asset('js/appear.js')}}"></script>
<script src="{{asset('js/script.js')}}"></script>
<script src="{{asset('js/jQuery.MultiFile.min.js')}}"></script>
<script src="{{asset('user_assets/js/app.js')}}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB2uu6KHbLc_y7fyAVA4dpqSVM4w9ZnnUw"></script>
<script src="{{asset('js/map-script.js')}}"></script>

<script src="{{asset('js/typed.js')}}"></script>
@stack('scripts')
<script>
  /*  var typed = new Typed('.typed-words', {
        strings: ["City Gems"," Restaurants"," Hotels"],
        typeSpeed: 80,
        backSpeed: 80,
        backDelay: 4000,
        startDelay: 1000,
        loop: true,
        showCursor: true
    });*/
</script>
</body>
</html>
