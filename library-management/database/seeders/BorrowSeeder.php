<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Borrow;

class BorrowSeeder extends Seeder
{
    public function run(): void
    {
        Borrow::factory()->count(100)->create();
    }
}
