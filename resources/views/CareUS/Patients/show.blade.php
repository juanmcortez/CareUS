@extends('Layouts.careus-in')

@section('pageTitle', $pageTitle)

@push('styles')
@endpush

@section('submenu')
<div class="max-w-full p-2 text-center text-white bg-blue-800 md:w-1/4 md:py-4 md:rounded md:rounded-r-none">
    <h2 class="text-sm font-semibold leading-tight uppercase md:text-xl">{{ $pageH2 }}</h2>
</div>
<div class="max-w-full p-2 text-left md:w-3/4">
</div>
@endsection

@section('content')
<div class="flex flex-col my-4 md:flex-row">
    <div class="relative w-full mb-2 md:w-1/4 md:mb-0">
        <a href="{{ route('patients.edit', ['patient' => $patient->patID]) }}"
            class="absolute text-red-700 top-2 right-2">
            <svg class="w-4 h-4" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="edit" role="img"
                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                <path fill="currentColor"
                    d="M402.6 83.2l90.2 90.2c3.8 3.8 3.8 10 0 13.8L274.4 405.6l-92.8 10.3c-12.4 1.4-22.9-9.1-21.5-21.5l10.3-92.8L388.8 83.2c3.8-3.8 10-3.8 13.8 0zm162-22.9l-48.8-48.8c-15.2-15.2-39.9-15.2-55.2 0l-35.4 35.4c-3.8 3.8-3.8 10 0 13.8l90.2 90.2c3.8 3.8 10 3.8 13.8 0l35.4-35.4c15.2-15.3 15.2-40 0-55.2zM384 346.2V448H64V128h229.8c3.2 0 6.2-1.3 8.5-3.5l40-40c7.6-7.6 2.2-20.5-8.5-20.5H48C21.5 64 0 85.5 0 112v352c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V306.2c0-10.7-12.9-16-20.5-8.5l-40 40c-2.2 2.3-3.5 5.3-3.5 8.5z"
                    class=""></path>
            </svg>
        </a>
        <table class="table w-full text-sm text-left text-gray-900 bg-gray-100 rounded">
            <tbody>
                <tr>
                    <td class="w-1/3 p-1 pr-2 font-semibold text-right">{{ __('Patient ID') }}</td>
                    <td>{{ $patient->patID }}</td>
                </tr>
                <tr>
                    <td class="w-1/3 p-1 pr-2 font-semibold text-right">{{ __('Birthdate') }}</td>
                    <td>{{ ucfirst($patient->persona->date_of_birth_language) }}</td>
                </tr>
                <tr>
                    <td class="w-1/3 p-1 pr-2 font-semibold text-right">{{ __('Social Security') }}</td>
                    <td>{{ $patient->persona->social_security }}</td>
                </tr>
                <tr>
                    <td class="w-1/3 p-1 pr-2 font-semibold text-right">{{ __('Phone') }}</td>
                    <td>{{ $patient->persona->phone->first()->formated_phone }}</td>
                </tr>
                <tr>
                    <td class="w-1/3 p-1 pr-2 font-semibold text-right">{{ __('Address') }}</td>
                    <td>{{ $patient->persona->address->street }}</td>
                </tr>
                @if (!empty($patient->persona->address->street_extended))
                <tr>
                    <td class="w-1/3 p-1 pr-2 font-semibold text-right">&nbsp;</td>
                    <td>{{ $patient->persona->address->street_extended }}</td>
                </tr>
                @endif
                <tr>
                    <td class="w-1/3 p-1 pr-2 font-semibold text-right">&nbsp;</td>
                    <td>{{ $patient->persona->address->city }},</td>
                </tr>
                <tr>
                    <td class="w-1/3 p-1 pr-2 font-semibold text-right">&nbsp;</td>
                    <td>{{ $patient->persona->address->state }} {{ $patient->persona->address->zip }}</td>
                </tr>
                <tr>
                    <td class="w-1/3 p-1 pr-2 font-semibold text-right">&nbsp;</td>
                    <td>{{ $patient->persona->address->country }}</td>
                </tr>
                @foreach ($patient->subscriber as $subscriber)
                <tr class="border-t border-blue-200">
                    <td class="w-1/3 p-1 pr-2 font-semibold text-right">{{ __(ucfirst($subscriber->level).' Ins.') }}
                    </td>
                    <td>{{ $subscriber->insurance->company_name }}</td>
                </tr>
                <tr>
                    <td class="w-1/3 p-1 pr-2 font-semibold text-right">{{ __('Ins. Policy') }}</td>
                    <td>{{ $subscriber->policy_number }}</td>
                </tr>
                <tr>
                    <td class="w-1/3 p-1 pr-2 font-semibold text-right">{{ __('Ins. Group') }}</td>
                    <td>{{ $subscriber->group_number }}</td>
                </tr>
                <tr>
                    <td class="w-1/3 p-1 pr-2 font-semibold text-right">{{ __('Phone') }}</td>
                    <td>{{ $subscriber->insurance->phone->formated_phone }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="w-full ml-0 md:w-3/4 md:ml-4">
        <table class="table w-full text-sm text-center text-gray-900 bg-gray-100 rounded">
            <thead>
                <tr class="font-medium text-center border-b-2 border-gray-300">
                    <th class="px-3 py-2 tracking-wider title-font">{{ __('Balance') }}</th>
                    <th class="px-3 py-2 tracking-wider title-font">{{ __('Total') }}</th>
                    <th class="px-3 py-2 tracking-wider title-font">{{ __('Unbilled') }}</th>
                    <th class="px-3 py-2 tracking-wider title-font">{{ __('Current') }}</th>
                    <th class="px-3 py-2 tracking-wider title-font">{{ __('> 30 Days') }}</th>
                    <th class="px-3 py-2 tracking-wider title-font">{{ __('> 60 Days') }}</th>
                    <th class="px-3 py-2 tracking-wider title-font">{{ __('> 90 Days') }}</th>
                    <th class="px-3 py-2 tracking-wider title-font">{{ __('> 120 Days') }}</th>
                </tr>
            </thead>
            <tbody>
                <tr class="text-center bg-gray-200 border-b border-gray-300">
                    <td class="px-3 py-2 font-medium border-r border-gray-300">{{ __('Insurance') }}</td>
                    <td class="px-3 py-2 border-r border-gray-300">0.00</td>
                    <td class="px-3 py-2 border-r border-gray-300">0.00</td>
                    <td class="px-3 py-2 border-r border-gray-300">0.00</td>
                    <td class="px-3 py-2 border-r border-gray-300">0.00</td>
                    <td class="px-3 py-2 border-r border-gray-300">0.00</td>
                    <td class="px-3 py-2 border-r border-gray-300">0.00</td>
                    <td class="px-3 py-2">0.00</td>
                </tr>
                <tr class="text-center bg-gray-300 border-b border-gray-200">
                    <td class="px-3 py-2 font-medium border-r border-gray-200">{{ __('Patient') }}</td>
                    <td class="px-3 py-2 border-r border-gray-200">0.00</td>
                    <td class="px-3 py-2 border-r border-gray-200">0.00</td>
                    <td class="px-3 py-2 border-r border-gray-200">0.00</td>
                    <td class="px-3 py-2 border-r border-gray-200">0.00</td>
                    <td class="px-3 py-2 border-r border-gray-200">0.00</td>
                    <td class="px-3 py-2 border-r border-gray-200">0.00</td>
                    <td class="px-3 py-2">0.00</td>
                </tr>
                <tr class="text-center bg-gray-200 border-b border-gray-300">
                    <td class="px-3 py-2 font-medium border-r border-gray-300">{{ __('Account') }}</td>
                    <td class="px-3 py-2 border-r border-gray-300">0.00</td>
                    <td class="px-3 py-2 border-r border-gray-300">0.00</td>
                    <td class="px-3 py-2 border-r border-gray-300">0.00</td>
                    <td class="px-3 py-2 border-r border-gray-300">0.00</td>
                    <td class="px-3 py-2 border-r border-gray-300">0.00</td>
                    <td class="px-3 py-2 border-r border-gray-300">0.00</td>
                    <td class="px-3 py-2">0.00</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection

@push('scripts')
@endpush
