<?php

namespace App\Library\Services\Rules;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class PostRules
{
    /**
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public static function postCreateRules(array $data) : \Illuminate\Contracts\Validation\Validator
    {
        $messages = [
            "title.required"       => "Введите заголовок",
            "title.max"            => "Превышено максимальное количество символов: :max",
            "description.required" => "Введите описание",
            "description.max"      => "Превышено максимальное количество символов: :max",
            "address.required"     => "Введите адрес",
            "email.required"       => "Введите почту",
            "viber.min"            => "Введите номер полностью",
            "whatsapp.min"         => "Введите номер полностью",
            "telegram.min"         => "Имя пользователя должно содежать минимум :min символов",
            "link.required"        => "Введите ссылку на сайт",
            "link.email"           => "Неверный формат почты",
            "images.*.max"         => "Размер файла не должен превышать :maxКб",
            "images.*.mimes"       => "Файл должен быть формата: jpeg,jpg,png",
            "images.required"      => "Надо выбрать минимум один файл",
            "covers.*.max"         => "Размер файла не должен превышать :maxКб",
            "covers.*.mimes"       => "Файл должен быть формата: jpeg,jpg,png",
            "covers.required"      => "Надо выбрать минимум один файл",
        ];

        return Validator::make($data, [
            "title"       => "required|string|max:255",
            "description" => "required|string|max:600",
            "address"     => "required",
            "email"       => "required|email",
            "viber"       => "nullable|min:16",
            "whatsapp"    => "nullable|min:16",
            "telegram"    => "nullable|min:5",
            "link"        => "required",
            "images.*"    => 'mimes:jpeg,jpg,png|max:25000',
            "covers.*"    => 'mimes:jpeg,jpg,png|max:25000',
            "images"      => 'required',
            "covers"      => 'required',
        ], $messages);
    }
}
