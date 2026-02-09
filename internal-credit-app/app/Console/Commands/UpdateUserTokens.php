<?php

namespace App\Console\Commands;

use App\Models\Employe;
use App\Models\manager;
use Illuminate\Console\Command;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Container\Attributes\DB;

use function Laravel\Prompts\table;

class UpdateUserTokens extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:update-user-tokens';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
      //
    var_dump ("zzz");
  }
}