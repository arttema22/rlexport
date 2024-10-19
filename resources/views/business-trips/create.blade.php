<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('New business trip') }}
        </h2>
    </x-slot>

    <x-new-data-card>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('b-trip-store') }}">
            @csrf

            <div>
                <x-label for="date" value="{{ __('Date') }}" />
                <x-input id="date" class="block mt-1 w-full" type="date" name="date" :value="old('date')" required
                    autofocus autocomplete="date" />
            </div>

            <div class="mt-4">
                <x-label for="volume" value="{{ __('Volume') }}" />
                <x-input id="volume" class="block mt-1 w-full" type="number" min="10" max="1000000" step=".01"
                    name="volume" :value="old('volume')" required />
            </div>

            <div class="mt-4">
                <x-label for="price" value="{{ __('Price') }}" />
                <x-input id="price" class="block mt-1 w-full" type="number" min="10" max="1000000" step=".01"
                    name="price" :value="old('price')" required />
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

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    href="{{ route('salaries') }}">
                    {{ __('Cancel') }}
                </a>

                <x-button class="ms-4">
                    {{ __('Save') }}
                </x-button>
            </div>
        </form>
    </x-new-data-card>
</x-app-layout>