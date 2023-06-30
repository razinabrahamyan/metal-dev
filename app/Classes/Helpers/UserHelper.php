<?php

namespace App\Classes\Helpers;

use App\Models\City;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class UserHelper
{
    /**
     * Возвращает Id роли авторизованного пользователя
     * @return int
     */
    public static function getRoleId() : int
    {
        return auth()->user()->role_id ?? 0;
    }

    /**
     * Возвращает Id авторизованного пользователя
     * @return int
     */
    public static function getUserId() : int
    {
        return auth()->id() ?? 0;
    }

    /**
     * Возвращает имя авторизованного пользователя
     * @return string
     */
    public static function getUserFullName() : string
    {
        return auth()->user()->full_name['first_name'].' '.auth()->user()->full_name['last_name'] ?? "";
    }

    /**
     * Возвращает путь к аватару авторизованного пользователя
     * @return string
     */
    public static function getAuthAvatar() : string
    {
        return !empty(auth()->user()->avatar) ? auth()->user()->avatar : '/images/default_avatar.png';
    }

    public static function getCreatorAvatar(User $user): string
    {
        return !empty($user->avatar) ? $user->avatar : '/images/default_avatar.png';
    }

    public static function getUserAvatarById($id) : string
    {
        $userAvatar = User::find($id)->avatar;
        return !empty($userAvatar) ? $userAvatar : '/images/default_avatar.png';
    }

    public static function getAuthUserCity(){
        return City::find(auth()->user()->city_id);
    }

    public static function avatar($avatar) : string
    {
        return $avatar ?? 'images/default_avatar.png';
    }

    /**
     * Возвращает номер авторизованного пользователя
     * @return string
     */
    public static function getUserPhone() : string
    {
        return auth()->user()->phone ?? "";
    }

    /**
     * Возвращает почту авторизованного пользователя
     * @return string
     */
    public static function getUserMail() : string
    {
        return auth()->user()->email ?? "";
    }
}
