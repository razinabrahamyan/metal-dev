<section id="post-map-container" class="ls-section map-layout-2">
    <div class="ls-cotainer">
        <div class="content-column width-40">
            <div class="inner-box">
                <div class="content-box">
                    <div class="upper-box">
                        <div class="listing-search-form">
                            <div class="row col-12 p-0 m-0">
                                <form id="posts_filter" @submit="submitFilter" method="GET" class="col-12">
                                    @csrf
                                    <div class="row">
                                        <div class="form-group col-lg-4 col-md-12 col-sm-12">
                                            <select class="select2" v-model="city" name="filter[city_id]">
                                                <option value="" class="city"
                                                        data-lat="{{$cities->first()->geolocation->lat}}"
                                                        data-lon="{{$cities->first()->geolocation->lon}}">
                                                    Все города
                                                </option>
                                                @foreach($cities as $city)
                                                    <option value="{{$city->id}}" class="city"
                                                            data-lat="{{$city->geolocation->lat}}"
                                                            data-lon="{{$city->geolocation->lon}}">
                                                        {{$city->title}}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-lg-4 col-md-12 col-sm-12">
                                            <select class="select2" v-model="market" name="filter[market_id]">
                                                <option value="">Рынок</option>
                                                @foreach($markets as $market)
                                                    <option value="{{$market->id}}">{{$market->title}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-lg-4 col-md-12 col-sm-12">
                                            <select class="select2" v-model="category" name="filter[category_id]">
                                                <option value="">Все категории</option>
                                                @foreach($categories as $category)
                                                    <option value="{{$category->id}}"
                                                            v-show="{{$category->market_id}} == market">
                                                        {{$category->title}}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-lg-4 col-md-12 col-sm-12">
                                            <select class="select2" v-model="subCategory" name="filter[subcategory_id]">
                                                <option value="">Все подкатегории</option>
                                                @foreach($subCategories as $subCategory)
                                                    <option value="{{$subCategory->id}}"
                                                            v-show="{{$subCategory->category_id}} == category">
                                                        {{$subCategory->title}}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group col-lg-12 col-md-12 col-sm-12 p-0 mt-3">
                                        <button type="submit" class="theme-btn btn-style-two" ref="submitButton">
                                            Найти <span class="flaticon-magnifying-glass"></span>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="ls-outer">
                        @mobile
                        <div class="map-column mb-4">
                            <div id="map" data-map-zoom="9" data-map-scroll="true"></div>
                        </div>
                        @endmobile
                        <div class="listing-block-six posts_preview" v-for="(post,index) in posts">
                            <div class="inner-box posts_sidebar" v-bind:data-post="index"
                                 v-bind:data-image="post.images[0] ? post.images[0].name : ''">
                                <div class="image-box">
                                    <figure class="image">
                                        <img v-bind:src="post.images[0] ? post.images[0].name : ''" alt="">
                                    </figure>
                                </div>
                                <div class="content">
                                    <h3><a href="listing-single.html">@{{ post.title }}</a></h3>
                                    <ul class="info">
                                        <li><i class="fas fa-map-marker-alt mr-1"></i>@{{post.address.address}}</li>
                                        <li><i class="fas fa-phone-volume mr-1"></i>@{{ post.creator.phone }}</li>
                                    </ul>
                                    {{--                                    <div class="rating">--}}
                                    {{--                                        <span class="fa fa-star"></span>--}}
                                    {{--                                        <span class="fa fa-star"></span>--}}
                                    {{--                                        <span class="fa fa-star"></span>--}}
                                    {{--                                        <span class="fa fa-star"></span>--}}
                                    {{--                                        <span class="fa fa-star"></span>--}}
                                    {{--                                        <span class="title">(7 review)</span>--}}
                                    {{--                                    </div>--}}
                                </div>
                            </div>
                            <a v-bind:href="'/posts/'+post.id" class="listing-item-container overlay-link"
                               data-marker-id="1"></a>
                        </div>
                        <nav class="ls-pagination-two">
                            <ul>
                                <li class="prev">
                                    <a href="#" @click="previousPage">
                                        <i class="fas fa-arrow-left"></i>
                                    </a>
                                </li>
                                <li> @{{ postsPage }}/@{{ lastPage }}</li>
                                <li class="next">
                                    <a href="#" @click="nextPage">
                                        <i class="fas fa-arrow-right"></i>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        @desktop
        <div class="map-column width-60">
            <div id="map" data-map-zoom="9" data-map-scroll="true"></div>
        </div>
        @enddesktop
    </div>
</section>
@push('scripts')
    <script>
        const filters = {
            city: "{{$filters["city_id"] ?? ""}}",
            market: "{{$filters["market_id"] ?? ""}}",
            category: "{{$filters["category_id"] ?? ""}}",
            subCategory: "{{$filters["subcategory_id"] ?? ""}}",
        };
    </script>
    <script src="{{asset('js/select2.min.js')}}"></script>
    <script src="{{asset('user_assets/js/postMapHandler.min.js')}}"></script>
@endpush
@push('styles')
    <link href={{asset('admin/app-assets/fonts/font-awesome/css/font-awesome.min.css')}}>
@endpush
