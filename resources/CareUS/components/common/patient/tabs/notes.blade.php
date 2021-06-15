<div {{ $attributes->merge([ 'class' => 'flex flex-row flex-wrap justify-between w-full my-5' ]) }}>
    <div class="flex flex-row flex-wrap items-start justify-start w-8/12 bg-gunmetal-100">
        @if($patient->notes->first())
        @foreach ($patient->notes as $ndx => $note)
        @if ($ndx==0)
        <div class="flex flex-row flex-wrap items-center justify-start w-full mt-5 text-gunmetal-400">
            @else
            <div
                class="flex flex-row flex-wrap items-center justify-start w-full pt-5 pb-5 mt-5 border-t-2 border-gunmetal-50 text-gunmetal-400">
                @endif
                <h3 class="w-6/12 px-5 font-semibold text-md">{{ $note->title }}</h3>
                <p class="w-5/12 px-5 text-xs leading-loose text-right text-gunmetal-300">
                    {!! __('Written by <strong>:name</strong> on <strong>:date</strong>',
                    [
                    'name'=> $note->user->persona->formated_name,
                    'date' => $note->created_at_language
                    ]
                    ) !!}
                </p>
                <form method="POST"
                    action="{{ route('patients.delete.note', ['patient' => $patient->patID, 'note' => $note->id]) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="flex flex-row items-center justify-center w-1/12 mx-auto text-xs text-red-500">
                        <i class="mr-1 fa fa-times"></i> {{ __('Delete') }}
                    </button>
                </form>
                <p class="w-full px-5 mt-5">
                    {{ $note->body }}
                </p>
            </div>
            @endforeach
            @else
            <div class="flex flex-row flex-wrap items-start justify-start w-full mt-5 text-gunmetal-400">
                <p class="w-full px-5 text-gunmetal-300">{{ __('No notes available.') }}</p>
            </div>
            @endif
        </div>
        <form class="flex flex-row flex-wrap justify-end w-4/12" method="POST"
            action="{{ route('patients.new.note', ['patient' => $patient->patID]) }}">
            @csrf
            <div class="flex flex-col flex-wrap w-11/12 p-5 bg-bdazzledblue-200 text-gunmetal-400">
                <div class="flex flex-row items-center justify-start w-full">
                    <h3 class="text-xl font-semibold">{{ __('Add a new note') }}</h3>
                </div>
                <div class="flex flex-row items-center justify-start w-full mt-5">
                    <x-common.forms.label for="title" class="w-2/12 text-right">
                        {{ __('Title') }}
                    </x-common.forms.label>
                    <x-common.forms.input id="title" class="w-10/12" type="text" name="note[title]"
                        :value="old('note[title]')" placeholder="{{ __('Title') }}" />
                </div>
                <div class="flex flex-row items-start justify-start w-full mt-5">
                    <x-common.forms.label for="occupation" class="w-2/12 pt-2 text-right">
                        {{ __('Note') }}
                    </x-common.forms.label>
                    <x-common.forms.textarea id="body" class="w-10/12" name="note[body]" placeholder="{{ __('Note') }}">
                        {{ old('note[body]') }}</x-common.forms.textarea>
                </div>
                <div class="flex flex-row items-start justify-start w-full mt-5">
                    <x-common.forms.button icon="save" color="green" class="ml-auto">
                        {{ __('Save') }}
                    </x-common.forms.button>
                </div>
            </div>
        </form>
    </div>
