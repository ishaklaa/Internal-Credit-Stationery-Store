<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use App\Models\CommandesInfo;
use App\Models\Employe;
use App\Models\manager;
use App\Models\Produit;
use Exception;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class CommandeController extends Controller
{
    public function addCommand()
    {
        $products = session()->get("basket");
        //dd($products);
        $userId = Auth::user()->id;

        $employe = Employe::where('user_id', $userId)->first();

        $employeId = $employe->id;
        // dd($employeId);


        // $employe = Auth::user();

        try {

            $commande = DB::transaction(
                function () use ($products, $employeId) {


                    $total = 0;
                    $normalPr = [];
                    $premiumPr = [];

                    foreach ($products as $key => $product) {
                        $dbProduct = DB::table('produits')
                            ->where('id', $key)
                            ->lockForUpdate()
                            ->first();



                        if ($dbProduct->quantity < $product['quantity']) {

                            throw new Exception("Stock insufficient for product ID {$key}");
                        }


                        $total += $dbProduct->prix * $product['quantity'];
                        //  dd($product);

                        if ($product['status'] == 'normal') {
                            $normalPr[$key] = $product;
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

                            foreach ($normalPr as $key => $product) {

                                CommandesInfo::create([
                                    'commande_id' => $commande->id,
                                    'produit_id'  => $key,
                                    'quantity'    => $product['quantity'],
                                    'status'      => 'accepted',
                                ]);



                                DB::table('produits')
                                    ->where('id', $key)
                                    ->decrement('quantity', $product['quantity']);

                                DB::table('employes')
                                    ->where('id', $employeId)
                                    ->decrement('token', $total);

                                // return $commande;
                            }
                        } else if ($product['status'] == 'premium') {
                            $premiumPr[$key] = $product;
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

                            foreach ($premiumPr as $key => $product) {

                                CommandesInfo::create([
                                    'commande_id' => $commande->id,
                                    'produit_id'  => $key,
                                    'quantity'    => $product['quantity'],
                                    'status'      => 'pending',

                                ]);



                                DB::table('produits')
                                    ->where('id', $key)
                                    ->decrement('quantity', $product['quantity']);

                                DB::table('employes')
                                    ->where('id', $employeId)
                                    ->decrement('token', $total);
                            }
                        };
                    }
                }

            );

            // return redirect()->back()->with('success', 'Commande created successfully');
        } catch (\Throwable $e) {
            return back()->withErrors([
                'error' => $e->getMessage()
            ]);
        }
    }
    // public function showCmds()
    // {


    //     $dep_id = Auth::user()->departement_id;
    //     $commandesInfos = CommandesInfo::where('status', 'pending')->get();
    //     foreach ($commandesInfos as $cmd) {
    //         $user = Employe::find($cmd->employeId);
    //         $userDep = $user->departement_id;
    //         if ($dep_id == $userDep) {
    //             $commande = Commande::find($cmd->commande_id);
    //             $employee_id = $commande->employeId;
    //             $employe = User::find($employee_id);
    //             $employeName = $employe->name;
    //             $produit = Produit::find($cmd->produit_id);
    //             $produitTitle = $produit->title;

    //             return view('manager',compact('produitTitle','employeName'));
    //         }
    //     }
    // }

    public function showCmds()
    {
        $user = Auth::user();
        $manager = manager::where('user_id', $user->id)->first();
        $depId = $manager->departement_id;


        $commandesInfos = CommandesInfo::where('status', 'pending')->get();

        $items = [];

        foreach ($commandesInfos as $cmd) {
            // $user = Employe::find($cmd->employeId);
            // if (! $user || $user->departement_id != $depId) {
            //     continue;
            // }
            $commande = Commande::find($cmd->commande_id);
            $employe = Employe::find($commande->employeId);
            $user = User::find($employe->user_id);

            // $employe = Employe::where('id',$employe_id)->first();

            if ($employe->departement_id == $depId) {
                $produit  = Produit::find($cmd->produit_id);
                $items[] = [
                    'cmd'          => $cmd,
                    'employeName'  => $user?->name,
                    'produitTitle' => $produit?->title,
                ];
            }
        }

        return view('manager', compact('items'));
    }
    public function accept(CommandesInfo $commandeInfo)
    {
        $commandeInfo->status = 'accepted';
        $commandeInfo->save();

        return back()->with('success', 'Commande acceptée.');
    }

    public function reject(CommandesInfo $commandeInfo)
    {
        $commandeInfo->status = 'rejected';
        $commandeInfo->save();

        return back()->with('success', 'Commande refusée.');
    }
}
