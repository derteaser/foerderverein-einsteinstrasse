<?php
use Kirby\Cms\Site;
use Kirby\Toolkit\Collection;

/**
 * @param Site $site
 * @return Collection
 */
return function (Site $site) {
    return $site->find('blog')->children()->listed()->flip();
};