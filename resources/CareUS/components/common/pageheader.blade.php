@props([
'download' => false,
'excel' => false,
'csv' => false,
'formsave' => false,
'formcancel' => false,
'formedit' => false,
])
<div {{ $attributes->merge([ 'class' => "flex flex-row items-center justify-between w-full" ]) }}>
    <h2 class="flex flex-row items-center justify-start w-6/12 text-3xl font-bold text-bdazzledblue-800">
        {{ $slot }}
    </h2>
    <div class="flex flex-row items-center justify-end w-6/12">

        @if($formedit)
        <x-common.forms.buttonlink href="{{ $formedit }}" icon="edit" color="palecerulean">
            {{ __('Edit') }}
        </x-common.forms.buttonlink>
        @endif

        @if($formsave)
        <x-common.forms.button icon="save" color="green">
            {{ __('Save') }}
        </x-common.forms.button>
        @endif

        @if($formcancel)
        <x-common.forms.buttonlink href="{{ $formcancel }}" icon="times-circle" color="red">
            {{ __('Cancel') }}
        </x-common.forms.buttonlink>
        @endif

        @if(request()->routeIs('patients.list'))
        <a href="{{ route('patients.create') }}" title="{{ __('New Patient') }}"
            class="flex items-center justify-center w-10 h-10 ml-4 transition-colors duration-150 ease-in-out rounded-full shadow cursor-pointer bg-burntsienna-400 text-burntsienna-900 hover:bg-burntsienna-900 hover:text-burntsienna-400">
            <i class="text-sm fas fa-user-plus"></i>
        </a>
        @endif

        <div title="{{ __('Print') }}"
            class="flex items-center justify-center w-10 h-10 ml-4 transition-colors duration-150 ease-in-out rounded-full shadow cursor-pointer bg-bdazzledblue-800 text-bdazzledblue-50 hover:bg-bdazzledblue-50 hover:text-bdazzledblue-800">
            <i class="text-sm fas fa-print"></i>
        </div>

        @if($download)
        <div title="{{ __('Download') }}"
            class="flex items-center justify-center w-10 h-10 ml-4 transition-colors duration-150 ease-in-out rounded-full shadow cursor-pointer bg-bdazzledblue-800 text-bdazzledblue-50 hover:bg-bdazzledblue-50 hover:text-bdazzledblue-800">
            <i class="text-sm fas fa-file-download"></i>
        </div>
        @endif

        @if($excel)
        <div title="{{ __('Excel export') }}"
            class="flex items-center justify-center w-10 h-10 ml-4 transition-colors duration-150 ease-in-out rounded-full shadow cursor-pointer bg-bdazzledblue-800 text-bdazzledblue-50 hover:bg-bdazzledblue-50 hover:text-bdazzledblue-800">
            <i class="text-sm fas fa-file-excel"></i>
        </div>
        @endif

        @if($csv)
        <div title="{{ __('CSV export') }}"
            class="flex items-center justify-center w-10 h-10 ml-4 transition-colors duration-150 ease-in-out rounded-full shadow cursor-pointer bg-bdazzledblue-800 text-bdazzledblue-50 hover:bg-bdazzledblue-50 hover:text-bdazzledblue-800">
            <i class="text-sm fas fa-file-csv"></i>
        </div>
        @endif

    </div>
</div>
