<?php


namespace App\Classes\Helpers;


class StringHelper
{
    /**
     * @param $string
     * @return array|string|string[]|null
     */
    public static function clearStringSign($string)
    {
        return preg_replace('/[^\p{L}\p{N}\s]/u', '', $string);
    }
}
