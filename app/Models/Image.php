<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = ['imagable_id','name', 'imagable_type'];
    use HasFactory;


    public function imagable(){
        return $this->morphTo();
    }
}
