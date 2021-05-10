@extends('Layouts.careus-in')

@section('pageTitle', $pageTitle)

@push('styles')
@endpush

@section('submenu')
<h2 class="text-sm font-bold uppercase md:text-xl">{{ $pageH2 }}</h2>
@endsection

@section('content')
<form class="w-full text-center" method="POST" action="{{ route('patients.update', ['patient' => $patient->patID]) }}">
    @csrf
    @method('PUT')

    <div class="flex flex-row items-center w-full pb-4 text-sm leading-relaxed">
        <div class="flex w-3/12">
            <div class="w-4/12 pr-2 font-bold text-right">{{ __('Created on') }}</div>
            <div class="w-8/12 text-left">
                {{ $patient->created_at_language }}
            </div>
        </div>
        <div class="flex flex-row w-7/12">&nbsp;</div>
        <div class="flex w-2/12 text-sm">
            <button type="submit"
                class="w-1/2 py-2 ml-2 font-bold text-white uppercase transition duration-200 ease-in-out bg-green-500 rounded hover:bg-green-700">
                <i class="fas fa-save"></i>
                {{ __('Update') }}
            </button>
            <a href="{{ route('patients.show', ['patient' => $patient->patID]) }}"
                class="w-1/2 py-2 ml-2 font-bold text-white uppercase transition duration-200 ease-in-out bg-red-500 rounded hover:bg-red-700">
                <i class="fas fa-times-circle"></i>
                {{ __('Cancel') }}
            </a>
        </div>
    </div>

    <!-- ID's -->
    <div class="flex flex-row items-center w-full pb-8 mb-8 text-sm leading-relaxed border-b-2 border-palecerulean-300">
        <div class="w-1/12 pr-2 font-bold text-right">{{ __('Patient ID') }}</div>
        <div class="w-2/12 text-left">
            <input type="text" name="patient[patID]" value="{{ $patient->patID }}" disabled
                class="w-full pb-1 text-sm leading-loose tracking-wider text-center transition duration-200 ease-in-out bg-transparent border-0 border-b-2 border-none select-none rounded-t-md text-gunmetal-400 placeholder-gunmetal-500 placeholder-opacity-30 tabular-nums" />
        </div>
        <div class="w-1/12 pr-2 font-bold text-right">{{ __('External ID') }}</div>
        <div class="relative w-2/12 text-left">
            <input type="text" name="patient[externalID]" value="{{ $patient->externalID }}"
                class="w-full pb-1 text-sm leading-loose tracking-wider text-center transition duration-200 ease-in-out border-0 border-b-2 rounded-t-md text-gunmetal-400 focus:text-gunmetal-700 focus:bg-lightcyan-50 placeholder-gunmetal-500 placeholder-opacity-30 tabular-nums @error('patient.externalID') border-red-700 bg-red-100 @else border-burntsienna-300 bg-lightcyan-300 @enderror" />
            @error('patient.externalID')
            <span class="absolute z-10 leading-none text-red-600 left-1 -bottom-3 text-xxs">{!! __($message) !!}</span>
            @enderror
        </div>
        <div class="flex flex-row w-6/12">&nbsp;</div>
    </div>

    <!-- NAME -->
    <div class="flex flex-row items-center w-full pb-8 mb-8 text-sm leading-relaxed border-b-2 border-palecerulean-300">
        <div class="w-1/12 pr-2 font-bold text-right">{{ __('Title') }}</div>
        <div class="relative w-2/12 text-left">
            <select name="patient[persona][title]"
                class="w-full pb-1 text-sm leading-loose tracking-wider transition duration-200 ease-in-out border-0 border-b-2 rounded-t-md text-gunmetal-400 focus:text-gunmetal-700 focus:bg-lightcyan-50 placeholder-gunmetal-500 placeholder-opacity-30 tabular-nums @error('patient.persona.title') border-red-700 bg-red-100 @else border-burntsienna-300 bg-lightcyan-300 @enderror">
                @foreach ($items['titles'] as $title)
                @if($title->list_item_value == $patient->persona->title)
                <option value="{{ $title->list_item_value }}" selected>
                    {{ __($title->list_item_title) }}
                </option>
                @else
                <option value="{{ $title->list_item_value }}">
                    {{ __($title->list_item_title) }}
                </option>
                @endif
                @endforeach
            </select>
            @error('patient.persona.title')
            <span class="absolute z-10 leading-none text-red-600 left-1 -bottom-3 text-xxs">{!! __($message) !!}</span>
            @enderror
        </div>
        <div class="w-1/12 pr-2 font-bold text-right">{{ __('Last name') }}</div>
        <div class="relative w-2/12 text-left">
            <input type="text" name="patient[persona][last_name]" value="{{ $patient->persona->last_name }}"
                class="w-full pb-1 text-sm leading-loose tracking-wider transition duration-200 ease-in-out border-0 border-b-2 rounded-t-md text-gunmetal-400 focus:text-gunmetal-700 focus:bg-lightcyan-50 placeholder-gunmetal-500 placeholder-opacity-30 tabular-nums @error('patient.persona.last_name') border-red-700 bg-red-100 @else border-burntsienna-300 bg-lightcyan-300 @enderror" />
            @error('patient.persona.last_name')
            <span class="absolute z-10 leading-none text-red-600 left-1 -bottom-3 text-xxs">{!! __($message) !!}</span>
            @enderror
        </div>
        <div class="w-1/12 pr-2 font-bold text-right">{{ __('First name') }}</div>
        <div class="relative w-2/12 text-left">
            <input type="text" name="patient[persona][first_name]" value="{{ $patient->persona->first_name }}"
                class="w-full pb-1 text-sm leading-loose tracking-wider transition duration-200 ease-in-out border-0 border-b-2 rounded-t-md text-gunmetal-400 focus:text-gunmetal-700 focus:bg-lightcyan-50 placeholder-gunmetal-500 placeholder-opacity-30 tabular-nums @error('patient.persona.first_name') border-red-700 bg-red-100 @else border-burntsienna-300 bg-lightcyan-300 @enderror" />
            @error('patient.persona.first_name')
            <span class="absolute z-10 leading-none text-red-600 left-1 -bottom-3 text-xxs">{!! __($message) !!}</span>
            @enderror
        </div>
        <div class="w-1/12 pr-2 font-bold text-right">{{ __('Middle name') }}</div>
        <div class="relative w-2/12 text-left">
            <input type="text" name="patient[persona][middle_name]" value="{{ $patient->persona->middle_name }}"
                class="w-full pb-1 text-sm leading-loose tracking-wider transition duration-200 ease-in-out border-0 border-b-2 rounded-t-md text-gunmetal-400 focus:text-gunmetal-700 focus:bg-lightcyan-50 placeholder-gunmetal-500 placeholder-opacity-30 tabular-nums @error('patient.persona.middle_name') border-red-700 bg-red-100 @else border-burntsienna-300 bg-lightcyan-300 @enderror" />
            @error('patient.persona.middle_name')
            <span class="absolute z-10 leading-none text-red-600 left-1 -bottom-3 text-xxs">{!! __($message) !!}</span>
            @enderror
        </div>
    </div>

    <!-- PHONES -->
    @foreach ($patient->persona->phone as $idx => $phone)
    <div class="flex flex-row items-center w-full pb-4 text-sm leading-relaxed">
        <div class="w-1/12 pr-2 font-bold text-right">{{ __('Phone #:index', ['index' => $idx+1]) }}</div>
        <div class="relative w-2/12 text-left">
            <select name="patient[persona][phone][{{ $idx }}][type]"
                class="w-full pb-1 text-sm leading-loose tracking-wider transition duration-200 ease-in-out border-0 border-b-2 rounded-t-md text-gunmetal-400 focus:text-gunmetal-700 focus:bg-lightcyan-50 placeholder-gunmetal-500 placeholder-opacity-30 tabular-nums @error('patient.persona.phone.'.$idx.'.type') border-red-700 bg-red-100 @else border-burntsienna-300 bg-lightcyan-300 @enderror">
                @foreach ($items['phonetypes'] as $phonetype)
                @if($phonetype->list_item_value == $phone->type)
                <option value="{{ $phonetype->list_item_value }}" selected>
                    {{ __($phonetype->list_item_title) }}
                </option>
                @else
                <option value="{{ $title->list_item_value }}">
                    {{ __($phonetype->list_item_title) }}
                </option>
                @endif
                @endforeach
            </select>
            @error('patient.persona.phone.'.$idx.'.type')
            <span class="absolute z-10 leading-none text-red-600 left-1 -bottom-3 text-xxs">{!! __($message) !!}</span>
            @enderror
        </div>
        <div class="flex flex-row items-center w-3/12">
            <div class="w-1/12 font-bold">+</div>
            <div class="w-2/12">
                <input type="text" name="patient[persona][phone][{{ $idx }}][international_code]"
                    value="{{ $phone->international_code }}"
                    class="w-full pb-1 text-sm leading-loose tracking-wider text-center transition duration-200 ease-in-out border-0 border-b-2 rounded-t-md text-gunmetal-400 focus:text-gunmetal-700 focus:bg-lightcyan-50 placeholder-gunmetal-500 placeholder-opacity-30 tabular-nums @error('patient.persona.phone.'.$idx.'.international_code') border-red-700 bg-red-100 @else border-burntsienna-300 bg-lightcyan-300 @enderror" />
            </div>
            <div class="w-1/12 font-bold">(</div>
            <div class="w-2/12">
                <input type="text" name="patient[persona][phone][{{ $idx }}][area_code]" value="{{ $phone->area_code }}"
                    class="w-full pb-1 text-sm leading-loose tracking-wider text-center transition duration-200 ease-in-out border-0 border-b-2 rounded-t-md text-gunmetal-400 focus:text-gunmetal-700 focus:bg-lightcyan-50 placeholder-gunmetal-500 placeholder-opacity-30 tabular-nums @error('patient.persona.phone.'.$idx.'.area_code') border-red-700 bg-red-100 @else border-burntsienna-300 bg-lightcyan-300 @enderror" />
            </div>
            <div class="w-1/12 font-bold">)</div>
            <div class="w-2/12">
                <input type="text" name="patient[persona][phone][{{ $idx }}][initial_digits]"
                    value="{{ $phone->initial_digits }}"
                    class="w-full pb-1 text-sm leading-loose tracking-wider text-center transition duration-200 ease-in-out border-0 border-b-2 rounded-t-md text-gunmetal-400 focus:text-gunmetal-700 focus:bg-lightcyan-50 placeholder-gunmetal-500 placeholder-opacity-30 tabular-nums @error('patient.persona.phone.'.$idx.'.initial_digits') border-red-700 bg-red-100 @else border-burntsienna-300 bg-lightcyan-300 @enderror" />
            </div>
            <div class="w-1/12 font-bold">-</div>
            <div class="w-2/12">
                <input type="text" name="patient[persona][phone][{{ $idx }}][last_digits]"
                    value="{{ $phone->last_digits }}"
                    class="w-full pb-1 text-sm leading-loose tracking-wider text-center transition duration-200 ease-in-out border-0 border-b-2 rounded-t-md text-gunmetal-400 focus:text-gunmetal-700 focus:bg-lightcyan-50 placeholder-gunmetal-500 placeholder-opacity-30 tabular-nums @error('patient.persona.phone.'.$idx.'.last_digits') border-red-700 bg-red-100 @else border-burntsienna-300 bg-lightcyan-300 @enderror" />
            </div>
        </div>
        <div class="relative flex flex-row w-6/12 h-10">
            @error('patient.persona.phone.'.$idx.'.international_code')
            <span class="absolute top-0 z-10 leading-none text-red-600 left-1 text-xxs">{!! __($message) !!}</span>
            @enderror
            @error('patient.persona.phone.'.$idx.'.area_code')
            <span class="absolute z-10 leading-none text-red-600 left-1 top-3 text-xxs">{!! __($message) !!}</span>
            @enderror
            @error('patient.persona.phone.'.$idx.'.initial_digits')
            <span class="absolute z-10 leading-none text-red-600 left-1 top-6 text-xxs">{!! __($message) !!}</span>
            @enderror
            @error('patient.persona.phone.'.$idx.'.last_digits')
            <span class="absolute z-10 leading-none text-red-600 left-1 top-9 text-xxs">{!! __($message) !!}</span>
            @enderror
        </div>
    </div>
    @endforeach

    <!-- EMAIL -->
    <div class="flex flex-row items-center w-full pt-4 pb-8 text-sm leading-relaxed">
        <div class="w-1/12 pr-2 font-bold text-right">{{ __('E-mail') }}</div>
        <div class="relative w-2/12 text-left">
            <input type="text" name="patient[persona][email]" value="{{ $patient->persona->email }}"
                class="w-full pb-1 text-sm leading-loose tracking-wider transition duration-200 ease-in-out border-0 border-b-2 rounded-t-md text-gunmetal-400 focus:text-gunmetal-700 focus:bg-lightcyan-50 placeholder-gunmetal-500 placeholder-opacity-30 tabular-nums @error('patient.persona.email') border-red-700 bg-red-100 @else border-burntsienna-300 bg-lightcyan-300 @enderror" />
            @error('patient.persona.email')
            <span class="absolute z-10 leading-none text-red-600 left-1 -bottom-3 text-xxs">{!! __($message) !!}</span>
            @enderror
        </div>
    </div>

    <!-- ADDRESS -->
    <div class="flex flex-row items-center w-full pb-4 text-sm leading-relaxed">
        <div class="w-1/12 pr-2 font-bold text-right">{{ __('Address') }}</div>
        <div class="relative flex flex-row w-5/12 text-left">
            <input type="text" name="patient[persona][address][street]" value="{{ $patient->persona->address->street }}"
                class="w-full pb-1 text-sm leading-loose tracking-wider transition duration-200 ease-in-out border-0 border-b-2 rounded-t-md text-gunmetal-400 focus:text-gunmetal-700 focus:bg-lightcyan-50 placeholder-gunmetal-500 placeholder-opacity-30 tabular-nums @error('patient.persona.address.street') border-red-700 bg-red-100 @else border-burntsienna-300 bg-lightcyan-300 @enderror" />
            @error('patient.persona.address.street')
            <span class="absolute z-10 leading-none text-red-600 left-1 -bottom-3 text-xxs">{!! __($message) !!}</span>
            @enderror
            <input type="text" name="patient[persona][address][street_extended]"
                value="{{ $patient->persona->address->street_extended }}"
                class="w-full pb-1 ml-4 text-sm leading-loose tracking-wider transition duration-200 ease-in-out border-0 border-b-2 rounded-t-md text-gunmetal-400 focus:text-gunmetal-700 focus:bg-lightcyan-50 placeholder-gunmetal-500 placeholder-opacity-30 tabular-nums @error('patient.persona.address.street_extended') border-red-700 bg-red-100 @else border-burntsienna-300 bg-lightcyan-300 @enderror" />
            @error('patient.persona.address.street_extended')
            <span class="absolute z-10 pl-3 leading-none text-red-600 left-1/2 -bottom-3 text-xxs">
                {!! __($message) !!}
            </span>
            @enderror
        </div>
        <div class="w-1/12 pr-2 font-bold text-right">{{ __('City') }}</div>
        <div class="relative w-2/12 text-left">
            <input type="text" name="patient[persona][address][city]" value="{{ $patient->persona->address->city }}"
                class="w-full pb-1 text-sm leading-loose tracking-wider transition duration-200 ease-in-out border-0 border-b-2 rounded-t-md text-gunmetal-400 focus:text-gunmetal-700 focus:bg-lightcyan-50 placeholder-gunmetal-500 placeholder-opacity-30 tabular-nums @error('patient.persona.address.city') border-red-700 bg-red-100 @else border-burntsienna-300 bg-lightcyan-300 @enderror" />
            @error('patient.persona.address.city')
            <span class="absolute z-10 leading-none text-red-600 left-1 -bottom-3 text-xxs">{!! __($message) !!}</span>
            @enderror
        </div>
        <div class="flex flex-row w-3/12">&nbsp;</div>
    </div>

    <!-- ADDRESS -->
    <div class="flex flex-row items-center w-full pb-8 mb-8 text-sm leading-relaxed border-b-2 border-palecerulean-300">
        <div class="w-1/12 pr-2 font-bold text-right">{{ __('State') }}</div>
        <div class="relative w-2/12 text-left">
            <select name="patient[persona][address][state]"
                class="w-full pb-1 text-sm leading-loose tracking-wider transition duration-200 ease-in-out border-0 border-b-2 rounded-t-md text-gunmetal-400 focus:text-gunmetal-700 focus:bg-lightcyan-50 placeholder-gunmetal-500 placeholder-opacity-30 tabular-nums @error('patient.persona.address.state') border-red-700 bg-red-100 @else border-burntsienna-300 bg-lightcyan-300 @enderror">
                @foreach ($items['states'] as $state)
                @if($state->list_item_value == $patient->persona->address->state)
                <option value="{{ $state->list_item_value }}" selected>
                    {{ __($state->list_item_title) }}
                </option>
                @else
                <option value="{{ $state->list_item_value }}">
                    {{ __($state->list_item_title) }}
                </option>
                @endif
                @endforeach
            </select>
            @error('patient.persona.address.state')
            <span class="absolute z-10 leading-none text-red-600 left-1 -bottom-3 text-xxs">{!! __($message) !!}</span>
            @enderror
        </div>
        <div class="w-1/12 pr-2 font-bold text-right">{{ __('Zip') }}</div>
        <div class="relative w-2/12 text-left">
            <input type="text" name="patient[persona][address][zip]" value="{{ $patient->persona->address->zip }}"
                class="w-full pb-1 text-sm leading-loose tracking-wider transition duration-200 ease-in-out border-0 border-b-2 rounded-t-md text-gunmetal-400 focus:text-gunmetal-700 focus:bg-lightcyan-50 placeholder-gunmetal-500 placeholder-opacity-30 tabular-nums @error('patient.persona.address.zip') border-red-700 bg-red-100 @else border-burntsienna-300 bg-lightcyan-300 @enderror" />
        </div>
        <div class="w-1/12 pr-2 font-bold text-right">{{ __('Country') }}</div>
        <div class="relative w-2/12 text-left">
            <select name="patient[persona][address][country]"
                class="w-full pb-1 text-sm leading-loose tracking-wider transition duration-200 ease-in-out border-0 border-b-2 rounded-t-md text-gunmetal-400 focus:text-gunmetal-700 focus:bg-lightcyan-50 placeholder-gunmetal-500 placeholder-opacity-30 tabular-nums @error('patient.persona.address.country') border-red-700 bg-red-100 @else border-burntsienna-300 bg-lightcyan-300 @enderror">
                @foreach ($items['countries'] as $country)
                @if($country->list_item_value == $patient->persona->address->country)
                <option value="{{ $country->list_item_value }}" selected>
                    {{ __($country->list_item_title) }}
                </option>
                @else
                <option value="{{ $country->list_item_value }}">
                    {{ __($country->list_item_title) }}
                </option>
                @endif
                @endforeach
            </select>
            @error('patient.persona.address.country')
            <span class="absolute z-10 leading-none text-red-600 left-1 -bottom-3 text-xxs">{!! __($message) !!}</span>
            @enderror
        </div>
        <div class="flex flex-row w-3/12">&nbsp;</div>
    </div>

    <!-- GENDER -->
    <div class="flex flex-row items-center w-full pb-4 text-sm leading-relaxed">
        <div class="w-1/12 pr-2 font-bold text-right ">{{ __('Gender') }}</div>
        <div class="relative w-2/12 text-left">
            <select name="patient[persona][gender]"
                class="w-full pb-1 text-sm leading-loose tracking-wider transition duration-200 ease-in-out border-0 border-b-2 rounded-t-md text-gunmetal-400 focus:text-gunmetal-700 focus:bg-lightcyan-50 placeholder-gunmetal-500 placeholder-opacity-30 tabular-nums @error('patient.persona.gender') border-red-700 bg-red-100 @else border-burntsienna-300 bg-lightcyan-300 @enderror">
                @foreach ($items['genders'] as $gender)
                @if($gender->list_item_value == $patient->persona->gender)
                <option value="{{ $gender->list_item_value }}" selected>
                    {{ __($gender->list_item_title) }}
                </option>
                @else
                <option value="{{ $gender->list_item_value }}">
                    {{ __($gender->list_item_title) }}
                </option>
                @endif
                @endforeach
            </select>
            @error('patient.persona.gender')
            <span class="absolute z-10 leading-none text-red-600 left-1 -bottom-3 text-xxs">{!! __($message) !!}</span>
            @enderror
        </div>
        <div class="w-1/12 pr-2 font-bold text-right">{{ __('Birthday') }}</div>
        <div class="flex flex-row items-center w-2/12 text-left">
            <div class="w-3/12">
                <input type="text" name="patient[persona][date_of_birth][month]"
                    value="{{ $patient->persona->date_of_birth->format('m') }}"
                    class="w-full pb-1 text-sm leading-loose tracking-wider text-center transition duration-200 ease-in-out border-0 border-b-2 rounded-t-md text-gunmetal-400 focus:text-gunmetal-700 focus:bg-lightcyan-50 placeholder-gunmetal-500 placeholder-opacity-30 tabular-nums @error('patient.persona.date_of_birth.month') border-red-700 bg-red-100 @else border-burntsienna-300 bg-lightcyan-300 @enderror"
                    placeholder="MM" />
            </div>
            <div class="w-1/12 text-center">/</div>
            <div class="w-3/12">
                <input type="text" name="patient[persona][date_of_birth][day]"
                    value="{{ $patient->persona->date_of_birth->format('d') }}"
                    class="w-full pb-1 text-sm leading-loose tracking-wider text-center transition duration-200 ease-in-out border-0 border-b-2 rounded-t-md text-gunmetal-400 focus:text-gunmetal-700 focus:bg-lightcyan-50 placeholder-gunmetal-500 placeholder-opacity-30 tabular-nums @error('patient.persona.date_of_birth.day') border-red-700 bg-red-100 @else border-burntsienna-300 bg-lightcyan-300 @enderror"
                    placeholder="DD" />
            </div>
            <div class="w-1/12 text-center">/</div>
            <div class="w-4/12">
                <input type="text" name="patient[persona][date_of_birth][year]"
                    value="{{ $patient->persona->date_of_birth->format('Y') }}"
                    class="w-full pb-1 text-sm leading-loose tracking-wider text-center transition duration-200 ease-in-out border-0 border-b-2 rounded-t-md text-gunmetal-400 focus:text-gunmetal-700 focus:bg-lightcyan-50 placeholder-gunmetal-500 placeholder-opacity-30 tabular-nums @error('patient.persona.date_of_birth.year') border-red-700 bg-red-100 @else border-burntsienna-300 bg-lightcyan-300 @enderror"
                    placeholder="YYYY" />
            </div>
        </div>
        <div class="relative flex flex-row w-6/12 h-10">
            @error('patient.persona.date_of_birth.month')
            <span class="absolute z-10 leading-none text-red-600 top-1 left-1 text-xxs">{!! __($message)
                !!}</span>
            @enderror
            @error('patient.persona.date_of_birth.day')
            <span class="absolute z-10 leading-none text-red-600 top-4 left-1 text-xxs">{!! __($message)
                !!}</span>
            @enderror
            @error('patient.persona.date_of_birth.year')
            <span class="absolute z-10 leading-none text-red-600 top-7 left-1 text-xxs">{!! __($message)
                !!}</span>
            @enderror
        </div>
    </div>

    <!-- ACCESSION -->
    <div class="flex flex-row items-center w-full pb-8 mb-8 text-sm leading-relaxed border-b-2 border-palecerulean-300">
        <div class="w-1/12 pr-2 font-bold text-right">{{ __('Accession #') }}</div>
        <div class="relative w-2/12 text-left">
            <input type="text" name="patient[patient_level_accession]" value="{{ $patient->patient_level_accession }}"
                class="w-full pb-1 text-sm leading-loose tracking-wider transition duration-200 ease-in-out border-0 border-b-2 rounded-t-md text-gunmetal-400 focus:text-gunmetal-700 focus:bg-lightcyan-50 placeholder-gunmetal-500 placeholder-opacity-30 tabular-nums @error('patient.patient_level_accession') border-red-700 bg-red-100 @else border-burntsienna-300 bg-lightcyan-300 @enderror" />
            @error('patient.patient_level_accession')
            <span class="absolute z-10 leading-none text-red-600 left-1 -bottom-3 text-xxs">{!! __($message) !!}</span>
            @enderror
        </div>
        <div class="w-1/12 pr-2 font-bold text-right">{{ __('Social Security') }}</div>
        <div class="relative w-2/12 text-left">
            <input type="text" name="patient[persona][social_security]" value="{{ $patient->persona->social_security }}"
                class="w-full pb-1 text-sm leading-loose tracking-wider transition duration-200 ease-in-out border-0 border-b-2 rounded-t-md text-gunmetal-400 focus:text-gunmetal-700 focus:bg-lightcyan-50 placeholder-gunmetal-500 placeholder-opacity-30 tabular-nums @error('patient.persona.social_security') border-red-700 bg-red-100 @else border-burntsienna-300 bg-lightcyan-300 @enderror" />
            @error('patient.persona.social_security')
            <span class="absolute z-10 leading-none text-red-600 left-1 -bottom-3 text-xxs">{!! __($message) !!}</span>
            @enderror
        </div>
        <div class="w-1/12 pr-2 font-bold text-right">{{ __('Driver License') }}</div>
        <div class="relative w-2/12 text-left">
            <input type="text" name="patient[persona][driver_license]" value="{{ $patient->persona->driver_license }}"
                class="w-full pb-1 text-sm leading-loose tracking-wider transition duration-200 ease-in-out border-0 border-b-2 rounded-t-md text-gunmetal-400 focus:text-gunmetal-700 focus:bg-lightcyan-50 placeholder-gunmetal-500 placeholder-opacity-30 tabular-nums @error('patient.persona.social_security') border-red-700 bg-red-100 @else border-burntsienna-300 bg-lightcyan-300 @enderror" />
            @error('patient.persona.driver_license')
            <span class="absolute z-10 leading-none text-red-600 left-1 -bottom-3 text-xxs">{!! __($message) !!}</span>
            @enderror
        </div>
        <div class="flex flex-row w-3/12">&nbsp;</div>
    </div>

    <!-- MARITAL -->
    <div class="flex flex-row items-center w-full pb-8 mb-8 text-sm leading-relaxed border-b-2 border-palecerulean-300">
        <div class="w-1/12 pr-2 font-bold text-right">{{ __('Family Size') }}</div>
        <div class="relative w-2/12 text-left">
            <input type="text" name="patient[persona][family_size]" value="{{ $patient->persona->family_size }}"
                class="w-full pb-1 text-sm leading-loose tracking-wider transition duration-200 ease-in-out border-0 border-b-2 rounded-t-md text-gunmetal-400 focus:text-gunmetal-700 focus:bg-lightcyan-50 placeholder-gunmetal-500 placeholder-opacity-30 tabular-nums @error('patient.persona.family_size') border-red-700 bg-red-100 @else border-burntsienna-300 bg-lightcyan-300 @enderror" />
            @error('patient.persona.family_size')
            <span class="absolute z-10 leading-none text-red-600 left-1 -bottom-3 text-xxs">{!! __($message) !!}</span>
            @enderror
        </div>
        <div class="w-1/12 pr-2 font-bold text-right">{{ __('Marital Status') }}</div>
        <div class="relative w-2/12 text-left">
            <select name="patient[persona][marital]"
                class="w-full pb-1 text-sm leading-loose tracking-wider transition duration-200 ease-in-out border-0 border-b-2 rounded-t-md text-gunmetal-400 focus:text-gunmetal-700 focus:bg-lightcyan-50 placeholder-gunmetal-500 placeholder-opacity-30 tabular-nums @error('patient.persona.marital') border-red-700 bg-red-100 @else border-burntsienna-300 bg-lightcyan-300 @enderror">
                @foreach ($items['maritals'] as $marital)
                @if($marital->list_item_value == $patient->persona->marital)
                <option value="{{ $marital->list_item_value }}" selected>
                    {{ __($marital->list_item_title) }}
                </option>
                @else
                <option value="{{ $marital->list_item_value }}">
                    {{ __($marital->list_item_title) }}
                </option>
                @endif
                @endforeach
            </select>
            @error('patient.persona.marital')
            <span class="absolute z-10 leading-none text-red-600 left-1 -bottom-3 text-xxs">{!! __($message) !!}</span>
            @enderror
        </div>
        <div class="w-1/12 pr-2 font-bold text-right">{{ __('Marital Details') }}</div>
        <div class="relative w-5/12 text-left">
            <input type="text" name="patient[persona][marital_details]" value="{{ $patient->persona->marital_details }}"
                class="w-full pb-1 text-sm leading-loose tracking-wider transition duration-200 ease-in-out border-0 border-b-2 rounded-t-md text-gunmetal-400 focus:text-gunmetal-700 focus:bg-lightcyan-50 placeholder-gunmetal-500 placeholder-opacity-30 tabular-nums @error('patient.persona.marital_details') border-red-700 bg-red-100 @else border-burntsienna-300 bg-lightcyan-300 @enderror" />
            @error('patient.persona.marital_details')
            <span class="absolute z-10 leading-none text-red-600 left-1 -bottom-3 text-xxs">{!! __($message) !!}</span>
            @enderror
        </div>
    </div>

    <!-- LANGUAGE -->
    <div class="flex flex-row items-center w-full pb-4 text-sm leading-relaxed">
        <div class="w-1/12 pr-2 font-bold text-right">{{ __('Language') }}</div>
        <div class="relative w-2/12 text-left">
            <select name="patient[persona][language]"
                class="w-full pb-1 text-sm leading-loose tracking-wider transition duration-200 ease-in-out border-0 border-b-2 rounded-t-md text-gunmetal-400 focus:text-gunmetal-700 focus:bg-lightcyan-50 placeholder-gunmetal-500 placeholder-opacity-30 tabular-nums @error('patient.persona.language') border-red-700 bg-red-100 @else border-burntsienna-300 bg-lightcyan-300 @enderror">
                @foreach ($items['languages'] as $language)
                @if($language->list_item_value == $patient->persona->language)
                <option value="{{ $language->list_item_value }}" selected>
                    {{ __($language->list_item_title) }}
                </option>
                @else
                <option value="{{ $language->list_item_value }}">
                    {{ __($language->list_item_title) }}
                </option>
                @endif
                @endforeach
            </select>
            @error('patient.persona.language')
            <span class="absolute z-10 leading-none text-red-600 left-1 -bottom-3 text-xxs">{!! __($message) !!}</span>
            @enderror
        </div>
        <div class="w-1/12 pr-2 font-bold text-right">{{ __('Ethnicity') }}</div>
        <div class="relative w-2/12 text-left">
            <select name="patient[persona][ethnicity]"
                class="w-full pb-1 text-sm leading-loose tracking-wider transition duration-200 ease-in-out border-0 border-b-2 rounded-t-md text-gunmetal-400 focus:text-gunmetal-700 focus:bg-lightcyan-50 placeholder-gunmetal-500 placeholder-opacity-30 tabular-nums @error('patient.persona.ethnicity') border-red-700 bg-red-100 @else border-burntsienna-300 bg-lightcyan-300 @enderror">
                @foreach ($items['ethnicities'] as $ethnicity)
                @if($ethnicity->list_item_value == $patient->persona->ethnicity)
                <option value="{{ $ethnicity->list_item_value }}" selected>
                    {{ __($ethnicity->list_item_title) }}
                </option>
                @else
                <option value="{{ $ethnicity->list_item_value }}">
                    {{ __($ethnicity->list_item_title) }}
                </option>
                @endif
                @endforeach
            </select>
            @error('patient.persona.ethnicity')
            <span class="absolute z-10 leading-none text-red-600 left-1 -bottom-3 text-xxs">{!! __($message) !!}</span>
            @enderror
        </div>
        <div class="w-1/12 pr-2 font-bold text-right">{{ __('Race') }}</div>
        <div class="relative w-2/12 text-left">
            <select name="patient[persona][race]"
                class="w-full pb-1 text-sm leading-loose tracking-wider transition duration-200 ease-in-out border-0 border-b-2 rounded-t-md text-gunmetal-400 focus:text-gunmetal-700 focus:bg-lightcyan-50 placeholder-gunmetal-500 placeholder-opacity-30 tabular-nums @error('patient.persona.race') border-red-700 bg-red-100 @else border-burntsienna-300 bg-lightcyan-300 @enderror">
                @foreach ($items['races'] as $race)
                @if($race->list_item_value == $patient->persona->race)
                <option value="{{ $race->list_item_value }}" selected>
                    {{ __($race->list_item_title) }}
                </option>
                @else
                <option value="{{ $race->list_item_value }}">
                    {{ __($race->list_item_title) }}
                </option>
                @endif
                @endforeach
            </select>
            @error('patient.persona.race')
            <span class="absolute z-10 leading-none text-red-600 left-1 -bottom-3 text-xxs">{!! __($message) !!}</span>
            @enderror
        </div>
        <div class="flex flex-row w-3/12">&nbsp;</div>
    </div>

    <!-- MIGRANT -->
    <div class="flex flex-row items-center w-full pb-4 text-sm leading-relaxed">
        <div class="w-1/12 pr-2 font-bold text-right">{{ __('Migrant / Seasonal') }}</div>
        <div class="relative w-2/12 text-left">
            <input type="text" name="patient[persona][migrant_seasonal]"
                value="{{ $patient->persona->migrant_seasonal }}"
                class="w-full pb-1 text-sm leading-loose tracking-wider transition duration-200 ease-in-out border-0 border-b-2 rounded-t-md text-gunmetal-400 focus:text-gunmetal-700 focus:bg-lightcyan-50 placeholder-gunmetal-500 placeholder-opacity-30 tabular-nums @error('patient.persona.migrant_seasonal') border-red-700 bg-red-100 @else border-burntsienna-300 bg-lightcyan-300 @enderror" />
            @error('patient.persona.migrant_seasonal')
            <span class="absolute z-10 leading-none text-red-600 left-1 -bottom-3 text-xxs">{!! __($message) !!}</span>
            @enderror
        </div>
        <div class="w-1/12 pr-2 font-bold text-right">{{ __('Interpreter') }}</div>
        <div class="relative w-2/12 text-left">
            <input type="text" name="patient[persona][interpreter]" value="{{ $patient->persona->interpreter }}"
                class="w-full pb-1 text-sm leading-loose tracking-wider transition duration-200 ease-in-out border-0 border-b-2 rounded-t-md text-gunmetal-400 focus:text-gunmetal-700 focus:bg-lightcyan-50 placeholder-gunmetal-500 placeholder-opacity-30 tabular-nums @error('patient.persona.interpreter') border-red-700 bg-red-100 @else border-burntsienna-300 bg-lightcyan-300 @enderror" />
            @error('patient.persona.interpreter')
            <span class="absolute z-10 leading-none text-red-600 left-1 -bottom-3 text-xxs">{!! __($message) !!}</span>
            @enderror
        </div>
        <div class="w-1/12 pr-2 font-bold text-right">{{ __('Homeless') }}</div>
        <div class="relative w-2/12 text-left">
            <input type="text" name="patient[persona][homeless]" value="{{ $patient->persona->homeless }}"
                class="w-full pb-1 text-sm leading-loose tracking-wider transition duration-200 ease-in-out border-0 border-b-2 rounded-t-md text-gunmetal-400 focus:text-gunmetal-700 focus:bg-lightcyan-50 placeholder-gunmetal-500 placeholder-opacity-30 tabular-nums @error('patient.persona.homeless') border-red-700 bg-red-100 @else border-burntsienna-300 bg-lightcyan-300 @enderror" />
            @error('patient.persona.homeless')
            <span class="absolute z-10 leading-none text-red-600 left-1 -bottom-3 text-xxs">{!! __($message) !!}</span>
            @enderror
        </div>
        <div class="flex flex-row w-3/12">&nbsp;</div>
    </div>

    <!-- REFERRAL -->
    <div class="flex flex-row items-center w-full pb-8 text-sm leading-relaxed">
        <div class="w-1/12 pr-2 font-bold text-right">{{ __('Referral') }}</div>
        <div class="relative w-2/12 text-left">
            <select name="patient[persona][referral]"
                class="w-full pb-1 text-sm leading-loose tracking-wider transition duration-200 ease-in-out border-0 border-b-2 rounded-t-md text-gunmetal-400 focus:text-gunmetal-700 focus:bg-lightcyan-50 placeholder-gunmetal-500 placeholder-opacity-30 tabular-nums @error('patient.persona.referral') border-red-700 bg-red-100 @else border-burntsienna-300 bg-lightcyan-300 @enderror">
                @foreach ($items['referrals'] as $referral)
                @if($referral->list_item_value == $patient->persona->referral)
                <option value="{{ $referral->list_item_value }}" selected>
                    {{ __($referral->list_item_title) }}
                </option>
                @else
                <option value="{{ $referral->list_item_value }}">
                    {{ __($referral->list_item_title) }}
                </option>
                @endif
                @endforeach
            </select>
            @error('patient.persona.referral')
            <span class="absolute z-10 leading-none text-red-600 left-1 -bottom-3 text-xxs">{!! __($message) !!}</span>
            @enderror
        </div>
        <div class="w-1/12 pr-2 font-bold text-right">{{ __('VFC') }}</div>
        <div class="relative w-2/12 text-left">
            <select name="patient[persona][vfc]"
                class="w-full pb-1 text-sm leading-loose tracking-wider transition duration-200 ease-in-out border-0 border-b-2 rounded-t-md text-gunmetal-400 focus:text-gunmetal-700 focus:bg-lightcyan-50 placeholder-gunmetal-500 placeholder-opacity-30 tabular-nums @error('patient.persona.vfc') border-red-700 bg-red-100 @else border-burntsienna-300 bg-lightcyan-300 @enderror">
                @foreach ($items['vfcs'] as $vfc)
                @if($vfc->list_item_value == $patient->persona->vfc)
                <option value="{{ $vfc->list_item_value }}" selected>
                    {{ __($vfc->list_item_title) }}
                </option>
                @else
                <option value="{{ $vfc->list_item_value }}">
                    {{ __($vfc->list_item_title) }}
                </option>
                @endif
                @endforeach
            </select>
            @error('patient.persona.vfc')
            <span class="absolute z-10 leading-none text-red-600 left-1 -bottom-3 text-xxs">{!! __($message) !!}</span>
            @enderror
        </div>
        <div class="flex flex-row w-6/12">&nbsp;</div>
    </div>

    <!-- CONTACTS -->
    <div
        class="flex flex-row w-full px-4 py-2 mb-8 text-xl font-bold leading-relaxed uppercase rounded bg-bdazzledblue-500 text-lightcyan-500">
        {{ __('Contacts') }}
    </div>
    @foreach ($patient->contact as $idx => $contact)
    <div class="flex flex-row items-center w-full pb-4 text-sm leading-relaxed">
        <div class="w-1/12 pr-2 font-bold text-right">
            {{ __('Contact #:contact_id', ['contact_id' => ($idx+1)]) }}
        </div>
        <div class="relative w-2/12 text-left">
            <select name="patient[contact][{{ $idx }}][contact_type]"
                class="w-full pb-1 text-sm leading-loose tracking-wider transition duration-200 ease-in-out border-0 border-b-2 rounded-t-md text-gunmetal-400 focus:text-gunmetal-700 focus:bg-lightcyan-50 placeholder-gunmetal-500 placeholder-opacity-30 tabular-nums @error('patient.contact.'.$idx.'.contact_type') border-red-700 bg-red-100 @else border-burntsienna-300 bg-lightcyan-300 @enderror">
                @foreach ($items['contacttypes'] as $contacttype)
                @if($contacttype->list_item_value == $contact->contact_type)
                <option value="{{ $contacttype->list_item_value }}" selected>
                    {{ __($contacttype->list_item_title) }}
                </option>
                @else
                <option value="{{ $contacttype->list_item_value }}">
                    {{ __($contacttype->list_item_title) }}
                </option>
                @endif
                @endforeach
            </select>
            @error('patient.contact.'.$idx.'.contact_type')
            <span class="absolute z-10 leading-none text-red-600 left-1 -bottom-3 text-xxs">{!! __($message) !!}</span>
            @enderror
        </div>
        <div class="flex flex-row w-9/12">&nbsp;</div>
    </div>

    <div class="flex flex-row items-center w-full pb-4 text-sm leading-relaxed">
        <div class="w-1/12 pr-2 font-bold text-right">{{ __('Title') }}</div>
        <div class="relative w-2/12 text-left">
            <select name="patient[contact][{{ $idx }}][title]"
                class="w-full pb-1 text-sm leading-loose tracking-wider transition duration-200 ease-in-out border-0 border-b-2 rounded-t-md text-gunmetal-400 focus:text-gunmetal-700 focus:bg-lightcyan-50 placeholder-gunmetal-500 placeholder-opacity-30 tabular-nums @error('patient.contact.'.$idx.'.title') border-red-700 bg-red-100 @else border-burntsienna-300 bg-lightcyan-300 @enderror">
                @foreach ($items['titles'] as $title)
                @if($title->list_item_value == $contact->title)
                <option value="{{ $title->list_item_value }}" selected>
                    {{ __($title->list_item_title) }}
                </option>
                @else
                <option value="{{ $title->list_item_value }}">
                    {{ __($title->list_item_title) }}
                </option>
                @endif
                @endforeach
            </select>
            @error('patient.contact.'.$idx.'.title')
            <span class="absolute z-10 leading-none text-red-600 left-1 -bottom-3 text-xxs">{!! __($message) !!}</span>
            @enderror
        </div>
        <div class="w-1/12 pr-2 font-bold text-right">{{ __('Last name') }}</div>
        <div class="relative w-2/12 text-left">
            <input type="text" name="patient[contact][{{ $idx }}][last_name]" value="{{ $contact->last_name }}"
                class="w-full pb-1 text-sm leading-loose tracking-wider transition duration-200 ease-in-out border-0 border-b-2 rounded-t-md text-gunmetal-400 focus:text-gunmetal-700 focus:bg-lightcyan-50 placeholder-gunmetal-500 placeholder-opacity-30 tabular-nums @error('patient.contact.'.$idx.'.last_name') border-red-700 bg-red-100 @else border-burntsienna-300 bg-lightcyan-300 @enderror">
            @error('patient.contact.'.$idx.'.last_name')
            <span class="absolute z-10 leading-none text-red-600 left-1 -bottom-3 text-xxs">{!! __($message) !!}</span>
            @enderror
        </div>
        <div class="w-1/12 pr-2 font-bold text-right">{{ __('First name') }}</div>
        <div class="relative w-2/12 text-left">
            <input type="text" name="patient[contact][{{ $idx }}][first_name]" value="{{ $contact->first_name }}"
                class="w-full pb-1 text-sm leading-loose tracking-wider transition duration-200 ease-in-out border-0 border-b-2 rounded-t-md text-gunmetal-400 focus:text-gunmetal-700 focus:bg-lightcyan-50 placeholder-gunmetal-500 placeholder-opacity-30 tabular-nums @error('patient.contact.'.$idx.'.first_name') border-red-700 bg-red-100 @else border-burntsienna-300 bg-lightcyan-300 @enderror">
            @error('patient.contact.'.$idx.'.first_name')
            <span class="absolute z-10 leading-none text-red-600 left-1 -bottom-3 text-xxs">{!! __($message) !!}</span>
            @enderror
        </div>
        <div class="w-1/12 pr-2 font-bold text-right">{{ __('Middle name') }}</div>
        <div class="relative w-2/12 text-left">
            <input type="text" name="patient[contact][{{ $idx }}][middle_name]" value="{{ $contact->middle_name }}"
                class="w-full pb-1 text-sm leading-loose tracking-wider transition duration-200 ease-in-out border-0 border-b-2 rounded-t-md text-gunmetal-400 focus:text-gunmetal-700 focus:bg-lightcyan-50 placeholder-gunmetal-500 placeholder-opacity-30 tabular-nums @error('patient.contact.'.$idx.'.middle_name') border-red-700 bg-red-100 @else border-burntsienna-300 bg-lightcyan-300 @enderror">
            @error('patient.contact.'.$idx.'.middle_name')
            <span class="absolute z-10 leading-none text-red-600 left-1 -bottom-3 text-xxs">{!! __($message) !!}</span>
            @enderror
        </div>
    </div>

    @foreach ($contact->phone as $phone)
    <div class="flex flex-row items-center w-full pt-4 text-sm leading-relaxed">
        <div class="w-1/12 pr-2 font-bold text-right">{{ __('Phone') }}</div>
        <div class="relative w-2/12 text-left">
            <select name="patient[contact][{{ $idx }}][phone][type]"
                class="w-full pb-1 text-sm leading-loose tracking-wider transition duration-200 ease-in-out border-0 border-b-2 rounded-t-md text-gunmetal-400 focus:text-gunmetal-700 focus:bg-lightcyan-50 placeholder-gunmetal-500 placeholder-opacity-30 tabular-nums @error('patient.contact.'.$idx.'.phone.type') border-red-700 bg-red-100 @else border-burntsienna-300 bg-lightcyan-300 @enderror">
                @foreach ($items['phonetypes'] as $phonetype)
                @if($phonetype->list_item_value == $phone->type)
                <option value="{{ $phonetype->list_item_value }}" selected>
                    {{ __($phonetype->list_item_title) }}
                </option>
                @else
                <option value="{{ $title->list_item_value }}">
                    {{ __($phonetype->list_item_title) }}
                </option>
                @endif
                @endforeach
            </select>
            @error('patient.contact.'.$idx.'.phone.type')
            <span class="absolute z-10 leading-none text-red-600 left-1 -bottom-3 text-xxs">{!! __($message) !!}</span>
            @enderror
        </div>
        <div class="flex flex-row items-center w-3/12 ">
            <div class="w-1/12 font-bold">+</div>
            <div class="w-2/12">
                <input type="text" name="patient[contact][{{ $idx }}][phone][international_code]"
                    value="{{ $phone->international_code }}"
                    class="w-full pb-1 text-sm leading-loose tracking-wider text-center transition duration-200 ease-in-out border-0 border-b-2 rounded-t-md text-gunmetal-400 focus:text-gunmetal-700 focus:bg-lightcyan-50 placeholder-gunmetal-500 placeholder-opacity-30 tabular-nums @error('patient.contact.'.$idx.'.phone.international_code') border-red-700 bg-red-100 @else border-burntsienna-300 bg-lightcyan-300 @enderror">
            </div>
            <div class="w-1/12 font-bold">(</div>
            <div class="w-2/12">
                <input type="text" name="patient[contact][{{ $idx }}][phone][area_code]" value="{{ $phone->area_code }}"
                    class="w-full pb-1 text-sm leading-loose tracking-wider text-center transition duration-200 ease-in-out border-0 border-b-2 rounded-t-md text-gunmetal-400 focus:text-gunmetal-700 focus:bg-lightcyan-50 placeholder-gunmetal-500 placeholder-opacity-30 tabular-nums @error('patient.contact.'.$idx.'.phone.area_code') border-red-700 bg-red-100 @else border-burntsienna-300 bg-lightcyan-300 @enderror">
            </div>
            <div class="w-1/12 font-bold">)</div>
            <div class="w-2/12">
                <input type="text" name="patient[contact][{{ $idx }}][phone][initial_digits]"
                    value="{{ $phone->initial_digits }}"
                    class="w-full pb-1 text-sm leading-loose tracking-wider text-center transition duration-200 ease-in-out border-0 border-b-2 rounded-t-md text-gunmetal-400 focus:text-gunmetal-700 focus:bg-lightcyan-50 placeholder-gunmetal-500 placeholder-opacity-30 tabular-nums @error('patient.contact.'.$idx.'.phone.initial_digits') border-red-700 bg-red-100 @else border-burntsienna-300 bg-lightcyan-300 @enderror">
            </div>
            <div class="w-1/12 font-bold">-</div>
            <div class="w-2/12">
                <input type="text" name="patient[contact][{{ $idx }}][phone][last_digits]"
                    value="{{ $phone->last_digits }}"
                    class="w-full pb-1 text-sm leading-loose tracking-wider text-center transition duration-200 ease-in-out border-0 border-b-2 rounded-t-md text-gunmetal-400 focus:text-gunmetal-700 focus:bg-lightcyan-50 placeholder-gunmetal-500 placeholder-opacity-30 tabular-nums @error('patient.contact.'.$idx.'.phone.last_digits') border-red-700 bg-red-100 @else border-burntsienna-300 bg-lightcyan-300 @enderror">
            </div>
        </div>
        <div class="relative flex flex-row w-6/12 h-10">
            @error('patient.contact.'.$idx.'.phone.international_code')
            <span class="absolute top-0 z-10 leading-none text-red-600 left-1 text-xxs">{!! __($message) !!}</span>
            @enderror
            @error('patient.contact.'.$idx.'.phone.area_code')
            <span class="absolute z-10 leading-none text-red-600 left-1 top-3 text-xxs">{!! __($message) !!}</span>
            @enderror
            @error('patient.contact.'.$idx.'.phone.initial_digits')
            <span class="absolute z-10 leading-none text-red-600 left-1 top-6 text-xxs">{!! __($message) !!}</span>
            @enderror
            @error('patient.contact.'.$idx.'.phone.last_digits')
            <span class="absolute z-10 leading-none text-red-600 left-1 top-9 text-xxs">{!! __($message) !!}</span>
            @enderror
        </div>
    </div>
    @endforeach

    <div class="flex flex-row items-center w-full pt-4 pb-8 text-sm leading-relaxed">
        <div class="w-1/12 pr-2 font-bold text-right">{{ __('E-mail') }}</div>
        <div class="relative w-2/12 text-left">
            <input type="text" name="patient[contact][{{ $idx }}][email]" value="{{ $contact->email }}"
                class="w-full pb-1 text-sm leading-loose tracking-wider transition duration-200 ease-in-out border-0 border-b-2 rounded-t-md text-gunmetal-400 focus:text-gunmetal-700 focus:bg-lightcyan-50 placeholder-gunmetal-500 placeholder-opacity-30 tabular-nums @error('patient.contact.'.$idx.'.email') border-red-700 bg-red-100 @else border-burntsienna-300 bg-lightcyan-300 @enderror" />
            @error('patient.contact.'.$idx.'.email')
            <span class="absolute z-10 leading-none text-red-600 left-1 -bottom-3 text-xxs">{!! __($message) !!}</span>
            @enderror
        </div>
    </div>

    <div class="flex flex-row items-center w-full pb-4 text-sm leading-relaxed">
        <div class="w-1/12 pr-2 font-bold text-right">{{ __('Address') }}</div>
        <div class="relative flex flex-row w-5/12 text-left">
            <input type="text" name="patient[contact][{{ $idx }}][address][street]"
                value="{{ $contact->address->street }}"
                class="w-full pb-1 text-sm leading-loose tracking-wider transition duration-200 ease-in-out border-0 border-b-2 rounded-t-md text-gunmetal-400 focus:text-gunmetal-700 focus:bg-lightcyan-50 placeholder-gunmetal-500 placeholder-opacity-30 tabular-nums @error('patient.contact.'.$idx.'.address.street') border-red-700 bg-red-100 @else border-burntsienna-300 bg-lightcyan-300 @enderror" />
            @error('patient.contact.'.$idx.'.address.street')
            <span class="absolute z-10 leading-none text-red-600 left-1 -bottom-3 text-xxs">{!! __($message) !!}</span>
            @enderror
            <input type="text" name="patient[contact][{{ $idx }}][address][street_extended]"
                value="{{ $contact->address->street_extended }}"
                class="w-full pb-1 ml-4 text-sm leading-loose tracking-wider transition duration-200 ease-in-out border-0 border-b-2 rounded-t-md text-gunmetal-400 focus:text-gunmetal-700 focus:bg-lightcyan-50 placeholder-gunmetal-500 placeholder-opacity-30 tabular-nums @error('patient.contact.'.$idx.'.address.street_extended') border-red-700 bg-red-100 @else border-burntsienna-300 bg-lightcyan-300 @enderror" />
            @error('patient.contact.'.$idx.'.address.street_extended')
            <span class="absolute z-10 pl-3 leading-none text-red-600 left-1/2 -bottom-3 text-xxs">
                {!! __($message) !!}
            </span>
            @enderror
        </div>
        <div class="w-1/12 pr-2 font-bold text-right">{{ __('City') }}</div>
        <div class="relative w-2/12 text-left">
            <input type="text" name="patient[contact][{{ $idx }}][address][city]" value="{{ $contact->address->city }}"
                class="w-full pb-1 text-sm leading-loose tracking-wider transition duration-200 ease-in-out border-0 border-b-2 rounded-t-md text-gunmetal-400 focus:text-gunmetal-700 focus:bg-lightcyan-50 placeholder-gunmetal-500 placeholder-opacity-30 tabular-nums @error('patient.contact.'.$idx.'.address.city') border-red-700 bg-red-100 @else border-burntsienna-300 bg-lightcyan-300 @enderror" />
            @error('patient.contact.'.$idx.'.address.city')
            <span class="absolute z-10 leading-none text-red-600 left-1 -bottom-3 text-xxs">
                {!! __($message) !!}
            </span>
            @enderror
        </div>
        <div class="flex flex-row w-3/12">&nbsp;</div>
    </div>

    <div
        class="flex flex-row items-center w-full pb-8 @if($idx != 2) mb-8 @endif text-sm leading-relaxed @if($idx != 2) border-b-2 border-palecerulean-300 @endif">
        <div class="w-1/12 pr-2 font-bold text-right">{{ __('State') }}</div>
        <div class="relative w-2/12 text-left">
            <select name="patient[contact][{{ $idx }}][address][state]"
                class="w-full pb-1 text-sm leading-loose tracking-wider transition duration-200 ease-in-out border-0 border-b-2 rounded-t-md text-gunmetal-400 focus:text-gunmetal-700 focus:bg-lightcyan-50 placeholder-gunmetal-500 placeholder-opacity-30 tabular-nums @error('patient.contact.'.$idx.'.address.state') border-red-700 bg-red-100 @else border-burntsienna-300 bg-lightcyan-300 @enderror">
                @foreach ($items['states'] as $state)
                @if($state->list_item_value == $contact->address->state)
                <option value="{{ $state->list_item_value }}" selected>
                    {{ __($state->list_item_title) }}
                </option>
                @else
                <option value="{{ $state->list_item_value }}">
                    {{ __($state->list_item_title) }}
                </option>
                @endif
                @endforeach
            </select>
            @error('patient.contact.'.$idx.'.address.state')
            <span class="absolute z-10 leading-none text-red-600 left-1 -bottom-3 text-xxs">
                {!! __($message) !!}
            </span>
            @enderror
        </div>
        <div class="w-1/12 pr-2 font-bold text-right">{{ __('Zip') }}</div>
        <div class="relative w-2/12 text-left">
            <input type="text" name="patient[contact][{{ $idx }}][address][zip]" value="{{ $contact->address->zip }}"
                class="w-full pb-1 text-sm leading-loose tracking-wider transition duration-200 ease-in-out border-0 border-b-2 rounded-t-md text-gunmetal-400 focus:text-gunmetal-700 focus:bg-lightcyan-50 placeholder-gunmetal-500 placeholder-opacity-30 tabular-nums @error('patient.contact.'.$idx.'.address.zip') border-red-700 bg-red-100 @else border-burntsienna-300 bg-lightcyan-300 @enderror" />
            @error('patient.contact.'.$idx.'.address.zip')
            <span class="absolute z-10 leading-none text-red-600 left-1 -bottom-3 text-xxs">
                {!! __($message) !!}
            </span>
            @enderror
        </div>
        <div class="w-1/12 pr-2 font-bold text-right">{{ __('Country') }}</div>
        <div class="relative w-2/12 text-left">
            <select name="patient[contact][{{ $idx }}][address][country]"
                class="w-full pb-1 text-sm leading-loose tracking-wider transition duration-200 ease-in-out border-0 border-b-2 rounded-t-md text-gunmetal-400 focus:text-gunmetal-700 focus:bg-lightcyan-50 placeholder-gunmetal-500 placeholder-opacity-30 tabular-nums @error('patient.contact.'.$idx.'.address.country') border-red-700 bg-red-100 @else border-burntsienna-300 bg-lightcyan-300 @enderror">
                @foreach ($items['countries'] as $country)
                @if($country->list_item_value == $contact->address->country)
                <option value="{{ $country->list_item_value }}" selected>
                    {{ __($country->list_item_title) }}
                </option>
                @else
                <option value="{{ $country->list_item_value }}">
                    {{ __($country->list_item_title) }}
                </option>
                @endif
                @endforeach
            </select>
            @error('patient.contact.'.$idx.'.address.country')
            <span class="absolute z-10 leading-none text-red-600 left-1 -bottom-3 text-xxs">
                {!! __($message) !!}
            </span>
            @enderror
        </div>
        <div class="flex flex-row w-3/12">&nbsp;</div>
    </div>
    @endforeach

    <!-- EMPLOYMENT -->
    <div
        class="flex flex-row w-full px-4 py-2 mb-8 text-xl font-bold leading-relaxed uppercase rounded bg-bdazzledblue-500 text-lightcyan-500">
        {{ __('Employment') }}
    </div>
    @foreach ($patient->employment as $idx => $employer)
    <div class="flex flex-row items-center w-full pb-8 mb-8 text-sm leading-relaxed border-b-2 border-palecerulean-300">
        <div class="w-1/12 pr-2 font-bold text-right">{{ __('Company') }}
        </div>
        <div class="relative w-2/12 text-left">
            <input type="text" name="patient[employer][company]" value="{{ $employer->company }}"
                class="w-full pb-1 text-sm leading-loose tracking-wider transition duration-200 ease-in-out border-0 border-b-2 rounded-t-md text-gunmetal-400 focus:text-gunmetal-700 focus:bg-lightcyan-50 placeholder-gunmetal-500 placeholder-opacity-30 tabular-nums @error('patient.employer.company') border-red-700 bg-red-100 @else border-burntsienna-300 bg-lightcyan-300 @enderror" />
            @error('patient.employer.company')
            <span class="absolute z-10 leading-none text-red-600 left-1 -bottom-3 text-xxs">
                {!! __($message) !!}
            </span>
            @enderror
        </div>
        <div class="w-1/12 pr-2 font-bold text-right">{{ __('Occupation') }}
        </div>
        <div class="relative w-2/12 text-left">
            <input type="text" name="patient[employer][occupation]" value="{{ $employer->occupation }}"
                class="w-full pb-1 text-sm leading-loose tracking-wider transition duration-200 ease-in-out border-0 border-b-2 rounded-t-md text-gunmetal-400 focus:text-gunmetal-700 focus:bg-lightcyan-50 placeholder-gunmetal-500 placeholder-opacity-30 tabular-nums @error('patient.employer.occupation') border-red-700 bg-red-100 @else border-burntsienna-300 bg-lightcyan-300 @enderror" />
            @error('patient.employer.occupation')
            <span class="absolute z-10 leading-none text-red-600 left-1 -bottom-3 text-xxs">
                {!! __($message) !!}
            </span>
            @enderror
        </div>
        <div class="w-1/12 pr-2 font-bold text-right">{{ __('Monthly Income') }}
        </div>
        <div class="relative w-2/12 text-left">
            <input type="text" name="patient[employer][monthly_income]" value="{{ $employer->monthly_income }}"
                class="w-full pb-1 text-sm leading-loose tracking-wider transition duration-200 ease-in-out border-0 border-b-2 rounded-t-md text-gunmetal-400 focus:text-gunmetal-700 focus:bg-lightcyan-50 placeholder-gunmetal-500 placeholder-opacity-30 tabular-nums @error('patient.employer.monthly_income') border-red-700 bg-red-100 @else border-burntsienna-300 bg-lightcyan-300 @enderror" />
            @error('patient.employer.monthly_income')
            <span class="absolute z-10 leading-none text-red-600 left-1 -bottom-3 text-xxs">
                {!! __($message) !!}
            </span>
            @enderror
        </div>
        <div class="w-1/12 pr-2 font-bold text-right">{{ __('Financial Review') }}
        </div>
        <div class="relative w-2/12 text-left">
            <input type="text" name="patient[employer][financial_review]" value="{{ $employer->financial_review }}"
                class="w-full pb-1 text-sm leading-loose tracking-wider transition duration-200 ease-in-out border-0 border-b-2 rounded-t-md text-gunmetal-400 focus:text-gunmetal-700 focus:bg-lightcyan-50 placeholder-gunmetal-500 placeholder-opacity-30 tabular-nums @error('patient.employer.financial_review') border-red-700 bg-red-100 @else border-burntsienna-300 bg-lightcyan-300 @enderror" />
            @error('patient.employer.financial_review')
            <span class="absolute z-10 leading-none text-red-600 left-1 -bottom-3 text-xxs">
                {!! __($message) !!}
            </span>
            @enderror
        </div>
    </div>

    <div class="flex flex-row items-center w-full pb-4 text-sm leading-relaxed">
        <div class="w-1/12 pr-2 font-bold text-right">{{ __('Employer') }}</div>
        <div class="relative w-2/12 text-left">
            <select name="patient[employer][title]"
                class="w-full pb-1 text-sm leading-loose tracking-wider transition duration-200 ease-in-out border-0 border-b-2 rounded-t-md text-gunmetal-400 focus:text-gunmetal-700 focus:bg-lightcyan-50 placeholder-gunmetal-500 placeholder-opacity-30 tabular-nums @error('patient.employer.title') border-red-700 bg-red-100 @else border-burntsienna-300 bg-lightcyan-300 @enderror">
                @foreach ($items['titles'] as $title)
                @if($title->list_item_value == $employer->title)
                <option value="{{ $title->list_item_value }}" selected>
                    {{ __($title->list_item_title) }}
                </option>
                @else
                <option value="{{ $title->list_item_value }}">
                    {{ __($title->list_item_title) }}
                </option>
                @endif
                @endforeach
            </select>
            @error('patient.employer.title')
            <span class="absolute z-10 pl-3 leading-none text-red-600 left-1 -bottom-3 text-xxs">
                {!! __($message) !!}
            </span>
            @enderror
        </div>
        <div class="w-1/12 pr-2 font-bold text-right">{{ __('Last name') }}</div>
        <div class="relative w-2/12 text-left">
            <input type="text" name="patient[employer][last_name]" value="{{ $employer->last_name }}"
                class="w-full pb-1 text-sm leading-loose tracking-wider transition duration-200 ease-in-out border-0 border-b-2 rounded-t-md text-gunmetal-400 focus:text-gunmetal-700 focus:bg-lightcyan-50 placeholder-gunmetal-500 placeholder-opacity-30 tabular-nums @error('patient.employer.last_name') border-red-700 bg-red-100 @else border-burntsienna-300 bg-lightcyan-300 @enderror" />
            @error('patient.employer.last_name')
            <span class="absolute z-10 pl-3 leading-none text-red-600 left-1 -bottom-3 text-xxs">
                {!! __($message) !!}
            </span>
            @enderror
        </div>
        <div class="w-1/12 pr-2 font-bold text-right">{{ __('First name') }}</div>
        <div class="relative w-2/12 text-left">
            <input type="text" name="patient[employer][first_name]" value="{{ $employer->first_name }}"
                class="w-full pb-1 text-sm leading-loose tracking-wider transition duration-200 ease-in-out border-0 border-b-2 rounded-t-md text-gunmetal-400 focus:text-gunmetal-700 focus:bg-lightcyan-50 placeholder-gunmetal-500 placeholder-opacity-30 tabular-nums @error('patient.employer.first_name') border-red-700 bg-red-100 @else border-burntsienna-300 bg-lightcyan-300 @enderror" />
            @error('patient.employer.first_name')
            <span class="absolute z-10 pl-3 leading-none text-red-600 left-1 -bottom-3 text-xxs">
                {!! __($message) !!}
            </span>
            @enderror
        </div>
        <div class="w-1/12 pr-2 font-bold text-right">{{ __('Middle name') }}</div>
        <div class="relative w-2/12 text-left">
            <input type="text" name="patient[employer][middle_name]" value="{{ $employer->middle_name }}"
                class="w-full pb-1 text-sm leading-loose tracking-wider transition duration-200 ease-in-out border-0 border-b-2 rounded-t-md text-gunmetal-400 focus:text-gunmetal-700 focus:bg-lightcyan-50 placeholder-gunmetal-500 placeholder-opacity-30 tabular-nums @error('patient.employer.middle_name') border-red-700 bg-red-100 @else border-burntsienna-300 bg-lightcyan-300 @enderror" />
            @error('patient.employer.middle_name')
            <span class="absolute z-10 pl-3 leading-none text-red-600 left-1 -bottom-3 text-xxs">
                {!! __($message) !!}
            </span>
            @enderror
        </div>
    </div>

    @foreach ($employer->phone as $phone)
    <div class="flex flex-row items-center w-full pt-4 text-sm leading-relaxed">
        <div class="w-1/12 pr-2 font-bold text-right">{{ __('Phone') }}</div>
        <div class="relative w-2/12 text-left">
            <select name="patient[employer][phone][type]"
                class="w-full pb-1 text-sm leading-loose tracking-wider transition duration-200 ease-in-out border-0 border-b-2 rounded-t-md text-gunmetal-400 focus:text-gunmetal-700 focus:bg-lightcyan-50 placeholder-gunmetal-500 placeholder-opacity-30 tabular-nums @error('patient.employer.phone.type') border-red-700 bg-red-100 @else border-burntsienna-300 bg-lightcyan-300 @enderror">
                @foreach ($items['phonetypes'] as $phonetype)
                @if($phonetype->list_item_value == $phone->type)
                <option value="{{ $phonetype->list_item_value }}" selected>
                    {{ __($phonetype->list_item_title) }}
                </option>
                @else
                <option value="{{ $title->list_item_value }}">
                    {{ __($phonetype->list_item_title) }}
                </option>
                @endif
                @endforeach
            </select>
            @error('patient.employer.phone.type')
            <span class="absolute z-10 pl-3 leading-none text-red-600 left-1 -bottom-3 text-xxs">
                {!! __($message) !!}
            </span>
            @enderror
        </div>
        <div class="flex flex-row items-center w-3/12">
            <div class="w-1/12 font-bold">+</div>
            <div class="w-2/12">
                <input type="text" name="patient[employer][phone][international_code]"
                    value="{{ $phone->international_code }}"
                    class="w-full pb-1 text-sm leading-loose tracking-wider text-center transition duration-200 ease-in-out border-0 border-b-2 rounded-t-md text-gunmetal-400 focus:text-gunmetal-700 focus:bg-lightcyan-50 placeholder-gunmetal-500 placeholder-opacity-30 tabular-nums @error('patient.employer.phone.international_code') border-red-700 bg-red-100 @else border-burntsienna-300 bg-lightcyan-300 @enderror" />
            </div>
            <div class="w-1/12 font-bold">(</div>
            <div class="w-2/12">
                <input type="text" name="patient[employer][phone][area_code]" value="{{ $phone->area_code }}"
                    class="w-full pb-1 text-sm leading-loose tracking-wider text-center transition duration-200 ease-in-out border-0 border-b-2 rounded-t-md text-gunmetal-400 focus:text-gunmetal-700 focus:bg-lightcyan-50 placeholder-gunmetal-500 placeholder-opacity-30 tabular-nums @error('patient.employer.phone.area_code') border-red-700 bg-red-100 @else border-burntsienna-300 bg-lightcyan-300 @enderror" />
            </div>
            <div class="w-1/12 font-bold">)</div>
            <div class="w-2/12">
                <input type="text" name="patient[employer][phone][initial_digits]" value="{{ $phone->initial_digits }}"
                    class="w-full pb-1 text-sm leading-loose tracking-wider text-center transition duration-200 ease-in-out border-0 border-b-2 rounded-t-md text-gunmetal-400 focus:text-gunmetal-700 focus:bg-lightcyan-50 placeholder-gunmetal-500 placeholder-opacity-30 tabular-nums @error('patient.employer.phone.initial_digits') border-red-700 bg-red-100 @else border-burntsienna-300 bg-lightcyan-300 @enderror" />
            </div>
            <div class="w-1/12 font-bold">-</div>
            <div class="w-2/12">
                <input type="text" name="patient[employer][phone][last_digits]" value="{{ $phone->last_digits }}"
                    class="w-full pb-1 text-sm leading-loose tracking-wider text-center transition duration-200 ease-in-out border-0 border-b-2 rounded-t-md text-gunmetal-400 focus:text-gunmetal-700 focus:bg-lightcyan-50 placeholder-gunmetal-500 placeholder-opacity-30 tabular-nums @error('patient.employer.phone.last_digits') border-red-700 bg-red-100 @else border-burntsienna-300 bg-lightcyan-300 @enderror" />
            </div>
        </div>
        <div class="relative flex flex-row w-6/12 h-10">
            @error('patient.employer.phone.international_code')
            <span class="absolute top-0 z-10 leading-none text-red-600 left-1 text-xxs">{!! __($message) !!}</span>
            @enderror
            @error('patient.employer.phone.area_code')
            <span class="absolute z-10 leading-none text-red-600 left-1 top-3 text-xxs">{!! __($message) !!}</span>
            @enderror
            @error('patient.employer.phone.initial_digits')
            <span class="absolute z-10 leading-none text-red-600 left-1 top-6 text-xxs">{!! __($message) !!}</span>
            @enderror
            @error('patient.employer.phone.last_digits')
            <span class="absolute z-10 leading-none text-red-600 left-1 top-9 text-xxs">{!! __($message) !!}</span>
            @enderror
        </div>
    </div>
    @endforeach

    <div class="flex flex-row items-center w-full pt-4 pb-8 text-sm leading-relaxed">
        <div class="w-1/12 pr-2 font-bold text-right">{{ __('E-mail') }}</div>
        <div class="relative w-2/12 text-left">
            <input type="text" name="patient[employer][email]" value="{{ $employer->email }}"
                class="w-full pb-1 text-sm leading-loose tracking-wider transition duration-200 ease-in-out border-0 border-b-2 rounded-t-md text-gunmetal-400 focus:text-gunmetal-700 focus:bg-lightcyan-50 placeholder-gunmetal-500 placeholder-opacity-30 tabular-nums @error('patient.employer.email') border-red-700 bg-red-100 @else border-burntsienna-300 bg-lightcyan-300 @enderror" />
            @error('patient.employer.email')
            <span class="absolute z-10 leading-none text-red-600 left-1 -bottom-3 text-xxs">
                {!! __($message) !!}
            </span>
            @enderror
        </div>
    </div>

    <div class="flex flex-row items-center w-full pb-4 text-sm leading-relaxed">
        <div class="w-1/12 pr-2 font-bold text-right">{{ __('Address') }}</div>
        <div class="relative flex flex-row w-5/12 text-left">
            <input type="text" name="patient[employer][address][street]" value="{{ $employer->address->street }}"
                class="w-full pb-1 text-sm leading-loose tracking-wider transition duration-200 ease-in-out border-0 border-b-2 rounded-t-md text-gunmetal-400 focus:text-gunmetal-700 focus:bg-lightcyan-50 placeholder-gunmetal-500 placeholder-opacity-30 tabular-nums @error('patient.employer.address.street') border-red-700 bg-red-100 @else border-burntsienna-300 bg-lightcyan-300 @enderror" />
            @error('patient.employer.address.street')
            <span class="absolute z-10 pl-3 leading-none text-red-600 left-1 -bottom-3 text-xxs">
                {!! __($message) !!}
            </span>
            @enderror
            <input type="text" name="patient[employer][address][street_extended]"
                value="{{ $employer->address->street_extended }}"
                class="w-full pb-1 ml-4 text-sm leading-loose tracking-wider transition duration-200 ease-in-out border-0 border-b-2 rounded-t-md text-gunmetal-400 focus:text-gunmetal-700 focus:bg-lightcyan-50 placeholder-gunmetal-500 placeholder-opacity-30 tabular-nums @error('patient.employer.address.street_extended') border-red-700 bg-red-100 @else border-burntsienna-300 bg-lightcyan-300 @enderror" />
            @error('patient.employer.address.street_extended')
            <span class="absolute z-10 pl-3 leading-none text-red-600 left-1/2 -bottom-3 text-xxs">
                {!! __($message) !!}
            </span>
            @enderror
        </div>
        <div class="w-1/12 pr-2 font-bold text-right">{{ __('City') }}</div>
        <div class="relative w-2/12 text-left">
            <input type="text" name="patient[employer][address][city]" value="{{ $employer->address->city }}"
                class="w-full pb-1 text-sm leading-loose tracking-wider transition duration-200 ease-in-out border-0 border-b-2 rounded-t-md text-gunmetal-400 focus:text-gunmetal-700 focus:bg-lightcyan-50 placeholder-gunmetal-500 placeholder-opacity-30 tabular-nums @error('patient.employer.address.city') border-red-700 bg-red-100 @else border-burntsienna-300 bg-lightcyan-300 @enderror" />
            @error('patient.employer.address.city')
            <span class="absolute z-10 pl-3 leading-none text-red-600 left-1 -bottom-3 text-xxs">
                {!! __($message) !!}
            </span>
            @enderror
        </div>
        <div class="flex flex-row w-3/12">&nbsp;</div>
    </div>

    <div class="flex flex-row items-center w-full pb-8 text-sm leading-relaxed">
        <div class="w-1/12 pr-2 font-bold text-right">{{ __('State') }}</div>
        <div class="relative w-2/12 text-left">
            <select name="patient[employer][address][state]"
                class="w-full pb-1 text-sm leading-loose tracking-wider transition duration-200 ease-in-out border-0 border-b-2 rounded-t-md text-gunmetal-400 focus:text-gunmetal-700 focus:bg-lightcyan-50 placeholder-gunmetal-500 placeholder-opacity-30 tabular-nums @error('patient.employer.address.state') border-red-700 bg-red-100 @else border-burntsienna-300 bg-lightcyan-300 @enderror">
                @foreach ($items['states'] as $state)
                @if($state->list_item_value == $employer->address->state)
                <option value="{{ $state->list_item_value }}" selected>
                    {{ __($state->list_item_title) }}
                </option>
                @else
                <option value="{{ $state->list_item_value }}">
                    {{ __($state->list_item_title) }}
                </option>
                @endif
                @endforeach
            </select>
            @error('patient.employer.address.state')
            <span class="absolute z-10 pl-3 leading-none text-red-600 left-1 -bottom-3 text-xxs">
                {!! __($message) !!}
            </span>
            @enderror
        </div>
        <div class="w-1/12 pr-2 font-bold text-right">{{ __('Zip') }}</div>
        <div class="relative w-2/12 text-left">
            <input type="text" name="patient[employer][address][zip]" value="{{ $employer->address->zip }}"
                class="w-full pb-1 text-sm leading-loose tracking-wider transition duration-200 ease-in-out border-0 border-b-2 rounded-t-md text-gunmetal-400 focus:text-gunmetal-700 focus:bg-lightcyan-50 placeholder-gunmetal-500 placeholder-opacity-30 tabular-nums @error('patient.employer.address.zip') border-red-700 bg-red-100 @else border-burntsienna-300 bg-lightcyan-300 @enderror" />
            @error('patient.employer.address.zip')
            <span class="absolute z-10 pl-3 leading-none text-red-600 left-1 -bottom-3 text-xxs">
                {!! __($message) !!}
            </span>
            @enderror
        </div>
        <div class="w-1/12 pr-2 font-bold text-right">{{ __('Country') }}</div>
        <div class="relative w-2/12 text-left">
            <select name="patient[employer][address][country]"
                class="w-full pb-1 text-sm leading-loose tracking-wider transition duration-200 ease-in-out border-0 border-b-2 rounded-t-md text-gunmetal-400 focus:text-gunmetal-700 focus:bg-lightcyan-50 placeholder-gunmetal-500 placeholder-opacity-30 tabular-nums @error('patient.employer.address.country') border-red-700 bg-red-100 @else border-burntsienna-300 bg-lightcyan-300 @enderror">
                @foreach ($items['countries'] as $country)
                @if($country->list_item_value == $employer->address->country)
                <option value="{{ $country->list_item_value }}" selected>
                    {{ __($country->list_item_title) }}
                </option>
                @else
                <option value="{{ $country->list_item_value }}">
                    {{ __($country->list_item_title) }}
                </option>
                @endif
                @endforeach
            </select>
            @error('patient.employer.address.country')
            <span class="absolute z-10 pl-3 leading-none text-red-600 left-1 -bottom-3 text-xxs">
                {!! __($message) !!}
            </span>
            @enderror
        </div>
        <div class="flex flex-row w-3/12">&nbsp;</div>
    </div>
    @endforeach

    <!-- DECEASED -->
    <div
        class="flex flex-row w-full px-4 py-2 mb-8 text-xl font-bold leading-relaxed uppercase bg-red-500 rounded text-lightcyan-500">
        {{ __('Decease') }}
    </div>
    @php
    $year = $month = $day = '';
    if(!empty($patient->persona->decease_date)) {
    $year = $patient->persona->decease_date->format('Y');
    $month = $patient->persona->decease_date->format('m');
    $day = $patient->persona->decease_date->format('d');
    }
    @endphp
    <div class="flex flex-row items-center w-full pb-4 text-sm leading-relaxed">
        <div class="w-1/12 pr-2 font-bold text-right">{{ __('Decease Date') }}</div>
        <div class="relative flex flex-row items-center w-2/12 text-left">
            <div class="w-3/12">
                <input type="text" name="patient[persona][decease_date][month]" value="{{ $month }}"
                    class="w-full pb-1 text-sm leading-loose tracking-wider text-center transition duration-200 ease-in-out border-0 border-b-2 rounded-t-md text-gunmetal-400 focus:text-gunmetal-700 focus:bg-lightcyan-50 placeholder-gunmetal-500 placeholder-opacity-30 tabular-nums @error('patient.employer.decease_date.month') border-red-700 bg-red-100 @else border-burntsienna-300 bg-lightcyan-300 @enderror"
                    placeholder="MM" />
            </div>
            <div class="w-1/12 font-bold text-center">/</div>
            <div class="w-3/12">
                <input type="text" name="patient[persona][decease_date][day]" value="{{ $day }}"
                    class="w-full pb-1 text-sm leading-loose tracking-wider text-center transition duration-200 ease-in-out border-0 border-b-2 rounded-t-md text-gunmetal-400 focus:text-gunmetal-700 focus:bg-lightcyan-50 placeholder-gunmetal-500 placeholder-opacity-30 tabular-nums @error('patient.employer.decease_date.day') border-red-700 bg-red-100 @else border-burntsienna-300 bg-lightcyan-300 @enderror"
                    placeholder="DD" />
            </div>
            <div class="w-1/12 font-bold text-center">/</div>
            <div class="w-4/12">
                <input type="text" name="patient[persona][decease_date][year]" value="{{ $year }}"
                    class="w-full pb-1 text-sm leading-loose tracking-wider text-center transition duration-200 ease-in-out border-0 border-b-2 rounded-t-md text-gunmetal-400 focus:text-gunmetal-700 focus:bg-lightcyan-50 placeholder-gunmetal-500 placeholder-opacity-30 tabular-nums @error('patient.employer.decease_date.year') border-red-700 bg-red-100 @else border-burntsienna-300 bg-lightcyan-300 @enderror"
                    placeholder="YYYY" />
            </div>
        </div>
        <div class="relative flex flex-row w-6/12 h-10">
            @error('patient.persona.decease_date.month')
            <span class="absolute z-10 leading-none text-red-600 top-1 left-1 text-xxs">
                {!! __($message) !!}
            </span>
            @enderror
            @error('patient.persona.decease_date.day')
            <span class="absolute z-10 leading-none text-red-600 top-4 left-1 text-xxs">
                {!! __($message) !!}
            </span>
            @enderror
            @error('patient.persona.decease_date.year')
            <span class="absolute z-10 leading-none text-red-600 top-7 left-1 text-xxs">
                {!! __($message) !!}
            </span>
            @enderror
        </div>
    </div>
    <div class="flex flex-row items-center w-full pb-8 mb-8 text-sm leading-relaxed border-b-2 border-palecerulean-300">
        <div class="w-1/12 pr-2 font-bold text-right align-top">{{ __('Reason') }}</div>
        <div class="relative w-11/12 text-left">
            <textarea rows="5" name="patient[persona][decease_reason]"
                class="w-full pb-1 text-sm leading-loose tracking-wider transition duration-200 ease-in-out border-0 border-b-2 rounded-t-md resize-none text-gunmetal-400 focus:text-gunmetal-700 focus:bg-lightcyan-50 placeholder-gunmetal-500 placeholder-opacity-30 tabular-nums @error('patient.persona.decease_reason') border-red-700 bg-red-100 @else border-burntsienna-300 bg-lightcyan-300 @enderror">{{ $patient->persona->decease_reason }}</textarea>
            @error('patient.persona.decease_reason')
            <span class="absolute z-10 leading-none text-red-600 top-40 left-1 text-xxs">
                {!! __($message) !!}
            </span>
            @enderror
        </div>
    </div>

    <!-- BUTTONS -->
    <div class="flex flex-row w-full pb-4 text-sm leading-relaxed">
        <div class="flex flex-row w-10/12">&nbsp;</div>
        <div class="flex w-2/12 text-sm">
            <button type="submit"
                class="w-1/2 py-2 ml-2 font-bold text-white uppercase transition duration-200 ease-in-out bg-green-500 rounded hover:bg-green-700">
                <i class="fas fa-save"></i>
                {{ __('Update') }}
            </button>
            <a href="{{ route('patients.show', ['patient' => $patient->patID]) }}"
                class="w-1/2 py-2 ml-2 font-bold text-white uppercase transition duration-200 ease-in-out bg-red-500 rounded hover:bg-red-700">
                <i class="fas fa-times-circle"></i>
                {{ __('Cancel') }}
            </a>
        </div>
    </div>
</form>
@endsection

@push('scripts')
@endpush
