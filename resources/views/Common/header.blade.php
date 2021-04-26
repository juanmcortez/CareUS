<header id="topbar"
    class="p-1 md:p-2 flex flex-col md:flex-row justify-between md:text-sm bg-blue-300 border border-blue-400 border-t-0 border-l-0 border-r-0 text-blue-800 shadow-md">
    <div id="logo" class="w-full md:w-20 text-center">
        <a class="cursor-pointer hover:text-blue-600 {{ request()->routeIs('dashboard*') ? 'font-semibold' : '' }}"
            href="{{ route('dashboard.index') }}">
            {{ __('LOGO') }}
        </a>
    </div>
    <ul class="flex flex-row flex-wrap w-full md:w-auto justify-evenly md:justify-end text-center">
        <li class="order-1 w-1/2 sm:w-auto py-2 sm:py-0 md:px-3">v1.0.0</li>
        <li class="order-3 sm:order-2 w-1/2 sm:w-auto md:px-3">
            <a class="cursor-pointer hover:text-blue-600" href="#">
                {{ __('Juan M. Cortéz') }}
            </a>
        </li>
        <li class="order-4 sm:order-3 w-1/2 sm:w-auto md:px-3">
            <a class="cursor-pointer hover:text-blue-600" href="#">
                {{ __('Your Practice Name') }}
            </a>
        </li>
        <li class="order-2 sm:order-4 w-1/2 sm:w-auto py-2 sm:py-0 md:px-3">
            <a class="cursor-pointer hover:text-blue-600" href="#">
                {{ __('Logout') }}
            </a>
        </li>
    </ul>
</header>
