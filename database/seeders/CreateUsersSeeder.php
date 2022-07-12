<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        User::updateOrCreate([
            'id'   => 1,
            'is_admin'=>'1',
        ],[
            'name'=>'Admin',
            'email'=>'dev.admin@yopmail.com',
            'email_verified_at' => now(),
            'is_admin'=> 1,
            'is_active'=> 1,
            'password'=> bcrypt('admin@123'),
            'remember_token' => Str::random(10),
        ]);

    }
}
