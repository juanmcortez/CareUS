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
            <i class="text-6xl text-burntsienna-200 fas fa-users"></i>
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
                <p class="text-sm uppercase text-burntsienna-300">{{ __('Patients photos') }}</p>
                <div class="flex flex-row items-center justify-center mt-2 text-center">
                    <p class="w-4/12 text-3xl text-burntsienna-500">{{ $stats['totalimages'] }}</p>
                    <p class="w-4/12">&nbsp;</p>
                    <p class="w-4/12">&nbsp;</p>
                </div>
            </div>
            <i class="text-6xl text-burntsienna-200 fas fa-camera"></i>
        </div>
    </div>
    @endsection

    @push('scripts')
    @endpush
</x-layouts.logged>
