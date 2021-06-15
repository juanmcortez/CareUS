<x-layouts.logged>

    @section('pageTitle', $pageTitle)

    @push('styles')
    @endpush

    @section('content')
    <x-common.pageheader download csv class="pt-10 pb-16">{{ $pageH2 }}</x-common.pageheader>

    <table class="table w-full mb-10 text-sm table-auto">
        <thead class="text-bdazzledblue-400">
            <tr class="flex flex-row items-center justify-around flex-nowrap bg-gunmetal-50">
                <th class="w-2/12 py-5">{{ __('Patient') }}</th>
                <th class="w-1/12 py-5">{{ __('Category') }}</th>
                <th class="w-1/12 py-5">{{ __('Date') }}</th>
                <th class="w-2/12 py-5">{{ __('Title') }}</th>
                <th class="w-6/12 py-5">{{ __('Note') }}</th>
            </tr>
            <tr>
                <td colspan="5" class="py-2"></td>
            </tr>
        </thead>
        <tbody>
            @foreach ($notes as $ndx => $note)
            <tr class="flex flex-row flex-nowrap items-start justify-around text-center transition-colors duration-150 ease-in-out shadow-sm
            @if($ndx % 2 == 1)
            bg-gunmetal-50 hover:bg-bdazzledblue-200
            @else
            bg-gunmetal-100 hover:bg-bdazzledblue-200
            @endif text-gunmetal-400 hover:text-burntsienna-600 ">
                <td class="flex flex-row flex-wrap items-start justify-start w-2/12 p-5 py-5">
                    <a class="flex flex-row flex-wrap items-center justify-start"
                        href="{{ route('patients.show', ['patient' => $note->patient->patID, 'ledgerTab' => 'notes']) }}">
                        @isset($note->patient->persona->profile_photo)
                        <div class="w-8 h-8 mr-2 overflow-hidden border-2 rounded-full border-burntsienna-400">
                            <img alt="{{ $note->patient->persona->formated_name }}"
                                src="{{ secure_asset($note->patient->persona->profile_photo) }}" />
                        </div>
                        @else
                        <i class="mr-2 text-3xl fa fa-user-circle"></i>
                        @endisset
                        {{ $note->patient->persona->formated_name }}
                    </a>
                </td>
                <td class="w-1/12 py-5">{{ $note->category }}</td>
                <td class="w-1/12 py-5">{{ $note->created_at_language }}</td>
                <td class="w-2/12 py-5 text-left">{{ $note->title }}</td>
                <td class="w-6/12 py-5 text-left">{{ $note->body }}</td>
            </tr>
            <tr>
                <td colspan="5" class="py-2"></td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $notes->links() }}
    @endsection

    @push('scripts')
    @endpush
</x-layouts.logged>
