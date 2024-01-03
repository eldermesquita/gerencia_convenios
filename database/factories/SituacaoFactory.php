<?php

namespace Database\Factories;

use App\Models\Situacao;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class SituacaoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Situacao::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'descricao' => $this->faker->text(255),
        ];
    }
}
