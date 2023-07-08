<?php

namespace Database\Seeders;

use App\Models\Trening;
use Illuminate\Database\Seeder;

class TreningSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $treninzi = [
            'Core', 'Lower body', 'Bodyweight', 'Power', 'Abs'
        ];

        foreach ($treninzi as $trening){
            Trening::create([
                'nazivTreninga' => $trening
            ]);
        }
    }
}
