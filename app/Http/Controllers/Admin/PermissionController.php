<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Library\Admin\Contracts\PermissionContract;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    /**
     * @var PermissionContract
     */
    protected $permissionService;

    /**
     * PermissionController constructor.
     */
    public function __construct(PermissionContract $permission)
    {
        $this->permissionService = $permission;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('admin.permissions.index', $this->permissionService->index());
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function setPermission(Request $request)
    {
        return $this->permissionService->setPermissionToRole($request);
    }

}
