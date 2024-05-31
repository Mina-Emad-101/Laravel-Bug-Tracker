<x-layout>
    <x-header>Login</x-header>
    <x-main>
        <x-form class="mx-2" action="/auth" enctype="multipart/form-data" method="POST">

            <x-form-element name="email">
                <input class="p-1.5 rounded-lg" type="email" id="email" name="email" placeholder="example@domain.com"
                    required>
            </x-form-element>

            <x-form-element name="password">
                <input class="p-1.5 rounded-lg" type="password" id="password" name="password" required>
            </x-form-element>

            <div class="flex items-center justify-end gap-x-6">
                <a href="/" class="text-sm font-semibold text-gray-900">Cancel</a>
                <button type="submit"
                    class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                    Login
                </button>
            </div>
        </x-form>
    </x-main>
</x-layout>
