<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Comment;
namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Comment; 

class CommentFactory extends Factory
{
    protected $model = Comment::class;

    public function definition()
    {
        return [
            'user_id' => $this->faker->numberBetween(1, 50), // Assuming you have users with IDs from 1 to 10
            'post_id' => $this->faker->numberBetween(1, 50), // Assuming you have posts with IDs from 1 to 20
            'content' => $this->faker->realText(200), // Generate a paragraph with a maximum of 200 characters
        ];
    }
}
