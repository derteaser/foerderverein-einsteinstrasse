<?php
use Kirby\Cms\File;
use Kirby\Cms\Html;
use Kirby\Cms\Page;
use Kirby\Cms\Site;

/** @var Page $page */
/** @var Site $site */
?>

<?php snippet('header') ?>
<section class="container mx-auto mt-16 px-6 lg:px-24 xl:px-32 text-center">
  <h2 class="text-xl mb-4 leading-relaxed"><?= $site->title() ?></h2>
  <p><?= $site->address() ?></p>
  <p><?= $site->postal_code() ?> <?= $site->city() ?></p>
  <p><?= Html::email($site->email(), null, ['class' => 'text-tap-red-500 hover:text-tap-red-600']) ?></p>
</section>
<?php snippet('footer') ?>