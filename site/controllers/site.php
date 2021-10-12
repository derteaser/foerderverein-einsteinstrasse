<?php

return function ($page, $pages, $site, $kirby) {
    $mainImage = $page->main_image()->toFile();

    return compact('mainImage');
};