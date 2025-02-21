<?php

namespace DuncanMcClean\StaticCacheManager\Tests;

use Illuminate\Support\Facades\File;
use PHPUnit\Framework\Attributes\Test;
use Statamic\Facades\Config;
use Statamic\Facades\Site;
use Statamic\Facades\User;

class StaticCacheManagerTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        File::copyDirectory(__DIR__.'/__fixtures__/public/static', base_path('public/static'));
        File::copyDirectory(__DIR__.'/__fixtures__/public/static-multisite', base_path('public/static-multisite'));
    }

    protected function tearDown(): void
    {
        File::deleteDirectory(base_path('public/static'));
        File::deleteDirectory(base_path('public/static-multisite'));

        parent::tearDown();
    }

    #[Test]
    public function it_clears_a_statically_cached_page()
    {
        $this->assertFileExists(base_path('public/static/_.html'));
        $this->assertFileExists(base_path('public/static/about_.html'));
        $this->assertFileExists(base_path('public/static/contact_.html'));

        $this
            ->actingAs(User::make()->makeSuper()->save())
            ->post(cp_route('utilities.static-cache-manager.clear'), [
                'paths' => '/about',
            ]);

        $this->assertFileExists(base_path('public/static/_.html'));
        $this->assertFileExists(base_path('public/static/contact_.html'));
        $this->assertFileDoesNotExist(base_path('public/static/about_.html'));
    }

    #[Test]
    public function it_clears_statically_cached_pages_with_a_wildcard()
    {
        $this->assertFileExists(base_path('public/static/contact_.html'));
        $this->assertFileExists(base_path('public/static/contact/corporate-office_.html'));
        $this->assertFileExists(base_path('public/static/contact/scranton-office_.html'));

        $this
            ->actingAs(User::make()->makeSuper()->save())
            ->post(cp_route('utilities.static-cache-manager.clear'), [
                'paths' => '/contact/*',
            ]);

        $this->assertFileExists(base_path('public/static/contact_.html'));
        $this->assertFileDoesNotExist(base_path('public/static/contact/corporate-office_.html'));
        $this->assertFileDoesNotExist(base_path('public/static/contact/scranton-office_.html'));
    }

    #[Test]
    public function it_clears_multiple_statically_cached_pages()
    {
        $this->assertFileExists(base_path('public/static/_.html'));
        $this->assertFileExists(base_path('public/static/about_.html'));
        $this->assertFileExists(base_path('public/static/contact_.html'));

        $this
            ->actingAs(User::make()->makeSuper()->save())
            ->post(cp_route('utilities.static-cache-manager.clear'), [
                'paths' => '/about'.PHP_EOL.'/contact',
            ]);

        $this->assertFileExists(base_path('public/static/_.html'));
        $this->assertFileDoesNotExist(base_path('public/static/contact_.html'));
        $this->assertFileDoesNotExist(base_path('public/static/about_.html'));
    }

    #[Test]
    public function it_clears_a_statically_cached_page_in_a_multisite()
    {
        Site::setSites([
            [
                'name' => 'en',
                'locale' => 'en_US',
                'url' => 'http://localhost',
            ],
            [
                'name' => 'fr',
                'locale' => 'fr_FR',
                'url' => 'http://localhost/fr',
            ],
            [
                'name' => 'de',
                'locale' => 'DE_de',
                'url' => 'http://localhost/de',
            ],
        ]);

        Config::set('statamic.static_caching.strategies.full.path', [
            'en' => base_path('public/static-multisite/en'),
            'fr' => base_path('public/static-multisite/fr'),
            'de' => base_path('public/static-multisite/de'),
        ]);

        $this->assertFileExists(base_path('public/static-multisite/en/contact_.html'));
        $this->assertFileExists(base_path('public/static-multisite/de/kontact_.html'));
        $this->assertFileExists(base_path('public/static-multisite/fr/contact_.html'));

        $this
            ->actingAs(User::make()->makeSuper()->save())
            ->post(cp_route('utilities.static-cache-manager.clear'), [
                'paths' => '/contact',
            ]);

        $this->assertFileDoesNotExist(base_path('public/static-multisite/en/contact_.html'));
        $this->assertFileExists(base_path('public/static-multisite/de/kontact_.html'));
        $this->assertFileDoesNotExist(base_path('public/static-multisite/fr/contact_.html'));
    }
}
