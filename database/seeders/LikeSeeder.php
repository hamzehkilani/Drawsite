<?php

namespace Database\Seeders;

use App\Models\Like;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LikeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $usersWithPainterRole = DB::table('posts')->get();
        foreach($usersWithPainterRole as $post){
            Like::create([
                'user_id' => rand(1, 50), // Assign a random user ID within your user range
                'post_id' => rand(1, 100), // Assign a random post ID within your post range
            ]);
        }
    }
}
