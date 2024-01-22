<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Event;
use Faker\Factory as Faker;
class PaintingTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 5; $i++) {
            Event::create([
                'title' => $faker->realText(200),
                'description' => $faker->realText(200),
                'date' => $faker->dateTimeThisYear,
                'location' => $faker->city,
                'user_id' => 51, 
                'status' => $faker->randomElement(['active','unactive']),
                'created_at' => $faker->dateTimeThisYear,
                'updated_at' => $faker->dateTimeThisYear,
            ]);
        }
    }
}


