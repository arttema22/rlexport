<?php

namespace App\Console\Commands;

use App\MonopolyService;
use Illuminate\Console\Command;

class MonopolyTransaction extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'monopoly:transaction';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command to start get data from service Monopoly';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        (new MonopolyService)->callTransaction();
    }
}
