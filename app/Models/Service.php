<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = ['description', 'service_id', 'price','user_id'];
    use HasFactory;


    public function user(){
        return $this->belongsTo(User::class);
    }

    public function serviceType(){
        return $this->belongsTo(ServiceType::class,'service_id');
    }

    public function images(){
        return $this->morphMany(Image::class,'imagable');
    }
}
