<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Item>
 */
class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->catchPhrase(),
            'email' => fake()->safeEmail(),
            'phone' => fake()->phoneNumber(),
            'address' => fake()->address(),
            'img_path_banner' => fake()->imageUrl(360, 360, 'items', true, 'temp', false, 'jpg'),
            'desc' => fake()->paragraph(),
            'owner' => fake()->company(),
            'created_at' => now(),
            'created_by' => 'seeder',
            'category_id' => fake()->randomElement(Category::withTrashed()->get()->makeVisible('id')->transform(fn($item) => strval($item->id))->toArray())
        ];
    }
}
