<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SekolahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sekolahs')->insert([
            'name_sekolah' => 'MTS Lohbener Indramayu',
            'created_at' => now(),
        ]);
        DB::table('sekolahs')->insert([
            'name_sekolah' => 'SMPN 1 Karangampel',
            'created_at' => now(),
        ]);
        DB::table('sekolahs')->insert([
            'name_sekolah' => 'SMP Muhammadiyah Karangampel',
            'created_at' => now(),
        ]);
        DB::table('sekolahs')->insert([
            'name_sekolah' => 'SMPN Lohbener Indramayu',
            'created_at' => now(),
        ]);
        DB::table('sekolahs')->insert([
            'name_sekolah' => 'SMPN 1 Indramayu',
            'created_at' => now(),
        ]);
    }
}
