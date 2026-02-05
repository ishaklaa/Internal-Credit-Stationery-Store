<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use Illuminate\Http\Request;

class ProduitController extends Controller
{
    public function index()
    {
        $products = Produit::take(3)->get();
        return view('listProduit', compact('products'));
    }
}
