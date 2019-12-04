<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class RolePermissionManagementTest extends DuskTestCase
{
    use DatabaseMigrations;

    /** @test */
    public function test_go_to_correct_path()
    {
        $permissions = ['view role', 'view user'];
        $user = (new UserAuthenticated())->createUserForAccessToDashboard('admin', $permissions);
        $this->browse(function (Browser $browser) use ($user) {
            $browser->loginAs($user)
                ->visit('/roles')
                ->assertPathIs('/roles');

        });
    }
}
