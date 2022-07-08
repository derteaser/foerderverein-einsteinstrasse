<?php
/** @var HomePage $page */
?>

<?php layout() ?>
<main>
  <?php foreach ($page->children()->listed() as $section) : ?>
    <?php snippet($section->intendedTemplate(), compact('section')) ?>
  <?php endforeach ?>
</main>