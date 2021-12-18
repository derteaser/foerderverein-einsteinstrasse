<?php
/** @var BlogPage $page */
$articles = collection('latest-blog-articles');
?>
<?php snippet('header') ?>
<section class="py-20">
  <div class="container px-4 mx-auto">
    <div class="max-w-2xl mx-auto">
      <h1 class="mb-10 text-5xl font-bold font-heading text-purple-800"><?= $page->title() ?></h1>
      <div class="blocks">
        <?= $page->text()->toBlocks() ?>
      </div>
    </div>
    <div class="flex flex-wrap -mx-4 -mb-20">
      <?php foreach ($articles as $article): ?>
        <?php snippet('teasers/one-column', compact('article')); ?>
      <?php endforeach ?>
    </div>
  </div>
</section>
<?php snippet('footer') ?>
