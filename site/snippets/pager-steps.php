<?php
/** @var PagerStepsPage $section */

$steps = $section->steps()->toStructure();
?>
<section class="py-24 print:py-12 overflow-hidden bg-blue-900 print:bg-white" id="<?= $section->slug() ?>">
  <div class="container px-4 mx-auto">
    <div class="flex flex-wrap items-center -mx-4">
      <div class="w-full lg:w-2/5 px-4 mb-20 lg:mb-0">
        <div class="max-w-md">
          <?php if ($section->kicker()->isNotEmpty()): ?>
            <span class="text-blue-400 uppercase font-semibold tracking-widest"><?= $section->kicker() ?></span>
          <?php endif ?>
          <h2 class="mt-4 mb-6 text-4xl font-bold font-heading text-white print:text-blue-900"><?= $section->headline() ?></h2>
          <p class="mb-8 text-xl text-white print:text-black">
            <?= $section->intro() ?>
          </p>
        </div>
      </div>
      <div class="w-full lg:w-3/5 px-4">
        <div class="lg:ml-16 flex flex-wrap -mx-5 -mb-8">
          <?php foreach ($steps as $index => $step): ?>
            <div class="w-full lg:w-1/2 px-5 mb-8 print:flex print:items-center">
              <span class="flex justify-center items-center mb-4 w-20 h-12 clip-path-both bg-blue-300 text-2xl text-blue-800 font-bold"><?= $index + 1 ?></span>
              <p class="text-base text-white print:text-black"><?= $step->description() ?></p>
            </div>
          <?php endforeach ?>
        </div>
      </div>
    </div>
  </div>
</section>
