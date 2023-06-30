<?php

namespace App\Casts;

use App\Classes\Helpers\GF;
use App\Classes\Helpers\PhoneHelper;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;

class PhoneParser implements CastsAttributes
{

    public function get($model, string $key, $value, array $attributes)
    {
        return PhoneHelper::phoneToStr(PhoneHelper::clearPhoneNumber($value));
    }

    public function set($model, string $key, $value, array $attributes)
    {
        return PhoneHelper::clearPhoneNumber($value);
    }
}
