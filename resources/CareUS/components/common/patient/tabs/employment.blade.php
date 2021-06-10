<div {{ $attributes->merge([ 'class' => 'flex flex-row flex-wrap w-full my-5' ]) }}>
    @foreach ($patient->employment as $employment)
    <div class="flex flex-row flex-wrap w-full mt-5 text-gunmetal-400">
        <div class="flex flex-row flex-wrap w-3/12">
            <p class="w-5/12 pr-1 font-semibold text-right">{{ __('Company') }}</p>
            <p class="w-7/12">{{ $employment->company }}</p>
        </div>
        <div class="flex flex-row flex-wrap w-3/12">
            <p class="w-5/12 pr-1 font-semibold text-right">{{ __('Occupation') }}</p>
            <p class="w-7/12">{{ $employment->occupation }}</p>
        </div>
        <div class="flex flex-row flex-wrap w-3/12">
            <p class="w-5/12 pr-1 font-semibold text-right">{{ __('Monthly Income') }}</p>
            <p class="w-7/12">
                $ @empty($employment->monthly_income) 0.00 @else {{ $employment->monthly_income }} @endempty
            </p>
        </div>
        <div class="flex flex-row flex-wrap w-3/12">&nbsp;</div>
    </div>

    <div class="flex flex-row flex-wrap w-full pt-5 mt-5 border-t-2 border-gunmetal-50 text-gunmetal-400">
        <div class="flex flex-row flex-wrap w-3/12">
            <p class="w-5/12 pr-1 font-semibold text-right">{{ __('Employer') }}</p>
            <p class="w-7/12">
                {{ __($patient->getOptionTitle('title', $employment->title)).' '.$employment->formated_name }}
            </p>
        </div>
        <div class="flex flex-row flex-wrap w-9/12">&nbsp;</div>
    </div>

    <div class="flex flex-row flex-wrap w-full pt-5 mt-5 border-t-2 border-gunmetal-50 text-gunmetal-400">
        <div class="flex flex-row flex-wrap w-3/12">
            <p class="w-5/12 pr-1 font-semibold text-right">
                {{ __($patient->getOptionTitle('phonetype', $employment->phone->first()->type)) }}
            </p>
            <p class="w-7/12">{{ $employment->phone->first()->formated_phone }}</p>
        </div>
        <div class="flex flex-row flex-wrap w-3/12">
            <p class="w-5/12 pr-1 font-semibold text-right">{{ __('E-mail') }}</p>
            <p class="w-7/12">{{ $employment->email }}</p>
        </div>
        <div class="flex flex-row flex-wrap w-6/12">&nbsp;</div>
    </div>

    <div class="flex flex-row flex-wrap w-full pt-5 my-5 border-t-2 border-gunmetal-50 text-gunmetal-400">
        <div class="flex flex-row flex-wrap w-5/12">
            <p class="w-3/12 pr-1 font-semibold text-right">{{ __('Address') }}</p>
            <p class="w-9/12">
                {{ $employment->address->street }}
                @if(!empty($employment->address->street_extended))
                - {{ $employment->address->street_extended }}
                @endif
            </p>
        </div>
        <div class="flex flex-row flex-wrap w-1/12">&nbsp;</div>
        <div class="flex flex-row flex-wrap w-3/12">
            <p class="w-5/12 pr-1 font-semibold text-right">{{ __('City, State Zip') }}</p>
            <p class="w-7/12">
                {{ $employment->address->city }},
                {{ __($patient->getSubOptionTitle('countries', $employment->address->country, $employment->address->state)) }}
                {{ $employment->address->zip }}
            </p>
        </div>
        <div class="flex flex-row flex-wrap w-3/12">
            <p class="w-5/12 pr-1 font-semibold text-right">{{ __('Country') }}</p>
            <p class="w-7/12">{{ __($patient->getOptionTitle('countries', $employment->address->country)) }}</p>
        </div>
    </div>
    @endforeach
</div>
