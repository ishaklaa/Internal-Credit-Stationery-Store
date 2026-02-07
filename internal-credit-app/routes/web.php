<?php

use App\Http\Controllers\EmployeController;
use App\Http\Controllers\ProduitController;
use Illuminate\Support\Facades\Route;
use PhpParser\Node\Name;

Route::get('/', function () {
    return view('welcome');
});
//employeRoutes
Route::resource ('employe', EmployeController::class);
//employeRoutesEnd

//produitRoutes
Route::resource('produits', ProduitController::class);
//produitRoutesEnd
