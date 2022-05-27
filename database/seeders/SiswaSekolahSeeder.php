<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class SiswaSekolahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create('id_ID');
        $gender = $faker->randomElements(['L', 'P'])[0];
        foreach(range(1,3) as $item){
            User::create([
                'role' => 'siswa',
                'name' => $faker->name,
                'id_kelas' => $item,
                'username' => 'siswaMTS'.$item,
                'jk' => $gender,
                'sekolah_asal' => 1,
                'no_induk' => mt_rand(100880000, mt_getrandmax()),
                'nisn' => mt_rand(100880000, mt_getrandmax()),
                'password' => Hash::make('passwordMTS'),
            ]);
        }
    }
}
