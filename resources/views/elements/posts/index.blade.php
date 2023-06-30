<section class="ls-section style-two">
    <div class="auto-container">
        <div class="row">
            <div class="filters-backdrop"></div>
            <div class="filters-column hide-left">
                <div class="inner-column">
                    <button type="button" class="theme-btn close-filters">X</button>
                    <ul class="top-filters">
                        <li class="active"><a href="#">Filters</a></li>
                        <li><a href="#">Catergory</a></li>
                    </ul>
                    <div class="listing-search-form">
                        <form>
                            <div class="row">
                                <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                    <input type="text" name="listing-search"
                                           placeholder="What are you looking for?">
                                </div>
                                <div class="form-group col-lg-12 col-md-12 col-sm-12 location">
                                    <input type="text" name="listing-search" placeholder="Lucation">
                                    <span class="icon flaticon-placeholder"></span>
                                </div>
                                <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                    <select class="chosen-select">
                                        <option>All Categories</option>
                                        <option>Residential</option>
                                        <option>Commercial</option>
                                        <option>Industrial</option>
                                        <option>Apartments</option>
                                    </select>
                                </div>
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
                    </div>
                    <div class="checkbox-outer">
                        <h4>Tags</h4>
                        <ul class="checkboxes two-column">
                            <li>
                                <input id="check-a" type="checkbox" name="check">
                                <label for="check-a">Wireless Internet</label>
                            </li>
                            <li>
                                <input id="check-b" type="checkbox" name="check">
                                <label for="check-b">Bike Parking</label>
                            </li>
                            <li>
                                <input id="check-c" type="checkbox" name="check">
                                <label for="check-c">Good for Kids</label>
                            </li>
                            <li>
                                <input id="check-d" type="checkbox" name="check">
                                <label for="check-d">Street Parking</label>
                            </li>
                            <li>
                                <input id="check-e" type="checkbox" name="check">
                                <label for="check-e">Cable TV</label>
                            </li>
                            <li>
                                <input id="check-f" type="checkbox" name="check">
                                <label for="check-f">Hair Dryer</label>
                            </li>
                            <li>
                                <input id="check-g" type="checkbox" name="check">
                                <label for="check-g">Kitchen</label>
                            </li>
                            <li>
                                <input id="check-h" type="checkbox" name="check">
                                <label for="check-h">Parking</label>
                            </li>
                        </ul>
                    </div>
                    <div class="btn-box">
                        <button type="submit" class="theme-btn btn-style-one">Search <span
                                class="flaticon-magnifying-glass"></span></button>
                    </div>
                </div>
            </div>
            <div class="content-column col-lg-12 col-md-12 col-sm-12">
                <div class="ls-outer">
                    <div class="row">
                        @foreach($posts as $post)
                            <a href="{{route('posts.show',$post->id)}}">
                                <div class="listing-block col-lg-4 col-md-6 col-sm-12">
                                    <div class="inner-box">
                                        <div class="image-box">
                                            <figure class="image"><img
                                                    src="{{$post->images->first()?asset($post->images->first()->name):asset('storage/user/images/post/no_photo.png')}}"
                                                    alt=""></figure>
                                            <div class="tags">
                                                <!--                                                <span>Featured</span>
                                                                                                <span>$25 - $35</span>-->
                                            </div>
                                            <a href="#" class="like-btn"><span class="flaticon-heart"></span>
                                                Save</a>
                                        </div>
                                        <div class="lower-content">
                                            <div class="user-thumb"><img
                                                    src="{{asset('storage/user/images/avatar/'.$post->creator->avatar)}}"
                                                    alt=""/></div>
                                            <div class="rating">
                                                <span class="fa fa-star"></span>
                                                <span class="fa fa-star"></span>
                                                <span class="fa fa-star"></span>
                                                <span class="fa fa-star"></span>
                                                <span class="fa fa-star"></span>
                                                <span class="title">(7 review)</span>
                                            </div>
                                            <h3>{{$post->title}}</h3>
                                            <div class="text">{{$post->description}}</div>
                                            <ul class="info">
                                                <li><span class="flaticon-pin"></span> Santa Monica, CA</li>
                                                <li><span class="flaticon-phone-call"></span> +61 2 8236 9200</li>
                                            </ul>
                                        </div>
                                        <!--                                        <div class="bottom-box">
                                                                                    <div class="places">
                                                                                        <div class="place"><span class="icon flaticon-bed"></span> Hotels </div>
                                                                                        <span class="count">+3</span>
                                                                                    </div>
                                                                                    <div class="status">Now Closed</div>
                                                                                </div>-->
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                    <!-- Pagination -->
                    <!--                        <nav class="ls-pagination">
                                                <ul>
                                                    <li class="prev"><a href="#"><i class="flaticon-left"></i> Prev</a></li>
                                                    <li><a href="#">1</a></li>
                                                    <li><a href="#" class="current-page">2</a></li>
                                                    <li><a href="#">3</a></li>
                                                    <li>...</li>
                                                    <li><a href="#">14</a></li>
                                                    <li class="next"><a href="#">Next <i class="flaticon-right"></i> </a></li>
                                                </ul>
                                            </nav>-->
                </div>
            </div>
        </div>
    </div>
</section>
