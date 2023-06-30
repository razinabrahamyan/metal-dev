new Vue({
    el: ".profile_leads",
    data: {
        leads: [],
        leadTypes: [],
        page: 1,
        lastPage: 1,
    },
    methods: {
        searchLeads: function () {
            axios.get('/axios/profile/leads', {
                params: {
                    user_id: leadFilter.userId,
                    page: this.page,
                }
            }).then(response => {
                this.leads = response.data.leads.data;
                this.leadTypes = response.data.leadTypes;
                this.lastPage = response.data.leads.last_page;
            }).catch(e => {
                AlertNotification.alertSuccess(e.message)
            });
        },
        copyText: function (e) {
            DomHelpers.copyTextFromElement(e.target);
        },
        deletePost: function (leadId) {
            Swal.fire({
                title: '<p style="color: #ffffff;font-size: 23px;">Удалить заявку?</p>',
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Удалить!',
                cancelButtonText: 'Отмена',
                background: 'rgba(0,0,0,0.6)',
                iconColor: '#3085d6',
            }).then((result) => {
                if (result.isConfirmed) {
                    axios.post('/axios/profile/leads/delete', {
                        leadId: leadId,
                    }).then(response => {
                        $('[data-lead-id=' + leadId + ']').remove();
                        AlertNotification.alertSuccess(response.data.alertMessage);
                    }).catch(e => {
                        AlertNotification.alertSuccess(e.message)
                    });
                }
            })
        },
        nextPage: function () {
            if (this.page < this.lastPage) {
                this.page++;
                this.searchLeads();
            }
        },
        prevPage: function () {
            if (this.page > 1) {
                this.page--;
                this.searchLeads();
            }
        }
    },
    mounted() {
        this.searchLeads();
    }
});
