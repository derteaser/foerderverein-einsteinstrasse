@php
    /** @var PersonPage $page */
@endphp
<x-layout>
  <section class="flex mx-auto justify-center p-6 lg:p-24 xl:p-32 overflow-hidden">
    @snippet('person', ['person' => $page])
  </section>
</x-layout>
