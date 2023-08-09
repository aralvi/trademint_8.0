<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        \App\Models\User::create([
            'first_name' => 'Super',
            'last_name' => 'Admin',
            'email' => 'superadmin@gmail.com',
            'password' => Hash::make('12345678'),
            'binance_email' => 'superadmin.gmail.com',
            'role' => 'admin',
            'status' => 'approved',

        ]);
    }
}
