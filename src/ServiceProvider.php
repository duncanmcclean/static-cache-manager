<?php

namespace DoubleThreeDigital\StaticCacheManager;

use DoubleThreeDigital\StaticCacheManager\Http\Controllers\ClearController;
use Statamic\Facades\Utility;
use Statamic\Providers\AddonServiceProvider;

class ServiceProvider extends AddonServiceProvider
{
    public function boot()
    {
        parent::boot();

        Utility::make('static-cache-manager')
            ->view('static-cache-manager::index')
            ->routes(function ($router) {
                $router->post('/clear', ClearController::class)->name('clear');
            })
            ->register();
    }
}
