<?php
use Oblik\LinkField\Link;

/** @var PagerCtaPage $section */

/** @var Link $link */
$link = $section->link()->toLinkObject();
?>
<section class="relative py-20 print:py-0 overflow-hidden bg-blue-100" id="<?= $section->slug() ?>">
  <?php if ($image = $section->background()->toFile()): ?>
    <?php $resizedImage = $image->thumb() ?>
    <img class="absolute top-0 left-0 w-full h-full object-cover print:hidden"
         src="<?= $resizedImage->url() ?>"
         width="<?= $resizedImage->width() ?>" height="<?= $resizedImage->height() ?>" alt="<?= $resizedImage->alt() ?>">
  <?php endif ?>
  <div class="relative container px-4 mx-auto z-10">
    <div class="max-w-xl print:max-w-none mx-auto lg:mx-0 py-12 pl-16 pr-32 bg-white clip-path-right-top">
      <h3 class="mb-4 text-2xl font-semibold text-blue-800"><?= $section->headline() ?></h3>
      <p class="mb-7 text-gray-500 text-base leading-relaxed"><?= $section->intro() ?></p>
      <a class="flex items-center text-blue-800 text-sm font-bold uppercase hover:underline print:hidden" <?= $link->attr() ?>>
        <span><?= $link->title() ?></span>
        <span class="ml-2">
          <?php snippet('icon', ['name' => 'chevron-right', 'cssClasses' => 'mx-auto text-blue-800 fill-current w-4 h-4']) ?>
        </span>
      </a>
    </div>
  </div>
</section>
