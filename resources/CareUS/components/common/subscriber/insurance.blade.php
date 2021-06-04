@props([
'item' => 'user.subscriber',
'values' => [],
'insList' => [],
'title' => 'Title',
'insdx' => 0,
])

@php
$name_lvel = preg_replace( '/'.preg_quote('][', '/').'/', '[', str_replace('.', '][', $item.'.level').']', 1);
$nam_insid = preg_replace( '/'.preg_quote('][', '/').'/', '[', str_replace('.', '][', $item.'.company_id').']', 1);
$nam_polin = preg_replace( '/'.preg_quote('][', '/').'/', '[', str_replace('.', '][', $item.'.policy_number').']', 1);
$nam_group = preg_replace( '/'.preg_quote('][', '/').'/', '[', str_replace('.', '][', $item.'.group_number').']', 1);
$nam_plann = preg_replace( '/'.preg_quote('][', '/').'/', '[', str_replace('.', '][', $item.'.plan_name').']', 1);

$val_insid = ($values) ? $values->company_id : old($item.'.company_id');
$val_polin = ($values) ? $values->policy_number : old($item.'.policy_number');
$val_group = ($values) ? $values->group_number : old($item.'.group_number');
$val_plann = ($values) ? $values->plan_name : old($item.'.plan_name');

switch ($insdx) {
default: $level = 'primary'; break;
case 1: $level = 'secondary'; break;
case 2: $level = 'tertiary'; break;
}
@endphp

<div {{ $attributes->merge([ 'class' => 'flex flex-row flex-wrap' ]) }}>
    <input type="hidden" name="{{ $name_lvel }}" value="{{ $level }}" />

    @isset($insList)
    <div class="flex flex-row items-center justify-start w-3/12">
        <x-common.forms.label for="company_id" class="w-4/12 text-right">{{ __($title) }}</x-common.forms.label>
        <x-common.forms.select id="company_id" class="w-8/12" name="{{ $nam_insid }}" :options="$insList"
            :seloption="$val_insid" />
    </div>
    @endisset
    <div class="flex flex-row items-center justify-start w-3/12">
        <x-common.forms.label for="policy_number" class="w-4/12 text-right">{{ __('Policy #') }}</x-common.forms.label>
        <x-common.forms.input id="policy_number" class="w-8/12" type="text" name="{{ $nam_polin }}" :value="$val_polin"
            placeholder="00000000" />
    </div>
    <div class="flex flex-row items-center justify-start w-3/12">
        <x-common.forms.label for="group_number" class="w-4/12 text-right">{{ __('Group #') }}</x-common.forms.label>
        <x-common.forms.input id="group_number" class="w-8/12" type="text" name="{{ $nam_group }}" :value="$val_group"
            placeholder="AA000000" />
    </div>
    <div class="flex flex-row items-center justify-start w-3/12">
        <x-common.forms.label for="plan_name" class="w-4/12 text-right">{{ __('Plan Name') }}</x-common.forms.label>
        <x-common.forms.input id="plan_name" class="w-8/12" type="text" name="{{ $nam_plann }}" :value="$val_plann"
            placeholder="{{ __('Plan Name') }}" />
    </div>
</div>
