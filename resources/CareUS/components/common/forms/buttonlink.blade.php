@props([ 'color' => 'blue', 'icon' => 'info-circle' ])
<a
    {{ $attributes->merge(['type' => 'submit', 'class' => 'flex items-center justify-center w-44 h-10 ml-4 text-xs outline-none rounded-full cursor-pointer uppercase font-semibold tracking-widest transition-colors duration-150 ease-in-out bg-'.$color.'-500 text-'.$color.'-50 hover:bg-'.$color.'-50 hover:text-'.$color.'-500 active:bg-'.$color.'-50 focus:outline-none focus:ring border border-transparent ring-'.$color.'-500 disabled:opacity-25 tabular-nums']) }}>
    <i class="mr-2 fas fa-{{ $icon }}"></i>
    {{ $slot }}
</a>
