<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Borrow;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Fine>
 */
class FineFactory extends Factory
{
    public function definition(): array
    {
        $borrow = Borrow::inRandomOrder()->first();

        return [
            'borrow_id' => $borrow->id ?? 1,
            'user_id' => $borrow->user_id ?? 1,
            'amount' => $this->faker->numberBetween(10, 100),
            'reason' => $this->faker->sentence(),
            'paid' => $this->faker->boolean(50),
            'paid_at' => $this->faker->boolean(50) ? $this->faker->dateTimeBetween('-1 months', 'now') : null,
        ];
    }
}
