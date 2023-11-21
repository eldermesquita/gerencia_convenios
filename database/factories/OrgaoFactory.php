<?php

namespace Database\Factories;

use App\Models\Orgao;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

class OrgaoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Orgao::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
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
        return [
            'nome' => Arr::random($municipios),
            'esfera' => Arr::random($esfera),
        ];
    }
}
