<?php

namespace DuncanMcClean\StaticCacheManager;

use DuncanMcClean\StaticCacheManager\Http\Controllers\ClearController;
use Statamic\Facades\Utility;
use Statamic\Providers\AddonServiceProvider;

class ServiceProvider extends AddonServiceProvider
{
    public function boot()
    {
        parent::boot();

        Utility::make('static-cache-manager')
            ->title(__('Static Cache Manager'))
            ->description(__('Clear specific paths in your static cache.'))
            ->view('static-cache-manager::index')
            ->icon('hammer-wrench')
            ->routes(function ($router) {
                $router->post('/clear', ClearController::class)->name('clear');
            })
            ->register();
    }
}
