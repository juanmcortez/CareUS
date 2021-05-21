<div class="absolute flex flex-row items-center justify-center w-full leading-loose align-middle"
    x-data="{ showalert: true }">
    <div class="flex flex-row w-1/2 bg-{{ $type }}-300 text-{{ $type }}-800 px-3 py-2 rounded-md transition-opacity ease-in-out duration-300"
        :class="{ 'opacity-0': !showalert }">
        <div class="flex flex-col flex-wrap items-center justify-start w-11/12">
            @foreach ($message->all() as $error)
            <p class="flex flex-row items-center justify-start w-full align-middle">
                <i class="mr-2 text-{{ $type }}-600 fas fa-exclamation-triangle animate-pulse"></i>
                {{ $error }}
            </p>
            @endforeach
        </div>
        <div class="flex flex-row items-start justify-end w-1/12 cursor-pointer" @click="showalert = false">
            <span class="sr-only">Close panel</span>
            <i class="mt-2 mr-1 text-xl fas fa-times"></i>
        </div>
    </div>
</div>
