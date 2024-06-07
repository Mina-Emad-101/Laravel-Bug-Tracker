<x-layout>
    <x-header>Bug #{{ $bug->id }}</x-header>
    <x-main>
        <x-form class="contents" action="/bugs/{{ $bug->id }}" method="POST">
            @method('PATCH')
            <input type="hidden" name="bug_id" value="{{ $bug->id }}">

            <div class="text-2xl space-y-6 ml-5">
                <div>
                    <strong>Project:</strong>
                    <p class="ml-5">{{ $bug->project->name }}</p>
                </div>
                <div>
                    <strong>Priority:</strong>
                    <p class="ml-5">{{ $bug->priority ? $bug->priority->name : 'Bug Not Assigned Yet' }}</p>
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
                    <img class="ml-5 w-3/4 lg:w-1/2" src="{{ asset('storage/' . $bug->screenshot) }}">
                </div>
                <div>
                    <strong>Assigned Staff:</strong>
                    <p class="ml-5">{{ $bug->assigned_staff ? $bug->assigned_staff->name : 'Bug Not Assigned Yet' }}
                    </p>
                    @if (!$bug->assigned_staff)
                        @can('update', $bug)
                            <br>
                            <label class="ml-5" id="staff" name="staff">Enter Staff Member ID</label>
                            <br>
                            <datalist id="staff_ids">
                                @foreach ($staff as $staffMember)
                                    <option value="{{ $staffMember->id }}">
                                        {{ $staffMember->name }} ID:{{ $staffMember->id }}
                                    </option>
                                @endforeach
                            </datalist>
                            <input class="ml-10 p-1 w-3/4 lg:w-1/4 rounded-lg border-2 shadow-md" list="staff_ids"
                                name="staff_id" id="staff_id" required>
                            <br>
                            <label class="ml-5" id="priority" name="priority">Select Priority</label>
                            <br>
                            <select class="ml-10 p-1 w-3/4 lg:w-1/4 rounded-lg border-2 shadow-md" id="priority"
                                name="priority_id"
                                class="rounded-md p-1.5 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 lg:max-w-xs"
                                required>
                                <option class="p-1" value="" selected disabled hidden>-- Select Priority --
                                </option>
                                @foreach ($priorities as $priority)
                                    <option class="p-1" value={{ $priority->id }}>{{ $priority->name }}</option>
                                @endforeach
                            </select>
                            <br>
                            <br>
                            <div class="flex justify-center ml-5 w-3/4 lg:w-1/4">
                                <button type="submit"
                                    class="rounded-md bg-indigo-600 px-3 py-2 text-md font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                                    Assign Bug
                                </button>
                            </div>
                        @endcan
                    @endif
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
        </x-form>
    </x-main>
</x-layout>
