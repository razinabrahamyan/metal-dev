<?php

namespace App\Classes\Integrations;

use App\Models\User;

class CheckIntegration
{
    const EMAIL_INTEGRATION_ID = 1;
    private $user;

    /**
     * CheckIntegration constructor.
     * @param \App\Models\User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * @return bool
     */
    public function isEmailIntegrationOn() : bool
    {
        $integration = $this->user->integrations->where('integration_id', self::EMAIL_INTEGRATION_ID)->first();
        if (!empty($integration)) {
            return $integration->status == 1;
        } else {
            return false;
        }
    }
}
