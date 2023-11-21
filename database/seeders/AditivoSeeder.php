<?php

namespace Database\Seeders;

use App\Models\Aditivo;
use Illuminate\Database\Seeder;

class AditivoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Aditivo::factory()
            ->count(5)
            ->create();
    }
}
