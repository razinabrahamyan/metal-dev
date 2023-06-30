<section class="add-listing-section">
    <div class="auto-container">
        <div class="row">
            <div class="sidebar-column sidebar-side sticky-container col-lg-4 col-md-12 col-sm-12">
                <aside class="sidebar theiaStickySidebar">
                    <div class="sticky-sidebar">
                        <ul class="listing-content-list">
                            <li data-target="#General" class="d-flex active">
                                <div class="col-2 p-0"><i class="far fa-address-card mr-3"></i></div>
                                <div class="col-10 p-0">Описание</div>
                            </li>
                            <li data-target="#Images" class="d-flex">
                                <div class="col-2 p-0"><i class="far fa-images"></i></div>
                                <div class="col-10 p-0">Галерея</div>
                            </li>
                            <li data-target="#Location" class="d-flex">
                                <div class="col-2 p-0"><i class="fas fa-map-marker-alt"></i></div>
                                <div class="col-10 p-0"> Адрес</div>
                            </li>
                            <li data-target="#Contact-Information" class="d-flex">
                                <div class="col-2 p-0"><i class="fas fa-phone-volume"></i></div>
                                <div class="col-10 p-0"> Контактная Информация</div>
                            </li>
                            <li data-target="#Prices" class="d-flex">
                                <div class="col-2 p-0"><i class="fas fa-dollar-sign"></i></div>
                                <div class="col-10 p-0"> Цены</div>
                            </li>
                            <li data-target="#Work-Hours" class="d-flex">
                                <div class="col-2 p-0"><i class="far fa-clock"></i></div>
                                <div class="col-10 p-0"> График Работы</div>
                            </li>
                        </ul>
                    </div>
                </aside>
            </div>
            <div id="vue_form_handler" class="content-column col-lg-8 col-md-12 col-sm-12">
                <form id="create_post_form" @submit="createPost">
                    <div class="form-widget ls-widget" id="General">
                        <div class="widget-title">
                            <h4 class="pl-0">
                                <i class="far fa-address-card mr-3"></i> Описание
                            </h4>
                        </div>
                        <div class="widget-content">
                            <div class="default-form">
                                <div class="form-group">
                                    <label class="required" for="title">Заголовок</label>
                                    <input type="text" name="title" id="title">
                                </div>
                                <div class="form-group">
                                    <label class="required" for="description">Описание</label>
                                    <textarea name="description" id="description"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="uploading-widget ls-widget" id="Images">
                        <div class="widget-title">
                            <h4 class="pl-0">
                                <i class="far fa-images mr-3"></i> Галерея
                            </h4>
                        </div>
                        <div class="widget-content">
                            <div class="form-widget cover-upload mb-2">
                                <label for="upload_service">Обложка</label>
                                <div class="file-upload-previews file-upload-cover-create"></div>
                                <div class="file-upload">
                                    <input class="file-upload-input post_cover with-preview" @change="onFileChange"
                                           type="file" name="covers[]" id="upload_service" maxlength="1"/>
                                    <span>Нажмите или перенесите фото сюда</span>
                                </div>
                            </div>
                            <div class="form-widget images-upload">
                                <label for="upload_service">Изображения</label>
                                <div class="file-upload-previews file-upload-previews-create"></div>
                                <div class="file-upload">
                                    <input class="file-upload-input post_images with-preview" @change="onFileChange"
                                           type="file" name="images[]" id="upload_service" maxlength="10" multiple/>
                                    <span>Нажмите или перенесите фото сюда</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-widget ls-widget" id="Location">
                        <div class="widget-title">
                            <h4 class="pl-0">
                                <i class="fas fa-map-marker-alt mr-3"></i> Адрес
                            </h4>
                        </div>
                        <div class="widget-content">
                            <div class="default-form">
                                <div class="form-group">
                                    <label for="description">Город</label>
                                    <select id="city" autocomplete="off">
                                        <option selected>{{$city->title}}</option>
                                        @if(!empty($city->sub_regions))
                                            @foreach($city->sub_regions as $subCity)
                                                <option>{{$subCity}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Адрес</label>
                                    <input type="text" id="address" name="address" autocomplete="off"
                                           v-on:input="searchAddress" v-model="address">
                                    <div id="address_options_block" v-show="needSearch && yandexAddresses.length">
                                        <div id="address_options" v-show="needSearch">
                                            <div v-for="(index,key) in yandexAddresses" :key="key">
                                                <div class="address_option_item" @click="selectAddress(index)">
                                                    @{{index}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div v-show="showGeoPointsForm">
                                    <label class="col-lg-12 col-md-12 col-xs-12 text-left badge badge-danger">
                                        <span>Не удалось определить геопозицию адреса.</span><br>
                                        <span>Введите широту и долготу вручную.</span>
                                    </label>
                                    <div class="form-group">
                                        <label>Широта</label>
                                        <input type="text" name="lat" v-model="lat">
                                    </div>
                                    <div>
                                        <label>Долгота</label>
                                        <input type="text" name="lng" v-model="lng">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-widget ls-widget" id="Contact-Information">
                        <div class="widget-title">
                            <h4 class="pl-0">
                                <i class="fas fa-phone-volume mr-3"></i> Контактная Информация
                            </h4>
                        </div>
                        <div class="widget-content">
                            <div class="default-form">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" name="email">
                                </div>
                                {{--                                <div class="form-group">--}}
                                {{--                                    <label>Телефон <i class="fa fa-check phone_check"></i></label>--}}
                                {{--                                    <input type="text" id="phone" class="addQMask" name="phone" autocomplete="off">--}}
                                {{--                                </div>--}}
                                <div class="form-group">
                                    <label>Вебсайт</label>
                                    <input type="text" name="link">
                                </div>
                                <div class="form-group">
                                    <label>WhatsApp</label>
                                    <input type="text" id="whatsapp" class="addQMask" name="whatsapp" autocomplete="off"
                                           placeholder="Введите номер телефона WhatsApp">
                                </div>
                                <div class="form-group">
                                    <label>Telegram</label>
                                    <input type="text" id="telegram" name="telegram" autocomplete="off"
                                           placeholder="Введите имя пользователя телеграмм">
                                </div>
                                <div class="form-group">
                                    <label>Viber</label>
                                    <input type="text" id="viber" class="addQMask" name="viber" autocomplete="off"
                                           placeholder="Введите номер телефона Viber">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-widget ls-widget" id="Prices">
                        <div class="widget-title">
                            <h4 class="pl-0">
                                <i class="fas fa-money-check-alt mr-3"></i> Цены
                            </h4>
                        </div>
                        <div id="prices_widget">
                            <div class="widget-content" v-if="mainCategoryBoxes.length">
                                <div class="main_category_handler">
                                    <div class="main_category" v-for="(mainCategoryBox, index) in mainCategoryBoxes">
                                        <select class="main_category_select should_chosen"
                                                @change="onCategorySelectChange"
                                                v-bind:data-id="mainCategoryBox.counter"
                                                v-bind:data-index="index"
                                                v-bind:name="'prices['+index+'][category]'">
                                            <option selected disabled> Подкатегория</option>
                                            <option v-bind:selected="mainCategoryBox.category == mainCategory.id"
                                                    v-for="mainCategory in mainCategories"
                                                    v-if="categorySelectCheck(mainCategory.id, mainCategoryBox.counter)"
                                                    v-bind:value="mainCategory.id">@{{ mainCategory.title }}
                                            </option>
                                        </select>
                                        <div class="default-form flexible_desc" data-id="0">
                                            <div class="row pl-2  main_subcategory" v-bind:data-index="index"
                                                 v-bind:data-subindex="subIndex"
                                                 v-for="(subcategory, subIndex) in mainCategoryBox.subcategories">
                                                <div class="col-lg-5 col-8 form-group sub_select">
                                                    <label class="required" for="">Подкатегория</label>
                                                    <select v-bind:data-index="index"
                                                            v-bind:data-subindex="subIndex"
                                                            v-bind:data-id="subcategory.counter"
                                                            @change="onSubcategorySelectChange" required
                                                            v-bind:name="'prices['+index+'][subcategory]['+subIndex+'][subcategory]'"
                                                            class="subcategory_select should_chosen">
                                                        <option selected disabled> Подкатегория</option>
                                                        <option
                                                            v-if="subcategorySelectCheck(subcategoryValue.id, subcategory.counter,index)"
                                                            v-for="subcategoryValue in mainCategoryBox.allowedSubcategories"
                                                            v-bind:selected="subcategory.subcategory == subcategoryValue.id"
                                                            v-bind:value="subcategoryValue.id"> @{{
                                                            subcategoryValue.title }}
                                                        </option>
                                                    </select>
                                                </div>
                                                <div class="col-lg-5 col-8 form-group price_select">
                                                    <label class="required" for="">Цена</label>
                                                    <input v-bind:data-subindex="subIndex"
                                                           v-bind:data-index="index"
                                                           v-bind:value="subcategory.price"
                                                           @input="subcategoryPriceChange" required
                                                           v-bind:name="'prices['+index+'][subcategory]['+subIndex+'][price]'"
                                                           type="number">
                                                </div>
                                                <div class="category_delete_handler">
                                                    <div class="btn-box">
                                                        <button
                                                            @click="removeSubcategory(index,subIndex,subcategory.counter,mainCategoryBox.counter)"
                                                            type="button"
                                                            class=" delete_subcategory_button btn-style-delete"><span
                                                                class="flaticon-delete-button"></span> Удалить
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <button v-if="canAddSubcategories(index)" @click="addSubCategory(index)"
                                                    class="btn btn-style-three ml-auto d-block add_subcategory"
                                                    type="button" data-add="1" data-main="0" data-current="1">Добавить
                                                Подкатегорию
                                            </button>
                                        </div>

                                    </div>
                                </div>
                                <div>
                                    <button v-if="canAddCategories()" @click="addCategory" type="button" data-add="1"
                                            data-current="1" class="theme-btn btn-style-two mt-3" id="add_category">
                                        Добавить Категорию
                                    </button>
                                </div>
                            </div>
                        </div>
                        <button v-if="!mainCategoryBoxes.length" @click="addCategory" type="button"
                                class="btn btn-style-two" id="start_prices_widget">Добавить Цены1
                        </button>
                    </div>
                    <div class="timing-widget ls-widget" id="Work-Hours">
                        <div class="widget-title">
                            <h4 class="p-0">
                                <i class="far fa-clock mr-3"></i> График Работы
                            </h4>
                        </div>
                        <div class="widget-content">
                            <div class="time-table-outer">
                                <div class="table-title">
                                    <div class="title">От</div>
                                    <div class="title">До</div>
                                </div>
                                <div class="time-table">
                                    @foreach($week_days as $day => $translation)
                                        <div class="time-table-block">
                                                <span class="day working_title_button">
                                                    <span>{{$translation}}</span>
                                                    <span class="icon fa fa-chevron-down work_hour_chevron"></span>
                                                </span>
                                            <div class="working_select_handler">
                                                @for($i = 0; $i < 2; $i++)
                                                    <div class="time-dropdown">
                                                        @for($j = 0; $j < 2; $j++)
                                                            <select name="work_times[{{$day}}][{{$i}}][{{$j}}]"
                                                                {{--                                                                    class="flatpickr-time"--}}
                                                            >
                                                                @for($k = 0 ;$k < $time_count[$j] ; $k++)
                                                                    <option
                                                                        value="{{$k < 10? '0'.$k : $k}}">{{$k < 10? '0'.$k : $k}}</option>
                                                                @endfor
                                                            </select>
                                                        @endfor
                                                        @if($i===0)
                                                            <span>от</span>
                                                        @else
                                                            <span>до</span>
                                                        @endif
                                                    </div>
                                                @endfor
                                                <div class="btn-box">
                                                    <button type="button" class="delete_worktime_button"><span
                                                            class="flaticon-delete-button"></span> Удалить
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="btn-box margin-bottom-20">
                        <button type="submit" name="submit-form" class="theme-btn btn-style-two w-100"
                                :disabled='isDisabled'>
                            <span>Добавить Обьявление</span>
                            <span class="spinner-border spinner-border-sm wh-22p" role="status" v-show="isDisabled"
                                  aria-hidden="true"></span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"
            integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw=="
            crossorigin="anonymous"></script>
    <script src="{{asset('js/select2.min.js')}}"></script>
    <script src="{{asset('user_assets/js/postCreateHandler.min.js')}}"></script>
@endpush
