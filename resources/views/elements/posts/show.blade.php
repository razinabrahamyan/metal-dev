<section class="listing-banner-four post-show-container" id="banner">
    <div class="cotnent-outer">
        <div class="auto-container">
            <div class="content-box">
                <figure class="image user-image">
                    <img src="{{asset(\App\Classes\Helpers\UserHelper::getAuthAvatar())}}" alt="avatar"
                         class="thumb user-avatar">
                </figure>
                <h3>{{$post->creator->company_name}}</h3>
            </div>
            <div class="price-box">
                <a href="#" class="theme-btn btn-style-one" @click="callbackPopup">
                    <i class="fas fa-phone-volume mr-2"></i> Заказать звонок
                </a>
            </div>
        </div>
    </div>
</section>
<div class="sidebar-page-container bg_alice">
    <div class="auto-container">
        <div class="row">
            <div class="content-side col-lg-8 col-md-12 col-sm-12">
                <div class="listing-single">
                    <div class="description-widget ls-widget">
                        <div class="widget-title">
                            <h4 class="p-0">
                                <i class="far fa-address-card mr-2"></i> Описание
                            </h4>
                        </div>
                        <div class="widget-content">
                            <h3>{{$post->title}}</h3>
                            @php($split_arr = explode(PHP_EOL,$post->description))
                            @foreach($split_arr as $par)
                                <p>{{$par}}</p>
                            @endforeach
                        </div>
                    </div>
                    <div class="gallery-widget ls-widget">
                        <div class="widget-title">
                            <h4 class="p-0">
                                <i class="far fa-images mr-2"></i>
                                Галерея
                            </h4>
                        </div>
                        <div class="widget-content">
                            <div class="carousel-outer">
                                <ul class="image-carousel owl-carousel owl-theme default-nav">
                                    @foreach($post->images as $image)
                                        <li>
                                            <a href="{{asset($image->name)}}"
                                               class="lightbox-image" title="Image Caption Here">
                                                <img src="{{asset($image->name)}}"
                                                     alt="">
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                                <ul class="thumbs-carousel owl-carousel owl-theme default-nav">
                                    @foreach($post->images as $image)
                                        <li class="owl_list_img_item">
                                            <img src="{{asset($image->name)}}" alt="">
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="container d-flex row justify-content-between p-0 ml-0 mr-0">
                        <div class=" col-lg-6 col-md-6 col-sm-12 col-xs-12 p-0 pr-lg-3 pl-lg-0">
                            <div class="info-widget ls-widget">
                                <div class="widget-title">
                                    <h4 class="p-0">
                                        <i class="fas fa-phone-volume mr-2"></i> Контактная Информация
                                    </h4>
                                </div>
                                <div class="widget-content">
                                    <ul class="contact-info-list">
                                        <li class="d-flex p-0">
                                            <div class="col-1 p-0">
                                                <i class="fas fa-map-marker-alt fa-lg mr-3"></i>
                                            </div>
                                            <div class="col-11 p-0">
                                                <a href="https://yandex.ru/maps/?text={{$post->address['address']}}"
                                                   target="_blank">
                                                    {{$post->address['address']}}
                                                </a>
                                            </div>
                                        </li>
                                        <li class="d-flex p-0">
                                            <div class="col-1 p-0">
                                                <i class="fas fa-phone-volume fa-lg mr-3"></i>
                                            </div>
                                            <div class="col-11 p-0">
                                                <a href="tel:{{$post->creator->phone}}">{{$post->creator->phone}}</a>
                                            </div>
                                        </li>
                                        <li class="d-flex p-0">
                                            <div class="col-1 p-0">
                                                <i class="fas fa-globe fa-lg mr-3"></i>
                                            </div>
                                            <div class="col-11 p-0">
                                                <a href="{{$post->creator->website}}">{{$post->creator->website}}</a>
                                            </div>
                                        </li>
                                    </ul>
                                    @if(!empty($post->socials))
                                        <ul class="social-icon-two">
                                            @if(!empty($post->socials->whatsapp))
                                                <li>
                                                    <a href="https://wa.me/{{$post->socials->whatsapp}}"
                                                       target="_blank">
                                                        <i class="fab fa-whatsapp fa-lg"></i>
                                                    </a>
                                                </li>
                                            @endif
                                            @if(!empty($post->socials->telegram))
                                                <li>
                                                    <a href="https://t.me/{{$post->socials->telegram}}" target="_blank">
                                                        <i class="fab fa-telegram-plane fa-lg"></i>
                                                    </a>
                                                </li>
                                            @endif
                                            @if(!empty($post->socials->viber))
                                                <li>
                                                    <a href="viber://add?{{$post->socials->viber}}" target="_blank">
                                                        <i class="fab fa-viber fa-lg"></i>
                                                    </a>
                                                </li>
                                            @endif
                                        </ul>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class=" col-lg-6 col-md-6 col-sm-12 col-xs-12 p-0 p-lg-0">
                            <div class="info-widget ls-widget">
                                <div class="widget-title">
                                    <h4 class="p-0">
                                        <i class="far fa-clock mr-2"></i> График Работы
                                    </h4>
                                    @if(\App\Classes\Helpers\ScheduleHelper::isPostWorkTime($post))
                                        <span class="status text-success">Открыто</span>
                                    @else
                                        <span class="status text-danger">Закрыто</span>
                                    @endif
                                </div>
                                <div class="widget-content">
                                    <ul class="timing-list">
                                        @php($working_day = $post->work_hours)
                                        @foreach($week_day_translations as $day => $perevod)
                                            <li class="{{$loop->iteration%7 == date('w')? 'active':''}}">
                                                <span>{{$perevod}}</span>
                                                <span>{{$working_day[$day]['start']['hour'].':'.$working_day[$day]['start']['minute'].' - '.$working_day[$day]['end']['hour'].':'.$working_day[$day]['end']['minute']}}</span>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="sidebar-side col-lg-4 col-md-12 col-sm-12">
                <aside class="sidebar">
                    <div class="ls-widget prices_list">
                        <div class="widget-title">
                            <h4 class="p-0">
                                <i class="fas fa-dollar-sign mr-2"></i> Цены
                            </h4>
                        </div>
                        <div class="widget-content">
                            <ul class="timing-list">
                                @if($subCategories)
                                    @foreach($subCategories as $subCategory)
                                        <div class="container p-0 mb-3">
                                            <li class="category col-12 p-0">
                                                <span>{{$subCategory->first()->category->title}}</span>
                                            </li>
                                            <div class="container pr-0 mt-1">
                                                @foreach($subCategory as $subCategoryValue)
                                                    <li class="d-flex col-12">
                                                            <span class="col-8">
                                                                {{$subCategoryValue->subCategory->title}}
                                                            </span>
                                                        <span class="col-4">
                                                                {{$subCategoryValue->price}}
                                                                <i class="fas fa-ruble-sign fa-sm"></i>
                                                            </span>
                                                    </li>
                                                    <hr class="col-12 m-0 p-0">
                                                @endforeach
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <h6>Нет цен</h6>
                                @endif
                            </ul>
                        </div>
                    </div>

                </aside>
            </div>
        </div>
        <div class="comments-widget ls-widget">
            <div class="widget-title">
                <h4 class="p-0">
                    <i class="far fa-comments mr-2"></i> Комментариев: {{$post->comments->count()}}
                </h4>
            </div>
            <div class="widget-content">
                @forelse($post->comments as $comment)
                    <div class="comment-box">
                        <div class="comment">
                            <div class="user-thumb"><img
                                    src="{{\App\Classes\Helpers\UserHelper::avatar($comment->author->avatar)}}"
                                    alt=""></div>
                            <div
                                class="user-name">{{$comment->author->full_name['first_name'].' '.$comment->author->full_name['last_name']}}</div>
                            <div class="comment-info">
                                <ul class="rating">
                                    <li><span class="fa fa-star"></span></li>
                                    <li><span class="fa fa-star"></span></li>
                                    <li><span class="fa fa-star"></span></li>
                                    <li><span class="fa fa-star"></span></li>
                                    <li><span class="fa fa-star"></span></li>
                                </ul>
                                <div
                                    class="comment-time">{{\Carbon\Carbon::parse($comment->created_at)->format('Y/m/d H:i')}}</div>
                            </div>
                            <div class="text">{{$comment->comment}}</div>
                        </div>
                    </div>
                @empty
                @endforelse
            </div>
        </div>
        @auth()
            <div class="comments-form-widget ls-widget">
                <div class="widget-title">
                    <h4 class="p-0">
                        <i class="fas fa-pen fa-xs mr-2"></i> Оставить Комментарий
                    </h4>
                </div>
                <div class="widget-content">
                    <div class="comment-form default-form">
                        <form action="{{route('post.comment')}}" method="post">
                            @csrf
                            <div>
                                <input type="hidden" name="post_id" value="{{$post->id}}">
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                    <textarea class="darma" name="comment"
                                              placeholder="Оставьте комментарий для улучшения обслуживания"></textarea>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                    <button class="theme-btn btn-style-two" type="submit"
                                            name="submit-form">Подтвердить
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endauth
    </div>
</div>

@push('scripts')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"
            integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw=="
            crossorigin="anonymous"></script>
    <script>
        const postId = "{{$post->id}}";
    </script>
    <script src="{{asset('user_assets/js/postShowHandler.min.js')}}"></script>
@endpush
