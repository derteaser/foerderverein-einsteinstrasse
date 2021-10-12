<?php

use Kirby\Cms\App;
use Kirby\Cms\Page;
use Kirby\Cms\Pages;
use Kirby\Cms\Site;
use Kirby\Toolkit\A;

return function (Page $page, Pages $pages, Site $site, App $kirby) {
    $shared = $kirby->controller('site' , compact('page', 'pages', 'site', 'kirby'));


    return $shared;
    //return A::merge($shared , compact('latestEvent'));
};