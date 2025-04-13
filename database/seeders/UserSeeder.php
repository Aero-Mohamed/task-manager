<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create Admin User
        $admin = User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@test.com',
            'password' => bcrypt('123456789'),
        ]);
        $admin->assignRole(['Super Admin']);

        // Create User
        $user = User::factory()->create([
            'name' => 'User',
            'email' => 'user@test.com',
            'password' => bcrypt('123456789'),
        ]);
        $user->assignRole(['User']);
    }
}
