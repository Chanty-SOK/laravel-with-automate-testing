<?php


namespace App\Repositories;


use App\Models\Role;

class RoleRepository
{
    protected $roles;

    public function __construct(Role $role)
    {
        $this->roles = $role;
    }

    public function get()
    {
        return $this->roles->all();
    }
}
