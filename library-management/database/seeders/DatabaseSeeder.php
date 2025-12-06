<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create a single test user
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => bcrypt('password'), // optional: set password
        ]);

        // Seed books
        $this->call(BooksTableSeeder::class);

        // Seed book images
        $this->call(UpdateBookImagesSeeder::class);

        // Seed borrowing records and fines
        $this->call([
            BorrowingSeeder::class,
            FineSeeder::class,
        ]);
    }
}
