<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $permissions = [
            'users' => ['view user','create user','edit user','delete user'],
            'roles' => ['view role','create role','edit role','delete role','update permission'],
        ];

        collect($permissions)->each(function ($items) {
            collect($items)->each(function($item) {
                Permission::firstOrcreate(['name' => $item]);
            });
        });

        $permissions = Permission::all();

        Role::create(['name' => 'admin'])
            ->givePermissionTo($permissions)
            ->fresh();
    }
}
