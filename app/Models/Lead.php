<?php

namespace App\Models;

use App\Casts\DateParser;
use App\Casts\PhoneParser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lead extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'user_id',
        'address',
        'size',
        'full_name',
        'phone',
        'post_id',
        'type',
        'email',
        'comment',
        "type_id"
    ];

    protected $casts = [
        "phone"      => PhoneParser::class,
        "created_at" => DateParser::class,
    ];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function client()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
