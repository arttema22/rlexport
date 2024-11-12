<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit') }}
        </h2>
    </x-slot>

    <x-section>
        <x-cover-small>
            <x-validation-errors class="mb-4" />

            <form method="POST" action="{{ route('refilling.update', $Refilling) }}">
                @csrf

                <div>
                    <x-label for="event_date" value="{{ __('Date') }}" />
                    <x-input id="event_date" class="block mt-1 w-full" type="date" name="event_date"
                        :value="old('event_date', $Refilling->event_date)" required autofocus
                        autocomplete="event_date" />
                </div>

                <div class="mt-4">
                    <x-label for="sum" value="{{ __('Sum') }}" />
                    <x-input id="sum" class="block mt-1 w-full" type="number" min="10" max="1000000" step=".01"
                        name="sum" :value="old('sum', $Refilling->sum)" required />
                </div>

                {{-- Trucks --}}
                @if($Trucks)
                <div class="mt-4">
                    <x-label for="truck" value="{{ __('Truck') }}" />
                    <x-form.select name="truck" class="block mt-1 w-full">
                        <option value="0">{{__('Truck not selected')}}</option>
                        @foreach($Trucks as $Truck)
                        <option value="{{$Truck->id}}" @if ($Refilling->truck_id == $Truck->id)
                            selected
                            @endif
                            >{{$Truck->reg_num_ru}}</option>
                        @endforeach
                    </x-form.select>
                </div>
                @endif
                {{-- Trucks end --}}

                <div class="mt-4">
                    <x-label for="comment" value="{{ __('Comment') }}" />
                    <x-input id="comment" class="block mt-1 w-full" type="text" name="comment"
                        :value="old('comment', $Refilling->comment)" />
                </div>

                <x-buttons-group>
                    <x-link href="{{ route('refilling.index') }}">
                        {{ __('Cancel') }}
                    </x-link>
                    <x-button class="ms-4">
                        {{ __('Save') }}
                    </x-button>
                </x-buttons-group>
            </form>

        </x-cover-small>
    </x-section>

</x-app-layout>
