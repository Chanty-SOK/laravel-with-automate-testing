<?php


namespace App\Repositories;

use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;

class PermissionRepository
{
    protected $permissions;

    public function __construct(Permission $permissions)
    {
        $this->permissions = $permissions;
    }

    public function get()
    {
        return $this->permissions->orderBy('created_at')
            ->get();
    }
}
