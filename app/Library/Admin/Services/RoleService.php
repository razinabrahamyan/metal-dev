<?php

namespace App\Library\Admin\Services;

use App\Library\Admin\Contracts\RoleContract;
use App\Models\Admin\Permission;
use App\Models\Admin\Role;
use Illuminate\Support\Facades\DB;

class RoleService implements RoleContract
{

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function getRole($id)
    {
        $role = Role::query()
            ->where('id', '>', 1)
            ->where('id', $id)
            ->first();

        $permissions_count =  Permission::query()
            ->whereIn('id', $role->permissions->pluck('id'))
            ->selectRaw( 'name , count(*) as total' )
            ->groupBy('name')
            ->get();

        return response()->json([$role->permissions()->get()->groupBy('name'), $permissions_count]);
    }
}
