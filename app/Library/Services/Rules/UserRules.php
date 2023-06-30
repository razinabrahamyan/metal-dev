<?php

namespace App\Library\Services\Rules;


use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserRules
{
    /**
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public static function updateUserProfile(array $data) : \Illuminate\Contracts\Validation\Validator
    {
        $messages = [
            "firstName.required" => 'Введите имя',
            "lastName.required"  => 'Введите фимилию',
            "email.required"     => 'Введите почту',
            "email.email"        => 'Неверный формат почты',
            "website.required"   => 'Введите ссылку на сайт',
            "phone.required"     => 'Введите телефон',
        ];

        return Validator::make($data, [
            'firstName' => 'required',
            'lastName'  => 'required',
            'email'     => 'required|email',
            'website'   => 'required',
            'phone'     => 'required',
        ], $messages);
    }

    /**
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public static function updatePasswordRules(array $data) : \Illuminate\Contracts\Validation\Validator
    {
        $messages = [
            'newPassword.min'    => 'Новый пароль должен иметь минимум :min символов.',
            'newPassword.same'   => 'Ваш новый пароль и подтверждение пароля не совпадают.',
            'repeatPassword.min' => 'Пароль подтверждения должен иметь минимум :min символов.',
        ];

        return Validator::make($data, [
            'currentPassword' => function ($attribute, $value, $fail) {
                if (!Hash::check($value, auth()->user()->getAuthPassword())) {
                    $fail('Текущий пароль неверный');
                }
            },
            'newPassword'     => 'min:6|required_with:repeatPassword|same:repeatPassword',
            'repeatPassword'  => 'min:6',

        ], $messages);
    }
}
