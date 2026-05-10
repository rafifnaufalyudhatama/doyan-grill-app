<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // Akun Admin
        User::factory()->create([
            'name' => 'Admin Doyan',
            'email' => 'admin@doyan.com',
            'password' => bcrypt('password123'),
            'role' => 'admin',
        ]);

        // Akun User Biasa
        User::factory()->create([
            'name' => 'User Biasa',
            'email' => 'user@example.com',
            'password' => bcrypt('password123'),
            'role' => 'user',
        ]);

        $this->call([
            ProductSeeder::class,
        ]);
    }
}
