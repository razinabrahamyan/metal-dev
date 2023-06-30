<?php

namespace App\Library\Services\Rules;

use Illuminate\Support\Facades\Validator;

class IntegrationRules
{
    public static function emailIntegrationRules($data) : \Illuminate\Contracts\Validation\Validator
    {
        $messages = [
            "email.required" => "Введите почту",
            "email.email"    => "Неверный формат почты",
        ];

        return Validator::make($data['settings'], [
            "email" => "required|email",
        ], $messages);
    }
}
