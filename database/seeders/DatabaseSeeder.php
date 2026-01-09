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
        // Buat 1 Akun Admin Default
    \App\Models\User::factory()->create([
        'name' => 'adminguestbook',
        'email' => 'admin@guestbook.co.id',
        'password' => bcrypt('admin123'), // Password default
    ]);

        // Buat 2 Kategori Default
    \App\Models\EventCategory::create(['name' => 'Umum']);
    \App\Models\EventCategory::create(['name' => 'Seminar Mahasiswa']);
    }
}
