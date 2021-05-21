<x-layouts.user>

    @section('pageTitle', $pageTitle)

    @push('styles')
    @endpush

    @section('content')
    <x-common.pageheader>{{ $pageH2 }}</x-common.pageheader>

    <form class="w-full text-center" method="POST" action="{{ route('patients.store') }}">
        @csrf
        @method('POST')

        <!-- ID's -->
        <div
            class="flex flex-row items-center w-full pb-8 mb-8 text-sm leading-relaxed border-b-2 border-palecerulean-300">
            <div class="w-1/12 pr-2 font-bold text-right">{{ __('External ID') }}</div>
            <div class="relative w-2/12 text-left">
                <x-forms.input name="patient.externalID" place="000000000000" classes="text-center" />
            </div>
            <div class="flex flex-row w-7/12">&nbsp;</div>
            <div class="flex w-2/12 text-sm">
                <x-forms.button id="send_button" />
                <x-forms.button tag="a" id="cancel_button" type="{{ route('patients.list') }}" color="red"
                    icon="times-circle" text="Cancel" />
            </div>
        </div>

        <!-- NAME -->
        <div
            class="flex flex-row items-center w-full pb-8 mb-8 text-sm leading-relaxed border-b-2 border-palecerulean-300">
            <div class="w-1/12 pr-2 font-bold text-right">{{ __('Title') }}</div>
            <div class="relative w-2/12 text-left">
                <x-forms.select name="patient.persona.title" :options="$items['titles']" />
            </div>
            <div class="w-1/12 pr-2 font-bold text-right">{{ __('Last name') }}</div>
            <div class="relative w-2/12 text-left">
                <x-forms.input name="patient.persona.last_name" place="Last name" />
            </div>
            <div class="w-1/12 pr-2 font-bold text-right">{{ __('First name') }}</div>
            <div class="relative w-2/12 text-left">
                <x-forms.input name="patient.persona.first_name" place="First name" />
            </div>
            <div class="w-1/12 pr-2 font-bold text-right">{{ __('Middle name') }}</div>
            <div class="relative w-2/12 text-left">
                <x-forms.input name="patient.persona.middle_name" place="Middle name" />
            </div>
        </div>


        <!-- PHONES -->
        @foreach ($phones as $idx => $phone)
        <div class="flex flex-row items-center w-full pb-4 text-sm leading-relaxed">
            <div class="w-1/12 pr-2 font-bold text-right">{{ __('Phone #:index', ['index' => $idx+1]) }}</div>
            <div class="relative w-2/12 text-left">
                <x-forms.select name="patient.persona.phone.{{ $idx }}.type" :options="$items['phonetypes']" />
            </div>
            <div class="flex flex-row items-center w-3/12">
                <div class="w-1/12 font-bold">+</div>
                <div class="relative w-2/12">
                    <x-forms.input name="patient.persona.phone.{{ $idx }}.international_code" classes="text-center"
                        showerror="false" place="0" />
                </div>
                <div class="w-1/12 font-bold">(</div>
                <div class="relative w-2/12">
                    <x-forms.input name="patient.persona.phone.{{ $idx }}.area_code" classes="text-center"
                        showerror="false" showerror="false" place="000" />
                </div>
                <div class="w-1/12 font-bold">)</div>
                <div class="relative w-2/12">
                    <x-forms.input name="patient.persona.phone.{{ $idx }}.initial_digits" classes="text-center"
                        showerror="false" place="000" />
                </div>
                <div class="w-1/12 font-bold">-</div>
                <div class="relative w-2/12">
                    <x-forms.input name="patient.persona.phone.{{ $idx }}.last_digits" classes="text-center"
                        showerror="false" place="0000" />
                </div>
            </div>
            <div class="flex flex-row items-center w-1/12">
                <div class="w-8/12 font-bold">{{ __('Extension') }}</div>
                <div class="w-4/12">
                    <x-forms.input name="patient.persona.phone.{{ $idx }}.extension" classes="text-center"
                        showerror="false" place="00" />
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
                <x-forms.input name="patient.persona.email" place="patient@email.com" />
            </div>
        </div>

        <!-- ADDRESS -->
        <div class="flex flex-row items-center w-full pb-4 text-sm leading-relaxed">
            <div class="w-1/12 pr-2 font-bold text-right">{{ __('Address') }}</div>
            <div class="relative flex flex-row w-5/12 text-left">
                <x-forms.input name="patient.persona.address.street" place="Address" />
                <x-forms.input name="patient.persona.address.street_extended" classes="ml-4" place="Extended Address" />
            </div>
            <div class="w-1/12 pr-2 font-bold text-right">{{ __('City') }}</div>
            <div class="relative w-2/12 text-left">
                <x-forms.input name="patient.persona.address.city" place="City" />
            </div>
            <div class="flex flex-row w-3/12">&nbsp;</div>
        </div>

        <div
            class="flex flex-row items-center w-full pb-8 mb-8 text-sm leading-relaxed border-b-2 border-palecerulean-300">
            <div class="w-1/12 pr-2 font-bold text-right">{{ __('State') }}</div>
            <div class="relative w-2/12 text-left">
                <x-forms.select name="patient.persona.address.state" :options="$items['states']" />
            </div>
            <div class="w-1/12 pr-2 font-bold text-right">{{ __('Zip') }}</div>
            <div class="relative w-2/12 text-left">
                <x-forms.input name="patient.persona.address.zip" place="Zip" />
            </div>
            <div class="w-1/12 pr-2 font-bold text-right">{{ __('Country') }}</div>
            <div class="relative w-2/12 text-left">
                <x-forms.select name="patient.persona.address.country" :options="$items['countries']" />
            </div>
            <div class="flex flex-row w-3/12">&nbsp;</div>
        </div>

        <!-- GENDER -->
        <div class="flex flex-row items-center w-full pb-4 text-sm leading-relaxed">
            <div class="w-1/12 pr-2 font-bold text-right ">{{ __('Gender') }}</div>
            <div class="relative w-2/12 text-left">
                <x-forms.select name="patient.persona.gender" :options="$items['genders']" />
            </div>
            <div class="w-1/12 pr-2 font-bold text-right">{{ __('Birthday') }}</div>
            <div class="flex flex-row items-center w-2/12 text-left">
                <div class="relative w-3/12">
                    <x-forms.input name="patient.persona.date_of_birth.month" classes="text-center" showerror="false"
                        place="MM" />
                </div>
                <div class="w-1/12 text-center">/</div>
                <div class="relative w-3/12">
                    <x-forms.input name="patient.persona.date_of_birth.day" classes="text-center" showerror="false"
                        place="DD" />
                </div>
                <div class="w-1/12 text-center">/</div>
                <div class="relative w-4/12">
                    <x-forms.input name="patient.persona.date_of_birth.year" classes="text-center" showerror="false"
                        place="YYYY" />
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
                <x-forms.input name="patient.patient_level_accession" classes="text-center" place="0000000000000000" />
            </div>
            <div class="w-1/12 pr-2 font-bold text-right">{{ __('Social Security') }}</div>
            <div class="relative w-2/12 text-left">
                <x-forms.input name="patient.persona.social_security" classes="text-center" place="000-00-0000" />
            </div>
            <div class="w-1/12 pr-2 font-bold text-right">{{ __('Driver License') }}</div>
            <div class="relative w-2/12 text-left">
                <x-forms.input name="patient.persona.driver_license" place="000000000000" />
            </div>
            <div class="flex flex-row w-3/12">&nbsp;</div>
        </div>

        <!-- MARITAL -->
        <div
            class="flex flex-row items-center w-full pb-8 mb-8 text-sm leading-relaxed border-b-2 border-palecerulean-300">
            <div class="w-1/12 pr-2 font-bold text-right">{{ __('Family Size') }}</div>
            <div class="relative w-2/12 text-left">
                <x-forms.input name="patient.persona.family_size" />
            </div>
            <div class="w-1/12 pr-2 font-bold text-right">{{ __('Marital Status') }}</div>
            <div class="relative w-2/12 text-left">
                <x-forms.select name="patient.persona.marital" :options="$items['maritals']" />
            </div>
            <div class="w-1/12 pr-2 font-bold text-right">{{ __('Marital Details') }}</div>
            <div class="relative w-5/12 text-left">
                <x-forms.input name="patient.persona.marital_details" />
            </div>
        </div>

        <!-- LANGUAGE -->
        <div class="flex flex-row items-center w-full pb-4 text-sm leading-relaxed">
            <div class="w-1/12 pr-2 font-bold text-right">{{ __('Language') }}</div>
            <div class="relative w-2/12 text-left">
                <x-forms.select name="patient.persona.language" :options="$items['languages']" />
            </div>
            <div class="w-1/12 pr-2 font-bold text-right">{{ __('Ethnicity') }}</div>
            <div class="relative w-2/12 text-left">
                <x-forms.select name="patient.persona.ethnicity" :options="$items['ethnicities']" />
            </div>
            <div class="w-1/12 pr-2 font-bold text-right">{{ __('Race') }}</div>
            <div class="relative w-2/12 text-left">
                <x-forms.select name="patient.persona.race" :options="$items['races']" />
            </div>
            <div class="flex flex-row w-3/12">&nbsp;</div>
        </div>

        <!-- MIGRANT -->
        <div class="flex flex-row items-center w-full pb-4 text-sm leading-relaxed">
            <div class="w-1/12 pr-2 font-bold text-right">{{ __('Migrant / Seasonal') }}</div>
            <div class="relative w-2/12 text-left">
                <x-forms.input name="patient.persona.migrant_seasonal" />
            </div>
            <div class="w-1/12 pr-2 font-bold text-right">{{ __('Interpreter') }}</div>
            <div class="relative w-2/12 text-left">
                <x-forms.input name="patient.persona.interpreter" />
            </div>
            <div class="w-1/12 pr-2 font-bold text-right">{{ __('Homeless') }}</div>
            <div class="relative w-2/12 text-left">
                <x-forms.input name="patient.persona.homeless" />
            </div>
            <div class="flex flex-row w-3/12">&nbsp;</div>
        </div>

        <!-- REFERRAL -->
        <div class="flex flex-row items-center w-full pb-8 text-sm leading-relaxed">
            <div class="w-1/12 pr-2 font-bold text-right">{{ __('Referral') }}</div>
            <div class="relative w-2/12 text-left">
                <x-forms.select name="patient.persona.referral" :options="$items['referrals']" />
            </div>
            <div class="w-1/12 pr-2 font-bold text-right">{{ __('VFC') }}</div>
            <div class="relative w-2/12 text-left">
                <x-forms.select name="patient.persona.vfc" :options="$items['vfcs']" />
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
                    <x-forms.input name="patient.persona.decease_date.month" classes="text-center" showerror="false"
                        place="MM" />
                </div>
                <div class="w-1/12 font-bold text-center">/</div>
                <div class="w-3/12">
                    <x-forms.input name="patient.persona.decease_date.day" classes="text-center" showerror="false"
                        place="DD" />
                </div>
                <div class="w-1/12 font-bold text-center">/</div>
                <div class="w-4/12">
                    <x-forms.input name="patient.persona.decease_date.year" classes="text-center" showerror="false"
                        place="YYYY" />
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
                <x-forms.textarea name="patient.persona.decease_reason" />
            </div>
        </div>

        <!-- CONTACTS -->
        <div
            class="flex flex-row w-full px-4 py-2 mb-8 text-xl font-bold leading-relaxed uppercase rounded bg-bdazzledblue-500 text-lightcyan-500">
            {{ __('Contacts') }}
        </div>
        @foreach ($contacts as $idx => $contact)
        <div class="flex flex-row items-center w-full pb-4 text-sm leading-relaxed">
            <div class="w-1/12 pr-2 font-bold text-right">
                {{ __('Contact #:contact_id', ['contact_id' => ($idx+1)]) }}
            </div>
            <div class="relative w-2/12 text-left">
                <x-forms.select name="patient.contact.{{ $idx }}.contact_type" :options="$items['contacttypes']" />
            </div>
            <div class="flex flex-row w-9/12">&nbsp;</div>
        </div>

        <div class="flex flex-row items-center w-full pb-4 text-sm leading-relaxed">
            <div class="w-1/12 pr-2 font-bold text-right">{{ __('Title') }}</div>
            <div class="relative w-2/12 text-left">
                <x-forms.select name="patient.contact.{{ $idx }}.title" :options="$items['titles']" />
            </div>
            <div class="w-1/12 pr-2 font-bold text-right">{{ __('Last name') }}</div>
            <div class="relative w-2/12 text-left">
                <x-forms.input name="patient.contact.{{ $idx }}.last_name" place="Last name" />
            </div>
            <div class="w-1/12 pr-2 font-bold text-right">{{ __('First name') }}</div>
            <div class="relative w-2/12 text-left">
                <x-forms.input name="patient.contact.{{ $idx }}.first_name" place="First name" />
            </div>
            <div class="w-1/12 pr-2 font-bold text-right">{{ __('Middle name') }}</div>
            <div class="relative w-2/12 text-left">
                <x-forms.input name="patient.contact.{{ $idx }}.middle_name" place="Middle name" />
            </div>
        </div>

        <div class="flex flex-row items-center w-full pt-4 text-sm leading-relaxed">
            <div class="w-1/12 pr-2 font-bold text-right">{{ __('Phone') }}</div>
            <div class="relative w-2/12 text-left">
                <x-forms.select name="patient.contact.{{ $idx }}.phone.type" :options="$items['phonetypes']" />
            </div>
            <div class="flex flex-row items-center w-3/12 ">
                <div class="w-1/12 font-bold">+</div>
                <div class="w-2/12">
                    <x-forms.input name="patient.contact.{{ $idx }}.phone.international_code" classes="text-center"
                        showerror="false" place="0" />
                </div>
                <div class="w-1/12 font-bold">(</div>
                <div class="w-2/12">
                    <x-forms.input name="patient.contact.{{ $idx }}.phone.area_code" classes="text-center"
                        showerror="false" place="000" />
                </div>
                <div class="w-1/12 font-bold">)</div>
                <div class="w-2/12">
                    <x-forms.input name="patient.contact.{{ $idx }}.phone.initial_digits" classes="text-center"
                        showerror="false" place="000" />
                </div>
                <div class="w-1/12 font-bold">-</div>
                <div class="w-2/12">
                    <x-forms.input name="patient.contact.{{ $idx }}.phone.last_digits" classes="text-center"
                        showerror="false" place="000" />
                </div>
            </div>
            <div class="flex flex-row items-center w-1/12">
                <div class="w-8/12 font-bold">{{ __('Extension') }}</div>
                <div class="w-4/12">
                    <x-forms.input name="patient.contact.{{ $idx }}.phone.extension" classes="text-center"
                        showerror="false" place="00" />
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
                <x-forms.input name="patient.contact.{{ $idx }}.email" place="contact@email.com" />
            </div>
        </div>

        <div class="flex flex-row items-center w-full pb-4 text-sm leading-relaxed">
            <div class="w-1/12 pr-2 font-bold text-right">{{ __('Address') }}</div>
            <div class="relative flex flex-row w-5/12 text-left">
                <x-forms.input name="patient.contact.{{ $idx }}.address.street" place="Address" />
                <x-forms.input name="patient.contact.{{ $idx }}.address.street_extended" classes="ml-4"
                    place="Extended Address" />
            </div>
            <div class="w-1/12 pr-2 font-bold text-right">{{ __('City') }}</div>
            <div class="relative w-2/12 text-left">
                <x-forms.input name="patient.contact.{{ $idx }}.address.city" place="City" />
            </div>
            <div class="flex flex-row w-3/12">&nbsp;</div>
        </div>

        <div
            class="flex flex-row items-center w-full pb-8 @if($idx != 2) mb-8 @endif text-sm leading-relaxed @if($idx != 2) border-b-2 border-palecerulean-300 @endif">
            <div class="w-1/12 pr-2 font-bold text-right">{{ __('State') }}</div>
            <div class="relative w-2/12 text-left">
                <x-forms.select name="patient.contact.{{ $idx }}.address.state" :options="$items['states']" />
            </div>
            <div class="w-1/12 pr-2 font-bold text-right">{{ __('Zip') }}</div>
            <div class="relative w-2/12 text-left">
                <x-forms.input name="patient.contact.{{ $idx }}.address.zip" place="Zip" />
            </div>
            <div class="w-1/12 pr-2 font-bold text-right">{{ __('Country') }}</div>
            <div class="relative w-2/12 text-left">
                <x-forms.select name="patient.contact.{{ $idx }}.address.country" :options="$items['countries']" />
            </div>
            <div class="flex flex-row w-3/12">&nbsp;</div>
        </div>
        @endforeach

        <!-- EMPLOYMENT -->
        <div
            class="flex flex-row w-full px-4 py-2 mb-8 text-xl font-bold leading-relaxed uppercase rounded bg-bdazzledblue-500 text-lightcyan-500">
            {{ __('Employment') }}
        </div>
        <div
            class="flex flex-row items-center w-full pb-8 mb-8 text-sm leading-relaxed border-b-2 border-palecerulean-300">
            <div class="w-1/12 pr-2 font-bold text-right">{{ __('Company') }}</div>
            <div class="relative w-2/12 text-left">
                <x-forms.input name="patient.employer.company" place="Company" />
            </div>
            <div class="w-1/12 pr-2 font-bold text-right">{{ __('Occupation') }}</div>
            <div class="relative w-2/12 text-left">
                <x-forms.input name="patient.employer.occupation" place="Occupation" />
            </div>
            <div class="w-1/12 pr-2 font-bold text-right">{{ __('Monthly Income') }}</div>
            <div class="relative w-2/12 text-left">
                <x-forms.input name="patient.employer.monthly_income" place="0000.00" classes="text-center" />
            </div>
            <div class="w-1/12 pr-2 font-bold text-right">{{ __('Financial Review') }}</div>
            <div class="relative w-2/12 text-left">
                <x-forms.input name="patient.employer.financial_review" place="Financial Review" />
            </div>
        </div>

        <div class="flex flex-row items-center w-full pb-4 text-sm leading-relaxed">
            <div class="w-1/12 pr-2 font-bold text-right">{{ __('Employer') }}</div>
            <div class="relative w-2/12 text-left">
                <x-forms.select name="patient.employer.title" :options="$items['titles']" />
            </div>
            <div class="w-1/12 pr-2 font-bold text-right">{{ __('Last name') }}</div>
            <div class="relative w-2/12 text-left">
                <x-forms.input name="patient.employer.last_name" place="Last name" />
            </div>
            <div class="w-1/12 pr-2 font-bold text-right">{{ __('First name') }}</div>
            <div class="relative w-2/12 text-left">
                <x-forms.input name="patient.employer.first_name" place="First name" />
            </div>
            <div class="w-1/12 pr-2 font-bold text-right">{{ __('Middle name') }}</div>
            <div class="relative w-2/12 text-left">
                <x-forms.input name="patient.employer.middle_name" place="Middle name" />
            </div>
        </div>

        <div class="flex flex-row items-center w-full pt-4 text-sm leading-relaxed">
            <div class="w-1/12 pr-2 font-bold text-right">{{ __('Phone') }}</div>
            <div class="relative w-2/12 text-left">
                <x-forms.select name="patient.employer.phone.type" :options="$items['phonetypes']" />
            </div>
            <div class="flex flex-row items-center w-3/12">
                <div class="w-1/12 font-bold">+</div>
                <div class="w-2/12">
                    <x-forms.input name="patient.employer.phone.international_code" classes="text-center"
                        showerror="false" place="0" />
                </div>
                <div class="w-1/12 font-bold">(</div>
                <div class="w-2/12">
                    <x-forms.input name="patient.employer.phone.area_code" classes="text-center" showerror="false"
                        place="000" />
                </div>
                <div class="w-1/12 font-bold">)</div>
                <div class="w-2/12">
                    <x-forms.input name="patient.employer.phone.initial_digits" classes="text-center" showerror="false"
                        place="000" />
                </div>
                <div class="w-1/12 font-bold">-</div>
                <div class="w-2/12">
                    <x-forms.input name="patient.employer.phone.last_digits" classes="text-center" showerror="false"
                        place="0000" />
                </div>
            </div>
            <div class="flex flex-row items-center w-1/12">
                <div class="w-8/12 font-bold">{{ __('Extension') }}</div>
                <div class="w-4/12">
                    <x-forms.input name="patient.employer.phone.extension" classes="text-center" showerror="false"
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
                <x-forms.input name="patient.employer.email" place="employer@email.com" />
            </div>
        </div>

        <div class="flex flex-row items-center w-full pb-4 text-sm leading-relaxed">
            <div class="w-1/12 pr-2 font-bold text-right">{{ __('Address') }}</div>
            <div class="relative flex flex-row w-5/12 text-left">
                <x-forms.input name="patient.employer.address.street" place="Address" />
                <x-forms.input name="patient.employer.address.street_extended" classes="ml-4"
                    place="Extended Address" />
            </div>
            <div class="w-1/12 pr-2 font-bold text-right">{{ __('City') }}</div>
            <div class="relative w-2/12 text-left">
                <x-forms.input name="patient.employer.address.city" place="City" />
            </div>
            <div class="flex flex-row w-3/12">&nbsp;</div>
        </div>

        <div
            class="flex flex-row items-center w-full pb-8 mb-8 text-sm leading-relaxed border-b-2 border-palecerulean-300">
            <div class="w-1/12 pr-2 font-bold text-right">{{ __('State') }}</div>
            <div class="relative w-2/12 text-left">
                <x-forms.select name="patient.employer.address.state" :options="$items['states']" />
            </div>
            <div class="w-1/12 pr-2 font-bold text-right">{{ __('Zip') }}</div>
            <div class="relative w-2/12 text-left">
                <x-forms.input name="patient.employer.address.zip" place="Zip" />
            </div>
            <div class="w-1/12 pr-2 font-bold text-right">{{ __('Country') }}</div>
            <div class="relative w-2/12 text-left">
                <x-forms.select name="patient.employer.address.country" :options="$items['countries']" />
            </div>
            <div class="flex flex-row w-3/12">&nbsp;</div>
        </div>

        <!-- BUTTONS -->
        <div class="flex flex-row w-full pb-4 text-sm leading-relaxed">
            <div class="flex flex-row w-10/12">&nbsp;</div>
            <div class="flex w-2/12 text-sm">
                <x-forms.button id="send_button" />
                <x-forms.button tag="a" id="cancel_button" type="{{ route('patients.list') }}" color="red"
                    icon="times-circle" text="Cancel" />
            </div>
        </div>
    </form>
    @endsection

    @push('scripts')
    @endpush
</x-layouts.user>
