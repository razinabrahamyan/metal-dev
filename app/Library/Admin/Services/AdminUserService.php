<?php

namespace App\Library\Admin\Services;

use App\Library\Admin\Contracts\AdminUserContract;
use App\Models\User;

class AdminUserService implements AdminUserContract
{

    /**
     * @return array
     */
    public function index()
    {
        return ['users' => User::all()];
    }

    public function create()
    {
        // TODO: Implement create() method.
    }

    public function show($id)
    {
        return ['user' => User::query()->findOrFail($id)];
    }

    public function delete()
    {
        // TODO: Implement delete() method.
    }
}
