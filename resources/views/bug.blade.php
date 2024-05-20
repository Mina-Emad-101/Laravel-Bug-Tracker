<x-layout>
  <x-header>Bug #{{ $bug['id'] }}</x-header>
  <x-main>
    <li><h3><strong>ID:</strong> {{ $bug['id'] }}</h3></li>
    <li><h3><strong>Status:</strong> {{ $bug['status'] }}</h3></li>
    <li><h3><strong>Description:</strong> {{ $bug['description'] }}</h3></li>
  </x-main>
</x-layout>
