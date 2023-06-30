<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Metal|Project</title>

    <!-- Stylesheets -->
    <link href="{{asset('css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('css/responsive.css')}}" rel="stylesheet">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">

<!--    <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">
    <link rel="icon" href="images/favicon.png" type="image/x-icon">-->

    <!-- Responsive -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script><![endif]-->
    <script src="{{asset('js/respond.js')}}"></script>
    <link href="{{asset('user_assets/css/style.css')}}" rel="stylesheet">
    <script src="{{asset('js/jquery.js')}}"></script>
</head>

<body class="active-filters">

<div class="page-wrapper">

    <!-- Preloader -->
    <div class="preloader"></div>

    <!-- Header Span -->
    <span class="header-span"></span>

    <!-- Main Header-->
    @include('includes.header')
    <!--End Main Header -->

    <!-- Listing Section -->
    @yield('content')



</div><!-- End Page Wrapper -->
@include('includes.modals')
<script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU&amp;apikey=8c1ddd83-7c9c-4d9e-a532-9c67ea915ff8" type="text/javascript"></script>
<script src="{{asset('js/jquery.js')}}"></script>
<script src="{{asset('js/popper.min.js')}}"></script>
<script src="{{asset('js/chosen.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/jquery.fancybox.js')}}"></script>
<script src="{{asset('js/jquery.modal.min.js')}}"></script>
<script src="{{asset('js/jquery.hideseek.min.js')}}"></script>
<script src="{{asset('js/mmenu.polyfills.js')}}"></script>
<script src="{{asset('js/mmenu.js')}}"></script>
<script src="{{asset('js/appear.js')}}"></script>
<script src="{{asset('js/owl.js')}}"></script>
<script src="{{asset('js/wow.js')}}"></script>
<script src="{{asset('js/script.js')}}"></script>
<script src="{{asset('js/jQuery.MultiFile.min.js')}}"></script>
<script src="{{asset('user_assets/js/app.js')}}"></script>
<!-- Maps -->

<!--<script src="{{asset('js/infobox.min.js')}}"></script>-->
<script src="{{asset('js/markerclusterer.js')}}"></script>
<!--<script src="{{asset('js/maps.js')}}"></script>-->
@stack('scripts')

</body>
</html>


