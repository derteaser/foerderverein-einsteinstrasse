<?php
/** @var Block $block */

use Kirby\Cms\Block;

$alt     = $block->alt();
$caption = $block->caption();
$crop    = $block->crop()->isTrue();
$link    = $block->link();
$ratio   = $block->ratio()->or('auto');
$src     = null;

if ($block->location() == 'web') {
  $src = $block->src();
} elseif ($image = $block->image()->toFile()) {
  $alt = $alt ?? $image->alt();
  $src = $image->url();
}

switch ($ratio) {
  case '1/1':
    $aspectWidth = 'aspect-w-1';
    $aspectHeight = 'aspect-h-1';
    break;
  case '16/9':
    $aspectWidth = 'aspect-w-16';
    $aspectHeight = 'aspect-h-9';
    break;
  case '10/8':
    $aspectWidth = 'aspect-w-10';
    $aspectHeight = 'aspect-h-8';
    break;
  case '21/9':
    $aspectWidth = 'aspect-w-21';
    $aspectHeight = 'aspect-h-9';
    break;
  case '7/5':
    $aspectWidth = 'aspect-w-7';
    $aspectHeight = 'aspect-h-5';
    break;
  case '4/3':
    $aspectWidth = 'aspect-w-4';
    $aspectHeight = 'aspect-h-3';
    break;
  case '5/3':
    $aspectWidth = 'aspect-w-5';
    $aspectHeight = 'aspect-h-3';
    break;
  case '3/2':
    $aspectWidth = 'aspect-w-3';
    $aspectHeight = 'aspect-h-2';
    break;
  case '3/1':
    $aspectWidth = 'aspect-w-3';
    $aspectHeight = 'aspect-h-1';
    break;
  default:
    $aspectWidth = '';
    $aspectHeight = '';
    break;
}
?>
<?php if ($src): ?>
  <figure class="relative lg:-mx-20 xl:-mx-40 overflow-hidden">
    <div class="<?= $aspectWidth ?> <?= $aspectHeight ?>">
      <?php if ($link->isNotEmpty()): ?>
        <a href="<?= $link->toUrl() ?>">
      <?php endif ?>
      <img class="w-full h-full object-center <?php if ($crop): ?>object-cover<?php else: ?>object-contain<?php endif ?>" src="<?= $src ?>" alt="<?= $alt ?>">
      <?php if ($link->isNotEmpty()): ?>
        </a>
      <?php endif ?>
    </div>
    <?php if ($caption->isNotEmpty()): ?>
      <figcaption class="absolute bottom-0 right-0 pl-10 pr-8 py-3 text-gray-500 bg-blue-50 clip-path-left-small"><?= $caption ?></figcaption>
    <?php endif ?>
  </figure>
<?php endif ?>