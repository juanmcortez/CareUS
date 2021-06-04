@props([
'item' => 'user.persona',
'values' => [],
'genderList' => [],
])

@php
$nam_bmont = preg_replace( '/'.preg_quote('][', '/').'/', '[', str_replace('.', '][', $item.'.date_of_birth.month').']',
1);
$nam_bdate = preg_replace( '/'.preg_quote('][', '/').'/', '[', str_replace('.', '][', $item.'.date_of_birth.day').']',
1);
$nam_byear = preg_replace( '/'.preg_quote('][', '/').'/', '[', str_replace('.', '][', $item.'.date_of_birth.year').']',
1);
$nam_gendr = preg_replace( '/'.preg_quote('][', '/').'/', '[', str_replace('.', '][', $item.'.gender').']', 1);

if($values && !is_null($values->date_of_birth)) {
$val_bmont = date('m', strtotime($values->date_of_birth));
$val_bdate = date('d', strtotime($values->date_of_birth));
$val_byear = date('Y', strtotime($values->date_of_birth));
} else {
$val_bmont = ($values) ? null : old($item.'.date_of_birth.month');
$val_bdate = ($values) ? null : old($item.'.date_of_birth.day');
$val_byear = ($values) ? null : old($item.'.date_of_birth.year');
}
$val_gendr = ($values) ? $values->gender : old($item.'.gender');
@endphp

<div {{ $attributes->merge([ 'class' => 'flex flex-row flex-wrap' ]) }}>
    <div class="flex flex-row items-center justify-start w-3/12">
        <x-common.forms.label for="date_of_birth" class="w-4/12 text-right">{{ __('Birthday') }}</x-common.forms.label>
        <div id="date_of_birth" class="inline-flex justify-between w-8/12">
            <x-common.forms.input id="month" class="w-3/12 text-center" type="text" name="{{ $nam_bmont }}"
                :value="$val_bmont" placeholder="{{ __('MM') }}" />
            <x-common.forms.input id="day" class="w-3/12 text-center" type="text" name="{{ $nam_bdate }}"
                :value="$val_bdate" placeholder="{{ __('DD') }}" />
            <x-common.forms.input id="year" class="w-4/12 text-center" type="text" name="{{ $nam_byear }}"
                :value="$val_byear" placeholder="{{ __('YYYY') }}" />
        </div>
    </div>
    @isset($genderList)
    <div class="flex flex-row items-center justify-start w-3/12">
        <x-common.forms.label for="gender" class="w-4/12 text-right">{{ __('Gender') }}</x-common.forms.label>
        <x-common.forms.select id="gender" class="w-8/12" name="{{ $nam_gendr }}" :options="$genderList"
            :seloption="$val_gendr" />
    </div>
    @endisset
</div>
