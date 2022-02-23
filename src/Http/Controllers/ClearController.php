<?php

namespace DoubleThreeDigital\StaticCacheManager\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Statamic\Support\Str;

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
        $path = config('statamic.static_caching.strategies.full.path') . Str::ensureLeft($path, '/');

        if (File::isDirectory($path)) {
            $this->deleteDirectory($path);
        }

        $this->deleteFile($path);
    }

    protected function deleteFile($path)
    {
        if (! Str::of($path)->contains('*')) {
            $path .= '_*';
        }

        foreach (File::glob($path) as $file) {
            File::delete($file);
        }
    }

    protected function deleteDirectory($path)
    {
        return File::deleteDirectory($path);
    }
}
