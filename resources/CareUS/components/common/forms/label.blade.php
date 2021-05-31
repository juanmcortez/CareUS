@props(['value'])

<label {{ $attributes->merge(['class' => 'mr-2 tabular-nums']) }}>
    {{ $value ?? $slot }}
</label>
