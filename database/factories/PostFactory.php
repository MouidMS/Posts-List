<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'uuid' => '16a065bd-49d9-416b-bb0f-b1e56463cbb5',
            'title' => $this->faker->sentence(),
            'body' => $this->faker->paragraphs(3, true),
            'user_id' => '1',
        ];
    }
}
