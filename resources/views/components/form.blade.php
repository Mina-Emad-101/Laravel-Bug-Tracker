<form {{ $attributes->merge(['class' => 'space-y-8 text-gray-900']) }}>
    <x-errors />
    @csrf

    {{ $slot }}
</form>
