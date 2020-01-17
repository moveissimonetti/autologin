<?php

namespace Roomies\Autologin;

use Illuminate\Support\ServiceProvider;

class AutologinServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/routes.php');
    }
}
