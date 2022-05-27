<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryUjianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create('id_ID');
        foreach(range(1,3) as $item){
            DB::table('category_ujians')->insert([
                'id_sekolah_asal' => 1,
                'name_category_ujian' => 'UTS Ganjil 202'.$item,
                'created_at' => now(),
            ]);
        }
        foreach(range(1,3) as $item){
            DB::table('category_ujians')->insert([
                'id_sekolah_asal' => 1,
                'name_category_ujian' => 'UAS Genap 202'.$item,
                'created_at' => now(),
            ]);
        }
    }
}
