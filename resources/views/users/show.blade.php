<x-layout>
    <x-header>{{ $user->name }}</x-header>
    <x-main>
        <div class="text-2xl space-y-6 ml-5">
            <div>
                <strong>Role:</strong>
                <p class="ml-5">{{ $user->role->name }}</p>
            </div>
            <div>
                <strong>Name:</strong>
                <p class="ml-5">{{ $user->name }}</p>
            </div>
            <div>
                <strong>ID:</strong>
                <p class="ml-5">{{ $user->id }}</p>
            </div>
            <div>
                <strong>Email:</strong>
                <p class="ml-5">{{ $user->email }}</p>
            </div>
        </div>
    </x-main>
</x-layout>
