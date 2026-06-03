<?php

use Kirby\Cms\Page;

return [
    'canonicalBase' => env('APP_URL'),
    'locale' => 'de_DE',
    'generateSchema' => false,
    'ai.enabled' => false,
    'default' => [
        'robotsIndex' => fn (Page $page) => true,
        'robotsFollow' => fn (Page $page) => true,
        'robotsArchive' => fn (Page $page) => true,
        'robotsImageindex' => fn (Page $page) => true,
        'robotsSnippet' => fn (Page $page) => true,
    ],
    'robots' => [
        'content' => [
            '*' => ['Allow' => ['/'], 'Disallow' => ['/panel']],
        ],
    ],
    'sitemap' => [
        'excludeTemplates' => [
            'error',
            'persons',
            'person',
            'pager-hero',
            'pager-cta',
            'pager-blog',
            'pager-features',
            'pager-steps',
            'pager-team',
        ],
    ],
];
