<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        $this->call([
            DietTypeSeeder::class,
            DiseaseSeeder::class,
        ]);

        User::factory()->create([
            'name' => 'Admin Sistem',
            'email' => 'admin@example.com',
            'role' => 'admin',
        ]);

        User::factory()->create([
            'name' => 'Staff Gizi',
            'email' => 'staff@example.com',
            'role' => 'staff',
        ]);
    }
}
