<?php

namespace Database\Factories;

use App\Models\Commande;
use App\Models\panier;
use App\Models\Produit;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\panier>
 */
class PanierFactory extends Factory
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
           'commande_id'=> Commande::all()->random()->id,
           'produit_id'=> Produit::all()->random()->id,
        ];
    }
}
