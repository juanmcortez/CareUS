@props([
'item' => 'user.persona.address',
'values' => [],
'stateList' => [],
'countryList' => [],
])

@php
$nam_stree = preg_replace( '/'.preg_quote('][', '/').'/', '[', str_replace('.', '][', $item.'.street').']', 1);
$nam_strex = preg_replace( '/'.preg_quote('][', '/').'/', '[', str_replace('.', '][',
$item.'.street_extended').']', 1);
$nam_citie = preg_replace( '/'.preg_quote('][', '/').'/', '[', str_replace('.', '][', $item.'.city').']', 1);
$nam_pocod = preg_replace( '/'.preg_quote('][', '/').'/', '[', str_replace('.', '][', $item.'.zip').']', 1);
$nam_state = preg_replace( '/'.preg_quote('][', '/').'/', '[', str_replace('.', '][', $item.'.state').']', 1);
$nam_count = preg_replace( '/'.preg_quote('][', '/').'/', '[', str_replace('.', '][', $item.'.country').']', 1);

$val_stree = ($values) ? $values->street : old($item.'.street');
$val_strex = ($values) ? $values->street_extended : old($item.'.street_extended');
$val_citie = ($values) ? $values->city : old($item.'.city');
$val_pocod = ($values) ? $values->zip : old($item.'.zip');
$val_state = ($values) ? $values->state : old($item.'.state');
$val_count = ($values) ? $values->country : old($item.'.country');
@endphp

<div {{ $attributes->merge([ 'class' => 'flex flex-row flex-wrap' ]) }}>
    <div class="flex flex-row items-center justify-start w-6/12">
        <x-common.forms.label for="street" class="w-2/12 text-right">{{ __('Address') }}</x-common.forms.label>
        <x-common.forms.input id="street" class="w-10/12" type="text" name="{{ $nam_stree }}" :value="$val_stree"
            placeholder="{{ __('Address') }}" />
    </div>
    <div class="flex flex-row items-center justify-start w-3/12">
        <x-common.forms.label for="street_extended" class="w-1/12">&nbsp;</x-common.forms.label>
        <x-common.forms.input id="street_extended" class="w-11/12" type="text" name="{{ $nam_strex }}"
            :value="$val_strex" placeholder="{{ __('Extended address') }}" />
    </div>
    <div class="flex flex-row items-center justify-start w-3/12">
        <x-common.forms.label for="city" class="w-4/12 text-right">{{ __('City') }}</x-common.forms.label>
        <x-common.forms.input id="city" class="w-8/12" type="text" name="{{ $nam_citie }}" :value="$val_citie"
            placeholder="{{ __('City') }}" />
    </div>
</div>
<div {{ $attributes->merge([ 'class' => 'flex flex-row flex-wrap' ]) }}>
    <div class="flex flex-row items-center justify-start w-3/12">
        <x-common.forms.label for="zip" class="w-4/12 text-right">{{ __('Zip') }}</x-common.forms.label>
        <x-common.forms.input id="zip" class="w-8/12" type="text" name="{{ $nam_pocod }}" :value="$val_pocod"
            placeholder="{{ __('Zip') }}" />
    </div>
    @isset($stateList)
    <div class="flex flex-row items-center justify-start w-3/12">
        <x-common.forms.label for="state" class="w-4/12 text-right">{{ __('State') }}</x-common.forms.label>
        <x-common.forms.select id="state" class="w-8/12" name="{{ $nam_state }}" :options=" $stateList"
            :seloption="$val_state" />
    </div>
    @endisset
    @isset($countryList)
    <div class="flex flex-row items-center justify-start w-3/12">
        <x-common.forms.label for="country" class="w-4/12 text-right">{{ __('Country') }}</x-common.forms.label>
        <x-common.forms.select id="country" class="w-8/12" name="{{ $nam_count }}" :options="$countryList"
            :seloption="$val_count" />
    </div>
    @endisset
</div>
