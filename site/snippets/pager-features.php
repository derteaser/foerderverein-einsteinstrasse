<?php
/** @var PagerFeaturesPage $section */

$features = $section->features()->toStructure();
?>
<section class="relative bg-blue-50 py-24 overflow-hidden" id="<?= $section->slug() ?>">
  <div class="absolute inset-0">
    <svg class="mt-20" width="705" height="798" viewBox="0 0 705 798" fill="none" xmlns="http://www.w3.org/2000/svg">
      <g opacity="0.15">
        <path d="M704.81 796.481L605.701 697.372C636.839 655.792 655.256 604.148 655.256 548.328C655.256 442.384 588.803 351.629 495.58 315.365L704.81 1.51892C705 1.13919 705 0.759458 704.81 0.569593C704.81 0.189864 704.43 0 704.051 0H-92.0507C-92.4304 0 -92.8101 0.189864 -92.8101 0.569593C-92.8101 0.949322 -93 1.13919 -92.8101 1.51892L85.8522 269.607L-92.8101 448.08C-93 448.27 -93 448.46 -93 448.839C-93 449.219 -93 449.409 -92.8101 449.599C-92.6203 449.789 -92.4304 449.789 -92.0507 449.789C-91.6709 449.789 -91.4811 449.789 -91.2912 449.599L86.9914 271.316L188.949 424.347C167.874 460.801 155.722 503.141 155.722 548.328C155.722 685.98 267.742 798 405.584 798C486.656 798 558.994 759.078 604.562 698.891L703.291 797.62C703.481 797.81 703.671 797.81 704.051 797.81C704.43 797.81 704.62 797.81 704.81 797.62C705 797.43 705 797.241 705 796.861C705 796.481 705 796.671 704.81 796.481ZM88.3205 269.797L157.431 200.687C157.621 200.497 157.621 200.307 157.621 199.927C157.621 199.547 157.621 199.358 157.431 199.168C157.051 198.788 156.482 198.788 156.102 199.168L87.1813 268.089L-90.3419 1.89864H702.342L493.871 314.605C466.341 304.163 436.722 298.467 405.774 298.467C313.879 298.467 233.567 348.211 190.088 422.258L88.3205 269.797ZM492.732 316.314L305.905 596.364L191.037 424.157C233.946 350.3 314.069 300.555 405.394 300.555C436.152 300.365 465.581 306.061 492.732 316.314ZM405.584 796.101C268.882 796.101 157.621 684.841 157.621 548.328C157.621 503.9 169.393 462.13 190.088 425.866L305.146 598.453C305.335 598.642 305.525 598.832 305.905 598.832C306.285 598.832 306.475 598.642 306.665 598.453L494.44 317.074C587.284 352.958 653.357 443.143 653.357 548.518C653.357 603.769 635.13 655.032 604.372 696.233L505.642 597.503C505.263 597.124 504.693 597.124 504.313 597.503C504.123 597.693 504.123 597.883 504.123 598.263C504.123 598.642 504.123 598.832 504.313 599.022L603.233 697.941C558.045 757.369 486.276 796.101 405.584 796.101Z" fill="#A0CDFA"></path>
        <path d="M82.055 572.251H-92.0507C-92.6203 572.251 -93 572.631 -93 573.201V747.306C-93 747.876 -92.6203 748.255 -92.0507 748.255H82.055C82.6246 748.255 83.0043 747.876 83.0043 747.306V573.201C83.0043 572.631 82.6246 572.251 82.055 572.251ZM81.1057 746.357H-91.1014V574.15H81.1057V746.357Z" fill="#A0CDFA"></path>
        <path d="M367.612 225.749C367.801 225.939 367.991 225.939 368.181 225.939C368.371 225.939 368.561 225.939 368.751 225.749L480.771 151.132C480.961 150.942 481.15 150.752 481.15 150.373C481.15 149.993 480.961 149.803 480.771 149.613L368.751 74.9964C368.371 74.8065 367.991 74.8065 367.612 74.9964L255.592 149.613C255.402 149.803 255.212 149.993 255.212 150.373C255.212 150.752 255.402 150.942 255.592 151.132L367.612 225.749ZM368.181 76.7052L478.492 150.183L368.181 223.66L257.87 150.183L368.181 76.7052Z" fill="#A0CDFA"></path>
      </g>
    </svg>
  </div>
  <div class="relative container mx-auto px-4">
    <div class="max-w-2xl mb-16 mx-auto text-center">
      <h2 class="mb-6 text-4xl font-bold font-heading text-blue-800"><?= $section->headline() ?></h2>
      <?php if ($section->intro()->isNotEmpty()): ?>
        <p class="mb-10 text-lg text-gray-500"><?= $section->intro() ?></p>
      <?php endif ?>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-x-4 gap-y-6">
      <?php foreach ($features as $feature): ?>
        <?php if ($feature->public()->toBool()): ?>
          <div class="bg-white">
            <?php if ($image = $feature->cover()->toFile()): ?>
              <?php $resizedImage = $image->thumb('feature') ?>
              <img class="w-full h-64 lg:h-72 object-cover" src="<?= $resizedImage->url() ?>" width="<?= $resizedImage->width() ?>" height="<?= $resizedImage->height() ?>" alt="">
            <?php endif ?>
            <div class="py-16 px-10 text-center">
              <h3 class="mb-4 text-lg text-blue-800 font-bold uppercase font-heading"><?= $feature->headline() ?></h3>
              <div class="prose prose-gray-500"><?= $feature->intro() ?></div>
            </div>
          </div>
        <?php endif ?>
      <?php endforeach ?>
    </div>
  </div>
</section>