<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('New salary') }}
        </h2>
        @if(session('error'))
        <x-alerts.error></x-alerts.error>
        @endif
    </x-slot>

    <x-section>
        <x-covers.cover-small>
            <x-validation-errors class="mb-4" />

            <form method="POST" action="{{ route('salary.store') }}">
                @csrf

                <div>
                    <x-label for="event_date" value="{{ __('Date') }}" />
                    <x-input id="event_date" class="block mt-1 w-full" type="date" name="event_date"
                        :value="date('Y-m-d')" required autofocus autocomplete="event_date" />
                </div>

                <div class="mt-4">
                    <x-label for="sum" value="{{ __('Sum') }}" />
                    <x-input id="sum" class="block mt-1 w-full" type="number" min="10" max="1000000" step=".01"
                        name="sum" :value="old('sum')" required />
                </div>

                <div class="mt-4">
                    <x-label for="comment" value="{{ __('Comment') }}" />
                    <x-input id="comment" class="block mt-1 w-full" type="text" name="comment"
                        :value="old('comment')" />
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

        </x-covers.cover-small>
    </x-section>

</x-app-layout>