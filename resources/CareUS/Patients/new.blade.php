<x-layouts.logged>
    @section('pageTitle', $pageTitle)

    @push('styles')
    @endpush

    @section('content')
    <form class="w-full" method="POST" action="{{ route('patients.store') }}">
        @csrf
        @method('POST')

        <!-- BUTTONS -->
        <x-common.pageheader formsave formcancel="{{ route('patients.list') }}" class="pt-10 pb-16">
            {{ $pageH2 }}
        </x-common.pageheader>

        <div class="flex flex-col" x-data="{ activeTab: 1}">
            <div class="flex flex-row items-center justify-center w-8/12">
                <a @click.prevent="activeTab=1"
                    :class="activeTab===1 ? 'text-bdazzledblue-400 bg-gunmetal-50 font-semibold' : 'text-gunmetal-50 bg-bdazzledblue-400'"
                    class="w-2/12 py-3 mx-1 tracking-wider text-center transition-colors duration-150 ease-in-out rounded-t cursor-pointer hover:text-gunmetal-50 hover:bg-bdazzledblue-500">
                    {{ __('Patient') }}
                </a>
                <a @click.prevent="activeTab=2"
                    :class="activeTab===2 ? 'text-bdazzledblue-400 bg-gunmetal-50 font-semibold' : 'text-gunmetal-50 bg-bdazzledblue-400'"
                    class="w-2/12 py-3 mx-1 tracking-wider text-center transition-colors duration-150 ease-in-out rounded-t cursor-pointer hover:text-gunmetal-50 hover:bg-bdazzledblue-500">
                    {{ __('Demographics') }}
                </a>
                <a @click.prevent="activeTab=3"
                    :class="activeTab===3 ? 'text-bdazzledblue-400 bg-gunmetal-50 font-semibold' : 'text-gunmetal-50 bg-bdazzledblue-400'"
                    class="w-2/12 py-3 mx-1 tracking-wider text-center transition-colors duration-150 ease-in-out rounded-t cursor-pointer hover:text-gunmetal-50 hover:bg-bdazzledblue-500">
                    {{ __('Contacts') }}
                </a>
                <a @click.prevent="activeTab=4"
                    :class="activeTab===4 ? 'text-bdazzledblue-400 bg-gunmetal-50 font-semibold' : 'text-gunmetal-50 bg-bdazzledblue-400'"
                    class="w-2/12 py-3 mx-1 tracking-wider text-center transition-colors duration-150 ease-in-out rounded-t cursor-pointer hover:text-gunmetal-50 hover:bg-bdazzledblue-500">
                    {{ __('Employment') }}
                </a>
                <a @click.prevent="activeTab=5"
                    :class="activeTab===5 ? 'text-bdazzledblue-400 bg-gunmetal-50 font-semibold' : 'text-gunmetal-50 bg-bdazzledblue-400'"
                    class="w-2/12 py-3 mx-1 tracking-wider text-center transition-colors duration-150 ease-in-out rounded-t cursor-pointer hover:text-gunmetal-50 hover:bg-bdazzledblue-500">
                    {{ __('Insurances') }}
                </a>
                <a @click.prevent="activeTab=6"
                    :class="activeTab===6 ? 'text-bdazzledblue-400 bg-gunmetal-50 font-semibold' : 'text-gunmetal-50 bg-bdazzledblue-400'"
                    class="w-2/12 py-3 mx-1 tracking-wider text-center transition-colors duration-150 ease-in-out rounded-t cursor-pointer hover:text-gunmetal-50 hover:bg-bdazzledblue-500">
                    {{ __('Options') }}
                </a>
                <a @click.prevent="activeTab=7"
                    :class="activeTab===7 ? 'text-bdazzledblue-400 bg-gunmetal-50 font-semibold' : 'text-gunmetal-50 bg-bdazzledblue-400'"
                    class="w-2/12 py-3 mx-1 tracking-wider text-center transition-colors duration-150 ease-in-out rounded-t cursor-pointer hover:text-gunmetal-50 hover:bg-bdazzledblue-500">
                    {{ __('Others') }}
                </a>
                <a @click.prevent="activeTab=8"
                    :class="activeTab===8 ? 'text-red-400 bg-red-50 font-semibold' : 'text-red-50 bg-red-400'"
                    class="w-2/12 py-3 mx-1 tracking-wider text-center transition-colors duration-150 ease-in-out rounded-t cursor-pointer hover:text-red-50 hover:bg-red-500">
                    {{ __('Decease') }}
                </a>
            </div>
            <div class="border-t-2 border-b-2 bg-gunmetal-100 border-gunmetal-50">

                {{-- Patient --}}
                <div x-show="activeTab===1" class="p-10 transition-all duration-150 ease-in-out">
                    <x-common.persona.name class="w-full mb-4" item="patient.persona" :titleList="$items['titles']" />
                    <x-common.persona.gender class="w-full mb-4" item="patient.persona"
                        :genderList="$items['genders']" />

                    <hr class="w-full mb-8 border-none" />

                    <x-common.persona.created class="w-full mb-4" item="patient" />
                    <x-common.persona.social class="w-full mb-0" item="patient" :showpatlvlacc="true" />

                    <hr class="w-full mb-8 border-none" />

                    <x-common.persona.language class="w-full mb-0" item="patient.persona"
                        :langList="$items['languages']" />
                </div>

                {{-- Demographics --}}
                <div x-show="activeTab===2" class="p-10 transition-all duration-150 ease-in-out">
                    <x-common.persona.address class="w-full mb-4" item="patient.persona.address"
                        :countryList="$items['countries']" :stateList="$items['states']" />

                    <hr class="w-full mb-8 border-none" />

                    @foreach ($phones as $idx => $phone)
                    <x-common.persona.phone class="w-full mb-4" item="{{ 'patient.persona.phone.'.$idx }}" :idx="$idx"
                        :phoneList="$items['phonetypes']" />
                    @endforeach

                    <hr class="w-full mb-8 border-none" />

                    <x-common.persona.email class="w-full mb-0" item="patient.persona" />
                </div>

                {{-- Contacts --}}
                <div x-show="activeTab===3" class="p-10 transition-all duration-150 ease-in-out">
                    @foreach ($contacts as $idx => $contact)
                    <x-common.contact.type class="w-full mb-4" item="{{ 'patient.contact.'.$idx }}" :idx="$idx"
                        :titleList="$items['contacttypes']" />
                    <x-common.persona.name class="w-full mb-4" item="{{ 'patient.contact.'.$idx }}"
                        :titleList="$items['titles']" />
                    <x-common.persona.phone class="w-full mb-4" item="{{ 'patient.contact.'.$idx.'.phone' }}"
                        :phoneList="$items['phonetypes']" />
                    <x-common.persona.email class="w-full mb-4" item="{{ 'patient.contact.'.$idx }}" />
                    <x-common.persona.address class="w-full mb-4" item="{{ 'patient.contact.'.$idx.'.address' }}"
                        :countryList="$items['countries']" :stateList="$items['states']" />
                    @unless ($idx>1)
                    <hr class="w-full mb-16 border-none" />
                    @endunless
                    @endforeach
                </div>

                {{-- Employment --}}
                <div x-show="activeTab===4" class="p-10 transition-all duration-150 ease-in-out">
                    <x-common.employer.details class="w-full mb-4" item="patient.employer" />
                    <hr class="w-full mb-8 border-none" />
                    <x-common.persona.name class="w-full mb-4" item="patient.employer" :titleList="$items['titles']"
                        title="Employer" />
                    <x-common.persona.phone class="w-full mb-4" item="patient.employer.phone"
                        :phoneList="$items['phonetypes']" />
                    <x-common.persona.email class="w-full mb-4" item="patient.employer" />
                    <hr class="w-full mb-8 border-none" />
                    <x-common.persona.address class="w-full mb-4" item="patient.employer.address"
                        :countryList="$items['countries']" :stateList="$items['states']" />
                </div>

                {{-- Insurances --}}
                <div x-show="activeTab===5" class="p-10 transition-all duration-150 ease-in-out">
                    {{ __('Insurances Content') }}
                </div>

                {{-- Options --}}
                <div x-show="activeTab===6" class="p-10 transition-all duration-150 ease-in-out">
                    {{ __('Options Content') }}
                </div>

                {{-- Others --}}
                <div x-show="activeTab===7" class="p-10 transition-all duration-150 ease-in-out">
                    <x-common.persona.marital class="w-full mb-4" item="patient.persona"
                        :maritList="$items['maritals']" />
                    <hr class="w-full mb-8 border-none" />
                    <x-common.persona.race class="w-full mb-4" item="patient.persona" :raceList="$items['races']"
                        :ethnicList="$items['ethnicities']" />
                    <x-common.persona.others class="w-full mb-4" item="patient.persona" :referList="$items['referrals']"
                        :vfcList="$items['vfcs']" />
                </div>

                {{-- Decease --}}
                <div x-show="activeTab===8" class="p-10 transition-all duration-150 ease-in-out">
                    <x-common.persona.decease class="w-full mb-0" item="patient.persona" />
                </div>
            </div>
        </div>

        <!-- BUTTONS -->
        <x-common.pageheader formsave formcancel="{{ route('patients.list') }}" class="pt-16 pb-4" />

    </form>
    @endsection

    @push('scripts')
    @endpush
</x-layouts.logged>
