<div class="flex flex-row flex-wrap w-full">
    <table class="table w-full text-sm table-auto">
        <thead class="text-bdazzledblue-400">
            <tr class="flex flex-row items-center justify-between flex-nowrap bg-gunmetal-50">
                <th class="w-1/12 py-5">{{ __('Insurance') }}</th>
                <th class="w-3/12 py-5">{{ __('Company') }}</th>
                <th class="w-2/12 py-5">{{ __('Effective Date') }}</th>
                <th class="w-2/12 py-5">{{ __('Termination Date') }}</th>
                <th class="w-1/12 py-5">{{ __('Policy #') }}</th>
                <th class="w-1/12 py-5">{{ __('Group #') }}</th>
                <th class="w-1/12 py-5">{{ __('Plan') }}</th>
                <th class="w-1/12 py-5">&nbsp;</th>
            </tr>
            <tr>
                <td colspan="7" class="py-2"></td>
            </tr>
        </thead>
        <tbody>
            @foreach ($patient->subscriber as $sdx => $subscriber)
            <tr class="flex flex-row flex-nowrap items-center justify-between text-center transition-colors duration-150 ease-in-out shadow-sm
                @if($sdx % 2 == 0)
                @isset($subscriber->termination_date) bg-red-200 text-gunmetal-50 @else bg-gunmetal-50 text-gunmetal-400 @endif
                @else
                @isset($subscriber->termination_date) bg-red-300 text-gunmetal-50 @else bg-gunmetal-100 text-gunmetal-400 @endif
                @endif">
                <td class="w-1/12 py-5 border-r tabular-nums
                    @if($sdx % 2 == 0) border-palecerulean-300 @else border-palecerulean-200 @endif">
                    {{ __(ucfirst($subscriber->level).' Ins.') }}
                </td>
                <td class="w-3/12 py-5 border-r tabular-nums
                    @if($sdx % 2 == 0) border-palecerulean-300 @else border-palecerulean-200 @endif">
                    @isset($subscriber->insurance)
                    {{ $subscriber->insurance['company_name'] }}
                    @endisset
                </td>
                <td class="w-2/12 py-5 border-r tabular-nums
                    @if($sdx % 2 == 0) border-palecerulean-300 @else border-palecerulean-200 @endif">
                    @isset($subscriber->insurance['company_name'])
                    {{ ucfirst($subscriber->effective_date->translatedFormat('M d, Y')) }}
                    @endisset
                </td>
                <td class="w-2/12 py-5 border-r tabular-nums
                    @if($sdx % 2 == 0) border-palecerulean-300 @else border-palecerulean-200 @endif">
                    @isset($subscriber->termination_date)
                    {{ ucfirst($subscriber->termination_date->translatedFormat('M d, Y')) }}
                    @endisset
                </td>
                <td class="w-1/12 py-5 border-r tabular-nums
                    @if($sdx % 2 == 0) border-palecerulean-300 @else border-palecerulean-200 @endif">
                    {{ $subscriber->policy_number }}
                </td>
                <td class="w-1/12 py-5 border-r tabular-nums
                    @if($sdx % 2 == 0) border-palecerulean-300 @else border-palecerulean-200 @endif">
                    {{ $subscriber->group_number }}
                </td>
                <td class="w-1/12 py-5 border-r tabular-nums
                    @if($sdx % 2 == 0) border-palecerulean-300 @else border-palecerulean-200 @endif">
                    {{ $subscriber->plan_name }}
                </td>
                <td class="w-1/12 py-5 border-r tabular-nums
                    @if($sdx % 2 == 0) border-palecerulean-300 @else border-palecerulean-200 @endif">
                </td>
            </tr>
            <tr>
                <td colspan="7" class="py-2"></td>
            </tr>
            @endforeach
        </tbody>
        {{-- <tbody>
            @foreach ($patient->subscriber as $tdx => $subscriber)
            <tr class="flex flex-row flex-nowrap items-center justify-between text-center transition-colors duration-150 ease-in-out shadow-sm
                @if($tdx % 2 == 0) bg-gunmetal-50 @else bg-gunmetal-100 @endif text-gunmetal-400">
                @foreach ($subscriber as $cdx => $itemrow)
                <td class="w-1/8 py-5 border-r tabular-nums
                    @if($cdx == 0) pl-6 text-left @endif
                    @if($tdx % 2 == 0) border-palecerulean-300 @else border-palecerulean-200 @endif">
                    @if (is_numeric($itemrow))
                    $ {{ number_format((float)$itemrow, 2, '.', '') }}
        @else
        {{ __($itemrow) }}
        @endif
        </td>
        @endforeach
        </tr>
        @if($tdx<2) <tr>
            <td colspan="8" class="py-2"></td>
            </tr>
            @endif
            @endforeach
            </tbody> --}}
    </table>
</div>
