<x-layouts.logged>
    @section('pageTitle', $pageTitle)

    @push('styles')
    @endpush

    @section('content')
    <form class="w-full" method="POST" action="{{ route('user.update') }}">
        @csrf
        @method('PUT')

        <!-- BUTTONS -->
        <x-common.pageheader formsave formcancel="dashboard.index" class="pt-10 pb-16">
            {{ $pageH2 }}
        </x-common.pageheader>

        {{-- Name --}}
        <x-common.persona.name class="w-full mb-4" :values="auth()->user()->persona" :titleList="$items['titles']" />

        {{-- E-mail --}}
        <x-common.persona.email class="w-full mb-4" item="user" :values="auth()->user()" />

        {{-- Gender --}}
        <x-common.persona.gender class="w-full mb-4" :values="auth()->user()->persona"
            :genderList="$items['genders']" />

        {{-- language --}}
        <x-common.persona.language class="w-full mb-0" :values="auth()->user()->persona"
            :langList="$items['languages']" />

        {{-- Hidden --}}
        <x-common.forms.input type="hidden" name="user[id]" :value="auth()->user()->id" />

        <!-- BUTTONS -->
        <x-common.pageheader formsave formcancel="dashboard.index" class="pt-16 pb-10" />
    </form>

    @endsection

    @push('scripts')
    @endpush
</x-layouts.logged>
