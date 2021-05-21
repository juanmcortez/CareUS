<x-layouts.user>

    @section('pageTitle', $pageTitle)

    @push('styles')
    @endpush

    @section('submenu')
    <h2 class="text-sm font-bold uppercase md:text-xl">{{ $pageH2 }}</h2>
    @endsection

    @section('content')
    <div class="flex flex-col w-full text-sm">
        <div class="flex font-bold text-center uppercase border-b rounded-t border-bdazzledblue-400 bg-lightcyan-200">
            <div class="w-3/12 py-4 border-l border-r">{{ __('Patient') }}</div>
            <div class="w-1/12 py-4 border-r">{{ __('DOB') }}</div>
            <div class="w-2/12 py-4 border-r">{{ __('Phone') }}</div>
            <div class="w-1/12 py-4 border-r">{{ __('Social Security') }}</div>
            <div class="w-2/12 py-4 border-r">{{ __('Accession #') }}</div>
            <div class="w-1/12 py-4 border-r">{{ __('Patient ID') }}</div>
            <div class="w-2/12 py-4 border-r">{{ __('External ID') }}</div>
        </div>
        @foreach ($personas as $idx => $persona)
        <a href="{{ route('patients.show', ['patient' => $persona->patient->patID]) }}"
            class="inline-flex items-center text-center border-b hover:text-lightcyan-500 hover:bg-bdazzledblue-500 @php if($idx % 2) { echo 'bg-gray-100'; } else { echo 'bg-gray-300'; } @endphp">
            <div class="w-3/12 h-16 pt-3 text-left border-l border-r">
                <img src="https://images.unsplash.com/photo-1619922529353-265926b3c020?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=50&h=50&q=80"
                    class="inline-flex w-10 h-10 mx-2 border-4 rounded-full border-bdazzledblue-800" />
                <span class="w-max">{{ $persona->formated_name }}</span>
            </div>
            <div class="w-1/12 h-16 pt-5 border-r">{{ $persona->date_of_birth_language }}</div>
            <div class="w-2/12 h-16 pt-5 border-r">{{ $persona->phone->first()->formated_phone }}</div>
            <div class="w-1/12 h-16 pt-5 border-r">{{ $persona->social_security }}</div>
            <div class="w-2/12 h-16 pt-5 border-r">{{ $persona->patient->patient_level_accession }}</div>
            <div class="w-1/12 h-16 pt-5 border-r">{{ $persona->patient->patID }}</div>
            <div class="w-2/12 h-16 pt-5 border-r">{{ $persona->patient->externalID }}</div>
        </a>
        @endforeach
    </div>
    <div class="flex flex-col w-full mt-2 text-sm">
        {{ $personas->links() }}
    </div>
    @endsection

    @push('scripts')
    @endpush

</x-layouts.user>
