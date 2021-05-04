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
    <div class="flex flex-row mb-1 md:mb-0">
        <div class="relative">
            <select
                class="block h-full max-w-full px-4 py-2 pr-8 leading-tight text-gray-700 bg-white border border-gray-400 rounded-l appearance-none border-r-none focus:outline-none focus:bg-white focus:border-gray-500">
                <option>5</option>
                <option selected>10</option>
                <option>25</option>
                <option>50</option>
                <option>100</option>
            </select>
            <div class="absolute inset-y-0 right-0 flex items-center px-2 text-gray-700 pointer-events-none">
                <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                </svg>
            </div>
        </div>
    </div>
    <div class="relative block">
        <span class="absolute inset-y-0 left-0 flex items-center h-full pl-2">
            <svg viewBox="0 0 24 24" class="w-4 h-4 text-gray-500 fill-current">
                <path
                    d="M10 4a6 6 0 100 12 6 6 0 000-12zm-8 6a8 8 0 1114.32 4.906l5.387 5.387a1 1 0 01-1.414 1.414l-5.387-5.387A8 8 0 012 10z">
                </path>
            </svg>
        </span>
        <input placeholder="{{ __('Search') }}"
            class="block max-w-full py-2 pl-8 pr-6 text-sm text-gray-700 placeholder-gray-400 bg-white border border-b border-gray-400 rounded-l rounded-r appearance-none md:rounded-l-none focus:bg-white focus:placeholder-gray-600 focus:text-gray-700 focus:outline-none" />
    </div>
</div>
<div class="px-4 pb-4 -mx-4 overflow-x-auto md:-mx-8 md:px-8">
    <div class="overflow-hidden rounded-lg shadow inline-blockw-full">
        <table class="w-full leading-normal">
            <thead>
                <tr class="text-center">
                    <th
                        class="px-5 py-2 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200">
                        {{ __('Patient') }}
                    </th>
                    <th
                        class="px-5 py-2 text-xs font-semibold tracking-wider text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200">
                        {{ __('DOB') }}
                    </th>
                    <th
                        class="px-5 py-2 text-xs font-semibold tracking-wider text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200">
                        {{ __('Phone') }}
                    </th>
                    <th
                        class="px-5 py-2 text-xs font-semibold tracking-wider text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200">
                        {{ __('Social Security') }}
                    </th>
                    <th
                        class="px-5 py-2 text-xs font-semibold tracking-wider text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200">
                        {{ __('Accession #') }}
                    </th>
                    <th
                        class="px-5 py-2 text-xs font-semibold tracking-wider text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200">
                        {{ __('Patient ID') }}
                    </th>
                    <th
                        class="px-5 py-2 text-xs font-semibold tracking-wider text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200">
                        {{ __('External ID') }}
                    </th>
                    <th class="px-5 py-2 bg-gray-100 border-b-2 border-gray-200">
                        &nbsp;
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($personas as $persona)
                <tr class="text-center">
                    <td class="px-5 py-3 text-sm bg-white border-b border-gray-200">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 w-10 h-10">
                                <img class="h-full max-w-full rounded-full"
                                    src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2.2&w=160&h=160&q=80"
                                    alt="" />
                            </div>
                            <div class="ml-3">
                                <p class="text-gray-900 whitespace-no-wrap">
                                    {{ $persona->formated_name }}
                                </p>
                            </div>
                        </div>
                    </td>
                    <td class="px-5 py-3 text-sm bg-white border-b border-gray-200">
                        <p class="text-gray-900 whitespace-no-wrap">
                            {{ ucfirst($persona->date_of_birth_language) }}
                        </p>
                    </td>
                    <td class="px-5 py-3 text-sm bg-white border-b border-gray-200">
                        <p class="text-gray-900 whitespace-no-wrap">
                            {{ $persona->phone->first()->formated_phone }}
                        </p>
                    </td>
                    <td class="px-5 py-3 text-sm bg-white border-b border-gray-200">
                        <p class="text-gray-900 whitespace-no-wrap">
                            {{ $persona->social_security }}
                        </p>
                    </td>
                    <td class="px-5 py-3 text-sm bg-white border-b border-gray-200">
                        <p class="text-gray-900 whitespace-no-wrap">
                            {{ $persona->patient->patient_level_accession }}
                        </p>
                    </td>
                    <td class="px-5 py-3 text-sm bg-white border-b border-gray-200">
                        <p class="text-gray-900 whitespace-no-wrap">
                            {{ $persona->patient->patID }}
                        </p>
                    </td>
                    <td class="px-5 py-3 text-sm bg-white border-b border-gray-200">
                        <p class="text-gray-900 whitespace-no-wrap">
                            {{ $persona->patient->externalID }}
                        </p>
                    </td>
                    <td class="px-5 py-3 text-sm bg-white border-b border-gray-200">
                        <a href="{{ route('patients.show', ['patient' => $persona->patient->patID]) }}">
                            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="8" class="pt-4 border-0">
                        {{ $personas->links() }}
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
@endsection

@push('scripts')
@endpush
