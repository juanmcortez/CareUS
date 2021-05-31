@props([
'item' => 'user.contact',
'values' => [],
'titleList' => [],
'idx' => 0,
])

@php
$nam_title = preg_replace( '/'.preg_quote('][', '/').'/', '[', str_replace('.', '][', $item.'.contact_type').']', 1);

$val_title = ($values) ? $values->contact_type : old($item.'.contact_type');
@endphp

<div {{ $attributes->merge([ 'class' => 'flex flex-row flex-wrap' ]) }}>
    @isset($titleList)
    <div class="flex flex-row items-center justify-start w-3/12">
        <x-common.forms.label for="contact_type" class="w-4/12 text-right">
            {{ __('Contact #:contact_id', ['contact_id' => ($idx+1)]) }}
        </x-common.forms.label>
        <x-common.forms.select id="contact_type" class="w-8/12" name="{{ $nam_title }}" :options="$titleList"
            :seloption="$val_title" />
    </div>
    @endisset
</div>
