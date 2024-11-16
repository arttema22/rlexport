<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('New refilling') }}
        </h2>
    </x-slot>

    <x-section>
        <x-cover-small>
            <x-validation-errors class="mb-4" />

            <div x-data="calc()">
                <form method="POST" action="{{ route('refilling.store') }}">
                    @csrf

                    <div>
                        <x-label for="event_date" value="{{ __('Date') }}" />
                        <x-input id="event_date" class="block mt-1 w-full" type="date" name="event_date"
                            :value="date('Y-m-d')" required autofocus autocomplete="event_date" />
                    </div>

                    <div class="mt-4">
                        <x-label for="volume" value="{{ __('Volume') }}" />
                        <x-input x-model="volume" @input="update_sum" id="volume" class="block mt-1 w-full"
                            type="number" min="10" max="1000000" step=".01" name="volume" :value="old('volume')"
                            required />
                    </div>

                    <div class="mt-4">
                        <x-label for="price" value="{{ __('Price') }}" />
                        <x-input x-model="price" @input="update_sum" id="price" class="block mt-1 w-full" type="number"
                            min="10" max="1000000" step=".01" name="price" :value="old('price')" required />
                    </div>

                    <div class="mt-4">
                        <x-label for="sum" value="{{ __('Sum') }}" />
                        <x-input x-model="sum" id="sum" class="block mt-1 w-full" type="number" min="10" max="1000000"
                            step=".01" name="sum" :value="old('sum')" required />
                    </div>

                    {{-- Petrol Brand --}}
                    @if($PSBrands)
                    <div class="mt-4">
                        <x-label for="brand" value="{{ __('Brand') }}" />
                        <x-form.select name="brand" class="block mt-1 w-full">
                            @foreach($PSBrands as $Brand)
                            <option value="{{$Brand->id}}">{{$Brand->name}}</option>
                            @endforeach
                        </x-form.select>
                    </div>
                    @endif
                    {{-- Petrol Brand end --}}

                    {{-- Petrol Stations --}}
                    @if($PStations)
                    <div class="mt-4">
                        <x-label for="pstation" value="{{ __('Petrol station') }}" />
                        <x-form.select name="pstation" class="block mt-1 w-full">
                            @foreach($PStations as $Station)
                            <option value="{{$Station->id}}">{{$Station->address}}</option>
                            @endforeach
                        </x-form.select>
                    </div>
                    @endif
                    {{-- Petrol Stations end --}}

                    {{-- Fuel Categories --}}
                    @if($FuelCats)
                    <div class="mt-4">
                        <x-label for="fielcat" value="{{ __('Fuel category') }}" />
                        <x-form.select name="fielcat" class="block mt-1 w-full">
                            @foreach($FuelCats as $FuelCat)
                            <option value="{{$FuelCat->id}}">{{$FuelCat->name}}</option>
                            @endforeach
                        </x-form.select>
                    </div>
                    @endif
                    {{-- Fuel Categories end --}}

                    {{-- Fuel Types --}}
                    @if($FuelTypes)
                    <div class="mt-4">
                        <x-label for="fieltype" value="{{ __('Fuel type') }}" />
                        <x-form.select name="fieltype" class="block mt-1 w-full">
                            @foreach($FuelTypes as $FuelType)
                            <option value="{{$FuelType->id}}">{{$FuelType->name}}</option>
                            @endforeach
                        </x-form.select>
                    </div>
                    @endif
                    {{-- Fuel Types end --}}

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

                    <div class="mt-4">
                        <x-label for="comment" value="{{ __('Comment') }}" />
                        <x-input id="comment" class="block mt-1 w-full" type="text" name="comment"
                            :value="old('comment')" />
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
            </div>

        </x-cover-small>
    </x-section>

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

</x-app-layout>
