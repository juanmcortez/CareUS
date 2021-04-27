<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('pageTitle')</title>

    <link href="{{ mix('css/careus.css') }}" rel="stylesheet">

    @stack('styles')

</head>

<body class="antialiased flex flex-col flex-wrap w-full min-h-screen text-xs sm:text-base bg-blue-200">

    @include('Common.header')

    <main class="container flex flex-col sm:flex-row flex-wrap flex-grow min-w-full min-h-full">

        @include('Common.sidebar')

        <div id="content" class="flex flex-col flex-wrap flex-grow max-w-full overflow-x-hidden">

            <section class="flex-1 p-2 sm:p-4 text-left overflow-hidden">
                @include('Common.submenu')

                @yield('content')
            </section>

            @include('Common.footer')

        </div>
    </main>

    <script src=" {{ mix('/js/manifest.js') }}"></script>
    <script src="{{ mix('/js/vendor.js') }}"></script>
    <script src="{{ mix('/js/careus.js') }}" defer></script>

    @stack('scripts')

</body>

</html>
