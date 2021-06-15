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

    <div class="flex flex-col flex-wrap justify-center w-full mt-10"
        x-data="{ ledgerTab: '@php echo $ledgerTab @endphp' }">
        <div class="flex flex-row items-center justify-start w-8/12">
            <a @click.prevent="ledgerTab='ledger'"
                :class="ledgerTab==='ledger' ? 'text-bdazzledblue-400 bg-gunmetal-50 font-semibold' : 'text-gunmetal-50 bg-bdazzledblue-400'"
                class="w-2/12 py-3 mx-1 tracking-wider text-center transition-colors duration-150 ease-in-out rounded-t cursor-pointer hover:text-gunmetal-50 hover:bg-bdazzledblue-500">
                {{ __('Ledger') }}
            </a>
            <a @click.prevent="ledgerTab='insurances'"
                :class="ledgerTab==='insurances' ? 'text-burntsienna-400 bg-burntsienna-50 font-semibold' : 'text-burntsienna-50 bg-burntsienna-400'"
                class="w-2/12 py-3 mx-1 tracking-wider text-center transition-colors duration-150 ease-in-out rounded-t cursor-pointer hover:text-burntsienna-50 hover:bg-burntsienna-500">
                {{ __('Insurances') }}
            </a>
            <a @click.prevent="ledgerTab='demographics'"
                :class="ledgerTab==='demographics' ? 'text-bdazzledblue-400 bg-gunmetal-50 font-semibold' : 'text-gunmetal-50 bg-bdazzledblue-400'"
                class="w-2/12 py-3 mx-1 tracking-wider text-center transition-colors duration-150 ease-in-out rounded-t cursor-pointer hover:text-gunmetal-50 hover:bg-bdazzledblue-500">
                {{ __('Demographics') }}
            </a>
            <a @click.prevent="ledgerTab='contacts'"
                :class="ledgerTab==='contacts' ? 'text-bdazzledblue-400 bg-gunmetal-50 font-semibold' : 'text-gunmetal-50 bg-bdazzledblue-400'"
                class="w-2/12 py-3 mx-1 tracking-wider text-center transition-colors duration-150 ease-in-out rounded-t cursor-pointer hover:text-gunmetal-50 hover:bg-bdazzledblue-500">
                {{ __('Contacts') }}
            </a>
            <a @click.prevent="ledgerTab='employment'"
                :class="ledgerTab==='employment' ? 'text-bdazzledblue-400 bg-gunmetal-50 font-semibold' : 'text-gunmetal-50 bg-bdazzledblue-400'"
                class="w-2/12 py-3 mx-1 tracking-wider text-center transition-colors duration-150 ease-in-out rounded-t cursor-pointer hover:text-gunmetal-50 hover:bg-bdazzledblue-500">
                {{ __('Employment') }}
            </a>
            <a @click.prevent="ledgerTab='notes'"
                :class="ledgerTab==='notes' ? 'text-bdazzledblue-400 bg-gunmetal-50 font-semibold' : 'text-gunmetal-50 bg-bdazzledblue-400'"
                class="w-2/12 py-3 mx-1 tracking-wider text-center transition-colors duration-150 ease-in-out rounded-t cursor-pointer hover:text-gunmetal-50 hover:bg-bdazzledblue-500">
                {{ __('Notes') }}
            </a>
            <a @click.prevent="ledgerTab='documents'"
                :class="ledgerTab==='documents' ? 'text-bdazzledblue-400 bg-gunmetal-50 font-semibold' : 'text-gunmetal-50 bg-bdazzledblue-400'"
                class="w-2/12 py-3 mx-1 tracking-wider text-center transition-colors duration-150 ease-in-out rounded-t cursor-pointer hover:text-gunmetal-50 hover:bg-bdazzledblue-500">
                {{ __('Docs') }}
            </a>
            <div class="flex flex-row w-5/12 py-3 mx-1 text-xs tracking-wider text-center text-gunmetal-300">
                <p class="w-5/12 pr-1 font-semibold text-right">{{ __('Last Update on') }}</p>
                <p class="w-7/12 text-left">{{ $patient->persona->updated_at_language }}</p>
            </div>
        </div>
        <div id="tabs">
            {{-- LEDGER --}}
            <div x-show="ledgerTab==='ledger'"
                class="pt-5 transition-all duration-150 ease-in-out border-t-2 border-b-2 border-gunmetal-50">
                <div class="flex flex-row flex-wrap justify-between w-full">
                    <x-common.patient.tabs.account :patient="$patient" :balancetable="$balancetable" />
                </div>

                <div class="flex flex-row flex-wrap w-full mt-10">
                    <x-common.patient.tabs.invoicetable :patient="$patient" />
                </div>
            </div>

            {{-- INSURANCES --}}
            <div x-show="ledgerTab==='insurances'"
                class="pt-5 transition-all duration-150 ease-in-out border-t-2 border-b-2 border-gunmetal-50">
                <div class="flex flex-row flex-wrap w-full">
                    <x-common.patient.tabs.insurancestable :patient="$patient" />
                </div>
            </div>

            {{-- DEMOGRAPHICS --}}
            <div x-show="ledgerTab==='demographics'"
                class="transition-all duration-150 ease-in-out border-t-2 border-b-2 border-gunmetal-50">
                <x-common.patient.tabs.demographic :patient="$patient" class="bg-gunmetal-100" />
            </div>

            {{-- CONTACTS --}}
            <div x-show="ledgerTab==='contacts'"
                class="transition-all duration-150 ease-in-out border-t-2 border-b-2 border-gunmetal-50">
                <x-common.patient.tabs.contacts :patient="$patient" class="bg-gunmetal-100" />
            </div>

            {{-- EMPLOYMENT --}}
            <div x-show="ledgerTab==='employment'"
                class="transition-all duration-150 ease-in-out border-t-2 border-b-2 border-gunmetal-50">
                <x-common.patient.tabs.employment :patient="$patient" class="bg-gunmetal-100" />
            </div>

            {{-- NOTES --}}
            <div x-show="ledgerTab==='notes'"
                class="transition-all duration-150 ease-in-out border-t-2 border-b-2 border-gunmetal-50">
                <x-common.patient.tabs.notes :patient="$patient" />
            </div>

            {{-- DOCUMENTS --}}
            <div x-show="ledgerTab==='documents'"
                class="transition-all duration-150 ease-in-out border-t-2 border-b-2 border-gunmetal-50">
                <x-common.patient.tabs.documents :patient="$patient" class="bg-gunmetal-100" />
            </div>
        </div>
    </div>


    @endsection

    @push('scripts')
    @endpush
</x-layouts.logged>
