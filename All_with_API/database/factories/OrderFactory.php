<?php

namespace Database\Factories;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'date' => $this->faker->date,
            'status' => $this->faker->randomElement(['pending', 'shipped', 'delivered']),
            'room_number' => $this->faker->numberBetween(100, 500),
            'user_id' => User::factory(),
            'admin_id' => Admin::factory(),
        ];
    }
}
