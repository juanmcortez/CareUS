<x-layouts.user>

    @section('pageTitle', $pageTitle)

    @push('styles')
    @endpush

    @section('contentheader')
    <h2 class="text-sm font-bold uppercase md:text-xl">{{ $pageH2 }}</h2>
    @endsection

    @section('content')
    <div class="flex flex-col md:flex-row">

        <select name="master_list" class="w-1/4 p-2 my-4 mr-4 border-none bg-gray-50" size="20" multiple>
            @foreach ($lists as $idx => $parent)
            <option class="p-1" value="{{ $parent->list_item_master }}" @if($idx==0) selected @endif>
                {{ __($parent->list_item_name) }}
            </option>
            @endforeach
        </select>

        <select name="child_list" class="w-1/4 p-2 my-4 mr-4 border-none bg-gray-50" size="20" multiple>
            @foreach ($child as $items)
            <option class="p-1" value="{{ $items->list_item_value }}" @if($items->list_item_default) selected @endif>
                {{ __($items->list_item_title) }}
            </option>
            @endforeach
        </select>

        @empty(!$subchild)
        <select name="sub_child_list" class="w-1/4 p-2 my-4 mr-4 border-none bg-gray-50" size="20" multiple>
            @foreach ($subchild as $subitems)
            <option class="p-1" value="{{ $subitems->list_item_value }}" @if($subitems->list_item_default) selected
                @endif>
                {{ __($subitems->list_item_title) }}
            </option>
            @endforeach
        </select>
        @endempty

    </div>
    @endsection

    @push('scripts')
    @endpush
</x-layouts.user>
