<x-layouts.guest>
    @section('pageTitle', 'Login')

    @push('styles')
    @endpush

    @section('content')
    <form method="POST" action="{{ route('login') }}"
        class="w-1/5 px-5 py-5 pt-32 rounded-md -mt-36 bg-burntsienna-500 text-gunmetal-50">
        @csrf
        <H2 class="mb-64 ml-10 text-4xl">{!! __('Welcome<br />back!') !!}</H2>
        <div class="flex flex-row items-center justify-center mb-5">
            <x-label for="email" class="w-3/12" :value="__('E-mail')" />
            <x-input id="email" class="w-9/12" type="email" name="email" :value="old('email')"
                placeholder="{{ __('E-Mail') }}" required autofocus />
        </div>
        <div class="flex flex-row items-center justify-end mb-5">
            <x-label for="password" class="w-3/12" :value="__('Password')" />
            <x-input id="password" class="w-9/12" type="password" name="password" :value="old('email')"
                placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;"
                required autocomplete="current-password" />
        </div>
        <div class="flex flex-row items-center justify-around">
            <p class="mr-20 text-2xl">{{ __('Sign In') }}</p>
            <button type="submit" name="submit"
                class="flex flex-row items-center justify-center transition-colors duration-150 ease-in-out rounded-full outline-none w-14 h-14 bg-burntsienna-800 text-burntsienna-100 hover:bg-burntsienna-100 hover:text-burntsienna-800">
                <i class="text-xl fas fa-arrow-right"></i>
            </button>
        </div>
    </form>
    @endsection

    @push('scripts')
    @endpush
</x-layouts.guest>
