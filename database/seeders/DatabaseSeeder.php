<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Room;
use App\Models\User;
use Illuminate\Support\Facades\DB;
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

        $images = [
            [
                'room_id' => 1,
                'image_path' => 'room_images/Mont Koghi/LzxyksOGZDzsh61XjpK5rnkAcY7tb79to4Z2eLgJ.jpg',
            ],
            [
                'room_id' => 1,
                'image_path' => 'room_images/Mont Koghi/V3fNRtcjKIRQoIFwQ8tqbSkMotNjy7PrsD79LCEz.jpg',
            ],
            [
                'room_id' => 2,
                'image_path' => 'room_images/Mont Panié/1rHXnKro1EYVu7zWuFEdPGmsXg6JD37aQlpoYVqY.jpg',
            ],
            [
                'room_id' => 2,
                'image_path' => 'room_images/Mont Panié/jVQREwsA2JExeP177aYA7CcoMMnwK4T8TtejuJwP.jpg',
            ],
            [
                'room_id' => 2,
                'image_path' => 'room_images/Mont Panié/KB4ZEXd03bUM3QJwlTO0a950XkyhDEsjpYtLcSvJ.jpg',
            ],
            [
                'room_id' => 3,
                'image_path' => 'room_images/Ouen Toro/McZh1lkIDn65kJMoncCVSKf99yjhaGkwWAbVvAeG.jpg',
            ],
            [
                'room_id' => 3,
                'image_path' => 'room_images/Ouen Toro/ek5qvZcRXFWXvdRGrjJVyPKDhIRg3Epo0zFt4PaD.jpg',
            ],
            [
                'room_id' => 3,
                'image_path' => 'room_images/Ouen Toro/fjMpEXxgnzvB0yKOfOwIPq74iYKTe5HPGS8pEQHn.jpg',
            ],
            [
                'room_id' => 3,
                'image_path' => 'room_images/Ouen Toro/h26mUOWn47RxR8k4noRzn0J8P22o41vrTEWcNcG7.jpg',
            ],
            [
                'room_id' => 3,
                'image_path' => 'room_images/Ouen Toro/OIwq5gk1so9hxFPlDpD3Cc571R25GnLrpZAoaxHU.jpg',
            ],
        ];
        foreach ($images as $image) {
            DB::table('room_images')->insert($image);
        }
    }
}
