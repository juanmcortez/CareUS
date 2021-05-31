@props([ 'options' => '', 'seloption' => '' ])
<select
    {{ $attributes->merge(['type' => 'submit', 'class' => 'p-2 mb-1 text-sm tabular-nums border-0 border-b-2 border-burntsienna-700 outline-none transition duration-150 ease-in-out text-burntsienna-500 bg-burntsienna-300 placeholder-burntsienna-500 placeholder-opacity-30 focus:bg-burntsienna-100 focus:placeholder-burntsienna-300 focus:text-gunmetal-700 tabular-nums']) }}>
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
