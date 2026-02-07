<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CommandeController;
use App\Http\Controllers\CommandesInfoController;
use App\Http\Controllers\EmployeController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\ProduitController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
<<<<<<< HEAD
<<<<<<< HEAD
use PhpParser\Node\Name;
use App\Notifications\managerResponse;
=======

>>>>>>> 71398a7769c701201a377f1bb12f68c8a9d504cb
=======

>>>>>>> 4c473febcff16b8e679a6318bdfd8c11abfd212a
Route::get('/', function () {
    return view('welcome');
    (new \App\Jobs\ProcessUserTokens ())->handle();
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
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
<<<<<<< HEAD
<<<<<<< HEAD
Route::get ("notifications",[MailController::class , 'index']);
=======
=======
>>>>>>> 4c473febcff16b8e679a6318bdfd8c11abfd212a




//produitRoutes
Route::resource('produits', ProduitController::class);
//produitRoutesEnd

<<<<<<< HEAD
>>>>>>> 71398a7769c701201a377f1bb12f68c8a9d504cb
=======
>>>>>>> 4c473febcff16b8e679a6318bdfd8c11abfd212a
