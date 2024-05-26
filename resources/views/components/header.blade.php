  <header class="flex flex-row px-10 py-8 bg-white shadow">
    <div class="basis-1/2">
      <p class="text-4xl font-bold text-gray-900">{{ $slot }}</p>
    </div>
    @if (request()->is('bugs'))
    <div class="basis-1/2 text-end">
      <a class="px-3 py-5 border-2 border-gray-800 rounded-lg bg-gray-800 hover:bg-white text-gray-300 hover:text-gray-900 text-3xl font-bold" href="/bugs/create">Report Bug</a>
    </div>
    @endif
  </header>
