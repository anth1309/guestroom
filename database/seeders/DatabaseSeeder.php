<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Room;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Admin gite',
            'email' => 'admingite@example.com',
            'password' => Hash::make('gite'),
            'role' => 'admin'
        ]);

        Room::create([
            'name' => 'Mont Koghi',
            'description' => 'Une chambre confortable avec des équipements de base.',
            'capacity' => 3,
            'weekly_price' => 5000,
            'weekend_price' => 7000,
        ]);

        Room::create([
            'name' => 'Mont Panié',
            'description' => 'Une chambre spacieuse avec des installations modernes.',
            'capacity' => 3,
            'weekly_price' => 5000,
            'weekend_price' => 7000,
        ]);

        Room::create([
            'name' => 'Ouen Toro',
            'description' => 'Une suite de luxe avec vue sur la montagne.',
            'capacity' => 3,
            'weekly_price' => 5000,
            'weekend_price' => 7000,
        ]);
    }
}
