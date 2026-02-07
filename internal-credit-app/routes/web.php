<?php

use App\Http\Controllers\CommandeController;
use App\Http\Controllers\CommandesInfoController;
use App\Http\Controllers\EmployeController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\ProduitController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use PhpParser\Node\Name;
use App\Notifications\managerResponse;
Route::get('/', function () {
    return view('welcome');
    (new \App\Jobs\ProcessUserTokens ())->handle();
});
Route::get('/employedashboard', [EmployeController::class, 'index'])->name('index');
//Produits
Route::get('/index', [ProduitController::class, 'index'])->name('list.produits');
Route::post('/addCarte/{product}', [CommandesInfoController::class, 'addCart'])->name('add.cart');
Route::get('/removeCart/{id}', [CommandesInfoController::class, 'remove'])->name('cart.remove');
//add commande from panier 
Route::post('/addCommand', [CommandeController::class, 'addCommand'])->name('add.Command');
//employeRoutes
Route::resource('employe', EmployeController::class);
//employeRoutesEnd
Route::get ("notifications",[MailController::class , 'index']);