@php
    use Kirby\Cms\Html;
    /** @var Kirby\Cms\Page $page */
    /** @var Kirby\Cms\Site $site */
@endphp
<x-layout>
  <section class="container mx-auto py-16 px-6 lg:px-24 xl:px-32 blocks text-center prose max-w-(--breakpoint-lg)">
    <h2>{{ $site->title() }}</h2>
    <p>{{ $site->address() }}<br>{{ $site->postal_code() }} {{ $site->city() }}</p>
    <p>{!! Html::email($site->email()) !!}</p>
  </section>
</x-layout>
