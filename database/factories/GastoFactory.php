<?php

namespace Database\Factories;

use App\Models\Gasto;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<\App\Models\Gasto>
 */
class GastoFactory extends Factory
{
    protected $model = Gasto::class;

    public function definition(): array
    {
        $categoria = $this->faker->randomElement(array_keys(Gasto::CATEGORIAS));

        return [
            'categoria' => $categoria,
            'descripcion' => $this->faker->sentence(6),
            'monto' => $this->faker->randomFloat(2, 50, 5000),
            'fecha' => $this->faker->date(),
            'venta_id' => null,
        ];
    }
}
