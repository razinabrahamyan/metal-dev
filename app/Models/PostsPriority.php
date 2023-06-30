<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostsPriority extends Model
{
    use HasFactory;

    protected $fillable = [
        "post_id",
        "user_id",
        "post_rate_id",
        "post_sort",
    ];
}
