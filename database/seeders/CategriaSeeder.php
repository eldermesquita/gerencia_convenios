<?php

namespace Database\Seeders;

use App\Models\Categria;
use Illuminate\Database\Seeder;

class CategriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Categria::factory()
            ->count(5)
            ->create();
    }
}
