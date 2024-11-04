<?php

it('has home page', function () {
  $response = site()->homePage()->render();

  expect($response)->toBeString();
});

it('renders home page with home template', function () {
  $page = site()->homePage();

  expect($page->template()->name())->toBe('home');
});
