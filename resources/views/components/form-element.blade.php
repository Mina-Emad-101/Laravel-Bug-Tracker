@props(['name'])

<div class="space-y-2">
    <label for="{{ $name }}" class="text-lg font-semibold">{{ ucwords($name) }}</label>
    <div>
        {{ $slot }}
    </div>
</div>
