<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Marketing>
 */
class MarketingFactory extends Factory
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
            'alias_cate'=>'red',
            "description"=>$this->faker->name(). $this->faker->name() . $this->faker->name(). $this->faker->name(),
            'user_id' => 1,
            'image_url' => 'http://127.0.0.1:8000/images/dev/event.png',
        ];
    }
}
