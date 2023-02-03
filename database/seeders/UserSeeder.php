<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Wahan Havhannesyan',
            'email' => 'WH@gmail.com',
            'street' => 'Street1',
            'house_number' => '21',
            'postal_code' => '5523 LN',
            'phone_number' => '0612345678',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        ])->assignRole('admin', 'admin');

        User::create([
            'name' => 'Tong Sheng Zhang',
            'email' => 'TS@gmail.com',
            'street' => 'Street2',
            'house_number' => '23',
            'postal_code' => '5523 LN',
            'phone_number' => '0687654321',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        ])->assignRole('employee', 'employee');

        User::create([
            'name' => 'Erwin Yuen',
            'email' => 'EY@gmail.com',
            'street' => 'Street3',
            'house_number' => '40',
            'postal_code' => '5523 LN',
            'phone_number' => '0612348765',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        ])->assignRole('customer', 'customer');
    }
}
