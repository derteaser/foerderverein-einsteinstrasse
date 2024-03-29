<?php
/** @var ArticlePage $page */
?>
<?php snippet('layout', slots: true); ?>
<section class="py-24 print:py-12">
  <div class="container px-4 mx-auto">
    <div class="max-w-2xl mx-auto">
      <h1 class="mb-10 text-4xl font-bold font-heading text-purple-800"><?= $page->title() ?></h1>
      <?php if ($page->intro()->isNotEmpty()): ?>
        <p class="mb-10 text-xl text-gray-500 print:text-black"><?= $page->intro() ?></p>
      <?php endif; ?>
      <div class="blocks print:text-black max-w-none">
        <?= $page->text()->toBlocks() ?>
      </div>
    </div>
  </div>
</section>