@props([ 'options' => '', 'seloption' => '' ])
<select
    {{ $attributes->merge(['type' => 'submit', 'class' => 'w-full p-2 text-sm duration-150 ease-in-out border-0 border-t-0 border-b-2 border-l-0 border-r-0 outline-none text-burntsienna-500 bg-burntsienna-300 focus:bg-burntsienna-100 placeholder-burntsienna-500 focus:placeholder-burntsienna-300 border-burntsienna-700 mb-1transition focus:text-gunmetal-700 placeholder-opacity-30 tabular-nums']) }}>
    <option value="">{{ __('Select an option') }}</option>
    @foreach ($options as $option)
    @if(!$seloption)
    <option value="{{ $option->list_item_value }}" @if($option->list_item_default) selected @endif>
        {{ __($option->list_item_title) }}
    </option>
    @else
    <option value="{{ $option->list_item_value }}" @if($option->list_item_value == $seloption) selected @endif>
        {{ __($option->list_item_title) }}
    </option>
    @endempty
    @endforeach
</select>
