<x-layouts.guest>

    @section('pageTitle', 'Confirm password')

    @push('styles')
    @endpush

    @section('content')
    <div class="mb-4 text-sm text-gray-600">
        {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
    </div>

    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf

        <!-- Password -->
        <div>
            <x-common.forms.label for="password" :value="__('Password')" />

            <x-common.forms.input id="password" class="block w-full mt-1" type="password" name="password" required
                autocomplete="current-password" />
        </div>

        <div class="flex justify-end mt-4">
            <x-common.forms.button>
                {{ __('Confirm') }}
            </x-common.forms.button>
        </div>
    </form>
    @endsection

    @push('scripts')
    @endpush
</x-layouts.guest>
