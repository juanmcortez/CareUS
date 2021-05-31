@props([
'item' => 'user',
'values' => [],
'created' => false,
])

@php
$nam_extid = preg_replace( '/'.preg_quote('][', '/').'/', '[', str_replace('.', '][', $item.'.externalID').']', 1);

$val_extid = ($values) ? $values->externalID : old($item.'.externalID');
$val_creat = ($values) ? $values->created_at : '';
@endphp

<div {{ $attributes->merge([ 'class' => 'flex flex-row flex-wrap' ]) }}>
    <div class="flex flex-row items-center justify-start w-3/12">
        <x-common.forms.label for="externalID" class="w-4/12 text-right">{{ __('External ID') }}</x-common.forms.label>
        <x-common.forms.input id="externalID" class="w-8/12" type="text" name="{{ $nam_extid }}" :value="$val_extid"
            placeholder="{{ __('External ID') }}" />
    </div>
    @if($created)
    <div class="flex flex-row items-center justify-start w-6/12">&nbsp;</div>
    <div class="flex flex-row items-center justify-start w-3/12">
        <x-common.forms.label for="created" class="w-4/12 text-right">{{ __('Created on') }}:</x-common.forms.label>
        <x-common.forms.input id="created" class="w-8/12" type="text" :value="$val_creat" disabled />
    </div>
    @else
    <div class="w-9/12">&nbsp;</div>
    @endif
</div>
