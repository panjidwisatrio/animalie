@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-green-900']) }}>
    {{ $value ?? $slot }}
</label>
