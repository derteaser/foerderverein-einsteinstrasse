<?php

namespace Tests;

use Derteaser\KirbyTesting\TestCase as BaseTestCase;
use Kirby\Cms\App;

abstract class TestCase extends BaseTestCase {
    public function createApplication(array $props = []): App {
        $props['options'] = ($props['options'] ?? []) + ['url' => '/'];

        return parent::createApplication($props);
    }

    protected function roots(string $cacheSuffix): array {
        $base = dirname(__DIR__);
        $storage = $base . '/storage';

        return [
            'index' => $base . '/public',
            'base' => $base,
            'content' => $base . '/content',
            'site' => $base . '/site',
            'storage' => $storage,
            'accounts' => $storage . '/accounts',
            'cache' => $storage . '/cache' . $cacheSuffix,
            'sessions' => $storage . '/sessions',
        ];
    }
}
