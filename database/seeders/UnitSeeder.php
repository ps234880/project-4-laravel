<?php

namespace Database\Seeders;

use App\Models\Unit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Unit::create([
            'name' => "10 pieces",
        ]);

        Unit::create([
            'name' => "200 gram",
        ]);
        
        Unit::create([
            'name' => "1 piece",
        ]);
    }
}
