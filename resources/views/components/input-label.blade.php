@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-emerland-900']) }}>
    {{ $value ?? $slot }}
</label>
