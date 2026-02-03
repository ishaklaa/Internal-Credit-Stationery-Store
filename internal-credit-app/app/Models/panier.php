<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class panier extends Model
{
    /** @use HasFactory<\Database\Factories\PanierFactory> */
    use HasFactory;
    protected $fillable=[
        'commande_id',
        'produit_id',
    ];
}
