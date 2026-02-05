<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommandeController extends Controller
{
    public function addCommand()
    {
        $products = session()->get("basket");
        $employe = Auth::id();
        /* dd($products);
        exit; 
        foreach ($products as $key => $product) {
            var_dump($key);
        }*/
        //Commande::create()
    }
}
