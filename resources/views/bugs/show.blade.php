<x-layout>
  <x-header>Bug #{{ $bug->id }}</x-header>
  <x-main>
    <div class="text-2xl space-y-6 ml-5">
      <div>
        <strong>Project:</strong>
        <p class="ml-5">{{ $bug->project->name }}</p>
      </div>
      <div>
        <strong>Priority:</strong>
        <p class="ml-5">{{ $bug->priority? $bug->priority->name : "Bug Not Assigned Yet" }}</p>
      </div>
      <div>
        <strong>Status:</strong>
        <p class="ml-5">{{ $bug->status->name }}</p>
      </div>
      <div>
        <strong>Description:</strong>
        <p class="ml-5 text-lg lg:text-2xl w-3/4">{{ $bug->description }}</p>
      </div>
      <div>
        <strong>Screenshot:</strong>
        <img class="ml-5 w-3/4 lg:w-1/2" src="{{ asset('storage/'.$bug->screenshot) }}">
      </div>
      <div>
        <strong>Assigned Staff:</strong>
        <p class="ml-5">{{ $bug->assigned_staff? $bug->assigned_staff->name : "Bug Not Assigned Yet" }}</p>
      </div>
      <div>
        <strong>Reporter:</strong>
        <p class="ml-5">{{ $bug->reporter->name }}</p>
      </div>
      <div>
        <strong>Created At:</strong>
        <p class="ml-5">{{ $bug->created_at }}</p>
      </div>
    </div>
  </x-main>
</x-layout>
