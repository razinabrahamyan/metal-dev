<?php

namespace App\Library\Admin\Services;

use App\Library\Admin\Contracts\AdminContract;
use App\Models\Admin\Admin;
use App\Models\Admin\Role;
use Illuminate\Http\Request;

class AdminService implements AdminContract
{

    /**
     * @var int[]
     */
    protected $adminIds = [2, 3];

    /**
     * @return \Illuminate\Contracts\Auth\Guard|\Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return auth()->guard('admin');
    }

    /**
     * @param $id
     * @return array
     */
    protected function getAdmins($id)
    {
        return Admin::query()->whereId($id)->with('role')->first();
    }

    /**
     * @param $id
     * @return array
     */
    public function index($id)
    {
        $role_id = intval($id);
        if (in_array($role_id, $this->adminIds)) {
            $role = Role::query()->findOrFail($id);
            return ['admins' => $role->admins];
        }
        return null;
    }

    public function create()
    {
        // TODO: Implement create() method.
    }

    public function store(Request $request)
    {
        // TODO: Implement store() method.
    }

    /**
     * @param $id
     * @return array
     */
    public function show($id)
    {
        $user_id = intval($id);

        if (($this->guard()->id() === 1 && in_array($user_id, $this->adminIds)) ||
            ($this->guard()->id() !== 1 && $this->guard()->id() < $user_id && in_array($user_id, $this->adminIds)))
        {
            return ['admin' => $this->getAdmins($id)];
        }
        return null;
    }

    public function edit($id)
    {
        // TODO: Implement edit() method.
    }

    public function update(Request $request, $id)
    {
        // TODO: Implement update() method.
    }

    public function destroy($id)
    {
        // TODO: Implement destroy() method.
    }
}
