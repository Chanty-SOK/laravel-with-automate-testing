<?php

namespace App\Repositories;

use App\Models\Role;
use App\Models\User;

class RolePermissionRepository
{
    protected $users;
    protected $roles;

    public function __construct(User $users, Role $roles)
    {
        $this->users = $users;
        $this->roles = $roles;
    }

    public function get()
    {
        return \DB::table('role_has_permissions')
            ->select(\DB::raw('CONCAT(role_id,"-",permission_id) AS detail'))
            ->pluck('detail')->all();
    }
}
