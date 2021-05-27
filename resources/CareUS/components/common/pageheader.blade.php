@props([
'download' => false,
'excel' => false,
'csv' => false,
'formsave' => false,
'formcancel' => false,
])
<div class="flex flex-row items-center w-full pt-10 pb-16">
    <h2 class="w-3/4 text-3xl font-bold text-bdazzledblue-800">{{ $slot }}</h2>
    <div class="flex flex-row items-center justify-end w-1/4">
        @if($formsave)
        <x-common.forms.button icon="save" color="green">
            {{ __('Save') }}
        </x-common.forms.button>
        @endif
        @if($formcancel)
        <x-common.forms.button icon="times-circle" color="red" type="button"
            onclick="window.location='{{ route($formcancel) }}'">
            {{ __('Cancel') }}
        </x-common.forms.button>
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
        <div title="{{ __('Download') }}"
            class="flex items-center justify-center w-10 h-10 ml-4 transition-colors duration-150 ease-in-out rounded-full shadow cursor-pointer bg-bdazzledblue-800 text-bdazzledblue-50 hover:bg-bdazzledblue-50 hover:text-bdazzledblue-800 {{ $download ? '' : 'hidden' }}">
            <i class="text-sm fas fa-file-download"></i>
        </div>
        <div title="{{ __('Excel export') }}"
            class="flex items-center justify-center w-10 h-10 ml-4 transition-colors duration-150 ease-in-out rounded-full shadow cursor-pointer bg-bdazzledblue-800 text-bdazzledblue-50 hover:bg-bdazzledblue-50 hover:text-bdazzledblue-800 {{ $excel ? '' : 'hidden' }}">
            <i class="text-sm fas fa-file-excel"></i>
        </div>
        <div title="{{ __('CSV export') }}"
            class="flex items-center justify-center w-10 h-10 ml-4 transition-colors duration-150 ease-in-out rounded-full shadow cursor-pointer bg-bdazzledblue-800 text-bdazzledblue-50 hover:bg-bdazzledblue-50 hover:text-bdazzledblue-800 {{ $csv ? '' : 'hidden' }}">
            <i class="text-sm fas fa-file-csv"></i>
        </div>
    </div>
</div>
