<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'title',
        'description',
        'market_id'
    ];
    use HasFactory;

    public function subcategories(){
        return $this->hasMany(SubCategory::class);
    }
}
