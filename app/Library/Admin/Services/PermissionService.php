<?php

namespace App\Library\Admin\Services;

use App\Library\Admin\Contracts\PermissionContract;
use App\Models\Admin\Permission;
use App\Models\Admin\Role;

class PermissionService implements PermissionContract
{

    /**
     * @return array
     */
    public function index()
    {
        $total = Permission::query()->selectRaw( 'name , count(*) as total' )->groupBy('name')->get();
        return [
            'permissions' => Permission::with('roles')->get()->groupBy('name'),
            'roles' => Role::query()->where('id', '>', 1)->get(),
            'totals' => $total
        ];
    }

    public function create()
    {
        // TODO: Implement create() method.
    }

    public function update()
    {
        // TODO: Implement update() method.
    }

    public function delete()
    {
        // TODO: Implement delete() method.
    }

    /**
     * @param $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function setPermissionToRole($request)
    {
        $role = Role::findOrFail($request->role);
        $split = explode('.', $request->permission);
        if (!$request->condition)
        {
            $permission = $role
                ->permissions()
                ->where('name', $split[0])
                ->where('method', $split[1])
                ->first();
//            try {
                return $role->permissions()->detach($permission->id);

//            } catch (\Exception $exception) {
//                return response()->json('Not found', 404);
//            }
        }

        $permission_set = Permission::where('name', $split[0])->where('method', $split[1])->first();
        $role->permissions()->attach($permission_set->id);
        return response()->json('success');
    }
}
