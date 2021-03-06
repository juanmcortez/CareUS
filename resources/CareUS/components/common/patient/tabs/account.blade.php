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
    <div class="flex flex-col w-11/12 p-5 bg-bdazzledblue-200 text-gunmetal-400">
        @if($patient->notes->first())
        <p class="text-xs text-right text-gunmetal-300">
            {!! __('Last note written by <strong>:name</strong> on <strong>:date</strong>',
            [
            'name'=> $patient->notes->first()->user->persona->formated_name,
            'date' => $patient->notes->first()->created_at_language
            ]
            ) !!}
        </p>
        <h3 class="mt-3 text-xl font-semibold">{{ $patient->notes->first()->title }}</h3>
        <p class="mt-3">{{ $patient->notes->first()->body }}</p>
        <p class="mt-3 text-right">
            <a @click.prevent="ledgerTab='notes'" class="w-auto text-xs cursor-pointer">
                {{ __('More') }}
                <i class="text-xxs fas fa-chevron-right"></i>
            </a>
        </p>
        @else
        <p class="text-gunmetal-300">{{ __('No notes available.') }}</p>
        <p class="mt-3 text-right">
            <a @click.prevent="ledgerTab='notes'" class="w-auto text-xs cursor-pointer">
                {{ __('More') }}
                <i class="text-xxs fas fa-chevron-right"></i>
            </a>
        </p>
        @endif
    </div>
</div>
