@props([
'item' => 'user.subscriber',
'values' => [],
])

@php
$nam_effmo = preg_replace( '/'.preg_quote('][', '/').'/', '[', str_replace('.',
'][',$item.'.effective_date.month').']',1);
$nam_effda = preg_replace( '/'.preg_quote('][', '/').'/', '[', str_replace('.', '][',
$item.'.effective_date.day').']',1);
$nam_effye = preg_replace( '/'.preg_quote('][', '/').'/', '[', str_replace('.', '][',
$item.'.effective_date.year').']',1);
$nam_termo = preg_replace( '/'.preg_quote('][', '/').'/', '[', str_replace('.',
'][',$item.'.termination_date.month').']',1);
$nam_terda = preg_replace( '/'.preg_quote('][', '/').'/', '[', str_replace('.', '][',
$item.'.termination_date.day').']',1);
$nam_terye = preg_replace( '/'.preg_quote('][', '/').'/', '[', str_replace('.', '][',
$item.'.termination_date.year').']',1);

if($values && !is_null($values->effective_date)) {
$val_effmo = date('m', strtotime($values->effective_date));
$val_effda = date('d', strtotime($values->effective_date));
$val_effye = date('Y', strtotime($values->effective_date));
} else {
$val_effmo = ($values) ? null : old($item.'.effective_date.month');
$val_effda = ($values) ? null : old($item.'.effective_date.day');
$val_effye = ($values) ? null : old($item.'.effective_date.year');
}

if($values && !is_null($values->termination_date)) {
$val_termo = date('m', strtotime($values->termination_date));
$val_terda = date('d', strtotime($values->termination_date));
$val_terye = date('Y', strtotime($values->termination_date));
} else {
$val_termo = ($values) ? null : old($item.'.termination_date.month');
$val_terda = ($values) ? null : old($item.'.termination_date.day');
$val_terye = ($values) ? null : old($item.'.termination_date.year');
}

@endphp

<div {{ $attributes->merge([ 'class' => 'flex flex-row flex-wrap' ]) }}>
    <div class="flex flex-row items-center justify-start w-3/12">
        <x-common.forms.label for="effective_date" class="w-4/12 text-right">
            {{ __('Effective Date') }}
        </x-common.forms.label>
        <div id="date_of_birth" class="inline-flex justify-between w-8/12">
            <x-common.forms.input id="month" class="w-3/12 text-center" type="text" name="{{ $nam_effmo }}"
                :value="$val_effmo" placeholder="{{ __('MM') }}" />
            <x-common.forms.input id="day" class="w-3/12 text-center" type="text" name="{{ $nam_effda }}"
                :value="$val_effda" placeholder="{{ __('DD') }}" />
            <x-common.forms.input id="year" class="w-4/12 text-center" type="text" name="{{ $nam_effye }}"
                :value="$val_effye" placeholder="{{ __('YYYY') }}" />
        </div>
    </div>
    <div class="flex flex-row items-center justify-start w-3/12">
        <x-common.forms.label for="termination_date" class="w-4/12 text-right">
            {{ __('Termination Date') }}
        </x-common.forms.label>
        <div id="date_of_birth" class="inline-flex justify-between w-8/12">
            <x-common.forms.input id="month" class="w-3/12 text-center" type="text" name="{{ $nam_termo }}"
                :value="$val_termo" placeholder="{{ __('MM') }}" />
            <x-common.forms.input id="day" class="w-3/12 text-center" type="text" name="{{ $nam_terda }}"
                :value="$val_terda" placeholder="{{ __('DD') }}" />
            <x-common.forms.input id="year" class="w-4/12 text-center" type="text" name="{{ $nam_terye }}"
                :value="$val_terye" placeholder="{{ __('YYYY') }}" />
        </div>
    </div>
</div>
