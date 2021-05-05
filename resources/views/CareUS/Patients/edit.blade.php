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
                class="w-1/2 py-2 ml-2 font-bold text-white uppercase bg-green-500 rounded hover:bg-green-700">
                <i class="fas fa-save"></i>
                {{ __('Update') }}
            </button>
            <a href="{{ route('patients.show', ['patient' => $patient->patID]) }}"
                class="w-1/2 py-2 ml-2 font-bold text-white uppercase bg-red-500 rounded hover:bg-red-700">
                <i class="fas fa-times-circle"></i>
                {{ __('Cancel') }}
            </a>
        </div>
    </div>

    <div class="flex flex-row items-center w-full pb-8 mb-8 text-sm leading-relaxed border-b-2 border-palecerulean-300">
        <div class="w-1/12 pr-2 font-bold text-right">{{ __('Patient ID') }}</div>
        <div class="w-2/12 text-left">
            <input type="text" name="patient[patID]" value="{{ $patient->patID }}" disabled
                class="w-full p-2 text-gray-500 border-b-2 border-blue-400 focus:outline-none" />
        </div>
        <div class="w-1/12 pr-2 font-bold text-right">{{ __('External ID') }}</div>
        <div class="w-2/12 text-left">
            <input type="text" name="patient[externalID]" value="{{ $patient->externalID }}"
                class="w-full p-2 text-gray-500 bg-blue-100 border-b-2 border-blue-400 focus:outline-none" />
        </div>
        <div class="w-1/12 pr-2 font-bold text-right">{{ __('Accession #') }}</div>
        <div class="w-2/12 text-left">
            <input type="text" name="patient[patient_level_accession]" value="{{ $patient->patient_level_accession }}"
                class="w-full p-2 text-gray-500 bg-blue-100 border-b-2 border-blue-400 focus:outline-none" />
        </div>
        <div class="flex flex-row w-3/12">&nbsp;</div>
    </div>

    <div class="flex flex-row items-center w-full pb-8 mb-8 text-sm leading-relaxed border-b-2 border-palecerulean-300">
        <div class="w-1/12 pr-2 font-bold text-right">{{ __('Title') }}</div>
        <div class="w-2/12 text-left">
            <select name="patient[persona][title]"
                class="w-full p-2 text-gray-500 bg-blue-100 border-b-2 border-blue-400 focus:outline-none">
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
        </div>
        <div class="w-1/12 pr-2 font-bold text-right">{{ __('Last name') }}</div>
        <div class="w-2/12 text-left">
            <input type="text" name="patient[persona][last_name]" value="{{ $patient->persona->last_name }}"
                class="w-full p-2 text-gray-500 bg-blue-100 border-b-2 border-blue-400 focus:outline-none" />
        </div>
        <div class="w-1/12 pr-2 font-bold text-right">{{ __('First name') }}</div>
        <div class="w-2/12 text-left">
            <input type="text" name="patient[persona][first_name]" value="{{ $patient->persona->first_name }}"
                class="w-full p-2 text-gray-500 bg-blue-100 border-b-2 border-blue-400 focus:outline-none" />
        </div>
        <div class="w-1/12 pr-2 font-bold text-right">{{ __('Middle name') }}</div>
        <div class="w-2/12 text-left">
            <input type="text" name="patient[persona][middle_name]" value="{{ $patient->persona->middle_name }}"
                class="w-full p-2 text-gray-500 bg-blue-100 border-b-2 border-blue-400 focus:outline-none" />
        </div>
    </div>

    <div class="flex flex-row items-center w-full pb-4 text-sm leading-relaxed">
        <div class="w-1/12 pr-2 font-bold text-right">{{ __('Address') }}</div>
        <div class="flex flex-row w-5/12 text-left">
            <input type="text" name="patient[persona][address][street]" value="{{ $patient->persona->address->street }}"
                class="w-full p-2 text-gray-500 bg-blue-100 border-b-2 border-blue-400 focus:outline-none" />
            <input type="text" name="patient[persona][address][street_extended]"
                value="{{ $patient->persona->address->street_extended }}"
                class="w-full p-2 ml-4 text-gray-500 bg-blue-100 border-b-2 border-blue-400 focus:outline-none" />
        </div>
        <div class="w-1/12 pr-2 font-bold text-right">{{ __('City') }}</div>
        <div class="w-2/12 text-left">
            <input type="text" name="patient[persona][address][city]" value="{{ $patient->persona->address->city }}"
                class="w-full p-2 text-gray-500 bg-blue-100 border-b-2 border-blue-400 focus:outline-none" />
        </div>
        <div class="flex flex-row w-3/12">&nbsp;</div>
    </div>

    <div class="flex flex-row items-center w-full pb-4 text-sm leading-relaxed">
        <div class="w-1/12 pr-2 font-bold text-right">{{ __('State') }}</div>
        <div class="w-2/12 text-left">
            <select name="patient[persona][address][state]"
                class="w-full p-2 text-gray-500 bg-blue-100 border-b-2 border-blue-400 focus:outline-none">
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
        </div>
        <div class="w-1/12 pr-2 font-bold text-right">{{ __('Zip') }}</div>
        <div class="w-2/12 text-left">
            <input type="text" name="patient[persona][address][zip]" value="{{ $patient->persona->address->zip }}"
                class="w-full p-2 text-gray-500 bg-blue-100 border-b-2 border-blue-400 focus:outline-none" />
        </div>
        <div class="w-1/12 pr-2 font-bold text-right">{{ __('Country') }}</div>
        <div class="w-2/12 text-left">
            <select name="patient[persona][address][country]"
                class="w-full p-2 text-gray-500 bg-blue-100 border-b-2 border-blue-400 focus:outline-none">
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
        </div>
        <div class="flex flex-row w-3/12">&nbsp;</div>
    </div>

    @foreach ($patient->persona->phone as $idx => $phone)
    <div class="flex flex-row items-center w-full pb-4 text-sm leading-relaxed">
        <div class="w-1/12 pr-2 font-bold text-right">{{ __('Phone') }}</div>
        <div class="w-2/12 text-left">
            <select name="patient[persona][phone][{{ $idx }}][type]"
                class="w-full p-2 text-gray-500 bg-blue-100 border-b-2 border-blue-400 focus:outline-none">
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
        </div>
        <div class="flex flex-row items-center w-3/12 ">
            <div class="w-1/12">+</div>
            <div class="w-2/12">
                <input type="text" name="patient[persona][phone][{{ $idx }}][international_code]"
                    value="{{ $phone->international_code }}"
                    class="w-full p-2 text-center text-gray-500 bg-blue-100 border-b-2 border-blue-400 focus:outline-none" />
            </div>
            <div class="w-1/12">(</div>
            <div class="w-2/12">
                <input type="text" name="patient[persona][phone][{{ $idx }}][area_code]" value="{{ $phone->area_code }}"
                    class="w-full p-2 text-center text-gray-500 bg-blue-100 border-b-2 border-blue-400 focus:outline-none" />
            </div>
            <div class="w-1/12">)</div>
            <div class="w-2/12">
                <input type="text" name="patient[persona][phone][{{ $idx }}][initial_digits]"
                    value="{{ $phone->initial_digits }}"
                    class="w-full p-2 text-center text-gray-500 bg-blue-100 border-b-2 border-blue-400 focus:outline-none" />
            </div>
            <div class="w-1/12">-</div>
            <div class="w-2/12">
                <input type="text" name="patient[persona][phone][{{ $idx }}][last_digits]"
                    value="{{ $phone->last_digits }}"
                    class="w-full p-2 text-center text-gray-500 bg-blue-100 border-b-2 border-blue-400 focus:outline-none" />
            </div>
        </div>
        <div class="flex flex-row w-6/12">&nbsp;</div>
    </div>
    @endforeach

    <div class="flex flex-row items-center w-full pb-8 mb-8 text-sm leading-relaxed border-b-2 border-palecerulean-300">
        <div class="w-1/12 pr-2 font-bold text-right">{{ __('E-mail') }}</div>
        <div class="w-3/12 text-left">
            <input type="text" name="patient[persona][email]" value="{{ $patient->persona->email }}"
                class="w-full p-2 text-gray-500 bg-blue-100 border-b-2 border-blue-400 focus:outline-none" />
        </div>
        <div class="flex flex-row w-8/12">&nbsp;</div>
    </div>

    <div class="flex flex-row items-center w-full pb-8 mb-8 text-sm leading-relaxed border-b-2 border-palecerulean-300">
        <div class="w-1/12 pr-2 font-bold text-right">{{ __('Gender') }}</div>
        <div class="w-2/12 text-left">
            <select name="patient[persona][gender]"
                class="w-full p-2 text-gray-500 bg-blue-100 border-b-2 border-blue-400 focus:outline-none">
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
        </div>
        <div class="w-1/12 pr-2 font-bold text-right">{{ __('Birthday') }}</div>
        <div class="flex flex-row items-center w-2/12 text-left">
            <div class="w-3/12">
                <input type="text" name="patient[persona][dob][month]"
                    value="{{ $patient->persona->date_of_birth->format('m') }}"
                    class="w-full p-2 text-center text-gray-500 bg-blue-100 border-b-2 border-blue-400 focus:outline-none" />
            </div>
            <div class="w-1/12 text-center">-</div>
            <div class="w-3/12">
                <input type="text" name="patient[persona][dob][day]"
                    value="{{ $patient->persona->date_of_birth->format('d') }}"
                    class="w-full p-2 text-center text-gray-500 bg-blue-100 border-b-2 border-blue-400 focus:outline-none" />
            </div>
            <div class="w-1/12 text-center">-</div>
            <div class="w-3/12">
                <input type="text" name="patient[persona][dob][year]"
                    value="{{ $patient->persona->date_of_birth->format('Y') }}"
                    class="w-full p-2 text-center text-gray-500 bg-blue-100 border-b-2 border-blue-400 focus:outline-none" />
            </div>
        </div>
        <div class="w-1/12 pr-2 font-bold text-right">{{ __('Social security') }}</div>
        <div class="w-2/12 text-left">
            <input type="text" name="patient[persona][social_security]" value="{{ $patient->persona->social_security }}"
                class="w-full p-2 text-gray-500 bg-blue-100 border-b-2 border-blue-400 focus:outline-none" />
        </div>
        <div class="flex flex-row w-3/12">&nbsp;</div>
    </div>

    <div class="flex flex-row w-full pb-4 text-sm leading-relaxed">
        <div class="flex flex-row w-10/12">&nbsp;</div>
        <div class="flex w-2/12 text-sm">
            <button type="submit"
                class="w-1/2 py-2 ml-2 font-bold text-white uppercase bg-green-500 rounded hover:bg-green-700">
                <i class="fas fa-save"></i>
                {{ __('Update') }}
            </button>
            <a href="{{ route('patients.show', ['patient' => $patient->patID]) }}"
                class="w-1/2 py-2 ml-2 font-bold text-white uppercase bg-red-500 rounded hover:bg-red-700">
                <i class="fas fa-times-circle"></i>
                {{ __('Cancel') }}
            </a>
        </div>
    </div>
</form>
@endsection

@push('scripts')
@endpush
