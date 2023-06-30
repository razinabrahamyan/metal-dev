new Vue({
    el: ".post-show-container",
    data: {},
    methods: {
        callbackPopup: function () {
            Swal.fire({
                title: 'Оставьте контактные данные',
                html: `<input type="text" id="full_name" class="swal2-input" placeholder="Ф.И.О.">
                       <input type="text" id="callback_phone" class="swal2-input addQMask" placeholder="Номер телефона">
                       <input type="email" id="callback_email" class="swal2-input" placeholder="Email">
                       <textarea id="callback_textarea" class="swal2-textarea" placeholder="Комментарий"></textarea>`,
                confirmButtonColor: '#ffa737',
                confirmButtonText: 'Заказать звонок',
                showCancelButton: false,
                showLoaderOnConfirm: true,
                showCloseButton: true,
                preConfirm: () => {
                    let full_name = Swal.getPopup().querySelector('#full_name').value
                    let callback_phone = Swal.getPopup().querySelector('#callback_phone').value
                    let callback_email = Swal.getPopup().querySelector('#callback_email').value
                    let callback_textarea = Swal.getPopup().querySelector('#callback_textarea').value

                    if (!full_name || !callback_phone) {
                        Swal.showValidationMessage(`Заполните все поля`)
                    }

                    return {
                        full_name: full_name,
                        callback_phone: callback_phone,
                        callback_email: callback_email,
                        callback_textarea: callback_textarea,
                    }
                },
                allowOutsideClick: () => !Swal.isLoading()
            }).then((result) => {
                if (result.isConfirmed) {
                    axios.post('/axios/post/callback-order', {
                        "full_name": `${result.value.full_name}`,
                        "callback_phone": `${result.value.callback_phone}`,
                        "callback_email": `${result.value.callback_email}`,
                        "callback_textarea": `${result.value.callback_textarea}`,
                        "post_id": postId,
                    }).then(response => {
                        let data = response.data;
                        Swal.fire({
                            icon: data.success,
                            title: data.alertMessage,
                            showCloseButton: true,
                            confirmButtonColor: '#ffa737',
                            confirmButtonText: 'Закрыть',
                        })
                    }).catch(e => {
                        console.log(e);
                    });
                }
            });
            //Add mask on phone field
            phoneHandler.addMask();
        },
    },
    mounted() {
    },
});
