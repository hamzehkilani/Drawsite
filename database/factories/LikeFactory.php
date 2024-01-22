<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Like;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Like>
 */
class LikeFactory extends Factory
{
    protected $model = Like::class;

    public function definition()
    {
        return [
            'user_id' => $this->faker->numberBetween(1, 10), // Replace with your user ID range
            'post_id' => $this->faker->numberBetween(1, 20), // Replace with your post ID range
        ];
    }
}
