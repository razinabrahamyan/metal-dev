<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class UserIntegration extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id",
        "integration_id",
        "status",
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function integrationSettings() : HasMany
    {
        return $this->hasMany(IntegrationSetting::class, 'user_id', 'user_id');
    }
}
