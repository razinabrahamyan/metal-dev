<?php

namespace App\Models;

use App\Casts\PhoneParser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostsSocial extends Model
{
    use HasFactory;

    protected $fillable = [
        'post_id',
        'whatsapp',
        'telegram',
        'viber'
    ];
}
