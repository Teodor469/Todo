<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Todo;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Todo>
 */
class TodoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'task' => fake()->sentence(),
            'check' => fake()->boolean(),
            'priority' => fake()->randomElement([1, 2, 3]),
        ];
    }
}
