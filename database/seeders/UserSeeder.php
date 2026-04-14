<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Admin GeoToba',
            'email' => 'admin@geotoba.com',
            'password' => Hash::make('password123'),
        ]);
    }
}