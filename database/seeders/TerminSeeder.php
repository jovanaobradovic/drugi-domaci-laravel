<?php

namespace Database\Seeders;

use App\Models\Termin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TerminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $termini = [
            '08:00 - 10:00',
            '10:00 - 12:00',
            '12:00 - 14:00',
            '14:00 - 16:00',
            '16:00 - 18:00',
            '18:00 - 20:00',
            '20:00 - 22:00'
        ];

        foreach ($termini as $termin){
            Termin::create([
                'nazivTermina' => $termin
            ]);
        }
    }
}
