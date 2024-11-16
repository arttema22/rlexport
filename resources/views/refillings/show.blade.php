<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('View') }}
        </h2>
    </x-slot>

    <x-section>
        <x-cover-medium>

            <x-2-column-section>

                <h3 class="mb-2 text-lg font-medium text-gray-900">{{ __('Main information') }}</h3>
                <table class="table-fixed">
                    <tr>
                        <x-index.table-td>{{ __('Date') }}:</x-index.table-td>
                        <x-index.table-td>{{ $Refilling->event_date->format('d.m.Y') }}</x-index.table-td>
                    </tr>
                    <tr>
                        <x-index.table-td>{{ __('Volume') }}:</x-index.table-td>
                        <x-index.table-td>{{ $Refilling->volume }} л.</x-index.table-td>
                    </tr>
                    <tr>
                        <x-index.table-td>{{ __('Price') }}:</x-index.table-td>
                        <x-index.table-td>{{ $Refilling->price }} руб.</x-index.table-td>
                    </tr>
                    <tr>
                        <x-index.table-td>{{ __('Sum') }}:</x-index.table-td>
                        <x-index.table-td>{{ $Refilling->sum }} руб.</x-index.table-td>
                    </tr>
                    <tr>
                        <x-index.table-td>{{ __('Brand') }}:</x-index.table-td>
                        <x-index.table-td>{{$Refilling->petrolBrand->name}}</x-index.table-td>
                    </tr>
                    <tr>
                        <x-index.table-td>{{__('Address')}}:</x-index.table-td>
                        <x-index.table-td>{{$Refilling->petrolStation->address}}</x-index.table-td>
                    </tr>
                    <tr>
                        <x-index.table-td>{{__('Category')}}:</x-index.table-td>
                        <x-index.table-td>{{$Refilling->fuelCategory->name}}</x-index.table-td>
                    </tr>
                    <tr>
                        <x-index.table-td>{{__('Type')}}:</x-index.table-td>
                        <x-index.table-td>{{$Refilling->fuelType->name}}</x-index.table-td>
                    </tr>
                    @if ($Refilling->truck)
                    <tr>
                        <x-index.table-td>{{ __('Truck') }}:</x-index.table-td>
                        <x-index.table-td>{{ $Refilling->truck->name }} {{ $Refilling->truck->reg_num_ru }}
                        </x-index.table-td>
                    </tr>
                    @endif
                </table>
                @if ($Refilling->comment)
                <span>{{ __('Comment') }}:</span>
                <p>{{ $Refilling->comment }}</p>
                @endif


                <x-slot name="additional">
                    <h3 class="mb-2 text-lg font-medium text-gray-900">{{ __('Additional information') }}</h3>

                    <div class="flex justify-between">
                        <span>{{ __('Owner') }}</span>
                        @if ($Refilling->owner_id == 0)
                        <span>{{ $Refilling->driver->name }}</span>
                        @else
                        <span>{{ $Refilling->owner->name }}</span>
                        @endif
                    </div>

                    <div class="flex justify-between">
                        <span>{{ __('Driver') }}</span>
                        <span>{{ $Refilling->driver->name }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span>{{ __('Created') }}</span>
                        <span>{{ $Refilling->created_at }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span>{{ __('Updated') }}</span>
                        <span>{{ $Refilling->updated_at }}</span>
                    </div>
                </x-slot>

            </x-2-column-section>

            <x-buttons-group>
                <x-link-button href="{{ route('refilling.index') }}">
                    {{ __('Back') }}
                </x-link-button>

                <x-link href="{{ route('refilling.edit', $Refilling) }}">
                    {{ __('Edit') }}
                </x-link>
            </x-buttons-group>

        </x-cover-medium>
    </x-section>

</x-app-layout>
