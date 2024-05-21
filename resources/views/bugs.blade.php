<x-layout>
  <x-header>Bugs</x-header>
  <x-main>
    <ul>
      @foreach ($bugs as $bug)
        <li><strong>ID:</strong> <a href="/bug/{{ $bug->id }}">{{ $bug->id }}</a></li>
        <li><strong>Priority:</strong> {{ $bug->priority->name }}</li>
        <li><strong>Status:</strong> {{ $bug->status->name }}</li>
        <li><strong>Description:</strong> {{ $bug->description }}</li>
        <li><strong>Assigned Staff:</strong> {{ $bug->assigned_staff->name }}</li>
        <li><strong>Reporter:</strong> {{ $bug->reporter->name }}</li>
        @for ($i = 0; $i < 30; $i++)
          {{ '-' }}
        @endfor
        <br>
        <br>
      @endforeach
    </ul>
  </x-main>
</x-layout>
