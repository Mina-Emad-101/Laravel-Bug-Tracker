<x-layout>
  <x-header>Bugs</x-header>
  <x-main>
    <ul>
      @foreach ($bugs as $bug)
        <li><strong>ID:</strong> <a href="/bug/{{ $bug['id'] }}">{{ $bug['id'] }}</a></li>
        <li><strong>Status:</strong> {{ $bug['status'] }}</li>
        <li><strong>Description:</strong> {{ $bug['description'] }}</li>
        @for ($i = 0; $i < 30; $i++)
          {{ '-' }}
        @endfor
        <br>
        <br>
      @endforeach
    </ul>
  </x-main>
</x-layout>
