<aside class="flex justify-center w-full min-h-full text-sm lg:w-28 bg-burntsienna-500">
    <nav class="flex flex-row lg:justify-between lg:flex-col">
        <section class="flex flex-row flex-wrap items-center lg:flex-col lg:pt-2 lg:sticky lg:top-0 lg:left-0">
            <a href="{{ route('dashboard.index') }}" class="w-40 text-center lg:w-24 lg:mx-auto">
                <i class="mx-auto text-3xl fas fa-heartbeat"></i>
            </a>
            <div class="flex-col items-start hidden w-full mt-6 space-y-4 text-xs lg:flex">
                <!-- <span class="font-bold uppercase">{{ __('Dashboard') }}</span> -->
                <a href="{{ route('patients.list') }}"
                    class="flex flex-col mx-auto hover:text-burntsienna-300 {{ request()->routeIs('patients*') ? 'font-bold text-burntsienna-900' : '' }}"
                    title="{{ __('Patients') }}">
                    <i class="mx-auto text-2xl fas fa-id-card-alt"></i>
                    {{ __('Patients') }}
                </a>
                {{-- <ahref="#"class="flexflex-colmx-autohover:text-burntsienna-300"title="__('Appointments') }}">
                <i class="mx-auto text-2xl fas fa-calendar-alt"></i>
                {{ __('Appointments') }}
                </a>
                <a href="#" class="flex flex-col mx-auto hover:text-burntsienna-300" title="{{ __('Messages') }}">
                    <i class="mx-auto text-2xl fas fa-comments"></i>
                    {{ __('Messages') }}
                </a> --}}
            </div>
            <div class="flex-col items-start hidden w-full mt-4 space-y-4 text-xs lg:flex">
                <!-- <span class="font-bold uppercase ">{{ __('Medical') }}</span> -->
                {{-- <a href=" #" class="flex flex-col mx-auto hover:text-burntsienna-300" title="{{ __('Lab Results') }}">
                <i class="mx-auto text-2xl fas fa-notes-medical"></i>
                {{ __('Lab Results') }}
                </a>
                <a href="#" class="flex flex-col mx-auto hover:text-burntsienna-300"
                    title="{{ __('Medical Records') }}">
                    <i class="mx-auto text-2xl fas fa-laptop-medical"></i>
                    {{ __('Medical Records') }}
                </a>
                <a href="#" class="flex flex-col mx-auto hover:text-burntsienna-300" title="{{ __('Prescriptions') }}">
                    <i class="mx-auto text-2xl fas fa-capsules"></i>
                    {{ __('Prescriptions') }}
                </a> --}}
            </div>
            <div class="flex-col items-start hidden w-full mt-4 space-y-4 text-xs lg:flex">
                <!-- <span class="font-bold uppercase">{{ __('Finance') }}</span> -->
                {{-- <a href="#" class="flex flex-col mx-auto hover:text-burntsienna-300" title="{{ __('Billing') }}">
                <i class="mx-auto text-2xl fas fa-file-invoice-dollar"></i>
                {{ __('Billing') }}
                </a>
                <a href="#" class="flex flex-col mx-auto hover:text-burntsienna-300" title="{{ __('Eligibility') }}">
                    <i class="mx-auto text-2xl fas fa-clipboard-check"></i>
                    {{ __('Eligibility') }}
                </a>
                <a href="#" class="flex flex-col mx-auto hover:text-burntsienna-300" title="{{ __('Reports') }}">
                    <i class="mx-auto text-2xl fas fa-chart-pie"></i>
                    {{ __('Reports') }}
                </a> --}}
            </div>
            <div class="flex-col items-start hidden w-full mt-4 space-y-4 text-xs lg:flex">
                <!-- <span class="font-bold uppercase">{{ __('Support') }}</span> -->
                {{-- <a href="#" class="flex flex-col mx-auto hover:text-burntsienna-300" title="{{ __('Faq') }}">
                <i class="mx-auto text-2xl fas fa-question-circle"></i>
                {{ __('Faq') }}
                </a>
                <a href="#" class="flex flex-col mx-auto hover:text-burntsienna-300" title="{{ __('Documentation') }}">
                    <i class="mx-auto text-2xl fas fa-info-circle"></i>
                    {{ __('Documentation') }}
                </a>
                <a href="#" class="flex flex-col mx-auto hover:text-burntsienna-300" title="{{ __('Contact Us') }}">
                    <i class="mx-auto text-2xl fas fa-mail-bulk"></i>
                    {{ __('Contact Us') }}
                </a> --}}
            </div>
        </section>
        <section class="flex flex-row flex-wrap lg:mb-4 lg:items-center lg:flex-col">
            <a class="my-4 ml-4 lg:ml-0 lg:my-0 lg:mb-4" href="{{ route('dashboard.index') }}"
                title="{{ __('Juan M. Cortéz') }}">
                <img class="w-10 h-10 border-4 rounded-full  hover:border-burntsienna-300 {{ request()->routeIs('dashboard*') ? 'border-burntsienna-900' : 'border-palecerulean-500' }}"
                    alt="{{ __('Juan M. Cortéz') }}" src="https://picsum.photos/id/1005/150" />
            </a>
            <a class="mt-6 ml-4 lg:ml-0 lg:mt-0 hover:text-burntsienna-300 {{ request()->routeIs('settings*') ? 'font-bold text-burntsienna-900' : '' }}"
                href="{{ route('settings.index') }}" title="{{ __('Settings') }}">
                <i class="fas fa-cogs"></i>
                {{ __('Settings') }}
            </a>
        </section>
    </nav>
</aside>
