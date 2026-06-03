<?php

use Kirby\Cms\Page;

return [
    [
        'pattern' => 'sitemap.xml',
        'method' => 'GET',
        'action' => function () {
            $options = [
                'images' => false,
                'videos' => false,
                'xsl' => false,
            ];

            return site()
                ->index()
                ->published()
                ->filter(function (Page $page) {
                    return match ($page->template()->name()) {
                        'persons', 'person' => false,
                        default => !$page->parent() || $page->parent()->template() != 'home',
                    };
                })
                ->sitemap($options);
        },
    ],
    [
        'pattern' => 'feed',
        'method' => 'GET',
        'action' => function () {
            $options = [
                'title' => site()->title(),
                'link' => 'blog',
            ];

            return collection('latest-blog-articles')
                ->limit(10)
                ->feed($options);
        },
    ],
];
