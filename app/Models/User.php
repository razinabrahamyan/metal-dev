<?php

namespace App\Models;

use App\Casts\PhoneParser;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use PHPUnit\Util\Json;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'full_name', 'email', 'password', 'phone', 'avatar', 'dob', 'role_id', 'status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'full_name'         => 'array',
        'phone'             =>  PhoneParser::class,
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function posts() : HasMany
    {
        return $this->hasMany(Post::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function leadRequests() : HasManyThrough
    {
        return $this->hasManyThrough(Lead::class, Post::class)->with(['post', 'client'])->orderByDesc('created_at');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function integrations() : HasMany
    {
        return $this->hasMany(UserIntegration::class, 'user_id', 'id');
    }

    /**
     * @return HasOne
     */
    public function pack() : HasOne
    {
        return $this->hasOne(Packs::class, 'id', 'pack_id');
    }

    public function services(){
        return $this->hasMany(Service::class)->orderByDesc('created_at');
    }
}
