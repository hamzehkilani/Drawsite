<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as FakerFactory;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = FakerFactory::create();

        $usersWithPainterRole = DB::table('users')->where('role', 'Painters')->get();

        foreach ($usersWithPainterRole as $user) {          
              Post::create([
                'title' => $faker->realText(200), 
                'content' => $faker->realText(200), 
                'user_id' => $user->id, // Assign a random user ID within your user range
           
            ]);
        }
    }
}
