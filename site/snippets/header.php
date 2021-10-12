<?php
use Kirby\Cms\App;
use Kirby\Cms\Page;

/** @var string $titleTag */
/** @var Page $page */
/** @var App $kirby */

//$template = $page->template();
//$entry = "templates/$template/index.js";
?>
<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="theme-color" content="#522CAF">
  <link rel="icon" href="<?= url('/favicon.svg') ?>">
  <link rel="mask-icon" href="<?= url('/mask-icon.svg') ?>" color="#522CAF">
  <link rel="apple-touch-icon" href="<?= url('/apple-touch-icon.png') ?>">
  <link rel="manifest" href="<?= url('/site.webmanifest') ?>">
  <?= $page->metaTags() ?>
  <?= vite()->client() ?>
  <?= vite()->css() ?>
  <?php //vite()->css($entry) ?>

</head>
<body class="<?= $kirby->option('debug') ? ' debug-screens' : ''?>">
<?php if ($page->template() != 'home'): ?>
  <?php snippet('header-navigation') ?>
<?php endif ?>
