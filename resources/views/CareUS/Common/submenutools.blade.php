<div class="flex">
    @if(request()->routeIs('patients*'))
    <a href="{{ route('patients.create') }}"
        class="w-8 h-8 pt-1 mr-2 text-base text-center rounded-full hover:text-palecerulean-200 hover:bg-bdazzledblue-700 text-bdazzledblue-500 bg-palecerulean-200"
        title="{{ __('New Patient') }}">
        <i class="fas fa-plus"></i>
    </a>
    @else
    <a href="#"
        class="w-8 h-8 pt-1 mr-2 text-base text-center rounded-full text-burntsienna-500 hover:text-palecerulean-200 hover:bg-burntsienna-500 bg-palecerulean-200">
        <i class="fas fa-bell"></i>
    </a>
    @endif
    <a href="#"
        class="w-8 h-8 pt-1 mx-2 text-base text-center rounded-full hover:text-palecerulean-700 hover:bg-bdazzledblue-700 text-bdazzledblue-500 bg-palecerulean-500">
        <i class="fas fa-print"></i>
    </a>
    {{-- <a href="#"
        class="w-8 h-8 pt-1 mx-2 text-base text-center rounded-full hover:text-palecerulean-700 hover:bg-bdazzledblue-700 text-bdazzledblue-500 bg-palecerulean-500">
        <i class="fas fa-file-excel"></i>
    </a>
    <a href="#"
        class="w-8 h-8 pt-1 ml-2 text-base text-center rounded-full hover:text-palecerulean-700 hover:bg-bdazzledblue-700 text-bdazzledblue-500 bg-palecerulean-500">
        <i class="fas fa-file-csv"></i>
    </a> --}}
</div>
