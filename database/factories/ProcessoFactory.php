<?php

namespace Database\Factories;

use App\Models\Orgao;
use App\Models\Processo;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

class ProcessoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Processo::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $numeroProcesso = Str::upper($this->faker->randomLetter . $this->faker->randomLetter)
            . '-' . $this->faker->unique()->randomNumber(4) . '/' . Carbon::now()->addYears(rand(-10,0))->year;


        $orgaos = Orgao::inRandomOrder()->first();
        $modalidade =['Concorrência', 'Convite', 'Tomada de preço', 'Concurso', 'Pregão', 'Leilão'];

        return [
            'numero' =>  $numeroProcesso,
            'ano' => Carbon::now()->addYears(rand(-5, 5))->year,
            'licitado' => $this->faker->boolean(),
            'modalidade' => Arr::random($modalidade),
            'orgao_id' =>  $orgaos->id,
            'convenio_id' => \App\Models\Convenio::factory(),
        ];
    }
}
