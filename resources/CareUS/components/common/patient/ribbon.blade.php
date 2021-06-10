@props(['patient'])

{{-- Patient image --}}
<div class="flex flex-row items-center justify-center w-1/12">
    <div
        class="flex flex-row items-center justify-center w-20 h-20 overflow-hidden border-4 rounded-full text-burntsienna-400 bg-burntsienna-200 border-burntsienna-400">
        @isset($patient->persona->profile_picture)
        <img alt="{{ $patient->persona->formated_name }}" src="{{ $patient->persona->profile_picture }}" />
        @else
        <i class="text-6xl fas fa-user-circle"></i>
        @endisset
    </div>
</div>

{{-- Patient Dates --}}
<div class="flex flex-col items-start justify-center w-2/12">
    <p class="flex flex-row w-full ">
        <span class="w-5/12 pr-1 font-bold text-right ">{{ __('ID') }}</span>
        <span class="w-7/12 overflow-hidden ">{{ $patient->patID }}</span>
    </p>
    <p class="flex flex-row w-full mt-2 ">
        <span class="w-5/12 pr-1 font-bold text-right ">{{ __('External ID') }}</span>
        <span class="w-7/12 overflow-hidden ">{{ $patient->externalID }}</span>
    </p>
    <p class="flex flex-row w-full mt-2 text-gunmetal-300">
        <span class="w-5/12 pr-1 font-bold text-right">{{ __('Created on') }}</span>
        <span class="w-7/12 overflow-hidden">{{ $patient->created_at_language }}</span>
    </p>
    {{-- <p class="flex flex-row w-full mt-2 text-gunmetal-300">
        <span class="w-5/12 pr-1 font-bold text-right ">{{ __('Last Update on') }}</span>
    <span class="w-7/12 overflow-hidden ">{{ $patient->persona->updated_at_language }}</span>
    </p> --}}
</div>

{{-- Social --}}
<div class="flex flex-col items-start justify-center w-2/12 ">
    @if(!$patient->persona->decease_date)
    <p class="flex flex-row w-full">
        <span class="w-5/12 pr-1 font-bold text-right ">{{ __('Birthdate') }}</span>
        <span class="w-7/12 overflow-hidden ">
            {{ $patient->persona->date_of_birth_language }}
            <strong>({{ $patient->persona->current_age }})</strong>
        </span>
    </p>
    <p class="flex flex-row w-full mt-2 text-red-500 ">&nbsp;</p>
    @else
    <p class="flex flex-row w-full">
        <span class="w-5/12 pr-1 font-bold text-right ">{{ __('Birthdate') }}</span>
        <span class="w-7/12 overflow-hidden ">
            {{ $patient->persona->date_of_birth_language }}
        </span>
    </p>
    <p class="flex flex-row w-full mt-2 text-red-500 ">
        <span class="w-5/12 pr-1 font-bold text-right ">{{ __('Decease') }}</span>
        <span class="w-7/12 overflow-hidden ">
            {{ $patient->persona->decease_date_language }}
            <strong>({{ $patient->persona->current_age }})</strong>
        </span>
    </p>
    @endif
    <p class="flex flex-row w-full mt-2 ">
        <span class="w-5/12 pr-1 font-bold text-right ">{{ __('SSN') }}</span>
        <span class="w-7/12 overflow-hidden ">{{ $patient->persona->social_security }}</span>
    </p>
    {{-- <p class="flex flex-row w-full mt-2 ">
        <span class="w-5/12 pr-1 font-bold text-right ">{{ __('Accession #') }}</span>
    <span class="w-7/12 overflow-hidden ">{{ $patient->patient_level_accession }}</span>
    </p> --}}
</div>

{{-- Patient address --}}
<div class="flex flex-col items-start justify-center w-4/12 ">
    <p class="flex flex-row w-full ">
        <span class="w-3/12 pr-1 font-bold text-right ">{{ __('Address') }}</span>
        <span class="w-9/12 overflow-hidden ">
            {{ $patient->persona->address->street }} - {{ $patient->persona->address->street_extended }}
        </span>
    </p>
    <p class="flex flex-row w-full mt-2 ">
        <span class="w-3/12 pr-1 font-bold text-right ">&nbsp;</span>
        <span class="w-9/12 overflow-hidden ">
            {{ $patient->persona->address->city }}, {{ $patient->persona->address->state }}
            {{ $patient->persona->address->zip }}
        </span>
    </p>
    {{-- <p class="flex flex-row w-full mt-2 ">&nbsp;</p> --}}
    <p class="flex flex-row w-full mt-2 ">
        <span class="w-3/12 pr-1 font-bold text-right ">{{ __('Phone') }}</span>
        <span class="w-9/12 overflow-hidden ">{{ $patient->persona->phone->first()->formated_phone }}</span>
    </p>
</div>

{{-- Insurance --}}
<div class="flex flex-col items-start justify-center w-3/12 ">
    <p class="flex flex-row w-full ">
        <span class="w-4/12 pr-1 font-bold text-right ">
            {{ __(ucfirst($patient->subscriber->first()->level).' Ins.') }}
        </span>
        <span class="w-8/12 overflow-hidden ">{{ $patient->subscriber->first()->insurance->company_name }}</span>
    </p>
    <p class="flex flex-row w-full mt-2 ">
        <span class="w-4/12 pr-1 font-bold text-right ">{{ __('Policy #') }}</span>
        <span class="w-8/12 overflow-hidden ">
            {{ $patient->subscriber->first()->policy_number }}
        </span>
    </p>
    <p class="flex flex-row w-full mt-2 ">
        <span class="w-4/12 pr-1 font-bold text-right ">{{ __('Ins. Phone') }}</span>
        <span class="w-8/12 overflow-hidden ">
            {{ $patient->subscriber->first()->insurance->phone->formated_phone }}
        </span>
    </p>
</div>
