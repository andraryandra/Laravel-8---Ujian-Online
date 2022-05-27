<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryPelajaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kelas_7 = '7 | ';
        $kelas_8 = '8 | ';
        $kelas_9 = '9 | ';

        DB::table('categories')->insert([
            'id_sekolah_asal' => 1,
            'name_category' => $kelas_7."Bahasa Indonesia",
            'created_at' => now(),
        ]);
        DB::table('categories')->insert([
            'id_sekolah_asal' => 1,
            'name_category' => $kelas_7.'Matematika',
            'created_at' => now(),
        ]);
        DB::table('categories')->insert([
            'id_sekolah_asal' => 1,
            'name_category' => $kelas_7.'Sistem Operasi',
            'created_at' => now(),
        ]);
    }
}
