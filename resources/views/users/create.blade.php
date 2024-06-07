<x-layout>
    <x-header>Create Account</x-header>
    <x-main>
        <x-form class="mx-2" action="/users" enctype="multipart/form-data" method="POST">

            <x-form-element name="name">
                <input class="p-1.5 rounded-lg" type="text" id="name" name="name" placeholder="Employee Username"
                    required>
            </x-form-element>

            <x-form-element name="email">
                <input class="p-1.5 rounded-lg" type="email" id="email" name="email"
                    placeholder="example@domain.com" required>
            </x-form-element>

            <x-form-element name="password">
                <input class="p-1.5 rounded-lg" type="password" id="password" name="password" required>
            </x-form-element>

            <x-form-element name="password_confirmation">
                <input class="p-1.5 rounded-lg" type="password" id="password_confirmation" name="password_confirmation"
                    required>
            </x-form-element>

            @auth
                <x-form-element name="role">
                    <select id="role" name="role_id"
                        class="rounded-md p-1.5 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 lg:max-w-xs"
                        required>
                        <option value="" selected disabled hidden>-- Select a Role --</option>
                        @foreach ($roles as $role)
                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                        @endforeach
                    </select>
                </x-form-element>
            @endauth

            @guest
                <input type="hidden" name="role_id" value="3">
            @endguest

            <div class="flex items-center justify-end gap-x-6">
                <a href="/users" class="text-sm font-semibold text-gray-900">Cancel</a>
                <button type="submit"
                    class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
            </div>
        </x-form>
    </x-main>
</x-layout>
