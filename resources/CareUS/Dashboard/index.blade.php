<x-layouts.logged>
    @section('pageTitle', $pageTitle)

    @push('styles')
    @endpush

    @section('content')
    <x-common.pageheader class="pt-10 pb-16">{{ $pageH2 }}</x-common.pageheader>

    Content
    @endsection

    @push('scripts')
    @endpush
</x-layouts.logged>
