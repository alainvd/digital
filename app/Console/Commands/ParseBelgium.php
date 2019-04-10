<?php

namespace App\Console\Commands;

use App\Rip;
use Illuminate\Console\Command;
use Feeds;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;

class ParseBelgium extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'parse:belgium';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $feed = Feeds::make('http://digitalbelgium.be/en/feed/');

        foreach ($feed->get_items() as $item) {

            Log::info($item->get_title());
            Log::info($item->get_link());
            Log::info($item->get_description());

        }


    }
}
