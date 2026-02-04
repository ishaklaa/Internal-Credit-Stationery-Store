<?php

use App\Http\Controllers\EmployeController;
use Illuminate\Support\Facades\Route;
use PhpParser\Node\Name;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/employedashboard',[EmployeController::class , 'index'])->name('index');