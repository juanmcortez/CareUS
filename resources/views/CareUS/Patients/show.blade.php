@extends('Layouts.careus-in')

@section('pageTitle', $pageTitle)

@push('styles')
@endpush

@section('submenu')
@endsection

@section('content')
<div class="flex flex-col md:flex-row">
    <div class="w-full md:w-1/4 mb-2 md:mb-0">
        <table class="table w-full text-left text-gray-900 text-sm bg-gray-100 rounded">
            <tbody>
                <tr>
                    <td class="w-1/3 p-1 pr-2 text-right font-semibold">{{ __('Patient ID') }}</td>
                    <td>{{ $patient->patID }}</td>
                </tr>
                <tr>
                    <td class="w-1/3 p-1 pr-2 text-right font-semibold">{{ __('Birthdate') }}</td>
                    <td>{{ ucfirst($patient->persona->date_of_birth->translatedFormat('M d, Y')) }}</td>
                </tr>
                <tr>
                    <td class="w-1/3 p-1 pr-2 text-right font-semibold">{{ __('Social Security') }}</td>
                    <td>{{ $patient->persona->social_security }}</td>
                </tr>
                <tr>
                    <td class="w-1/3 p-1 pr-2 text-right font-semibold">{{ __('Phone') }}</td>
                    <td>{{ $patient->persona->phone->first()->formated_phone }}</td>
                </tr>
                <tr>
                    <td class="w-1/3 p-1 pr-2 text-right font-semibold">{{ __('Address') }}</td>
                    <td>{{ $patient->persona->address->street }}</td>
                </tr>
                @if (!empty($patient->persona->address->street_extended))
                <tr>
                    <td class="w-1/3 p-1 pr-2 text-right font-semibold">&nbsp;</td>
                    <td>{{ $patient->persona->address->street_extended }}</td>
                </tr>
                @endif
                <tr>
                    <td class="w-1/3 p-1 pr-2 text-right font-semibold">&nbsp;</td>
                    <td>{{ $patient->persona->address->city }},</td>
                </tr>
                <tr>
                    <td class="w-1/3 p-1 pr-2 text-right font-semibold">&nbsp;</td>
                    <td>{{ $patient->persona->address->state }} {{ $patient->persona->address->zip }}</td>
                </tr>
                <tr>
                    <td class="w-1/3 p-1 pr-2 text-right font-semibold">&nbsp;</td>
                    <td>{{ $patient->persona->address->country }}</td>
                </tr>
                @foreach ($patient->subscriber as $subscriber)
                <tr class="border-t border-blue-200">
                    <td class="w-1/3 p-1 pr-2 text-right font-semibold">{{ __(ucfirst($subscriber->level).' Ins.') }}
                    </td>
                    <td>{{ $subscriber->insurance->company_name }}</td>
                </tr>
                <tr>
                    <td class="w-1/3 p-1 pr-2 text-right font-semibold">{{ __('Ins. Policy') }}</td>
                    <td>{{ $subscriber->policy_number }}</td>
                </tr>
                <tr>
                    <td class="w-1/3 p-1 pr-2 text-right font-semibold">{{ __('Ins. Group') }}</td>
                    <td>{{ $subscriber->group_number }}</td>
                </tr>
                <tr>
                    <td class="w-1/3 p-1 pr-2 text-right font-semibold">{{ __('Phone') }}</td>
                    <td>{{ $subscriber->insurance->phone->formated_phone }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="w-full md:w-3/4 ml-0 md:ml-4">
        <table class="table w-full text-center text-gray-900 text-sm bg-gray-100 rounded">
            <thead>
                <tr class="border-b-2 border-gray-300 text-center font-medium">
                    <th class="px-3 py-2 title-font tracking-wider">{{ __('Balance') }}</th>
                    <th class="px-3 py-2 title-font tracking-wider">{{ __('Total') }}</th>
                    <th class="px-3 py-2 title-font tracking-wider">{{ __('Unbilled') }}</th>
                    <th class="px-3 py-2 title-font tracking-wider">{{ __('Current') }}</th>
                    <th class="px-3 py-2 title-font tracking-wider">{{ __('> 30 Days') }}</th>
                    <th class="px-3 py-2 title-font tracking-wider">{{ __('> 60 Days') }}</th>
                    <th class="px-3 py-2 title-font tracking-wider">{{ __('> 90 Days') }}</th>
                    <th class="px-3 py-2 title-font tracking-wider">{{ __('> 120 Days') }}</th>
                </tr>
            </thead>
            <tbody>
                <tr class="border-b border-gray-300 bg-gray-200 text-center">
                    <td class="px-3 py-2 font-medium border-r border-gray-300">{{ __('Insurance') }}</td>
                    <td class="px-3 py-2 border-r border-gray-300">0.00</td>
                    <td class="px-3 py-2 border-r border-gray-300">0.00</td>
                    <td class="px-3 py-2 border-r border-gray-300">0.00</td>
                    <td class="px-3 py-2 border-r border-gray-300">0.00</td>
                    <td class="px-3 py-2 border-r border-gray-300">0.00</td>
                    <td class="px-3 py-2 border-r border-gray-300">0.00</td>
                    <td class="px-3 py-2">0.00</td>
                </tr>
                <tr class="border-b border-gray-200 bg-gray-300 text-center">
                    <td class="px-3 py-2 font-medium border-r border-gray-200">{{ __('Patient') }}</td>
                    <td class="px-3 py-2 border-r border-gray-200">0.00</td>
                    <td class="px-3 py-2 border-r border-gray-200">0.00</td>
                    <td class="px-3 py-2 border-r border-gray-200">0.00</td>
                    <td class="px-3 py-2 border-r border-gray-200">0.00</td>
                    <td class="px-3 py-2 border-r border-gray-200">0.00</td>
                    <td class="px-3 py-2 border-r border-gray-200">0.00</td>
                    <td class="px-3 py-2">0.00</td>
                </tr>
                <tr class="border-b border-gray-300 bg-gray-200 text-center">
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
