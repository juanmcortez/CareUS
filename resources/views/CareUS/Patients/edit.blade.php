@extends('Layouts.careus-in')

@section('pageTitle', $pageTitle)

@push('styles')
@endpush

@section('submenu')
{{-- <div class="max-w-full md:w-1/4 p-2 md:py-4 text-center text-white bg-blue-800 md:rounded md:rounded-r-none">
    <h2 class="text-sm md:text-xl uppercase font-semibold leading-tight">{{ $pageH2 }}</h2>
</div>
<div class="max-w-full md:w-3/4 p-2 text-left">
</div> --}}
@endsection

@section('content')
<form class="flex flex-row md:flex-col flex-wrap text-sm w-11/12" method="POST"
    action="{{ route('patients.update', ['patient' => $patient->patID]) }}">
    @csrf
    @method('PUT')

    <div class="flex flex-row w-full pt-2 md:pt-4 text-xs md:text-sm">
        <div class="flex flex-row w-auto hover:text-blue-500">
            <a
                class="bg-blue-100 w-full mx-0 md:mx-2 py-3 px-4 rounded-t-md tracking-wider cursor-pointer uppercase font-medium text-center">
                {{ __('Patient') }}
            </a>
        </div>
        <div class="flex flex-row w-auto hover:text-blue-500">
            <a
                class="bg-transparent w-full mx-0 md:mx-2 py-3 px-4 rounded-t-md tracking-wider cursor-pointer uppercase text-center hover:text-gray-700 hover:bg-blue-50">
                {{ __('Contacts') }}
            </a>
        </div>
        <div class="flex flex-row w-auto hover:text-blue-500">
            <a
                class="bg-transparent w-full mx-0 md:mx-2 py-3 px-4 rounded-t-md tracking-wider cursor-pointer uppercase text-center hover:text-gray-700 hover:bg-blue-50">
                {{ __('Employment') }}
            </a>
        </div>
        <div class="flex flex-row w-auto hover:text-blue-500">
            <a
                class="bg-transparent w-full mx-0 md:mx-2 py-3 px-4 rounded-t-md tracking-wider cursor-pointer uppercase text-center hover:text-gray-700 hover:bg-blue-50">
                {{ __('Settings') }}
            </a>
        </div>
        <div class="flex flex-row w-auto hover:text-blue-500">
            <a
                class="bg-transparent w-full mx-0 md:mx-2 py-3 px-4 rounded-t-md tracking-wider cursor-pointer uppercase text-center hover:text-gray-700 hover:bg-blue-50">
                {{ __('Other') }}
            </a>
        </div>
    </div>

    <div class="flex flex-col md:flex-row min-w-full pt-2 md:pt-4 text-xs md:text-sm border-t-2 border-blue-100">
        <div class="flex flex-row w-full md:w-1/4 pb-4">
            <div class="w-3/12 p-2 font-medium tracking-wide text-right">{{ __('Created on') }}</div>
            <div class="w-8/12 py-2 px-0 text-gray-500">
                {{ ucfirst($patient->created_at->translatedFormat('M d, Y - H:i')) }}
            </div>
        </div>
        <div class="flex flex-row w-full md:w-1/4 pb-4">
            <div class="w-3/12 p-2 font-medium tracking-wide text-right">{{ __('Patient ID') }}</div>
            <div class="w-8/12">
                <input type="text" class="w-full p-2 border-b-2 border-blue-400 text-gray-500 focus:outline-none"
                    value="{{ $patient->patID }}" disabled />
            </div>
        </div>
        <div class="flex flex-row w-full md:w-1/4 pb-4">
            <div class="w-3/12 p-2 font-medium tracking-wide text-right">{{ __('External ID') }}</div>
            <div class="w-8/12">
                <input type="text"
                    class="w-full p-2 border-b-2 border-blue-400 bg-blue-100 text-gray-500 focus:outline-none"
                    name="patient[externalID]" value="{{ $patient->externalID }}" />
            </div>
        </div>
        <div class="flex flex-row w-full md:w-1/4 pb-4">
            <div class="w-3/12 p-2 font-medium tracking-wide text-right">{{ __('Accession #') }}</div>
            <div class="w-8/12">
                <input type="text"
                    class="w-full p-2 border-b-2 border-blue-400 bg-blue-100 text-gray-500 focus:outline-none"
                    name="patient[patient_level_accession]" value="{{ $patient->patient_level_accession }}" />
            </div>
        </div>
    </div>

    <hr class="border-blue-100 border-b" />

    <div class="flex flex-col md:flex-row min-w-full pt-2 md:pt-4 text-xs md:text-sm">
        <div class="flex flex-col w-full md:w-1/4 pb-4">
            <div class="flex flex-row w-full pb-4">
                <div class="w-3/12 p-2 font-medium tracking-wide text-right">{{ __('Title') }}</div>
                <div class="w-8/12">
                    <input type="text"
                        class="w-full p-2 border-b-2 border-blue-400 bg-blue-100 text-gray-500 focus:outline-none"
                        name="patient[persona][title]" value="{{ $patient->persona->title }}" />
                </div>
            </div>
            <div class="flex flex-row w-full pb-4">
                <div class="w-3/12 p-2 font-medium tracking-wide text-right">{{ __('Name') }}</div>
                <div class="w-8/12">
                    <input type="text"
                        class="w-full p-2 border-b-2 border-blue-400 bg-blue-100 text-gray-500 focus:outline-none"
                        name="patient[persona][last_name]" value="{{ $patient->persona->last_name }}" />
                </div>
            </div>
            <div class="flex flex-row w-full pb-4">
                <div class="w-3/12 p-2 font-medium tracking-wide text-right">&nbsp;</div>
                <div class="w-8/12">
                    <input type="text"
                        class="w-full p-2 border-b-2 border-blue-400 bg-blue-100 text-gray-500 focus:outline-none"
                        name="patient[persona][first_name]" value="{{ $patient->persona->first_name }}" />
                </div>
            </div>
            <div class="flex flex-row w-full pb-4">
                <div class="w-3/12 p-2 font-medium tracking-wide text-right">&nbsp;</div>
                <div class="w-8/12">
                    <input type="text"
                        class="w-full p-2 border-b-2 border-blue-400 bg-blue-100 text-gray-500 focus:outline-none"
                        name="patient[persona][middle_name]" value="{{ $patient->persona->middle_name }}" />
                </div>
            </div>
        </div>

        <div class="flex flex-col w-full md:w-1/4 pb-4">
            <div class="flex flex-row w-full pb-4">
                <div class="w-3/12 p-2 font-medium tracking-wide text-right">{{ __('Address') }}</div>
                <div class="w-8/12">
                    <input type="text"
                        class="w-full p-2 border-b-2 border-blue-400 bg-blue-100 text-gray-500 focus:outline-none"
                        name="patient[persona][address][street]" value="{{ $patient->persona->address->street }}" />
                </div>
            </div>
            <div class="flex flex-row w-full pb-4">
                <div class="w-3/12 p-2 font-medium tracking-wide text-right">&nbsp;</div>
                <div class="w-8/12">
                    <input type="text"
                        class="w-full p-2 border-b-2 border-blue-400 bg-blue-100 text-gray-500 focus:outline-none"
                        name="patient[persona][address][street_extended]"
                        value="{{ $patient->persona->address->street_extended }}" />
                </div>
            </div>
            <div class="flex flex-row w-full pb-4">
                <div class="w-3/12 p-2 font-medium tracking-wide text-right">&nbsp;</div>
                <div class="w-8/12">
                    <input type="text"
                        class="w-full p-2 border-b-2 border-blue-400 bg-blue-100 text-gray-500 focus:outline-none"
                        name="patient[persona][address][city]" value="{{ $patient->persona->address->city }}" />
                </div>
            </div>
            <div class="flex flex-row w-full pb-4">
                <div class="w-3/12 p-2 font-medium tracking-wide text-right">&nbsp;</div>
                <div class="w-4/12">
                    <input type="text"
                        class="w-full p-2 border-b-2 border-blue-400 bg-blue-100 text-gray-500 focus:outline-none"
                        name="patient[persona][address][state]" value="{{ $patient->persona->address->state }}" />
                </div>
                <div class="w-3/12 ml-8">
                    <input type="text"
                        class="w-full p-2 border-b-2 border-blue-400 bg-blue-100 text-gray-500 focus:outline-none"
                        name="patient[persona][address][zip]" value="{{ $patient->persona->address->zip }}" />
                </div>
            </div>
            <div class="flex flex-row w-full pb-0">
                <div class="w-3/12 p-2 font-medium tracking-wide text-right">&nbsp;</div>
                <div class="w-8/12">
                    <input type="text"
                        class="w-full p-2 border-b-2 border-blue-400 bg-blue-100 text-gray-500 focus:outline-none"
                        name="patient[persona][address][country]" value="{{ $patient->persona->address->country }}" />
                </div>
            </div>
        </div>

        @foreach ($patient->persona->phone as $idx => $phone)
        <div class="flex flex-col w-full md:w-1/4 pb-4">
            <div class="flex flex-row w-full pb-4">
                <div class="w-3/12 p-2 font-medium tracking-wide text-right">{{ __('Phone') }}</div>
                <div class="w-8/12">
                    <input type="text"
                        class="w-full p-2 border-b-2 border-blue-400 bg-blue-100 text-gray-500 focus:outline-none"
                        name="patient[persona][phone][{{ $idx }}][type]" value="{{ $phone->type }}" />
                </div>
            </div>
            <div class="flex flex-row w-full pb-4 text-center">
                <div class="w-1/12 pt-2">+</div>
                <div class="w-1/12">
                    <input type="text"
                        class="w-full text-center p-2 border-b-2 border-blue-400 bg-blue-100 text-gray-500 focus:outline-none"
                        name="patient[persona][phone][{{ $idx }}][international_code]"
                        value="{{ $phone->international_code }}" />
                </div>
                <div class="w-1/12 pt-2">(</div>
                <div class="w-2/12">
                    <input type="text"
                        class="w-full text-center p-2 border-b-2 border-blue-400 bg-blue-100 text-gray-500 focus:outline-none"
                        name="patient[persona][phone][{{ $idx }}][area_code]" value="{{ $phone->area_code }}" />
                </div>
                <div class="w-1/12 pt-2">)</div>
                <div class="w-2/12">
                    <input type="text"
                        class="w-full text-center p-2 border-b-2 border-blue-400 bg-blue-100 text-gray-500 focus:outline-none"
                        name="patient[persona][phone][{{ $idx }}][initial_digits]"
                        value="{{ $phone->initial_digits }}" />
                </div>
                <div class="w-1/12 pt-2">-</div>
                <div class="w-2/12">
                    <input type="text"
                        class="w-full text-center p-2 border-b-2 border-blue-400 bg-blue-100 text-gray-500 focus:outline-none"
                        name="patient[persona][phone][{{ $idx }}][last_digits]" value="{{ $phone->last_digits }}" />
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <hr class="border-blue-100 border-b" />

    <div class="flex flex-col md:flex-row min-w-full pt-2 md:pt-4 text-xs md:text-sm">
        <div class="flex flex-row w-full">
            <div class="w-9/12">&nbsp;</div>
            <div class="w-2/12 flex justify-center">
                <button type="submit"
                    class="bg-green-500 hover:bg-green-700 text-white uppercase text-xs font-medium py-2 px-3 rounded leading-normal">
                    <svg class="w-4 h-4 mr-1 inline" aria-hidden="true" focusable="false" data-prefix="fas"
                        data-icon="save" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                        <path fill="currentColor"
                            d="M433.941 129.941l-83.882-83.882A48 48 0 0 0 316.118 32H48C21.49 32 0 53.49 0 80v352c0 26.51 21.49 48 48 48h352c26.51 0 48-21.49 48-48V163.882a48 48 0 0 0-14.059-33.941zM224 416c-35.346 0-64-28.654-64-64 0-35.346 28.654-64 64-64s64 28.654 64 64c0 35.346-28.654 64-64 64zm96-304.52V212c0 6.627-5.373 12-12 12H76c-6.627 0-12-5.373-12-12V108c0-6.627 5.373-12 12-12h228.52c3.183 0 6.235 1.264 8.485 3.515l3.48 3.48A11.996 11.996 0 0 1 320 111.48z"
                            class=""></path>
                    </svg>
                    <span class="inline leading-loose align-middle">{{ __('Update') }}</span>
                </button>
            </div>
            <div class="w-1/12 flex">
                <a href="{{ route('patients.show', ['patient' => $patient->patID]) }}"
                    class="bg-red-500 hover:bg-red-700 text-white uppercase text-xs font-medium ml-2 py-2 px-3 rounded leading-normal">
                    <svg class="w-4 h-4 mr-1 inline" aria-hidden="true" focusable="false" data-prefix="fas"
                        data-icon="times-circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                        <path fill="currentColor"
                            d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm121.6 313.1c4.7 4.7 4.7 12.3 0 17L338 377.6c-4.7 4.7-12.3 4.7-17 0L256 312l-65.1 65.6c-4.7 4.7-12.3 4.7-17 0L134.4 338c-4.7-4.7-4.7-12.3 0-17l65.6-65-65.6-65.1c-4.7-4.7-4.7-12.3 0-17l39.6-39.6c4.7-4.7 12.3-4.7 17 0l65 65.7 65.1-65.6c4.7-4.7 12.3-4.7 17 0l39.6 39.6c4.7 4.7 4.7 12.3 0 17L312 256l65.6 65.1z"
                            class=""></path>
                    </svg>
                    <span class="inline leading-loose align-middle">{{ __('Cancel') }}</span>
                </a>
            </div>
        </div>
    </div>

</form>
@endsection

@push('scripts')
@endpush
