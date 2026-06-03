<?php

require_once __DIR__ . '/../kirby/bootstrap.php';

pest()
  ->extend(Tests\TestCase::class)
  ->in('Feature', 'Unit');

expect()->extend('toBeOne', function () {
  return $this->toBe(1);
});

pest()->beforeEach(function () {
  $this->arch()
    ->ignore(['Kirby', 'Uniform'])
    ->ignoreGlobalFunctions();
});
