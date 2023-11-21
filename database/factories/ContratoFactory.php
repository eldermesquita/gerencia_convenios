<?php

namespace Database\Factories;

use App\Models\Contrato;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

class ContratoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Contrato::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $numeroProcesso = Str::upper( $this->faker->randomLetter . $this->faker->randomLetter )
        .'-'. $this->faker->unique()->randomNumber(4) .'/'. date('Y');
        $modalidade = [
            'concorrência',
            'convite',
            'tomada de preço',
            'concurso',
            'pregão',
            'leilão',
        ];
        return [
            'numero' => $this->faker->unique()->randomNumber(6),
            'numero_processo' => $numeroProcesso,
            'virgencia' => $this->faker->date(),
            'virgencia_execucao' => $this->faker->date(),
            'valor' =>  $this->faker->randomFloat(2, 50, 10000),
            'modalidade' => Arr::random($modalidade),
            'empresa_id' => \App\Models\Empresa::factory(),
        ];
    }
}
