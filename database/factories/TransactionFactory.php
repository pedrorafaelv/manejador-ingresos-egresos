<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaction>
 */
class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'category_id' => \App\Models\TransactionCategory::factory(),
            'monto' => $this->faker->randomFloat(2, 10, 1000),
            'descripcion' => $this->faker->sentence(),
            'fecha_transaction' => $this->faker->date(),
        ];
    }
}
