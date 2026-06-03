@php
    /** @var ArticlePage $page */
@endphp
<x-layout>
  <section class="py-24 print:py-12">
    <div class="container px-4 mx-auto">
      <div class="max-w-2xl mx-auto">
        <h1 class="mb-10 text-4xl font-bold font-heading text-purple-800">{{ $page->title() }}</h1>
        @if ($page->intro()->isNotEmpty())
          <p class="mb-10 text-xl text-gray-500 print:text-black">{{ $page->intro() }}</p>
        @endif
        <div class="blocks print:text-black max-w-none">
          {!! $page->text()->toBlocks() !!}
        </div>
      </div>
    </div>
  </section>
</x-layout>
