<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="no-js">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />

    <title>@yield('pageTitle')</title>

    <script type="module">
        document.documentElement.classList.remove('no-js');
        document.documentElement.classList.add('js');
    </script>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet" />

    <!-- Styles -->
    <link href="{{ mix('css/careus.css') }}" rel="stylesheet" />
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

<body
    class="flex w-full min-h-screen font-sans text-sm antialiased duration-150 ease-in-out text-gunmetal-700 bg-bdazzledblue-50">

    <noscript>
        <h2>{{ __('Javascript needed for this website usage.') }}</h2>
    </noscript>

    <div class="relative flex flex-row flex-wrap flex-1 overflow-x-hidden">

        <div class="w-full p-2 duration-150 ease-in-out transform xl:p-10 xl:pt-7">

            <!-- HEADER -->
            <x-sections.header />

            <!-- CONTENT -->
            @yield('content')

        </div>

    </div>

    <script src=" {{ mix('/js/manifest.js') }}"></script>
    <script src="{{ mix('/js/vendor.js') }}"></script>
    <script src="{{ mix('/js/careus.js') }}" defer></script>

    @stack('scripts')

</body>

</html>
