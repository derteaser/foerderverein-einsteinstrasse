<?php
use Oblik\LinkField\Link;

/** @var PagerHeroPage $section */

$buttons = $section->buttons()->toStructure();
?>
<section class="relative pb-20 -mb-12 print:pb-0 bg-blue-300 overflow-hidden" id="<?= $section->slug() ?>">
  <div class="relative pt-12 md:pt-0">
    <div class="container px-4 mx-auto">
      <div class="flex flex-col-reverse md:flex-row items-center -mx-4">
        <div class="relative z-10 md:w-1/2 print:w-full px-4 lg:py-32 mt-6 md:mb-0">
          <div class="flex flex-wrap lg:flex-nowrap">
            <div>
              <h2 class="mb-8 text-4xl lg:text-6xl text-white font-bold font-heading print:text-2xl print:text-black print:text-center"><?= $section->headline() ?></h2>
              <?php foreach ($buttons as $button): ?>
                <?php /** @var Link $link */ $link = $button->link()->toLinkObject(); ?>
                <?php if ($button->primary()->toBool() === true): ?>
                  <a class="inline-block print:hidden w-full md:w-auto mb-2 md:mb-0 py-5 px-8 mr-6 text-center text-sm font-bold uppercase bg-yellow-500 hover:bg-yellow-400 transition duration-200" <?= $link->attr() ?>><?= $link->title() ?></a>
                <?php else: ?>
                  <a class="inline-block print:hidden w-full md:w-auto py-5 px-8 text-center text-sm text-white font-bold uppercase border border-white hover:bg-blue-800 hover:border-blue-800 transition duration-200" <?= $link->attr() ?>><?= $link->title() ?></a>
                <?php endif ?>
              <?php endforeach ?>
            </div>
          </div>
        </div>
        <div class="md:w-1/2 print-w-full px-4">
          <?php if ($image = $section->cover()->toFile()): ?>
            <img class="w-full" src="<?= $image->url() ?>" width="<?= $image->width() ?>" height="<?= $image->height() ?>" alt="<?= $image->alt() ?>">
          <?php endif ?>
        </div>
      </div>
    </div>
  </div>
  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" class="absolute bottom-0 print:hidden"><path fill="#223B85" fill-opacity="1" d="M0,224L40,218.7C80,213,160,203,240,202.7C320,203,400,213,480,224C560,235,640,245,720,240C800,235,880,213,960,208C1040,203,1120,213,1200,208C1280,203,1360,181,1400,170.7L1440,160L1440,320L1400,320C1360,320,1280,320,1200,320C1120,320,1040,320,960,320C880,320,800,320,720,320C640,320,560,320,480,320C400,320,320,320,240,320C160,320,80,320,40,320L0,320Z"></path></svg>
</section>