<div {{ $attributes->merge([ 'class' => 'flex flex-row flex-wrap w-full my-5' ]) }}>
    @foreach ($patient->contact as $cdx => $contact)
    <div class="flex flex-row flex-wrap w-full mt-5 text-gunmetal-400">
        <div class="flex flex-row flex-wrap w-3/12">
            <p class="w-5/12 pr-1 font-semibold text-right">
                {{ __($patient->getOptionTitle('contacttype', $contact->contact_type)) }}
            </p>
            <p class="w-7/12">
                {{ __($patient->getOptionTitle('title', $contact->title)).' '.$contact->formated_name }}
            </p>
        </div>
        <div class="flex flex-row flex-wrap w-9/12">&nbsp;</div>
    </div>

    <div class="flex flex-row flex-wrap w-full pt-5 mt-5 border-t-2 border-gunmetal-50 text-gunmetal-400">
        <div class="flex flex-row flex-wrap w-3/12">
            <p class="w-5/12 pr-1 font-semibold text-right">
                {{ __($patient->getOptionTitle('phonetype', $contact->phone->first()->type)) }}
            </p>
            <p class="w-7/12">{{ $contact->phone->first()->formated_phone }}</p>
        </div>
        <div class="flex flex-row flex-wrap w-3/12">
            <p class="w-5/12 pr-1 font-semibold text-right">{{ __('E-mail') }}</p>
            <p class="w-7/12">{{ $contact->email }}</p>
        </div>
        <div class="flex flex-row flex-wrap w-6/12">&nbsp;</div>
    </div>

    <div
        class="flex flex-row flex-wrap w-full pt-5 @if($cdx<2) mt-5 @else my-5 @endif border-t-2 border-gunmetal-50 text-gunmetal-400">
        <div class="flex flex-row flex-wrap w-5/12">
            <p class="w-3/12 pr-1 font-semibold text-right">{{ __('Address') }}</p>
            <p class="w-9/12">
                {{ $contact->address->street }}
                @if(!empty($contact->address->street_extended))
                - {{ $contact->address->street_extended }}
                @endif
            </p>
        </div>
        <div class="flex flex-row flex-wrap w-1/12">&nbsp;</div>
        <div class="flex flex-row flex-wrap w-3/12">
            <p class="w-5/12 pr-1 font-semibold text-right">{{ __('City, State Zip') }}</p>
            <p class="w-7/12">
                {{ $contact->address->city }},
                {{ __($patient->getSubOptionTitle('countries', $contact->address->country, $contact->address->state)) }}
                {{ $contact->address->zip }}
            </p>
        </div>
        <div class="flex flex-row flex-wrap w-3/12">
            <p class="w-5/12 pr-1 font-semibold text-right">{{ __('Country') }}</p>
            <p class="w-7/12">{{ __($patient->getOptionTitle('countries', $contact->address->country)) }}</p>
        </div>
    </div>

    @if($cdx<2) <div
        class="flex flex-row flex-wrap w-full pt-5 mt-5 border-t-2 border-gunmetal-50 text-gunmetal-400 bg-bdazzledblue-200">
        &nbsp;
</div>
@endif
@endforeach
</div>
