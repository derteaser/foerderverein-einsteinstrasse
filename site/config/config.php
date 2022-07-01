<?php

use Kirby\Cms\File;
use Kirby\Cms\Html;
use Kirby\Cms\Page;
use Kirby\Toolkit\Str;

require_once __DIR__ . '/../plugins/kirby3-dotenv/global.php';

loadenv([
    'dir' => realpath(__DIR__ . '/../../')
]);

return [
    'debug' => filter_var(env('APP_DEBUG'), FILTER_VALIDATE_BOOLEAN),
    'auth' => [
        'methods' => explode(',', env('AUTH_METHODS'))
    ],
    'slugs' => 'de',
    'locale' => 'de_DE.utf-8',
    'date'  => [
        'handler' => 'strftime'
    ],
    'panel' => [
        'language' => 'de',
        'css' => 'custom-panel/styles.css'
    ],
    'email' => [
        'transport' => [
            'type' => 'smtp',
            'host' => env('EMAIL_HOST'),
            'port' => 465,
            'security' => true,
            'auth' => true,
            'username' => env('EMAIL_USERNAME'),
            'password' => env('EMAIL_PASSWORD'),
        ]
    ],
    'thumbs' => [
        'presets' => [
            'default' => ['width' => 1036, 'quality' => 80],
            'one-column-teaser' => ['width' => 740, 'quality' => 80],
            'feature' => ['width' => 610, 'height' => 260, 'crop' => true, 'quality' => 80],
            'gallery' => ['width' => 610, 'height' => 610, 'crop' => true, 'quality' => 80],
            'person' => ['width' => 500, 'height' => 500, 'crop' => true]
        ]
    ],
    'routes' => [
        [
            'pattern' => 'sitemap.xml',
            'method' => 'GET',
            'action'  => function () {
                $options = [
                    'images'       => false,
                    'videos'       => false,
                    'xsl'          => false
                ];

                return site()->index()->published()->filter(function (Page $page) {
                    return match ($page->template()->name()) {
                        'persons', 'person' => false,
                        default => !$page->parent() || $page->parent()->template() != 'home',
                    };
                })->sitemap($options);
            }
        ]
    ],
    'bnomei.robots-txt.sitemap' => 'sitemap.xml',
    'pedroborges.meta-tags.default' => function ($page, $site) {
        $image = $page->main_image()->toFile();
        if (!$image) {
            $image = $site->main_image()->toFile();
        }

        $description = null;
        if ($text = $page->text() && $blocks = $page->text()->toBlocks()) {
            if ($block = $blocks->filterBy('type', 'paragraph')->first()) {
                $description = Html::decode(Str::excerpt($block->content(), 155));
            }
        }

        return [
            'title' => $page->title() . " | " . $site->title(),
            'meta' => [
                'description' => $description,
                'robots' => 'index,follow,noodp'
            ],
            'link' => [
                'canonical' => $page->url(),
            ],
            'og' => [
                'title' => $page->title(),
                'type' => 'website',
                'site_name' => $site->title(),
                'url' => $page->url(),
                'description' => $description,
                'locale' => 'de_DE',
                'namespace:image' => function() use ($image) {
                    $thumb = $image->crop(1200, 630);
                    return [
                        'image' => $thumb->url(),
                        'height' => $thumb->height(),
                        'width' => $thumb->width(),
                        'type' => $thumb->mime()
                    ];
                }
            ],
            'twitter' => [
                'card' => 'summary_large_image',
                'site' => $site->twitter(),
                'title' => $page->title(),
                'image' => $image->url()
            ]
        ];
    },
    'pedroborges.meta-tags.templates' => function ($page, $site) {
        $image = $page->main_image()->toFile();
        if (!$image) {
            $image = $site->main_image()->toFile();
        }

        return [
            'home' => [
                'title' => $site->title(),
                'meta' => [
                    'description' => $site->description()->value,
                ],
                'og' => [
                    'title' => $site->title(),
                    'description' => $site->description()->value,
                ],
                'json-ld' => [
                    'WebSite' => [
                        'name' => $site->title()->value(),
                        'url' => $site->url(),
                        'inLanguage' => 'de_DE',
                        'image' => $image->url(),
                        'sameAs' => ['https://www.facebook.com/' . $site->facebook()->value(), 'https://instagram.com' . $site->instagram()->value()],
                    ]
                ]
            ],
            'article' => [
                'meta' => [
                    'description' => function (ArticlePage $page) {
                        return $page->excerpt();
                    },
                    'keywords' => function (ArticlePage $page) {
                        if ($page->tags()) {
                            return $page->tags();
                        }
                        return null;
                    },
                ],
                'json-ld' => [
                    'NewsArticle' => [
                        'name' => $page->title()->value(),
                        'headline' => $page->title()->value(),
                        'description' => $page->excerpt(),
                        'url' => $page->url(),
                        'inLanguage' => 'de_DE',
                        'image' => $image->url(),
                    ]
                ],
                'og' => [
                    'type' => 'article',
                    'namespace:article' => [
                        'published_time' => $page->date('c')
                    ]
                ],
                'twitter' => [
                    'card' => 'summary',
                    'title' => $page->title(),
                    'namespace:image' => function (Page $page) {
                        if (/** @var File $image */ $image = $page->cover()->toFile()) {
                            $crop = $image->resize(1280, 1280);
                            return [
                                'image' => $crop->url(),
                                'alt' => $image->alt()
                            ];
                        }
                        return null;
                    }
                ]
            ],
            'contact' => [
                'json-ld' => [
                    'ContactPage' => [
                        'name' => $page->title()->value(),
                        'url' => $page->url(),
                        'inLanguage' => 'de_DE',
                        'image' => $image->url(),
                    ]
                ]
            ],
            'person' => [
                'meta' => [
                    'robots' => 'noindex,nofollow,noodp'
                ]
            ]
        ];
    },
    'arnoson.kirby-vite.devServer' => env('VITE_DEV_SERVER'),
    'paulmorel.fathom-analytics' => [
        'siteId' => env('FATHOM_SITE_ID'),
        'sharePassword' => env('FATHOM_SHARE_PASSWORD'),
        'customDomain' => env('FATHOM_CUSTOM_DOMAIN')
    ]
];
