<x-layout>
  <x-header>Bugs</x-header>
  <x-main>
    <ul>
      @foreach ($bugs as $bug)
        <li><strong>ID:</strong> <a href="/bug/{{ $bug->getID() }}">{{ $bug->getID() }}</a></li>
        <li><strong>Priority:</strong> {{ $bug->getPriority() }}</li>
        <li><strong>Status:</strong> {{ $bug->getStatus() }}</li>
        <li><strong>Description:</strong> {{ $bug->getDescription() }}</li>
        @for ($i = 0; $i < 30; $i++)
          {{ '-' }}
        @endfor
        <br>
        <br>
      @endforeach
    </ul>
  </x-main>
</x-layout>
