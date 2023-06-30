<?php

namespace App\Models;

use App\Casts\Json;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IntegrationSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        "integration_id",
        "user_id",
        "settings",
    ];

    protected $casts = [
        "settings" => Json::class,
    ];
}
