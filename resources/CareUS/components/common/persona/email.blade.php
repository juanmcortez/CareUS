@props([
'item' => 'user.persona',
'values' => [],
])

@php
$nam_email = preg_replace( '/'.preg_quote('][', '/').'/', '[', str_replace('.', '][', $item.'.email').']', 1);

$val_email = ($values) ? $values->email : old($item.'.email');
@endphp

<div {{ $attributes->merge([ 'class' => 'flex flex-row flex-wrap' ]) }}>
    <div class="flex flex-row items-center justify-start w-3/12">
        <x-common.forms.label for="email" class="w-4/12 text-right">
            {{ __('E-mail') }}
        </x-common.forms.label>
        <x-common.forms.input id="email" class="w-8/12" type="text" name="{{ $nam_email }}" :value="$val_email"
            placeholder="{{ __('patient@email.com') }}" />
    </div>
</div>
