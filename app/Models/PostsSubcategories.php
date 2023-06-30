<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PostsSubcategories extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        "post_id",
        "category_id",
        "subcategory_id",
        "price",
    ];

    public function category(){
        return $this->hasOne(Category::class,'id','category_id');
    }

    public function subCategory(){
        return $this->hasOne(SubCategory::class,'id','subcategory_id');
    }
}
