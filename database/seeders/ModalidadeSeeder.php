<?php

namespace Database\Seeders;

use App\Models\Modalidade;
use Illuminate\Database\Seeder;

class ModalidadeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Modalidade::factory()
            ->count(5)
            ->create();
    }
}
