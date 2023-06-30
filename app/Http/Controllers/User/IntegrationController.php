<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Library\Services\Contracts\IntegrationContract;
use Illuminate\Http\Request;

class IntegrationController extends Controller
{
    protected $integrationService;

    /**
     * LeadController constructor.
     * @param IntegrationContract $integrationService
     */
    public function __construct(IntegrationContract $integrationService)
    {
        $this->integrationService = $integrationService;
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return mixed
     */
    public function changeStatus(Request $request)
    {
        return $this->integrationService->changeStatus($request);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return mixed
     */
    public function changeSettings(Request $request)
    {
        return $this->integrationService->changeSettings($request);
    }
}
