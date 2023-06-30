<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Library\Services\Contracts\LeadContract;
use Illuminate\Http\Request;

class LeadController extends Controller
{
    protected $leadService;

    /**
     * LeadController constructor.
     * @param LeadContract $leadService
     */
    public function __construct(LeadContract $leadService)
    {
        $this->leadService = $leadService;
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return string[]
     */
    public function createCallbackLead(Request $request) : array
    {
        return $this->leadService->createCallbackLead($request);
    }

    public function list()
    {
        return $this->leadService->list(request());
    }

    public function delete(Request $request)
    {
        return $this->leadService->delete($request);
    }
}
