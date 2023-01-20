<?php
/** @var HomePage $page */
?>

<?php snippet('layout', slots: true); ?>
<main>
  <?php foreach ($page->children()->listed() as $section): ?>
    <?php snippet($section->intendedTemplate(), compact('section')); ?>
  <?php endforeach; ?>
</main>