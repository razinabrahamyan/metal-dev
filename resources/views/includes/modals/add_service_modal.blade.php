<div class="modal not_target" id="service_modal">
    <div id="login-modal">
        <div class="">
            <h3>Добавить Услугу</h3>
            <form action="#" method="post" v-on:submit="createService">
                @csrf
                <div class="form-widget mt-2">
                    <div class="default-form">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-8">
                                    <label class="form-lab" for="service">Услуга</label>
                                    <select required class="" name="service" id="service_select">
                                        <option disabled selected>Выберите услугу</option>
                                        <option v-for="serviceType in serviceTypes"
                                                v-bind:value="serviceType.id">@{{ serviceType.title }}</option>
                                    </select>
                                </div>
                                <div class="col-4">
                                    <label class="form-lab" for="service">Цена</label>
                                    <input required type="number" name="price" v-model="price">
                                </div>
                            </div>


                        </div>

                        <div class="form-group">
                            <label class="form-lab" for="desription">Описание</label>
                            <textarea v-model="description" class=""
                                      name="description" id="description" cols="20" rows="3"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="123">Добавить Фотографии</label>
                            <div class="">
                                <div class="file-upload-previews file-upload-previews-post"></div>
                                <div class="file-upload">
                                    <input v-on:change="imageAdded"
                                           class="file-upload-input service_images with-preview"
                                           type="file" name="images[]" accept="" id="upload" multiple/>
                                    <span>Нажмите или перенесите фото сюда </span>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="form-group mt-2">
                    <button v-bind:disabled="isAddButtonDisabled()"
                            type="submit" class="theme-btn btn-style-three">Добавить</button>
                </div>
            </form>

        </div>
    </div>
</div>
