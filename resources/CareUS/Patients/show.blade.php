<x-layouts.logged>

    @section('pageTitle', $pageTitle)

    @push('styles')
    @endpush

    @section('content')
    <x-common.pageheader>{{ $pageH2 }}</x-common.pageheader>

    <div class="w-8/12 pb-4 pr-4 text-sm">
        <div class="min-h-full text-left rounded bg-palecerulean-400">
            <table class="table w-full text-sm text-center text-gray-900 border-none rounded">
                <thead>
                    <tr class="font-medium tracking-wider text-center border-b-2 border-palecerulean-300">
                        <th class="py-3 pl-6 text-left">{{ __('Balance') }}</th>
                        <th class="py-3">{{ __('Total') }}</th>
                        <th class="py-3">{{ __('Unbilled') }}</th>
                        <th class="py-3">{{ __('Current') }}</th>
                        <th class="py-3">{{ __('> 30 Days') }}</th>
                        <th class="py-3">{{ __('> 60 Days') }}</th>
                        <th class="py-3">{{ __('> 90 Days') }}</th>
                        <th class="py-3">{{ __('> 120 Days') }}</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="text-center border-b bg-palecerulean-200 border-palecerulean-300">
                        <td class="py-2 pl-6 font-medium text-left border-r border-palecerulean-300">
                            {{ __('Insurance') }}
                        </td>
                        <td class="py-2 border-r border-palecerulean-300">0.00</td>
                        <td class="py-2 border-r border-palecerulean-300">0.00</td>
                        <td class="py-2 border-r border-palecerulean-300">0.00</td>
                        <td class="py-2 border-r border-palecerulean-300">0.00</td>
                        <td class="py-2 border-r border-palecerulean-300">0.00</td>
                        <td class="py-2 border-r border-palecerulean-300">0.00</td>
                        <td class="px-3 py-2">0.00</td>
                    </tr>
                    <tr class="text-center border-b bg-palecerulean-300 border-palecerulean-200">
                        <td class="py-2 pl-6 font-medium text-left border-r border-palecerulean-200">
                            {{ __('Patient') }}
                        </td>
                        <td class="py-2 border-r border-palecerulean-200">0.00</td>
                        <td class="py-2 border-r border-palecerulean-200">0.00</td>
                        <td class="py-2 border-r border-palecerulean-200">0.00</td>
                        <td class="py-2 border-r border-palecerulean-200">0.00</td>
                        <td class="py-2 border-r border-palecerulean-200">0.00</td>
                        <td class="py-2 border-r border-palecerulean-200">0.00</td>
                        <td class="px-3 py-2">0.00</td>
                    </tr>
                    <tr class="text-center border-b bg-palecerulean-200 border-palecerulean-300">
                        <td class="py-2 pl-6 font-medium text-left border-r border-palecerulean-300">
                            {{ __('Account') }}
                        </td>
                        <td class="py-2 border-r border-palecerulean-300">0.00</td>
                        <td class="py-2 border-r border-palecerulean-300">0.00</td>
                        <td class="py-2 border-r border-palecerulean-300">0.00</td>
                        <td class="py-2 border-r border-palecerulean-300">0.00</td>
                        <td class="py-2 border-r border-palecerulean-300">0.00</td>
                        <td class="py-2 border-r border-palecerulean-300">0.00</td>
                        <td class="px-3 py-2">0.00</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="w-4/12 pb-4 text-sm">
        <div class="min-h-full text-left rounded bg-palecerulean-400">
            <table class="table w-full text-sm text-center text-gray-900 border-none rounded">
                <thead>
                    <tr class="font-medium tracking-wider text-center border-b-2 border-palecerulean-300">
                        <th class="py-3 pl-6 text-left">{{ __('Balance') }}</th>
                        <th class="py-3">{{ __('Total') }}</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="text-center border-b bg-palecerulean-200 border-palecerulean-300">
                        <td class="py-2 pl-6 font-medium text-left border-r border-palecerulean-300">
                            {{ __('Insurance') }}
                        </td>
                        <td class="px-3 py-2">0.00</td>
                    </tr>
                    <tr class="text-center border-b bg-palecerulean-300 border-palecerulean-200">
                        <td class="py-2 pl-6 font-medium text-left border-r border-palecerulean-200">
                            {{ __('Patient') }}
                        </td>
                        <td class="px-3 py-2">0.00</td>
                    </tr>
                    <tr class="text-center border-b bg-palecerulean-200 border-palecerulean-300">
                        <td class="py-2 pl-6 font-medium text-left border-r border-palecerulean-300">
                            {{ __('Account') }}
                        </td>
                        <td class="px-3 py-2">0.00</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="w-3/12 pb-4 text-sm">
        <div class="relative min-h-full p-6 text-center rounded bg-burntsienna-200">
            <a href="{{ route('patients.edit', ['patient'=> $patient->patID]) }}"
                class="absolute rounded-full shadow-md text-md right-1/3 top-1/3 hover:bg-gunmetal-500 hover:text-lightcyan-100 bg-lightcyan-100 text-gunmetal-500">
                <i class="p-3 fas fa-edit"></i>
            </a>
            <img class="w-32 h-32 mx-auto border-2 rounded-full border-burntsienna-500"
                alt="{{ $patient->persona->formated_name }}"
                src="https://images.unsplash.com/photo-1619922529353-265926b3c020?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=150&h=150&q=80" />
            <h3 class="pt-4 text-2xl font-bold">{{ $patient->persona->formated_name }}</h3>
            <p class="pt-1 text-palecerulean-800">{{ $patient->persona->email }}</p>
            <div class="flex flex-row mt-6">
                <div class="w-5/12 text-center border-r-2 border-burntsienna-500">
                    <h5 class="text-xl font-bold">{{ $patient->patID }}</h5>
                    <p class="text-xs text-palecerulean-800">{{ __('Patient ID') }}</p>
                </div>
                <div class="w-7/12">
                    <h5 class="text-xl font-bold">{{ $patient->externalID }}</h5>
                    <p class="text-xs text-palecerulean-800">{{ __('External ID') }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="w-6/12 px-4 pb-4 text-sm">
        <div class="min-h-full p-6 space-y-4 text-left rounded bg-burntsienna-200">
            <div class="flex flex-row font-bold text-burntsienna-500">
                <div class="w-3/12">{{ __('Birthday') }}</div>
                <div class="w-3/12">{{ __('Social Security') }}</div>
                <div class="w-3/12">{{ __('Phone') }}</div>
                <div class="w-3/12">{{ __('Gender') }}</div>
            </div>
            <div class="flex flex-row text-gunmetal-500">
                <div class="w-3/12">
                    {{ $patient->persona->date_of_birth_language.' ['.$patient->persona->current_age.']' }}
                </div>
                <div class="w-3/12">{{ $patient->persona->social_security }}</div>
                <div class="w-3/12">{{ $patient->persona->phone->first()->formated_phone }}</div>
                <div class="w-3/12">{{ __(ucfirst($patient->persona->gender)) }}</div>
            </div>

            <div class="flex flex-row font-bold text-burntsienna-500">
                <div class="w-6/12">{{ __('Address') }}</div>
                <div class="w-3/12">{{ __('City') }}</div>
                <div class="w-3/12">{{ __('State / Zip') }}</div>
            </div>
            <div class="flex flex-row text-gunmetal-500">
                <div class="w-6/12">
                    {{ $patient->persona->address->street }}
                    @if(!empty($patient->persona->address->street_extended))
                    - {{ $patient->persona->address->street_extended }}
                    @endif
                </div>
                <div class="w-3/12">{{ $patient->persona->address->city }}</div>
                <div class="w-3/12">{{ $patient->persona->address->state }}, {{ $patient->persona->address->zip }}</div>
            </div>

            @foreach ($patient->subscriber as $subscriber)
            <div class="flex flex-row font-bold text-burntsienna-500">
                <div class="w-3/12">{{ __(ucfirst($subscriber->level).' Ins.') }}</div>
                <div class="w-3/12">{{ __('Ins. Policy') }}</div>
                <div class="w-3/12">{{ __('Ins. Group') }}</div>
                <div class="w-3/12">{{ __('Phone') }}</div>
            </div>
            <div class="flex flex-row text-gunmetal-500">
                <div class="w-3/12">{{ $subscriber->insurance->company_name }}</div>
                <div class="w-3/12">{{ $subscriber->policy_number }}</div>
                <div class="w-3/12">{{ $subscriber->group_number }}</div>
                <div class="w-3/12">{{ $subscriber->insurance->phone->formated_phone }}</div>
            </div>
            @endforeach
        </div>
    </div>

    <div class="w-3/12 pb-4 text-sm">
        <div class="min-h-full p-6 text-left rounded bg-palecerulean-400">
            <h4 class="text-xl font-bold">{{ __('Notes') }}</h4>
        </div>
    </div>

    <div class="w-full pb-4 text-sm">
        <div class="min-h-full text-left rounded bg-bdazzledblue-400">
            <table class="table w-full text-sm text-gray-900 border-none rounded bg-bdazzledblue-500">
                <thead>
                    <tr class="text-center uppercase text-lightcyan-500">
                        <th class="py-4 border-r border-bdazzledblue-700">{{ __('Inv. #') }}</th>
                        <th class="border-r border-bdazzledblue-700">{{ __('Srv Date') }}</th>
                        <th class="border-r border-bdazzledblue-700">{{ __('Code') }}</th>
                        <th class="border-r border-bdazzledblue-700">{{ __('Mods') }}</th>
                        <th class="border-r border-bdazzledblue-700">{{ __('ICDs') }}</th>
                        <th class="border-r border-bdazzledblue-700">{{ __('Pvr') }}</th>
                        <th class="border-r border-bdazzledblue-700">{{ __('Units') }}</th>
                        <th class="border-r border-bdazzledblue-700">{{ __('Charge') }}</th>
                        <th class="border-r border-bdazzledblue-700">{{ __('PTP') }}</th>
                        <th class="border-r border-bdazzledblue-700">{{ __('PBR') }}</th>
                        <th class="border-r border-bdazzledblue-700">{{ __('Paid') }}</th>
                        <th class="border-r border-bdazzledblue-700">{{ __('Adj') }}</th>
                        <th class="border-r border-bdazzledblue-700">{{ __('Bal') }}</th>
                        <th class="border-r border-bdazzledblue-700">{{ __('Entry Date') }}</th>
                        <th>{{ __('Insurance') }}</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="bg-bdazzledblue-200">
                        <td class="py-3 text-center text-red-700" colspan="15">
                            {!! __('<strong>No</strong> invoices found for <strong>:patient_name</strong>',
                            ['patient_name'
                            =>
                            $patient->persona->formated_name]) !!}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    @endsection

    @push('scripts')
    @endpush
</x-layouts.logged>
