<x-layouts.logged>

    @section('pageTitle', $pageTitle)

    @push('styles')
    @endpush

    @section('content')
    <x-common.pageheader download csv class="pt-10 pb-16">{{ $pageH2 }}</x-common.pageheader>

    <table class="table w-full mb-10 text-sm table-auto">
        <thead class="text-bdazzledblue-400">
            <tr class="flex flex-row items-center justify-around flex-nowrap bg-gunmetal-50">
                <th class="w-1/12 py-5">{{ __('ID') }}</th>
                <th class="w-3/12 py-5">{{ __('Patient') }}</th>
                <th class="w-2/12 py-5">{{ __('Birthdate') }}</th>
                <th class="w-2/12 py-5">{{ __('Social Security') }}</th>
                <th class="w-2/12 py-5">{{ __('Phone') }}</th>
                <th class="w-1/12 py-5">{{ __('External ID') }}</th>
                <th class="w-1/12 py-5">&nbsp;</th>
            </tr>
            <tr>
                <td colspan="7" class="py-2"></td>
            </tr>
        </thead>
        <tbody>
            @foreach ($personas as $idx => $persona)
            <tr class="flex flex-row flex-nowrap items-center justify-around text-center transition-colors duration-150 ease-in-out shadow-sm
                @if($idx % 2 == 1)
                @if ($persona->decease_date) bg-red-200 hover:bg-red-100 @else bg-gunmetal-50 hover:bg-bdazzledblue-200 @endif
                @else
                @if ($persona->decease_date) bg-red-200 hover:bg-red-100 @else bg-gunmetal-100 hover:bg-bdazzledblue-200 @endif
                @endif text-gunmetal-400 hover:text-burntsienna-600 ">
                <td class="w-1/12 py-5">{{ $persona->patient->patID }}</td>
                <td class="flex flex-row flex-wrap items-center justify-start w-3/12 p-5 py-5">
                    @isset($persona->profile_picture)
                    <img alt="{{ $persona->formated_name }}" src="{{ $persona->profile_picture }}" />
                    @else
                    <i class="mr-2 text-3xl fa fa-user-circle"></i>
                    @endisset
                    {{ $persona->formated_name }}
                </td>
                <td class="w-2/12 py-5">{{ $persona->date_of_birth_language }}</td>
                <td class="w-2/12 py-5">{{ $persona->social_security }}</td>
                <td class="w-2/12 py-5">{{ $persona->phone->first()->formated_phone }}</td>
                <td class="w-1/12 py-5">{{ $persona->patient->externalID }}</td>
                <td class="w-1/12 py-5">
                    <a href="{{ route('patients.show', ['patient' => $persona->patient->patID]) }}">
                        <i class="fas fa-eye"></i>
                    </a>
                    @if($persona->patient->created_at->format('Y-m-d') >= date('Y-m-d', strtotime("-2 days"))) <i
                        class="p-2 ml-2 text-green-500 bg-green-200 rounded-full fas fa-star"
                        title="{{ __('New patient') }}"></i>
                    @endif
                </td>
            </tr>
            <tr>
                <td colspan="7" class="py-2"></td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="7" class="py-3"></td>
            </tr>
            <tr>
                <td colspan="7">
                    {{ $personas->links() }}
                </td>
            </tr>
        </tfoot>
    </table>
    @endsection

    @push('scripts')
    @endpush

</x-layouts.logged>
