new Vue({
    el: "#profile_info_form",
    data: {
        image: null,
    },
    methods: {
        saveProfileInfo: function (e) {
            e.preventDefault();

            const config = {
                headers: {
                    Accept: 'application/json',
                    'Content-Type': 'multipart/form-data',
                }
            }

            let data = new FormData(e.target);
            data.append('file', this.file);

            axios.post('/axios/profile/update', data, config).then(response => {
                $.each(response.data.invalidRules, function (key, value) {
                    AlertNotification.appendElementError('[name=' + key + ']', value)
                })
                AlertNotification.alertSuccess(response.data.alertMessage)
            }).catch(e => {
                AlertNotification.alertSuccess(e.message)
            });
        },
        onFileChange: function (e) {
            ImageHandler.changeImageOnInput(e.target, '.user-avatar')
            this.image = e.target.files[0];
        },
        changePassword: function (e) {
            e.preventDefault();
            let data = new FormData(e.target);

            axios.post('/axios/profile/update-password', data).then(response => {
                $.each(response.data.invalidRules, function (key, value) {
                    AlertNotification.appendElementError('[name=' + key + ']', value)
                })
                AlertNotification.alertSuccess(response.data.alertMessage)
            }).catch(e => {
                AlertNotification.alertSuccess(e.message)
            });
        },
    },
    mounted() {
        phoneHandler.addMask("#phone");
    }
});
