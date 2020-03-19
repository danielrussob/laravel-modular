<?php

namespace DNAFactory\Core\Provider;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Factory;
use Illuminate\Console\Scheduling\Schedule;

class RegisterCronServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->app->booted(function () {
            $schedule = $this->app->make(Schedule::class);
            $this->registerCron($schedule);
        });
    }

    protected function registerCron(Schedule $schedule)
    {

    }
}
