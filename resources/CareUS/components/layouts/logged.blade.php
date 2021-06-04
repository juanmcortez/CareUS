<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="no-js">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />

    @auth
    <title>@yield('pageTitle')</title>
    @else
    <title>{{ __('You need to login to continue...') }}</title>
    @endauth

    <script type="module">
        document.documentElement.classList.remove('no-js');
        document.documentElement.classList.add('js');
    </script>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet" />

    <!-- Styles -->
    <link href="{{ mix('css/careus.css') }}" rel="stylesheet" />
    <link href="{{ mix('css/theme.css') }}" rel="stylesheet" />
    <link href="{{ mix('css/careus_print.css') }}" rel="stylesheet" media="print" />

    @stack('styles')

    <meta name="author" content="{{ '' }}" />
    <meta name="description" content="{{ '' }}" />
    <meta name="keywords" content="{{ '' }}" />
    <meta name="generator" content="Laravel, PHP, VSCode" />

    <meta property="og:title" content="@yield('pageTitle')" />
    <meta property="og:description" content="{{ '' }}" />
    <meta property="og:image" content="{{ config('app.url') }}images/helper/image.jpg" />
    <meta property="og:image:alt" content="Image description" />
    <meta property="og:locale" content="{{ app()->getLocale() }}" />
    <meta property="og:type" content="website" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta property="og:url" content="{{ Request::url() }}" />
    <link rel="canonical" href="{{ Request::url() }}" />

    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="manifest" href="{{ secure_asset('images/careus.webmanifest') }}" />
    <link rel="icon" type="image/x-icon" href="{{ secure_asset('favicon.ico') }}" />
    <link rel="icon" type="image/svg+xml" href="{{ secure_asset('favicon.svg') }}" />
    <link rel="apple-touch-icon" href="{{ config('app.url') }}images/helper/apple-touch-icon.png" />
    <meta name="theme-color" content="#98C1D9" />

    <meta name="format-detection" content="telephone=no">

</head>

<body class="flex w-full min-h-screen font-sans text-sm antialiased text-gunmetal-700 bg-bdazzledblue-50" @auth
    x-data="{ sidebar: localStorage.getItem('sidebar_status') }"
    x-init="$watch('sidebar', (newvalue) => localStorage.setItem('sidebar_status', newvalue))" @endauth>

    <noscript>
        <h2>{{ __('Javascript needed for this website usage.') }}</h2>
    </noscript>

    <div class="relative flex flex-row flex-wrap flex-1 overflow-x-hidden">
        <div :class="{ 'w-full pr-14': sidebar === 'false' }" class="w-5/6 pb-10 pl-10 pr-10 pt-7">

            <!-- HEADER -->
            <x-sections.header />

            <div class="w-full">

                @auth

                <!-- CONTENT -->
                @yield('content')
                <!-- CONTENT -->

                @else

                <!-- REJECT -->
                <div class="flex flex-row items-center justify-center w-full min-h-full text-sm text-burntsienna-700">
                    <h2>
                        <a href="{{ route('login') }}">
                            {!! __('You need to <strong>login</strong> to continue...') !!}
                        </a>
                    </h2>
                </div>
                <!-- REJECT -->

                @endauth

            </div>
        </div>

        @auth
        <div :class="{ '-right-76': sidebar === 'false' }"
            class="absolute right-0 w-1/6 min-h-full p-10 overflow-hidden bg-bdazzledblue-900 text-bdazzledblue-100">
            <x-sections.sidebar />
        </div>

        <a @click.prevent="sidebar = (sidebar === 'false') ? 'true' : 'false'"
            :class="{ 'bg-bdazzledblue-900 text-bdazzledblue-100 right-0 -mr-2': sidebar === 'false', 'text-bdazzledblue-900 bg-bdazzledblue-100 right-1/6 -mr-5': sidebar === 'true' }"
            class="absolute flex items-center justify-center w-10 h-10 rounded-full cursor-pointer top-8">
            <i :class="{ 'fa-chevron-left': sidebar === 'false', 'fa-chevron-right': sidebar === 'true' }"
                class="font-bold text-md fas"></i>
        </a>
        @endauth

    </div>

    <script src=" {{ mix('/js/manifest.js') }}"></script>
    <script src="{{ mix('/js/vendor.js') }}"></script>
    <script src="{{ mix('/js/careus.js') }}" defer></script>

    @stack('scripts')

</body>

</html>
