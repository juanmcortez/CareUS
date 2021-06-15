<x-layouts.logged>
    @section('pageTitle', $pageTitle)

    @push('styles')
    @endpush

    @section('content')
    <x-common.pageheader class="pt-10 pb-16">{{ $pageH2 }}</x-common.pageheader>

    <div class="flex flex-col items-center justify-center w-full md:space-x-10 md:flex-row">
        <div class="flex flex-row w-full p-5 rounded shadow-sm md:w-3/12 bg-burntsienna-100">
            <div class="flex flex-col w-10/12">
                <p class="text-sm uppercase text-burntsienna-300">{{ __('Total patients') }}</p>
                <div class="flex flex-row items-center justify-center mt-2 text-center">
                    <p class="w-4/12 text-3xl text-burntsienna-500">{{ $stats['patienttotals'] }}</p>
                    <p class="w-4/12">&nbsp;</p>
                    <p class="w-4/12">&nbsp;</p>
                </div>
            </div>
            <i class="text-6xl text-burntsienna-200 fas fa-hospital-user"></i>
        </div>

        <div class="flex flex-row w-full p-5 mt-10 rounded shadow-sm md:w-3/12 bg-burntsienna-100 md:mt-0">
            <div class="flex flex-col w-10/12">
                <p class="text-sm uppercase text-burntsienna-300">{{ __('New patients [last 30 days]') }}</p>
                <div class="flex flex-row items-center justify-center mt-2 text-center">
                    <p class="w-4/12 text-3xl text-burntsienna-500">{{ $stats['patientlast30'] }}</p>
                    @if($stats['patientgrow30']<>0)
                        @if($stats['patientgrow30']>0)
                        <p class="w-3/12 py-1 text-xs text-green-800 bg-green-200 rounded">
                            + {{ $stats['patientgrow30'] }} %
                        </p>
                        @else
                        <p class="w-3/12 py-1 text-xs text-red-800 bg-red-200 rounded">
                            {{ $stats['patientgrow30'] }} %
                        </p>
                        @endif
                        @endif
                        <p class="w-5/12">&nbsp;</p>
                </div>
            </div>
            <i class="text-6xl text-burntsienna-200 fas fa-user-plus"></i>
        </div>

        <div class="flex flex-row w-full p-5 mt-10 rounded shadow-sm md:w-3/12 bg-burntsienna-100 md:mt-0">
            <div class="flex flex-col w-10/12">
                <p class="text-sm uppercase text-burntsienna-300">{{ __('Edited patients [last 30 days]') }}</p>
                <div class="flex flex-row items-center justify-center mt-2 text-center">
                    <p class="w-4/12 text-3xl text-burntsienna-500">{{ $stats['editlast30'] }}</p>
                    @if($stats['editgrow30']<>0)
                        @if($stats['editgrow30']>0)
                        <p class="w-3/12 py-1 text-xs text-green-800 bg-green-200 rounded">
                            + {{ $stats['editgrow30'] }} %
                        </p>
                        @else
                        <p class="w-3/12 py-1 text-xs text-red-800 bg-red-200 rounded">
                            {{ $stats['editgrow30'] }} %
                        </p>
                        @endif
                        @endif
                        <p class="w-5/12">&nbsp;</p>
                </div>
            </div>
            <i class="text-6xl text-burntsienna-200 fas fa-user-edit"></i>
        </div>

        <div class="flex flex-row w-full p-5 mt-10 rounded shadow-sm md:w-3/12 bg-burntsienna-100 md:mt-0">
            <div class="flex flex-col w-10/12">
                <p class="text-sm uppercase text-burntsienna-300">
                    {{ __('Patient notes by :name', ['name' => auth()->user()->persona->formated_name]) }}</p>
                <div class="flex flex-row items-center justify-center mt-2 text-center">
                    <p class="w-4/12 text-3xl text-burntsienna-500">{{ $stats['notestotal'] }}</p>
                    <p class="w-4/12">&nbsp;</p>
                    <p class="w-4/12">&nbsp;</p>
                </div>
            </div>
            <i class="text-6xl text-burntsienna-200 fas fa-sticky-note"></i>
        </div>
    </div>

    <div class="flex flex-col items-center justify-center w-full mt-10 md:space-x-10 md:flex-row">
        <div class="flex flex-row w-full p-5 rounded shadow-sm md:w-3/12">&nbsp;</div>
        <div class="flex flex-row w-full p-5 rounded shadow-sm md:w-3/12">&nbsp;</div>
        <div class="flex flex-row w-full p-5 rounded shadow-sm md:w-3/12">&nbsp;</div>
        <div class="flex flex-row w-full p-5 rounded shadow-sm md:w-3/12">
            @if(auth()->user()->notes->first())
            <div class="flex flex-col w-full">
                <p class="mb-4 text-sm uppercase text-burntsienna-500">{{ __('Last 5 Notes') }}</p>
                @foreach (auth()->user()->notes->take(5) as $note)
                <div class="flex flex-row flex-wrap items-start justify-start p-4 bg-gunmetal-100 text-gunmetal-400">
                    <a class="flex flex-row items-center justify-between w-full"
                        href="{{ route('patients.show', ['patient' => $note->patient->patID, 'ledgerTab' => 'notes']) }}">
                        <span>
                            <i class="mr-2 fa fa-sticky-note"></i>
                            {{ $note->patient->persona->formated_name }}
                        </span>
                        <span class="w-4/12 text-xs text-right text-gunmetal-300">
                            {{ $note->created_at_language }}
                        </span>
                    </a>
                </div>
                <div class="py-2"></div>
                @endforeach
            </div>
            @endif
        </div>
    </div>
    @endsection

    @push('scripts')
    @endpush
</x-layouts.logged>
