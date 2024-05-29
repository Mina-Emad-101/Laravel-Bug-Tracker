<x-layout>
    <x-header>Bugs</x-header>
    <x-main>
        <div class="p-5 grid grid-cols-1 lg:grid-cols-4 gap-5">
            @foreach ($bugs as $bug)
                <a class="contents" href="/bugs/{{ $bug->id }}">
                    <div
                        class="grid grid-cols-1 auto-rows-auto justify-center text-center text-lg lg:text-2xl p-5 border-2 border-gray-800 rounded-lg hover:bg-gray-800 hover:text-gray-300">

                        <div class="pb-5 text-2xl lg:text-3xl "><strong>Bug #{{ $bug->id }}</strong></div>

                        <div class="pb-3"><strong>Project:</strong><br>{{ $bug->project->name }}</div>

                        @if ($bug->priority)
                            @if ($bug->priority->name == 'High')
                                <div class="pb-3 self-end "><strong>Priority:</strong><br>
                                    <p class="text-red-500">{{ $bug->priority->name }}</p>
                                </div>
                            @elseif ($bug->priority->name == 'Medium')
                                <div class="pb-3 self-end "><strong>Priority:</strong><br>
                                    <p class="text-orange-500">{{ $bug->priority->name }}</p>
                                </div>
                            @else
                                <div class="pb-3 self-end "><strong>Priority:</strong><br>
                                    <p class="text-lime-500">{{ $bug->priority->name }}</p>
                                </div>
                            @endif
                        @else
                            <div class="pb-3 self-end "><strong>Priority:</strong><br>
                                <p>Not Assigned</p>
                            </div>
                        @endif

                        <div class="pb-3 self-end "><strong>Status:</strong><br>{{ $bug->status->name }}</div>

                        <div>
                            <a class="w-1/2 font-bold text-lg lg:text-2xl  border-2 border-red-700 hover:border-white rounded-lg bg-white hover:bg-red-700 text-red-700 hover:text-white"
                                href="/bugs/{{ $bug->id }}/delete">
                                Delete
                            </a>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
        <div class="pt-28">
            {{ $bugs->links() }}
        </div>
    </x-main>
</x-layout>
