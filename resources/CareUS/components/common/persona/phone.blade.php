@props([
'item' => 'user.persona.phone',
'values' => [],
'phoneList' => [],
'idx' => 0,
])

@php
$nam_ptype = preg_replace( '/'.preg_quote('][', '/').'/', '[', str_replace('.', '][', $item.'.type').']',
1);
$nam_intco = preg_replace( '/'.preg_quote('][', '/').'/', '[', str_replace('.', '][',
$item.'.international_code').']', 1);
$nam_areco = preg_replace( '/'.preg_quote('][', '/').'/', '[', str_replace('.', '][',
$item.'.area_code').']', 1);
$nam_fdigs = preg_replace( '/'.preg_quote('][', '/').'/', '[', str_replace('.', '][',
$item.'.initial_digits').']', 1);
$nam_ldigs = preg_replace( '/'.preg_quote('][', '/').'/', '[', str_replace('.', '][',
$item.'.last_digits').']', 1);
$nam_pextn = preg_replace( '/'.preg_quote('][', '/').'/', '[', str_replace('.', '][',
$item.'.extension').']', 1);

$val_ptype = ($values) ? $values->type : old($item.'.type');
$val_intco = ($values) ? $values->international_code : old($item.'.international_code');
$val_areco = ($values) ? $values->area_code : old($item.'.area_code');
$val_fdigs = ($values) ? $values->initial_digits : old($item.'.initial_digits');
$val_ldigs = ($values) ? $values->last_digits : old($item.'.last_digits');
$val_pextn = ($values) ? $values->extension : old($item.'.extension');
@endphp

<div {{ $attributes->merge([ 'class' => 'flex flex-row flex-wrap' ]) }}>
    @isset($phoneList)
    <div class="flex flex-row items-center justify-start w-3/12">
        <x-common.forms.label for="title" class="w-4/12 text-right">
            {{ __('Phone #:index', ['index' => $idx+1]) }}
        </x-common.forms.label>
        <x-common.forms.select id="title" class="w-8/12" name="{{ $nam_ptype }}" :options="$phoneList"
            :seloption="$val_ptype" />
    </div>
    @endisset
    <div class="flex flex-row items-center justify-start w-6/12">
        <x-common.forms.label for="international_code" class="w-1/12 text-center">+</x-common.forms.label>
        <x-common.forms.input id="international_code" class="w-1/12 text-center" type="text" name="{{ $nam_intco }}"
            :value="$val_intco" placeholder="1" />
        <x-common.forms.label for="area_code" class="w-1/12 text-center">(</x-common.forms.label>
        <x-common.forms.input id="area_code" class="w-1/12 text-center" type="text" name="{{ $nam_areco }}"
            :value="$val_areco" placeholder="000" />
        <x-common.forms.label for="initial_digits" class="w-1/12 text-center">)</x-common.forms.label>
        <x-common.forms.input id="initial_digits" class="w-2/12 text-center" type="text" name="{{ $nam_fdigs }}"
            :value="$val_fdigs" placeholder="000" />
        <x-common.forms.label for="last_digits" class="w-1/12 text-center">-</x-common.forms.label>
        <x-common.forms.input id="last_digits" class="w-2/12 text-center" type="text" name="{{ $nam_ldigs }}"
            :value="$val_ldigs" placeholder="0000" />
        <x-common.forms.label for="extension" class="w-1/12 text-center">{{ __('Ext.') }}</x-common.forms.label>
        <x-common.forms.input id="extension" class="w-1/12 text-center" type="text" name="{{ $val_pextn }}"
            :value="$val_pextn" placeholder="00" />
    </div>
</div>
