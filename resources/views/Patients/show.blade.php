@extends('Layouts.careus-in')

@section('title', '')

@push('styles')
@endpush

@section('content')
<p class="font-semibold">PATIENT</p>
{{ $patient }}
<hr />
{{ $patient->persona }}
<hr />
<p class="font-semibold">ADDRESS</p>
{{ $patient->persona->address }}
<hr />
<p class="font-semibold">PHONES</p>
@foreach ($patient->persona->phone as $phone)
{{ $phone }}
<hr />
@endforeach
<hr />
<hr />
@foreach ($patient->contact as $contact)
<p class="font-semibold">CONTACT</p>
{{ $contact }}
<hr />
<p class="font-semibold">ADDRESS</p>
{{ $contact->address }}
<hr />
<p class="font-semibold">PHONE</p>
{{ $contact->phone->first() }}
<hr />
@endforeach
<hr />
<hr />
<p class="font-semibold">EPLOYMENT</p>
{{ $patient->employment->first() }}
<hr />
<p class="font-semibold">ADDRESS</p>
{{ $patient->employment->first()->address }}
<hr />
<p class="font-semibold">PHONE</p>
{{ $patient->employment->first()->phone->first() }}
<hr />
<hr />
<hr />
@foreach ($patient->subscriber as $subscriber)
<p class="font-semibold">SUBSCRIBER</p>
{{ $subscriber->persona }}
<hr />
<p class="font-semibold">ADDRESS</p>
{{ $subscriber->persona->address }}
<hr />
<p class="font-semibold">PHONE</p>
{{ $subscriber->persona->phone->first() }}
<p class="font-semibold">INSURANCE</p>
{{ $subscriber }}
<hr />
{{ $subscriber->insurance }}
<hr />
@endforeach
<hr />
<hr />
@endsection

@push('scripts')
@endpush
