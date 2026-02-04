<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Employe extends Model
{
    use HasFactory;
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function commmandes(){
        return $this->hasMany(Commande::class);
    }
     protected $fillable =[
        'user_id',
        'token',
    ];
}
