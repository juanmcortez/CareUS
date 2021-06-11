@props([
'item' => 'user.persona',
'values' => [],
'place' => 'user',
])

@php
$nam_proph = preg_replace( '/'.preg_quote('][', '/').'/', '[', str_replace('.', '][', $item.'.profile_photo').']', 1);

$val_proph = ($values) ? $values->profile_photo : old($item.'.profile_photo');
@endphp

<div {{ $attributes->merge([ 'class' => 'flex flex-row flex-wrap' ]) }}>
    <div class="flex flex-row items-center justify-start w-6/12">
        <x-common.forms.label for="profile_photo" class="w-2/12 text-right">
            {{ __('Profile Photo') }}
        </x-common.forms.label>
        @isset($val_proph)
        <div class="flex flex-row items-center justify-center w-1/12 text-center">
            <span
                class="flex flex-row items-center justify-center w-10 h-10 overflow-hidden text-center border-4 rounded-full border-burntsienna-400">
                <img src="{{ secure_asset($val_proph) }}" />
            </span>
        </div>
        @else
        <i class="w-1/12 mx-2 text-3xl text-center fa fa-user-circle text-burntsienna-400"></i>
        @endisset
        <input id="profile_photo" type="file" class="w-9/12" name="{{ $nam_proph }}" />
    </div>
</div>
