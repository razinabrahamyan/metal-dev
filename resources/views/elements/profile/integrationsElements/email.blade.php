<div class="col-lg-6 col-md-6 col-xs-12">
    <form @submit="updateIntegrationSettings" class="form-widget ls-widget">
        <div class="widget-title">
            <input type="hidden" name="integration_id" value="{{$integration->id}}">
            <h4 class="p-0 float-left">
                <i class="fas fa-cog mr-2"></i> {{$integration->title}}
            </h4>
            <label class="switch float-right">
                <input type="checkbox" name="integration_{{$integration->id}}" @change="integrationTumbler"
                       data-id="{{$integration->id}}"
                       @if(!empty($userIntegrations[$integration->id]) && $userIntegrations[$integration->id]->status == 1)checked @endif>
                <span class="slider round"></span>
            </label>
        </div>
        <div class="widget-content pb-4">
            <div class="default-form">
                <form id="email_integration_form">
                    <div class="form-group">
                        <label>
                            Почта
                        </label>
                        <input type="text" name="settings[email]" placeholder=""
                               @if(!empty($userIntegrations[$integration->id]->integrationSettings[$integration->id]->settings))
                               value="{{$userIntegrations[$integration->id]->integrationSettings[$integration->id]->settings->email}}"
                            @endif>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="theme-btn btn-style-two" name="submit-form">
                            Сохранить
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </form>
</div>
