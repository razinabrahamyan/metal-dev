new Vue({
    el: "#post-map-container",
    data: {
        postsPage: 1,
        lastPage: 1,
        posts: [],
        city: filters.city,
        market: filters.market,
        category: filters.category,
        subCategory: filters.subCategory,
        formData: undefined,
    },
    methods: {
        search: function () {
            let params = {
                page: this.postsPage,
            };

            if (this.formData !== undefined) {
                for (let pair of (this.formData).entries()) {
                    params[pair[0]] = pair[1];
                }
            }

            axios.get('/axios/post/map/search', {
                params: params
            }).then(response => {
                this.posts = response.data.posts.data;
                this.lastPage = response.data.posts.last_page;

                postMapHandler.posts = JSON.parse(JSON.stringify(response.data.posts.data));
                ymaps.ready(postMapHandler.init);
            }).catch(e => {
                AlertNotification.alertSuccess(e.message)
            });
        },
        submitFilter: function (e) {
            e.preventDefault();

            this.postsPage = 1;
            this.formData = new FormData(e.target);

            this.search();
        },
        nextPage: function () {
            if (this.postsPage < this.lastPage) {
                this.postsPage++;
                this.search();
            }
        },
        previousPage: function () {
            if (this.postsPage > 1) {
                this.postsPage--;
                this.search();
            }
        },
    },
    mounted() {
        $('body').addClass('active-filters');
        // $('.select2').select2({
        //     minimumResultsForSearch: -1,
        // });
        this.search();
    },
});
