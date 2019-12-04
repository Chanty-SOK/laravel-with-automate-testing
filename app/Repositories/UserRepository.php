<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository
{
    protected $users;

    public function __construct(User $users)
    {
        $this->users = $users;
    }

    public function get(...$params)
    {
        return $this->users->orderBy('created_at', 'DESC')
            ->paginate(config('constants.NUMBER_OF_PAGINATION'));
    }

    public function create($data)
    {
        $user = $this->users->create($data)
            ->assignRole(request('role'));

        return $user;
    }

    public function edit($id)
    {
        return $this->users->with('roles')
            ->findOrFail($id);
    }

    public function find($id)
    {
        return $this->users->findOrFail($id);
    }

    public function update($data, $id)
    {
        $user = tap($this->find($id))
            ->update($data);
        $user->syncRoles(request('role'));

        return $user;
    }

    public function destroy($id)
    {
         return $this->users->destroy($id);
    }
}
