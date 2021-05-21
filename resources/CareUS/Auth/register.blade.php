<x-layouts.guest>
    @section('pageTitle', __('Create an account'))

    @push('styles')
    @endpush

    @section('content')
    <form id="userform" method="POST" action="{{ route('register') }}"
        class="w-1/5 px-5 py-5 pt-24 rounded-md -mt-36 bg-burntsienna-500 text-gunmetal-50">
        @csrf
        <H2 class="ml-10 text-4xl mb-36">{!! __('Create an<br />account') !!}</H2>
        <div class="flex flex-row items-center justify-start mb-5">
            <x-common.forms.label for="last_name" class="w-3/12" :value="__('Last name')" />
            <x-common.forms.input id="last_name" class="w-9/12" type="text" name="last_name" :value="old('last_name')"
                placeholder="{{ __('Last name') }}" required autofocus />
        </div>
        <div class="flex flex-row items-center justify-start mb-5">
            <x-common.forms.label for="first_name" class="w-3/12" :value="__('First name')" />
            <x-common.forms.input id="first_name" class="w-4/12" type="text" name="first_name"
                :value="old('first_name')" placeholder="{{ __('First name') }}" required />

            <x-common.forms.label for="middle_name" class="w-2/12" :value="__('Middle')" />
            <x-common.forms.input id="middle_name" class="w-3/12" type="text" name="middle_name"
                :value="old('middle_name')" placeholder="{{ __('Middle') }}" />
        </div>
        <div class="flex flex-row items-center justify-start mb-5">
            <x-common.forms.label for="email" class="w-3/12" :value="__('E-mail')" />
            <x-common.forms.input id="email" class="w-9/12" type="email" name="email" :value="old('email')"
                placeholder="{{ __('E-Mail') }}" required autofocus />
        </div>
        <div class="flex flex-row items-center justify-start mb-5">
            <x-common.forms.label for="password" class="w-3/12" :value="__('Password')" />
            <x-common.forms.input id="password" class="w-9/12" type="password" name="password"
                placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;"
                required autocomplete="current-password" />
        </div>
        <div class="flex flex-row items-center justify-start mb-5">
            <x-common.forms.label for="password_confirmation" class="w-3/12" :value="__('Confirm')" />
            <x-common.forms.input id="password_confirmation" class="w-9/12" type="password" name="password_confirmation"
                placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;"
                required />
        </div>
        <div class="flex flex-row items-center justify-between mx-10">
            <p class="mr-20 text-2xl">{{ __('Register') }}</p>
            <button type="submit" name="submit"
                class="flex flex-row items-center justify-center transition-colors duration-150 ease-in-out rounded-full outline-none w-14 h-14 bg-burntsienna-800 text-burntsienna-100 hover:bg-burntsienna-100 hover:text-burntsienna-800">
                <i class="text-xl fas fa-arrow-right"></i>
            </button>
        </div>
        <div class="flex flex-row items-center justify-between pt-5 mx-5 mt-5 border-t border-burntsienna-600">
            <a href="{{ route('login') }}"
                class="flex flex-row items-center ml-4 text-xs text-burntsienna-900 hover:text-burntsienna-100">
                <i class="mr-1 text-xxs fas fa-user"></i> {{ __('Already a user?') }}
            </a>
            <a href="{{ route('password.request') }}"
                class="flex flex-row items-center mr-1 text-xs text-burntsienna-900 hover:text-burntsienna-100">
                <i class="mr-1 text-xxs fas fa-lock"></i> {{ __('Forgot pass?') }}
            </a>
        </div>
    </form>
    @endsection

    @push('scripts')
    @endpush
</x-layouts.guest>
