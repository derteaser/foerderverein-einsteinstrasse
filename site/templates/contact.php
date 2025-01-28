<?php
use Kirby\Cms\File;
use Kirby\Cms\Html;
use Kirby\Cms\Page;
use Kirby\Cms\Site;

/** @var Page $page */
/** @var Site $site */
?>

<?php snippet('layout', slots: true); ?>
<section class="container mx-auto py-16 px-6 lg:px-24 xl:px-32 blocks text-center prose max-w-(--breakpoint-lg)">
  <h2><?= $site->title() ?></h2>
  <p><?= $site->address() ?><br><?= $site->postal_code() ?> <?= $site->city() ?></p>
  <p><?= Html::email($site->email()) ?></p>
</section>