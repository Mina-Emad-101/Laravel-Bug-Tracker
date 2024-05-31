@props(['name'])

<div class="space-y-2">
    <label for="{{ $name }}" class="text-lg font-semibold">{{ ucwords(str_replace('_', ' ', $name)) }}</label>
    <div>
        {{ $slot }}
    </div>
</div>
