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
?>
<?php if ($src): ?>
  <figure>
    <?php if ($link->isNotEmpty()): ?>
      <a href="<?= $link->toUrl() ?>">
    <?php endif ?>
    <img src="<?= $src ?>" alt="<?= $alt ?>">
    <?php if ($link->isNotEmpty()): ?>
      </a>
    <?php endif ?>
    <?php if ($caption->isNotEmpty()): ?>
      <figcaption><?= $caption ?></figcaption>
    <?php endif ?>
  </figure>
<?php endif ?>