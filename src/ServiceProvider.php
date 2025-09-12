<?php

namespace DuncanMcClean\StaticCacheManager;

use DuncanMcClean\StaticCacheManager\Http\Controllers\ClearController;
use Illuminate\Support\Facades\File;
use Statamic\Facades\Utility;
use Statamic\Providers\AddonServiceProvider;

class ServiceProvider extends AddonServiceProvider
{
    public function boot()
    {
        parent::boot();

        Utility::extend(function () {
            Utility::register('static-cache-manager')
                ->title(__('Static Cache Manager'))
                ->description(__('Clear specific paths in your static cache.'))
                ->view('static-cache-manager::index', function ($request) {
                    return ['icon' => File::get(__DIR__.'/../resources/svg/hammer.svg')];
                })
                ->icon(File::get(__DIR__.'/../resources/svg/hammer.svg'))
                ->routes(function ($router) {
                    $router->post('/clear', ClearController::class)->name('clear');
                });
        });
    }
}
