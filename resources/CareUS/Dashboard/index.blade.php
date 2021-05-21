<x-layouts.user>
    @section('pageTitle', $pageTitle)

    @push('styles')
    @endpush

    @section('content')
    <x-common.pageheader>{{ $pageH2 }}</x-common.pageheader>

    Content
    @endsection

    @push('scripts')
    @endpush
</x-layouts.user>
