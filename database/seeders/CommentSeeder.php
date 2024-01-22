<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Comment;

class CommentSeeder extends Seeder
{
    public function run()
    {
        $numberOfComments = 5000; 

        Comment::factory($numberOfComments)->create();
    }
}