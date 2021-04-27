@extends('Layouts.careus-in')

@section('pageTitle', $pageTitle)

@push('styles')
@endpush

@section('content')
<div class="w-full sm:w-1/4 p-2 sm:py-4 text-center text-white bg-blue-800 sm:rounded sm:rounded-r-none">
    <h2 class="text-sm sm:text-xl uppercase font-semibold leading-tight">{{ $pageH2 }}</h2>
</div>
<div class="w-full sm:w-3/4 p-2 text-left">
</div>
@endsection

@push('scripts')
@endpush
