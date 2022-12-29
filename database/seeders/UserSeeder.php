<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Galvin Santoso',
                'user_role_id' => 1,
                'email' => 'galvin@gmail.com',
                'password' => Hash::make('galvin123')
            ],
            [
                'name' => 'Admin',
                'user_role_id' => 2,
                'email' => 'admin@gmail.com',
                'password' => Hash::make('admin123')
            ],
            [
                'name' => 'Nicholas',
                'user_role_id' => 1,
                'email' => 'nicholas@gmail.com',
                'password' => Hash::make('nicholas123')
            ]
        ]);
    }
}
