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
                    <x-form.select id="find-truck" name="truck" class="block mt-1 w-full">
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
                    <x-form.select id="find-cargo" name="cargo" class="block mt-1 w-full">
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
                    <x-label for="route" value="{{ __('Routes') }}" />
                    <x-form.select id="find-route" name="route" class="block mt-1 w-full">
                        <option value="0">{{__('Route not selected')}}</option>
                        @foreach($Routes as $Route)
                        <option value="{{$Route->id}}">{{$Route->start->name}}-{{$Route->finish->name}}
                            ({{$Route->length}}км.)
                        </option>
                        @endforeach
                    </x-form.select>
                </div>
                @endif
                {{-- Routes end --}}

                {{-- Number trips --}}
                <div class="mt-4">
                    <x-label for="number_trips" value="{{ __('Number trips') }}" />
                    <x-input id="number_trips" class="block mt-1 w-full" type="number" min="1" max="10" step="1"
                        name="number_trips" :value="1" />
                </div>
                {{-- Number trips end --}}

                {{-- Unexpected expenses --}}
                <div class="mt-4">
                    <x-label for="unexpected_expenses" value="{{ __('Unexpected expenses') }}" />
                    <x-input id="unexpected_expenses" class="block mt-1 w-full" type="number" min="10" max="1000000"
                        step=".01" name="unexpected_expenses" :value="old('unexpected_expenses')" />
                </div>
                {{-- Unexpected expenses end --}}

                <div class="mt-4">
                    <x-label for="comment" value="{{ __('Comment') }}" />
                    <x-input id="comment" class="block mt-1 w-full" type="text" name="comment"
                        :value="old('comment')" />
                </div>

                <!-- Additional services -->
                <div class="flex justify-between mt-2 py-2">
                    <h3 class="text-lg font-medium text-gray-900">{{ __('Additional services') }}</h3>
                    <x-buttons.button-new class="service-add" />
                </div>
                <div class="services-list"></div>
                <!-- Additional services end -->

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
        // Скрипты для страницы нового маршрута
        // 1. добавляются select2 для нужных полей
        // 2. обработчик типа авто
        // 3. добавление блока инпутов для новой услуги
        // 4. удаление строки с услугой

    $(document).ready(function() {
          $("#find-truck").select2();
          $("#find-cargo").select2();
          $("#find-route").select2();

            // срабатывает при выборе типа авто
            // $("#type-truck").change(function() {
            //     if (this.value < 0) { $(".additional-servis").css({ 'display' : 'block' }); } else {
            //         $(".additional-servis").css({ 'display' : 'none' }); } });


            // добавление строки с услугой
             $('.service-add').click(function() {
             $('.services-list').append(
`
<div class="flex gap-1 justify-between items-end mb-4">
    <div class="basis-3/5">
        <x-label for="service-id[]" value="{{ __('Services') }}" />
        <x-form.select id="service_id[]" name="service_id[]" class="block mt-1 w-full">
            <option value="0">{{__('Service not selected')}}</option>
            @foreach($Services as $Service)
            <option value="{{$Service->id}}">{{$Service->name}}</option>
            @endforeach
        </x-form.select>
    </div>
    <div class="basis-1/5">
        <x-label for="number_operations[]" value="{{ __('Quantity') }}" />
        <x-input id="number_operations[]" class="block mt-1 w-full"
        type="number" min="1" max="10" step="1" name="number_operations[]"
        :value="1" />
    </div>
    <div class="basis-1/5 inline-flex justify-end items-center rounded-md shadow-sm">
        <x-buttons.button-delete class="remove-service" />
    </div>
</div>
`)});

            // Удаление строки услуги
             $(document).on('click', '.remove-service', function(e) {
                 e.preventDefault();
                 let row_item = $(this).parent().parent();
                 $(row_item).remove();
             });
        });
    </script>

</x-app-layout>