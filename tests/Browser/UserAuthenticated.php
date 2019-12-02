<?php

namespace Tests\Browser;

use App\Models\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserAuthenticated
{
    /**
     * @param string $roleName
     * @param array $permissions
     *
     * @return mixed
     */
    public function createUserForAccessToDashboard(string $roleName , array $permissions) : object
    {
        $role = $this->createRoleAndGivePermission($roleName, $permissions);
        return factory(User::class)->create(['password' => 'password123'])->assignRole($role);
    }

    public function createRoleAndGivePermission($roleName, $permissions)
    {
        collect($permissions)->each(function ($items) {
            collect($items)->each(function ($item) {
                Permission::firstOrCreate(['name' => $item]);
            });
        });

        $permissions = Permission::all();

        $role = Role::create(['name' => $roleName])->givePermissionTo($permissions);

        return $role;
    }
}
