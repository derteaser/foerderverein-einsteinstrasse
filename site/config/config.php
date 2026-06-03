<?php

require_once __DIR__ . '/../plugins/kirby3-dotenv/global.php';

loadenv([
    'dir' => realpath(__DIR__ . '/../../'),
]);

return [
    'debug' => filter_var(env('APP_DEBUG'), FILTER_VALIDATE_BOOLEAN),
    'url' => env('APP_URL'),
    'slugs' => 'de',
    'locale' => 'de_DE.utf-8',
    'date' => [
        'handler' => 'strftime',
    ],
    'auth' => require __DIR__ . '/auth.php',
    'panel' => require __DIR__ . '/panel.php',
    'email' => require __DIR__ . '/email.php',
    'thumbs' => require __DIR__ . '/thumbs.php',
    'routes' => require __DIR__ . '/routes.php',
    'paulmorel.fathom-analytics' => [
        'siteId' => env('FATHOM_SITE_ID'),
        'sharePassword' => env('FATHOM_SHARE_PASSWORD'),
    ],
    'lukaskleinschmidt.laravel-vite' => require __DIR__ . '/vite.php',
    'leitsch.blade' => require __DIR__ . '/blade.php',
    'tobimori.seo' => require __DIR__ . '/seo.php',
    'thathoff.sentry' => require __DIR__ . '/sentry.php',
    'thathoff.git-content' => require __DIR__ . '/git-content.php',
];
