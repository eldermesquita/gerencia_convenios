<?php

namespace Database\Factories;

use App\Models\Convenio;
use App\Models\Orgao;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class ConvenioFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Convenio::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        return [
            'numero' => $this->faker->unique()->randomNumber(6),
            'ano' => Carbon::now()->addYears(rand(-5, 5))->year,
            'objeto' => $this->faker->sentence,
            'valor_repasse' => $this->faker->randomFloat(2, 100000, 10000000),
            'valor_contrapartida' => $this->faker->randomFloat(2, 100, 10000),
            'inicio_vigencia' => $this->faker->date(),
            'fim_vigencia' => $this->faker->date(),
            'vigencia_prestacao_contas' => function (array $attributes) {
                // a partir desta fim_vigencia  a data limite  60 dias para a  virgencia_prestacao_contas
                $prestacaoContas = new \DateTime($attributes['fim_vigencia']);
                return $prestacaoContas->modify('+60 days')->format('Y-m-d');
            },
            'parlamentar_id' => \App\Models\Parlamentar::factory(),

        ];
    }
}
