<?php

namespace Tests\Feature;

use App\Http\Requests\Users\UpdateUserFormRequest;
use Illuminate\Routing\Route;
use Tests\TestCase;

class UpdateUserFormRequestTest extends TestCase
{
    private $users;

    protected function setUp(): void
    {
        parent::setUp();
        $this->users = (new UpdateUserFormRequest());
    }

    /** @test */
    public function test_rules_when_user_update_on_specific_user()
    {
        $this->assertEquals([
            'name'                  => 'required|string|max:225',
            'email'                 => 'required|unique:users,email,',
            'password'              => 'nullable|min:8|max:30|confirmed',
            'password_confirmation' => 'nullable',
            'role'                  => 'required|exists:roles,id',
        ], $this->users->rules());
    }
}
