<?php
use Kirby\Cms\Site;

/** @var Site $site */
$logo = asset('img/logo.svg');
?>

<footer class="py-24 bg-blue-50">
  <div class="container mx-auto px-4 mb-10">
    <div class="max-w-2xl mx-auto text-center">
      <a class="inline-block mb-10 text-blue-800 text-lg font-semibold" href="/">
        <img src="<?= $logo->url() ?>" width="<?= $logo->width() ?>" height="<?= $logo->height() ?>" alt="Sonne, Wolke, Regenbogen, Eis, Mond mit Kindern" class="w-96 object-contain">
      </a>
      <ul class="mb-8 flex flex-wrap space-x-10 items-center justify-center text-sm">
        <?php foreach ($site->footer_navigation()->toPages() as $nav): ?>
          <li class="mb-2 md:mb-0"><a href="<?= $nav->url() ?>" class="text-blue-500 hover:text-blue-600"><?= $nav->title() ?></a></li>
        <?php endforeach ?>
      </ul>
      <div class="flex justify-center">
        <a class="inline-flex items-center w-12 h-12 mr-4 bg-white text-blue-800 hover:text-purple-800" href="https://facebook.com/<?= $site->facebook() ?>">
          <?php snippet('icon', ['name' => 'facebook', 'cssClasses' => 'mx-auto fill-current w-5 h-5']) ?><span class="sr-only">Facebook</span>
        </a>
        <a class="inline-flex items-center w-12 h-12 mr-4 bg-white text-blue-800 hover:text-purple-800" href="https://instagram.com/<?= $site->instagram() ?>">
          <?php snippet('icon', ['name' => 'instagram', 'cssClasses' => 'mx-auto fill-current w-5 h-5']) ?><span class="sr-only">Instagram</span>
        </a>
        <a class="inline-flex items-center w-12 h-12 mr-4 bg-white text-blue-800 hover:text-purple-800" href="<?= $site->amazon_smile() ?>">
          <?php snippet('icon', ['name' => 'amazon', 'cssClasses' => 'mx-auto fill-current w-5 h-5']) ?><span class="sr-only">Amazon Smile</span>
        </a>
        <a class="inline-flex items-center w-12 h-12 mr-4 bg-white text-blue-800 hover:text-purple-800" href="<?= $site->diakonie() ?>">
          <?php snippet('icon', ['name' => 'diakonie', 'cssClasses' => 'mx-auto fill-current w-5 h-5']) ?><span class="sr-only">Diakonie</span>
        </a>
      </div>
    </div>
  </div>
  <p class="text-center text-sm text-gray-500 pt-8 px-4 border-t border-gray-100">©<?= date('Y') ?> <?= $site->title() ?></p>
</footer>

<?= vite()->js() ?>
<?php // vite()->js($entry) ?>
</body>
</html>