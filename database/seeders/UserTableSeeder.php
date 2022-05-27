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
            'role' => 'superadmin',
            'name' => 'superadmin',
            'username' => 'superadmin',
            'password' => Hash::make('superadmin'),
            'created_at' => now(),
        ]);

        DB::table('users')->insert([
            'role' => 'admin',
            'name' => 'adminMTS',
            'username' => 'adminMTS',
            'sekolah_asal' => 1,
            'password' => Hash::make('admin'),
            'created_at' => now(),
        ]);

        DB::table('users')->insert([
            'role' => 'admin',
            'name' => 'adminSMP',
            'username' => 'adminSMP',
            'sekolah_asal' => 2,
            'password' => Hash::make('admin'),
            'created_at' => now(),
        ]);

        // DB::table('users')->insert([
        //     'role' => 'siswa',
        //     'name' => 'siswa',
        //     'username' => 'siswa',
        //     'password' => Hash::make('siswa12345'),
        //     'created_at' => now(),
        // ]);
    }
}
