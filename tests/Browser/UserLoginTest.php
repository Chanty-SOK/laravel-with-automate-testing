<?php

namespace Tests\Browser;

use App\Models\User;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class UserLoginTest extends DuskTestCase
{
    use DatabaseMigrations;

    /** @test */
    public function a_user_can_be_successfully_login_with_correct_credentials()
    {
        $permissions = ['view user', 'create user', 'edit user'];
        $user = (new UserAuthenticated())->createUserForAccessToDashboard('admin', $permissions);

        $this->browse(function (Browser $browser) use ($user) {
            $browser->visit('/login')
                ->type('email', $user->email)
                ->type('password', 'password123')
                ->press('Login')
                ->assertSee('Dashboard')
                ->assertPathIs('/home');
        });
    }

    /** @test */
    public function a_user_can_not_login_with_incorrect_credentials()
    {
        $permissions = ['view user', 'create user', 'edit user'];
        $user = (new UserAuthenticated())->createUserForAccessToDashboard('staff', $permissions);

        $this->browse(function (Browser $browser) use ($user) {
            $browser->visit('/login')
                ->type('email', $user->email)
                ->type('password', 'wrong-password')
                ->press('Login')
                ->assertSee('These credentials do not match our records.')
                ->assertPathIs('/login');
        });
    }
}
