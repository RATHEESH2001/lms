<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    public function definition(): array
    {
        $imageName = 'book_' . $this->faker->unique()->numberBetween(1, 100) . '.jpg';
        $imagePath = public_path('books/' . $imageName);

        // Create dummy image only if it doesn't exist
        if (!file_exists($imagePath)) {
            $image = file_get_contents('https://picsum.photos/200/300?random=' . rand(1, 1000));
            file_put_contents($imagePath, $image);
        }

        return [
            'title' => $this->faker->sentence(3),
            'image' => 'books/' . $imageName, // Stored in public folder
            'author' => $this->faker->name(),
            'category' => $this->faker->randomElement(['Fiction', 'Science', 'History', 'Technology', 'Biography', 'Education']),
            'isbn' => $this->faker->isbn13(),
            'publisher' => $this->faker->company(),
            'published_year' => $this->faker->year(),
            'pages' => $this->faker->numberBetween(100, 1000),
            'language' => $this->faker->randomElement(['English', 'Tamil', 'Malayalam', 'Hindi']),
        ];
    }
}
