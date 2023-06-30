<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Library\Admin\Contracts\AdminPostHistoryContract;
use Illuminate\Http\Request;

class AdminPostHistoryController extends Controller
{
    protected $adminPostHistoryService;

    /**
     * AdminPostHistoryController constructor.
     * @param AdminPostHistoryContract $contract
     */
    public function __construct(AdminPostHistoryContract $contract)
    {
        $this->adminPostHistoryService = $contract;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('admin.histories.admin_posts_history.index', $this->adminPostHistoryService->index());
    }
}
