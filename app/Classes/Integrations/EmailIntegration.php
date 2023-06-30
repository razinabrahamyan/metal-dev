<?php

namespace App\Classes\Integrations;

use App\Mail\CallbackOrder;
use App\Models\IntegrationSetting;
use Illuminate\Support\Facades\Mail;

class EmailIntegration
{
    private $user;
    private $lead;

    /**
     * @return bool
     */
    public function sendCallbackOrder() : bool
    {
        $isSend = false;
        $user = $this->getUser();
        if ((new CheckIntegration($this->user))->isEmailIntegrationOn()) {
            $integrationSettings = IntegrationSetting::where('user_id', $user->id)
                                                     ->where('integration_id', IntegrationConstants::EMAIL_INTEGRATION_ID)
                                                     ->first();

            if (!empty($integrationSettings->settings)) {
                Mail::to($integrationSettings->settings->email)->send(new CallbackOrder($this->getLead()));
                $isSend = true;
            }
        }

        return $isSend;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     * @return EmailIntegration
     */
    public function setUser($user)
    {
        $this->user = $user;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLead()
    {
        return $this->lead;
    }

    /**
     * @param mixed $lead
     * @return EmailIntegration
     */
    public function setLead($lead)
    {
        $this->lead = $lead;
        return $this;
    }
}
