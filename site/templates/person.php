<?php
use Kirby\Cms\File;
use Kirby\Cms\Page;

/** @var Page $page */
/** @var File $mainImage */
?>

<?php snippet('header') ?>
<section class="flex mx-auto justify-center p-6 lg:p-24 xl:p-32 overflow-hidden">
  <?php snippet('person', ['person' => $page]) ?>
</section>
<?php snippet('footer') ?>