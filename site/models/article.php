<?php

use Kirby\Cms\Field;
use Kirby\Cms\Page;
use Kirby\Toolkit\Str;

/**
 * @method Field main_image()
 * @method Field date()
 * @method Field intro()
 * @method Field text()
 * @method Field tags()
 */
class ArticlePage extends Page {
    public function image(string $filename = null): ?\Kirby\Cms\File {
        if ($filename === null) {
            return $this->main_image()->toFile();
        }

        return parent::image($filename);
    }

    public function excerpt(): string {
        if ($this->intro()->isNotEmpty()) {
            return Str::excerpt($this->intro()->toString(), 100);
        }

        return $this->text()->toBlocks()->excerpt(100);
    }
}