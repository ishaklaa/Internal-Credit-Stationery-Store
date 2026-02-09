<?php

use App\Jobs\ProcessUserTokens;
use App\Models\Employe;
use App\Models\manager;
use App\Models\User;
use Illuminate\Foundation\Auth\User as AuthUser;
use Illuminate\Support\Facades\Schedule;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');
Schedule::call(function () {
     $employes = Employe::all ();
     $managers = manager::all ();
     foreach ($employes as $employe){
        $employe->token = 1000;
        $employe->save();
     }
      foreach ($managers as $manager){
        $manager->token = 1000;
        $manager->save();
     }

})->everyFiveSeconds();

