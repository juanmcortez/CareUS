<div :class="{ 'opacity-0': !open, 'opacity-100': open }"
    class="flex flex-col w-full pt-5 text-center transition-all duration-150 ease-in-out">

    <div class="flex flex-col w-full py-5 pl-5 text-left border-t border-gunmetal-400">
        <a href="{{ route('practice.index') }}" class="mb-4 text-sm text-burntsienna-400 hover:text-burntsienna-600">
            <i class="w-4 text-xs fas fa-hospital"></i>
            {{ __('Practice') }}
        </a>
        <a href="{{ route('insurances.index') }}" class="mb-4 text-sm text-burntsienna-400 hover:text-burntsienna-600">
            <i class="w-4 text-xs fas fa-briefcase-medical"></i>
            {{ __('Insurances') }}
        </a>
        <a href="{{ route('codes.index') }}" class="mb-4 text-sm text-burntsienna-400 hover:text-burntsienna-600">
            <i class="w-4 text-xs fas fa-clipboard-list"></i>
            {{ __('Codes') }}
        </a>
        <a href="{{ route('careus.settings.lists') }}" class="text-sm text-burntsienna-400 hover:text-burntsienna-600">
            <i class="w-4 text-xs fas fa-tools"></i>
            {!! __(':name settings', ['name' => 'Care<span class="font-semibold">US</span>']) !!}
        </a>
    </div>

    <div class="flex flex-col w-full py-5 pl-5 text-left border-t border-gunmetal-400">
        <a href="{{ route('user.settings') }}"
            class="text-sm text-left text-burntsienna-400 hover:text-burntsienna-600">
            <i class="w-4 text-xs fas fa-user-cog"></i>
            @empty(Auth()->user()->first_name)
            {!! __('<strong>:name</strong>\'s settings', ['name' => Auth()->user()->email]) !!}
            @else
            {!! __('<strong>:name</strong>\'s settings', ['name' => Auth()->user()->first_name]) !!}
            @endempty
        </a>
    </div>

    <div class="flex flex-col w-full py-5 border-t border-gunmetal-400">
        <form method="POST" action="{{ route('logout') }}" class="text-sm">
            @csrf
            <span class="mr-3 text-xs text-gunmetal-400">
                {{ __('Last login: :date', ['date' => date('M d, Y')]) }}
            </span>
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();"
                class="text-sm text-burntsienna-400 hover:text-burntsienna-600">
                {{ __('Log Out') }}
            </a>
        </form>
    </div>

</div>
