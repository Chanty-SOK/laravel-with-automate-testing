<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = ['name' => 'admin', 'email' => config('constants.DEFAULT_EMAIL_LOGIN'), 'password' => config('constants.DEFAULT_PASSWORD_LOGIN')];

        User::firstOrCreate(collect($data)->only('email')->all(), $data)
            ->assignRole('admin')
            ->fresh();
    }
}
