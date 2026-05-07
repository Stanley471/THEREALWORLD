<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
         $admin = User::create([
        'name' => 'Admin',
        'email' => 'admin@therealworld.com',
        'password' => Hash::make('password'),
        'email_verified_at' => now(),
    ]);

    $admin->assignRole('admin');
    }
}
