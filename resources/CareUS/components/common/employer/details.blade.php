@props([
'item' => 'user.employment',
'values' => [],
'titleList' => [],
])

@php
$nam_comny = preg_replace( '/'.preg_quote('][', '/').'/', '[', str_replace('.', '][', $item.'.company').']', 1);
$nam_occpt = preg_replace( '/'.preg_quote('][', '/').'/', '[', str_replace('.', '][', $item.'.occupation').']', 1);
$nam_monin = preg_replace( '/'.preg_quote('][', '/').'/', '[', str_replace('.', '][', $item.'.monthly_income').']', 1);
$nam_finre = preg_replace( '/'.preg_quote('][', '/').'/', '[', str_replace('.', '][', $item.'.financial_review').']',
1);

$val_comny = ($values) ? $values->company : old($item.'.company');
$val_occpt = ($values) ? $values->occupation : old($item.'.occupation');
$val_monin = ($values) ? $values->monthly_income : old($item.'.monthly_income');
$val_finre = ($values) ? $values->financial_review : old($item.'.financial_review');
@endphp

<div {{ $attributes->merge([ 'class' => 'flex flex-row flex-wrap' ]) }}>
    <div class="flex flex-row items-center justify-start w-3/12">
        <x-common.forms.label for="company" class="w-4/12 text-right">{{ __('Company') }}</x-common.forms.label>
        <x-common.forms.input id="company" class="w-8/12" type="text" name="{{ $nam_comny }}" :value="$val_comny"
            placeholder="{{ __('Company') }}" />
    </div>
    <div class="flex flex-row items-center justify-start w-3/12">
        <x-common.forms.label for="occupation" class="w-4/12 text-right">{{ __('Occupation') }}</x-common.forms.label>
        <x-common.forms.input id="occupation" class="w-8/12" type="text" name="{{ $nam_occpt }}" :value="$val_occpt"
            placeholder="{{ __('Occupation') }}" />
    </div>
</div>
<div {{ $attributes->merge([ 'class' => 'flex flex-row flex-wrap' ]) }}>
    <div class="flex flex-row items-center justify-start w-3/12">
        <x-common.forms.label for="monthly_income" class="w-4/12 text-right">
            {{ __('Monthly Income') }}
        </x-common.forms.label>
        <x-common.forms.input id="monthly_income" class="w-8/12" type="text" name="{{ $nam_monin }}" :value="$val_monin"
            placeholder="{{ __('0000.00') }}" />
    </div>
    <div class="flex flex-row items-center justify-start w-3/12">
        <x-common.forms.label for="financial_review" class="w-4/12 text-right">
            {{ __('Financial Review') }}
        </x-common.forms.label>
        <x-common.forms.input id="financial_review" class="w-8/12" type="text" name="{{ $nam_finre }}"
            :value="$val_finre" />
    </div>
</div>
