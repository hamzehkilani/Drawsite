<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Post;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    protected $model = Post::class;

    public function definition()
    {
        return [
            'title' => $this->faker->sentence,
            'content' => $this->faker->realText(200), // Generate a paragraph with a maximum of 200 characters
            'user_id' => $this->faker->numberBetween(1, 10), // Replace with your user ID range
        ];
    }
}
