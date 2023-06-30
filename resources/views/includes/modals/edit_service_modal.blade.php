<div class="modal not_target" id="edit_service_modal">
    <div id="login-modal">
        <div class="">
            <h3>Редактировать Услугу</h3>
            <form action="#" method="post" v-on:submit="updateService">
                @csrf
                <div class="form-widget mt-2">
                    <div class="default-form">
                        <div>
                            <input type="hidden" name="service_id" v-bind:value="edit.id">
                        </div>
                        <div class="form-group">
                            <div>
                                <label class="form-lab" for="service">Цена</label>
                                <input required type="number" name="price" v-bind:value="edit.price">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-lab" for="desription_edit">Описание</label>
                            <textarea v-bind:value="edit.description" class="" name="description"
                                      id="desription_edit" cols="20" rows="3"></textarea>
                        </div>
                        <div v-if="edit.images.length" class="form-group">
                            <label  for="123">Фотографии</label>
                            <div class="">
                                <div v-for="image in edit.images"
                                     v-bind:class="[{ removed: isImageRemoved(image) }, 'edit_image_block']">
                                    <a v-if="!isImageRemoved(image)" role="button" class="remove_image"
                                       v-on:click="removeServiceImage(image)">x</a>
                                    <span>
                                        <img :src="'/'+image.name" >
                                    </span>
                                    <div class="restore" v-if="isImageRemoved(image)">
                                        <a class="btn" role="button"
                                           v-on:click="restoreServiceImage(image)">Восстановить</a>
                                    </div>
                                </div>
                            </div>

                            <div class="removed_images">
                                <div v-for="removedImage in removedImages">
                                    <input type="hidden" name="removedImages[]" :value="removedImage">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="123">Добавить Фотографии</label>
                            <div class="">
                                <div class="file-upload-previews file-upload-previews-edit">
                                </div>
                                <div class="file-upload">
                                    <input v-on:change="editImageAdded"
                                           class="file-upload-input edit_images with-preview"
                                           type="file" name="images[]" accept="" id="upload_edit" multiple/>
                                    <span>Нажмите или перенесите фото сюда </span>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="form-group mt-2 d-flex edit_service_modal_buttons justify-content-between align-items-end">
                    <button v-bind:disabled="isEditButtonDisabled()"
                            type="submit" class="theme-btn btn-style-three">Сохранить</button>
                    <a v-on:click="deleteService(edit)" role="button" class="text-danger">Удалить Услугу</a>
                </div>
            </form>

        </div>
    </div>
</div>
