<?php

it('has home page', function () {
  $page = $this->site()->homePage();
  $response = $this->get($page->url());

  $response->assertStatus(200);
});

it('renders home page with home template', function () {
  $page = $this->site()->homePage();

  expect($page->template()->name())->toBe('home');
});
