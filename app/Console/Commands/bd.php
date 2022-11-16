<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class bd extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bd:task';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Decrementa -1 al contador del usuario';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        DB::table('users')->decrement('contador');
        return Command::SUCCESS;
    }
}
