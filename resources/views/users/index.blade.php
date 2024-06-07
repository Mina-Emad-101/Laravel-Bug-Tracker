<x-layout>
    <x-header>Users</x-header>
    <x-main>
        <div class="p-5 grid grid-cols-1 lg:grid-cols-4 gap-5">
            @foreach ($users as $user)
                <a class="contents" href="/users/{{ $user->id }}">
                    <div
                        class="grid grid-cols-1 auto-rows-max justify-center text-center text-lg lg:text-2xl p-5 border-2 border-gray-800 rounded-lg hover:bg-gray-800 hover:text-gray-300">

                        <div class="pb-5 text-2xl lg:text-3xl h-20"><strong>{{ $user->name }}</strong>
                        </div>

                        <div class="pb-3 self-end">
                            <strong class="">ID:</strong>
                            <div>{{ $user->id }}</div>
                        </div>

                        <div class="pb-3 self-end h-20">
                            <strong>Role:</strong>
                            <br>
                            {{ $user->role->name }}
                        </div>

                        @can('destroy', $user)
                            <div class="contents">
                                <form class="contents" method="POST" action="/users/{{ $user->id }}">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" value="Delete"
                                        class="h-10 text-center font-bold text-lg lg:text-xl border-2 border-red-500 hover:border-red-500 rounded-lg bg-white hover:bg-red-500 text-red-500 hover:text-red-100">
                                </form>
                            </div>
                        @endcan
                    </div>
                </a>
            @endforeach
        </div>
        <div class="pt-28">
            {{ $users->links() }}
        </div>
    </x-main>
</x-layout>
