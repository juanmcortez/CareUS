@extends('Layouts.careus-in')

@section('pageTitle', $pageTitle)

@push('styles')
@endpush

@section('submenu')
<div class="max-w-full md:w-1/4 p-2 md:py-4 text-center text-white bg-blue-800 md:rounded md:rounded-r-none">
    <h2 class="text-sm md:text-xl uppercase font-semibold leading-tight">{{ $pageH2 }}</h2>
</div>
<div class="max-w-full md:w-3/4 p-2 text-left">
    <ul class="flex flex-row flex-wrap text-xs">
        <li class="w-1/3 md:w-1/12 md:mb-3 pr-1 font-semibold text-right uppercase">
            {{ __('Patient ID') }}
        </li>
        <li class="w-2/3 md:w-1/12 mb-3 text-left">
            {{ $patient->patID }}
        </li>
        <li class="w-1/3 md:w-1/12 md:mb-3 pr-1 font-semibold text-right uppercase">
            {{ __('Birthdate') }}
        </li>
        <li class="w-2/3 md:w-1/12 mb-3 text-left">
            {{ ucfirst($patient->persona->date_of_birth->translatedFormat('M d, Y')) }}
        </li>
        <li class="w-1/3 md:w-1/12 md:mb-3 pr-1 font-semibold text-right uppercase">{{ __('Address') }}</li>
        <li class="w-2/3 md:w-4/12 mb-3 text-left">
            {{ $patient->persona->address->street }} |
            {{ $patient->persona->address->city }},
            {{ $patient->persona->address->state }} {{ $patient->persona->address->zip }}
        </li>
        <li class="w-1/3 md:w-1/12 md:mb-3 pr-1 font-semibold text-right uppercase">
            {{ __('Phone') }}
        </li>
        <li class="w-2/3 md:w-2/12 mb-3 text-left">
            {{-- $patient->persona->phone->first()->formated_phone --}}
        </li>

        <li class="w-1/3 md:w-1/12 pr-1 pb-3 md:pb-0 font-semibold text-right uppercase">
            {{ __('SSN') }}
        </li>
        <li class="w-2/3 md:w-1/12 text-left">
            {{ $patient->persona->social_security }}
        </li>
        <li class="w-1/3 md:w-1/12 pr-1 pb-3 md:pb-0 font-semibold text-right uppercase">
            {{ __('Primary Ins.') }}
        </li>
        <li class="w-2/3 md:w-2/12 text-left">
            {{ $patient->subscriber->first()->insurance->company_name }}
        </li>
        <li class="w-1/3 md:w-1/12 pr-1 pb-3 md:pb-0 font-semibold text-right uppercase">
            {{ __('Ins. Policy') }}
        </li>
        <li class="w-2/3 md:w-1/12 text-left">
            {{ $patient->subscriber->first()->policy_number }}
        </li>
        <li class="w-1/3 md:w-1/12 pr-1 pb-3 md:pb-0 font-semibold text-right uppercase">
            {{ __('Ins. Group') }}
        </li>
        <li class="w-2/3 md:w-1/12 text-left">
            {{ $patient->subscriber->first()->group_number }}
        </li>
        <li class="w-1/3 md:w-1/12 pr-1 font-semibold text-right uppercase">
            {{ __('Ins. Phone') }}
        </li>
        <li class="w-2/3 md:w-2/12 text-left">
            {{-- $patient->subscriber->first()->insurance->phone->first()->formated_phone --}}
        </li>
    </ul>
</div>
@endsection

@section('content')
<div class="max-w-full mx-auto overflow-auto pt-4">
    <table
        class="table-auto max-w-full text-left whitespace-no-wrap text-gray-900 text-sm bg-gray-100 rounded-tr rounded-tl">
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
@endsection

@push('scripts')
@endpush
