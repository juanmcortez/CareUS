@foreach ($personas as $persona)
<pre>{{ $persona }}</pre>
<pre>{{ $persona->patient }}</pre>
<hr />
@endforeach
