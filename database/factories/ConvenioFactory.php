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
        $numeroProcesso = Str::upper( $this->faker->randomLetter . $this->faker->randomLetter )
        .'-'. $this->faker->unique()->randomNumber(4) .'/'. date('Y');

        $orgaos = Orgao::inRandomOrder()->first();


        return [
            'numero' => $this->faker->unique()->randomNumber(6),
            'ano' => Carbon::now()->addYears(rand(-5, 5))->year,
            'objeto' => $this->faker->sentence,
            'numero_processo' => $numeroProcesso,
            'ano_processo' => Carbon::now()->addYears(rand(-5, 5))->year,
            'valor_repasse' => $this->faker->randomFloat(2, 100, 10000),
            'valor_contra_partida' => $this->faker->randomFloat(2, 100, 10000),
            'valor_total' => $this->faker->randomFloat(2, 200, 20000),
            'valor_liberado_concedente' => $this->faker->randomFloat(2, 50, 10000),
            'valor_pago' => $this->faker->randomFloat(2, 50, 10000),
            'valor_liberado' => $this->faker->randomFloat(2, 100, 20000),
            'virgencia' => $this->faker->date(),
            'virgencia_prestacao_contas' => function (array $attributes) {
                $virgencia = new \DateTime($attributes['virgencia']);
                $virgenciaPrestacaoContas = $virgencia->modify('+60 days')->format('Y-m-d');
                return $virgenciaPrestacaoContas;
            },
            'contrato_id' => \App\Models\Contrato::factory(),
            'orgao_id' =>  $orgaos->id ?? \App\Models\Orgao::factory(),

            /*
            $table->date('virgencia'); /// a partir desta data  a data padrão 60 dias para virgencia_prestacao_contas
            $table->date('virgencia_prestacao_contas'); // 60 dias
            */
        ];
    }
}
