<x-layout>
  <x-header>Bugs</x-header>
  <x-main>
    <div class="p-5 w-full grid grid-cols-2 lg:grid-cols-5 gap-5">
      @foreach ($bugs as $bug)
        <div class="text-center text-lg lg:text-2xl p-5 border-2 border-gray-800 rounded-lg hover:bg-gray-800 hover:text-gray-300">
          <a href="/bugs/{{ $bug->id }}">
            <div class="pb-5 text-2xl lg:text-3xl"><strong>Bug #{{ $bug->id }}</strong></div>

            @if ($bug->priority->name == 'High')
              <div class="pb-3"><strong>Priority:</strong><br><p class="text-red-500">{{ $bug->priority->name }}</p></div>
            @elseif ($bug->priority->name == 'Medium')
              <div class="pb-3"><strong>Priority:</strong><br><p class="text-orange-500">{{ $bug->priority->name }}</p></div>
            @else
              <div class="pb-3"><strong>Priority:</strong><br><p class="text-lime-500">{{ $bug->priority->name }}</p></div>
            @endif

            <div class="pb-3"><strong>Status:</strong><br>{{ $bug->status->name }}</div>
          </a>
        </div>
      @endforeach
    </div>
    <div class="pt-28">
      {{ $bugs->links() }}
    </div>
  </x-main>
</x-layout>
