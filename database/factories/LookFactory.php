<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Look>
 */
class LookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            
                'title' => $this->faker->name(),
                'user_id' => 1,
                'image_url' => 'http://127.0.0.1:8000/images/dev/rrrr.png',
        ];
    }
}
