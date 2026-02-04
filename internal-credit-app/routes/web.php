<?php

use App\Http\Controllers\EmployeController;
use Illuminate\Support\Facades\Route;
use PhpParser\Node\Name;

Route::get('/', function () {
    return view('welcome');
});
//employeRoutes
Route::resource ('employe', EmployeController::class);
//employeRoutesEnd
