<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IngrediëntSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ingrediënten')->insert([
            'naam' => "Kaas",
            'prijs' => 0.20,
        ]);
        DB::table('ingrediënten')->insert([
            'naam' => "Basilicum",
            'prijs' => 0.25,
        ]);
        DB::table('ingrediënten')->insert([
            'naam' => "Tomatensaus",
            'prijs' => 0.80,
        ]);
        DB::table('ingrediënten')->insert([
            'naam' => "Ham",
            'prijs' => 1.00,
        ]);
        DB::table('ingrediënten')->insert([
            'naam' => "Ei",
            'prijs' => 0.60,
        ]);
    }
}
