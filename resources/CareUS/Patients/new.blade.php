<x-layouts.logged>
    @section('pageTitle', $pageTitle)

    @push('styles')
    @endpush

    @section('content')
    <form class="w-full" method="POST" enctype="multipart/form-data" action="{{ route('patients.store') }}">
        @csrf
        @method('POST')

        <!-- BUTTONS -->
        <x-common.pageheader formsave formcancel="{{ route('patients.list') }}" class="pt-10 pb-16">
            {{ $pageH2 }}
        </x-common.pageheader>

        <div class="flex flex-col" x-data="{ activeTab: 1}">
            <div class="flex flex-row items-center justify-center w-full">
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
                @foreach ($instypes as $insdx => $insname)
                <a @click.prevent="activeTab={{ 5+$insdx }}"
                    :class="activeTab==={{ 5+$insdx }} ? 'text-burntsienna-400 bg-burntsienna-50 font-semibold' : 'text-burntsienna-50 bg-burntsienna-400'"
                    class="w-2/12 py-3 mx-1 tracking-wider text-center transition-colors duration-150 ease-in-out rounded-t cursor-pointer hover:text-burntsienna-50 hover:bg-burntsienna-500">
                    {{ __($insname->list_item_title.' Ins.') }}
                </a>
                @endforeach
                <a @click.prevent="activeTab=8"
                    :class="activeTab===8 ? 'text-bdazzledblue-400 bg-gunmetal-50 font-semibold' : 'text-gunmetal-50 bg-bdazzledblue-400'"
                    class="w-2/12 py-3 mx-1 tracking-wider text-center transition-colors duration-150 ease-in-out rounded-t cursor-pointer hover:text-gunmetal-50 hover:bg-bdazzledblue-500">
                    {{ __('Options') }}
                </a>
                <a @click.prevent="activeTab=9"
                    :class="activeTab===9 ? 'text-bdazzledblue-400 bg-gunmetal-50 font-semibold' : 'text-gunmetal-50 bg-bdazzledblue-400'"
                    class="w-2/12 py-3 mx-1 tracking-wider text-center transition-colors duration-150 ease-in-out rounded-t cursor-pointer hover:text-gunmetal-50 hover:bg-bdazzledblue-500">
                    {{ __('Others') }}
                </a>
                <a @click.prevent="activeTab=10"
                    :class="activeTab===10 ? 'text-red-400 bg-red-50 font-semibold' : 'text-red-50 bg-red-400'"
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

                    <x-common.persona.language class="w-full mb-4" item="patient.persona"
                        :langList="$items['languages']" />

                    <x-common.persona.profilephoto class="w-full mb-0" item="patient.persona" />


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

                    <x-common.persona.email class="w-full mb-0" item="patient.persona" place="patient" />
                </div>

                {{-- Contacts --}}
                <div x-show="activeTab===3" class="p-10 transition-all duration-150 ease-in-out">
                    <div x-data="{ activeSubTab: 1}">
                        <div class="flex flex-row items-center justify-start w-6/12">
                            <a @click.prevent="activeSubTab=1"
                                :class="activeSubTab===1 ? 'text-bdazzledblue-400 bg-gunmetal-50 font-semibold' : 'text-gunmetal-50 bg-bdazzledblue-400'"
                                class="w-2/12 py-3 mx-1 tracking-wider text-center transition-colors duration-150 ease-in-out rounded-t cursor-pointer hover:text-gunmetal-50 hover:bg-bdazzledblue-500">
                                {{ __('Contact #1') }}
                            </a>
                            <a @click.prevent="activeSubTab=2"
                                :class="activeSubTab===2 ? 'text-bdazzledblue-400 bg-gunmetal-50 font-semibold' : 'text-gunmetal-50 bg-bdazzledblue-400'"
                                class="w-2/12 py-3 mx-1 tracking-wider text-center transition-colors duration-150 ease-in-out rounded-t cursor-pointer hover:text-gunmetal-50 hover:bg-bdazzledblue-500">
                                {{ __('Contact #2') }}
                            </a>
                            <a @click.prevent="activeSubTab=3"
                                :class="activeSubTab===3 ? 'text-bdazzledblue-400 bg-gunmetal-50 font-semibold' : 'text-gunmetal-50 bg-bdazzledblue-400'"
                                class="w-2/12 py-3 mx-1 tracking-wider text-center transition-colors duration-150 ease-in-out rounded-t cursor-pointer hover:text-gunmetal-50 hover:bg-bdazzledblue-500">
                                {{ __('Contact #3') }}
                            </a>
                        </div>
                        @foreach ($contacts as $conidx => $contact)
                        <div x-show="activeSubTab==={{ 1+$conidx }}"
                            class="pt-10 -mb-4 transition-all duration-150 ease-in-out border-t-2 bg-gunmetal-100 border-gunmetal-50">
                            <x-common.contact.type class="w-full mb-4" item="{{ 'patient.contact.'.$conidx }}"
                                :idx="$conidx" :titleList="$items['contacttypes']" />
                            <x-common.persona.name class="w-full mb-4" item="{{ 'patient.contact.'.$conidx }}"
                                :titleList="$items['titles']" />
                            <x-common.persona.phone class="w-full mb-4" item="{{ 'patient.contact.'.$conidx.'.phone' }}"
                                :phoneList="$items['phonetypes']" />
                            <x-common.persona.email class="w-full mb-4" item="{{ 'patient.contact.'.$conidx }}"
                                place="contact" />
                            <x-common.persona.address class="w-full mb-4"
                                item="{{ 'patient.contact.'.$conidx.'.address' }}" :countryList="$items['countries']"
                                :stateList="$items['states']" />
                        </div>
                        @endforeach
                    </div>



                </div>

                {{-- Employment --}}
                <div x-show="activeTab===4" class="p-10 transition-all duration-150 ease-in-out">
                    <x-common.employer.details class="w-full mb-4" item="patient.employer" />
                    <hr class="w-full mb-8 border-none" />
                    <x-common.persona.name class="w-full mb-4" item="patient.employer" :titleList="$items['titles']"
                        title="Employer" />
                    <x-common.persona.phone class="w-full mb-4" item="patient.employer.phone"
                        :phoneList="$items['phonetypes']" />
                    <x-common.persona.email class="w-full mb-4" item="patient.employer" place="employer" />
                    <hr class="w-full mb-8 border-none" />
                    <x-common.persona.address class="w-full mb-4" item="patient.employer.address"
                        :countryList="$items['countries']" :stateList="$items['states']" />
                </div>

                {{-- Insurances --}}
                @foreach ($instypes as $insdx => $insname)
                <div x-show="activeTab==={{ 5+$insdx }}" class="p-10 transition-all duration-150 ease-in-out">
                    <x-common.subscriber.insurance class="w-full mb-4" item="{{ 'patient.subscriber.'.$insdx }}"
                        :insdx="$insdx" :insList="$insurances" title="{{ $insname->list_item_title.' Ins.' }}" />
                    <x-common.subscriber.dates class="w-full mb-4" item="{{ 'patient.subscriber.'.$insdx }}" />
                    <hr class="w-full mb-8 border-none" />
                    <x-common.subscriber.relation class="w-full mb-4" item="{{ 'patient.subscriber.'.$insdx }}"
                        :relList="$items['insrelation']" :assList="$items['yesno']" :secList="$items['secmedtype']" />
                    <hr class="w-full mb-8 border-none" />
                    <x-common.persona.name class="w-full mb-4" item="{{ 'patient.subscriber.'.$insdx.'.persona' }}"
                        :titleList="$items['titles']" title="Subscriber" />
                    <x-common.persona.phone class="w-full mb-4"
                        item="{{ 'patient.subscriber.'.$insdx.'.persona.phone' }}" :phoneList="$items['phonetypes']" />
                    <x-common.persona.email class="w-full mb-4" item="{{ 'patient.subscriber.'.$insdx.'.persona' }}"
                        place="subscriber" />
                    <x-common.persona.address class="w-full mb-4"
                        item="{{ 'patient.subscriber.'.$insdx.'.persona.address' }}" :countryList="$items['countries']"
                        :stateList="$items['states']" />
                    <hr class="w-full mb-8 border-none" />
                    <x-common.persona.gender class="w-full mb-4" item="{{ 'patient.subscriber.'.$insdx.'.persona' }}"
                        :genderList="$items['genders']" />
                    <x-common.persona.social class="w-full mb-0" item="{{ 'patient.subscriber.'.$insdx }}"
                        :showdrvrlcnss="false" />
                </div>
                @endforeach

                {{-- Options --}}
                <div x-show="activeTab===8" class="p-10 transition-all duration-150 ease-in-out">
                    {{ __('Options Content') }}
                </div>

                {{-- Others --}}
                <div x-show="activeTab===9" class="p-10 transition-all duration-150 ease-in-out">
                    <x-common.persona.marital class="w-full mb-4" item="patient.persona"
                        :maritList="$items['maritals']" />
                    <hr class="w-full mb-8 border-none" />
                    <x-common.persona.race class="w-full mb-4" item="patient.persona" :raceList="$items['races']"
                        :ethnicList="$items['ethnicities']" />
                    <x-common.persona.others class="w-full mb-4" item="patient.persona" :referList="$items['referrals']"
                        :vfcList="$items['vfcs']" />
                </div>

                {{-- Decease --}}
                <div x-show="activeTab===10" class="p-10 transition-all duration-150 ease-in-out">
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
