<textarea id="{{ $id }}" rows="{{ $rows }}" name="{{ $name }}"
    class="w-full pb-1 text-sm leading-loose tracking-wider transition duration-200 ease-in-out border-0 border-b-2 rounded-t-md resize-none text-gunmetal-400 focus:text-gunmetal-700 focus:bg-lightcyan-50 placeholder-gunmetal-500 placeholder-opacity-30 tabular-nums @error('patient.persona.decease_reason') border-red-700 bg-red-100 @else border-burntsienna-300 bg-lightcyan-300 @enderror {{ $classes }}"
    placeholder="{{ __($placeholder) }}">@if(!$textvalue){{ old($varname) }}@else{{ $textvalue }}@endif</textarea>
@if($showerror)
@error('patient.persona.decease_reason')
<span class="absolute z-10 leading-none text-red-600 top-40 left-1 text-xxs">
    {!! __($message) !!}
</span>
@enderror
@endif
