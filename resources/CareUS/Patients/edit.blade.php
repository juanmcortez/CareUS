<x-layouts.logged>

    @section('pageTitle', $pageTitle)

    @push('styles')
    @endpush

    @section('content')
    <x-common.pageheader>{{ $pageH2 }}</x-common.pageheader>

    <form class="w-full text-center" method="POST"
        action="{{ route('patients.update', ['patient' => $patient->patID]) }}">
        @csrf
        @method('PUT')

        <!-- ID's -->
        <div
            class="flex flex-row items-center w-full pb-8 mb-8 text-sm leading-relaxed border-b-2 border-palecerulean-300">
            <div class="w-1/12 pr-2 font-bold text-right">{{ __('Created on') }}</div>
            <div class="relative w-3/12 text-left">{{ $patient->created_at_language }}</div>
            <div class="w-2/12 pr-2 font-bold text-right">{{ __('Last Update on') }}</div>
            <div class="relative w-2/12 text-left">{{ $patient->persona->updated_at_language }}</div>
            <div class="flex flex-row w-2/12">&nbsp;</div>
            <div class="flex w-2/12 text-sm">
                <x-common.forms.button id="send_button" />
                <x-common.forms.button tag="a" id="cancel_button"
                    type="{{ route('patients.show', ['patient' => $patient->patID]) }}" color="red" icon="times-circle"
                    text="Cancel" />
            </div>
        </div>

        <!-- ID's -->
        <div
            class="flex flex-row items-center w-full pb-8 mb-8 text-sm leading-relaxed border-b-2 border-palecerulean-300">
            <div class="w-1/12 pr-2 font-bold text-right">{{ __('Patient ID') }}</div>
            <div class="relative w-2/12 text-left">
                <x-common.forms.input name="patient.patID" :inputvalue="$patient->patID" classes="text-center"
                    disabled />
            </div>
            <div class="w-1/12 pr-2 font-bold text-right">{{ __('External ID') }}</div>
            <div class="relative w-2/12 text-left">
                <x-common.forms.input name="patient.externalID" :inputvalue="$patient->externalID" place="000000000000"
                    classes="text-center" />
            </div>
            <div class="flex flex-row w-6/12">&nbsp;</div>
        </div>

        <!-- NAME -->
        <div
            class="flex flex-row items-center w-full pb-8 mb-8 text-sm leading-relaxed border-b-2 border-palecerulean-300">
            <div class="w-1/12 pr-2 font-bold text-right">{{ __('Title') }}</div>
            <div class="relative w-2/12 text-left">
                <x-common.forms.select name="patient.persona.title" :options="$items['titles']"
                    :optionselected="$patient->persona->title" />
            </div>
            <div class="w-1/12 pr-2 font-bold text-right">{{ __('Last name') }}</div>
            <div class="relative w-2/12 text-left">
                <x-common.forms.input name="patient.persona.last_name" :inputvalue="$patient->persona->last_name"
                    place="Last name" />
            </div>
            <div class="w-1/12 pr-2 font-bold text-right">{{ __('First name') }}</div>
            <div class="relative w-2/12 text-left">
                <x-common.forms.input name="patient.persona.first_name" :inputvalue="$patient->persona->first_name"
                    place="First name" />
            </div>
            <div class="w-1/12 pr-2 font-bold text-right">{{ __('Middle name') }}</div>
            <div class="relative w-2/12 text-left">
                <x-common.forms.input name="patient.persona.middle_name" :inputvalue="$patient->persona->middle_name"
                    place="Middle name" />
            </div>
        </div>

        <!-- PHONES -->
        @foreach ($patient->persona->phone as $idx => $phone)
        <div class="flex flex-row items-center w-full pb-4 text-sm leading-relaxed">
            <div class="w-1/12 pr-2 font-bold text-right">{{ __('Phone #:index', ['index' => $idx+1]) }}</div>
            <div class="relative w-2/12 text-left">
                <x-common.forms.select name="patient.persona.phone.{{ $idx }}.type" :options="$items['phonetypes']"
                    :optionselected="$phone->type" />
            </div>
            <div class="flex flex-row items-center w-3/12">
                <div class="w-1/12 font-bold">+</div>
                <div class="relative w-2/12">
                    <x-common.forms.input name="patient.persona.phone.{{ $idx }}.international_code"
                        classes="text-center" :inputvalue="$phone->international_code" showerror="false" place="0" />
                </div>
                <div class="w-1/12 font-bold">(</div>
                <div class="relative w-2/12">
                    <x-common.forms.input name="patient.persona.phone.{{ $idx }}.area_code" classes="text-center"
                        :inputvalue="$phone->area_code" showerror="false" showerror="false" place="000" />
                </div>
                <div class="w-1/12 font-bold">)</div>
                <div class="relative w-2/12">
                    <x-common.forms.input name="patient.persona.phone.{{ $idx }}.initial_digits"
                        :inputvalue="$phone->initial_digits" classes="text-center" showerror="false" place="000" />
                </div>
                <div class="w-1/12 font-bold">-</div>
                <div class="relative w-2/12">
                    <x-common.forms.input name="patient.persona.phone.{{ $idx }}.last_digits"
                        :inputvalue="$phone->last_digits" classes="text-center" showerror="false" place="0000" />
                </div>
            </div>
            <div class="flex flex-row items-center w-1/12">
                <div class="w-8/12 font-bold">{{ __('Extension') }}</div>
                <div class="w-4/12">
                    <x-common.forms.input name="patient.persona.phone.{{ $idx }}.extension"
                        :inputvalue="$phone->extension" classes="text-center" showerror="false" place="00" />
                </div>
            </div>
            <div class="relative flex flex-row w-5/12 h-10">
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
                <x-common.forms.input name="patient.persona.email" :inputvalue="$patient->persona->email"
                    place="patient@email.com" />
            </div>
        </div>

        <!-- ADDRESS -->
        <div class="flex flex-row items-center w-full pb-4 text-sm leading-relaxed">
            <div class="w-1/12 pr-2 font-bold text-right">{{ __('Address') }}</div>
            <div class="relative flex flex-row w-5/12 text-left">
                <x-common.forms.input name="patient.persona.address.street"
                    :inputvalue="$patient->persona->address->street" place="Address" />
                <x-common.forms.input name="patient.persona.address.street_extended"
                    :inputvalue="$patient->persona->address->street_extended" classes="ml-4" place="Extended Address" />
            </div>
            <div class="w-1/12 pr-2 font-bold text-right">{{ __('City') }}</div>
            <div class="relative w-2/12 text-left">
                <x-common.forms.input name="patient.persona.address.city" :inputvalue="$patient->persona->address->city"
                    place="City" />
            </div>
            <div class="flex flex-row w-3/12">&nbsp;</div>
        </div>

        <div
            class="flex flex-row items-center w-full pb-8 mb-8 text-sm leading-relaxed border-b-2 border-palecerulean-300">
            <div class="w-1/12 pr-2 font-bold text-right">{{ __('State') }}</div>
            <div class="relative w-2/12 text-left">
                <x-common.forms.select name="patient.persona.address.state" :options="$items['states']"
                    :optionselected="$patient->persona->address->state" />
            </div>
            <div class="w-1/12 pr-2 font-bold text-right">{{ __('Zip') }}</div>
            <div class="relative w-2/12 text-left">
                <x-common.forms.input name="patient.persona.address.zip" :inputvalue="$patient->persona->address->zip"
                    place="Zip" />
            </div>
            <div class="w-1/12 pr-2 font-bold text-right">{{ __('Country') }}</div>
            <div class="relative w-2/12 text-left">
                <x-common.forms.select name="patient.persona.address.country" :options="$items['countries']"
                    :optionselected="$patient->persona->address->country" />
            </div>
            <div class="flex flex-row w-3/12">&nbsp;</div>
        </div>

        <!-- GENDER -->
        <div class="flex flex-row items-center w-full pb-4 text-sm leading-relaxed">
            <div class="w-1/12 pr-2 font-bold text-right ">{{ __('Gender') }}</div>
            <div class="relative w-2/12 text-left">
                <x-common.forms.select name="patient.persona.gender" :options="$items['genders']"
                    :optionselected="$patient->persona->gender" />
            </div>
            <div class="w-1/12 pr-2 font-bold text-right">{{ __('Birthday') }}</div>
            <div class="flex flex-row items-center w-2/12 text-left">
                <div class="relative w-3/12">
                    <x-common.forms.input name="patient.persona.date_of_birth.month"
                        inputvalue="{{ $patient->persona->date_of_birth->format('m') }}" classes="text-center"
                        showerror="false" place="MM" />
                </div>
                <div class="w-1/12 text-center">/</div>
                <div class="relative w-3/12">
                    <x-common.forms.input name="patient.persona.date_of_birth.day"
                        inputvalue="{{ $patient->persona->date_of_birth->format('d') }}" classes="text-center"
                        showerror="false" place="DD" />
                </div>
                <div class="w-1/12 text-center">/</div>
                <div class="relative w-4/12">
                    <x-common.forms.input name="patient.persona.date_of_birth.year"
                        inputvalue="{{ $patient->persona->date_of_birth->format('Y') }}" classes="text-center"
                        showerror="false" place="YYYY" />
                </div>
            </div>
            <div class="relative flex flex-row w-6/12 h-10">
                @error('patient.persona.date_of_birth.month')
                <span class="absolute z-10 leading-none text-red-600 top-1 left-1 text-xxs">
                    {!! __($message) !!}
                </span>
                @enderror
                @error('patient.persona.date_of_birth.day')
                <span class="absolute z-10 leading-none text-red-600 top-4 left-1 text-xxs">
                    {!! __($message) !!}
                </span>
                @enderror
                @error('patient.persona.date_of_birth.year')
                <span class="absolute z-10 leading-none text-red-600 top-7 left-1 text-xxs">
                    {!! __($message) !!}
                </span>
                @enderror
            </div>
        </div>

        <!-- ACCESSION -->
        <div
            class="flex flex-row items-center w-full pb-8 mb-8 text-sm leading-relaxed border-b-2 border-palecerulean-300">
            <div class="w-1/12 pr-2 font-bold text-right">{{ __('Accession #') }}</div>
            <div class="relative w-2/12 text-left">
                <x-common.forms.input name="patient.patient_level_accession"
                    :inputvalue="$patient->patient_level_accession" classes="text-center" place="0000000000000000" />
            </div>
            <div class="w-1/12 pr-2 font-bold text-right">{{ __('Social Security') }}</div>
            <div class="relative w-2/12 text-left">
                <x-common.forms.input name="patient.persona.social_security"
                    :inputvalue="$patient->persona->social_security" classes="text-center" place="000-00-0000" />
            </div>
            <div class="w-1/12 pr-2 font-bold text-right">{{ __('Driver License') }}</div>
            <div class="relative w-2/12 text-left">
                <x-common.forms.input name="patient.persona.driver_license"
                    :inputvalue="$patient->persona->driver_license" place="000000000000" />
            </div>
            <div class="flex flex-row w-3/12">&nbsp;</div>
        </div>

        <!-- MARITAL -->
        <div
            class="flex flex-row items-center w-full pb-8 mb-8 text-sm leading-relaxed border-b-2 border-palecerulean-300">
            <div class="w-1/12 pr-2 font-bold text-right">{{ __('Family Size') }}</div>
            <div class="relative w-2/12 text-left">
                <x-common.forms.input name="patient.persona.family_size" :inputvalue="$patient->persona->family_size" />
            </div>
            <div class="w-1/12 pr-2 font-bold text-right">{{ __('Marital Status') }}</div>
            <div class="relative w-2/12 text-left">
                <x-common.forms.select name="patient.persona.marital" :options="$items['maritals']"
                    :optionselected="$patient->persona->marital" />
            </div>
            <div class="w-1/12 pr-2 font-bold text-right">{{ __('Marital Details') }}</div>
            <div class="relative w-5/12 text-left">
                <x-common.forms.input name="patient.persona.marital_details"
                    :inputvalue="$patient->persona->marital_details" />
            </div>
        </div>

        <!-- LANGUAGE -->
        <div class="flex flex-row items-center w-full pb-4 text-sm leading-relaxed">
            <div class="w-1/12 pr-2 font-bold text-right">{{ __('Language') }}</div>
            <div class="relative w-2/12 text-left">
                <x-common.forms.select name="patient.persona.language" :options="$items['languages']"
                    :optionselected="$patient->persona->language" />
            </div>
            <div class="w-1/12 pr-2 font-bold text-right">{{ __('Ethnicity') }}</div>
            <div class="relative w-2/12 text-left">
                <x-common.forms.select name="patient.persona.ethnicity" :options="$items['ethnicities']"
                    :optionselected="$patient->persona->ethnicity" />
            </div>
            <div class="w-1/12 pr-2 font-bold text-right">{{ __('Race') }}</div>
            <div class="relative w-2/12 text-left">
                <x-common.forms.select name="patient.persona.race" :options="$items['races']"
                    :optionselected="$patient->persona->race" />
            </div>
            <div class="flex flex-row w-3/12">&nbsp;</div>
        </div>

        <!-- MIGRANT -->
        <div class="flex flex-row items-center w-full pb-4 text-sm leading-relaxed">
            <div class="w-1/12 pr-2 font-bold text-right">{{ __('Migrant / Seasonal') }}</div>
            <div class="relative w-2/12 text-left">
                <x-common.forms.input name="patient.persona.migrant_seasonal"
                    :inputvalue="$patient->persona->migrant_seasonal" />
            </div>
            <div class="w-1/12 pr-2 font-bold text-right">{{ __('Interpreter') }}</div>
            <div class="relative w-2/12 text-left">
                <x-common.forms.input name="patient.persona.interpreter" :inputvalue="$patient->persona->interpreter" />
            </div>
            <div class="w-1/12 pr-2 font-bold text-right">{{ __('Homeless') }}</div>
            <div class="relative w-2/12 text-left">
                <x-common.forms.input name="patient.persona.homeless" :inputvalue="$patient->persona->homeless" />
            </div>
            <div class="flex flex-row w-3/12">&nbsp;</div>
        </div>

        <!-- REFERRAL -->
        <div class="flex flex-row items-center w-full pb-8 text-sm leading-relaxed">
            <div class="w-1/12 pr-2 font-bold text-right">{{ __('Referral') }}</div>
            <div class="relative w-2/12 text-left">
                <x-common.forms.select name="patient.persona.referral" :options="$items['referrals']"
                    :optionselected="$patient->persona->referral" />
            </div>
            <div class="w-1/12 pr-2 font-bold text-right">{{ __('VFC') }}</div>
            <div class="relative w-2/12 text-left">
                <x-common.forms.select name="patient.persona.vfc" :options="$items['vfcs']"
                    :optionselected="$patient->persona->vfc" />
            </div>
            <div class="flex flex-row w-6/12">&nbsp;</div>
        </div>

        <!-- DECEASE -->
        <div
            class="flex flex-row w-full px-4 py-2 mb-8 text-xl font-bold leading-relaxed uppercase bg-red-500 rounded text-lightcyan-500">
            {{ __('Decease') }}
        </div>
        <div class="flex flex-row items-center w-full pb-4 text-sm leading-relaxed">
            <div class="w-1/12 pr-2 font-bold text-right">{{ __('Decease Date') }}</div>
            <div class="relative flex flex-row items-center w-2/12 text-left">
                <div class="w-3/12">
                    @if(!empty($patient->persona->decease_date))
                    <x-common.forms.input name="patient.persona.decease_date.month"
                        inputvalue="{{ $patient->persona->decease_date->format('m') }}" classes="text-center"
                        showerror="false" place="MM" />
                    @else
                    <x-common.forms.input name="patient.persona.decease_date.month" classes="text-center"
                        showerror="false" place="MM" />
                    @endif
                </div>
                <div class="w-1/12 font-bold text-center">/</div>
                <div class="w-3/12">
                    @if(!empty($patient->persona->decease_date))
                    <x-common.forms.input name="patient.persona.decease_date.day"
                        inputvalue="{{ $patient->persona->decease_date->format('d') }}" classes="text-center"
                        showerror="false" place="DD" />
                    @else
                    <x-common.forms.input name="patient.persona.decease_date.day" classes="text-center"
                        showerror="false" place="DD" />
                    @endif
                </div>
                <div class="w-1/12 font-bold text-center">/</div>
                <div class="w-4/12">
                    @if(!empty($patient->persona->decease_date))
                    <x-common.forms.input name="patient.persona.decease_date.year"
                        inputvalue="{{ $patient->persona->decease_date->format('Y') }}" classes="text-center"
                        showerror="false" place="YYYY" />
                    @else
                    <x-common.forms.input name="patient.persona.decease_date.year" classes="text-center"
                        showerror="false" place="YYYY" />
                    @endif
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
        <div class="flex flex-row items-center w-full pb-8 text-sm leading-relaxed">
            <div class="w-1/12 pr-2 font-bold text-right align-top">{{ __('Reason') }}</div>
            <div class="relative w-11/12 text-left">
                <x-common.forms.textarea name="patient.persona.decease_reason"
                    :textvalue="$patient->persona->decease_reason" />
            </div>
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
                <x-common.forms.select name="patient.contact.{{ $idx }}.contact_type" :options="$items['contacttypes']"
                    :optionselected="$contact->contact_type" />
            </div>
            <div class="flex flex-row w-9/12">&nbsp;</div>
        </div>

        <div class="flex flex-row items-center w-full pb-4 text-sm leading-relaxed">
            <div class="w-1/12 pr-2 font-bold text-right">{{ __('Title') }}</div>
            <div class="relative w-2/12 text-left">
                <x-common.forms.select name="patient.contact.{{ $idx }}.title" :options="$items['titles']"
                    :optionselected="$contact->title" />
            </div>
            <div class="w-1/12 pr-2 font-bold text-right">{{ __('Last name') }}</div>
            <div class="relative w-2/12 text-left">
                <x-common.forms.input name="patient.contact.{{ $idx }}.last_name" :inputvalue="$contact->last_name"
                    place="Last name" />
            </div>
            <div class="w-1/12 pr-2 font-bold text-right">{{ __('First name') }}</div>
            <div class="relative w-2/12 text-left">
                <x-common.forms.input name="patient.contact.{{ $idx }}.first_name" :inputvalue="$contact->first_name"
                    place="First name" />
            </div>
            <div class="w-1/12 pr-2 font-bold text-right">{{ __('Middle name') }}</div>
            <div class="relative w-2/12 text-left">
                <x-common.forms.input name="patient.contact.{{ $idx }}.middle_name" :inputvalue="$contact->middle_name"
                    place="Middle name" />
            </div>
        </div>
        <div class="flex flex-row items-center w-full pt-4 text-sm leading-relaxed">
            <div class="w-1/12 pr-2 font-bold text-right">{{ __('Phone') }}</div>
            <div class="relative w-2/12 text-left">
                <x-common.forms.select name="patient.contact.{{ $idx }}.phone.type" :options="$items['phonetypes']"
                    :optionselected="$contact->phone->first()->type" />
            </div>
            <div class="flex flex-row items-center w-3/12 ">
                <div class="w-1/12 font-bold">+</div>
                <div class="w-2/12">
                    <x-common.forms.input name="patient.contact.{{ $idx }}.phone.international_code"
                        :inputvalue="$contact->phone->first()->international_code" classes="text-center"
                        showerror="false" place="0" />
                </div>
                <div class="w-1/12 font-bold">(</div>
                <div class="w-2/12">
                    <x-common.forms.input name="patient.contact.{{ $idx }}.phone.area_code"
                        :inputvalue="$contact->phone->first()->area_code" classes="text-center" showerror="false"
                        place="000" />
                </div>
                <div class="w-1/12 font-bold">)</div>
                <div class="w-2/12">
                    <x-common.forms.input name="patient.contact.{{ $idx }}.phone.initial_digits"
                        :inputvalue="$contact->phone->first()->initial_digits" classes="text-center" showerror="false"
                        place="000" />
                </div>
                <div class="w-1/12 font-bold">-</div>
                <div class="w-2/12">
                    <x-common.forms.input name="patient.contact.{{ $idx }}.phone.last_digits"
                        :inputvalue="$contact->phone->first()->last_digits" classes="text-center" showerror="false"
                        place="000" />
                </div>
            </div>
            <div class="flex flex-row items-center w-1/12">
                <div class="w-8/12 font-bold">{{ __('Extension') }}</div>
                <div class="w-4/12">
                    <x-common.forms.input name="patient.contact.{{ $idx }}.phone.extension"
                        :inputvalue="$contact->phone->first()->extension" classes="text-center" showerror="false"
                        place="00" />
                </div>
            </div>
            <div class="relative flex flex-row w-5/12 h-10">
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

        <div class="flex flex-row items-center w-full pt-4 pb-8 text-sm leading-relaxed">
            <div class="w-1/12 pr-2 font-bold text-right">{{ __('E-mail') }}</div>
            <div class="relative w-2/12 text-left">
                <x-common.forms.input name="patient.contact.{{ $idx }}.email" :inputvalue="$contact->email"
                    place="contact@email.com" />
            </div>
        </div>

        <div class="flex flex-row items-center w-full pb-4 text-sm leading-relaxed">
            <div class="w-1/12 pr-2 font-bold text-right">{{ __('Address') }}</div>
            <div class="relative flex flex-row w-5/12 text-left">
                <x-common.forms.input name="patient.contact.{{ $idx }}.address.street"
                    :inputvalue="$contact->address->street" place="Address" />
                <x-common.forms.input name="patient.contact.{{ $idx }}.address.street_extended"
                    :inputvalue="$contact->address->street_extended" classes="ml-4" place="Extended Address" />
            </div>
            <div class="w-1/12 pr-2 font-bold text-right">{{ __('City') }}</div>
            <div class="relative w-2/12 text-left">
                <x-common.forms.input name="patient.contact.{{ $idx }}.address.city"
                    :inputvalue="$contact->address->city" place="City" />
            </div>
            <div class="flex flex-row w-3/12">&nbsp;</div>
        </div>

        <div
            class="flex flex-row items-center w-full pb-8 @if($idx != 2) mb-8 @endif text-sm leading-relaxed @if($idx != 2) border-b-2 border-palecerulean-300 @endif">
            <div class="w-1/12 pr-2 font-bold text-right">{{ __('State') }}</div>
            <div class="relative w-2/12 text-left">
                <x-common.forms.select name="patient.contact.{{ $idx }}.address.state" :options="$items['states']"
                    :optionselected="$contact->address->state" />
            </div>
            <div class="w-1/12 pr-2 font-bold text-right">{{ __('Zip') }}</div>
            <div class="relative w-2/12 text-left">
                <x-common.forms.input name="patient.contact.{{ $idx }}.address.zip" :inputvalue="$contact->address->zip"
                    place="Zip" />
            </div>
            <div class="w-1/12 pr-2 font-bold text-right">{{ __('Country') }}</div>
            <div class="relative w-2/12 text-left">
                <x-common.forms.select name="patient.contact.{{ $idx }}.address.country" :options="$items['countries']"
                    :optionselected="$contact->address->country" />
            </div>
            <div class="flex flex-row w-3/12">&nbsp;</div>
        </div>
        @endforeach

        <!-- EMPLOYMENT -->
        @foreach ($patient->employment as $idx => $employer)
        <div
            class="flex flex-row w-full px-4 py-2 mb-8 text-xl font-bold leading-relaxed uppercase rounded bg-bdazzledblue-500 text-lightcyan-500">
            {{ __('Employment') }}
        </div>
        <div
            class="flex flex-row items-center w-full pb-8 mb-8 text-sm leading-relaxed border-b-2 border-palecerulean-300">
            <div class="w-1/12 pr-2 font-bold text-right">{{ __('Company') }}</div>
            <div class="relative w-2/12 text-left">
                <x-common.forms.input name="patient.employer.company" :inputvalue="$employer->company"
                    place="Company" />
            </div>
            <div class="w-1/12 pr-2 font-bold text-right">{{ __('Occupation') }}</div>
            <div class="relative w-2/12 text-left">
                <x-common.forms.input name="patient.employer.occupation" :inputvalue="$employer->occupation"
                    place="Occupation" />
            </div>
            <div class="w-1/12 pr-2 font-bold text-right">{{ __('Monthly Income') }}</div>
            <div class="relative w-2/12 text-left">
                <x-common.forms.input name="patient.employer.monthly_income" :inputvalue="$employer->monthly_income"
                    place="0000.00" classes="text-center" />
            </div>
            <div class="w-1/12 pr-2 font-bold text-right">{{ __('Financial Review') }}</div>
            <div class="relative w-2/12 text-left">
                <x-common.forms.input name="patient.employer.financial_review" :inputvalue="$employer->financial_review"
                    place="Financial Review" />
            </div>
        </div>

        <div class="flex flex-row items-center w-full pb-4 text-sm leading-relaxed">
            <div class="w-1/12 pr-2 font-bold text-right">{{ __('Employer') }}</div>
            <div class="relative w-2/12 text-left">
                <x-common.forms.select name="patient.employer.title" :options="$items['titles']"
                    :optionselected="$employer->title" />
            </div>
            <div class="w-1/12 pr-2 font-bold text-right">{{ __('Last name') }}</div>
            <div class="relative w-2/12 text-left">
                <x-common.forms.input name="patient.employer.last_name" :inputvalue="$employer->last_name"
                    place="Last name" />
            </div>
            <div class="w-1/12 pr-2 font-bold text-right">{{ __('First name') }}</div>
            <div class="relative w-2/12 text-left">
                <x-common.forms.input name="patient.employer.first_name" :inputvalue="$employer->first_name"
                    place="First name" />
            </div>
            <div class="w-1/12 pr-2 font-bold text-right">{{ __('Middle name') }}</div>
            <div class="relative w-2/12 text-left">
                <x-common.forms.input name="patient.employer.middle_name" :inputvalue="$employer->middle_name"
                    place="Middle name" />
            </div>
        </div>

        <div class="flex flex-row items-center w-full pt-4 text-sm leading-relaxed">
            <div class="w-1/12 pr-2 font-bold text-right">{{ __('Phone') }}</div>
            <div class="relative w-2/12 text-left">
                <x-common.forms.select name="patient.employer.phone.type" :options="$items['phonetypes']"
                    :optionselected="$employer->phone->first()->type" />
            </div>
            <div class="flex flex-row items-center w-3/12">
                <div class="w-1/12 font-bold">+</div>
                <div class="w-2/12">
                    <x-common.forms.input name="patient.employer.phone.international_code"
                        :inputvalue="$employer->phone->first()->international_code" classes="text-center"
                        showerror="false" place="0" />
                </div>
                <div class="w-1/12 font-bold">(</div>
                <div class="w-2/12">
                    <x-common.forms.input name="patient.employer.phone.area_code"
                        :inputvalue="$employer->phone->first()->area_code" classes="text-center" showerror="false"
                        place="000" />
                </div>
                <div class="w-1/12 font-bold">)</div>
                <div class="w-2/12">
                    <x-common.forms.input name="patient.employer.phone.initial_digits"
                        :inputvalue="$employer->phone->first()->initial_digits" classes="text-center" showerror="false"
                        place="000" />
                </div>
                <div class="w-1/12 font-bold">-</div>
                <div class="w-2/12">
                    <x-common.forms.input name="patient.employer.phone.last_digits"
                        :inputvalue="$employer->phone->first()->last_digits" classes="text-center" showerror="false"
                        place="0000" />
                </div>
            </div>
            <div class="flex flex-row items-center w-1/12">
                <div class="w-8/12 font-bold">{{ __('Extension') }}</div>
                <div class="w-4/12">
                    <x-common.forms.input name="patient.employer.phone.extension"
                        :inputvalue="$employer->phone->first()->extension" classes="text-center" showerror="false"
                        place="00" />
                </div>
            </div>
            <div class="relative flex flex-row w-5/12 h-10">
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

        <div class="flex flex-row items-center w-full pt-4 pb-8 text-sm leading-relaxed">
            <div class="w-1/12 pr-2 font-bold text-right">{{ __('E-mail') }}</div>
            <div class="relative w-2/12 text-left">
                <x-common.forms.input name="patient.employer.email" :inputvalue="$employer->email"
                    place="employer@email.com" />
            </div>
        </div>

        <div class="flex flex-row items-center w-full pb-4 text-sm leading-relaxed">
            <div class="w-1/12 pr-2 font-bold text-right">{{ __('Address') }}</div>
            <div class="relative flex flex-row w-5/12 text-left">
                <x-common.forms.input name="patient.employer.address.street" :inputvalue="$employer->address->street"
                    place="Address" />
                <x-common.forms.input name="patient.employer.address.street_extended"
                    :inputvalue="$employer->address->street_extended" classes="ml-4" place="Extended Address" />
            </div>
            <div class="w-1/12 pr-2 font-bold text-right">{{ __('City') }}</div>
            <div class="relative w-2/12 text-left">
                <x-common.forms.input name="patient.employer.address.city" :inputvalue="$employer->address->city"
                    place="City" />
            </div>
            <div class="flex flex-row w-3/12">&nbsp;</div>
        </div>

        <div
            class="flex flex-row items-center w-full pb-8 mb-8 text-sm leading-relaxed border-b-2 border-palecerulean-300">
            <div class="w-1/12 pr-2 font-bold text-right">{{ __('State') }}</div>
            <div class="relative w-2/12 text-left">
                <x-common.forms.select name="patient.employer.address.state" :options="$items['states']"
                    :optionselected="$employer->address->state" />
            </div>
            <div class="w-1/12 pr-2 font-bold text-right">{{ __('Zip') }}</div>
            <div class="relative w-2/12 text-left">
                <x-common.forms.input name="patient.employer.address.zip" :inputvalue="$employer->address->zip"
                    place="Zip" />
            </div>
            <div class="w-1/12 pr-2 font-bold text-right">{{ __('Country') }}</div>
            <div class="relative w-2/12 text-left">
                <x-common.forms.select name="patient.employer.address.country" :options="$items['countries']"
                    :optionselected="$employer->address->country" />
            </div>
            <div class="flex flex-row w-3/12">&nbsp;</div>
        </div>
        @endforeach

        <!-- BUTTONS -->
        <div class="flex flex-row w-full pb-0 text-sm leading-relaxed">
            <div class="flex flex-row w-10/12">&nbsp;</div>
            <div class="flex w-2/12 text-sm">
                <x-common.forms.button id="send_button" />
                <x-common.forms.button tag="a" id="cancel_button"
                    type="{{ route('patients.show', ['patient' => $patient->patID]) }}" color="red" icon="times-circle"
                    text="Cancel" />
            </div>
        </div>
    </form>
    @endsection

    @push('scripts')
    @endpush
</x-layouts.logged>
