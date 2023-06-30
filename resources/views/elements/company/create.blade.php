<div class="page-wrapper dashboard">
    <div class="sidebar-backdrop"></div>
    @include('elements.profile.profile_sidebar')
    <section class="user-dashboard" id="company_info_form">
        <div class="dashboard-outer">
            <div class="row">
                <div class="col-12">
                    <div class="form-widget ls-widget">
                        <div class="widget-title">
                            <h4 class="p-0">
                                <i class="far fa-id-card wdp-20"></i> Компания
                            </h4>
                        </div>
                        <div class="widget-content">
                            <h6 class="mb-2 font-weight-bold">Реквизиты Компании</h6>
                            <div class="default-form">
                                <form @submit="saveCompanyInfo">
                                    <div class="row">
                                        <div class="col-12 col-md-6">
                                            <div class="form-group">
                                                <label for="company">Юр. Лицо</label>
                                                <input type="text" name="company" id="company">
                                            </div>
                                            <div class="form-group">
                                                <label for="ogrn">ОГРН </label>
                                                <input type="number" name="ogrn" id="ogrn">
                                            </div>
                                            <div class="form-group">
                                                <label for="inn">ИНН</label>
                                                <input type="number" name="inn" id="inn">
                                            </div>
                                            <div class="form-group">
                                                <label for="kpp">КПП</label>
                                                <input type="number" name="kpp" id="kpp">
                                            </div>
                                            <div class="form-group">
                                                <label for="legal_address">Юридический Адрес</label>
                                                <input type="text" name="legal_address" id="legal_address">
                                            </div>
                                        </div>


                                        <div class="col-12 col-md-6">
                                            <div class="form-group">
                                                <label for="post_address">Почтовый Адрес</label>
                                                <input type="text" name="post_address" id="post_address">
                                            </div>
                                            <div class="form-group">
                                                <label for="responsible">Фио Отвественного</label>
                                                <input type="text" name="responsible" id="responsible">
                                            </div>
                                            <div class="form-group">
                                                <label for="phone">Телефон</label>
                                                <input type="text" name="phone" id="phone">
                                            </div>
                                            <div class="form-group">
                                                <label for="taxation">Форма Налогообложения</label>
                                                <input type="text" name="taxation" id="taxation">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <button class="theme-btn btn-style-two" name="submit-form">
                                                Сохранить
                                            </button>
                                        </div>
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
    <script>
        new Vue({
            el: "#company_info_form",
            data: {
            },
            methods: {
                saveCompanyInfo: function (e) {
                    e.preventDefault();

                    const config = {
                        headers: {
                            Accept: 'application/json',
                        }
                    }

                    let data = new FormData(e.target);

                    axios.post('/axios/company/create', data, config).then(response => {
                        $.each(response.data.invalidRules, function (key, value) {
                            AlertNotification.appendElementError('[name=' + key + ']', value)
                        })

                    }).catch(e => {
                        AlertNotification.alertSuccess(e.message)
                    });
                },
            },
            mounted() {
                phoneHandler.addMask("#phone");
            }

        });

    </script>
@endpush

@push('styles')
    <link rel="stylesheet" href="{{ asset('admin/app-assets/fonts/font-awesome/css/font-awesome.min.css')}}">
@endpush
