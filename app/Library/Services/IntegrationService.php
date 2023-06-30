<?php

namespace App\Library\Services;

use App\Library\Services\Contracts\IntegrationContract;
use App\Library\Services\Rules\IntegrationRules;
use App\Models\IntegrationSetting;
use App\Models\UserIntegration;
use Illuminate\Http\Request;

class IntegrationService implements IntegrationContract
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function changeStatus(Request $request) : array
    {
        $integration = UserIntegration::find($request->integrationId);

        if ($integration) {
            $integration->status = $request->isOn;
            $integration->update();
        } else {
            UserIntegration::create([
                "user_id"        => auth()->id(),
                "integration_id" => $request->integrationId,
                "status"         => $request->isOn,
            ]);
        }

        return [
            "success"      => true,
            "alertMessage" => "Статус обновлен",
        ];
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function changeSettings(Request $request) : array
    {
        $alertMessage = '';
        $invalidRules = [];

        $validator = IntegrationRules::emailIntegrationRules($request->all());

        if ($validator->fails()) {
            $invalidRules = $validator->getMessageBag()->toArray();
        } else {
            IntegrationSetting::updateOrCreate([
                "user_id"        => auth()->id(),
                "integration_id" => $request->integration_id,
            ], [
                "user_id"        => auth()->id(),
                "integration_id" => $request->integration_id,
                "settings"       => $request->settings,
            ]);

            $alertMessage = "Параметры интеграции обновлены";
        }

        return [
            "alertMessage" => $alertMessage,
            "invalidRules" => $invalidRules,
        ];
    }
}
