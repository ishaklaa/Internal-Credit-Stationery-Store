<?php

namespace App\Http\Controllers;

use App\Models\Produit;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProduitController extends Controller
{

    public function indexx()
    {
        $products = Produit::take(3)->get();
        return view('listProduit', compact('products'));
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
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
            'prix' => 'required|integer|min:0',
            'img' => 'required |image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);


        if ($request->hasFile("img")) {
            $incomingFields['img'] = $request->file('img')->store('images', 'public');
        }

        Produit::create($incomingFields);


        return redirect()->route('produits.index')
            ->with('success', 'Produit créé avec succès!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id) {}

    /**
     * Show the form for editing the specified resource.
     */

    public function edit(Produit $produit)
    {
        return view("produits.edit", compact('produit'));
    }


    /**
     * Update the specified resource in storage.
     */



    public function update(Request $request, Produit $produit)
    {

        $valide = $request->validate([
            'title' => 'required|string|max:255',
            'quantity' => 'required|integer|min:0',
            'status' => 'required|string|max:255',
            'prix' => 'required|integer|min:0',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg'
        ]);

        if ($request->hasFile('img')) {
            $valide['img'] = $request->file('img')->store('images', 'public');
        }


        $produit->update($valide);

        return redirect()->route('produits.index')
            ->with('success', 'Produit mis à jour avec succès');
    }


    /**
     * Remove the specified resource from storage.
     */

    public function destroy(Produit $produit)
    {

        $produit->delete();
        return redirect()->route('produits.index')
            ->with('success', 'Produit supprimer avec succès');
    }
}
