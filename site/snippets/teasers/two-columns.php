<?php
/** @var ArticlePage $article */
?>
<div class="w-full lg:w-2/3 px-4 mb-20">
  <a class="hover:underline" href="<?= $article->url() ?>">
    <div class="relative flex h-96 mb-8 overflow-hidden bg-blue-100">
      <?php if ($image = $article->image()): ?>
        <?php $resizedImage = $image->thumb() ?>
        <img class="w-full h-full object-cover" src="<?= $resizedImage->url() ?>" width="<?= $resizedImage->width() ?>" height="<?= $resizedImage->height() ?>" alt="<?= $resizedImage->alt() ?>">
      <?php endif ?>
      <span class="absolute bottom-0 right-0 pl-10 pr-8 py-3 -mr-1 text-xs font-semibold text-gray-500 bg-blue-50 clip-path-left-small uppercase"><?= $article->date()->toDate('%e. %B %Y') ?></span>
    </div>
    <h2 class="mb-4 text-2xl font-semibold font-heading text-blue-800"><?= $article->title() ?></h2>
    <p class="mb-3 text-base text-gray-500 leading-loose"><?= $article->excerpt() ?></p>
    <p class="flex items-center text-sm uppercase font-bold text-blue-800">
      <span>Weiterlesen</span>
      <span class="ml-2">
        <?php snippet('icon', ['name' => 'chevron-right', 'cssClasses' => 'mx-auto text-blue-800 fill-current w-4 h-4']) ?>
      </span>
    </p>
  </a>
</div>
