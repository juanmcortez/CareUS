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

    <div class="flex flex-row flex-wrap justify-between w-full mt-10">
        <x-common.patient.account :patient="$patient" :balancetable="$balancetable" />
    </div>

    <div class="flex flex-row flex-wrap w-full mt-10">
        <x-common.patient.invoicetable :patient="$patient" />
    </div>
    @endsection

    @push('scripts')
    @endpush
</x-layouts.logged>
