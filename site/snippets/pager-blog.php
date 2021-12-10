<?php
/** @var PagerBlogPage $section */
$articles = collection('latest-blog-articles')->limit($section->max_articles()->toInt());
?>
<section class="relative py-20 print:hidden" id="<?= $section->slug() ?>">
  <div class="container px-4 mx-auto">
    <div class="flex flex-wrap -mx-4 -mb-20">
      <?php snippet('teasers/two-columns', ['article' => $articles->first()]); ?>
      <?php foreach ($articles->offset(1) as $article): ?>
        <?php snippet('teasers/one-column', compact('article')); ?>
      <?php endforeach ?>
    </div>
  </div>
</section>
