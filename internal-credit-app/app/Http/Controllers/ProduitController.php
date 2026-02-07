<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProduitController extends Controller
{

    public function index()
    {
        $products = Produit::take(3)->get();
        return view('listProduit', compact('products'));
    }
    /**
     * Display a listing of the resource.
     */
    public function indexx()
    {
        $produits = Produit::paginate(10);
        return view('produits.index', compact('produits'));
    }

    /**
     * Show the form for creating a new resource.
     */
        public function create()
        {
            return view('produits.create');
        }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $incomingFields = $request->validate([
        'title' => 'required|string|max:255',
        'quantity' => 'required|integer|min:0',
        'status' => 'required|string|max:255',
        'price' => 'required|integer|min:0'
    ]);

    Produit::create($incomingFields);
    
    return redirect()->route('produits.index')
                     ->with('success', 'Produit créé avec succès!');
}

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
       
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        

    }
}
