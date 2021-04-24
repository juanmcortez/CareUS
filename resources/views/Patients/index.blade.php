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
