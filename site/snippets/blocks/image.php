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

$aspectRatio = match ($ratio) {
  '1/1' => 'aspect-square',
  '16/9' => 'aspect-video',
  '10/8' => 'aspect-10/8',
  '21/9' => 'aspect-21/9',
  '7/5' => 'aspect-7/5',
  '4/3' => 'aspect-4/3',
  '5/3' => 'aspect-5/3',
  '3/2' => 'aspect-3/2',
  '3/1' => 'aspect-3/1',
  default => '',
};
?>
<?php if ($src): ?>
  <figure class="relative lg:-mx-20 xl:-mx-40 overflow-hidden">
    <div class="<?= $aspectRatio ?>">
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