@php
    /** @var PagerBlogPage $section */
    $articles = collection('latest-blog-articles')->limit($section->max_articles()->toInt());
@endphp
<section class="relative py-20 print:hidden" id="{{ $section->slug() }}">
  <div class="container px-4 mx-auto">
    <div class="flex flex-wrap -mx-4 -mb-20">
      {!! snippet('teasers/two-columns', ['article' => $articles->first()]) !!}
      @foreach ($articles->offset(1) as $article)
        {!! snippet('teasers/one-column', ['article' => $article]) !!}
      @endforeach
    </div>
  </div>
</section>
