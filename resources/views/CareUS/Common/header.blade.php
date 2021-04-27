<header id="topbar"
    class="p-1 sm:p-2 flex flex-col sm:flex-row justify-between sm:text-sm bg-blue-300 border border-blue-400 border-t-0 border-l-0 border-r-0 text-blue-800 shadow-md">
    <div id="logo" class="w-full sm:w-20 text-center">
        <a class="cursor-pointer hover:text-blue-600" href="{{ route('dashboard.index') }}">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-linecap="round"
                stroke-linejoin="round" stroke-width="2"
                class="w-8 h-8 text-blue-900 p-2 bg-blue-500 rounded-full mx-auto" viewBox="0 0 24 24">
                <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
            </svg>
            <span class="hidden ml-3 text-sm sm:text-lg">{{ config('app.name') }}</span>
        </a>
    </div>
    <ul class="flex flex-row flex-wrap w-full sm:w-auto justify-evenly sm:justify-end text-center sm:mt-1">
        <li class="order-1 w-1/3 sm:w-auto py-2 sm:py-0 sm:px-3">v1.0.0</li>
        <li class="order-4 sm:order-2 w-1/2 sm:w-auto sm:px-3">
            <a class="cursor-pointer hover:text-blue-600" href="#">
                {{ __('Juan M. Cortéz') }}
            </a>
        </li>
        <li class="order-5 sm:order-3 w-1/2 sm:w-auto sm:px-3">
            <a class="cursor-pointer hover:text-blue-600" href="#">
                {{ __('Your Practice Name') }}
            </a>
        </li>
        <li class="order-2 sm:order-4 w-1/3 sm:w-auto py-2 sm:py-0 sm:px-3">
            <a class="cursor-pointer hover:text-blue-600" href="#">
                {{ __('Logout') }}
            </a>
        </li>
        @php $locale = session()->get('locale'); @endphp
        <li class="order-3 sm:order-5 w-1/3 sm:w-auto py-2 sm:py-0 sm:px-2 inline-flex xs:items-center justify-center">
            <a href="{{ route('lang.switch', ['locale' => 'en']) }}"
                class="{{ ($locale == 'en') ? 'hidden' : '' }} mx-1">
                <img class="w-6 sm:mt-1" src="{{ secure_asset('images/flags/en.svg') }}" alt="English" />
            </a>
            <a href="{{ route('lang.switch', ['locale' => 'es']) }}"
                class="{{ ($locale == 'es') ? 'hidden' : '' }} mx-1">
                <img class="w-5 sm:mt-1" src="{{ secure_asset('images/flags/es.svg') }}" alt="Español" />
            </a>
            <a href="{{ route('lang.switch', ['locale' => 'fr']) }}"
                class="{{ ($locale == 'fr') ? 'hidden' : '' }} mx-1">
                <img class="w-5 sm:mt-1" src="{{ secure_asset('images/flags/fr.svg') }}" alt="François" />
            </a>
        </li>
    </ul>
</header>
