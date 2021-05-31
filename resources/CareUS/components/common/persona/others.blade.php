@props([
'item' => 'user.persona',
'values' => [],
'referList' => [],
'vfcList' => [],
])

@php
$nam_migra = preg_replace( '/'.preg_quote('][', '/').'/', '[', str_replace('.', '][', $item.'.migrant_seasonal').']',
1);
$nam_inter = preg_replace( '/'.preg_quote('][', '/').'/', '[', str_replace('.', '][', $item.'.interpreter').']', 1);
$nam_homls = preg_replace( '/'.preg_quote('][', '/').'/', '[', str_replace('.', '][', $item.'.homeless').']', 1);
$nam_refer = preg_replace( '/'.preg_quote('][', '/').'/', '[', str_replace('.', '][', $item.'.referral').']', 1);
$nam_vfc = preg_replace( '/'.preg_quote('][', '/').'/', '[', str_replace('.', '][', $item.'.vfc').']', 1);

$val_migra = ($values) ? $values->migrant_seasonal : old($item.'.migrant_seasonal');
$val_inter = ($values) ? $values->interpreter : old($item.'.interpreter');
$val_homls = ($values) ? $values->homeless : old($item.'.homeless');
$val_refer = ($values) ? $values->referral : old($item.'.referral');
$val_vfc = ($values) ? $values->vfc : old($item.'.vfc');
@endphp

<div {{ $attributes->merge([ 'class' => 'flex flex-row flex-wrap' ]) }}>
    <div class="flex flex-row items-center justify-start w-3/12">
        <x-common.forms.label for="migrant_seasonal" class="w-4/12 text-right">
            {{ __('Migrant / Seasonal') }}
        </x-common.forms.label>
        <x-common.forms.input id="migrant_seasonal" class="w-8/12" type="text" name="{{ $nam_migra }}"
            :value="$val_migra" placeholder="{{ __('Migrant / Seasonal') }}" />
    </div>
    <div class="flex flex-row items-center justify-start w-3/12">
        <x-common.forms.label for="interpreter" class="w-4/12 text-right">{{ __('Interpreter') }}</x-common.forms.label>
        <x-common.forms.input id="interpreter" class="w-8/12" type="text" name="{{ $nam_inter }}" :value="$val_inter"
            placeholder="{{ __('Interpreter') }}" />
    </div>
    <div class="flex flex-row items-center justify-start w-3/12">
        <x-common.forms.label for="homeless" class="w-4/12 text-right">{{ __('Homeless') }}</x-common.forms.label>
        <x-common.forms.input id="homeless" class="w-8/12" type="text" name="{{ $nam_homls }}" :value="$val_homls"
            placeholder="{{ __('Homeless') }}" />
    </div>
</div>
<div {{ $attributes->merge([ 'class' => 'flex flex-row flex-wrap' ]) }}>
    @isset($referList)
    <div class="flex flex-row items-center justify-start w-3/12">
        <x-common.forms.label for="referral" class="w-4/12 text-right">{{ __('Referral') }}</x-common.forms.label>
        <x-common.forms.select id="referral" class="w-8/12" name="{{ $nam_refer }}" :options="$referList"
            :seloption="$val_refer" />
    </div>
    @endisset
    @isset($vfcList)
    <div class="flex flex-row items-center justify-start w-3/12">
        <x-common.forms.label for="vfc" class="w-4/12 text-right">{{ __('VFC') }}</x-common.forms.label>
        <x-common.forms.select id="vfc" class="w-8/12" name="{{ $nam_vfc }}" :options="$vfcList"
            :seloption="$val_vfc" />
    </div>
    @endisset
</div>
