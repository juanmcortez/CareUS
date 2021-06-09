<div {{ $attributes->merge([ 'class' => 'flex flex-row flex-wrap w-full my-5' ]) }}>
    <div class="flex flex-row flex-wrap w-full mt-5 text-gunmetal-400">
        <div class="flex flex-row flex-wrap w-3/12">
            <p class="w-5/12 pr-1 font-semibold text-right">{{ __('Patient') }}</p>
            <p class="w-7/12">
                {{ __($patient->getOptionTitle('title', $patient->persona->title)).' '.$patient->persona->formated_name }}
            </p>
        </div>
        <div class="flex flex-row flex-wrap w-3/12">
            <p class="w-5/12 pr-1 font-semibold text-right">{{ __('Birthdate') }}</p>
            <p class="w-7/12">
                {{ ucfirst($patient->persona->date_of_birth->translatedFormat('M d, Y')) }}
            </p>
        </div>
        <div class="flex flex-row flex-wrap w-3/12">
            <p class="w-5/12 pr-1 font-semibold text-right">{{ __('External ID') }}</p>
            <p class="w-7/12">{{ $patient->externalID }}</p>
        </div>
        <div class="flex flex-row flex-wrap w-3/12">
            <p class="w-5/12 pr-1 font-semibold text-right">{{ __('Accession #') }}</p>
            <p class="w-7/12">{{ $patient->patient_level_accession }}</p>
        </div>
    </div>

    <div class="flex flex-row flex-wrap w-full pt-5 mt-5 border-t-2 border-gunmetal-50 text-gunmetal-400">
        <div class="flex flex-row flex-wrap w-3/12">
            <p class="w-5/12 pr-1 font-semibold text-right">{{ __('Social Security') }}</p>
            <p class="w-7/12">{{ $patient->persona->social_security }}</p>
        </div>
        <div class="flex flex-row flex-wrap w-3/12">
            <p class="w-5/12 pr-1 font-semibold text-right">{{ __('Driver License') }}</p>
            <p class="w-7/12">{{ $patient->persona->driver_license }}</p>
        </div>
        <div class="flex flex-row flex-wrap w-3/12">
            <p class="w-5/12 pr-1 font-semibold text-right">{{ __('Gender') }}</p>
            <p class="w-7/12">{{ __($patient->getOptionTitle('gender', $patient->persona->gender)) }}</p>
        </div>
        <div class="flex flex-row flex-wrap w-3/12">
            <p class="w-5/12 pr-1 font-semibold text-right">{{ __('Language') }}</p>
            <p class="w-7/12">{{ __($patient->getOptionTitle('language', $patient->persona->language)) }}</p>
        </div>
    </div>

    <div class="flex flex-row flex-wrap w-full pt-5 mt-5 border-t-2 border-gunmetal-50 text-gunmetal-400">
        <div class="flex flex-row flex-wrap w-5/12">
            <p class="w-3/12 pr-1 font-semibold text-right">{{ __('Address') }}</p>
            <p class="w-9/12">
                {{ $patient->persona->address->street }}
                @if(!empty($patient->persona->address->street_extended))
                - {{ $patient->persona->address->street_extended }}
                @endif
            </p>
        </div>
        <div class="flex flex-row flex-wrap w-1/12">&nbsp;</div>
        <div class="flex flex-row flex-wrap w-3/12">
            <p class="w-5/12 pr-1 font-semibold text-right">{{ __('City, State Zip') }}</p>
            <p class="w-7/12">
                {{ $patient->persona->address->city }},
                {{ __($patient->getSubOptionTitle('countries', $patient->persona->address->country, $patient->persona->address->state)) }}
                {{ $patient->persona->address->zip }}
            </p>
        </div>
        <div class="flex flex-row flex-wrap w-3/12">
            <p class="w-5/12 pr-1 font-semibold text-right">{{ __('Country') }}</p>
            <p class="w-7/12">{{ __($patient->getOptionTitle('countries', $patient->persona->address->country)) }}</p>
        </div>
    </div>

    <div class="flex flex-row flex-wrap w-full pt-5 mt-5 border-t-2 border-gunmetal-50 text-gunmetal-400">
        @foreach ($patient->persona->phone as $pdx => $personalphone)
        <div class="flex flex-row flex-wrap w-3/12">
            <p class="w-5/12 pr-1 font-semibold text-right">
                {{ __($patient->getOptionTitle('phonetype', $personalphone->type)) }}
            </p>
            <p class="w-7/12">{{ $personalphone->formated_phone }}</p>
        </div>
        @endforeach
        <div class="flex flex-row flex-wrap w-6/12">&nbsp;</div>
    </div>

    <div class="flex flex-row flex-wrap w-full pt-5 my-5 border-t-2 border-gunmetal-50 text-gunmetal-400">
        <div class="flex flex-row flex-wrap w-3/12">
            <p class="w-5/12 pr-1 font-semibold text-right">{{ __('E-mail') }}</p>
            <p class="w-7/12">{{ $patient->persona->email }}</p>
        </div>
        <div class="flex flex-row flex-wrap w-6/12">&nbsp;</div>
        <div class="flex flex-row flex-wrap w-3/12 text-gunmetal-300">
            <p class="w-5/12 pr-1 font-semibold text-right">{{ __('Last Update on') }}</p>
            <p class="w-7/12">{{ $patient->persona->updated_at_language }}</p>
        </div>
    </div>
</div>
