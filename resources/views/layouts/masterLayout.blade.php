<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Metal|Project</title>

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <link href="{{asset('css/responsive.css')}}" rel="stylesheet">
    @stack('styles')
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css" integrity="sha512-UTNP5BXLIptsaj5WdKFrkFov94lDx+eBvbKyoe1YAfjeRPC+gT5kyZ10kOHCfNZqEui1sxmqvodNUx3KbuYI/A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="{{asset('js/respond.js')}}"></script>
    <link href="{{asset('user_assets/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('user_assets/css/core.css')}}" rel="stylesheet">
    <script src="{{asset('js/jquery.js')}}"></script>
</head>
<body>

<div class="page-wrapper">
    <div class="preloader"></div>
    <span class="header-span"></span>

    @yield('content')

    @include('includes.modals')
    @include('includes.notifications.base_notificator')
</div>

@include('includes.scripts')
@stack('scripts')

</body>
</html>
