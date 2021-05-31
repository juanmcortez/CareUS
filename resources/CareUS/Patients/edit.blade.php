<x-layouts.logged>

    @section('pageTitle', $pageTitle)

    @push('styles')
    @endpush

    @section('content')
    <form class="w-full" method="POST" action="{{ route('patients.update', ['patient' => $patient->patID]) }}">
        @csrf
        @method('PUT')

        <x-common.pageheader formsave formcancel="{{ route('patients.show', ['patient' => $patient->patID]) }}"
            class="pt-10 pb-16">
            {{ $pageH2 }}
        </x-common.pageheader>

        <div class="flex flex-row flex-wrap">
            <div class="flex flex-row items-center justify-start w-3/12">
                <x-common.forms.label for="created" class="w-4/12 text-right">
                    {{ __('Created on') }}
                </x-common.forms.label>
                <x-common.forms.input id="created" class="w-8/12" type="text" :value="$patient->created_at_language"
                    disabled />
            </div>
            <div class="flex flex-row items-center justify-start w-3/12">
                <x-common.forms.label for="created" class="w-4/12 text-right">
                    {{ __('Last Update on') }}
                </x-common.forms.label>
                <x-common.forms.input id="created" class="w-8/12" type="text"
                    :value="$patient->persona->updated_at_language" disabled />
            </div>
        </div>

        <hr class="w-full mb-16 border-none" />

        <x-common.persona.name class="w-full mb-4" item="patient.persona" :values="$patient->persona"
            :titleList="$items['titles']" />
        <x-common.persona.gender class="w-full mb-4" item="patient.persona" :values="$patient->persona"
            :genderList="$items['genders']" />

        <hr class="w-full mb-16 border-none" />

        <x-common.persona.created class="w-full mb-4" item="patient" :values="$patient" />
        <x-common.persona.social class="w-full mb-4" item="patient" :values="$patient" :showpatlvlacc="true" />

        <hr class="w-full mb-16 border-none" />

        <x-common.persona.language class="w-full mb-4" item="patient.persona" :values="$patient->persona"
            :langList="$items['languages']" />

        <hr class="w-full mb-16 border-none" />

        <x-common.persona.address class="w-full mb-4" item="patient.persona.address"
            :values="$patient->persona->address" :countryList="$items['countries']" :stateList="$items['states']" />

        <hr class="w-full mb-16 border-none" />

        @foreach ($patient->persona->phone as $idx => $phone)
        <x-common.persona.phone class="w-full mb-4" item="{{ 'patient.persona.phone.'.$idx }}" :values="$phone"
            :idx="$idx" :phoneList="$items['phonetypes']" />
        @endforeach

        <hr class="w-full mb-16 border-none" />

        <x-common.persona.email class="w-full mb-4" item="patient.persona" :values="$patient->persona" />

        <hr class="w-full mb-16 border-none" />

        @foreach ($patient->contact as $idx => $contact)
        <x-common.contact.type class="w-full mb-4" item="{{ 'patient.contact.'.$idx }}" :values="$contact" :idx="$idx"
            :titleList="$items['contacttypes']" />
        <x-common.persona.name class="w-full mb-4" item="{{ 'patient.contact.'.$idx }}" :values="$contact"
            :titleList="$items['titles']" />
        @foreach ($contact->phone as $jdx => $phone)
        <x-common.persona.phone class="w-full mb-4" item="{{ 'patient.contact.'.$idx.'.phone' }}" :values="$phone"
            :idex="$jdx" :phoneList="$items['phonetypes']" />
        @endforeach
        <x-common.persona.email class="w-full mb-4" item="{{ 'patient.contact.'.$idx }}" :values="$contact" />
        <x-common.persona.address class="w-full mb-4" item="{{ 'patient.contact.'.$idx.'.address' }}"
            :values="$contact->address" :countryList="$items['countries']" :stateList="$items['states']" />
        @unless ($idx>1)
        <hr class="w-full mb-16 border-none" />
        @endunless
        @endforeach

        <hr class="w-full mb-16 border-none" />

        <x-common.employer.details class="w-full mb-4" item="patient.employment"
            :values="$patient->employment->first()" />
        <hr class="w-full mb-16 border-none" />
        <x-common.persona.name class="w-full mb-4" item="patient.employment" :values="$patient->employment->first()"
            :titleList="$items['titles']" title="Employer" />
        @foreach ($patient->employment->first()->phone as $idx => $phone)
        <x-common.persona.phone class="w-full mb-4" item="patient.employment.phone" :values="$phone" :idex="$idx"
            :phoneList="$items['phonetypes']" />
        @endforeach
        <x-common.persona.email class="w-full mb-4" item="patient.employment" :values="$patient->employment->first()" />
        <hr class="w-full mb-16 border-none" />
        <x-common.persona.address class="w-full mb-4" item="patient.employment.address"
            :values="$patient->employment->first()->address" :countryList="$items['countries']"
            :stateList="$items['states']" />

        <hr class="w-full mb-16 border-none" />

        <x-common.persona.marital class="w-full mb-4" item="patient.persona" :values="$patient->persona"
            :maritList="$items['maritals']" />
        <hr class="w-full mb-16 border-none" />
        <x-common.persona.race class="w-full mb-4" item="patient.persona" :values="$patient->persona"
            :raceList="$items['races']" :ethnicList="$items['ethnicities']" />
        <x-common.persona.others class="w-full mb-4" item="patient.persona" :values="$patient->persona"
            :referList="$items['referrals']" :vfcList="$items['vfcs']" />

        <hr class="w-full mb-16 border-none" />

        <x-common.persona.decease class="w-full mb-0" item="patient.persona" :values="$patient->persona" />

        <!-- BUTTONS -->
        <x-common.pageheader formsave formcancel="{{ route('patients.show', ['patient' => $patient->patID]) }}"
            class="pt-16 pb-10" />
    </form>
    @endsection

    @push('scripts')
    @endpush
</x-layouts.logged>
