<div class="page-wrapper dashboard">
    <div class="sidebar-backdrop"></div>
    @include('elements.profile.profile_sidebar')
    <section class="user-dashboard" id="profile_info_form">
        <div class="dashboard-outer">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-xs-12">
                    <div class="form-widget ls-widget">
                        <div class="widget-title">
                            <h4 class="p-0">
                                <i class="far fa-user-circle wdp-20"></i> Информация
                            </h4>
                        </div>
                        <div class="widget-content">
                            <div class="default-form">
                                <form @submit="saveProfileInfo">
                                    <div class="uploading-outer" id="profile_img_edit">
                                        <div class="media col-12 p-0">
                                            <div class="d-flex profile-base-info col-12 mt-1 ml-1 px-0">
                                                <div class="d-table col-lg-4 col-md-6 col-xs-6 p-0">
                                                    <label class="change-picture align-middle d-table-cell"
                                                           for="change-picture">
                                                        <figure class="user-image align-middle d-table-cell">
                                                            <img height="90" width="90" alt="avatar" id="avatar"
                                                                 src="{{asset(\App\Classes\Helpers\UserHelper::getAuthAvatar())}}"
                                                                 class="avatar user-avatar users-avatar-shadow rounded mr-2 my-25 cursor-pointer"/>
                                                        </figure>
                                                        <input class="form-control" type="file" name="avatar" hidden
                                                               id="change-picture"
                                                               accept="image/png, image/jpeg, image/jpg"
                                                               @change="onFileChange"/>
                                                    </label>
                                                </div>
                                                <div class="col-lg-8 col-md-6 col-xs-6 pt-4 align-items-center">
                                                    <span class="profile_cn row">
                                                        {{auth()->user()->company_name}}
                                                    </span>
                                                    <span class="profile_tarif row">
                                                        Тариф: {{auth()->user()->pack->title}}
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Компания </label>
                                        <input type="text" name="companyName" id="companyName"
                                               value="{{auth()->user()->company_name}}" placeholder="Компания">
                                    </div>
                                    <div class="form-group">
                                        <label>Имя </label>
                                        <input type="text" name="firstName" id="firstName"
                                               value="{{auth()->user()->full_name['first_name']}}" placeholder="Имя">
                                    </div>
                                    <div class="form-group">
                                        <label>Фамилия</label>
                                        <input type="text" name="lastName" id="lastName"
                                               value="{{auth()->user()->full_name['last_name']}}" placeholder="Фамилия">
                                    </div>
                                    <div class="form-group">
                                        <label>Телефон <i class="fa fa-check phone_check"></i></label>
                                        <input type="text" name="phone" id="phone"
                                               value="{{auth()->user()->phone}}" placeholder="Телефон">
                                    </div>
                                    <div class="form-group">
                                        <label>E-mail</label>
                                        <input type="email" name="email" id="email"
                                               value="{{auth()->user()->email}}" placeholder="E-mail">
                                    </div>
                                    <div class="form-group">
                                        <label>Вебсайт</label>
                                        <input type="text" name="website" id="website"
                                               value="{{auth()->user()->website}}" placeholder="Вебсайт">
                                    </div>
                                    <div class="form-group">
                                        <button class="theme-btn btn-style-two" name="submit-form">
                                            Сохранить
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-xs-12">
                    <div class="form-widget ls-widget">
                        <div class="widget-title">
                            <h4 class="p-0">
                                <i class="fas fa-id-card wdp-20"></i> Компания
                            </h4>
                        </div>
                        <div class="widget-content">
                            <a href="{{route('company.create')}}" class="theme-btn btn-style-three">
                                Зарегистрировать Компанию
                            </a>
                        </div>
                    </div>
                    <div class="form-widget ls-widget">
                        <div class="widget-title">
                            <h4 class="p-0">
                                <i class="fas fa-unlock-alt wdp-20"></i> Сменить пароль
                            </h4>
                        </div>
                        <div class="widget-content">
                            <div class="default-form">
                                <form id="pass_change_form" @submit="changePassword">
                                    <div class="form-group">
                                        <label>Текущий Пароль</label>
                                        <input type="password" name="currentPassword" placeholder="">
                                    </div>
                                    <div class="form-group">
                                        <label>Новый Пароль</label>
                                        <input type="password" name="newPassword" placeholder="">
                                    </div>
                                    <div class="form-group">
                                        <label>Подтвердите Пароль</label>
                                        <input type="password" name="repeatPassword" placeholder="">
                                    </div>
                                    <div class="form-group">
                                        <button class="theme-btn btn-style-two" name="submit-form">
                                            Сохранить
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"
            integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw=="
            crossorigin="anonymous"></script>
    <script src="{{asset('user_assets/js/profileHandler.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.0/dropzone.js"></script>
@endpush

@push('styles')
    <link rel="stylesheet" href="{{ asset('admin/app-assets/fonts/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.0/min/dropzone.min.css">
@endpush
