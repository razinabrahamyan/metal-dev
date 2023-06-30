<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Library\Admin\Contracts\RoleContract;

class RoleController extends Controller
{
    /**
     * @var
     */
    protected $roleService;

    /**
     * RoleController constructor.
     */
    public function __construct(RoleContract $role)
    {
        $this->roleService = $role;
    }

    /**
     * @param null $id
     * @return mixed
     */
    public function getRole($id = null)
    {
        return $this->roleService->getRole($id);
    }
}
