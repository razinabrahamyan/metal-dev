<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Statusable extends Model
{
    use HasFactory;

    public function statusable()
    {
        return $this->morphTo();
    }
}
