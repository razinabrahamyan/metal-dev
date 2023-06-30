@extends('layouts.app')
@section('content')
    <section class="profile-banner" style="background-image: url(images/background/7.jpg);">
        <div class="auto-container">
            <div class="profile-info">
                <div class="uesr-info">
                    <figure class="image"><img src="images/resource/profile-thumb.jpg" alt=""></figure>
                    <div class="user-name">{{$user->full_name['first_name'].' '.$user->full_name['last_name']}}</div>

                    <ul class="social-icon-four">
                        <li><a href="#"><span class="fab fa-facebook"></span></a></li>
                        <li><a href="#"><span class="fab fa-twitter"></span></a></li>
                        <li><a href="#"><span class="fab fa-instagram"></span></a></li>
                        <li><a href="#"><span class="fab fa-pinterest"></span></a></li>
                        <li><a href="#"><span class="fab fa-dribbble"></span></a></li>
                        <li><a href="#"><span class="fab fa-google"></span></a></li>
                    </ul>
                </div>

                <ul class="contact-info">
                    <li><a href="#"><span class="icon flaticon-mail"></span>{{$user->email}}</a></li>
                    <li><a href="#"><span class="icon flaticon-call"></span> {{$user->phone}}</a></li>
                    <li><a href="#"><span class="icon flaticon-send-1"></span> Send Message</a></li>
                </ul>
            </div>
        </div>
    </section>
    <!-- End Post Title --

    <!-- Profile Section -->
    <section class="profile-section">
        <div class="auto-container">
            <div class="row">
                <div class="listing-column col-lg-8 col-md-12">
                    <div class="inner-column">
                        <div class="listing-widget ls-widget">
                            <div class="widget-title"><h4><span class="icon fa-sm la la-layer-group"></span> My Listings</h4></div>
                            <div class="widget-content">
                                <!-- Listing Block Five -->

                                @foreach($user->posts as $post)
                                    <div class="listing-block-five">
                                        <div class="inner-box">
                                            <div class="image-box">
                                                <figure class="image"><img src="{{$post->images->first()?asset('storage/user/images/post/'.$post->images->first()->name):asset('storage/user/images/post/no_photo.png')}}" alt=""></figure>
<!--                                                <div class="tags">
                                                    <span>Featured</span>
                                                </div>-->
                                            </div>

                                            <div class="content-box">
                                                <div class="upper-box">
                                                    <div class="rating">
                                                        <span class="fa fa-star"></span>
                                                        <span class="fa fa-star"></span>
                                                        <span class="fa fa-star"></span>
                                                        <span class="fa fa-star"></span>
                                                        <span class="fa fa-star"></span>
                                                        <span class="title">(7 review)</span>
                                                    </div>
                                                    <h3><a href="#">{{$post->title}} <span class="icon icon-verified"></span></a></h3>
                                                    <div class="text">{{$post->description}}</div>
                                                    <ul class="info">
                                                        <li><span class="flaticon-pin"></span> Santa Monica, CA</li>
                                                        <li><span class="flaticon-phone-call"></span> +61 2 8236 9200 </li>
                                                    </ul>
                                                </div>
                                                <div class="bottom-box">
                                                    <div class="places">
                                                        <div class="place"><span class="icon flaticon-bed"></span> Hotels </div>
                                                        <span class="count">+3</span>
                                                    </div>
                                                    <div class="status">Now Closed</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>

                <div class="review-column col-lg-4 col-md-12">
                    <div class="inner-column">
                        <!--  Widget -->
                        <div class="ls-widget">
                            <div class="widget-title"><h4><span class="icon flaticon-chat-comment-oval-speech-bubble-with-text-lines"></span> Your Reviews</h4></div>
                            <div class="widget-content">
                                <!-- Comment Box -->
                                <div class="comment-box">
                                    <!-- Comment -->
                                    <div class="comment">
                                        <div class="user-thumb"><img src="images/resource/avatar-1.jpg" alt=""></div>
                                        <div class="user-name">Helena</div>
                                        <div class="comment-info">
                                            <ul class="rating">
                                                <li><span class="fa fa-star"></span></li>
                                                <li><span class="fa fa-star"></span></li>
                                                <li><span class="fa fa-star"></span></li>
                                                <li><span class="fa fa-star"></span></li>
                                                <li><span class="fa fa-star"></span></li>
                                            </ul>
                                            <div class="comment-time">April 25, 2019 at 10:46 am</div>
                                        </div>
                                        <span class="title">Really cool and surprisingly affordable</span>
                                        <div class="text">Morbi velit eros, sagittis in facilisis non, tortor imperdiet vitae. Curabitur lacinia </div>
                                    </div>
                                </div>

                                <!-- Comment Box -->
                                <div class="comment-box">
                                    <!-- Comment -->
                                    <div class="comment">
                                        <div class="user-thumb"><img src="images/resource/avatar-3.jpg" alt=""></div>
                                        <div class="user-name">Adam Gilchrist</div>
                                        <div class="comment-info">
                                            <ul class="rating">
                                                <li><span class="fa fa-star"></span></li>
                                                <li><span class="fa fa-star"></span></li>
                                                <li><span class="fa fa-star"></span></li>
                                                <li><span class="fa fa-star"></span></li>
                                                <li><span class="fa fa-star"></span></li>
                                            </ul>
                                            <div class="comment-time">April 25, 2019 at 10:46 am</div>
                                        </div>
                                        <span class="title">Really cool and surprisingly affordable</span>
                                        <div class="text">Morbi velit eros, sagittis in facilisis non, tortor imperdiet vitae. Curabitur lacinia </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
