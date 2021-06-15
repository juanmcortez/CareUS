<div class="relative w-full h-44">
    @if(auth()->user()->notes->first())
    <div
        class="absolute z-10 flex flex-col w-full h-40 overflow-hidden text-sm text-left origin-center transform bg-yellow-200 rounded-sm shadow text-gunmetal-700 -rotate-2">
        <h3
            class="flex flex-row items-center justify-between px-2 py-2 mb-2 text-yellow-500 border-b-2 border-yellow-300 text-md">
            <span class="font-semibold">{{ __('Last note') }}:</span>
            <span class="mt-1 text-xxs">{{ auth()->user()->notes->first()->created_at_language }}</span>
        </h3>
        <div class="flex flex-row items-start justify-between w-full pb-2 text-yellow-700 flex-nowrap">
            <p class="w-7/12 pl-2 text-xs">{{ auth()->user()->notes->first()->title }}</p>
            <p class="w-5/12 pt-1 pr-2 text-right text-xxs">
                {{ auth()->user()->notes->first()->patient->persona->formated_name }}
            </p>
        </div>
        <p class="px-2 text-xs text-yellow-700">{{ auth()->user()->notes->first()->body }}</p>
    </div>
    <div class="absolute z-0 w-full h-40 origin-center transform bg-green-300 rounded-sm shadow rotate-6">
    </div>
    <div class="absolute z-0 w-full h-40 origin-center transform bg-pink-300 rounded-sm shadow rotate-2">
    </div>
    <a href="{{ route('user.notes') }}" class="absolute w-auto mt-3 text-xs text-right right-5 -bottom-7">
        {{ __('More') }} <i class="text-xxs fas fa-chevron-right"></i>
    </a>
    @endif
</div>
