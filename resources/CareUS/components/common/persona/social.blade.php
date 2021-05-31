@props([
'item' => 'user.persona',
'values' => [],
'showpatlvlacc' => false,
])

@php
$nam_plvla = preg_replace( '/'.preg_quote('][', '/').'/', '[', str_replace('.', '][',
$item.'.patient_level_accession').']', 1);
$nam_sclse = preg_replace( '/'.preg_quote('][', '/').'/', '[', str_replace('.', '][',
$item.'.persona.social_security').']', 1);
$nam_drvlc = preg_replace( '/'.preg_quote('][', '/').'/', '[', str_replace('.', '][',
$item.'.persona.driver_license').']', 1);

$val_plvla = ($values) ? $values->patient_level_accession : old($item.'.patient_level_accession');
$val_sclse = ($values) ? $values->persona->social_security : old($item.'.persona.social_security');
$val_drvlc = ($values) ? $values->persona->driver_license : old($item.'.persona.driver_license');
@endphp

<div {{ $attributes->merge([ 'class' => 'flex flex-row flex-wrap' ]) }}>
    @if($showpatlvlacc)
    <div class="flex flex-row items-center justify-start w-3/12">
        <x-common.forms.label for="patient_level_accession" class="w-4/12 text-right">
            {{ __('Accession #') }}
        </x-common.forms.label>
        <x-common.forms.input id="patient_level_accession" class="w-8/12" type="text" name="{{ $nam_plvla }}"
            :value="$val_plvla" placeholder="{{ __('0000000000000000') }}" />
    </div>
    @endif
    <div class="flex flex-row items-center justify-start w-3/12">
        <x-common.forms.label for="social_security" class="w-4/12 text-right">
            {{ __('Social Security') }}
        </x-common.forms.label>
        <x-common.forms.input id="social_security" class="w-8/12" type="text" name="{{ $nam_sclse }}"
            :value="$val_sclse" placeholder="{{ __('000-00-0000') }}" />
    </div>
    <div class="flex flex-row items-center justify-start w-3/12">
        <x-common.forms.label for="driver_license" class="w-4/12 text-right">
            {{ __('Driver License') }}
        </x-common.forms.label>
        <x-common.forms.input id="driver_license" class="w-8/12" type="text" name="{{ $nam_drvlc }}" :value="$val_drvlc"
            placeholder="{{ __('AAA00000000A') }}" />
    </div>
</div>
