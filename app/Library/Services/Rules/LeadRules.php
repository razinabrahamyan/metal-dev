<?php

namespace App\Library\Services\Rules;

use Illuminate\Support\Facades\Validator;

class LeadRules
{
    /**
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public static function postCallbackOrderRules(array $data) : \Illuminate\Contracts\Validation\Validator
    {
        $messages = [
            "callback_phone.required" => "Введите номер телефона",
            "callback_phone.min"      => "Введите номер телефона полностью",
            "email.email"             => "Некорректный формат почты",
            "full_name.required"      => "Введите Ф.И.О.",
        ];

        return Validator::make($data, [
            "callback_phone" => "required|min:16",
            "email"          => "nullable|email",
            "full_name"      => "required",
        ], $messages);
    }
}
