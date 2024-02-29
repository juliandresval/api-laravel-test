<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use App\Models\Subscription;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'username' => 'admin',
            'full_name' => 'Admin Full Name',
            'email' => 'test@example.com',
        ]);

        User::factory(24)->create();

        Subscription::factory(25)->create();
    }
}
