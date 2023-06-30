<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Library\Admin\Contracts\AdminPanelHistoryContract;
use Illuminate\Http\Request;

class AdminPanelHistoryController extends Controller
{
    protected $adminPanelHistoryService;

    /**
     * AdminPanelHistoryController constructor.
     * @param AdminPanelHistoryContract $contract
     */
    public function __construct(AdminPanelHistoryContract $contract)
    {
        $this->adminPanelHistoryService = $contract;
    }
}
