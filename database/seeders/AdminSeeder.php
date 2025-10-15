<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // User::firstOrCreate(
        //     ['email' => 'admin@example.com'],
        //     [
        //         'name' => 'Administrator',
        //         'password' => Hash::make('yourStrongPassword'),
        //     ]
        // );

        User::firstOrCreate(
            ['email' => 'iamstupid@gmail.cock'],
            [
                'name' => 'Administrator',
                'password' => Hash::make('secret1234'),
            ]
            );
    }
}
