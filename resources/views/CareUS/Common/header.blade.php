<header class="flex justify-between text-xs bg-gunmetal-500 lg:sticky lg:top-0 lg:left-0 lg:z-50">
    <section class="flex w-full p-0 m-0">
        <input type="text" name="mainsearch"
            class="w-full border-none outline-none focus:bg-gunmetal-600 text-lightcyan-500 bg-gunmetal-500" value=""
            placeholder="{{ __('Search') }}" />
    </section>

    <section class="w-auto py-3 mx-4">
        <nav class="flex flex-row justify-end space-x-4">
            <span>v1.0.0</span>

            <a href="" class="">{{ __('Logout') }}</a>

            @php
            (empty(session()->get('locale'))) ? $locale = config('app.locale') : $locale = session()->get('locale');
            @endphp

            <a href="{{ route('lang.switch', ['locale' => 'en']) }}"
                class="{{ ($locale == 'en') ? 'hidden' : '' }} mx-1">
                <img class="w-6 md:mt-1" src="{{ secure_asset('images/flags/en.svg') }}" alt="English" />
            </a>
            <a href="{{ route('lang.switch', ['locale' => 'es']) }}"
                class="{{ ($locale == 'es') ? 'hidden' : '' }} mx-1">
                <img class="w-5 md:mt-1" src="{{ secure_asset('images/flags/es.svg') }}" alt="Español" />
            </a>
            <a href="{{ route('lang.switch', ['locale' => 'fr']) }}"
                class="{{ ($locale == 'fr') ? 'hidden' : '' }} mx-1">
                <img class="w-5 md:mt-1" src="{{ secure_asset('images/flags/fr.svg') }}" alt="François" />
            </a>
        </nav>
    </section>
</header>
