<!DOCTYPE html>
<html class="h-full bg-gray-100">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bug Tracker</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <div class="min-h-full">
        <nav class="bg-gray-800">
            <div class="flex justify-between">
                <div class="flex items-center max-w-7xl px-4 sm:px-6 lg:px-8 h-16">
                    <div class="flex-shrink-0">
                        <img class="h-8 w-8" src="https://www.svgrepo.com/show/375429/error-reporting.svg"
                            alt="Bug Tracker">
                    </div>
                    <div class="ml-3 flex items-baseline space-x-4 block">
                        <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                        <x-nav-link href="/" :active="request()->is('/')">Home</x-nav-link>
                        <x-nav-link href="/bugs" :active="request()->is('bugs')">Bugs</x-nav-link>
                        <x-nav-link href="/about" :active="request()->is('about')">About</x-nav-link>
                    </div>
                </div>
                <div class="flex items-center max-w-7xl px-4 sm:px-6 lg:px-8 flex h-16">
                    <div class="ml-3 flex items-baseline space-x-4 block">
                        <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                        @guest
                            <x-nav-link href="/login" :active="request()->is('login')">Login</x-nav-link>
                            <x-nav-link href="/register" :active="request()->is('register')">Register</x-nav-link>
                        @endguest
                    </div>
                </div>
            </div>
        </nav>

        {{ $slot }}
    </div>
</body>

</html>
