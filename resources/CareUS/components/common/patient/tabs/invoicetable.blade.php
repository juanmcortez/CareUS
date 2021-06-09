<table class="table w-full text-sm table-auto">
    <thead class="text-lightcyan-500">
        <tr class="flex flex-row items-center justify-around flex-nowrap bg-bdazzledblue-500">
            <th class="px-5 py-5">{{ __('Entry Date') }}</th>
            <th class="px-5 py-5">{{ __('Inv. #') }}</th>
            <th class="px-5 py-5">{{ __('Srv Date') }}</th>
            <th class="px-5 py-5">{{ __('Code') }}</th>
            <th class="px-5 py-5">{{ __('Mods') }}</th>
            <th class="px-5 py-5">{{ __('ICDs') }}</th>
            <th class="px-5 py-5">{{ __('Units') }}</th>
            <th class="px-5 py-5">{{ __('Charge') }}</th>
            <th class="px-5 py-5">{{ __('PTP') }}</th>
            <th class="px-5 py-5">{{ __('PBR') }}</th>
            <th class="px-5 py-5">{{ __('Paid') }}</th>
            <th class="px-5 py-5">{{ __('Adj') }}</th>
            <th class="px-5 py-5">{{ __('Bal') }}</th>
            <th class="px-5 py-5">{{ __('Insurance') }}</th>
        </tr>
        <tr>
            <td colspan="14" class="py-2"></td>
        </tr>
    </thead>
    <tbody>
        <tr
            class="flex flex-row items-center justify-between text-center transition-colors duration-150 ease-in-out shadow-sm flex-nowrap bg-gunmetal-50 text-gunmetal-400">
            <td class="w-full py-5 text-center text-red-700 tabular-nums" colspan="14">
                {!! __('<strong>No</strong> invoices found for <strong>:patient_name</strong>',
                ['patient_name' => $patient->persona->formated_name]) !!}
            </td>
        </tr>
        <tr>
            <td colspan="14" class="py-2"></td>
        </tr>
    </tbody>
</table>
