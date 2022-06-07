<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Request;

class GuruSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Request $request)
    {
        $faker = Factory::create('id_ID');
        $gender = $faker->randomElements(['L', 'P'])[0];
        $noInduk = mt_rand(100880000, mt_getrandmax());
        foreach(range(1,3) as $item){
            User::create([
                'role' => 'guru',
                'name' => $faker->name,
                'username' => '100234'.$item,
                'jk' => $gender,
                'sekolah_asal' => 1,
                'no_induk' =>  '100234'.$item,
                'nisn' => mt_rand(100880000, mt_getrandmax()),
                'password' => Hash::make('passwordMTS'),
            ]);
        }

    }
}
