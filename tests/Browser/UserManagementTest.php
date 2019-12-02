<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class UserManagementTest extends DuskTestCase
{
    use DatabaseMigrations;

    const ADMIN_ROLE = 1;

    /** @test */
    public function a_user_authenticated_and_has_permission_to_see_users_list()
    {
        $permissions = ['view user'];

        $user = (new UserAuthenticated())->createUserForAccessToDashboard('admin', $permissions);

        $this->browse(function (Browser $browser) use ($user) {
            $browser->loginAs($user)
                ->visit('/home')
                ->clickLink('Users Management')
                ->click('#collapseTwo a.users-list')
                ->assertPathIs('/users');
        });
    }

    /** @test */
    public function a_user_authenticated_with_permission_create_new_user()
    {
        $permissions = ['view user', 'create user'];
        $user = (new UserAuthenticated())->createUserForAccessToDashboard('admin', $permissions);
        $data = $this->getArrData();

        $this->browse(function (Browser $browser) use ($user, $data) {
            $browser->loginAs($user)
                ->visit('/users')
                ->assertPathIs('/users')
                ->click('button.add-user')
                ->whenAvailable('#addNewUserModal', function ($modal) {
                    $modal->assertSee('Add New user');
                })
                ->type('name', $data['name'])
                ->type('email', $data['email'])
                ->type('password', $data['password'])
                ->type('password_confirmation', $data['password'])
                ->select('role', $data['role'])
                ->press('Save')
                ->assertPathIs('/users');
        });
    }

    /** @test */
    public function a_user_authenticated_with_has_permission_to_edit_user()
    {
        $permissions = ['view user', 'create user', 'edit user'];
        $user = (new UserAuthenticated())->createUserForAccessToDashboard('admin', $permissions);

        $this->browse(function (Browser $browser) use ($user) {
            $browser->loginAs($user)
                ->visit('/users')
                ->assertPathIs('/users')
                ->click('a.editUserBtn')
                ->whenAvailable('#editUserModal', function ($modal) {
                    $modal->assertSee('Edit user');
                })
                ->value('#name', $user['name'])
                ->value('#email', $user['email'])
                ->value('#role', $user['role']);
        });
    }

    /** @test */
    public function a_user_authenticated_has_permission_to_delete_user_except_own()
    {
        $permissions = ['delete user'];
        $user = (new UserAuthenticated())->createUserForAccessToDashboard('admin', $permissions);
        $this->browse(function (Browser $browser) use ($user) {
            $browser->loginAs($user)
                ->visit('/users')
                ->assertPathIs('/users')
                ->click('a.delete-user')
                ->acceptDialog();
        });
    }

    public function getArrData()
    {
        return [
            'name'  => 'testing',
            'email' => 'testing@gmail.com',
            'password'  => 'password123',
            'role'  => self::ADMIN_ROLE
        ];
    }
}
