  <header class="flex flex-row items-center px-5 py-8 bg-white shadow">
    <div class="basis-4/5">
      <p class="text-4xl font-bold text-gray-900">{{ $slot }}</p>
    </div>
    @if (request()->is('bugs'))
    <a class="basis-1/5 text-center px-5 py-5 border-2 border-gray-800 rounded-lg bg-gray-800 hover:bg-white text-gray-300 hover:text-gray-900 text-3xl font-bold" href="/bugs/create">
      Report<br>Bug
    </a>
    @endif
  </header>
