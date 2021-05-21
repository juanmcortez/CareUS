<x-layouts.guest>
    @section('pageTitle', __('Password recovery'))

    @push('styles')
    @endpush

    @section('content')
    <form id="userform" method="POST" action="{{ route('password.email') }}"
        class="w-1/5 px-5 py-5 pt-24 rounded-md -mt-36 bg-burntsienna-500 text-gunmetal-50">
        @csrf
        <H2 class="ml-10 text-4xl mb-80">{!! __('Password<br />recovery') !!}</H2>
        <div class="flex flex-row items-center justify-start mb-5 pt-14">
            <x-common.forms.label for="email" class="w-3/12" :value="__('E-mail')" />
            <x-common.forms.input id="email" class="w-9/12" type="email" name="email" :value="old('email')"
                placeholder="{{ __('E-Mail') }}" required autofocus />
        </div>
        <div class="flex flex-row items-center justify-between mx-10">
            <p class="text-2xl">{{ __('Recover') }}</p>
            <button type="submit" name="submit"
                class="flex flex-row items-center justify-center transition-colors duration-150 ease-in-out rounded-full outline-none w-14 h-14 bg-burntsienna-800 text-burntsienna-100 hover:bg-burntsienna-100 hover:text-burntsienna-800">
                <i class="text-xl fas fa-arrow-right"></i>
            </button>
        </div>
        <div class="flex flex-row items-center justify-between pt-5 mx-5 mt-5 border-t border-burntsienna-600">
            <a href="{{ route('login') }}"
                class="flex flex-row items-center ml-5 text-xs text-burntsienna-900 hover:text-burntsienna-100">
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
