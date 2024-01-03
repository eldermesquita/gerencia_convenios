<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\ProcessoHistorico;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProcessoHistoricoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ProcessoHistorico::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'observacao' => $this->faker->text(),
            'processo_id' => \App\Models\Processo::factory(),
        ];
    }
}
