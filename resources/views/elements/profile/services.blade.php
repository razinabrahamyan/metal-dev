<div class="page-wrapper dashboard">
    <div class="sidebar-backdrop"></div>
    @include('elements.profile.profile_sidebar')
    <section class="user-dashboard">
        <div class="dashboard-outer" id="service_section">
            <div class="listing-filters">
                <!-- Filter List -->
                <ul class="filters-list">
                    <li class="active"><a href="#"><span class="icon flaticon-wireframe"></span> Новые</a></li>
                    <li><a href="#"><span class="icon flaticon-stopwatch"></span> В Обработке</a></li>
                    <li class=""><a href="#"><span class="icon flaticon-ticket-1"></span> Unpaid</a></li>
                    <li><a href="#"><span class="icon flaticon-hourglass"></span> Expired</a></li>
                    <li><a href="#"><span class="icon flaticon-lock"></span> Temporary Close</a></li>
                    <li><a href="#"><span class="icon flaticon-edit"></span> Editing</a></li>
                </ul>

                <div class="search-outer">
                    <div class="search-form">
                        <input type="text" name="search" placeholder="Search">
                        <span class="search-btn"><i class="flaticon-magnifying-glass"></i></span>
                    </div>

                    <div class="sort-by">
                        <select class="chosen-select">
                            <option>Sort By</option>
                            <option>Residential</option>
                            <option>Commercial</option>
                            <option>Industrial</option>
                            <option>Apartments</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- My Listings -->
            <div class="my-listing-widget ls-widget" id="features">
                <div class="widget-title"><h4><span class="icon flaticon-list"></span>Услуги</h4></div>
                <div class="widget-content">
                    <div v-for="service in services">
                        <div class="ls-widget p-3 service_card">
                            <div class="d-flex justify-content-between">
                                <div class="d-flex align-items-baseline">
                                    <h4>@{{ service.service_type.title }}</h4>
                                    <p class="px-2">_____</p>
                                    <h5>@{{ service.price }} <i class="fa fa-ruble-sign"></i></h5>
                                </div>

                                <div>
                                    <button class="theme-btn btn-style-three small "
                                            v-on:click="editService(service)">
                                        <span class="icon flaticon-edit"></span>Ред.
                                    </button>

                                </div>
                            </div>

                            <div>
                                <p class="mb-2"> @{{ service.description }}</p>
                            </div>
                            <div class="d-flex flex-wrap">
                                <div class="service_image_handler" v-for="image in service.images">
                                        <a  :href="'/'+image.name"
                                            v-bind:data-fancybox="'ls-gallery_'+service.id"
                                            class="lightbox-image" title="Image Caption Here">
                                            <img :src="'/'+image.name" alt="">
                                        </a>

                                </div>
                            </div>


                        </div>

                    </div>
                    <button v-if="serviceTypes.length" v-on:click="onServiceButtonClicked" class="theme-btn btn-style-two">Добавить услугу</button>
                </div>
            </div>


            @include('includes.modals.add_service_modal')
            @include('includes.modals.edit_service_modal')
        </div>
    </section>


</div>

@push('scripts')

    <script>
        new Vue({
            el: "#service_section",
            data: {
                images:null,
                imagesFromEdit:null,
                serviceTypes:[],
                services:[],
                price:null,
                description:null,
                editButtonDisabled:false,
                addButtonDisabled:false,
                edit:{
                    description:null,
                    price:null,
                    id:null,
                    images:[],
                },
                removedImages:[]
            },
            watch: {

            },
            methods: {
                onServiceButtonClicked: function (){
                    openModal($('#service_modal'),150)
                },
                isEditButtonDisabled: function (){
                    return this.editButtonDisabled;
                },
                isAddButtonDisabled: function (){
                    return this.addButtonDisabled;
                },
                imageAdded: function (e){
                    this.images = e.target.files;
                },
                deleteService: function (service){

                    const config = {
                        headers: {
                            Accept: 'application/json',

                        }
                    }
                    axios.post('/axios/service/delete', {id:service.id}, config).then(response => {
                        if(response.data.success === 'success'){
                            let services = this.services;
                            let index_to_remove = null;
                            services.forEach(function (service,index){
                                console.log('service',service,'service_id',service.id,'index',index,'response.data.service',response.data.service_id)
                                if(service.id == response.data.service_id){
                                    index_to_remove = index;
                                    console.log('havasare')
                                }
                            })
                            services.splice(index_to_remove,1)
                            let service_types = this.serviceTypes;
                            service_types.push(response.data.service_type);
                            this.serviceTypes = service_types
                            this.services = services;
                            let input = $('.MultiFile-wrap#upload_edit .file-upload-input:last-child').detach();
                            $('.MultiFile-wrap#upload_edit').empty().append(input)
                            $('.file-upload-previews-edit').empty();
                            this.imagesFromEdit = null;
                           AlertNotification.alertSuccess(response.data.message)
                        }
                        $.modal.close();
                        this.$forceUpdate()
                    }).catch(e => {
                        console.log(e);
                    });
                },
                editImageAdded: function (e){
                    this.imagesFromEdit = e.target.files;
                },
                removeServiceImage: function (image){
                    let arr = this.removedImages;
                    arr.push(image.id);
                    this.removedImages = arr
                },
                editService: function (service){
                    this.edit = service;
                    this.removedImages = [];
                    openModal($('#edit_service_modal'),150)
                    let input = $('.MultiFile-wrap#upload_edit .file-upload-input:last-child').detach();
                    $('.MultiFile-wrap#upload_edit').empty().append(input)
                    $('.file-upload-previews-edit').empty();
                    this.imagesFromEdit = null;
                },
                restoreServiceImage: function (image){
                    let arr = this.removedImages;
                    let index = arr.indexOf(image.id);
                    if(index > -1){
                        arr.splice(index,1)
                    }
                    this.removedImages = arr;
                },
                isImageRemoved: function (image){
                    let removedImages = this.removedImages;
                    let removed = false;
                    removedImages.forEach((value) => {
                        if(value === image.id){
                            removed = true;
                        }
                    })
                    return removed;
                },
                updateService: function (e){
                    e.preventDefault();
                    const config = {
                        headers: {
                            Accept: 'application/json',
                            'Content-Type': 'multipart/form-data',
                        }
                    }
                    let data = new FormData(e.target);
                    data.append('files', this.imagesFromEdit);
                    this.editButtonDisabled = true;
                    axios.post('/axios/service/update', data, config).then(response => {

                        if (response.data.success === 'success'){
                            let services = this.services;
                            services.forEach(function (service,index){
                                if(service.id === response.data.service.id){
                                    services[index] = response.data.service;
                                }
                            })
                            this.services = services;
                            let input = $('.MultiFile-wrap#upload_edit .file-upload-input:last-child').detach();
                            $('.MultiFile-wrap#upload_edit').empty().append(input)
                            $('.file-upload-previews-edit').empty();
                            this.imagesFromEdit = null;
                            $.modal.close();
                            this.editButtonDisabled = false;
                            AlertNotification.alertSuccess(response.data.message)
                        }
                        this.$forceUpdate()
                    }).catch(e => {
                        console.log(e);
                    });
                },
                createService: function (e) {
                    e.preventDefault();
                    const config = {
                        headers: {
                            Accept: 'application/json',
                            'Content-Type': 'multipart/form-data',
                        }
                    }
                    let data = new FormData(e.target);
                    data.append('files', this.images);
                    this.addButtonDisabled = true;
                    axios.post('/axios/service/create', data, config).then(response => {
                        if(response.data.success === 'success'){
                            let services = this.services;
                            services.unshift(response.data.service);
                            this.services = services;
                            $.modal.close()
                            this.addButtonDisabled = false;
                            AlertNotification.alertSuccess(response.data.message)
                            let serviceTypes = this.serviceTypes;
                            let index_to_remove = null;
                            serviceTypes.forEach(function (value,index){
                                if(value.id == response.data.service_type_to_remove){
                                    index_to_remove = index;
                                }
                            })
                            console.log(index_to_remove,  'index')
                            serviceTypes.splice(index_to_remove,1);
                            this.serviceTypes = serviceTypes;
                            this.price = null;
                            this.description = null;
                            let input = $('.MultiFile-wrap#upload .file-upload-input:last-child').detach();
                            $('.MultiFile-wrap#upload').empty().append(input)
                            $('.file-upload-previews-post').empty();
                            this.images = null;
                            this.$forceUpdate()
                        }

                    }).catch(e => {
                        console.log(e);
                    });
                },
            },
            created(){
                axios.get('/axios/service/get-own-services').then(response => {

                    let serviceTypes = this.serviceTypes;
                    let services = this.services;
                    response.data.serviceTypes.forEach(function (value){
                        serviceTypes.push({
                            id:value.id,
                            title:value.title
                        })
                    })
                    this.serviceTypes = serviceTypes;
                    response.data.services.forEach(function (value){
                        services.push(value)
                    })
                    this.services = services;

                    this.$forceUpdate()
                }).catch(e => {
                    console.log(e);

                });
            },
            mounted() {


            },
            updated(){

            },
        });

        $("input.service_images").MultiFile({
            list: ".file-upload-previews-post"
        });
        $("input.edit_images").MultiFile({
            list: ".file-upload-previews-edit"
        });
    </script>

@endpush
