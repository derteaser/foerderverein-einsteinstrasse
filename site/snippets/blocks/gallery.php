<?php
use Kirby\Cms\Block;
use Kirby\Cms\File;
use Kirby\Cms\Files;

/** @var Block $block */

/** @var Files $images */
$images = $block->images()->toFiles();
$count = $images->count();

if ($count == 1) {
  $cols = 'grid-cols-1';
} elseif ($count % 4 == 0) {
  $cols = 'grid-cols-2 md:grid-cols-4';
} elseif ($count % 3 == 0) {
  $cols = 'grid-cols-2 sm:grid-cols-3';
} elseif ($count % 2 == 0) {
  $cols = 'grid-cols-2';
} else {
  $cols = 'grid-cols-2 sm:grid-cols-3';
}
?>
<figure>
  <div class="grid <?= $cols ?> print:grid-cols-2 gap-2 image-gallery">
    <?php /** @var File $image */ foreach ($images as $image): ?>
      <a href="<?= $image->thumb()->url() ?>" class="aspect-square relative group">
        <img class="w-full h-full object-center object-cover m-0" src="<?= $image->thumb('gallery')->url() ?>" data-bp="<?= $image->thumb()->url() ?>" alt="">
        <div class="absolute flex inset-0 items-center justify-center">
          <div class="rounded-full bg-white/60 backdrop-blur-xs size-12 sm:size-16 flex items-center justify-center group-hover:scale-110 transition-all">
            <?php snippet('icons/zoom-in-line', ['class' => 'text-gray-700 size-8']) ?>
          </div>
        </div>
      </a>
    <?php endforeach ?>
  </div>
</figure>
