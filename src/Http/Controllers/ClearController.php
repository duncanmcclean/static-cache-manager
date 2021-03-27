<?php

namespace DoubleThreeDigital\StaticCacheManager\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ClearController
{
    public function __invoke(Request $request)
    {
        $paths = explode(PHP_EOL, $request->get('paths'));

        foreach ($paths as $path) {
            $this->delete(trim($path));
        }

        return redirect()->back();
    }

    protected function delete($path)
    {
        $staticCachePath = config('statamic.static_caching.strategies.full.path');

        if (File::isDirectory($staticCachePath.'/'.$path)) {
            return $this->deleteDir($staticCachePath.'/'.$path);
        }

        return $this->deleteFile($staticCachePath.'/'.$path);
    }

    protected function deleteFile($path)
    {
        if (Str::of($path)->contains('*')) {
            foreach (File::allFiles($path) as $file) {
                File::delete($file);
            }

            return;
        }

        File::delete($path);
    }

    protected function deleteDir($path)
    {
        return File::deleteDirectory($path);
    }
}
