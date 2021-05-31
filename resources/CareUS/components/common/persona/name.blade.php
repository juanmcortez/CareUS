@props([
'item' => 'user.persona',
'values' => [],
'titleList' => [],
'title' => 'Title',
])

@php
$nam_title = preg_replace( '/'.preg_quote('][', '/').'/', '[', str_replace('.', '][', $item.'.title').']', 1);
$nam_first = preg_replace( '/'.preg_quote('][', '/').'/', '[', str_replace('.', '][', $item.'.first_name').']', 1);
$nam_middl = preg_replace( '/'.preg_quote('][', '/').'/', '[', str_replace('.', '][', $item.'.middle_name').']', 1);
$nam_lastn = preg_replace( '/'.preg_quote('][', '/').'/', '[', str_replace('.', '][', $item.'.last_name').']', 1);

$val_title = ($values) ? $values->title : old($item.'.title');
$val_first = ($values) ? $values->first_name : old($item.'.first_name');
$val_middl = ($values) ? $values->middle_name : old($item.'.middle_name');
$val_lastn = ($values) ? $values->last_name : old($item.'.last_name');
@endphp

<div {{ $attributes->merge([ 'class' => 'flex flex-row flex-wrap' ]) }}>
    @isset($titleList)
    <div class="flex flex-row items-center justify-start w-3/12">
        <x-common.forms.label for="title" class="w-4/12 text-right">{{ __($title) }}</x-common.forms.label>
        <x-common.forms.select id="title" class="w-8/12" name="{{ $nam_title }}" :options="$titleList"
            :seloption="$val_title" />
    </div>
    @endisset
    <div class="flex flex-row items-center justify-start w-3/12">
        <x-common.forms.label for="last_name" class="w-4/12 text-right">{{ __('Last name') }}</x-common.forms.label>
        <x-common.forms.input id="last_name" class="w-8/12" type="text" name="{{ $nam_lastn }}" :value="$val_lastn"
            placeholder="{{ __('Last name') }}" />
    </div>
    <div class="flex flex-row items-center justify-start w-3/12">
        <x-common.forms.label for="first_name" class="w-4/12 text-right">{{ __('First name') }}</x-common.forms.label>
        <x-common.forms.input id="first_name" class="w-8/12" type="text" name="{{ $nam_first }}" :value="$val_first"
            placeholder="{{ __('First name') }}" />
    </div>
    <div class="flex flex-row items-center justify-start w-3/12">
        <x-common.forms.label for="middle_name" class="w-4/12 text-right">{{ __('Middle name') }}</x-common.forms.label>
        <x-common.forms.input id="middle_name" class="w-8/12" type="text" name="{{ $nam_middl }}" :value="$val_middl"
            placeholder="{{ __('Middle name') }}" />
    </div>
</div>
