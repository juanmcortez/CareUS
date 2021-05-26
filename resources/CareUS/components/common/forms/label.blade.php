@props(['value'])

<label {{ $attributes->merge(['class' => 'mr-2']) }}>
    {{ $value ?? $slot }}
</label>
