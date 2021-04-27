<nav id="mainnav" class="p-1 sm:pt-4 sm:px-0 sm:w-24 min-h-full sm:text-sm text-center bg-blue-900 text-white">
    <ul class="flex flex-row sm:flex-col flex-wrap justify-evenly pt-1 sm:pt-0">
        <li class="w-1/3 sm:w-auto pb-2 sm:pb-0 sm:pt-2 sm:pb-8 hover:text-blue-600">
            <a class="text-xxs sm:text-xs cursor-pointer {{ request()->routeIs('dashboard*') ? 'font-semibold' : '' }}"
                href="{{ route('dashboard.index') }}">
                <svg class="w-5 h-5 sm:w-8 sm:h-8 mx-auto" aria-hidden="true" focusable="false" data-prefix="fas"
                    data-icon="tachometer-alt" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                    <path fill="currentColor"
                        d="M288 32C128.94 32 0 160.94 0 320c0 52.8 14.25 102.26 39.06 144.8 5.61 9.62 16.3 15.2 27.44 15.2h443c11.14 0 21.83-5.58 27.44-15.2C561.75 422.26 576 372.8 576 320c0-159.06-128.94-288-288-288zm0 64c14.71 0 26.58 10.13 30.32 23.65-1.11 2.26-2.64 4.23-3.45 6.67l-9.22 27.67c-5.13 3.49-10.97 6.01-17.64 6.01-17.67 0-32-14.33-32-32S270.33 96 288 96zM96 384c-17.67 0-32-14.33-32-32s14.33-32 32-32 32 14.33 32 32-14.33 32-32 32zm48-160c-17.67 0-32-14.33-32-32s14.33-32 32-32 32 14.33 32 32-14.33 32-32 32zm246.77-72.41l-61.33 184C343.13 347.33 352 364.54 352 384c0 11.72-3.38 22.55-8.88 32H232.88c-5.5-9.45-8.88-20.28-8.88-32 0-33.94 26.5-61.43 59.9-63.59l61.34-184.01c4.17-12.56 17.73-19.45 30.36-15.17 12.57 4.19 19.35 17.79 15.17 30.36zm14.66 57.2l15.52-46.55c3.47-1.29 7.13-2.23 11.05-2.23 17.67 0 32 14.33 32 32s-14.33 32-32 32c-11.38-.01-20.89-6.28-26.57-15.22zM480 384c-17.67 0-32-14.33-32-32s14.33-32 32-32 32 14.33 32 32-14.33 32-32 32z"
                        class=""></path>
                </svg>
                {{ __('Dashboard') }}
            </a>
        </li>
        <li class="w-1/3 sm:w-auto pb-2 sm:pb-0 sm:pb-8 hover:text-blue-600">
            <a class="text-xxs sm:text-xs cursor-pointer {{ request()->routeIs('patients*') ? 'font-semibold' : '' }}"
                href="{{ route('patients.list') }}">
                <svg class="w-5 h-5 sm:w-8 sm:h-8 mx-auto" aria-hidden="true" focusable="false" data-prefix="fas"
                    data-icon="hospital-user" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
                    <path fill="currentColor"
                        d="M480 320a96 96 0 1 0-96-96 96 96 0 0 0 96 96zm48 32a22.88 22.88 0 0 0-7.06 1.09 124.76 124.76 0 0 1-81.89 0A22.82 22.82 0 0 0 432 352a112 112 0 0 0-112 112.62c.14 26.26 21.73 47.38 48 47.38h224c26.27 0 47.86-21.12 48-47.38A112 112 0 0 0 528 352zm-198.09 10.45A145.19 145.19 0 0 1 352 344.62V128a32 32 0 0 0-32-32h-32V32a32 32 0 0 0-32-32H96a32 32 0 0 0-32 32v64H32a32 32 0 0 0-32 32v368a16 16 0 0 0 16 16h288.31A78.62 78.62 0 0 1 288 464.79a143.06 143.06 0 0 1 41.91-102.34zM144 404a12 12 0 0 1-12 12H92a12 12 0 0 1-12-12v-40a12 12 0 0 1 12-12h40a12 12 0 0 1 12 12zm0-128a12 12 0 0 1-12 12H92a12 12 0 0 1-12-12v-40a12 12 0 0 1 12-12h40a12 12 0 0 1 12 12zm48-122a6 6 0 0 1-6 6h-20a6 6 0 0 1-6-6v-26h-26a6 6 0 0 1-6-6v-20a6 6 0 0 1 6-6h26V70a6 6 0 0 1 6-6h20a6 6 0 0 1 6 6v26h26a6 6 0 0 1 6 6v20a6 6 0 0 1-6 6h-26zm80 250a12 12 0 0 1-12 12h-40a12 12 0 0 1-12-12v-40a12 12 0 0 1 12-12h40a12 12 0 0 1 12 12zm0-128a12 12 0 0 1-12 12h-40a12 12 0 0 1-12-12v-40a12 12 0 0 1 12-12h40a12 12 0 0 1 12 12z"
                        class=""></path>
                </svg>
                {{ __('Patients') }}
            </a>
        </li>
        <li class="w-1/3 sm:w-auto pb-2 sm:pb-0 sm:pb-8 hover:text-blue-600 ">
            <a class="text-xxs sm:text-xs cursor-pointer{{ request()->routeIs('billing*') ? 'font-semibold' : '' }}"
                href="#">
                <svg class="w-5 h-5 sm:w-8 sm:h-8 mx-auto mb-1" aria-hidden="true" focusable="false" data-prefix="fas"
                    data-icon="file-invoice-dollar" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                    <path fill="currentColor"
                        d="M377 105L279.1 7c-4.5-4.5-10.6-7-17-7H256v128h128v-6.1c0-6.3-2.5-12.4-7-16.9zm-153 31V0H24C10.7 0 0 10.7 0 24v464c0 13.3 10.7 24 24 24h336c13.3 0 24-10.7 24-24V160H248c-13.2 0-24-10.8-24-24zM64 72c0-4.42 3.58-8 8-8h80c4.42 0 8 3.58 8 8v16c0 4.42-3.58 8-8 8H72c-4.42 0-8-3.58-8-8V72zm0 80v-16c0-4.42 3.58-8 8-8h80c4.42 0 8 3.58 8 8v16c0 4.42-3.58 8-8 8H72c-4.42 0-8-3.58-8-8zm144 263.88V440c0 4.42-3.58 8-8 8h-16c-4.42 0-8-3.58-8-8v-24.29c-11.29-.58-22.27-4.52-31.37-11.35-3.9-2.93-4.1-8.77-.57-12.14l11.75-11.21c2.77-2.64 6.89-2.76 10.13-.73 3.87 2.42 8.26 3.72 12.82 3.72h28.11c6.5 0 11.8-5.92 11.8-13.19 0-5.95-3.61-11.19-8.77-12.73l-45-13.5c-18.59-5.58-31.58-23.42-31.58-43.39 0-24.52 19.05-44.44 42.67-45.07V232c0-4.42 3.58-8 8-8h16c4.42 0 8 3.58 8 8v24.29c11.29.58 22.27 4.51 31.37 11.35 3.9 2.93 4.1 8.77.57 12.14l-11.75 11.21c-2.77 2.64-6.89 2.76-10.13.73-3.87-2.43-8.26-3.72-12.82-3.72h-28.11c-6.5 0-11.8 5.92-11.8 13.19 0 5.95 3.61 11.19 8.77 12.73l45 13.5c18.59 5.58 31.58 23.42 31.58 43.39 0 24.53-19.05 44.44-42.67 45.07z"
                        class=""></path>
                </svg>
                {{ __('Billing') }}
            </a>
        </li>
        <li class="w-1/3 sm:w-auto sm:pb-8 hover:text-blue-600">
            <a class="text-xxs sm:text-xs cursor-pointer {{ request()->routeIs('scheduler*') ? 'font-semibold' : '' }}"
                href="#">
                <svg class="w-5 h-5 sm:w-8 sm:h-8 mx-auto mb-1" aria-hidden="true" focusable="false" data-prefix="fas"
                    data-icon="calendar-alt" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                    <path fill="currentColor"
                        d="M0 464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V192H0v272zm320-196c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12h-40c-6.6 0-12-5.4-12-12v-40zm0 128c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12h-40c-6.6 0-12-5.4-12-12v-40zM192 268c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12h-40c-6.6 0-12-5.4-12-12v-40zm0 128c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12h-40c-6.6 0-12-5.4-12-12v-40zM64 268c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12H76c-6.6 0-12-5.4-12-12v-40zm0 128c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12H76c-6.6 0-12-5.4-12-12v-40zM400 64h-48V16c0-8.8-7.2-16-16-16h-32c-8.8 0-16 7.2-16 16v48H160V16c0-8.8-7.2-16-16-16h-32c-8.8 0-16 7.2-16 16v48H48C21.5 64 0 85.5 0 112v48h448v-48c0-26.5-21.5-48-48-48z"
                        class=""></path>
                </svg>
                {{ __('Scheduler') }}
            </a>
        </li>
        <li class="w-1/3 sm:w-auto sm:pb-8 hover:text-blue-600">
            <a class="text-xxs sm:text-xs cursor-pointer {{ request()->routeIs('eligibility*') ? 'font-semibold' : '' }}"
                href="#">
                <svg class="w-5 h-5 sm:w-8 sm:h-8 mx-auto" aria-hidden="true" focusable="false" data-prefix="fas"
                    data-icon="user-check" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
                    <path fill="currentColor"
                        d="M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zm89.6 32h-16.7c-22.2 10.2-46.9 16-72.9 16s-50.6-5.8-72.9-16h-16.7C60.2 288 0 348.2 0 422.4V464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48v-41.6c0-74.2-60.2-134.4-134.4-134.4zm323-128.4l-27.8-28.1c-4.6-4.7-12.1-4.7-16.8-.1l-104.8 104-45.5-45.8c-4.6-4.7-12.1-4.7-16.8-.1l-28.1 27.9c-4.7 4.6-4.7 12.1-.1 16.8l81.7 82.3c4.6 4.7 12.1 4.7 16.8.1l141.3-140.2c4.6-4.7 4.7-12.2.1-16.8z"
                        class=""></path>
                </svg>
                {{ __('Eligibility') }}
            </a>
        </li>
        <li class="w-1/3 sm:w-auto sm:pb-8 hover:text-blue-600">
            <a class="text-xxs sm:text-xs cursor-pointer {{ request()->routeIs('reports*') ? 'font-semibold' : '' }}"
                href="#">
                <svg class="w-5 h-5 sm:w-8 sm:h-8 mx-auto" aria-hidden="true" focusable="false" data-prefix="fas"
                    data-icon="chart-bar" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                    <path fill="currentColor"
                        d="M332.8 320h38.4c6.4 0 12.8-6.4 12.8-12.8V172.8c0-6.4-6.4-12.8-12.8-12.8h-38.4c-6.4 0-12.8 6.4-12.8 12.8v134.4c0 6.4 6.4 12.8 12.8 12.8zm96 0h38.4c6.4 0 12.8-6.4 12.8-12.8V76.8c0-6.4-6.4-12.8-12.8-12.8h-38.4c-6.4 0-12.8 6.4-12.8 12.8v230.4c0 6.4 6.4 12.8 12.8 12.8zm-288 0h38.4c6.4 0 12.8-6.4 12.8-12.8v-70.4c0-6.4-6.4-12.8-12.8-12.8h-38.4c-6.4 0-12.8 6.4-12.8 12.8v70.4c0 6.4 6.4 12.8 12.8 12.8zm96 0h38.4c6.4 0 12.8-6.4 12.8-12.8V108.8c0-6.4-6.4-12.8-12.8-12.8h-38.4c-6.4 0-12.8 6.4-12.8 12.8v198.4c0 6.4 6.4 12.8 12.8 12.8zM496 384H64V80c0-8.84-7.16-16-16-16H16C7.16 64 0 71.16 0 80v336c0 17.67 14.33 32 32 32h464c8.84 0 16-7.16 16-16v-32c0-8.84-7.16-16-16-16z"
                        class=""></path>
                </svg>
                {{ __('Reports') }}
            </a>
        </li>
    </ul>
</nav>
