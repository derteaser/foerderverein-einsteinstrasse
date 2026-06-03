@php
    use Kirby\Cms\Block;
    /** @var Block $block */
    $alt     = $block->alt();
    $caption = $block->caption();
    $link    = $block->link();
    $src     = null;

    if ($block->location() == 'web') {
      $src = $block->src();
    } elseif ($image = $block->image()->toFile()) {
      $alt = $alt ?? $image->alt();
      $src = $image->url();
    }
@endphp
@if ($src)
  <figure>
    @if ($link->isNotEmpty())
      <a href="{{ $link->toUrl() }}">
    @endif
    <img src="{{ $src }}" alt="{{ $alt }}">
    @if ($link->isNotEmpty())
      </a>
    @endif
    @if ($caption->isNotEmpty())
      <figcaption>{{ $caption }}</figcaption>
    @endif
  </figure>
@endif
