@foreach ($personas as $persona)
<p style="font-weight: bold">
    {{ __('patID') }} <span style="font-weight: normal">{{ $persona->patient->patID }}</span>
</p>
<p style="font-weight: bold">
    {{ __('externalID') }} <span style="font-weight: normal">{{ $persona->patient->externalID }}</span>
</p>
<p style="font-weight: bold">
    {{ __('patient_level_accession') }} <span
        style="font-weight: normal">{{ $persona->patient->patient_level_accession }}</span>
</p>
<!--
<p style="font-weight: bold">
    {{ __('created_at') }} <span
        style="font-weight: normal">{{ $persona->patient->created_at->format('M d, Y') }}</span>
</p>
<p style="font-weight: bold">
    {{ __('title') }} <span style="font-weight: normal">{{ $persona->title }}</span>
</p>
-->
<p style="font-weight: bold">
    {{ __('name') }} <span style="font-weight: normal">{{ $persona->formated_name }}</span>
</p>
<!--
<p style="font-weight: bold">
    {{ __('email') }} <span style="font-weight: normal">{{ $persona->email }}</span>
</p>
-->
<p style="font-weight: bold">
    {{ __('date_of_birth') }} <span style="font-weight: normal">{{ $persona->date_of_birth->format('M d, Y') }} (
        {{ $persona->current_age }} )</span>
</p>

<!--
<p style="font-weight: bold">
    {{ __('gender') }} <span style="font-weight: normal">{{ $persona->gender }}</span>
</p>
-->
<p style="font-weight: bold">
    {{ __('social_security') }} <span style="font-weight: normal">{{ $persona->social_security }}</span>
</p>
<!--
<p style="font-weight: bold">
    {{ __('driver_license') }} <span style="font-weight: normal">{{ $persona->driver_license }}</span>
</p>
<p style="font-weight: bold">
    {{ __('marital') }} <span style="font-weight: normal">{{ $persona->marital }}</span>
</p>
<p style="font-weight: bold">
    {{ __('marital_details') }} <span style="font-weight: normal">{{ $persona->marital_details }}</span>
</p>
<p style="font-weight: bold">
    {{ __('language') }} <span style="font-weight: normal">{{ $persona->language }}</span>
</p>
<p style="font-weight: bold">
    {{ __('ethnicity') }} <span style="font-weight: normal">{{ $persona->ethnicity }}</span>
</p>
<p style="font-weight: bold">
    {{ __('race') }} <span style="font-weight: normal">{{ $persona->race }}</span>
</p>
<p style="font-weight: bold">
    {{ __('referral') }} <span style="font-weight: normal">{{ $persona->referral }}</span>
</p>
<p style="font-weight: bold">
    {{ __('vfc') }} <span style="font-weight: normal">{{ $persona->vfc }}</span>
</p>
<p style="font-weight: bold">
    {{ __('family_size') }} <span style="font-weight: normal">{{ $persona->family_size }}</span>
</p>
<p style="font-weight: bold">
    {{ __('financial_review') }} <span style="font-weight: normal">{{ $persona->financial_review }}</span>
</p>
<p style="font-weight: bold">
    {{ __('migrant_seasonal') }} <span style="font-weight: normal">{{ $persona->migrant_seasonal }}</span>
</p>
<p style="font-weight: bold">
    {{ __('interpreter') }} <span style="font-weight: normal">{{ $persona->interpreter }}</span>
</p>
<p style="font-weight: bold">
    {{ __('homeless') }} <span style="font-weight: normal">{{ $persona->homeless }}</span>
</p>
<p style="font-weight: bold">
    {{ __('desease_date') }} <span style="font-weight: normal">{{ $persona->desease_date }}</span>
</p>
<p style="font-weight: bold">
    {{ __('desease_reason') }} <span style="font-weight: normal">{{ $persona->desease_reason }}</span>
</p>
<p style="font-weight: bold">
    {{ __('updated_at') }} <span style="font-weight: normal">{{ $persona->updated_at->format('M d, Y') }}</span>
</p>

<p style="font-weight: bold">
    {{ __('street') }} <span style="font-weight: normal">{{ $persona->address->street }}</span>
</p>
<p style="font-weight: bold">
    {{ __('street_extended') }} <span style="font-weight: normal">{{ $persona->address->street_extended }}</span>
</p>
<p style="font-weight: bold">
    {{ __('city') }} <span style="font-weight: normal">{{ $persona->address->city }}</span>
</p>
<p style="font-weight: bold">
    {{ __('state') }} <span style="font-weight: normal">{{ $persona->address->state }}</span>
</p>
<p style="font-weight: bold">
    {{ __('zip') }} <span style="font-weight: normal">{{ $persona->address->zip }}</span>
</p>
<p style="font-weight: bold">
    {{ __('country') }} <span style="font-weight: normal">{{ $persona->address->country }}</span>
</p>
<p style="font-weight: bold">
    {{ __('updated_at') }} <span
        style="font-weight: normal">{{ $persona->address->updated_at->format('M d, Y') }}</span>
</p>
-->

<!--
    <pre>{{ $persona }}</pre>
    <pre>{{ $persona->patient }}</pre>
    <pre>{{ $persona->address }}</pre>
    @foreach ($persona->phone as $phone)
    <pre>{{ $phone }}</pre>
    @endforeach
-->
<hr />
@endforeach
