<?php

namespace Database\Factories;

use App\Models\Borrow;
use App\Models\Book;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class BorrowFactory extends Factory
{
    protected $model = Borrow::class;

    public function definition(): array
    {
        $borrowDate = $this->faker->dateTimeBetween('-1 months', 'now');
        $returnDate = (clone $borrowDate)->modify('+14 days');

        return [
            'book_id' => Book::inRandomOrder()->first()->id ?? 1,
            'user_id' => User::inRandomOrder()->first()->id ?? 1,
            'borrow_date' => $borrowDate,
            'return_date' => $returnDate,
            'actual_return_date' => $this->faker->boolean(80) ? $this->faker->dateTimeBetween($borrowDate, $returnDate) : null,
            'status' => $this->faker->boolean(80) ? 'returned' : 'borrowed',
            'fine_amount' => 0,
        ];
    }
}
