<?php

use Kirby\Cms\Field;
use Kirby\Cms\Page;

/**
 * @method Field function()
 * @method Field email()
 * @method Field main_image()
 */
class PersonPage extends Page {
    /**
     * @return array<string, bool>
     */
    public function metaDefaults(?string $lang = null): array {
        return [
            'robotsIndex' => false,
            'robotsFollow' => false,
        ];
    }
}