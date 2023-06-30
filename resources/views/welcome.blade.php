@extends('layouts.app')
@section('content')


    <!-- Banner Section / Style Two-->
    <section class="banner-section style-two">
        <!-- Background Layer -->
        <div class="background-layer" style="background-image: url('https://www.lomvtor.ru/images/sdat-chernyj-metallolom-v-podolske.jpg');"></div>
        <div class="auto-container">
            <div class="">
                <!-- Upper Heading -->
                <div class="upper-heading">
                    <div class="three-items-carousel owl-carousel owl-theme default-nav">
                        <!-- Listing lLock -->
                        <div class="listing-block">
                            <div class="inner-box">
                                <div class="image-box">
                                    <figure class="image"><img src="images/resource/listing/1-1.jpg" alt=""></figure>
                                    <div class="tags">
                                        <span>Featured</span>
                                        <span>$25 - $35</span>
                                    </div>
                                    <a href="#" class="like-btn"><span class="flaticon-heart"></span> Save</a>
                                </div>
                                <div class="lower-content">
                                    <div class="user-thumb"><img src="images/resource/user-thumb-1.jpg" alt="" /></div>
                                    <div class="rating">
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="title">(7 review)</span>
                                    </div>
                                    <h3><a href="#">Private Hotel-Spa <span class="icon icon-verified"></span></a></h3>
                                    <div class="text">Luxury hotel in the heart of Bloomsbury.</div>
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

                        <!-- Listing lLock -->
                        <div class="listing-block">
                            <div class="inner-box">
                                <div class="image-box">
                                    <figure class="image"><img src="images/resource/listing/1-2.jpg" alt=""></figure>
                                    <div class="tags">
                                        <span>Featured</span>
                                    </div>
                                    <a href="#" class="like-btn"><span class="flaticon-heart"></span> Save</a>
                                </div>
                                <div class="lower-content">
                                    <div class="user-thumb"><img src="images/resource/user-thumb-2.jpg" alt="" /></div>
                                    <div class="rating">
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="title">(7 review)</span>
                                    </div>
                                    <h3><a href="#">Moonlight Restourant </a></h3>
                                    <div class="text">Italian traditional served pizzeria.</div>
                                    <ul class="info">
                                        <li><span class="flaticon-pin"></span> Santa Monica, CA</li>
                                        <li><span class="flaticon-tray"></span> +61 2 8236 9200 </li>
                                    </ul>
                                </div>
                                <div class="bottom-box">
                                    <div class="places">
                                        <div class="place pink"><span class="icon flaticon-hotel-1"></span> Restourant </div>
                                        <span class="count">+3</span>
                                    </div>
                                    <div class="status">Open</div>
                                </div>
                            </div>
                        </div>

                        <!-- Listing lLock -->
                        <div class="listing-block">
                            <div class="inner-box">
                                <div class="image-box">
                                    <figure class="image"><img src="images/resource/listing/1-3.jpg" alt=""></figure>
                                    <a href="#" class="like-btn"><span class="flaticon-heart"></span> Save</a>
                                </div>
                                <div class="lower-content">
                                    <div class="user-thumb"><img src="images/resource/user-thumb-3.jpg" alt="" /></div>
                                    <div class="rating">
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="title">(7 review)</span>
                                    </div>
                                    <h3><a href="#">Best Museum</a></h3>
                                    <div class="text">This cafe is small but bustling.</div>
                                    <ul class="info">
                                        <li><span class="flaticon-pin"></span> Art & History</li>
                                        <li><span class="flaticon-phone-call"></span> +61 2 8236 9200 </li>
                                    </ul>
                                </div>
                                <div class="bottom-box">
                                    <div class="places">
                                        <div class="place purple"><span class="icon flaticon-museum"></span>Art & History </div>
                                        <span class="count">+3</span>
                                    </div>
                                    <div class="status">Now Closed</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

    @push('scripts')
<!--        <script>
                new Typed('.typed-words', {
                strings: ["Продай лом","Купи лом", "Купи цветмет", "Продай чермет"],
                typeSpeed: 80,
                backSpeed: 80,
                backDelay: 4000,
                startDelay: 1000,
                loop: true,
                showCursor: true
            })
        </script>-->
    @endpush


@endsection
