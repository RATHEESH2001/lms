<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Fine;

class FineSeeder extends Seeder
{
    public function run(): void
    {
        Fine::factory()->count(50)->create();
    }
}
