<?php
/** @var DefaultPage $page */
?>
<?php snippet('header') ?>
<section class="py-20">
  <div class="container px-4 mx-auto">
    <div class="max-w-2xl mx-auto">
      <h1 class="mb-10 text-5xl font-bold font-heading text-purple-800"><?= $page->title() ?></h1>
      <div class="prose prose-lg text-gray-500 max-w-none">
        <?= $page->text()->toBlocks() ?>
      </div>
    </div>
  </div>
</section>
<?php snippet('footer') ?>
