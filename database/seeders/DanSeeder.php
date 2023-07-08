<?php

namespace Database\Seeders;

use App\Models\Dan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dani = [
            'Ponedeljak',
            'Utorak',
            'Sreda',
            'Cetvrtak',
            'Petak',
            'Subota',
            'Nedelja'
        ];

        foreach ($dani as $dan){
            Dan::create([
                'nazivDana' => $dan
            ]);
        }
    }
}
