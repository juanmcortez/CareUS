@props([
'item' => 'user.persona',
'values' => [],
])

@php
$nam_dmont = preg_replace( '/'.preg_quote('][', '/').'/', '[', str_replace('.', '][', $item.'.decease_date.month').']',
1);
$nam_ddate = preg_replace( '/'.preg_quote('][', '/').'/', '[', str_replace('.', '][', $item.'.decease_date.day').']',
1);
$nam_dyear = preg_replace( '/'.preg_quote('][', '/').'/', '[', str_replace('.', '][', $item.'.decease_date.year').']',
1);
$nam_dreas = preg_replace( '/'.preg_quote('][', '/').'/', '[', str_replace('.', '][', $item.'.decease_reason').']', 1);

if($values) {
$val_dmont = ($values->decease_date) ? date('m', strtotime($values->decease_date)) : '';
$val_ddate = ($values->decease_date) ? date('d', strtotime($values->decease_date)) : '';
$val_dyear = ($values->decease_date) ? date('Y', strtotime($values->decease_date)) : '';
} else {
$val_dmont = old($item.'.decease_date.month');
$val_ddate = old($item.'.decease_date.month');
$val_dyear = old($item.'.decease_date.month');
}
$val_dreas = ($values) ? $values->decease_reason : old($item.'.decease_reason');
@endphp

<div {{ $attributes->merge([ 'class' => 'flex flex-row flex-wrap' ]) }}>
    <div class="flex flex-row items-start justify-start w-3/12">
        <x-common.forms.label for="decease_date" class="w-4/12 pt-2 text-right">
            {{ __('Decease Date') }}
        </x-common.forms.label>
        <div id="decease_date" class="inline-flex justify-between w-8/12">
            <x-common.forms.input id="month" class="w-3/12 text-center" type="text" name="{{ $nam_dmont }}"
                :value="$val_dmont" placeholder="{{ __('MM') }}" />
            <x-common.forms.input id="day" class="w-3/12 text-center" type="text" name="{{ $nam_ddate }}"
                :value="$val_ddate" placeholder="{{ __('DD') }}" />
            <x-common.forms.input id="year" class="w-4/12 text-center" type="text" name="{{ $nam_dyear }}"
                :value="$val_dyear" placeholder="{{ __('YYYY') }}" />
        </div>
    </div>
    <div class="flex flex-row items-start justify-start w-9/12">
        <x-common.forms.label for="decease_reason" class="w-1/12 pt-2 text-right">
            {{ __('Reason') }}
        </x-common.forms.label>
        <x-common.forms.textarea id="decease_reason" class="w-11/12" name="{{ $nam_dreas }}">{{ $val_dreas }}
        </x-common.forms.textarea>
    </div>
</div>
