<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('units')->insert([
            'name' => "10 pieces",
        ]);

        DB::table('units')->insert([
            'name' => "200 gram",
        ]);
        
        DB::table('units')->insert([
            'name' => "1 piece",
        ]);
    }
}
