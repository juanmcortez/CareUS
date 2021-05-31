<x-layouts.guest>
    @section('pageTitle', __('Reset Password'))

    @push('styles')
    @endpush

    @section('content')
    <form id="userform" method="POST" action="{{ route('password.update') }}"
        class="w-4/5 px-5 py-5 pt-24 mx-auto rounded-md xl:mt-10 xl:w-2/5 bg-burntsienna-500 text-gunmetal-50">
        @csrf
        <input type="hidden" name="token" value="{{ $request->route('token') }}">
        <H2 class="ml-5 text-2xl xl:ml-10 xl:text-4xl mb-60">{!! __('Reset<br />password') !!}</H2>
        <div class="flex flex-row items-center justify-start pt-5 mb-5">
            <x-common.forms.label for="email" class="w-4/12 xl:w-3/12" :value="__('E-mail')" />
            <x-common.forms.input id="email" class="w-8/12 xl:w-9/12" type="email" name="email" :value="old('email')"
                placeholder="{{ __('E-Mail') }}" required autofocus />
        </div>
        <div class="flex flex-row items-center justify-start mb-5">
            <x-common.forms.label for="password" class="w-4/12 xl:w-3/12" :value="__('Password')" />
            <x-common.forms.input id="password" class="w-8/12 xl:w-9/12" type="password" name="password"
                :value="old('password')"
                placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;"
                required autocomplete="current-password" />
        </div>
        <div class="flex flex-row items-center justify-start mb-5">
            <x-common.forms.label for="password_confirmation" class="w-4/12 xl:w-3/12" :value="__('Confirm')" />
            <x-common.forms.input id="password_confirmation" class="w-8/12 xl:w-9/12" type="password"
                name="password_confirmation"
                placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;"
                required />
        </div>
        <div class="flex flex-row items-center justify-between mx-5 xl:mx-10">
            <p class="mr-20 text-xl xl:text-2xl">{{ __('Reset') }}</p>
            <button type="submit" name="submit"
                class="flex flex-row items-center justify-center w-10 h-10 transition-colors duration-150 ease-in-out rounded-full outline-none xl:w-14 xl:h-14 bg-burntsienna-800 text-burntsienna-100 hover:bg-burntsienna-100 hover:text-burntsienna-800 focus:outline-none focus-within:outline-none">
                <i class="text-xl fas fa-arrow-right"></i>
            </button>
        </div>
        <div class="flex flex-row items-center justify-between pt-5 mx-0 mt-5 border-t xl:mx-5 border-burntsienna-600">
            <a href="{{ route('login') }}"
                class="flex flex-row items-center ml-2 text-xs text-burntsienna-900 hover:text-burntsienna-100">
                <i class="mr-1 text-xxs fas fa-user"></i> {{ __('Already a user?') }}
            </a>
            <a href="{{ route('register') }}"
                class="flex flex-row items-center mr-1 text-xs text-burntsienna-900 hover:text-burntsienna-100">
                <i class="mr-1 text-xxs fas fa-user-plus"></i> {{ __('New user?') }}
            </a>
        </div>
    </form>
    @endsection

    @push('scripts')
    @endpush
</x-layouts.guest>
