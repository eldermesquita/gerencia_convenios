<?php

namespace Database\Seeders;

use App\Models\Orgao;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class OrgaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {


        $municipios = [
            "Prefeitura Municipal de Iracema",
            "Prefeitura Municipal de São Luiz",
            "Prefeitura Municipal de Rorainópolis",
            "Prefeitura Municipal de Bonfim",
        ];
        $esfera = [
                'federal',
                'estadual',
                'municipal',
                'outros',
        ];

        foreach ($municipios as $key => $row) {
            Orgao::create([
                'nome' => $row,
                'esfera'=> 'municipal'
            ]);
        }
        /* Orgao::factory()->count(4)
            ->create(['nome'=>Arr::random($municipios), 'esfera'=>Arr::random($esfera)]); */
    }
}
