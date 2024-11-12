<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('New route') }}
        </h2>
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

                @if($TruckTypes)
                <div class="mt-4">
                    <x-label for="truck" value="{{ __('Truck type') }}" />
                    <x-form.select name="truck" class="select-find block mt-1 w-full">
                        <option value="0">{{__('Type not selected')}}</option>
                        @foreach($TruckTypes as $Type)
                        <option value="{{$Type->id}}">{{$Type->name}}</option>
                        @endforeach
                    </x-form.select>
                </div>
                @endif

                @if($Cargo)
                <div class="mt-4">
                    <x-label for="cargo" value="{{ __('Cargo') }}" />
                    <x-form.select name="cargo" class="block mt-1 w-full">
                        <option value="0">{{__('Cargo not selected')}}</option>
                        @foreach($Cargo as $Cargo)
                        <option value="{{$Cargo->id}}">{{$Cargo->name}}</option>
                        @endforeach
                    </x-form.select>
                </div>
                @endif

                @if($Routes)
                <div class="mt-4">
                    <x-label for="route" value="{{ __('Routes') }}" />
                    <x-form.select name="route" class="select-find block mt-1 w-full">
                        <option value="0">{{__('Route not selected')}}</option>
                        @foreach($Routes as $Route)
                        <option value="{{$Route->id}}">
                            {{$Route->start->name}} - {{$Route->finish->name}}
                        </option>
                        @endforeach
                    </x-form.select>
                </div>
                @endif


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

        </x-cover-small>
    </x-section>

    <script>
        $(document).ready(function() {
            $('.select-find').select2();
        });
    </script>

</x-app-layout>
