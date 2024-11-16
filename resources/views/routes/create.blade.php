<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('New route') }}
        </h2>
        @if(session('error'))
        <x-alerts.error></x-alerts.error>
        @endif
    </x-slot>

    <x-section>
        <x-cover-small>
            <x-validation-errors class="mb-4" />

            <form method="POST" action="{{ route('route.store') }}">
                @csrf

                <div>
                    <x-label for="event_date" value="{{ __('Date') }}" />
                    <x-input id="event_date" class="block mt-1 w-full" type="date" name="event_date"
                        :value="date('Y-m-d')" required autofocus autocomplete="event_date" />
                </div>

                {{-- Trucks --}}
                @if($Trucks)
                <div class="mt-4">
                    <x-label for="truck" value="{{ __('Truck') }}" />
                    <x-form.select name="truck" class="block mt-1 w-full">
                        <option value="0">{{__('Truck not selected')}}</option>
                        @foreach($Trucks as $Truck)
                        <option value="{{$Truck->id}}">{{$Truck->reg_num_ru}}</option>
                        @endforeach
                    </x-form.select>
                </div>
                @endif
                {{-- Trucks end --}}

                {{-- Cargos --}}
                @if($Cargos)
                <div class="mt-4">
                    <x-label for="cargo" value="{{ __('Cargo') }}" />
                    <x-form.select name="cargo" class="block mt-1 w-full">
                        <option value="0">{{__('Cargo not selected')}}</option>
                        @foreach($Cargos as $Cargo)
                        <option value="{{$Cargo->id}}">{{$Cargo->name}}</option>
                        @endforeach
                    </x-form.select>
                </div>
                @endif
                {{-- Cargos end --}}

                {{-- Routes --}}
                @if($Routes)
                <div class="mt-4">
                    <x-label for="routes" value="{{ __('Routes') }}" />
                    <x-form.select name="routes" class="block mt-1 w-full">
                        <option value="0">{{__('Route not selected')}}</option>
                        @foreach($Routes as $Route)
                        <option value="{{$Route->id}}">{{$Route->start->name}}-{{$Route->finish->name}}</option>
                        @endforeach
                    </x-form.select>
                </div>
                @endif
                {{-- Routes end --}}

                {{-- Number trips --}}
                <div class="mt-4">
                    <x-label for="number_trips" value="{{ __('Number trips') }}" />
                    <x-input id="number_trips" class="block mt-1 w-full" type="number" min="1" max="10" step="1"
                        name="number_trips" :value="old('number_trips')" required />
                </div>
                {{-- Number trips end --}}

                {{-- Unexpected expenses --}}
                <div class="mt-4">
                    <x-label for="unexpected_expenses" value="{{ __('Unexpected expenses') }}" />
                    <x-input id="unexpected_expenses" class="block mt-1 w-full" type="number" min="10" max="1000000"
                        step=".01" name="unexpected_expenses" :value="old('unexpected_expenses')" required />
                </div>
                {{-- Unexpected expenses end --}}

                {{-- Sum --}}
                <div class="mt-4">
                    <x-label for="sum" value="{{ __('Sum') }}" />
                    <x-input x-model="sum" id="sum" class="block mt-1 w-full" type="number" min="10" max="1000000"
                        step=".01" name="sum" :value="old('sum')" required />
                </div>
                {{-- Sum end --}}

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

        </x-cover-small>
    </x-section>

    <script>
        $(document).ready(function() {
            $('.select-find').select2();
        });
    </script>

</x-app-layout>
