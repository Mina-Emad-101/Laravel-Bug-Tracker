<x-layout>
  <x-header>Bug #{{ $bug->id }}</x-header>
  <x-main>
    <div class="text-2xl space-y-6">
      <div>
        <strong>Priority:</strong>
        <p class="pl-5">{{ $bug->priority->name }}</p>
      </div>
      <div>
        <strong>Status:</strong>
        <p class="pl-5">{{ $bug->status->name }}</p>
      </div>
      <div>
        <strong>Description:</strong>
        <p class="pl-5 w-3/4">{{ $bug->description }}</p>
      </div>
      <div>
        <strong>Screenshot:</strong>
        <img class="pl-5 w-1/2" src="{{ asset('storage/'.$bug->screenshot) }}">
      </div>
      <div>
        <strong>Assigned Staff:</strong>
        <p class="pl-5">{{ $bug->assigned_staff->name }}</p>
      </div>
      <div>
        <strong>Reporter:</strong>
        <p class="pl-5">{{ $bug->reporter->name }}</p>
      </div>
      <div>
        <strong>Created At:</strong>
        <p class="pl-5">{{ $bug->created_at }}</p>
      </div>
    </div>
  </x-main>
</x-layout>
