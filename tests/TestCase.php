<?php

namespace DuncanMcClean\StaticCacheManager\Tests;

use DuncanMcClean\StaticCacheManager\ServiceProvider;
use Statamic\Testing\AddonTestCase;

abstract class TestCase extends AddonTestCase
{
    protected string $addonServiceProvider = ServiceProvider::class;
}
