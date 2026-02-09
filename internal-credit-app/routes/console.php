<?php

use App\Jobs\ProcessUserTokens;
use App\Models\Employe;
use App\Models\manager;
use Illuminate\Support\Facades\Schedule;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');
Schedule::call(function () {
        $employees = Employe::all ();
        $managers = manager::all ();
        Employe::updated ($employees->token , "1000");
        manager::updated ($managers->token , "1000");
})->daily();

