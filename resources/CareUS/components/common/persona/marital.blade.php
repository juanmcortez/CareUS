@props([
'item' => 'user.persona',
'values' => [],
'maritList' => [],
])

@php
$nam_famsz = preg_replace( '/'.preg_quote('][', '/').'/', '[', str_replace('.', '][', $item.'.family_size').']', 1);
$nam_marit = preg_replace( '/'.preg_quote('][', '/').'/', '[', str_replace('.', '][', $item.'.marital').']', 1);
$nam_madet = preg_replace( '/'.preg_quote('][', '/').'/', '[', str_replace('.', '][', $item.'.marital_details').']', 1);

$val_famsz = ($values) ? $values->family_size : old($item.'.family_size');
$val_marit = ($values) ? $values->marital : old($item.'.marital');
$val_madet = ($values) ? $values->marital_details : old($item.'.marital_details');
@endphp

<div {{ $attributes->merge([ 'class' => 'flex flex-row flex-wrap' ]) }}>
    <div class="flex flex-row items-center justify-start w-3/12">
        <x-common.forms.label for="family_size" class="w-4/12 text-right">{{ __('Family Size') }}</x-common.forms.label>
        <x-common.forms.input id="family_size" class="w-8/12" type="text" name="{{ $nam_famsz }}" :value="$val_famsz"
            placeholder="{{ __('Family Size') }}" />
    </div>
    @isset($maritList)
    <div class="flex flex-row items-center justify-start w-3/12">
        <x-common.forms.label for="marital" class="w-4/12 text-right">{{ __('Marital Status') }}</x-common.forms.label>
        <x-common.forms.select id="marital" class="w-8/12" name="{{ $nam_marit }}" :options="$maritList"
            :seloption="$val_marit" />
    </div>
    @endisset
    <div class="flex flex-row items-center justify-start w-6/12">
        <x-common.forms.label for="marital_details" class="w-2/12 text-right">
            {{ __('Marital Details') }}
        </x-common.forms.label>
        <x-common.forms.input id="marital_details" class="w-10/12" type="text" name="{{ $nam_madet }}"
            :value="$val_madet" />
    </div>
</div>
