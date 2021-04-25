@extends('Layouts.careus-in')

@section('title', '')

@push('styles')
@endpush

@section('content')
<div class="overflow-x-auto">
    <div
        class="min-w-screen min-h-screen bg-gray-100 flex items-start justify-center bg-gray-100 font-sans overflow-hidden">
        <div class="w-full">
            <div class="bg-white shadow-md rounded my-6">
                <table class="min-w-max w-full table-auto">
                    <thead>
                        <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                            <th class="py-3 px-6 text-left">Patient</th>
                            <th class="py-3 px-6 text-center">DOB</th>
                            <th class="py-3 px-6 text-center">Phone</th>
                            <th class="py-3 px-6 text-center">SSN</th>
                            <th class="py-3 px-6 text-center">Accession #</th>
                            <th class="py-3 px-6 text-center">PID</th>
                            <th class="py-3 px-6 text-center">External ID</th>
                            <th class="py-3 px-6 text-center">&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600 text-sm font-light">
                        @foreach ($personas as $persona)
                        <tr class="border-b border-gray-200 hover:bg-gray-100">
                            <td class="py-3 px-6 text-left whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="mr-2">
                                        {{ $persona->formated_name }}
                                    </div>
                                </div>
                            </td>
                            <td class="py-3 px-6 text-center whitespace-nowrap">
                                <div class="flex items-center justify-center">
                                    <div class="mr-2">
                                        {{ $persona->date_of_birth->format('M d, Y') }}
                                    </div>
                                </div>
                            </td>
                            <td class="py-3 px-6 text-center whitespace-nowrap">
                                <div class="flex items-center justify-center">
                                    <div class="mr-2">
                                        {{ $persona->phone->first()->formated_phone }}
                                    </div>
                                </div>
                            </td>
                            <td class="py-3 px-6 text-center whitespace-nowrap">
                                <div class="flex items-center justify-center">
                                    <div class="mr-2">
                                        {{ $persona->social_security }}
                                    </div>
                                </div>
                            </td>
                            <td class="py-3 px-6 text-center whitespace-nowrap">
                                <div class="flex items-center justify-center">
                                    <div class="mr-2">
                                        {{ $persona->patient->patient_level_accession }}
                                    </div>
                                </div>
                            </td>
                            <td class="py-3 px-6 text-center whitespace-nowrap">
                                <div class="flex items-center justify-center">
                                    <div class="mr-2">
                                        {{ $persona->patient->patID }}
                                    </div>
                                </div>
                            </td>
                            <td class="py-3 px-6 text-center whitespace-nowrap">
                                <div class="flex items-center justify-center">
                                    <div class="mr-2">
                                        {{ $persona->patient->externalID }}
                                    </div>
                                </div>
                            </td>
                            <td class="py-3 px-6 text-center">
                                <div class="flex item-center justify-center">
                                    <div
                                        class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110 hover:cursor-pointer">
                                        <a href="{{ route('patients.show', ['patient' => $persona->patient->patID]) }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                        </a>
                                    </div>
                                    <!-- <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                        </svg>
                                    </div>
                                    <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </div> -->
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{ $personas->links() }}
        </div>
    </div>
</div>


{{--
    @foreach ($personas as $persona)
    <pre><strong>Patient:</strong> {!! $persona->patient !!}</pre>
    <pre><strong>Patient Persona:</strong> {!! $persona !!}</pre>
    <pre><strong>Patient Address:</strong> {!! $persona->address !!}</pre>
    @foreach ($persona->phone as $phone)
    <pre><strong>Patient Phone:</strong> {!! $phone !!}</pre>
    @endforeach
    <hr />
    @foreach ($persona->patient->contact as $contact)
    <pre><strong>Contact:</strong> {!! $contact !!}</pre>
    <pre><strong>Contact Address:</strong>{!! $contact->address !!}</pre>
    <pre><strong>Contact Phone:</strong>{!! $contact->phone->first() !!}</pre>
    <hr />
    @endforeach
    @foreach ($persona->patient->employment as $employment)
    <pre><strong>Employer:</strong> {!! $employment !!}</pre>
    <pre><strong>Employer Address:</strong>{!! $employment->address !!}</pre>
    <pre><strong>Employer Phone:</strong>{!! $employment->phone->first() !!}</pre>
    <hr />
    @endforeach
    <hr />
    <hr />
    <hr />
    @endforeach
    --}}


{{--
@foreach ($personas as $persona)
<pre><strong>Patient:</strong> {!! $persona->formated_name !!}</pre>
<pre><strong>DOB:</strong> {!! $persona->date_of_birth->format('M d, Y').' - '.$persona->current_age !!}</pre>
<pre><strong>Phone:</strong> {!! $persona->phone->first()->formated_phone !!}</pre>
<pre><strong>SSN:</strong> {!! $persona->social_security !!}</pre>
<pre><strong>Accession #:</strong> {!! $persona->patient->patient_level_accession !!}</pre>
<pre><strong>PID:</strong> {!! $persona->patient->patID !!}</pre>
<pre><strong>External ID:</strong> {!! $persona->patient->externalID !!}</pre>
<hr />
@foreach ($persona->patient->subscriber as $subscriber)
<pre><strong>Subscriber:</strong> {!! $subscriber->level !!} insurance</pre>
<pre><strong>Company:</strong> {!! $subscriber->insurance->company_name !!}</pre>
<pre><strong>Payer ID:</strong> {!! $subscriber->insurance->payerID !!}</pre>
<pre><strong>Effective Date:</strong> {!! $subscriber->effective_date->format('M d, Y') !!}</pre>
<hr />
@endforeach
<hr />
<hr />
<hr />
@endforeach
--}}
@endsection

@push('scripts')
@endpush
