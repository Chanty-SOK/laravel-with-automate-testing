<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\PermissionRepository;
use Illuminate\Http\Request;

class PermissionController extends MainController
{
    protected $permissions;

    public function __construct(PermissionRepository $permissions)
    {
        $this->permissions = $permissions;
    }

    public function store()
    {
        try {
            $permissions = (request('permission')) ? : [];

            foreach($permissions as $key => $permission)
                foreach($permission as $k => $perm)
                    $insert[] = array('permission_id' => $k,'role_id' => $key);

            $permissions = \DB::table('permissions')->get();
            \DB::table('role_has_permissions')->truncate();
            foreach($permissions as $permission)
                $insert[] = array('permission_id' => $permission->id,'role_id' => 1);
            \DB::table('role_has_permissions')->insert($insert);

            return redirect()->back();
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
