<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>@yield('pageTitle')</title>

    <meta name="author" content="name">
    <meta name="description" content="description here">
    <meta name="keywords" content="keywords,here">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ secure_asset('favicon.ico') }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Oxygen:wght@400;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ mix('css/careus.css') }}" rel="stylesheet">

    @stack('styles')

</head>

<body class="font-sans text-base antialiased leading-snug tracking-normal bg-palecerulean-500 text-lightcyan-500">

    <div class="flex flex-col min-h-screen lg:flex-row lg:relative">

        @include('Common.sidebar')

        <div class="flex-1">
            <div class="flex flex-col min-h-full">

                @include('Common.header')

                <main class="flex-1 m-8 rounded-md bg-lightcyan-500">
                    <div
                        class="flex flex-row flex-wrap justify-between px-4 py-3 text-lightcyan-500 bg-bdazzledblue-500 rounded-t-md">

                        @yield('submenu')

                        @include('Common.submenutools')

                    </div>
                    <div class="flex flex-wrap flex-1 m-8 whitespace-normal text-gunmetal-900">

                        @yield('content')

                    </div>
                </main>

                @include('Common.footer')

            </div>
        </div>
    </div>

    <script src=" {{ mix('/js/manifest.js') }}"></script>
    <script src="{{ mix('/js/vendor.js') }}"></script>
    <script src="{{ mix('/js/careus.js') }}" defer></script>

    @stack('scripts')

</body>

</html>
