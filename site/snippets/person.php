<?php
use Kirby\Toolkit\Html;

/** @var PersonPage $person */
?>
<div class="w-full xl:w-1/2 px-8 mb-8 md:mb-20 mx-auto">
  <div class="relative p-6 lg:p-12 bg-purple-900">
    <div class="flex flex-wrap items-center -mx-4">
      <div class="w-full md:w-2/3 px-4 mb-8 md:mb-0">
        <h3 class="mb-2 text-3xl font-semibold font-heading text-white"><?= $person->title() ?></h3>
        <p class="mb-2 text-sm uppercase text-yellow-300"><?= $person->function() ?></p>
        <?php if ($person->email()->isNotEmpty()): ?>
          <?= Html::email($person->email(), null, ['class' => 'text-blue-400 hover:underline']) ?>
        <?php endif ?>
      </div>
      <div class="w-full md:w-1/3 px-4">
        <div class="md:absolute top-0 right-0 -mt-4 -mr-4">
          <?php if ($image = $person->main_image()->toFile()): ?>
            <?php $resizedImage = $image->thumb('person') ?>
            <img class="w-64 h-64 md:w-48 md:h-48 lg:w-64 lg:h-64 rounded-full object-cover mx-auto" src="<?= $resizedImage->url() ?>" width="<?= $resizedImage->width() ?>" height="<?= $resizedImage->height() ?>" alt="Foto von <?= $person->title() ?>">
          <?php endif ?>
        </div>
      </div>
    </div>
  </div>
</div>