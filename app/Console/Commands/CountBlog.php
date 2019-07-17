<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CountBlog extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'count:blog';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'count blog everyday';

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
        //

    }
}
