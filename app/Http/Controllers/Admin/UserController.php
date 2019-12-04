<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\RoleRepository;
use App\Repositories\UserRepository;
use App\Http\Requests\Users\StoreUserFormRequest;
use App\Http\Requests\Users\UpdateUserFormRequest;

class UserController extends MainController
{
    protected $users;
    protected $roles;

    public function __construct(UserRepository $users, RoleRepository $roles)
    {
        $this->users = $users;
        $this->roles = $roles;
    }

    /**
     * Get list
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $users = $this->users->get();
        $roles = $this->roles->get();

        return view('admin.users.index', compact('users', 'roles'));
    }

    /**
     * Store a newly create resource into storage
     *
     * @param StoreUserFormRequest $request
     * @return mixed
     */
    public function store(StoreUserFormRequest $request)
    {
        try {
            $this->users->create($request->all());
            return redirect()->back();
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     *  Show the form for editing the specified resource.
     *
     * @param $id
     * @return mixed
     */
    public function edit($id)
    {
        return $this->users->edit($id);
    }

    /**
     * Update the specific resource in storage
     *
     * @param UpdateUserFormRequest $request
     * @param $id
     * @return mixed
     */
    public function update(UpdateUserFormRequest $request, $id)
    {
        try {
            return $this->users->update($request->all(), $id);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Delete
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|string
     */
    public function destroy($id)
    {
        try {
            $this->users->destroy($id);
            return redirect()->back();

        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
