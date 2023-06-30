new Vue({
    el: "#profile_integrations",
    data: {},
    methods: {
        integrationTumbler: function (e) {
            let isOn = $(e.target).is(':checked') ? 1 : 0;
            let integrationId = $(e.target).data('id');

            axios.post('/axios/integration/update/status', {
                isOn: isOn,
                integrationId: integrationId,
            }).then(response => {
                AlertNotification.alertSuccess(response.data.alertMessage)
            }).catch(e => {
                AlertNotification.alertSuccess(e.message)
            });
        },
        updateIntegrationSettings: function (e) {
            e.preventDefault();
            let data = new FormData(e.target);

            axios.post('/axios/integration/update/settings', data).then(response => {
                $.each(response.data.invalidRules, function (key, value) {
                    AlertNotification.appendElementError('[name="settings[' + key + ']"]', value)
                })
                AlertNotification.alertSuccess(response.data.alertMessage)
            }).catch(e => {
                AlertNotification.alertSuccess(e.message)
            });
        },
    },
});
