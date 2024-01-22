<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class PaintersTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        $usersWithPainterRole = DB::table('users')->where('role', 'Painters')->get();
        foreach ($usersWithPainterRole as $user) {

            $name = $faker->name;
            $bioWords = $faker->words(10); // Generate an array of 10 words
            $bio = implode(' ', $bioWords); // Join the words into a sentence

            DB::table('painters')->insert([
                'user_id' => $user->id,
              'name' => $user->name,
              'email'=>$user->email,
                'bio' => $bio, // Use the generated sentence
                'image' => $faker->imageUrl(200, 200, 'people', true, 'Faker', true),
                'created_at'=>now(),
                'updated_at'=>now(),
            ]);
        
        }
    }
}



