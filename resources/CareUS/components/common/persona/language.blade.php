@props([
'item' => 'user.persona',
'values' => [],
'langList' => [],
])

@php
$nam_langu = preg_replace( '/'.preg_quote('][', '/').'/', '[', str_replace('.', '][', $item.'.language').']', 1);

$val_langu = ($values) ? $values->language : old($item.'.language');
@endphp

<div {{ $attributes->merge([ 'class' => 'flex flex-row flex-wrap' ]) }}>
    @isset($langList)
    <div class="flex flex-row items-center justify-start w-3/12">
        <x-common.forms.label for="language" class="w-4/12 text-right">{{ __('Language') }}</x-common.forms.label>
        <x-common.forms.select id="language" class="w-8/12" name="{{ $nam_langu }}" :options="$langList"
            :seloption="$val_langu" />
    </div>
    @endisset
</div>
