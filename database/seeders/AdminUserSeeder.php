<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create admin user if it doesn't exist
        User::firstOrCreate(
            ['email' => 'admin@execudea.com'],
            [
                'name' => 'Admin User',
                'email' => 'admin@execudea.com',
                'password' => Hash::make('admin123'),
                'email_verified_at' => now(),
            ]
        );

        // Create another test admin user
        User::firstOrCreate(
            ['email' => 'test@execudea.com'],
            [
                'name' => 'Test Admin',
                'email' => 'test@execudea.com',
                'password' => Hash::make('test123'),
                'email_verified_at' => now(),
            ]
        );

        $this->command->info('Admin users created successfully!');
        $this->command->info('Admin Login: admin@execudea.com / admin123');
        $this->command->info('Test Login: test@execudea.com / test123');
    }
}
