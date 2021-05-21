@props(['value'])

<label {{ $attributes->merge(['class' => 'mr-2 text-right']) }}>
    {{ $value ?? $slot }}
</label>
