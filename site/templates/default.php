<?php
/** @var DefaultPage $page */
?>
<?php layout() ?>
<section class="py-20">
  <div class="container px-4 mx-auto">
    <div class="max-w-2xl mx-auto">
      <h1 class="mb-10 text-5xl font-bold font-heading text-purple-800"><?= $page->title() ?></h1>
      <div class="blocks">
        <?= $page->text() ?>
      </div>
    </div>
  </div>
</section>
