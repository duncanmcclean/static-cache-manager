<?php

namespace DuncanMcClean\StaticCacheManager\Tests;

use DuncanMcClean\StaticCacheManager\ServiceProvider;
use Statamic\Extend\AddonTestCase;

abstract class TestCase extends AddonTestCase
{
    protected $addonServiceProvider = ServiceProvider::class;
}
