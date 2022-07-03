<?php
use Kirby\Cms\Block;
use Kirby\Cms\File;
use Kirby\Cms\Files;

/** @var Block $block */

/** @var Files $images */
$images = $block->images()->toFiles();
?>
<figure style="display: grid; gap: 10px;">
  <?php /** @var File $image */ foreach ($images as $image): ?>
    <img src="<?= $image->thumb('gallery')->url() ?>" alt="">
  <?php endforeach ?>
</figure>