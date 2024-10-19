<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('New refilling') }}
        </h2>
    </x-slot>

    <x-new-data-card>

        <x-validation-errors class="mb-4" />

        <div x-data="calc()">
            <form method="POST" action="{{ route('refilling-store') }}">
                @csrf

                <div>
                    <x-label for="date" value="{{ __('Date') }}" />
                    <x-input id="date" class="block mt-1 w-full" type="date" name="date" :value="old('date')" required
                        autofocus autocomplete="date" />
                </div>

                <div class="mt-4">
                    <x-label for="volume" value="{{ __('Volume') }}" />
                    <x-input x-model="volume" @input="update_sum" id="volume" class="block mt-1 w-full" type="number"
                        min="10" max="1000000" step=".01" name="volume" :value="old('volume')" required />
                </div>

                <div class="mt-4">
                    <x-label for="price" value="{{ __('Price') }}" />
                    <x-input x-model="price" @input="update_sum" id="price" class="block mt-1 w-full" type="number"
                        min="10" max="1000000" step=".01" name="price" :value="old('price')" required />
                </div>

                <div class="mt-4">
                    <x-input x-model="sum" id="sum" class="hidden" type="text" name="sum" />
                    <p x-text="sum"
                        class="text-white bg-red-500 border-red-500 rounded-md shadow-sm block mt-1 w-full text-4xl px-1">
                    </p>
                </div>

                <div class="mt-4">
                    <x-label for="comment" value="{{ __('Comment') }}" />
                    <x-input id="comment" class="block mt-1 w-full" type="text" name="comment"
                        :value="old('comment')" />
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
        </div>
        <script>
            function calc() {
                return {
                    sum: 0,
                    volume: '',
                    price: '',

                    getVolume() {
                        return (this.volume === "") ? 0 : parseFloat(this.volume);
                    },
                    getPrice() {
                        return (this.price === "") ? 0 : parseFloat(this.price);
                    },
                    update_sum() {
                        this.sum = ((this.getVolume() * this.getPrice() )).toFixed(2);
                    }
                }
            }
        </script>
    </x-new-data-card>
</x-app-layout>