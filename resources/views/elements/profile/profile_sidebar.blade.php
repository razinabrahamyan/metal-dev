<div class="user-sidebar">
    <div class="sidebar-inner">
        <div class="sidebar-header">
            <div class="user-box">
                <figure class="user-image">
                    <img src="{{asset(\App\Classes\Helpers\UserHelper::getAuthAvatar())}}" alt="avatar"
                         class="thumb user-avatar">
                </figure>
                <h4 class="user-name">{{\App\Classes\Helpers\UserHelper::getUserFullName()}}</h4>
            </div>
        </div>
        <ul class="navigation" id="profile_navigate">
            <li :class="{active: current.includes('dashboard')}">
                <a href="{{route('profile.dashboard')}}">
                    <i class="fas fa-home wdp-20"></i> Личный Кабинет
                </a>
            </li>
            <li :class="{active: current.includes('profile')}">
                <a href="{{route('profile.profile')}}">
                    <i class="far fa-user-circle wdp-20"></i> Профиль
                </a>
            </li>
            <li :class="{active: current.includes('leads')}">
                <a href="{{route('profile.leads')}}">
                    <i class="fas fa-clipboard-check wdp-20"></i> Заявки
                </a>
            </li>
            <li :class="{active: current.includes('integration')}">
                <a href="{{route('profile.integration')}}">
                    <i class="fas fa-recycle wdp-20"></i> Интеграции
                </a>
            </li>
            <li :class="{active: current.includes('services')}">
                <a href="{{route('profile.services')}}">
                    <i class="fas fa-briefcase wdp-20"></i> Услуги
                </a>
            </li>
        </ul>
    </div>
</div>

@push('scripts')
    <script type="text/javascript" src="{{asset('js/library/vue/profile.js')}}"></script>
@endpush
