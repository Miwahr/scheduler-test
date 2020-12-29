<?php

namespace MiWaHR\SchedulerTest;

use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Support\ServiceProvider;
use MiWaHR\SchedulerTest\Commands\TestTimeCommand;
use MiWaHR\SchedulerTest\Console\SchedulerTestKernel;

class SchedulerTestServiceProvider extends ServiceProvider
{
    public function boot()
    {
    }

    public function register()
    {
        $this->commands([
            TestTimeCommand::class,
        ]);
        $this->app->singleton('MiWaHR\SchedulerTest\SchedulerTestKernel', function($app) {
            $dispatcher = $app->make(Dispatcher::class);
            return new SchedulerTestKernel($app, $dispatcher);
        });
        $this->app->make('MiWaHR\SchedulerTest\SchedulerTestKernel');
    }
}
