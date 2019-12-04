<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\RoleRepository;
use App\Repositories\PermissionRepository;
use App\Http\Requests\Roles\StoreRoleRequest;
use App\Repositories\RolePermissionRepository;

class RoleController extends MainController
{
    private $roles;
    private $permissions;
    private $rolePermissions;

    public function __construct(
        RoleRepository $roles,
        PermissionRepository $permissions,
        RolePermissionRepository $rolePermissions
    )
    {
        $this->roles = $roles;
        $this->permissions = $permissions;
        $this->rolePermissions = $rolePermissions;
    }

    public function index()
    {
        $roles = $this->roles->get();
        $permissions = $this->permissions->get();
        $roleHasPermissions = $this->rolePermissions->get();

        return view('admin.roles.index',compact('roles','permissions','roleHasPermissions'));
    }

    public function store(StoreRoleRequest $request)
    {
        try {
            $this->roles->create($request->all());
            return response()->json(['message' => 'Added']);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function destroy($id)
    {
        try {
            $this->roles->destroy($id);
            return redirect()->back();
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
