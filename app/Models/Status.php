<?php

namespace App\Models;

use App\Models\Admin\StatusType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;

    public $timestamps = false;

    /**
     * @param $value
     * @return array|false|string|string[]|null
     */
    public function getRuNameAttribute($value) {

        return mb_convert_case($value, MB_CASE_TITLE, "UTF-8");
    }

    public function posts(): \Illuminate\Database\Eloquent\Relations\MorphToMany
    {
        return $this->morphedByMany(Post::class, 'statusable');
    }

    public function type(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(StatusType::class);
    }


}
