<?php

namespace DoubleThreeDigital\StaticCacheManager\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ClearController
{
    public function __invoke(Request $request)
    {
        collect(explode(PHP_EOL, $request->get('paths')))
            ->map(function ($path) {
                return str_replace('\r', '', $path);
            })
            ->each(function ($path) {
                $staticCachePath = config('statamic.static_caching.strategies.full.path');

                File::deleteDirectory("{$staticCachePath}/{$path}");
            });

        return redirect()->back();
    }
}
