<header id="topbar"
    class="p-1 md:p-2 flex flex-col md:flex-row justify-between md:text-sm bg-blue-300 border border-blue-400 border-t-0 border-l-0 border-r-0 text-blue-800 shadow-md">
    <div id="logo" class="max-w-full md:w-20 text-center">
        <a class="cursor-pointer hover:text-blue-600" href="{{ route('dashboard.index') }}">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-linecap="round"
                stroke-linejoin="round" stroke-width="2"
                class="w-8 h-8 text-blue-900 p-2 bg-blue-500 rounded-full mx-auto" viewBox="0 0 24 24">
                <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
            </svg>
            <span class="hidden ml-3 text-sm md:text-lg">{{ config('app.name') }}</span>
        </a>
    </div>
    <ul class="flex flex-row flex-wrap max-w-full md:w-auto justify-evenly md:justify-end text-center md:mt-1">
        <li class="order-1 w-1/3 md:w-auto py-2 md:py-0 md:px-3">v1.0.0</li>
        <li class="order-4 md:order-2 w-1/2 md:w-auto md:px-3">
            <a class="cursor-pointer hover:text-blue-600" href="#">
                {{ __('Juan M. Cortéz') }}
            </a>
        </li>
        <li class="order-5 md:order-3 w-1/2 md:w-auto md:px-3">
            <a class="cursor-pointer hover:text-blue-600" href="{{ route('settings.index') }}">
                {{ __('Your Practice Name') }}
            </a>
        </li>
        <li class="order-2 md:order-4 w-1/3 md:w-auto py-2 md:py-0 md:px-3">
            <a class="cursor-pointer hover:text-blue-600" href="#">
                {{ __('Logout') }}
            </a>
        </li>
        @php $locale = session()->get('locale'); @endphp
        <li class="order-3 md:order-5 w-1/3 md:w-auto py-2 md:py-0 md:px-2 inline-flex xs:items-center justify-center">
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
        </li>
    </ul>
</header>
