<div class="flex flex-row flex-wrap w-8/12">
    <table class="table w-full text-sm table-auto">
        <thead class="text-bdazzledblue-400">
            <tr class="flex flex-row items-center justify-between flex-nowrap bg-gunmetal-50">
                <th class="py-5 w-1/8">{{ __('Balance') }}</th>
                <th class="py-5 w-1/8">{{ __('Total') }}</th>
                <th class="py-5 w-1/8">{{ __('Unbilled') }}</th>
                <th class="py-5 w-1/8">{{ __('Current') }}</th>
                <th class="py-5 w-1/8">{{ __('> 30 Days') }}</th>
                <th class="py-5 w-1/8">{{ __('> 60 Days') }}</th>
                <th class="py-5 w-1/8">{{ __('> 90 Days') }}</th>
                <th class="py-5 w-1/8">{{ __('> 120 Days') }}</th>
            </tr>
            <tr>
                <td colspan="8" class="py-2"></td>
            </tr>
        </thead>
        <tbody>
            @foreach ($balancetable as $tdx => $tablerow)
            <tr class="flex flex-row flex-nowrap items-center justify-between text-center transition-colors duration-150 ease-in-out shadow-sm
                @if($tdx % 2 == 0) bg-gunmetal-50 @else bg-gunmetal-100 @endif text-gunmetal-400">
                @foreach ($tablerow as $cdx => $itemrow)
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
        </tbody>
    </table>
</div>

<div class="flex flex-row flex-wrap justify-end w-4/12">
    <div class="flex flex-col w-11/12 bg-bdazzledblue-200">
        <p class="flex flex-row w-full my-5 text-gunmetal-300">
            <span class="w-6/12 pr-1 font-bold text-right ">{{ __('Last Update on') }}</span>
            <span class="w-6/12 overflow-hidden ">{{ $patient->persona->updated_at_language }}</span>
        </p>
        <h3>{{ __('Notes') }}</h3>
    </div>
</div>
