<?php

use Kirby\Cms\Page;

class HomePage extends Page {
    /**
     * @return array<string, string>
     */
    public function metaDefaults(?string $lang = null): array {
        return [
            'metaTemplate' => '{{ site.title }}',
        ];
    }
}
