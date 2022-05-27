<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('kelas')->insert([
            'id_wali' => 5,
            'name_kelas' => '7-A',
            'created_at' => now(),
        ]);

        DB::table('kelas')->insert([
            'id_wali' => 6,
            'name_kelas' => '7-B',
            'created_at' => now(),
        ]);

        DB::table('kelas')->insert([
            'id_wali' => 7,
            'name_kelas' => '7-C',
            'created_at' => now(),
        ]);
        
    }
}
