<div class="user-sidebar">

    <div class="sidebar-inner">
        <div class="sidebar-header">
            <div class="user-box">
                <figure class="user-image">
                    <img src="{{asset('storage/user/images/avatar/'.auth()->user()->avatar)}}" alt="">
                </figure>
                <h4 class="user-name">{{auth()->user()->full_name['first_name'].' '.auth()->user()->full_name['last_name']}}</h4>
            </div>
        </div>

        <ul class="navigation" id="profile_navigate">
            <li :class="{active: current.includes('dashboard')}"><a href="{{route('profile.dashboard')}}"> <i class="la la-home"></i>Личный Кабинет</a></li>
            <li :class="{active: current.includes('profile')}"><a href="{{route('profile.profile')}}"><i class="la la-user"></i>Профиль</a></li>
            <li :class="{active: current.includes('leads')}"><a href="{{route('profile.leads')}}"><i class="la la-user"></i>Заявки</a></li>
<!--            <li><a href="#"><i class="la la-layer-group"></i>Listings</a></li>
            <li><a href="#"><i class="la la-envelope"></i> Messages </a></li>
            <li><a href="#"><i class="la la-calendar"></i> Reviews</a></li>
            <li><a href="#"><i class="la la-thumbs-o-up"></i>Favorites</a></li>
            <li><a href="index.html"><i class="la la-sign-out"></i>Logout</a></li>-->
        </ul>
    </div>
</div>


