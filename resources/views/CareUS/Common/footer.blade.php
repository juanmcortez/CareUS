<footer id=" footer" class="flex flex-col flex-wrap py-1 md:pt-8 md:text-sm text-center bg-blue-600 text-white">

    <div class="pt-1 pb-2 md:pt-4 md:pb-12">
        Footer over
    </div>

    <div
        class="flex flex-col md:flex-row flex-wrap justify-between border border-blue-300 border-b-0 border-r-0 border-l-0 py-2">

        <div class="container px-5 py-2 mx-auto flex items-center md:flex-row flex-col text-blue-400">
            <a class="flex title-font font-medium items-center md:justify-start justify-center text-blue-900">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-linecap="round"
                    stroke-linejoin="round" stroke-width="2"
                    class="w-8 h-8 md:w-9 md:h-9 text-blue-900 p-2 bg-blue-500 rounded-full" viewBox="0 0 24 24">
                    <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
                </svg>
                <span class="ml-3 text-sm md:text-lg">{{ config('app.name') }}</span>
            </a>
            <p class="text-xxs md:text-sm  md:ml-4 md:pl-4 md:border-l-2 md:border-blue-400 md:py-2 md:mt-0 mt-4">
                &copy; {{ __('Copyright') }} <span class="font-semibold text-blue-900">Juan M. Cortéz</span> —
                <span class="font-semibold text-blue-900">2020-{{ date('y') }}</span>.
            </p>
            <span class="inline-flex md:ml-auto md:mt-0 mt-4 justify-center md:justify-start">
                <a class="">
                    <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        class="w-4 h-4 md:w-5 md:h-5" viewBox="0 0 24 24">
                        <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"></path>
                    </svg>
                </a>
                <a class="ml-3 ">
                    <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        class="w-4 h-4 md:w-5 md:h-5" viewBox="0 0 24 24">
                        <path
                            d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z">
                        </path>
                    </svg>
                </a>
                <a class="ml-3 ">
                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="2" class="w-4 h-4 md:w-5 md:h-5" viewBox="0 0 24 24">
                        <rect width="20" height="20" x="2" y="2" rx="5" ry="5"></rect>
                        <path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37zm1.5-4.87h.01"></path>
                    </svg>
                </a>
                <a class="ml-3 ">
                    <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="0" class="w-4 h-4 md:w-5 md:h-5" viewBox="0 0 24 24">
                        <path stroke="none"
                            d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6zM2 9h4v12H2z">
                        </path>
                        <circle cx="4" cy="4" r="2" stroke="none"></circle>
                    </svg>
                </a>
            </span>
        </div>

    </div>

</footer>
