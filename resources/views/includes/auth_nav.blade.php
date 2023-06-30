<div class="dropdown dashboard-option">
    <a class="dropdown-toggle" role="button" data-toggle="dropdown" aria-expanded="false">
        <img src="{{asset(\App\Classes\Helpers\UserHelper::getAuthAvatar())}}" alt="avatar" class="thumb user-avatar">
        <span class="name">{{\App\Classes\Helpers\UserHelper::getUserFullName()}}</span>
    </a>
    <div class="dropdown-menu dash_links">
        <a class="dropdown-item" href="{{route('profile.dashboard')}}">
            <i class="fas fa-home wdp-20"></i> Личный Кабинет
        </a>
        <a class="dropdown-item" href="{{route('profile.profile')}}">
            <i class="far fa-user-circle wdp-20"></i> Профиль
        </a>
        <a class="dropdown-item" href="{{route('profile.leads')}}">
            <i class="fas fa-clipboard-check wdp-20"></i>Заявки
        </a>
        <a class="dropdown-item" href="{{route('profile.services')}}">
            <i class="fas fa-briefcase wdp-20"></i> Услуги
        </a>
        <form action="{{route('logout')}}" method="post">
            @csrf
            <button class="dropdown-item logout_button" type="submit">
                <i class="fas fa-sign-out-alt wdp-20"></i> Выйти
            </button>
        </form>
    </div>
</div>
<script>
    $(document).ready(function (){
        $('.dash_links .dropdown-item').each(function (index,value){
            if(window.location.href === $(value).attr('href')){
                $(value).addClass('active')
            }
        })
    })
</script>

