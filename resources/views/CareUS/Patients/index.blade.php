@extends('Layouts.careus-in')

@section('pageTitle', $pageTitle)

@push('styles')
@endpush

@section('submenu')
<div class="max-w-full md:w-1/4 p-2 md:py-4 text-center text-white bg-blue-800 md:rounded md:rounded-r-none">
    <h2 class="text-sm md:text-xl uppercase font-semibold leading-tight">{{ $pageH2 }}</h2>
</div>
<div class="max-w-full md:w-3/4 p-2 text-left">
</div>
@endsection

@section('content')
<div class="my-4 flex md:flex-row flex-col">
    <div class="flex flex-row mb-1 md:mb-0">
        <div class="relative">
            <select
                class="appearance-none max-w-full h-full rounded-l border block bg-white border-gray-400 border-r-none text-gray-700 py-2 px-4 pr-8 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                <option>5</option>
                <option selected>10</option>
                <option>25</option>
                <option>50</option>
                <option>100</option>
            </select>
            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                </svg>
            </div>
        </div>
    </div>
    <div class="block relative">
        <span class="h-full absolute inset-y-0 left-0 flex items-center pl-2">
            <svg viewBox="0 0 24 24" class="h-4 w-4 fill-current text-gray-500">
                <path
                    d="M10 4a6 6 0 100 12 6 6 0 000-12zm-8 6a8 8 0 1114.32 4.906l5.387 5.387a1 1 0 01-1.414 1.414l-5.387-5.387A8 8 0 012 10z">
                </path>
            </svg>
        </span>
        <input placeholder="{{ __('Search') }}"
            class="appearance-none rounded-r rounded-l md:rounded-l-none border border-gray-400 border-b block pl-8 pr-6 py-2 max-w-full bg-white text-sm placeholder-gray-400 text-gray-700 focus:bg-white focus:placeholder-gray-600 focus:text-gray-700 focus:outline-none" />
    </div>
</div>
<div class="-mx-4 md:-mx-8 px-4 md:px-8 pb-4 overflow-x-auto">
    <div class="inline-blockw-full shadow rounded-lg overflow-hidden">
        <table class="w-full leading-normal">
            <thead>
                <tr class="text-center">
                    <th
                        class="px-5 py-2 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        {{ __('Patient') }}
                    </th>
                    <th
                        class="px-5 py-2 border-b-2 border-gray-200 bg-gray-100 text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        {{ __('DOB') }}
                    </th>
                    <th
                        class="px-5 py-2 border-b-2 border-gray-200 bg-gray-100 text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        {{ __('Phone') }}
                    </th>
                    <th
                        class="px-5 py-2 border-b-2 border-gray-200 bg-gray-100 text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        {{ __('Social Security') }}
                    </th>
                    <th
                        class="px-5 py-2 border-b-2 border-gray-200 bg-gray-100 text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        {{ __('Accession #') }}
                    </th>
                    <th
                        class="px-5 py-2 border-b-2 border-gray-200 bg-gray-100 text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        {{ __('Patient ID') }}
                    </th>
                    <th
                        class="px-5 py-2 border-b-2 border-gray-200 bg-gray-100 text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        {{ __('External ID') }}
                    </th>
                    <th class="px-5 py-2 border-b-2 border-gray-200 bg-gray-100">
                        &nbsp;
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($personas as $persona)
                <tr class="text-center">
                    <td class="px-5 py-3 border-b border-gray-200 bg-white text-sm">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 w-10 h-10">
                                <img class="max-w-full h-full rounded-full"
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
                    <td class="px-5 py-3 border-b border-gray-200 bg-white text-sm">
                        <p class="text-gray-900 whitespace-no-wrap">
                            {{ ucfirst($persona->date_of_birth->translatedFormat('M d, Y')) }}
                        </p>
                    </td>
                    <td class="px-5 py-3 border-b border-gray-200 bg-white text-sm">
                        <p class="text-gray-900 whitespace-no-wrap">
                            {{ $persona->phone->first()->formated_phone }}
                        </p>
                    </td>
                    <td class="px-5 py-3 border-b border-gray-200 bg-white text-sm">
                        <p class="text-gray-900 whitespace-no-wrap">
                            {{ $persona->social_security }}
                        </p>
                    </td>
                    <td class="px-5 py-3 border-b border-gray-200 bg-white text-sm">
                        <p class="text-gray-900 whitespace-no-wrap">
                            {{ $persona->patient->patient_level_accession }}
                        </p>
                    </td>
                    <td class="px-5 py-3 border-b border-gray-200 bg-white text-sm">
                        <p class="text-gray-900 whitespace-no-wrap">
                            {{ $persona->patient->patID }}
                        </p>
                    </td>
                    <td class="px-5 py-3 border-b border-gray-200 bg-white text-sm">
                        <p class="text-gray-900 whitespace-no-wrap">
                            {{ $persona->patient->externalID }}
                        </p>
                    </td>
                    <td class="px-5 py-3 border-b border-gray-200 bg-white text-sm">
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
