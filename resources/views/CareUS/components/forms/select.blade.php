<select id="{{ $id }}" name="{{ $name }}"
    class="w-full pb-1 text-sm leading-loose tracking-wider transition duration-200 ease-in-out border-0 border-b-2 rounded-t-md text-gunmetal-400 focus:text-gunmetal-700 focus:bg-lightcyan-50 placeholder-gunmetal-500 placeholder-opacity-30 tabular-nums @error($varname) border-red-700 bg-red-100 @else border-burntsienna-300 bg-lightcyan-300 @enderror {{ $classes }}">

    <option value="">{{ __('Select') }}</option>

    @foreach ($options as $option)
    <option @if($option->list_item_value == old($varname) || $option->list_item_default) selected @endif
        value="{{ $option->list_item_value }}">
        {{ __($option->list_item_title) }}
    </option>
    @endforeach

</select>
@if($showerror)
@error($varname)
<span class="absolute z-10 leading-none text-red-600 left-1 -bottom-3 text-xxs">{!! __($message) !!}</span>
@enderror
@endif
