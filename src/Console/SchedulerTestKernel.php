<?php

namespace MiWaHR\SchedulerTest\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel;
use MiWaHR\SchedulerTest\Commands\TestTimeCommand;

class SchedulerTestKernel extends Kernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        TestTimeCommand::class,
    ];

    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule)
    {
        parent::schedule($schedule);
        $schedule->command('miwahr:test-time')
            ->everyMinute()
            ->runInBackground()
            ->withoutOverlapping()
            ->onOneServer();
    }
}
