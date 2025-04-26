<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\News>
 */
class NewsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->word,
            'author' => $this->faker->name,
            'image' => "/images/hero.png",
            'content' => $this->faker->paragraph,
            'user_id' => $this->faker->phoneNumber,
            'category_id' => Category::inRandomOrder()->value('id'),
        ];
    }
}
