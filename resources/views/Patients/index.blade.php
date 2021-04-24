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
<pre><strong>Company:</strong> {!! $subscriber->company !!}</pre>
<pre><strong>Effective Date:</strong> {!! $subscriber->effective_date->format('M d, Y') !!}</pre>
<hr />
@endforeach
<hr />
<hr />
<hr />
@endforeach
