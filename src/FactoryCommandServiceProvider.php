<?php

namespace Hyvor\LaravelFactoryCommand;

use Illuminate\Support\ServiceProvider;

class FactoryCommandServiceProvider extends ServiceProvider
{

    public function boot() : void
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                FactoryCommand::class,
            ]);
        }
    }

}