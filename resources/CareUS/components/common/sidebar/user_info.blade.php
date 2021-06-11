<div class="w-full h-auto mb-32">

    @if(Auth()->user()->persona->profile_photo)
    <img alt="@empty(Auth()->user()->persona->last_name) {{ Auth()->user()->email }} @else {{ Auth()->user()->persona->formated_name }} @endempty"
        src="{{ secure_asset(Auth()->user()->persona->profile_photo) }}"
        class="mx-auto mb-5 border-4 rounded-full h-28 w-28 border-burntsienna-400" />
    @else
    <div
        class="mx-auto mb-5 border-4 rounded-full h-28 w-28 text-burntsienna-400 bg-burntsienna-200 border-burntsienna-400">
        <i class="mt-1 text-8xl fa fa-user-circle"></i>
    </div>

    @endif

    <h3 class="mb-2 text-xl font-semibold">
        @empty(Auth()->user()->persona->last_name)
        {{ Auth()->user()->email }}
        @else
        {{ Auth()->user()->persona->formated_name }}
        @endempty
    </h3>

    <div class="flex flex-row items-center justify-center w-full text-sm text-center text-burntsienna-400">
        @auth
        <h5 class="w-full" title="{{ __('User role') }}">
            <i class="mt-1 mr-1 fas fa-id-badge"></i>
            {{ __('Administrator') }}
        </h5>
        @endauth
        @guest
        <h5 class="w-3/5" title="{{ __('User role') }}">
            <i class="mt-1 mr-1 fas fa-id-badge"></i>
            {{ __('Administrator') }}
        </h5>
        <div class="flex flex-row items-center justify-end w-2/5">
            @php
            (session()->get('locale')) ? $locale = config('app.locale') : $locale = session()->get('locale');
            @endphp
            <a href="{{ route('lang.switch', ['locale' => 'en']) }}" title="Switch to English"
                class="{{ ($locale == 'en') ? 'hidden' : '' }} w-1/3">
                <img class="w-5 mx-auto" src="{{ secure_asset('images/flags/en.svg') }}" alt="Switch to English" />
            </a>
            <a href="{{ route('lang.switch', ['locale' => 'es']) }}" title="Cambie a Español"
                class="{{ ($locale == 'es') ? 'hidden' : '' }} w-1/3">
                <img class="w-5 mx-auto" src="{{ secure_asset('images/flags/es.svg') }}" alt="Cambie a Español" />
            </a>
            <a href="{{ route('lang.switch', ['locale' => 'fr']) }}" title="Passer au Français"
                class="{{ ($locale == 'fr') ? 'hidden' : '' }} w-1/3">
                <img class="w-5 mx-auto" src="{{ secure_asset('images/flags/fr.svg') }}" alt="Passer au Français" />
            </a>
        </div>
        @endguest
    </div>
</div>
