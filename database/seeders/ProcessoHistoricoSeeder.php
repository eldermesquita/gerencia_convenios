<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProcessoHistorico;

class ProcessoHistoricoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProcessoHistorico::factory()
            ->count(5)
            ->create();
    }
}
