<?php

return [
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
