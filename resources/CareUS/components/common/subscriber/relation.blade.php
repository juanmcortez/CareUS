@props([
'item' => 'user.subscriber',
'values' => [],
'relList' => [],
'assList' => [],
'secList' => [],
])

@php
$nam_inrel = preg_replace( '/'.preg_quote('][', '/').'/', '[', str_replace('.', '][', $item.'.ins_relation').']', 1);
$nam_patco = preg_replace( '/'.preg_quote('][', '/').'/', '[', str_replace('.', '][', $item.'.patient_copay').']', 1);
$nam_accas = preg_replace( '/'.preg_quote('][', '/').'/', '[', str_replace('.', '][', $item.'.accept_assignment').']',
1);
$nam_secmd = preg_replace( '/'.preg_quote('][', '/').'/', '[', str_replace('.', '][',
$item.'.secondary_medical_type').']', 1);

$val_inrel = ($values) ? $values->ins_relation : old($item.'.ins_relation');
$val_patco = ($values) ? $values->patient_copay : old($item.'.patient_copay');
$val_accas = ($values) ? $values->accept_assignment : old($item.'.accept_assignment');
$val_secmd = ($values) ? $values->secondary_medical_type : old($item.'.secondary_medical_type');
@endphp

<div {{ $attributes->merge([ 'class' => 'flex flex-row flex-wrap' ]) }}>
    @isset($relList)
    <div class="flex flex-row items-center justify-start w-3/12">
        <x-common.forms.label for="company_id" class="w-4/12 text-right">{{ __('Relationship') }}</x-common.forms.label>
        <x-common.forms.select id="company_id" class="w-8/12" name="{{ $nam_inrel }}" :options="$relList"
            :seloption="$val_inrel" />
    </div>
    @endisset
    <div class="flex flex-row items-center justify-start w-3/12">
        <x-common.forms.label for="patient_copay" class="w-4/12 text-right">{{ __('Copay') }}</x-common.forms.label>
        <x-common.forms.input id="patient_copay" class="w-8/12" type="text" name="{{ $nam_patco }}" :value="$val_patco"
            placeholder="{{ __('000.00') }}" />
    </div>
    @isset($assList)
    <div class="flex flex-row items-center justify-start w-3/12">
        <x-common.forms.label for="accept_assignment" class="w-4/12 text-right">
            {{ __('Accept Assig.') }}
        </x-common.forms.label>
        <x-common.forms.select id="accept_assignment" class="w-8/12" name="{{ $nam_accas }}" :options="$assList"
            :seloption="$val_accas" />
    </div>
    @endisset
    @isset($secList)
    <div class="flex flex-row items-center justify-start w-3/12">
        <x-common.forms.label for="secondary_medical_type" class="w-4/12 text-right">
            {{ __('Sec. Medical Type') }}
        </x-common.forms.label>
        <x-common.forms.select id="secondary_medical_type" class="w-8/12" name="{{ $nam_secmd }}" :options="$secList"
            :seloption="$val_secmd" />
    </div>
    @endisset
</div>
