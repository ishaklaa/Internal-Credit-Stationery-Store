<?php

namespace Database\Factories;

use App\Models\Departement;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Produit>
 */
class ProduitFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'title' => fake()->name(),
            //'departement_id'=> Departement::all()->random()->id,
            'quantity' => fake()->numberBetween(0, 100),
            'status' => $this->faker->randomElement(['normal', 'premium']),
            'prix' => fake()->randomFloat(2, 5, 1000),
            

        ];
    }
}
