<?php

namespace Xibel\YoulessTile;

use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;
use Xibel\YoulessTile\Commands\FetchDataFromYoulessCommand;

class YoulessTileServiceProvider extends ServiceProvider
{

    public function boot()
    {

        Livewire::component('youless-tile', YoulessTileComponent::class);

        if ($this->app->runningInConsole()) {
            $this->commands([
                FetchDataFromYoulessCommand::class,
            ]);
        }

        $this->publishes([
            __DIR__ . '/../resources/views' => resource_path('views/vendor/dashboard-youless-tile'),
        ], 'dashboard-youless-tile-views');

        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'dashboard-youless-tile');

        $this->loadRoutesFrom(__DIR__.'/routes.php');
    }

}
