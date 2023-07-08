<?php

namespace Database\Seeders;

use App\Models\Raspored;
use Illuminate\Database\Seeder;

class RasporedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 100; $i++) {

            Raspored::create([
                'danId' => rand(1,7),
                'terminId' => rand(1,7),
                'treningId' => rand(1,5),
                'trener' => $faker->name,
                'napomena' => $faker->sentences(3, true)
            ]);
        }
    }
}
