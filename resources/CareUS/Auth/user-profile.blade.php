<x-layouts.logged>
    @section('pageTitle', $pageTitle)

    @push('styles')
    @endpush

    @section('content')
    <x-common.pageheader>{{ $pageH2 }}</x-common.pageheader>

    <form class="w-full text-center" method="POST" action="{{ route('user.update') }}">
        @csrf
        @method('PUT')

        <x-common.forms.input type="hidden" name="user[id]" :value="Auth()->user()->id" />

        <div class="flex flex-col w-full text-sm leading-relaxed text-right">
            <!-- NAME -->
            <div class="flex flex-row flex-wrap items-center justify-between pb-8 mb-8">
                <div class="flex flex-row items-center justify-start w-1/4">
                    <x-common.forms.label for="title" class="w-4/12 xl:w-3/12">{{ __('Title') }}</x-common.forms.label>
                    <x-common.forms.select id="title" name="user[persona][title]" class="w-8/12 xl:w-9/12"
                        :options="$items['titles']" :seloption="old('patient.persona.title')" />
                </div>
                <div class="flex flex-row items-center justify-start w-1/4">
                    <x-common.forms.label for="last_name" class="w-4/12 xl:w-3/12" :value="__('Last name')" />
                    <x-common.forms.input id="last_name" class="w-8/12 xl:w-9/12" type="text"
                        name="user[persona][last_name]" :value="Auth()->user()->persona->last_name"
                        placeholder="{{ __('Last name') }}" required autofocus />
                </div>
                <div class="flex flex-row items-center justify-start w-1/4">
                    <x-common.forms.label for="first_name" class="w-4/12 xl:w-3/12" :value="__('First name')" />
                    <x-common.forms.input id="first_name" class="w-8/12 xl:w-9/12" type="text"
                        name="user[persona][first_name]" :value="Auth()->user()->persona->first_name"
                        placeholder="{{ __('First name') }}" required />
                </div>
                <div class="flex flex-row items-center justify-start w-1/4">
                    <x-common.forms.label for="middle_name" class="w-4/12 xl:w-3/12" :value="__('Middle name')" />
                    <x-common.forms.input id="middle_name" class="w-8/12 xl:w-9/12" type="text"
                        name="user[persona][middle_name]" :value="Auth()->user()->persona->middle_name"
                        placeholder="{{ __('Middle name') }}" />
                </div>
            </div>

            <div class="flex flex-row flex-wrap items-center justify-between pb-8 mb-8">
                <div class="flex flex-row items-center justify-start w-1/4">
                    <x-common.forms.label for="email" class="w-4/12 xl:w-3/12" :value="__('E-mail')" />
                    <x-common.forms.input id="email" class="w-8/12 xl:w-9/12" type="email" name="user[email]"
                        :value="Auth()->user()->email" placeholder="{{ __('E-Mail') }}" readonly required />
                </div>
            </div>

            <!-- GENDER -->
            <div class="flex flex-row flex-wrap items-center justify-start pb-8 mb-8">
                <div class="flex flex-row items-center justify-start w-1/4">
                    <x-common.forms.label for="gender" class="w-4/12 xl:w-3/12">{{ __('Gender') }}
                    </x-common.forms.label>
                    <x-common.forms.select id="gender" name="user[persona][gender]" class="w-8/12 xl:w-9/12"
                        :options="$items['genders']" :seloption="Auth()->user()->persona->gender" />
                </div>
                <div class="flex flex-row items-center justify-start w-1/4">
                    <x-common.forms.label for="date_of_birth" class="w-4/12 xl:w-3/12">{{ __('Birthday') }}
                    </x-common.forms.label>
                    <div class="w-8/12 text-left xl:w-9/12">
                        <x-common.forms.input id="date_of_birth" class="w-3/12 text-center" type="text"
                            name="user[persona][date_of_birth][month]"
                            :value="date('m', strtotime(Auth()->user()->persona->date_of_birth))"
                            placeholder="{{ __('MM') }}" />
                        <x-common.forms.label for="date_of_birth" class="w-1/12 text-center">-</x-common.forms.label>
                        <x-common.forms.input id="date_of_birth" class="w-3/12 text-center" type="text"
                            name="user[persona][date_of_birth][day]"
                            :value="date('d', strtotime(Auth()->user()->persona->date_of_birth))"
                            placeholder="{{ __('DD') }}" />
                        <x-common.forms.label for="date_of_birth" class="w-1/12 text-center">-</x-common.forms.label>
                        <x-common.forms.input id="date_of_birth" class="w-4/12 text-center" type="text"
                            name="user[persona][date_of_birth][year]"
                            :value="date('Y', strtotime(Auth()->user()->persona->date_of_birth))"
                            placeholder="{{ __('YYYY') }}" />
                    </div>
                </div>
                <div class="flex flex-row items-center justify-start w-1/4">
                    <x-common.forms.label for="gender" class="w-4/12 xl:w-3/12">{{ __('Language') }}
                    </x-common.forms.label>
                    <x-common.forms.select id="gender" name="user[persona][language]" class="w-8/12 xl:w-9/12"
                        :options="$items['languages']" :seloption="Auth()->user()->persona->language" />
                </div>
                <div class="flex flex-row items-center justify-start w-1/4">
                    <x-common.forms.button icon="save" color="green" class="ml-3">
                        {{ __('Save') }}
                    </x-common.forms.button>
                </div>
            </div>
        </div>
    </form>

    @endsection

    @push('scripts')
    @endpush
</x-layouts.logged>
