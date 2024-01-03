<?php

namespace Database\Factories;

use App\Models\Categria;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategriaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Categria::class;

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
