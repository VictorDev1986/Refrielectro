<?php

namespace Database\Seeders;

use App\Models\Gasto;
use Illuminate\Database\Seeder;

class GastoSeeder extends Seeder
{
    public function run(): void
    {
        foreach (Gasto::CATEGORIAS as $slug => $label) {
            Gasto::factory()->create([
                'categoria' => $slug,
                'descripcion' => 'Gasto inicial de ' . strtolower($label),
                'monto' => fake()->randomFloat(2, 100, 5000),
                'fecha' => now()->subDays(fake()->numberBetween(0, 30)),
            ]);
        }

        Gasto::factory(5)->create();
    }
}
