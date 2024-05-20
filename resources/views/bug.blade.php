<x-layout>
  <x-header>Bug #{{ $bug->getID() }}</x-header>
  <x-main>
    <li><h3><strong>ID:</strong> {{ $bug->getID() }}</h3></li>
    <li><h3><strong>Priority:</strong> {{ $bug->getPriority() }}</h3></li>
    <li><h3><strong>Status:</strong> {{ $bug->getStatus() }}</h3></li>
    <li><h3><strong>Description:</strong> {{ $bug->getDescription() }}</h3></li>
  </x-main>
</x-layout>
