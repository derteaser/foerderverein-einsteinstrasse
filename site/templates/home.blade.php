@php
    /** @var HomePage $page */
@endphp
<x-layout :show-header-navigation="false">
  <main>
    @foreach ($page->children()->listed() as $section)
      @snippet($section->intendedTemplate(), ['section' => $section])
    @endforeach
  </main>
</x-layout>
