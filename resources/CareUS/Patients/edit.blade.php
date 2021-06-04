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
                    <div class="flex flex-row flex-wrap mb-0">
                        <div class="flex flex-row items-center justify-start w-3/12">
                            <x-common.forms.label for="created" class="w-4/12 text-right">
                                {{ __('Created on') }}
                            </x-common.forms.label>
                            <x-common.forms.input id="created" class="w-8/12" type="text"
                                :value="$patient->created_at_language" disabled />
                        </div>
                        <div class="flex flex-row items-center justify-start w-3/12">
                            <x-common.forms.label for="created" class="w-4/12 text-right">
                                {{ __('Last Update on') }}
                            </x-common.forms.label>
                            <x-common.forms.input id="created" class="w-8/12" type="text"
                                :value="$patient->persona->updated_at_language" disabled />
                        </div>
                    </div>

                    <hr class="w-full mb-8 border-none" />

                    <x-common.persona.name class="w-full mb-4" item="patient.persona" :values="$patient->persona"
                        :titleList="$items['titles']" />
                    <x-common.persona.gender class="w-full mb-4" item="patient.persona" :values="$patient->persona"
                        :genderList="$items['genders']" />

                    <hr class="w-full mb-8 border-none" />

                    <x-common.persona.created class="w-full mb-4" item="patient" :values="$patient" />

                    <x-common.persona.social class="w-full mb-0" item="patient" :values="$patient"
                        :showpatlvlacc="true" />

                    <hr class="w-full mb-8 border-none" />

                    <x-common.persona.language class="w-full mb-0" item="patient.persona" :values="$patient->persona"
                        :langList="$items['languages']" />

                </div>

                {{-- Demographics --}}
                <div x-show="activeTab===2" class="p-10 transition-all duration-150 ease-in-out">
                    <x-common.persona.address class="w-full mb-4" item="patient.persona.address"
                        :values="$patient->persona->address" :countryList="$items['countries']"
                        :stateList="$items['states']" />

                    <hr class="w-full mb-8 border-none" />

                    @foreach ($patient->persona->phone as $idx => $phone)
                    <x-common.persona.phone class="w-full mb-4" item="{{ 'patient.persona.phone.'.$idx }}"
                        :values="$phone" :idx="$idx" :phoneList="$items['phonetypes']" />
                    @endforeach

                    <hr class="w-full mb-8 border-none" />

                    <x-common.persona.email class="w-full mb-0" item="patient.persona" :values="$patient->persona" />
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
                        @foreach ($patient->contact as $conidx => $contact)
                        <div x-show="activeSubTab==={{ 1+$conidx }}"
                            class="pt-10 -mb-4 transition-all duration-150 ease-in-out border-t-2 bg-gunmetal-100 border-gunmetal-50">
                            <x-common.contact.type class="w-full mb-4" item="{{ 'patient.contact.'.$conidx }}"
                                :values="$contact" :idx="$conidx" :titleList="$items['contacttypes']" />
                            <x-common.persona.name class="w-full mb-4" item="{{ 'patient.contact.'.$conidx }}"
                                :values="$contact" :titleList="$items['titles']" />
                            @foreach ($contact->phone as $jdx => $phone)
                            <x-common.persona.phone class="w-full mb-4" item="{{ 'patient.contact.'.$conidx.'.phone' }}"
                                :values="$phone" :idex="$jdx" :phoneList="$items['phonetypes']" />
                            @endforeach
                            <x-common.persona.email class="w-full mb-4" item="{{ 'patient.contact.'.$conidx }}"
                                :values="$contact" />
                            <x-common.persona.address class="w-full mb-4"
                                item="{{ 'patient.contact.'.$conidx.'.address' }}" :values="$contact->address"
                                :countryList="$items['countries']" :stateList="$items['states']" />
                        </div>
                        @endforeach
                    </div>
                </div>

                {{-- Employment --}}
                <div x-show="activeTab===4" class="p-10 transition-all duration-150 ease-in-out">
                    <x-common.employer.details class="w-full mb-4" item="patient.employment"
                        :values="$patient->employment->first()" />

                    <hr class="w-full mb-8 border-none" />

                    <x-common.persona.name class="w-full mb-4" item="patient.employment"
                        :values="$patient->employment->first()" :titleList="$items['titles']" title="Employer" />

                    @foreach ($patient->employment->first()->phone as $idx => $phone)
                    <x-common.persona.phone class="w-full mb-4" item="patient.employment.phone" :values="$phone"
                        :idex="$idx" :phoneList="$items['phonetypes']" />
                    @endforeach

                    <x-common.persona.email class="w-full mb-4" item="patient.employment"
                        :values="$patient->employment->first()" />

                    <hr class="w-full mb-8 border-none" />

                    <x-common.persona.address class="w-full mb-4" item="patient.employment.address"
                        :values="$patient->employment->first()->address" :countryList="$items['countries']"
                        :stateList="$items['states']" />
                </div>

                {{-- Insurances --}}
                @foreach($patient->subscriber as $insdx=>$subscriber)
                <div x-show="activeTab==={{ 5+$insdx }}" class="p-10 transition-all duration-150 ease-in-out">
                    <x-common.subscriber.insurance class="w-full mb-4" item="{{ 'patient.subscriber.'.$insdx }}"
                        :values="$subscriber" :insdx="$insdx" :insList="$insurances"
                        title="{{ $instypes[$insdx]->list_item_title.' Ins.' }}" />
                    <x-common.subscriber.dates class="w-full mb-4" item="{{ 'patient.subscriber.'.$insdx }}"
                        :values="$subscriber" />
                    <hr class="w-full mb-8 border-none" />
                    <x-common.subscriber.relation class="w-full mb-4" item="{{ 'patient.subscriber.'.$insdx }}"
                        :values="$subscriber" :relList="$items['insrelation']" :assList="$items['yesno']"
                        :secList="$items['secmedtype']" />
                    <hr class="w-full mb-8 border-none" />
                    <x-common.persona.name class="w-full mb-4" item="{{ 'patient.subscriber.'.$insdx.'.persona' }}"
                        :values="$subscriber->persona" :titleList="$items['titles']" title="Subscriber" />
                    <x-common.persona.phone class="w-full mb-4"
                        item="{{ 'patient.subscriber.'.$insdx.'.persona.phone' }}"
                        :values="$subscriber->persona->phone->first()" :phoneList="$items['phonetypes']" />
                    <x-common.persona.email class="w-full mb-4" item="{{ 'patient.subscriber.'.$insdx.'.persona' }}"
                        :values="$subscriber->persona" place="subscriber" />
                    <x-common.persona.address class="w-full mb-4"
                        item="{{ 'patient.subscriber.'.$insdx.'.persona.address' }}"
                        :values="$subscriber->persona->address" :countryList="$items['countries']"
                        :stateList="$items['states']" />
                    <hr class="w-full mb-8 border-none" />
                    <x-common.persona.gender class="w-full mb-4" item="{{ 'patient.subscriber.'.$insdx.'.persona' }}"
                        :values="$subscriber->persona" :genderList="$items['genders']" />
                    <x-common.persona.social class="w-full mb-0" item="{{ 'patient.subscriber.'.$insdx }}"
                        :values="$subscriber" :showdrvrlcnss="false" />
                </div>
                @endforeach

                {{-- Options --}}
                <div x-show="activeTab===8" class="p-10 transition-all duration-150 ease-in-out">
                    {{ __('Options Content') }}
                </div>

                {{-- Others --}}
                <div x-show="activeTab===9" class="p-10 transition-all duration-150 ease-in-out">
                    <x-common.persona.marital class="w-full mb-4" item="patient.persona" :values="$patient->persona"
                        :maritList="$items['maritals']" />
                    <hr class="w-full mb-8 border-none" />
                    <x-common.persona.race class="w-full mb-4" item="patient.persona" :values="$patient->persona"
                        :raceList="$items['races']" :ethnicList="$items['ethnicities']" />
                    <x-common.persona.others class="w-full mb-4" item="patient.persona" :values="$patient->persona"
                        :referList="$items['referrals']" :vfcList="$items['vfcs']" />
                    <hr class="w-full mb-8 border-none" />
                </div>

                {{-- Decease --}}
                <div x-show="activeTab===10" class="p-10 transition-all duration-150 ease-in-out">
                    <x-common.persona.decease class="w-full mb-0" item="patient.persona" :values="$patient->persona" />
                </div>
            </div>
        </div>

        <!-- BUTTONS -->
        <x-common.pageheader formsave formcancel="{{ route('patients.show', ['patient' => $patient->patID]) }}"
            class="pt-16 pb-10" />
    </form>
    @endsection

    @push('scripts')
    @endpush
</x-layouts.logged>
