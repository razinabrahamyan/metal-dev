new Vue({
    el: "#create_post_form",
    data: {
        images: null,
        timeoutQuery: null,
        addressGeoTimeout: null,
        needSearch: false,
        showGeoPointsForm: false,
        address: '',
        yandexAddresses: [],
        lat: '',
        lng: '',
        mainCategoryBoxes:[{
            counter:0,
            subcategories:[
                {
                    counter:1,
                    subcategory:null,
                    price:null
                },
            ],
            allowedSubcategories:{},
            chosenSubcategories:{},
            category:null
        }],
        mainCategories: {
        },
        chosenCategories:{

        },
        counter: 2,
        /*services:[],
        selectedServices:[],*/
        isDisabled: false,
    },
    watch: {
        address: function (value) {
            this.getYandexAddresses(value);
        },
        mainCategoryBoxes: function (newVal) {

        }
    },
    methods: {
        canAddSubcategories: function (index){
            let allowed_catgeories = this.mainCategoryBoxes[index].allowedSubcategories
            return this.mainCategoryBoxes[index].subcategories.length < this.objectSize(allowed_catgeories)
        },
        canAddCategories: function (){
            let allowed_catgeories = this.mainCategories
            return this.mainCategoryBoxes.length < this.objectSize(allowed_catgeories)
        },
        subcategorySelectCheck: function (cat_id,select_id,category_div_index){
            return !this.mainCategoryBoxes[category_div_index].chosenSubcategories.hasOwnProperty(cat_id) || this.mainCategoryBoxes[category_div_index].chosenSubcategories[cat_id] == select_id;
        },
        categorySelectCheck: function (cat_id,select_id){
            return !this.chosenCategories.hasOwnProperty(cat_id) || this.chosenCategories[cat_id] == select_id;
        },
        subcategoryPriceChange: function (e){
            let input_value = e.target.value;
            let category_div_index = e.target.getAttribute('data-index');
            let category_div_subindex = e.target.getAttribute('data-subindex');
            this.mainCategoryBoxes[category_div_index].subcategories[category_div_subindex].price = input_value;
        },
        onCategorySelectChange: function (e){
            let category_div_index = e.target.getAttribute('data-index');
            let category_select_id = e.target.getAttribute('data-id');
            let selected_value = e.target.value;
            let new_category_box = this.mainCategoryBoxes[category_div_index];
            new_category_box.category = selected_value;
            new_category_box.allowedSubcategories = this.mainCategories[selected_value].allowedCategories;
            new_category_box.chosenSubcategories = {};
            new_category_box.subcategories = [
                {
                    counter:this.counter,
                    subcategory:null,
                    price:null
                },
            ]
            new_category_box.category = null;
            this.mainCategoryBoxes[category_div_index] = new_category_box;
            this.counter += 1
            let chosenCategoriesArr = this.chosenCategories;
            let check = this.findValue(chosenCategoriesArr,category_select_id);
            if(check){
                delete chosenCategoriesArr[check]
            }
            chosenCategoriesArr[selected_value] = category_select_id;
            this.chosenCategories = chosenCategoriesArr;
            this.$forceUpdate()
        },
        onSubcategorySelectChange: function (e){
            let subcategory_select_id = e.target.getAttribute('data-id');
            let category_div_index = e.target.getAttribute('data-index');
            let category_div_subindex = e.target.getAttribute('data-subindex');
            let selected_value = e.target.value;
            let chosenSubcategories = this.mainCategoryBoxes[category_div_index].chosenSubcategories;
            this.mainCategoryBoxes[category_div_index].subcategories[category_div_subindex].subcategory = selected_value;
            let check = this.findValue(chosenSubcategories,subcategory_select_id);
            if(check){
                delete chosenSubcategories[check]
            }
            chosenSubcategories[selected_value] = subcategory_select_id;
            this.mainCategoryBoxes[category_div_index].chosenSubcategories = chosenSubcategories;
            this.$forceUpdate()
        },
        findValue: function (o, value){
            for (var prop in o) {
                if (o.hasOwnProperty(prop) && o[prop] == value) {
                    return prop;
                }
            }
            return false;
        },
        addCategory: function (){
            let id = null;
            let allowed_categories = {};
            if(this.objectSize(this.chosenCategories) === this.objectSize(this.mainCategories)-1){
                id = this.getDifferenceId(this.chosenCategories,this.mainCategories)
                this.chosenCategories[id] = this.counter;
                allowed_categories = this.mainCategories[id].allowedCategories;
            }
            let newCategoryObject = {
                counter: this.counter,
                subcategories:[
                    {
                        counter:this.counter + 1,
                        subcategory:null,
                        price:null
                    },
                ],
                allowedSubcategories:allowed_categories,
                chosenSubcategories:{},
                category:id
            };
            this.counter += 2;
            this.mainCategoryBoxes.push(newCategoryObject)
        },
        addSubCategory: function (index){
            let category_box = this.mainCategoryBoxes[index];
            let id = null;
            if(this.objectSize(category_box.chosenSubcategories) === this.objectSize(category_box.allowedSubcategories)-1){
                id = this.getDifferenceId(category_box.chosenSubcategories,category_box.allowedSubcategories)
                category_box.chosenSubcategories[id] = this.counter;
            }
            category_box.subcategories.push({
                counter: this.counter,
                subcategory:id,
                price:null
            })
            this.mainCategoryBoxes[index] = category_box;

            this.counter += 1;
        },
        getDifferenceId: function (selectedObj,allowedObj){
            for (key in allowedObj) {
                if (allowedObj.hasOwnProperty(key)){
                    if(!selectedObj.hasOwnProperty(key)){
                        return key;
                    }
                }
            }
            return null;

        },
        objectSize: function (object){
            let size = 0, key;
            for (key in object) {
                if (object.hasOwnProperty(key))
                    size++;
            }
            return size;
        },
        removeSubcategory: function (category_index,subcategory_index,data_id,main_cat_id){
            if(this.mainCategoryBoxes[category_index].subcategories.length > 1 || this.mainCategoryBoxes.length > 1){
                let arr = this.mainCategoryBoxes[category_index].subcategories;
                if(arr.length > 1){
                    let chosenSubcategories = this.mainCategoryBoxes[category_index].chosenSubcategories;
                    let check = this.findValue(chosenSubcategories,data_id);
                    if(check){
                        delete chosenSubcategories[check]
                    }
                    this.mainCategoryBoxes[category_index].chosenSubcategories = chosenSubcategories;
                    this.mainCategoryBoxes[category_index].subcategories.splice(subcategory_index,1)
                    this.$forceUpdate()
                }else{
                    let chosenCategories = this.chosenCategories;
                    let check = this.findValue(chosenCategories,main_cat_id);
                    if(check){
                        delete chosenCategories[check]
                    }
                    this.chosenCategories = chosenCategories;
                    this.mainCategoryBoxes.splice(category_index,1)
                }
            }

        },
        mll: function (){

        },
        createPost: function (e) {
            e.preventDefault();
            this.isDisabled = true;

            const config = {
                headers: {
                    Accept: 'application/json',
                    'Content-Type': 'multipart/form-data',
                }
            }
            let data = new FormData(e.target);
            data.append('files', this.images);
            axios.post('/axios/post/create', data, config).then(response => {
                if (Object.keys(response.data.invalidRules).length > 0) {
                    this.isDisabled = false;

                    DomHelpers.scrollToElement(Object.keys(response.data.invalidRules)[0], '.add-listing-section')
                    $.each(response.data.invalidRules, function (selector, message) {
                        AlertNotification.appendElementError(selector, message[0])
                    })
                } else {
                    window.location.href = response.data.redirectTo;
                }
            }).catch(e => {
                this.isDisabled = false;
                console.log(e);
            });
        },
        onFileChange: function (e) {
            this.images = e.target.files;
        },
        getAddresses: function () {
            axios.post('/axios/decode-address', {
                'address': this.address,
            }).then(response => {
                let data = response.data;
                this.lat = data.latitude;
                this.lng = data.longitude;
                this.showGeoPointsForm = (!data.latitude || !data.longitude);
            }).catch(e => {
                console.log(e);
            });
        },
        getYandexAddresses: function (value) {
            if (this.timeoutQuery) {
                clearTimeout(this.timeoutQuery)
            }
            this.timeoutQuery = setTimeout(() => {
                if (value !== '') {
                    //очищаем содержимое блока с подсказкой
                    this.yandexAddresses = [];
                    let yandexAddressesResult = [];
                    let city = $('#city').val() + ',' ?? $('#city').val();

                    ymaps.suggest(city + value).then(function (items) {
                        //заполняем содержимое блока с подсказкой
                        if (items.length > 0) {
                            $.each(items, function (key, value) {
                                yandexAddressesResult.push(value.displayName);
                            });
                        }
                    });
                    this.yandexAddresses = yandexAddressesResult;
                } else {
                    //если пустая строка - скрываем блок с подсказкой
                    this.needSearch = false;
                    this.lat = this.lng = '';
                }
            }, 500);
        },
        selectAddress: function (value) {
            this.address = value;
            this.needSearch = false;
            this.getAddresses();
        },
        searchAddress: function () {
            this.needSearch = true;
            if (this.addressGeoTimeout) {
                clearTimeout(this.addressGeoTimeout)
            }
            this.addressGeoTimeout = setTimeout(() => {
                this.getAddresses();
            }, 500);
        },
        /*onServiceCheckboxChecked: function (e){
            console.log(e.target.value)
        }*/
    },
    created(){
        axios.get('/axios/get-categories').then(response => {
            let main_obj = this.mainCategories;

            response.data.categories.forEach(function (value){
                let subcat_obj = {};
                value.subcategories.forEach(function (subcat){
                    subcat_obj[subcat.id] = {
                        id:subcat.id,
                        title:subcat.title,
                    }
                })
                main_obj[value.id] = {
                    id:value.id,
                    title:value.title,
                    allowedCategories:subcat_obj
                }
            })
            this.mainCategories = main_obj;
/*
            let mainServices = this.services;
            response.data.services.forEach(function (value){
                mainServices.push({
                    id:value.id,
                    title:value.title
                })
            })
            this.services = mainServices;*/

            this.$forceUpdate()
        }).catch(e => {
            console.log(e);

        });
    },
    mounted() {
        phoneHandler.addMask();
    },
    updated(){
        // console.log(this.mainCategoryBoxes)
    },
});
function makeChosen(){
    $(".chosen-select").chosen({
        disable_search_threshold: 200,
        max_selected_options:1,
        allow_single_deselect:true,
        width:'100%',
    });
    return true
}
$.fn.isInViewport = function() {
    let elementTop = $(this).offset().top;
    let viewportTop = $(window).scrollTop();

    return elementTop > viewportTop +85  && elementTop < viewportTop+200;
};
let CURRENT_ITEM = null;
$(document).on('scroll',function (){
    $('.ls-widget').each(function (){
        if($(this).isInViewport() && CURRENT_ITEM !== $(this).attr('id')){
            let ID = $(this).attr('id');
            $('.ls-widget').removeClass('active');
            $(this).addClass('active');
            $('.listing-content-list li').removeClass('active');
            $('.listing-content-list li[data-target="#'+ ID +'"]').addClass('active');
            CURRENT_ITEM = $(this).attr('id');
        }
    })
})
$('.working_title_button').click(function (){
    if($(this).parent().hasClass('active')){
        $(this).parent().removeClass('active')
    }else{
        $('.time-table-block').removeClass('active')
        $(this).parent().addClass('active')
    }
})
$('.delete_worktime_button').click(function (){
    let parent_elem = $(this).parents('.time-table-block');
    parent_elem.animate({
        opacity:0
    },300,function () {
        parent_elem.remove()
    })
})
$("input.post_images").MultiFile({
    list: ".file-upload-previews-create"
});
$("input.post_cover").MultiFile({
    list: ".file-upload-cover-create"
});
