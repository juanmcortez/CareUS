<{{ $tag }} id="{{ $id }}" {{ $type }}
    class="w-1/2 py-2 ml-2 font-bold text-white uppercase transition duration-200 ease-in-out bg-{{ $color }}-500 rounded hover:bg-{{ $color }}-700 {{ $classes }}">
    <i class="fas fa-{{ $icon }}"></i>
    {{ __($text) }}
</{{ $tag }}>
