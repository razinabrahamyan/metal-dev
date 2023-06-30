<section class="ls-section style-two " id="services">
    <div class="auto-container">
        <div class="filters-backdrop"></div>

        <div class="row">

            <!-- Filters Column -->
            <div class="filters-column col-lg-4 col-md-12 col-sm-12">

                <div class="inner-column">
                    <button type="button" class="theme-btn close-filters">X</button>

                    <!-- Top Filters -->
                    <ul class="top-filters">
                        <li class="active"><a href="#">Фильтры</a></li>
<!--                        <li><a href="#">Catergory</a></li>-->
                    </ul>

<!--                    <div class="listing-search-form">
                        <form >
                            <div class="row">
                                <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                    <input type="text" name="listing-search" placeholder="What are you looking for?">
                                </div>
                                &lt;!&ndash; Form Group &ndash;&gt;
                                <div class="form-group col-lg-12 col-md-12 col-sm-12 location">
                                    <input type="text" name="listing-search" placeholder="Lucation">
                                    <span class="icon flaticon-placeholder"></span>
                                </div>

                                &lt;!&ndash; Form Group &ndash;&gt;
                                <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                    <select class="chosen-select">
                                        <option>All Categories</option>
                                        <option>Residential</option>
                                        <option>Commercial</option>
                                        <option>Industrial</option>
                                        <option>Apartments</option>
                                    </select>
                                </div>

                                &lt;!&ndash; Form Group &ndash;&gt;
                                <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                    <select class="chosen-select">
                                        <option>Price</option>
                                        <option>Residential</option>
                                        <option>Commercial</option>
                                        <option>Industrial</option>
                                        <option>Apartments</option>
                                    </select>
                                </div>
                            </div>
                        </form>
                    </div>

                    &lt;!&ndash; Switchbox Outer &ndash;&gt;
                    <div class="switchbox-outer">

                        <ul class="switchbox">
                            <li>
                                <label class="switch">
                                    <input type="checkbox" checked>
                                    <span class="slider round"></span>
                                    <span class="title">Open Now</span>
                                </label>
                            </li>
                            <li>
                                <label class="switch">
                                    <input type="checkbox">
                                    <span class="slider round"></span>
                                    <span class="title">Near Me</span>
                                </label>
                            </li>
                        </ul>
                    </div>-->


                    <div class="checkbox-outer">
                        <h4>Тип Услуг</h4>
                        <form ref="form" v-on:submit="applyFilter">
                            <ul class="checkboxes two-column">
                                <li v-for="serviceType in serviceTypes">
                                    <input v-on:change="filterCheckboxChecked" :id="'check_'+serviceType.id" :checked="isChosenServiceType(serviceType.id)" :value="serviceType.id" type="checkbox"  name="categories">
                                    <label :for="'check_'+serviceType.id">@{{ serviceType.title }}</label>
                                </li>
                            </ul>
                            <button class="btn btn-style-two mt-2" type="submit" :disabled="filterButtonDisabled">Применить</button>
                        </form>

                    </div>
                </div>
            </div>

            <!-- Content Column -->
            <div class="content-column col-lg-8 col-md-12 col-sm-12">
                <div class="ls-outer">
                    <button type="button" class="theme-btn btn-style-two toggle-filters">Show Filters</button>

                    <!-- ls Switcher -->
                    <div class="ls-switcher">
                        <div class="showing-result">
                            <div class="arrange">
                                <a href="#" class="active"><span class="icon flaticon-squares"></span></a>
                                <a href="#"><span class="icon flaticon-setup"></span></a>
                            </div>
                            <div class="text">@{{ requestTotal }} Результатов ( Показано @{{ requestFrom }} - @{{ requestTo }} )</div>
                        </div>
<!--                        <div class="sort-by">
                            <select class="chosen-select">
                                <option>Sort By</option>
                                <option>Residential</option>
                                <option>Commercial</option>
                                <option>Industrial</option>
                                <option>Apartments</option>
                            </select>
                        </div>-->
                    </div>
                    <div class="row mb-2">
                        <div class="filter_tag" v-for="filter in alreadyFiltered">
                            @{{ filter.title }}
                        </div>
                    </div>


                    <div class="row">

                        <div class="listing-block-five service_show_block w-100" v-for="service in services">
                            <div class="inner-box">
                                <div class="image-box">
                                    <figure class="image"><img :src="service.user.avatar?'/'+service.user.avatar:'/images/default_avatar.png'" alt=""></figure>
<!--                                    <div class="tags">
                                        <span>Featured</span>
                                    </div>-->
                                </div>

                                <div class="content-box">
                                    <div class="upper-box">

                                        <h6 class="mt-1 company_link"><a href="#">@{{ service.user.full_name.first_name + ' ' +service.user.full_name.last_name}}</a></h6>
                                        <div class="d-flex justify-content-between price_and_cat">
                                            <h3>@{{ service.service_type.title }}</h3>
                                            <div class="flex-grow-1 border-bottom"></div>
                                            <h3>@{{ service.price }} <i class="fa fa-ruble-sign"></i></h3>
                                        </div>

                                        <div class="text">@{{ service.description }}</div>
                                        <div class="d-flex owl_desk_service" >
                                            <button class="service_owl_nav_handler left" v-on:click="prevOwl">
                                                <div class="">
                                                    <i class="fa fa-angle-left"></i>
                                                </div>
                                            </button>
                                            <div class="service_owl_handler">
                                                <div class="list-item">
                                                    <div class="owl-carousel owl-theme" v-carousel="service.images">
                                                        <div class="item" v-for="image in service.images">
                                                            <a  :href="'/'+image.name"
                                                                v-bind:data-fancybox="'ls-gallery_'+service.id"
                                                                class="lightbox-image" title="Image Caption Here">
                                                                <img class="service_owl_image" :src="'/'+image.name" alt="">
                                                            </a>

                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <button class="service_owl_nav_handler right" v-on:click="nextOwl">
                                                <div class="">
                                                    <i class="fa fa-angle-right"></i>
                                                </div>
                                            </button>

                                        </div>

                                        <ul class="info">
                                            <li><span class="flaticon-pin"></span> Santa Monica, CA</li>
                                            <li><span class="flaticon-phone-call"></span> +61 2 8236 9200 </li>
                                        </ul>
                                    </div>
<!--                                    <div class="bottom-box">
                                        <div class="places">
                                            <div class="place"><span class="icon flaticon-bed"></span> Hotels </div>
                                            <span class="count">+3</span>
                                        </div>
                                        <div class="status">Now Closed</div>
                                    </div>-->
                                </div>
                            </div>
                        </div>


                    </div>

                    <nav class="ls-pagination">
                        <ul>
                            <li v-for="(link, index) in links" :class="paginateLiClass(link,index,links)">
                                <div>
                                    <a role="button" v-on:click="paginateServices(link)" :class=(paginateAClass(link)) v-html="paginationHtml(link,index,links)"></a>
                                </div>

                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>
@push('scripts')
    <script>
        new Vue({
            el: "#services",
            data: {
                count: 0,
                added: true,
                services:[],
                links:null,
                serviceTypes:[],
                filterCategories:[],
                filterButtonDisabled:true,
                requestTotal:null,
                requestFrom:null,
                requestTo:null,
                alreadyFiltered:[]
            },
            methods: {
                nextOwl:function (e){
                    $(e.target).closest('.owl_desk_service').find('.owl-carousel').trigger('next.owl.carousel')
                    this.$emit('lala')
                },
                prevOwl:function (e){
                    $(e.target).closest('.owl_desk_service').find('.owl-carousel').trigger('prev.owl.carousel')
                },
                paginateLiClass: function (link,index,links){
                    let res = '';
                    switch (index){
                        case 0:
                            res = 'prev';
                            break;
                        case links.length -1:
                            res = 'next';
                            break;
                    }
                    return res;
                },
                paginateAClass: function (link){
                    return link.active ? 'current-page' : '';
                },
                paginationHtml: function (link,index,links){
                    if(index === 0){
                        return '<i class="flaticon-left"></i> Пред</a>';
                    }else if(index === links.length -1){
                        return 'След <i class="flaticon-right"></i>';
                    }else{
                        return link.label
                    }
                },
                paginateServices: function (link){
                    axios.get(link.url).then(response => {
                        $('.owl-carousel').removeClass('owl-loaded').trigger('destroy.owl.carousel');
                        this.services = response.data.services.data
                        this.links = response.data.services.links
                        let hostname = window.location.hostname;
                        let pathname = window.location.pathname;
                        let query = response.data.query_string;
                        history.pushState(null, '',pathname+'?'+query)
                        this.updateRequestInfo(response.data)
                      /*  history.pushState(null, '', response.data.url);*/
                        this.$forceUpdate()
                    }).catch(e => {
                        console.log(e);

                    });
                },
                filterCheckboxChecked: function (e){
                    this.filterButtonDisabled = false;
                },
                applyFilter: function (e){
                    e.preventDefault();
                    let data = new FormData(e.target);
                    const config = {
                        headers: {
                            Accept: 'application/json',
                            'Content-Type': 'multipart/form-data',
                        }
                    }
                    axios.get('/axios/service/filter-services', {params:{categories:data.getAll('categories')}})
                        .then(response => {
                            $('.owl-carousel').removeClass('owl-loaded').trigger('destroy.owl.carousel');
                            let hostname = window.location.hostname;
                            let pathname = window.location.pathname;
                            let query = response.data.query_string;
                            history.pushState(null, '',pathname+'?'+query)
                            this.services = response.data.services.data
                            this.serviceTypes = response.data.service_types
                            this.links = response.data.services.links
                            this.alreadyFiltered = response.data.filters
                            this.filterButtonDisabled = true;
                            this.updateRequestInfo(response.data)
                            console.log(response.data.services, 'this.alreadyFiltered')
                            this.$forceUpdate()
                        }).catch(e => {
                            console.log(e);
                        });
                },
                updateRequestInfo: function (data){
                    this.requestFrom = data.services.from;
                    this.requestTo = data.services.to
                    this.requestTotal = data.services.total
                },
                isChosenServiceType: function (check_id){
                    let is_chosen = false;
                    let array = this.alreadyFiltered;
                    if(array && array.length){
                        array.forEach(function (value){
                            if (value.id == check_id){
                                is_chosen = true;
                            }
                        })
                    }

                    return is_chosen;
                }
            },
            updated: function () {
                this.added = true;

            },
            created(){
                console.log(window.location)
                axios.get('/axios/service/filter-services'+window.location.search).then(response => {
                    this.alreadyFiltered = response.data.filters
                    this.services = response.data.services.data
                    this.links = response.data.services.links
                    this.serviceTypes = response.data.service_types
                    this.updateRequestInfo(response.data)
                    this.$forceUpdate()
                }).catch(e => {
                    console.log(e);

                });
            },
            directives: {
                carousel: {
                    inserted: function (el){
                        let owl = $(el).owlCarousel({
                            loop:false,
                            nav: false,
                            margin:0,
                            autoWidth:true,
                            dots:true,
                        })
                        owl.on('changed.owl.carousel', function(event) {
                            let parent_div = $(el).closest('.owl_desk_service');
                            if(event.item.index === 0){
                                parent_div.find('.service_owl_nav_handler.left').addClass('disabled')
                            }else{
                                parent_div.find('.service_owl_nav_handler.left').removeClass('disabled')
                            }
                            if(event.item.count > 4 && event.item.index < event.item.count - 4){
                                parent_div.find('.service_owl_nav_handler.right').removeClass('disabled')
                            }else{
                                parent_div.find('.service_owl_nav_handler.right').addClass('disabled')
                            }
                        })
                    },

                    componentUpdated: function (el){
                        let $owl = $(el).owlCarousel({
                            loop:false,
                            nav: false,
                            margin:0,
                            autoWidth:true,
                            dots:true,
                        })
                        $owl.on('changed.owl.carousel', function(event) {
                            let parent_div = $owl.closest('.owl_desk_service');
                            if(event.item.index === 0){
                                parent_div.find('.service_owl_nav_handler.left').addClass('disabled')
                            }else{
                                parent_div.find('.service_owl_nav_handler.left').removeClass('disabled')
                            }
                            if(event.item.count > 4 && event.item.index < event.item.count - 4){
                                parent_div.find('.service_owl_nav_handler.right').removeClass('disabled')
                            }else{
                                parent_div.find('.service_owl_nav_handler.right').addClass('disabled')
                            }
                        })
                    }
                }
            }
        });
    </script>
@endpush
