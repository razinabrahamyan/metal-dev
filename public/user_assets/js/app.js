function getJsonValue(item){
    if (item.length){
        return JSON.parse(item.val());
    }
    return '';
}

function openModal(item,fadeDuration){
    item.modal({
        fadeDuration:fadeDuration
    })
}

let login_errors = getJsonValue($('#login_errors'));
let not_match = getJsonValue($('#match_error'));
let register_errors = getJsonValue($('#register_errors'));
let should_login = $('#should_login').val();

$(document).ready(function () {
    if(login_errors.length !== 0 || not_match.match || should_login){
        openModal($('#login_modal'),150)
    }else if(register_errors.length !== 0){
        openModal($('#register_modal'),150)
    }
    $('a[data-toggle="custom_modal"]').click(function (){
        openModal($($(this).data('target')),150)
    })
    $('.cart-btn').click(function (){
        $(this).find('.notification_board').toggleClass('active')
    })

    $('#reg_from_login_modal').click(function (){
        $.modal.close();
        openModal($('#register_modal'),150)
    })

    $('#log_from_register_modal').click(function (){
        $.modal.close();
        openModal($('#login_modal'),150)
    })

})


