@php
    /** @var PagerCtaPage $section */
    $link = $section->link()->toObject();
    $linkUrl = $link->link()->toUrl();
    $linkTarget = $link->target()->toBool() ? '_blank' : null;
    $image = $section->background()->toFile();
@endphp
<section class="relative py-20 print:py-0 overflow-hidden bg-blue-100" id="{{ $section->slug() }}">
  @if ($image)
    @php $resizedImage = $image->thumb(); @endphp
    <img class="absolute top-0 left-0 w-full h-full object-cover print:hidden"
         src="{{ $resizedImage->url() }}"
         width="{{ $resizedImage->width() }}" height="{{ $resizedImage->height() }}" alt="{{ $resizedImage->alt() }}">
  @endif
  <div class="relative container px-4 mx-auto z-10">
    <div class="max-w-xl print:max-w-none mx-auto lg:mx-0 py-12 pl-16 pr-32 bg-white clip-path-right-top">
      <h3 class="mb-4 text-2xl font-semibold text-blue-800">{{ $section->headline() }}</h3>
      <p class="mb-7 text-gray-500 text-base leading-relaxed">{{ $section->intro() }}</p>
      <a class="flex items-center text-blue-800 text-sm font-bold uppercase hover:underline print:hidden" onclick="fathom.trackGoal('{{ $section->fathom_event() }}', 0);" href="{{ $linkUrl }}" @if ($linkTarget) target="{{ $linkTarget }}" rel="noopener noreferrer" @endif>
        <span>{{ $link->text() }}</span>
        <span class="ml-2">
          @snippet('icons/arrow-right-s-line', ['class' => 'mx-auto text-blue-800 fill-current size-5'])
        </span>
      </a>
    </div>
  </div>
</section>
