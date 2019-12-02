<?php

namespace Tests\Feature;

use App\Http\Requests\Users\StoreUserFormRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class StoreUserFormRequestTest extends TestCase
{

    private $users;

    public function setUp(): void
    {
        parent::setUp();
        $this->users = (new StoreUserFormRequest());
    }

    /** @test */
    public function test_rule_when_user_create_new_user()
    {
        $this->assertEquals([
            'name'  => 'required|string|max:225',
            'email' => 'required|unique:users,email',
            'password'  => 'required|min:8|max:30|confirmed',
            'password_confirmation'  => 'required',
            'role'  => 'required|exists:roles,id'
        ], $this->users->rules());
    }
}
