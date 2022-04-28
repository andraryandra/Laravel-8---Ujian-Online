<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'role' => 'admin',
            'name' => 'admin',
            'username' => 'admin',
            // 'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),

        ]);

        DB::table('users')->insert([
            'role' => 'siswa',
            'name' => 'siswa',
            'username' => 'siswa',
            'password' => Hash::make('siswa12345'),

        ]);
    }
}
