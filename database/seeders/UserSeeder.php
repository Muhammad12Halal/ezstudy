<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin Halal',
            'email' => 'admin@ezstudy.fskik.com.my',
            'password' => bcrypt('12341234'),
            'level' => 'Admin',
        ]);

        User::create([
            'name' => 'Instructor Halal',
            'email' => 'instructor@ezstudy.fskik.com.my',
            'password' => bcrypt('12341234'),
            'level' => 'Instructor',
        ],);

        User::create([
            'name' => 'User Halal',
            'email' => 'user@ezstudy.fskik.com.my',
            'password' => bcrypt('12341234'),
            'level' => 'User',
        ]);
    }
}
