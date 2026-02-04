<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Commande;
use App\Models\Departement;
use App\Models\Employe;
use App\Models\manager;
use App\Models\panier;
use App\Models\Produit;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {

       User::factory(10)->create();
       Departement::factory(10)->create();
       Produit::factory(10)->create();
       panier::factory(10)->create();
        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
