@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-t-0 border-b-2 border-l-0 border-r-0
outline-none text-gunmetal-700 bg-burntsienna-300 focus:bg-burntsienna-100 placeholder-burntsienna-500
focus:placeholder-burntsienna-300 border-burntsienna-700 text-sm tabular-nums disabled:bg-transparent
disabled:border-0']) !!}>
