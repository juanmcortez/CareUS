<x-layouts.logged>
    @section('pageTitle', $pageTitle)

    @push('styles')
    @endpush

    @section('content')
    <form class="w-ful" method="POST" action="{{ route('patients.store') }}">
        @csrf
        @method('POST')

        <x-common.pageheader formsave formcancel="patients.list">
            {{ $pageH2 }}
        </x-common.pageheader>

        <div class="flex flex-col w-full text-sm leading-relaxed text-right">
            <!-- ID's -->
            <div class="flex flex-row flex-wrap items-center justify-between pb-8 mb-8">
                <div class="flex flex-row items-center justify-start w-1/4">
                    <x-common.forms.label for="externalID" class="w-1/3">{{ __('External ID') }}</x-common.forms.label>
                    <x-common.forms.input id="externalID" class="w-2/3" type="text" name="patient[externalID]"
                        :value="old('patient.externalID')" placeholder="{{ __('External ID') }}" autofocus />
                </div>
                <div class="flex flex-row items-center justify-end w-1/4">
                    {{-- <x-common.forms.button icon="save" color="green" class="ml-3">
                        {{ __('Save') }}
                    </x-common.forms.button>
                    <x-common.forms.button icon="times-circle" color="red" type="cancel" class="ml-3">
                        {{ __('Cancel') }}
                    </x-common.forms.button> --}}
                </div>
            </div>

            <!-- NAME -->
            <div class="flex flex-row flex-wrap items-center justify-between pb-8 mb-8">
                <div class="flex flex-row items-center justify-start w-1/4">
                    <x-common.forms.label for="title" class="w-1/3">{{ __('Title') }}</x-common.forms.label>
                    <x-common.forms.select id="title" name="patient[persona][title]" class="w-2/3"
                        :options="$items['titles']" :seloption="old('patient.persona.title')" />
                </div>
                <div class="flex flex-row items-center justify-start w-1/4">
                    <x-common.forms.label for="last_name" class="w-1/3">{{ __('Last name') }}</x-common.forms.label>
                    <x-common.forms.input id="last_name" class="w-2/3" type="text" name="patient[persona][last_name]"
                        :value="old('patient.persona.last_name')" placeholder="{{ __('Last name') }}" />
                </div>
                <div class="flex flex-row items-center justify-start w-1/4">
                    <x-common.forms.label for="first_name" class="w-1/3">{{ __('First name') }}</x-common.forms.label>
                    <x-common.forms.input id="first_name" class="w-2/3" type="text" name="patient[persona][first_name]"
                        :value="old('patient.persona.first_name')" placeholder="{{ __('First name') }}" />
                </div>
                <div class="flex flex-row items-center justify-start w-1/4">
                    <x-common.forms.label for="middle_name" class="w-1/3">{{ __('Middle name') }}</x-common.forms.label>
                    <x-common.forms.input id="middle_name" class="w-2/3" type="text"
                        name="patient[persona][middle_name]" :value="old('patient.persona.middle_name')"
                        placeholder="{{ __('Middle name') }}" />
                </div>
            </div>

            <!-- PHONES -->
            @foreach ($phones as $idx => $phone)
            <div class="flex flex-row flex-wrap items-center justify-start pb-4">
                <div class="flex flex-row items-center justify-start w-1/4">
                    <x-common.forms.label for="type" class="w-1/3">
                        {{ __('Phone #:index', ['index' => $idx+1]) }}
                    </x-common.forms.label>
                    <x-common.forms.select id="type" name="patient[persona][phone][{{ $idx }}][type]" class="w-2/3"
                        :options="$items['phonetypes']" seloption="{{ old('patient.persona.phone.'.$idx.'.type') }}" />
                </div>
                <div class="flex flex-row items-center justify-start w-2/4">
                    <x-common.forms.label for="international_code" class="w-1/12 text-center">+</x-common.forms.label>
                    <x-common.forms.input id="international_code" class="w-1/12 text-center" type="text"
                        name="patient[persona][phone][{{ $idx }}][international_code]"
                        value="{{ old('patient.persona.phone.'.$idx.'.international_code') }}" placeholder="1" />

                    <x-common.forms.label for="area_code" class="w-1/12 text-center">(</x-common.forms.label>
                    <x-common.forms.input id="area_code" class="w-1/12 text-center" type="text"
                        name="patient[persona][phone][{{ $idx }}][area_code]"
                        value="{{ old('patient.persona.phone.'.$idx.'.area_code') }}" placeholder="00" />

                    <x-common.forms.label for="initial_digits" class="w-1/12 text-center">)</x-common.forms.label>
                    <x-common.forms.input id="initial_digits" class="w-2/12 text-center" type="text"
                        name="patient[persona][phone][{{ $idx }}][initial_digits]"
                        value="{{ old('patient.persona.phone.'.$idx.'.initial_digits') }}" placeholder="000" />

                    <x-common.forms.label for="last_digits" class="w-1/12 text-center">-</x-common.forms.label>
                    <x-common.forms.input id="last_digits" class="w-2/12 text-center" type="text"
                        name="patient[persona][phone][{{ $idx }}][last_digits]"
                        value="{{ old('patient.persona.phone.'.$idx.'.last_digits') }}" placeholder="0000" />

                    <x-common.forms.label for="extension" class="w-1/12 text-center">
                        {{ __('Ext.') }}
                    </x-common.forms.label>
                    <x-common.forms.input id="extension" class="w-1/12 text-center" type="text"
                        name="patient[persona][phone][{{ $idx }}][extension]"
                        value="{{ old('patient.persona.phone.'.$idx.'.extension') }}" placeholder="00" />
                </div>
            </div>
            @endforeach

            <!-- EMAIL -->
            <div class="flex flex-row flex-wrap items-center justify-between pb-4">
                <div class="flex flex-row items-center justify-start w-1/4">
                    <x-common.forms.label for="email" class="w-1/3">{{ __('E-mail') }}</x-common.forms.label>
                    <x-common.forms.input id="email" class="w-2/3" type="text" name="patient[persona][email]"
                        :value="old('patient.persona.email')" placeholder="{{ __('patient@email.com') }}" />
                </div>
            </div>

            <!-- Address -->
            <div class="flex flex-row flex-wrap items-center justify-start pb-4">
                <div class="flex flex-row items-center justify-start w-1/4">
                    <x-common.forms.label for="street" class="w-1/3">{{ __('Address') }}</x-common.forms.label>
                    <x-common.forms.input id="street" class="w-2/3" type="text" name="patient[persona][address][street]"
                        :value="old('patient.persona.address.street')" placeholder="{{ __('Address') }}" />
                </div>
                <div class="flex flex-row items-center justify-start w-1/4">
                    <x-common.forms.input id="street_extended" class="w-full ml-5" type="text"
                        name="patient[persona][address][street_extended]"
                        :value="old('patient.persona.address.street_extended')"
                        placeholder="{{ __('Extended Address') }}" />
                </div>
                <div class="flex flex-row items-center justify-start w-1/4">
                    <x-common.forms.label for="city" class="w-1/3">{{ __('City') }}</x-common.forms.label>
                    <x-common.forms.input id="city" class="w-2/3" type="text" name="patient[persona][address][city]"
                        :value="old('patient.persona.address.city')" placeholder="{{ __('City') }}" />
                </div>
            </div>
            <div class="flex flex-row flex-wrap items-center justify-start pb-8 mb-8">
                <div class="flex flex-row items-center justify-start w-1/4">
                    <x-common.forms.label for="state" class="w-1/3">{{ __('State') }}</x-common.forms.label>
                    <x-common.forms.select id="state" name="patient[persona][address][state]" class="w-2/3"
                        :options="$items['states']" :seloption="old('patient.persona.address.state')" />
                </div>
                <div class="flex flex-row items-center justify-start w-1/4">
                    <x-common.forms.label for="zip" class="w-1/3">{{ __('Zip') }}</x-common.forms.label>
                    <x-common.forms.input id="zip" class="w-2/3" type="text" name="patient[persona][address][zip]"
                        :value="old('patient.persona.address.zip')" placeholder="{{ __('Zip') }}" />
                </div>
                <div class="flex flex-row items-center justify-start w-1/4">
                    <x-common.forms.label for="country" class="w-1/3">{{ __('Country') }}</x-common.forms.label>
                    <x-common.forms.select id="country" name="patient[persona][address][country]" class="w-2/3"
                        :options="$items['countries']" :seloption="old('patient.persona.address.country')" />
                </div>
            </div>

            <!-- GENDER -->
            <div class="flex flex-row flex-wrap items-center justify-start pb-8 mb-8">
                <div class="flex flex-row items-center justify-start w-1/4">
                    <x-common.forms.label for="gender" class="w-1/3">{{ __('Gender') }}</x-common.forms.label>
                    <x-common.forms.select id="gender" name="patient[persona][gender]" class="w-2/3"
                        :options="$items['genders']" :seloption="old('patient.persona.gender')" />
                </div>
                <div class="flex flex-row items-center justify-start w-1/4">
                    <x-common.forms.label for="date_of_birth" class="w-1/3">{{ __('Birthday') }}</x-common.forms.label>
                    <div class="w-2/3 text-left">
                        <x-common.forms.input id="date_of_birth" class="w-3/12 text-center" type="text"
                            name="patient[persona][date_of_birth][month]"
                            :value="old('patient.persona.date_of_birth.month')" placeholder="{{ __('MM') }}" />
                        <x-common.forms.label for="date_of_birth" class="w-1/12 text-center">-</x-common.forms.label>
                        <x-common.forms.input id="date_of_birth" class="w-3/12 text-center" type="text"
                            name="patient[persona][date_of_birth][day]"
                            :value="old('patient.persona.date_of_birth.day')" placeholder="{{ __('DD') }}" />
                        <x-common.forms.label for="date_of_birth" class="w-1/12 text-center">-</x-common.forms.label>
                        <x-common.forms.input id="date_of_birth" class="w-4/12 text-center" type="text"
                            name="patient[persona][date_of_birth][year]"
                            :value="old('patient.persona.date_of_birth.year')" placeholder="{{ __('YYYY') }}" />
                    </div>
                </div>
                <div class="flex flex-row items-center justify-start w-2/4">&nbsp;</div>
            </div>



        </div>

        <!-- BUTTONS -->
        <x-common.pageheader formsave formcancel="patients.list" />


    </form>
    @endsection

    @push('scripts')
    @endpush
</x-layouts.logged>
