<?php

namespace Database\Seeders;

use App\Models\Parlamentar;
use Illuminate\Database\Seeder;

class ParlamentarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Parlamentar::factory()
            ->count(5)
            ->create();
    }
}
