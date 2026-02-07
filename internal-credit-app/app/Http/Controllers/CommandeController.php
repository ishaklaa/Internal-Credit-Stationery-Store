<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use App\Models\CommandesInfo;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CommandeController extends Controller
{
    public function addCommand()
    {
        $products = session()->get("basket");
        //dd($products);
        $employeId = 1; //Auth::id();
        $employe = Auth::user();

        try {

            $commande = DB::transaction(function () use ($products, $employeId) {


                $total = 0;

                foreach ($products as $key => $product) {
                    $dbProduct = DB::table('produits')
                        ->where('id', $key)
                        ->lockForUpdate()
                        ->first();



                    if ($dbProduct->quantity < $product['quantity']) {

                        throw new Exception("Stock insufficient for product ID {$key}");
                    }


                    $total += $dbProduct->prix * $product['quantity'];
                }

                $employe = DB::table('employes')
                    ->where('id', $employeId)
                    ->lockForUpdate()
                    ->first();



                if ($employe->token < $total) {
                    throw new Exception("Token insufficient");
                }

                $commande = Commande::create([
                    'employeId' => $employeId
                ]);

                foreach ($products as $key => $product) {

                    CommandesInfo::create([
                        'commande_id' => $commande->id,
                        'produit_id'  => $key,
                        'quantity'    => $product['quantity'],
                    ]);

                    DB::table('produits')
                        ->where('id', $key)
                        ->decrement('quantity', $product['quantity']);
                }

                DB::table('employes')
                    ->where('id', $employeId)
                    ->decrement('token', $total);

                return $commande;
            });

            return redirect()->back()->with('success', 'Commande created successfully');
        } catch (\Throwable $e) {

            return back()->withErrors([
                'error' => $e->getMessage()
            ]);
        }
    }
}
