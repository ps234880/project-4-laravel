<?php

namespace Database\Seeders;

use App\Models\Size;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Size::create([
            'name' => "Small",
        ]);

        Size::create([
            'name' => "Medium",
        ]);

        Size::create([
            'name' => "Large",
        ]);
    }
}
