<x-layouts.logged>

    @section('pageTitle', $pageTitle)

    @push('styles')
    @endpush

    @section('content')
    <x-common.pageheader formedit="{{ route('patients.edit', ['patient'=> $patient->patID]) }}" class="pt-10 pb-16">
        {{ $pageH2 }}
    </x-common.pageheader>

    <div class="flex flex-row flex-wrap w-full py-3 rounded-lg bg-bdazzledblue-200">
        <x-common.patient.ribbon :patient="$patient" />
    </div>

    <div class="flex flex-col flex-wrap justify-center w-full mt-10" x-data="{ ledgerTab: 1}">
        <div class="flex flex-row items-center justify-start w-8/12">
            <a @click.prevent="ledgerTab=1"
                :class="ledgerTab===1 ? 'text-bdazzledblue-400 bg-gunmetal-50 font-semibold' : 'text-gunmetal-50 bg-bdazzledblue-400'"
                class="w-2/12 py-3 mx-1 tracking-wider text-center transition-colors duration-150 ease-in-out rounded-t cursor-pointer hover:text-gunmetal-50 hover:bg-bdazzledblue-500">
                {{ __('Ledger') }}
            </a>
            <a @click.prevent="ledgerTab=2"
                :class="ledgerTab===2 ? 'text-burntsienna-400 bg-burntsienna-50 font-semibold' : 'text-burntsienna-50 bg-burntsienna-400'"
                class="w-2/12 py-3 mx-1 tracking-wider text-center transition-colors duration-150 ease-in-out rounded-t cursor-pointer hover:text-burntsienna-50 hover:bg-burntsienna-500">
                {{ __('Insurances') }}
            </a>
            <a @click.prevent="ledgerTab=3"
                :class="ledgerTab===3 ? 'text-bdazzledblue-400 bg-gunmetal-50 font-semibold' : 'text-gunmetal-50 bg-bdazzledblue-400'"
                class="w-2/12 py-3 mx-1 tracking-wider text-center transition-colors duration-150 ease-in-out rounded-t cursor-pointer hover:text-gunmetal-50 hover:bg-bdazzledblue-500">
                {{ __('Demographics') }}
            </a>
            <a @click.prevent="ledgerTab=4"
                :class="ledgerTab===4 ? 'text-bdazzledblue-400 bg-gunmetal-50 font-semibold' : 'text-gunmetal-50 bg-bdazzledblue-400'"
                class="w-2/12 py-3 mx-1 tracking-wider text-center transition-colors duration-150 ease-in-out rounded-t cursor-pointer hover:text-gunmetal-50 hover:bg-bdazzledblue-500">
                {{ __('Contacts') }}
            </a>
            <a @click.prevent="ledgerTab=5"
                :class="ledgerTab===5 ? 'text-bdazzledblue-400 bg-gunmetal-50 font-semibold' : 'text-gunmetal-50 bg-bdazzledblue-400'"
                class="w-2/12 py-3 mx-1 tracking-wider text-center transition-colors duration-150 ease-in-out rounded-t cursor-pointer hover:text-gunmetal-50 hover:bg-bdazzledblue-500">
                {{ __('Employment') }}
            </a>
            <a @click.prevent="ledgerTab=6"
                :class="ledgerTab===6 ? 'text-bdazzledblue-400 bg-gunmetal-50 font-semibold' : 'text-gunmetal-50 bg-bdazzledblue-400'"
                class="w-2/12 py-3 mx-1 tracking-wider text-center transition-colors duration-150 ease-in-out rounded-t cursor-pointer hover:text-gunmetal-50 hover:bg-bdazzledblue-500">
                {{ __('Notes') }}
            </a>
            <a @click.prevent="ledgerTab=7"
                :class="ledgerTab===7 ? 'text-bdazzledblue-400 bg-gunmetal-50 font-semibold' : 'text-gunmetal-50 bg-bdazzledblue-400'"
                class="w-2/12 py-3 mx-1 tracking-wider text-center transition-colors duration-150 ease-in-out rounded-t cursor-pointer hover:text-gunmetal-50 hover:bg-bdazzledblue-500">
                {{ __('Documents') }}
            </a>
        </div>
        <div id="tabs">
            {{-- LEDGER --}}
            <div x-show="ledgerTab===1"
                class="pt-5 transition-all duration-150 ease-in-out border-t-2 border-b-2 border-gunmetal-50">
                <div class="flex flex-row flex-wrap justify-between w-full">
                    <x-common.patient.tabs.account :patient="$patient" :balancetable="$balancetable" />
                </div>

                <div class="flex flex-row flex-wrap w-full mt-10">
                    <x-common.patient.tabs.invoicetable :patient="$patient" />
                </div>
            </div>

            {{-- INSURANCES --}}
            <div x-show="ledgerTab===2"
                class="pt-5 transition-all duration-150 ease-in-out border-t-2 border-b-2 border-gunmetal-50">
                <div class="flex flex-row flex-wrap w-full">
                    <x-common.patient.tabs.insurancestable :patient="$patient" />
                </div>
            </div>

            {{-- DEMOGRAPHICS --}}
            <div x-show="ledgerTab===3"
                class="transition-all duration-150 ease-in-out border-t-2 border-b-2 border-gunmetal-50">
                <x-common.patient.tabs.demographic :patient="$patient" class="bg-gunmetal-100" />
            </div>

            {{-- CONTACTS --}}
            <div x-show="ledgerTab===4"
                class="transition-all duration-150 ease-in-out border-t-2 border-b-2 border-gunmetal-50">
                <x-common.patient.tabs.contacts :patient="$patient" class="bg-gunmetal-100" />
            </div>

            {{-- EMPLOYMENT --}}
            <div x-show="ledgerTab===5"
                class="transition-all duration-150 ease-in-out border-t-2 border-b-2 border-gunmetal-50">
                <x-common.patient.tabs.employment :patient="$patient" class="bg-gunmetal-100" />
            </div>

            {{-- NOTES --}}
            <div x-show="ledgerTab===6"
                class="transition-all duration-150 ease-in-out border-t-2 border-b-2 border-gunmetal-50">
                <x-common.patient.tabs.notes :patient="$patient" class="bg-gunmetal-100" />
            </div>

            {{-- DOCUMENTS --}}
            <div x-show="ledgerTab===7"
                class="transition-all duration-150 ease-in-out border-t-2 border-b-2 border-gunmetal-50">
                <x-common.patient.tabs.documents :patient="$patient" class="bg-gunmetal-100" />
            </div>
        </div>
    </div>


    @endsection

    @push('scripts')
    @endpush
</x-layouts.logged>
