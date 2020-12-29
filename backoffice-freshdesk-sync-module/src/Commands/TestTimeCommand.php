<?php

namespace MiWaHR\SchedulerTest\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class TestTimeCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'miwahr:test-time';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'test-time';

    /**
     * Create a new command instance.
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
        Storage::disk('local')->append('test-time', Carbon::now()->toDateString()."\n");
    }
}
