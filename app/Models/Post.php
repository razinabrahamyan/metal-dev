<?php

namespace App\Models;

use App\Models\Admin\AdminPostHistory;
use App\Models\Admin\DeniedReason;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'address',
        'link',
        'phone',
        'email',
        'market_id',
        'status',
        'work_hours',
        'prices',
        'city_id'
    ];
    protected $casts = [
        'address' => 'array',
        'work_hours' => 'array',
        'prices' => 'array',
    ];

    /**
     * @param $query
     * @return mixed
     */
    public function scopeWithRelated($query)
    {
        return $query->with('creator', 'statuses');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function images()
    {
        return $this->morphMany(Image::class, 'imagable');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function creator()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class)->orderByDesc('created_at');
    }

    public function leads(){
        return $this->hasMany(Lead::class);
    }

    public function city(){
        return $this->hasOne(City::class,'id','city_id');
    }

    public function subcategories(){
        return $this->hasMany(PostsSubcategories::class,'post_id','id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     */
    public function statuses(): \Illuminate\Database\Eloquent\Relations\MorphToMany
    {
        return $this->morphToMany(Status::class, 'statusable');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function postHistories(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(AdminPostHistory::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function reasons(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(
            DeniedReason::class,
            'posts_reasons',
            'post_id',
            'reason_id'
        )
            ->withTimestamps();
    }

    /**
     * @return HasOne
     */
    public function socials() : HasOne
    {
        return $this->hasOne(PostsSocial::class,'post_id','id');
    }
}
