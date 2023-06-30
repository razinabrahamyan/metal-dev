<div class="page-wrapper dashboard profile_leads">
    <div class="sidebar-backdrop"></div>
    @include('elements.profile.profile_sidebar')
    <section class="user-dashboard ls-section">
        <div class="dashboard-outer">
            <div class="listing-filters col-12">
                {{--                <ul class="filters-list">--}}
                {{--                    <li class="active"><a href="#"><span class="icon flaticon-wireframe"></span> Новые</a></li>--}}
                {{--                    <li><a href="#"><span class="icon flaticon-stopwatch"></span> В Обработке</a></li>--}}
                {{--                </ul>--}}
                {{--                <div class="search-outer">--}}
                {{--                    <div class="search-form">--}}
                {{--                        <input type="text" name="search" placeholder="Search">--}}
                {{--                        <span class="search-btn"><i class="flaticon-magnifying-glass"></i></span>--}}
                {{--                    </div>--}}
                {{--                    <div class="sort-by">--}}
                {{--                        <select class="chosen-select">--}}
                {{--                            <option>Sort By</option>--}}
                {{--                            <option>Residential</option>--}}
                {{--                            <option>Commercial</option>--}}
                {{--                            <option>Industrial</option>--}}
                {{--                            <option>Apartments</option>--}}
                {{--                        </select>--}}
                {{--                    </div>--}}
                {{--                </div>--}}
                <div class="listing-search-form col-12">
                    <div class="row col-12 p-0 m-0">
                        <form id="posts_filter" method="GET" class="col-12">
                            @csrf
                            <div class="row mt-3">
                                <div class="form-group col-lg-3 col-md-3 col-sm-12">
                                    <select class="select2" id="leadType" name="leadType">
                                        <option v-for="(leadType,index) in leadTypes" v-bind:value="leadType.id">
                                            @{{ leadType.title }}
                                        </option>
                                    </select>
                                </div>
                                <div class="form-group col-lg-3 col-md-3 col-sm-12">
                                    <button type="submit" class="theme-btn btn-style-two" ref="submitButton">
                                        Найти <span class="flaticon-magnifying-glass"></span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="my-listing-widget ls-widget" id="features">
                <div class="widget-title">
                    <h4 class="p-0">
                        <i class="fas fa-list-ul mr-2"></i> Заявки
                    </h4>
                </div>
                <div class="widget-content">
                    <div class="listing-block-seven" v-for="(lead,key) in leads" v-bind:data-lead-id="lead.id">
                        <div class="inner-box">
                            <div class="image-box">
                                <a v-bind:href="'/posts/'+lead.post.id">
                                    <figure class="image">
                                        <img v-bind:src="'/'+lead.post.images[0].name" alt="">
                                    </figure>
                                </a>
                            </div>
                            <div class="content-box">
                                <div class="text c-dark">
                                    <i class="far fa-user-circle wdp-20"></i> @{{ lead.full_name }}
                                </div>
                                <div class="text">
                                    <a v-bind:href="'tel:'+lead.phone" class="c-dark hc-oragne">
                                        <i class="fas fa-phone-volume wdp-20"></i> @{{ lead.phone }}
                                    </a>
                                </div>
                                <div class="text">
                                    <a class="c-dark hc-oragne" @click="copyText" v-show="lead.email">
                                        <i class="far fa-envelope wdp-20"></i> @{{ lead.email }}
                                    </a>
                                </div>
                                <div class="c-dark text">
                                    <i class="fas fa-calendar-week wdp-20"></i> @{{ lead.created_at }}
                                </div>
                                <div class="c-dark text" v-show="lead.comment">
                                    <i class="far fa-comment wdp-20"></i> @{{ lead.comment }}
                                </div>
                                {{--                                <ul class="info">--}}
                                {{--                                    <li>--}}
                                {{--                                        --}}{{--                                        <span class="flaticon-phone-call"></span> {{$lead->phone}}--}}
                                {{--                                    </li>--}}
                                {{--                                </ul>--}}
                            </div>
                            <div class="btn-box">
                                <button class="theme-btn btn-style-one small bg-red" @click="deletePost(lead.id)">
                                    <i class="far fa-trash-alt mr-1"></i> Удалить заявку
                                </button>
                            </div>
                        </div>
                    </div>
                    <nav class="ls-pagination" v-show="leads.length > 0">
                        <ul>
                            <li class="prev">
                                <a @click="prevPage">
                                    <i class="flaticon-left"></i>Пред
                                </a>
                            </li>
                            <li class="next">
                                <a @click="nextPage">
                                    След<i class="flaticon-right"></i>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </section>
</div>
@push('scripts')
    <script>
        const leadFilter = {
            userId: "{{auth()->user()->id}}"
        };
    </script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{asset('user_assets/js/profileLeadsHandler.min.js')}}"></script>
@endpush
