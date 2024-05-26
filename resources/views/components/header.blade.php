  <header class="flex justify-between h-20 lg:h-24 text-center items-center bg-white shadow">
    <div class="ml-5">
      <p class="text-left text-2xl lg:text-4xl font-bold text-gray-900">{{ $slot }}</p>
    </div>
    @if (request()->is('bugs'))
    <a class="flex justify-center items-center h-3/4 px-4 mr-5 text-lg lg:text-2xl  border-2 border-gray-800 rounded-lg bg-gray-800 hover:bg-white text-gray-300 hover:text-gray-900 text-3xl font-bold" href="/bugs/create">
      Report Bug
    </a>
    @endif
  </header>
