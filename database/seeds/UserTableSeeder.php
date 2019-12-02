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
        $data = ['name' => 'admin', 'email' => 'admin@gmail.com', 'password' => 'admin123'];

        User::firstOrCreate(collect($data)->only('email')->all(), $data)
            ->assignRole('admin')
            ->fresh();
    }
}
