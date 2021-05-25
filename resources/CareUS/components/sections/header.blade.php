<header
    class="w-full pb-1 mb-1 text-xl font-medium xl:pb-5 xl:mb-5 xl:text-2xl @auth border-b border-gray-300 @endauth">
    <h1 class="tracking-wider">
        <a href="{{ route('dashboard.index') }}">
            Care<span class="font-bold text-gunmetal-300">US</span>
        </a>
    </h1>
</header>

<!-- STATUS -->
@if (\Session::has('status'))
<x-common.alert type="bdazzledblue" icon="info-circle" :status="session('status')" />
@endif

<!-- ERRORS -->
@if ($errors->any())
<x-common.alert type="red" icon="exclamation-triangle" :message="$errors" />
@endif
