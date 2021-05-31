<div class="flex flex-row w-full flex-nowrap pb-1 mb-1 md:pb-5 md:mb-5 @auth border-b border-gray-300 @endauth">
    <header class="text-xl font-medium md:text-2xl @auth w-1/2 @else w-full @endauth">
        <h1 class="tracking-wider">
            <a href="{{ route('dashboard.index') }}">
                Care<span class="font-bold text-gunmetal-300">US</span>
            </a>
        </h1>
    </header>
    @auth
    <nav class="flex items-center justify-end w-1/2 text-sm font-medium uppercase">
        <ul class="flex flex-row justify-between w-full px-10 tracking-wider">
            <li class="{{ request()->routeIs('patients.*') ? 'text-burntsienna-600 font-bold' : 'text-gunmetal-700' }}">
                <a href="{{ route('patients.list') }}">{{ __('Patients') }}</a>
            </li>
            <li>
                <a href="{{ route('patients.list') }}">{{ __('Billing') }}</a>
            </li>
            <li>
                <a href="{{ route('patients.list') }}">{{ __('Eligibility') }}</a>
            </li>
            <li>
                <a href="{{ route('patients.list') }}">{{ __('Scheduler') }}</a>
            </li>
            <li>
                <a href="{{ route('patients.list') }}">{{ __('Reports') }}</a>
            </li>
        </ul>
    </nav>
    @endauth
</div>

<!-- STATUS -->
@if (\Session::has('status'))
<x-common.alert type="bdazzledblue" icon="info-circle" :status="session('status')" />
@endif

<!-- SUCESS -->
@if (\Session::has('success'))
<x-common.alert type="green" icon="check-square" :status="session('success')" />
@endif

<!-- ERRORS -->
@if ($errors->any())
<x-common.alert type="red" icon="exclamation-triangle" :message="$errors" />
@endif
