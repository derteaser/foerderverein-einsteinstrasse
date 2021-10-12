<?php
$logo = asset('img/logo-gruppen.svg');
?>
<section class="py-3 px-4 lg:px-10 bg-purple-800 fixed w-screen z-50">
  <nav>
    <a class="flex justify-between items-center group" href="/">
      <div class="text-xl text-white group-hover:text-blue-300 font-semibold flex items-center">
        <?php snippet('icon', ['name' => 'home', 'cssClasses' => 'fill-current w-6 h-6 mr-2']) ?>
        <span class="hidden sm:inline">Zur Startseite</span>
      </div>
      <img src="<?= $logo->url() ?>" width="<?= $logo->width() ?>" height="<?= $logo->height() ?>" alt="Sonne, Wolke, Regenbogen, Eis, Mond" class="w-64 object-contain">
    </a>
  </nav>
</section>
<div class="h-14"></div>