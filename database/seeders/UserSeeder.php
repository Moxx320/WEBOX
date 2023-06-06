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
        $user = User::create([
            'name' => 'Sebastian',
            'email' => 'Sebastian@admin.com',
            'username' => 'Sebas',
            'password' => bcrypt('moxx1234'),
        ]);

        $user->assignRole('Admin');


        $user = User::create([
            'name' => 'Samantha',
            'email' => 'Samantha@admin.com',
            'username' => 'Sam',
            'password' => bcrypt('sam1234'),
        ]);

        $user->assignRole('Admin');


        $user = User::create([
            'name' => 'Antonio',
            'email' => 'Antonio@admin.com',
            'username' => 'Tony',
            'password' => bcrypt('tony1234'),
        ]);

        $user->assignRole('Admin');
    }
}
