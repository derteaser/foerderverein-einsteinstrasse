@php
    /** @var BlogPage $page */
    $articles = collection('latest-blog-articles');
@endphp
<x-layout>
  <section class="py-20">
    <div class="container px-4 mx-auto">
      <div class="max-w-2xl mx-auto">
        <h1 class="mb-10 text-5xl font-bold font-heading text-purple-800">{{ $page->title() }}</h1>
      </div>
      <div class="flex flex-wrap -mx-4 -mb-20">
        @foreach ($articles as $article)
          @snippet('teasers/one-column', ['article' => $article])
        @endforeach
      </div>
    </div>
  </section>
</x-layout>
