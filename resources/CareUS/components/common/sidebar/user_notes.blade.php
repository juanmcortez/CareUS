<div class="relative w-full h-44">
    <div
        class="absolute z-10 flex flex-col w-full h-40 overflow-hidden text-sm text-left origin-center transform bg-yellow-200 rounded-sm shadow text-gunmetal-700 -rotate-2">
        <h3
            class="flex flex-row items-center justify-between px-2 py-2 mb-2 text-yellow-500 border-b-2 border-yellow-300 text-md">
            <span class="font-semibold">{{ __('Last note') }}:</span>
            <span class="mt-1 text-xxs">{{ date('M d, Y', strtotime('2021-05-11')) }}</span>
        </h3>
        <p class="px-2 pb-2 text-xs">
            This is your last note. This is your last note. This is your last note. This is your last note.
            This
            is your last note. This is your last note. This is your last note. This is your last note. This
            is
            your last note.
        </p>
    </div>
    <div class="absolute z-0 w-full h-40 origin-center transform bg-green-300 rounded-sm shadow rotate-6">
    </div>
    <div class="absolute z-0 w-full h-40 origin-center transform bg-pink-300 rounded-sm shadow rotate-2">
    </div>
    <a href="{{ route('user.notes') }}" class="absolute w-auto mt-3 text-xs text-right right-5 -bottom-7">
        {{ __('More') }} <i class="text-xxs fas fa-chevron-right"></i>
    </a>
</div>
