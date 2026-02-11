<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommandesInfo extends Model
{
    /** @use HasFactory<\Database\Factories\CommandesInfoFactory> */
    use HasFactory;
    protected $fillable = [
        'commande_id',
        'produit_id',
        'status',

    ];
}
