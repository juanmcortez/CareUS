@props([
'item' => 'user.persona',
'values' => [],
'raceList' => [],
'ethnicList' => [],
])

@php
$nam_races = preg_replace( '/'.preg_quote('][', '/').'/', '[', str_replace('.', '][', $item.'.race').']', 1);
$nam_ethni = preg_replace( '/'.preg_quote('][', '/').'/', '[', str_replace('.', '][', $item.'.ethnicity').']', 1);

$val_races = ($values) ? $values->race : old($item.'.race');
$val_ethni = ($values) ? $values->ethnicity : old($item.'.ethnicity');
@endphp

<div {{ $attributes->merge([ 'class' => 'flex flex-row flex-wrap' ]) }}>
    @isset($raceList)
    <div class="flex flex-row items-center justify-start w-3/12">
        <x-common.forms.label for="race" class="w-4/12 text-right">{{ __('Race') }}</x-common.forms.label>
        <x-common.forms.select id="race" class="w-8/12" name="{{ $nam_races }}" :options="$raceList"
            :seloption="$val_races" />
    </div>
    @endisset
    @isset($ethnicList)
    <div class="flex flex-row items-center justify-start w-3/12">
        <x-common.forms.label for="ethnicity" class="w-4/12 text-right">{{ __('Ethnicity') }}</x-common.forms.label>
        <x-common.forms.select id="ethnicity" class="w-8/12" name="{{ $nam_ethni }}" :options="$ethnicList"
            :seloption="$val_ethni" />
    </div>
    @endisset
</div>
