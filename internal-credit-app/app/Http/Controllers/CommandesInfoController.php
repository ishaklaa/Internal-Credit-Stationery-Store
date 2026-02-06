<?php

namespace App\Http\Controllers;

use App\Models\CommandesInfo;
use App\Models\Produit;
use Illuminate\Http\Request;

class CommandesInfoController extends Controller
{
    public function addCart(Produit $product, Request $req)
    {
        //var_dump($req->quantity);
        //var_dump($product->prix);
        $basket = session()->get("basket");
        if (isset($basket[$product->id])) {
            $basket[$product->id]['quantity'] += $req->quantity;
        } else {
            $product_details = [
                'title' => $product->title,
                'prix' => $product->prix,
                'quantity' => $req->quantity
            ];

            $basket[$product->id] = $product_details;
        }
        session()->put("basket", $basket);
        return redirect()->route('list.produits');
    }
    public function remove($idProduct)
    {
        $basket = session()->get("basket");
        unset($basket[$idProduct]);
        session()->put("basket", $basket);
        return redirect()->route('list.produits');
    }
}
