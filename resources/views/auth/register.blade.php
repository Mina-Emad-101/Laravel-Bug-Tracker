<x-layout>
    <x-header>Create New Account</x-header>
    <x-main>
        <x-form class="mx-2" action="/auth" enctype="multipart/form-data" method="POST">

            <x-form-element name="name">
                <input class="p-1.5 rounded-lg" type="text" id="name" name="name" placeholder="My Username"
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

            <input type="hidden" name="role_id" value="3">

            <div class="flex items-center justify-end gap-x-6">
                <a href="/" class="text-sm font-semibold text-gray-900">Cancel</a>
                <button type="submit"
                    class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                    Create Account
                </button>
            </div>
        </x-form>
    </x-main>
</x-layout>
