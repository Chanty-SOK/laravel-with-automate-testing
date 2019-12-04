<?php

namespace App\Repositories;

use App\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleRepository
{
    protected $roles;
    protected $permissions;

    public function __construct(Role $role, Permission $permissions)
    {
        $this->roles = $role;
        $this->permissions = $permissions;
    }

    public function get()
    {
       return $this->roles->orderBy('name')
           ->get();
    }

    public function create($data)
    {
        return $this->roles->create(array_merge($data,['guard_name' => 'web']));
    }

    public function destroy($id)
    {
        return $this->roles->destroy($id);
    }
}
