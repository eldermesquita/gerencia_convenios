<?php

namespace Database\Factories;

use App\Models\Aditivo;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

class AditivoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Aditivo::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $tipoAditivo = [
            'Aditivos de execução',
            'Aditivo de contrato',
        ];
        return [
            'numero' => $this->faker->unique()->randomNumber(6),
            'tipo' => Arr::random($tipoAditivo),
            'prazo' => $this->faker->date(),
        ];
    }
}
