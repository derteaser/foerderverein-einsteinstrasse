<?php
/** @var HomePage $page */
?>

<?php snippet('header') ?>
<main>
  <?php foreach ($page->children()->listed() as $section) : ?>
    <?php snippet($section->intendedTemplate(), compact('section')) ?>
  <?php endforeach ?>
</main>
<?php snippet('footer') ?>