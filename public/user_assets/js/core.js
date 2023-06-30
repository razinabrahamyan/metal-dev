let AlertNotification = new (function () {
    this.alertTarget = undefined;

    this.alertSuccess = function (message, hideTimeOut = 5000) {
        if (message !== "" && message !== null) {
            //Убираем старый блок
            $('#alert_success').remove();

            //Подготовка внедрения оповещения
            let desk = $('<div class="alert_div animate__animated card" id="alert_success" onclick="AlertNotification.closeNotificationBlock()">' +
                '<p class="mb-0" id="alert_message">' + message + '</p>' +
                '</div>');
            AlertNotification.alertTarget = desk;

            //Запускаем анимацию
            $('body').prepend(desk);
            desk.show().addClass('animate__fadeInDown');

            //Если укзано время то запускаем таймер закрытия
            if (hideTimeOut > 0) {
                setTimeout(function () {
                    AlertNotification.closeNotificationBlock(desk);
                }, hideTimeOut)
            }
        }
    };

    this.closeNotificationBlock = function () {
        if (AlertNotification.alertTarget !== undefined) {
            AlertNotification.alertTarget.removeClass('animate__fadeInDown').addClass('animate__bounceOutRight')
            AlertNotification.alertTarget = undefined;
        }
    };

    this.appendElementError = function (element, message) {
        if (!$(element).hasClass('element-error')) {
            $(element).addClass('element-error')
                .after("<label class='message-error'>" + message + "</label>")
                .click(function () {
                    $(element).removeClass('element-error');
                    $(element).parent().find('.message-error').remove();
                });
        }
    }
});

let DomHelpers = new (function () {
    this.scrollToElement = function (scrollTo, container, scrollTime = 500, additionalScrollHeight = 40) {
        $([document.documentElement, document.body]).animate({
            scrollTop: ($(scrollTo).offset().top - additionalScrollHeight) - $(container).offset().top + $(container).scrollTop()
        }, scrollTime);
    };

    this.copyTextFromElement = function (element) {
        var tmp = $("<textarea>");
        $("body").append(tmp);
        tmp.val($(element).text()).select();
        document.execCommand("copy");
        tmp.remove();

        AlertNotification.alertSuccess('Скопировано');
    };

    this.copyToClipboard = function (text) {
        var textField = document.createElement('textarea');
        textField.innerText = text;
        document.body.appendChild(textField);
        textField.select();
        textField.focus();
        document.execCommand('copy');
        textField.remove();

        AlertNotification.alertSuccess('Скопировано');
    };

});

let ImageHandler = new (function () {
    this.post = [];
    this.changeImageOnInput = function (input, target) {
        var url = input.value;
        var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
        if (input.files && input.files[0] && (ext == "gif" || ext == "png" || ext == "jpeg" || ext == "jpg")) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $(target).attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
});

let phoneHandler = new (function () {
    this.addMask = function (target = ".addQMask", onCompeteTarget = ".phone_check") {
        let mask = $(target),
            maskValue = mask.val();
        if (mask.length > 0) {
            mask.mask("+7(999)999-99-99", {
                onComplete: function () {
                    $(onCompeteTarget).addClass('success');
                },
                onChange: function () {
                    if (maskValue.length === 16) {
                        $(onCompeteTarget).addClass('success');
                    } else {
                        $(onCompeteTarget).removeClass('success');
                    }
                },
            }).bind('paste', function (e) {
                e.preventDefault();
                mask.val(e.originalEvent.clipboardData.getData('Text').replace(/\D/g, ''))
                    .trigger('input');
            });

            if (maskValue.length === 16) {
                mask.trigger('input');
            }
        }
    };
});

let postMapHandler = new (function () {
    this.posts = [];
    this.objectManager = undefined;
    this.postsMap = undefined;

    this.markerItem = function (params) {
        return ('<div class="listing-block-six map_item simple_item">' +
            '            <div class="inner-box">' +
            '            <div class="image-box">' +
            '            <figure class="image"><img src="' + params.image + '" alt=""></figure>' +
            '    </div>' +
            '    <div class="content">' +
            '    <h3><a href="/posts/' + params.id + '">' + params.title + '</a></h3>' +
            '    <ul class="info">' +
            '       <li><i class="fas fa-map-marker-alt mr-2"></i>' +
            '<a href="https://yandex.ru/maps/?text=' + params.address + '" target="_blank"  class="text-secondary hc-oragne">' + params.address +
            '</a>' +
            '</li>' +
            '<li><i class="fas fa-phone-volume mr-2"></i>' +
            '<a href="tel:' + params.phone + '" class="hc-oragne text-secondary">' + params.phone + '</a>' +
            '</li>' +
            '</ul>' +
            '</div>' +
            '</div>' +
            '</div>')
    }

    this.markerItem2 = function (params) {
        return ('<div class="listing-block-two map_cont">' +
            '        <div class="inner-box">' +
            '        <div class="image-box">' +
            '        <figure class="image"><img src="' + params.image + '" alt=""></figure>' +
            '    <div class="content">' +
            '        <h3><a href="/posts/' + params.id + '">' + params.title + '<span class="icon icon-verified"></span> </a></h3>' +
            '        <ul class="info">' +
            '            <li><i class="fas fa-map-marker-alt mr-2"></i>' +
            '<a href="https://yandex.ru/maps/?text=' + params.address + '" target="_blank"  class="hc-oragne text-white">' + params.address + '</a></li>' +
            '       <li><i class="fas fa-phone-volume mr-1"></i>' +
            '            <a href="tel:' + params.phone + '" class="hc-oragne text-white">' + params.phone + '</a></li>' +
            '        </ul>' +
            '    </div>' +
            '    </div>' +
            '    </div>' +
            '    </div>')
    }

    this.initMapObjects = function () {
        let myGeoObjectsManager = [];
        let polygonLayout = ymaps.templateLayoutFactory.createClass('<div class="placemark_layout_container"><div class="polygon_layout"><img src="$[properties.image]" alt=""></div></div>');

        function clusterCard(title, image) {
            return ('<div class="map_marker_description">' +
                '                    <img src="' + image + '" alt="">' +
                '                    <p>' + title + '</p>' +
                '            </div>')
        }

        let customItemContentLayout = ymaps.templateLayoutFactory.createClass(
            '<div class=ballon_body>$[properties.balloonContentBody]</div>'
        );
        postMapHandler.objectManager = new ymaps.ObjectManager({
            clusterize: true,
            clusterDisableClickZoom: true,
            clusterBalloonItemContentLayout: customItemContentLayout,
            clusterBalloonMaxHeight: 500,
        });

        $.each(postMapHandler.posts, function (index, post) {
            let myGeoObjectsManagerData = undefined,
                image = (post.images[0] !== undefined) ? post.images[0].name : '',
                markerParams = {
                    title: post.title,
                    address: post.address['address'],
                    image: image,
                    id: post.id,
                    phone: post.creator.phone
                };

            if (post.creator.pack_id === 3) {
                myGeoObjectsManagerData = {
                    "type": "Feature",
                    "id": post.id,
                    "options": {
                        iconLayout: polygonLayout,
                        iconShape: {
                            type: 'Polygon',
                            coordinates: [
                                [[-25, -63], [25, -63], [25, -13], [12, -13], [0, 0], [-12, -13], [-25, -13]]
                            ]
                        },
                    },
                    "properties": {
                        hintContent: post.title,
                        balloonContent: postMapHandler.markerItem(markerParams),
                        clusterCaption: clusterCard(post.title, image),
                        balloonContentBody: postMapHandler.markerItem2(markerParams),
                        size: '',
                        balloonPanelMaxMapArea: 0,
                        image: post.creator.avatar ?? 'images/default_avatar.png'
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [post.address['lat'], post.address['lng']]
                    }
                };
            } else {
                myGeoObjectsManagerData = {
                    "type": "Feature",
                    "id": post.id,
                    "options": {
                        iconShape: {
                            type: 'Polygon',
                            coordinates: [
                                [[-25, -63], [25, -63], [25, -13], [12, -13], [0, 0], [-12, -13], [-25, -13]]
                            ]
                        },
                        preset: 'islands#darkOrangeDotIcon'
                    },
                    "properties": {
                        hintContent: post.title,
                        balloonContent: postMapHandler.markerItem(markerParams),
                        clusterCaption: clusterCard(post.title, image),
                        balloonContentBody: postMapHandler.markerItem(markerParams),
                        size: '',
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [post.address['lat'], post.address['lng']]
                    },
                };
            }
            myGeoObjectsManager.push(myGeoObjectsManagerData);
        });

        postMapHandler.objectManager.add({
            "type": "FeatureCollection",
            "features": myGeoObjectsManager
        });
        postMapHandler.postsMap.geoObjects.add(postMapHandler.objectManager);
        postMapHandler.postsMap.events.add('click', e => e.get('target').balloon.close());

        $('.posts_preview').mouseenter(function () {
            postMapHandler.objectManager.objects.balloon.open(postMapHandler.posts[$(this).find('.posts_sidebar').data('post')].id);
        })
    }

    this.init = function () {
        let cityTarget = $('.city:selected'),
            mapCenter = [cityTarget.data('lat'), cityTarget.data('lon')],
            zoom = 10;
        if (postMapHandler.postsMap === undefined) {
            postMapHandler.postsMap = new ymaps.Map("map", {
                center: mapCenter,
                zoom: zoom,
                controls: [],
            }, {
                searchControlProvider: 'yandex#search',
                suppressMapOpenBlock: true,
            });
            postMapHandler.postsMap.controls.add(new ymaps.control.FullscreenControl());
            postMapHandler.postsMap.controls.add(new ymaps.control.ZoomControl({
                options: {
                    size: "small"
                }
            }));

        } else {
            postMapHandler.postsMap.setCenter(mapCenter, zoom);
            postMapHandler.postsMap.geoObjects.removeAll();
        }

        postMapHandler.initMapObjects();
    }
});

$(document).ready(function () {
    //Инициация уведомления при открытии страниц
    if ($('#alertMessage').val()) {
        AlertNotification.alertSuccess($('#alertMessage').val())
    }
});
