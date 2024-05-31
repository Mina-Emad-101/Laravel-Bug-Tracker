<x-layout>
    <x-header>Bugs</x-header>
    <x-main>
        <div class="p-5 grid grid-cols-1 lg:grid-cols-4 gap-5">
            @foreach ($bugs as $bug)
                <a class="contents" href="/bugs/{{ $bug->id }}">
                    <div
                        class="grid grid-cols-1 auto-rows-max justify-center text-center text-lg lg:text-2xl p-5 border-2 border-gray-800 rounded-lg hover:bg-gray-800 hover:text-gray-300">

                        <div class="pb-5 text-2xl lg:text-3xl h-10"><strong>Bug #{{ $bug->id }}</strong>
                        </div>

                        <div class="pb-3 h-28"><strong>Project:</strong><br>{{ $bug->project->name }}</div>

                        @if ($bug->priority)
                            @if ($bug->priority->name == 'High')
                                <div class="pb-3 self-end h-20"><strong class="">Priority:</strong><br>
                                    <div class="text-red-500">{{ $bug->priority->name }}</div>
                                </div>
                            @elseif ($bug->priority->name == 'Medium')
                                <div class="pb-3 self-end h-20 "><strong class="">Priority:</strong><br>
                                    <div class="text-orange-500">{{ $bug->priority->name }}</div>
                                </div>
                            @else
                                <div class="pb-3 self-end h-20 "><strong class="">Priority:</strong><br>
                                    <div class="text-lime-500">{{ $bug->priority->name }}</div>
                                </div>
                            @endif
                        @else
                            <div class="pb-3 self-end h-20"><strong>Priority:</strong><br>
                                Not Assigned
                            </div>
                        @endif

                        <div class="pb-3 self-end h-20"><strong>Status:</strong><br>{{ $bug->status->name }}
                        </div>

                        <div class="contents">
                            <form class="contents" method="POST" action="/bugs/{{ $bug->id }}">
                                @csrf
                                @method('DELETE')
                                <input type="submit" value="Delete"
                                    class="h-10 text-center font-bold text-lg lg:text-2xl border-2 border-red-500 hover:border-red-500 rounded-lg bg-white hover:bg-red-500 text-red-500 hover:text-red-100">
                            </form>
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
