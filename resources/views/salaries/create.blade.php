<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('New salary') }}
        </h2>
    </x-slot>

    <x-card-main-white>
        test
    </x-card-main-white>


    <x-new-data-card>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('salary.store') }}">
            @csrf

            <div>
                <x-label for="date" value="{{ __('Date') }}" />
                <x-input id="date" class="block mt-1 w-full" type="date" name="date" :value="old('date')" required
                    autofocus autocomplete="date" />
            </div>

            <div class="mt-4">
                <x-label for="sum" value="{{ __('Sum') }}" />
                <x-input id="sum" class="block mt-1 w-full" type="number" min="10" max="1000000" step=".01" name="sum"
                    :value="old('sum')" required />
            </div>

            <div class="mt-4">
                <x-label for="comment" value="{{ __('Comment') }}" />
                <x-input id="comment" class="block mt-1 w-full" type="text" name="comment" :value="old('comment')" />
            </div>

            <x-buttons-group>
                <x-link href="{{ route('salary.index') }}">
                    {{ __('Cancel') }}
                </x-link>
                <x-button class="ms-4">
                    {{ __('Save') }}
                </x-button>
            </x-buttons-group>
        </form>
    </x-new-data-card>
</x-app-layout>